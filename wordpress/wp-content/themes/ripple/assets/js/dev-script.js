var ledgerValidationModule = {};
ledgerValidationModule.LINE_HEIGHT = 19; //Pixels per line, used in determining the height of rows in the table.
ledgerValidationModule.lastDisplayedLedgerIndex;
ledgerValidationModule.eventQueue = {};


ledgerValidationModule.handleNewEvent = function(obj) {
	var oli = obj.ledger_index;
	
	if (!ledgerValidationModule.lastDisplayedLedgerIndex) {
		ledgerValidationModule.lastDisplayedLedgerIndex = oli;
	}
	
	if (ledgerValidationModule.eventQueue[oli]) {
		ledgerValidationModule.eventQueue[oli].push(obj);
	} else {
		ledgerValidationModule.eventQueue[oli] = [obj];
	}	

};

String.prototype.insert = function (index, string) {
  if (index > 0)
    return this.substring(0, index) + string + this.substring(index, this.length);
  else
    return string + this;
};

ledgerValidationModule.indicate = function(index, string, indicand, cssClass) {
	var oldIndex = index;
	io = string.indexOf(indicand,index);
	if (io === index) {
		index += indicand.length+1;
		var newIndex = string.indexOf('"',index);
		if (newIndex - index > 3) {
			return [oldIndex, string];
		}
		index = newIndex;
		index++;
		var insertion = '<span class="'+cssClass+'">';
		string = string.insert(index,insertion);
		index += insertion.length;
		
		index = string.indexOf('"',index);
		insertion = '</span>';
		string = string.insert(index,insertion);
		index += insertion.length;
	}
	return [index, string];
}

ledgerValidationModule.addSpecialColors = function(text) {
	var i=0;
	while (true) {
		if (i >= text.length) {
			break;
		}
		var arr = ledgerValidationModule.indicate(i, text, '"Account"', "b"); i = arr[0]; text = arr[1];
		arr = ledgerValidationModule.indicate(i, text, '"Destination"', "b"); i = arr[0]; text = arr[1];
		arr = ledgerValidationModule.indicate(i, text, '"issuer"', "b"); i = arr[0]; text = arr[1];
		arr = ledgerValidationModule.indicate(i, text, '"currency"', "y"); i = arr[0]; text = arr[1];
		arr = ledgerValidationModule.indicate(i, text, '"value"', "y"); i = arr[0]; text = arr[1];
		arr = ledgerValidationModule.indicate(i, text, '"TransactionType"', "y"); i = arr[0]; text = arr[1];
		arr = ledgerValidationModule.indicate(i, text, '"Amount"', "y"); i = arr[0]; text = arr[1];
		i++;
	}
	return text;
}

ledgerValidationModule.rowHeight = function(content) {
	var wid = $("#container").width();
	var linesHigh = Math.ceil(content.length / (wid/10));
	var pixelsHigh = ledgerValidationModule.LINE_HEIGHT * linesHigh - 3;
	return pixelsHigh;
}

ledgerValidationModule.waiting = false;
ledgerValidationModule.pendingTransactions = 0;
ledgerValidationModule.interval = setInterval(function(){
	if (!ledgerValidationModule.waiting) {
		if (ledgerValidationModule.lastDisplayedLedgerIndex) {
			if (ledgerValidationModule.eventQueue[ledgerValidationModule.lastDisplayedLedgerIndex]) {
				if (ledgerValidationModule.eventQueue[ledgerValidationModule.lastDisplayedLedgerIndex].length > 0) {
					var event = ledgerValidationModule.eventQueue[ledgerValidationModule.lastDisplayedLedgerIndex].pop()
					if (event.type === "ledgerClosed") {
						$("#eventsTable").prepend("<div class='ledger trow'></div>");
						var newRow = $("#eventsTable").find("div").first();
						var newText = JSON.stringify(event);
						var pixelsHigh = ledgerValidationModule.rowHeight(newText);
						newRow.text(newText);
						setTimeout(function(){
							$("#ledgerstate").text("CLOSED");
							newRow.css("height",pixelsHigh+"px");
							$("#header").css("color","lime").css("font-weight","bold");
							$("#ledgernumber").text(event.ledger_index);
						}, 10);
						setTimeout(function(){
							$("#eventsTable").find("div.transaction").css("height","19px");
						}, 500);
					} else if (event.type === "transaction") {
						$("#eventsTable").prepend("<div class='transaction trow'></div>");
						var newRow = $("#eventsTable").find("div").first();
						var newText = JSON.stringify(event.transaction);
						var pixelsHigh = ledgerValidationModule.rowHeight(newText);
						newRow.html(ledgerValidationModule.addSpecialColors(newText));
						ledgerValidationModule.pendingTransactions++;
						$("#pendingtransactions").text(ledgerValidationModule.pendingTransactions);
						setTimeout(function(){newRow.css("height",pixelsHigh+"px");}, 10);
					}
				} else {
					delete ledgerValidationModule.eventQueue[ledgerValidationModule.lastDisplayedLedgerIndex];
					ledgerValidationModule.waiting = true;
					setTimeout(function(){
						$("#eventsTable").find("div").remove();
						ledgerValidationModule.pendingTransactions = 0;
						$("#pendingtransactions").text(ledgerValidationModule.pendingTransactions);
						$("#ledgerstate").text("OPEN");
						$("#header").css("color","lightgray").css("font-weight","normal");
						ledgerValidationModule.lastDisplayedLedgerIndex += 1;
						ledgerValidationModule.waiting = false;
					},1500);
				}
			} else {
				if ((ledgerValidationModule.eventQueue[ledgerValidationModule.lastDisplayedLedgerIndex+1])) {
					ledgerValidationModule.lastDisplayedLedgerIndex += 1;
				}
			}
		}
	}
}, 2000);


