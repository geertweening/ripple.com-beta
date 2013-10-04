
;(function() {

  $('#io_wrapper').height($(window).height() - 300);

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

  var value = function(e, editable) {
    return '<div class="val"><span class="'
    + typeof e + (editable ? ' editable" contenteditable="true"' : '"')
    + ' spellcheck="false">'
    + JSON.stringify(e) + '</span></div>';
  };

  //Generate HTML+JSON representation of JS object
  function to_html(message, is_editable) {
    if (typeof is_editable !== 'boolean') {
      is_editable = true;
    }

    function obj_to_html(obj) {
      var isArray = Array.isArray(obj);
      var keys    = Object.keys(obj);
      var open  = ELEMENTS[isArray ? 'open_bracket' : 'open_brace'];
      var close = ELEMENTS[isArray ? 'close_bracket' : 'close_brace'];

      var res = open;

      for (var i=0; i<keys.length; i++) {
        var key = keys[i];
        var val = obj[key];
        var field = '<span class="field'
        + (isArray ? ' hidden">' + key : '">' + JSON.stringify(key) )
        + '</span>';

        res += '<div class="key">' + field;
        if (!isArray) res += ELEMENTS.colon;

        if (typeof val === 'object' && val) {
          res += obj_to_html(val);
        } else {
          res += value(val, is_editable && key !== 'command');
          if (i < keys.length -1) {
            res += ELEMENTS.comma;
          }
        }

        res += '</div>';
      }

      res += close;

      return res;
    }

    return obj_to_html(message);
  };


  //Find the chain of JSON attributes when a nested
  //field has been modified
  function findRoute(element, p) {
    var p = p || [];
    var key = $(element).parent('div.key');
    if (!key.length) return p;
    p.push($(key).children('.field').text().replace(/"/g, ''));
    return findRoute(key, p);
  };

  //Set an attribute on backing JS object based
  //on the path to that attribute
  function setRoute(obj, route, val) {
    var l = route.length;
    while (--l > 0) {
      obj = obj[route[l]];
    }
    obj[route[l]] = val;
    return obj;
  };

  //Get an attribute on backing JS object based
  //on the path to that attribute
  function getRoute(obj, route) {
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

  //Build commands
  var commands = { };
  var selected_command = { };

  function command(cmd, attrs) {
    var cmd = { message: { command: cmd } }
    Object.keys(attrs || { }).forEach(function(k) {
      cmd.message[k] = attrs[k];
    });
    return cmd;
  };

  commands.server_info    = command('server_info');
  commands.server_state   = command('server_state');
  commands.ping           = command('ping');
  commands.ledger_closed  = command('ledger_closed');
  commands.ledger_header  = command('ledger_header');
  commands.ledger_current = command('ledger_current');
  commands.ledger         = command('ledger', {
    ledger_index:  void(0),
    ledger_hash:   void(0),
    full:          false,
    expand:        false,
    transactions:  true,
    accounts:      true
  });

  commands.ledger_entry = command('ledger_entry', {
    ledger_index: 0,
    ledger_hash: void(0),
    type: 'account_root',
    account_root: 'rUPotLj5CNKaP4bQANcecEuT8hai3VpxfB',
    index: void(0),
    directory: void(0),
    generator: void(0),
    offer: void(0)
  });

  commands.subscribe      = command('subscribe', { streams: [ 'server', 'server' ] });
  commands.unsubscribe    = command('unsubscribe', { streams: [ 'server', 'server' ] });

  commands.transaction_entry = command('transaction_entry', {
    tx_hash: '7194B78F00F011FA2E85B155E64B2107DD070A6F13B1226ECA9176D3D9D6DAD3',
    ledger_index: 2438581,
    ledger_hash: void(0)
  });

  commands.tx = command('tx', {
    transaction: '7194B78F00F011FA2E85B155E64B2107DD070A6F13B1226ECA9176D3D9D6DAD3'
  });

  commands.account_info = command('account_info', {
    account: 'rUPotLj5CNKaP4bQANcecEuT8hai3VpxfB'
  });

  commands.account_offers = command('account_offers', {
    account: 'rUPotLj5CNKaP4bQANcecEuT8hai3VpxfB',
    account_indeX: -1,
    ledger: 'current'
  });

  commands.account_tx = command('account_tx', {
    account:           'rUPotLj5CNKaP4bQANcecEuT8hai3VpxfB',
    ledger_index_min:  -1,
    ledger_index_max:  -1,
    binary:            false,
    count:             false,
    descending:        false,
    offset:            0,
    limit:             10,
    forward:           false,
    marker:            void(0)
  });

  commands.tx_history = command('tx_history', { start: 10 });

  commands.book_offers = command('book_offers', {
    gets: { currency: 'XRP' },
    pays: { currency: 'USD', issuer: 'rvYAfWj5gh67oV6fW32ZzP3Aw4Eubs59B' }
  });

  /* ---- ---- ---- ---- ---- */

  var input          = $('#input');
  var output         = $('#output');
  var response       = $('#response');
  var request        = $('#request');
  var status         = $('#status');
  var info           = $('#info');
  var request_button = $('#try');
  var online_state   = $('#online_state');

  function set_input(message, flash) {
    $(message).addClass('io');
    if (!flash) {
      $(request).html(message);
    } else {
      $(request).fadeOut(100, function() {
        $(request).html(message);
        $(request).fadeIn(100);
      });
    }
  };

  function set_output(message, isResponse) {
    if (isResponse) {
      var command_header = '<span class="command_name">'
      + selected_command.message.command
      + '</span>';

      var timestamp = '<span class="timestamp">'
      + (Date.now() - selected_command.t) + 'ms'
      + '</span>';

      $(info).html(command_header + timestamp);

      $(request_button).removeClass('obscured');
      $(response).removeClass('obscured');
      $(response).html(message);

      ++id._c;
    } else {
      if (!$(status).is(':visible')) {
        $(status).show();
      }
      $(status).prepend(message);
    }
  };

  function select_command(command, flash) {
    selected_command = commands[command];
    selected_command.message.id = id();
    set_input($('<div id="json_message">').html(to_html(selected_command.message)), flash);
  };

  /* ---- ---- ---- ---- ---- */

  $('#command_list').delegate('li', 'click', function() {
    var cmd = $(this).text().trim();
    select_command(cmd, true);
    window.location.hash = cmd;

    $(this).siblings().removeClass('selected');
    $(this).addClass('selected');
  });

  /* ---- ---- ---- ---- ---- */

  if (window.location.hash) {
    var cmd = window.location.hash.slice(1).toLowerCase();
    var el = $('#cmd_' + cmd);

    if (!el.length) return;

    select_command(cmd);
    window.cmd = cmd;

    $(el).siblings().removeClass('selected');
    $(el).addClass('selected');
  } else {
    select_command('server_info');
  }

  /* ---- ---- ---- ---- ---- */

  function is_undefined(str) {
    return str.length === 0
    || str === 'undefined'
    || str === 'void(0)'
    || str === 'void 0';
  };

  //Change handler for JSON attributes
  function handle_change() {
    var trimmed       = $(this).text().trim();
    try {
    var parsed        = is_undefined(trimmed) ? void(0) : JSON.parse(trimmed);
      $('#invalid').hide();
    } catch(e) {
      $('#invalid').show();
      return;
    }
    var route         = findRoute($(this).parent());
    var previousValue = getRoute(selected_command.message, route);
    if (parsed !== previousValue) {
      $(this).text(trimmed);
      setRoute(selected_command.message, route, parsed);
      select_command(selected_command.message.command);
    }
  };

  function init() {
    $(document.body).delegate('span.editable', 'blur', handle_change);

    $(document.body).delegate('span.editable', 'keydown', function(e) {
      if (e.which === 13) {
        e.preventDefault();
        e.stopPropagation();
        $(this).blur();
      }
    });

    function handle_message(message) {
      var parsed = JSON.parse(message);
      var r = $('<div class="result">').addClass(parsed.error ? 'error' : 'success')
      .append(to_html(parsed, false));
      set_output(r, parsed.id === id._c);
    };

    remote._get_server().on('message', handle_message);

    $(request_button).click(function() {
      $(this).addClass('obscured');
      $(response).addClass('obscured');

      var request = remote.request_server_info();
      request.message = selected_command.message;
      request.request();

      selected_command.t = Date.now();
    });

    if (window.cmd) {
      $(request_button).click();
    }
  };

  var CONNECTING   = 1;
  var CONNECTED    = 2;
  var DISCONNECTED = 3;

  function set_online_state(state) {
    switch (state) {
      case CONNECTING:
      $(online_state).removeClass()
        .text('Connecting')
        .addClass('connecting');
        break;
      case CONNECTED:
      $(online_state).removeClass()
        .text('Connected')
        .addClass('connected');
        break;
      case  DISCONNECTED:
      $(online_state).removeClass()
        .text('Disconnected')
        .addClass('disconnected');
        break;
    }
  };

  var remote = new ripple.Remote({
    trusted:        true,
    local_signing:  false,
    local_fee:      true,
    servers: [
      {
        host:    's1.ripple.com',
        port:    443,
        secure:  true
      }
    ]
  });

  remote.on('disconnect', function() {
    set_online_state(DISCONNECTED);
  });

  remote.on('connect', function() {
    set_online_state(CONNECTED);
  });

  $(function() {
    set_online_state(CONNECTING);

    remote.connect(function() {
      var unsubscribe = remote.request_unsubscribe(['ledger', 'server']);
      unsubscribe.callback(init);
    });
  });

})();
