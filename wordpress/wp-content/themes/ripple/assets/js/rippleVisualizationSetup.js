// Relative URL of locally-stored historical network data from ripplecharts.com
var JSON_URL = '/wp-content/themes/ripple/assets/json/rippleChartsApiData.json';

var modulesOnThisPage = [];

// Setup ripple-lib
var Remote = ripple.Remote;
var remote = new Remote({
    // trace: true,
    trusted: true,
    local_signing: true,
    servers: [{
        host: 's1.ripple.com',
        port: 443,
        secure: true
    }]
});


// Load historical data from JSON file and send it to each of the 
// modules present on the page if they have a "loadHistoricalData" function
$.getJSON(JSON_URL, function(data) {

    // setup the external modules
    setupModules();

    for (var m = 0, l = modulesOnThisPage.length; m < l; m++) {
        if (modulesOnThisPage[m].loadHistoricalData &&
            typeof modulesOnThisPage[m].loadHistoricalData === "function") {
            modulesOnThisPage[m].loadHistoricalData(data);
        }
    }
});


// Check which modules are present on the current page and
// add them to modulesOnThisPage, which is referenced below
// when new events coming from the Ripple network are being handled

function setupModules() {

    if ($("#transactionFeed").length > 0) {
        modulesOnThisPage.push(transactionFeedModule);
    }

    if ($("#visualization").length > 0) {
        modulesOnThisPage.push(paymentVisualizationModule);
    }

    if ($(".num_transactions").length > 0 &&
        $(".volume_traded").length > 0 &&
        $(".num_accounts").length > 0) {
        modulesOnThisPage.push(partnerPageStatisticsModule);
    }

    if ($("#eventsTable").length > 0) {
        modulesOnThisPage.push(ledgerValidationModule);
    }
}


remote.connect(function() {
    remote.on('ledger_closed', handleEvent);
    remote.on('transaction_all', handleEvent);
});

// Call the event handler of each of the modules loaded on the page
// NOTE: modules should check what time of events they are getting

function handleEvent(new_event) {
    for (var m = 0, l = modulesOnThisPage.length; m < l; m++) {
        modulesOnThisPage[m].handleNewEvent(new_event);
    }
}