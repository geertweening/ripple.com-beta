// tfm is short for transactionFeedModule
// note the last line: var transactionFeedModule = tfm;
var tfm = {};

// tx_stack is this module's stack of (payment and offercreate) transactions to display
tfm.tx_stack = [];

// load the recent transactions from the json data file
tfm.loadHistoricalData = function(json_data) {
    tfm.tx_stack = json_data["recent_payments_and_offercreates"].concat(tfm.tx_stack);
    tfm.startInterval();
};

// catch new events as they are passed in by the ripple-lib listener
tfm.handleNewEvent = function(new_event) {
    if (new_event.type === "transaction") {
        var tx = new_event.transaction;
        if (tx.TransactionType === "Payment" ||
            tx.TransactionType === "OfferCreate") {
            tfm.tx_stack.push(tx);
        }
    }
};

// run the intervalFunction once and then set it to run every 3 seconds
tfm.startInterval = function() {
    tfm.intervalFunction();
    setInterval(tfm.intervalFunction, 3000);
};

// pop one of the transactions off the tx_stack,
// render it as an html_string and update the DOM element
tfm.intervalFunction = function() {
    if (tfm.tx_stack.length > 0) {
        var tx = tfm.tx_stack.pop();
        var tx_html = tfm.txToHTML(tx);
        if (tx_html !== '')
            $("#transactionFeed").html(tx_html);
    } else {}
};

tfm.txToHTML = function(tx) {
    var tx_type = tx.TransactionType;
    var firstAmount,
        secondAmount;

    if (tx_type === "Payment") {
        firstAmount = tfm.standardizeAmount(tx.Amount);
        secondAmount = null;
    } else if (tx_type === "OfferCreate") {
        firstAmount = tfm.standardizeAmount(tx.TakerGets);
        secondAmount = tfm.standardizeAmount(tx.TakerPays);
    }

    var html_string = '';

    if (tx_type === "Payment") {
        html_string += '<i class="icon-mail-forward"></i>';
    } else if (tx_type === "OfferCreate") {
        html_string += '<i class="icon-tags"></i>';
    }

    html_string += tfm.renderAmount(firstAmount);

    if (tx_type === "Payment") {
        html_string += '<span class="small"><em>payment delivered</em></span>';
    } else if (tx_type === "OfferCreate") {
        html_string += '<span class="small"><em>offered for</em></span>' + '&nbsp;';
        html_string += '<strong>' + secondAmount.numStr + '</strong>' + '&nbsp;' + secondAmount.currency + '&nbsp;';
    }

    return html_string;
};

tfm.standardizeAmount = function(amount) {
    if (amount.currency === undefined || amount.currency === null) {
        // the currency is XRP
        var xrp_value = amount;
        amount = {};
        amount.currency = "XRP";
        amount.value = xrp_value / 1000000;
    }

    var numStr = "";

    if (amount.value < 0.01) {
        numStr = "<0.01";
    } else if (amount.value >= 500000000000) {
        amount.value = Math.round(amount.value / 1000000000000 * 100) / 100;
        numStr = amount.value + " T";
    } else if (amount.value >= 500000000) {
        amount.value = Math.round(amount.value / 1000000000 * 100) / 100;
        numStr = amount.value + " B";
    } else if (amount.value >= 500000) {
        amount.value = Math.round(amount.value / 1000000 * 100) / 100;
        numStr = amount.value + " M";
    } else {
        amount.value = Math.round(amount.value * 100) / 100;
        var parts = amount.value.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        numStr = parts.join(".");
    }

    amount.numStr = numStr;
    return amount;
};

tfm.renderAmount = function(amount) {
    var amount_html = '';
    amount_html += '<strong>' + amount.numStr + '</strong>' + '&nbsp;';
    amount_html += amount.currency + '&nbsp;';
    return amount_html;
};

var transactionFeedModule = tfm;