
;(function() {

  var request_button  = $('#request_button');
  var online_state    = $('#online_state');
  var command_wrapper = $('#command_wrapper');
  var command_list    = $(command_wrapper).find('#command_list');
  var commands        = $(command_list).find('li');
  var command_table   = $(command_wrapper).find('#command_table');
  var input           = $(command_wrapper).find('#input');
  var description     = $(input).find('#description');
  var options         = $(input).find('#options');
  var output          = $(command_wrapper).find('#output');
  var response        = $(command_wrapper).find('#response');
  var request         = $(command_wrapper).find('#request');
  var status          = $(command_wrapper).find('#status');
  var info            = $(command_wrapper).find('#info');

  /* ---- ---- ---- ---- ---- */

    //JS object > editable HTML mapping
  var ELEMENTS = {
      open_brace:     '<span class="brace open">{</span>'
    , close_brace:    '<span class="brace close">}</span>'
    , open_bracket:   '<span class="bracket open">[</span>'
    , close_bracket:  '<span class="bracket close">]</span>'
    , comma:          '<span class="comma">,</span>'
    , colon:          '<span class="colon">:</span>'
  }

  function value(e, editable) {
    return '<span class="val"><span class="'
    + typeof e + (editable ? ' editable" contenteditable="true"' : '"')
    + ' spellcheck="false">'
    + JSON.stringify(e) + '</span></span>';
  };

  //Generate HTML+JSON representation of JS object
  function to_html(message, is_editable) {
    if (typeof is_editable !== 'boolean') {
      is_editable = true;
    }

    function obj_to_html(obj) {
      var isArray = Array.isArray(obj);
      var keys    = Object.keys(obj);
      var open    = ELEMENTS[isArray ? 'open_bracket' : 'open_brace'];
      var close   = ELEMENTS[isArray ? 'close_bracket' : 'close_brace'];
      var res     = open;

      keys.forEach(function(key, i) {
        var val = obj[key];
        var field = '<span contenteditable="true" class="field editable'
        + (isArray ? ' hidden">' + key : '">' + JSON.stringify(key) )
        + '</span>';

        res += '<div class="key">' + field;

        if (!isArray) res += ELEMENTS.colon;

        if (typeof val === 'object' && val) {
          res += obj_to_html(val);
        } else {
          res += value(val, is_editable && key !== 'id');
        }

        if (keys[i + 1]) res += ELEMENTS.comma;

        res += '</div>';
      });

      res += close;
      return res;
    };

    return obj_to_html(message);
  };

  //Find the chain of JSON attributes when a nested
  //field has been modified
  function find_route(element, p) {
    var p = p || [];
    var key = $(element).parent('div.key');
    if (!key.length) return p;
    p.push($(key).children('.field').text().replace(/"/g, ''));
    return find_route(key, p);
  };

  //Set an attribute on backing JS object based
  //on the path to that attribute
  function set_route(obj, route, val) {
    var l = route.length;
    while (--l > 0) {
      obj = obj[route[l]];
    }
    obj[route[l]] = val;
    return obj;
  };

  //Get an attribute on backing JS object based
  //on the path to that attribute
  function get_route(obj, route) {
    var l = route.length;
    while (--l > 0) {
      obj = obj[route[l]];
    }
    return obj[route[l]];
  };

  /* ---- ---- ---- ---- ---- */

  //For tracking request IDs
  function id() { return id._c; };

  id._c = 2;

  /* ---- ---- ---- ---- ---- */

  //Build requests
  var selected_request = { };
  var requests = { };

  $(commands).each(function(i, el) {
    requests[$(el).text()] = 0;
  });

  function Request(cmd, attrs) {
    var obj = {
      id:       void(0),
      name:     cmd,
      message:  { command:  cmd }
    }

    Object.keys(attrs || { }).forEach(function(k) {
      if (k[0] === '_') {
        obj[k] = attrs[k];
      } else {
        obj.message[k] = attrs[k];
      }
    });

    requests[cmd] = obj;

    return obj;
  };

  var sample_address = 'r9cZA1mLK5R5Am25ArfXFmqgNwjZgnfk59';
  var sample_tx = 'E08D6E9754025BA2534A78707605E0601F03ACE063687A0CA1BDDACFCD1698C7';

  /* ---- ---- */

  Request('server_info', {
    _description: 'Returns information about the state of the server for human consumption. Results are subject to change without notice.'
  });

  Request('server_state', {
    _description: 'Returns information about the state of the server for machine consumption.'
  });

  Request('ping', {
    _description: 'This command is used to check connectivity for clients. Websocket clients can use this to determine turn around time and actively discover loss of connectivity to a server.'
  });

  /* ---- ---- */

  Request('subscribe', {
    accounts: [ ],
    streams: [ 'server', 'ledger' ],
    _description: 'Start receiving selected streams from the server.'
  });

  Request('unsubscribe', {
    accounts: [ ],
    streams: [ 'server', 'ledger' ],
    _description: 'Stop receiving selected streams from the server.'
  });

  /* ---- ---- */

  Request('ledger', {
    ledger_index:  void(0),
    ledger_hash:   void(0),
    full:          false,
    expand:        false,
    transactions:  true,
    accounts:      true,
    _description: 'Returns ledger information.'
  });

  Request('ledger_entry', {
    type:          'account_root',
    account_root:  sample_address,
    ledger_hash:   'validated',
    ledger_index:  void(0),
    _description: 'Returns a ledger entry. For untrusted servers, the index option provides raw access to ledger entries and proof.'
  });

  Request('ledger_closed', {
    _description: 'Returns the most recent closed ledger index. If a validation list has been provided, then validations should be available.'
  });

  Request('ledger_current', {
    _description: 'Returns the current proposed ledger index. Proof is not possible for the current ledger. This command is primarily useful for testing.'
  });

  /* ---- ---- */

  Request('account_info', {
    account: sample_address,
    _description: 'Returns information about the specified account.'
  });

  Request('account_lines', {
    account:        sample_address,
    account_index:  void(0),
    ledger:         'current',
    _description: 'Returns information about the ripple credit lines for the specified account.'
  });

  Request('account_offers', {
    account:        sample_address,
    account_index:  void(0),
    ledger:         'current',
    _description: 'Returns the outstanding offers for a specified account.'
  });

  Request('account_tx', {
    account:           sample_address,
    ledger_index_min:  -1,
    ledger_index_max:  -1,
    binary:            false,
    count:             false,
    descending:        false,
    offset:            0,
    limit:             10,
    forward:           false,
    marker:            void(0),
    _description: 'Returns a list of transactions that applied to a specified account.'
  });

  /* ---- ---- */

  Request('transaction_entry', {
    tx_hash:       sample_tx,
    ledger_index:  2438581,
    ledger_hash:   void(0),
    _description: 'Returns information about a specified transaction.'
  });

  Request('tx', {
    transaction: sample_tx,
    _description: 'Returns information about a specified transaction.'
  });

  Request('tx_history', {
    start: 10,
    _description: 'Returns the last N transactions starting from start index, in descending order, by ledger sequence number. Server sets N.'
  });

  Request('book_offers', {
    ledger_hash: void(0),
    ledger_index: void(0),
    taker: sample_address,
    taker_gets: ripple.Amount.from_json('1/EUR/rvYAfWj5gh67oV6fW32ZzP3Aw4Eubs59B').to_json(),
    taker_pays: ripple.Amount.from_json('1/USD/rvYAfWj5gh67oV6fW32ZzP3Aw4Eubs59B').to_json(),
    _description: 'Returns the offers for an order book as one or more pages.'
  });

  Request('path_find', {
    subcommand: 'create',
    source_account: sample_address,
    destination_account: 'r9cZA1mLK5R5Am25ArfXFmqgNwjZgnfk59',
    destination_amount: ripple.Amount.from_json('0.001/USD/rvYAfWj5gh67oV6fW32ZzP3Aw4Eubs59B').to_json(),
    _description: 'Find or modify a payment pathway between specified accounts.'
  });

  Request('ripple_path_find', {
    ledger_hash : void(0),
    ledger_index : void(0),
    source_account : sample_address,
    source_currencies : [ { currency : 'USD' } ],
    destination_account : 'r9cZA1mLK5R5Am25ArfXFmqgNwjZgnfk59',
    destination_amount : ripple.Amount.from_json('0.001/USD/rvYAfWj5gh67oV6fW32ZzP3Aw4Eubs59B').to_json(),
    _description: 'Find a path and estimated costs.For non-interactive use, such as automated payment sending from business integrations, ripple_path_find gives you single response that you can use immediately. However, for uses that need updated paths as new ledgers close, repeated calls becomes expensive. In those cases, when possible, use the RPC path_find in place of this API.'
  });

//  Request('submit', {
//    secret: '',
//    tx_json: {
//      Flags: 0,
//      TransactionType: 'AccountSet',
//      Account: 'rMUbY1m6kY1AS6grXRYggyFYMKkdh9WSBs',
//      Sequence: void(0),
//      Fee: '15',
//      Flags: 0
//    },
//    _description: 'Submits a transaction to the network.'
//  });

  /* ---- ---- ---- ---- ---- */

  function rewrite_obj(obj) {
    if (typeof obj === 'string') {
      var obj = JSON.parse(obj);
    }

    var rewrite = { };
    if (obj.id) rewrite.id = obj.id;
    if (obj.command) rewrite.command = obj.command;
    if (obj.status) rewrite.status = obj.status;
    if (obj.type) rewrite.type = obj.type;

    Object.keys(obj).forEach(function(k) {
      if (!rewrite.hasOwnProperty(k)) {
        rewrite[k] = obj[k];
      }
    });

    return rewrite;
  };

  function set_input(command) {
    var message = command.message;

    if (command._description) {
      $(description).text(command._description).show();
    } else {
      $(description).hide();
    }

    $('#selected_command').text(command.name);
    var result = $('<div class="json">').html(to_html(message));
    $(request).html(result);
  };

  var STREAM_PAUSED = false;

  function set_output(message) {
    var parsed = rewrite_obj(message);
    var result = $('<div class="json">');

    //$(result).append(to_html(parsed));

    CodeMirror(result[0], {
      value: JSON.stringify(parsed),
      mode: 'javascript',
      json: true
    });

    if (parsed.id === id._c) {
      var request_header = '<span class="request_name">'
      + selected_request.name;
      + '</span>';

      var timestamp = '<span class="timestamp">'
      + (Date.now() - selected_request.t) + 'ms'
      + '</span>';

      $(request_button).removeClass('depressed');

      $(info).html(request_header + timestamp);

      $(result).addClass('result');

      $(response).removeClass()
      $(response).addClass(parsed.error ? 'error' : 'success');
      $(response).html(result);

      ++id._c;
    } else if (!STREAM_PAUSED && parsed.type !== 'response') {
      $(result).addClass('status');
      $(status).prepend(result);
    }
  };

  function select_request(request) {
    selected_request = requests[request];
    selected_request.message.id = id();
    selected_request.message = rewrite_obj(selected_request.message);
    set_input(selected_request);

//    if (selected_request.name === 'submit') {
//      id._c += 3;
//
//      $('#sign_button').show();
//
//      var tx_json = selected_request.message.tx_json;
//
//      if (ripple.UInt160.is_valid(tx_json.Account)) {
//        remote.request_account_info(tx_json.Account, function(err, info) {
//          tx_json.Sequence = info.account_data.Sequence;
//          set_input(selected_request);
//        });
//      }
//    } else {
//      $('#sign_button').hide();
//    }
  };

  /* ---- ---- ---- ---- ---- */

  $(commands).click(function() {
    var cmd = $(this).text().trim();

    if (!requests[cmd]) return;

    select_request(cmd, true);
    window.location.hash = cmd;

    $(this).siblings().removeClass('selected');
    $(this).addClass('selected');
  });

  var previous_key = void(0);

  $(window).keydown(function(e) {
    if (e.which === 13 && previous_key === 17) {
      //ctrl + enter
      e.preventDefault();
      e.stopPropagation();
      $(request_button).click();
    }
    previous_key = e.which;
  });

  /* ---- ---- ---- ---- ---- */

  function is_undefined(str) {
    return str.length === 0 || /^(undefined|void\(0\)|void 0)$/.test(str);
  };

  //Change handler for JSON attributes
  function handle_change() {
    var trimmed = $(this).text().trim();
    var valid = true;

    try {
      var parsed = is_undefined(trimmed) ? void(0) : JSON.parse(trimmed);
    } catch(e) {
      valid = false;
    }

    if (!valid) return $('#invalid').show();

    var route = find_route($(this).parent());
    var previousValue = get_route(selected_request.message, route);
    if (parsed !== previousValue) {
      $(this).text(trimmed);
      set_route(selected_request.message, route, parsed);
      select_request(selected_request.name);
    }
  };

  $(document.body).delegate('span.editable', 'blur', handle_change);

  $(document.body).delegate('span.editable', 'keydown', function(e) {
    if (e.which === 13) {
      e.preventDefault();
      e.stopPropagation();
      $(this).blur();
    }
  });

  function prepare_request(request) {
    var isArray = Array.isArray(request);
    var result  = isArray ? [ ] : { };

    Object.keys(request).forEach(function(k) {
      var v = request[k];
      switch (typeof v) {
        case 'undefined': break;
        case 'object':
          result[k] = prepare_request(v);
          break;
        default:
          result[k] = v;
          break
      }
    });

    if (isArray) {
      result = result.filter(function(el) {
        return el !== null && typeof el !== 'undefined'
      });
    }

    var empty = isArray && result.length === 0;

    return empty ? void(0) : result;
  };

  if (window.location.hash) {
    var cmd   = window.location.hash.slice(1).toLowerCase();
    var keys  = Object.keys(requests);
    var index = keys.indexOf(cmd);

    if (index === -1) return;

    var el = $(commands).eq(index);

    select_request(cmd);
    window.cmd = cmd;

    $(el).siblings().removeClass('selected');
    $(el).addClass('selected');
  } else {
    select_request('server_info');
  }

  function random_fieldname() {
    return 'property_' + Math.random().toString(10).slice(2, 4);
  };

  function add_field() {
    var route = find_route(this);
    var val   = get_route(selected_request.message, route);

    if (Array.isArray(val)) {
      val.push(void(0));
      set_route(selected_request.message, route, val);
    } else if (typeof val === 'object') {
      val[random_fieldname()] = void(0);
      set_route(selected_request.message, route, val);
    } else {
      selected_request.message[random_fieldname()] = void(0);
    }

    select_request(selected_request.name);
  };

  $(input).delegate('span.brace', 'click', add_field);
  $(input).delegate('span.bracket', 'click', add_field);

  $('#stream_show').click(function() {
    if ($(status).is(':visible')) {
      $(status).hide();
      $(this).text('show');
    } else {
      $(status).show();
      $(this).text('hide');
    }
  });

  $('#stream_pause').click(function() {
    if ($(this).hasClass('paused')) {
      $(this).removeClass('paused');
      $(this).text('pause');
      $(status).removeClass('obscured');
      STREAM_PAUSED = false;
    } else {
      $(this).addClass('paused');
      $(this).text('unpause');
      $(status).addClass('obscured');
      STREAM_PAUSED = true;
    };
  });

  var tooltip = $('#tooltip');
  var mousedown = false;

  $(window).mousedown(function() { mousedown = true; });
  $(window).mouseup(function() { mousedown = false; });

  $('#sign_button').click(function() {
    var self = this;

    $(this).addClass('depressed');

    function done() {
      $(self).removeClass('depressed');
    }

    var message = selected_request.message;
    var tx_json = message.tx_json;

    if (selected_request._signed) return done();

    if (!selected_request.message.secret) {
      alert('Transaction account must have specified secret');
      return done();
    }

    remote.account(tx_json.Account).get_next_sequence(function(e, s) {
      tx_json.Sequence = s;

      try {
        var tx = remote.transaction();
        tx.tx_json = tx_json;
        tx._secret = message.secret;
        tx.complete();
        message.tx_blob = tx.serialize().to_hex();
      } catch(e) {
        alert('Unable to sign transaction ' + e.message);
        return done();
      }

      delete message.secret;
      delete message.tx_json;

      selected_request._signed = true;

      set_input(selected_request);

      done();
    });
  });

  //  function get_tooltip(field) {
  //    find_route(field);
  //  };
  //
  //  $(document.body).delegate('span.field', 'mouseenter', function() {
  //    if (!mousedown) {
  //
  //      $(tooltip).text(get_tooltip(this));
  //
  //      var position = $(this).position();
  //
  //      $(tooltip).css({
  //        top: position.top - $(tooltip).height() - 40,
  //        left: position.left
  //      });
  //
  //      $(tooltip).show();
  //    }
  //  });
  //
  //  $(document.body).delegate('span.field', 'mouseleave', function() {
  //    $(tooltip).hide();
  //  });
  //

  function set_online_state(state) {
    var state = state.toLowerCase();
    $(online_state).removeClass();
    $(online_state).addClass(state);
    $(online_state).text(state);
  };

  var remote = new ripple.Remote({
    trusted:        true,
    local_signing:  true,
    local_fee:      false,
    servers: [
      {
        host:    's1.ripple.com',
        port:    443,
        secure:  true
      }
    ]
  });

  remote.on('disconnect', function() {
    set_online_state('disconnected');
  });

  remote.on('connect', function() {
    set_online_state('connected');
  });

  function init() {
    id._c = remote._get_server()._id;

    remote._get_server().on('message', set_output);

    $(request_button).click(function() {
      $(this).addClass('depressed');
      $(response).addClass('obscured');

      var request = remote.request_server_info();
      request.message = prepare_request(selected_request.message);
      request.request();

      selected_request.t = Date.now();
    });

    $(request_button).removeClass('obscured');
  };

  $(function() {
    set_online_state('connecting');
    remote.connect(init);
  });

})();
