var JSON_RELOAD_INTERVAL = 30000;

// ppsm is short for partnerPageStatisticsModule
// note the last line: var partnerPageStatisticsModule = ppsm;
var ppsm = {};
ppsm.num_transactions = 0;
ppsm.num_accounts = 0;
ppsm.xrp_volume = 0;

ppsm.exchange_rates = {};
ppsm.xrp_volume_equivalents = [{
    currency: "USD",
    amount: 0
}];
ppsm.which_currency_to_show = 0;


// load network statistics from the json_data file
ppsm.loadHistoricalData = function(json_data) {
    ppsm.num_transactions = json_data["num_transactions"];
    ppsm.num_accounts = json_data["num_accounts"];

    ppsm.xrp_volume = json_data["xrp_volume"] * 1000000;
    ppsm.exchange_rates = json_data["exchange_rates"];
    ppsm.exchange_rates.push({
        "currency": "XRP",
        "rate": "1000000"
    });
    ppsm.updateXRPVolumeEquivalents();

    ppsm.updateHTML();

};

// increment the number of transactions and check if any new accounts were created
ppsm.handleNewEvent = function(new_event) {
    if (new_event.type === "transaction") {
        ppsm.num_transactions++;

        // Update num_accounts if the tx includes the creation of an AccountRoot
        new_event.mmeta.each(function(an) {
            if (an.entryType === "AccountRoot" && an.diffType === "CreatedNode")
                ppsm.num_accounts++;
        });

        ppsm.updateHTML();
    }
};

// given the new xrp_volume, update the volume_equivalents 
ppsm.updateXRPVolumeEquivalents = function() {
    var new_volume_equivalents = [];
    for (var e = 0, l = ppsm.exchange_rates.length; e < l; e++) {
        var amount = ppsm.xrp_volume / ppsm.exchange_rates[e]["rate"];
        amount = Math.round(amount);
        new_volume_equivalents.push({
            currency: ppsm.exchange_rates[e]["currency"],
            amount: amount
        });
    }
    ppsm.xrp_volume_equivalents = new_volume_equivalents;
};

// update the DOM elements with the new statistics
ppsm.updateHTML = function() {
    function insertCommas(numStr) {
        return numStr.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    $(".num_transactions").html(insertCommas(ppsm.num_transactions));
    $(".volume_traded").html(
        insertCommas(ppsm.xrp_volume_equivalents[ppsm.which_currency_to_show].amount) + " " +
        ppsm.xrp_volume_equivalents[ppsm.which_currency_to_show].currency);
    $(".num_accounts").html(insertCommas(ppsm.num_accounts));
};

// periodically reload the json file to update the xrp volume traded
setInterval(function() {
    $.getJSON(JSON_URL, function(data) {
        ppsm.xrp_volume = data["xrp_volume"] * 1000000;
        ppsm.updateXRPVolumeEquivalents();
        ppsm.updateHTML();
    });
}, JSON_RELOAD_INTERVAL);

// cycle through which currency should be displayed
setInterval(function() {
    ppsm.updateXRPVolumeEquivalents();
    ppsm.which_currency_to_show++;
    if (ppsm.which_currency_to_show >= ppsm.xrp_volume_equivalents.length)
        ppsm.which_currency_to_show = 0;
    ppsm.updateHTML();
}, 3000);


var partnerPageStatisticsModule = ppsm;

 

    