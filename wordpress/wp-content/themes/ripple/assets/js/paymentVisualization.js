// pvm stands for paymentVisualizationModule
// note the last line: var paymentVisualizationModule = pvm;
var pvm = {};

// setup DOM elements
$(document).ready(function() {

   

    pvm.WIDTH = $('#visualization').width();
    pvm.HEIGHT = $('#visualization').height();

    // D3JS SVG Setup
    pvm.svg = d3.select("#visualization")
        .append("svg:svg")
        .attr("width", pvm.WIDTH)
        .attr("height", pvm.HEIGHT)
        .attr("pointer-events", "all")
        .call(d3.behavior.zoom({
            dblclick: false,
            wheel: false
        }));
    pvm.svg.on("mousewheel.zoom", null);

     // attach bootstrap tooltip to the explanation div

    $("#visualization").append('<span class="pull-right" id="explanation"><i class="icon-question-sign"></i></span>');
    $("#explanation").tooltip({
        title: "This is a visualization of transactions on the ripple network.\nCircles are actual wallets on the ripple network.  Lines represent payments moving between wallets.",
        placement: "left"
    });

    pvm.linkGroup = pvm.svg.append("g").attr("id", "linkGroup");
    pvm.labelGroup = pvm.svg.append("g").attr("id", "labelGroup");
    pvm.nodeGroup = pvm.svg.append("g").attr("id", "nodeGroup");

    // Set the force options for D3JS
    pvm.force = d3.layout.force()
        .size([pvm.WIDTH, pvm.HEIGHT])
        .friction(0.2).gravity(0)
        .charge(-800).nodes([]).links([]).start();

    pvm.force.on("tick", function(e) {
        var node = pvm.svg.selectAll("circle.node");
        node.attr("cx", function(d) {
            return d.x;
        })
            .attr("cy", function(d) {
                return d.y;
            });
        var link = pvm.svg.selectAll("line");
        link.attr("x1", function(d) {
            return d.source.x;
        })
            .attr("y1", function(d) {
                return d.source.y;
            })
            .attr("x2", function(d) {
                var xdif = d.target.x - d.source.x;
                var offset = 0;
                if (xdif != 0) {
                    offset = d.r2 / Math.sqrt(1 + Math.pow((d.target.y - d.source.y) / xdif, 2))
                }
                if (xdif < 0) {
                    offset *= -1;
                }
                return d.target.x - offset;
            })
            .attr("y2", function(d) {
                var xdif = d.target.x - d.source.x;
                var offset = 0;
                if (xdif != 0) {
                    var slope = (d.target.y - d.source.y) / xdif;
                    offset = d.r2 * slope / Math.sqrt(1 + Math.pow(slope, 2))
                } else {
                    offset = d.r2 * (slope ? slope < 0 ? slope - 1 : 1 : 0);
                }
                if (xdif < 0) {
                    offset *= -1;
                }
                return d.target.y - offset;
            });
        var label = pvm.svg.selectAll("foreignObject");
        label.attr("x", function(d) {
            return (d.source.x + d.target.x) / 2 - 82
        }).attr("y", function(d) {
            return (d.source.y + d.target.y) / 2 - 26
        })
    });
}); // end of DOM setup



// tx_stack is this module's stack of (payment) transactions to display
pvm.tx_stack = [];

// tx_counter is used to set unique id's for new nodes as they are created
pvm.tx_counter = 0;

// load the recent transactions from the json data file
pvm.loadHistoricalData = function(json_data) {
    pvm.tx_stack = json_data["recent_payments"].concat(pvm.tx_stack);
    pvm.startInterval();
};

// catch new events as they are passed in by the ripple-lib listener
pvm.handleNewEvent = function(new_event) {
    if (new_event.type === "transaction") {
        var tx = new_event.transaction;
        if (tx.TransactionType === "Payment") {
            pvm.tx_stack.push(tx);
        }
    }
};

// run the intervalFunction once and then set it to run every 3 seconds
pvm.startInterval = function() {
    pvm.intervalFunction();
    setInterval(pvm.intervalFunction, 3000);
};

// pop one transaction off the tx_stack and render it using D3JS
pvm.intervalFunction = function() {
    if (pvm.tx_stack.length > 0) {
        var tx = pvm.tx_stack.pop();
        pvm.renderTransaction(tx);
    } else {}
};

// generate coordinates for the new nodes, add them to d3,
// and set a timeout for them to disappear
pvm.renderTransaction = function(tx) {

    var nodeData = pvm.generateNodeCoordinates(tx);
    pvm.addNodesToD3(nodeData);

    // set the timeout for the line animation
    setTimeout(function() {
        var animator = $("#link" + nodeData.id);
        pvm.animateLine(animator, true, 0.1, function(animator2) {
            setTimeout(function() {
                pvm.animateLine(animator2, false, 0.1);
            }, 3000);
        });
    }, 200);
};

// creates and returns an object that stores the new node coordinates
// information about the link that connects them
pvm.generateNodeCoordinates = function(tx) {
    var nodes = pvm.force.nodes();
    var x1, y1, x2, y2;

    // Pick coordinates for the new nodes such that the line connecting them
    // does not intersect any of the existing lines and s.t. it is longer than 75 (arbitrary number)
    endless: while (true) {
        x1 = (Math.random() * .8 + .1) * pvm.WIDTH;
        y1 = (Math.random() * .8 + .1) * pvm.HEIGHT;
        x2 = (Math.random() * .8 + .1) * pvm.WIDTH;
        y2 = (Math.random() * .8 + .1) * pvm.HEIGHT;

        if (nodes.length < 2)
            break;
        var intersectsAny = false;
        for (var n = 0, l = nodes.length - 1; n < l; n += 2) {
            if (doesIntersect(x1, y1, x2, y2, nodes[n].x, nodes[n].y, nodes[n + 1].x, nodes[n + 1].y)) {
                intersectsAny = true;
                break;
            }
        }
        var lineLength = length(x1, y1, x2, y2);
        if (!intersectsAny && lineLength > 75)
            break;
    }

    function doesIntersect(x1, y1, x2, y2, x3, y3, x4, y4) {
        var a1 = (y2 - y1) / (x2 - x1),
            b1 = y1 - a1 * x1,
            a2 = (y4 - y3) / (x4 - x3),
            b2 = y3 - a2 * x3;
        if (((y2 - y1) * (x4 - x3)) === ((x2 - x1) * (y4 - y3))) {
            return false;
        }
        var x0 = -(b1 - b2) / (a1 - a2);
        return ((Math.min(x1, x2) < x0) && (x0 < Math.max(x1, x2)) &&
            (Math.min(x3, x4) < x0) && (x0 < Math.max(x3, x4)));
    }

    function length(x1, y1, x2, y2) {
        var aSquared = Math.pow(x1 - x2, 2),
            bSquared = Math.pow(y1 - y2, 2);
        return Math.sqrt(aSquared + bSquared);
    }

    function getCurrency(amount) {
        if (amount.hasOwnProperty('currency')) {
            return amount.currency;
        } else {
            return "XRP";
        }
    }

    var source = {
        x: x1,
        y: y1,
        id: pvm.tx_counter,
        color: pvm.HIGH_SATURATION_COLORS[getCurrency(tx.Amount)],
        finalr: 10 + 40 * Math.random()
    };
    pvm.tx_counter++;
    var target = {
        x: x2,
        y: y2,
        id: pvm.tx_counter,
        color: pvm.HIGH_SATURATION_COLORS[getCurrency(tx.Amount)],
        finalr: 10 + 40 * Math.random()
    };
    pvm.tx_counter++;

    var linkID = source.id + "_" + target.id;

    var nodeData = {
        source: source,
        target: target,
        id: linkID,
        r1: source.finalr,
        r2: target.finalr,
        amount: tx.Amount
    };

    return nodeData;
}


// Use D3 to add the nodes, line, and label reresenting a new transaction to the SVG
pvm.addNodesToD3 = function(nodeData) {

    // Add nodes to the force layout
    var newNodes = [nodeData.source, nodeData.target];
    var nodes = pvm.force.nodes();
    nodes = nodes.concat(newNodes);
    pvm.force.nodes(nodes);

    var timer;
    var node = pvm.svg.select("g#nodeGroup").selectAll("circle.node").data(nodes)
        .enter().append("svg:circle")
        .attr("class", "node")
        .style("opacity", "0.2")
        .style("stroke-width", "1")
        .style("stroke", "white")
        .attr("id", function(d) {
            return d.id;
        })
        .attr("title", function(d) {
            return d.id;
        })
        .style("fill", function(d) {
            return d.color;
        })
        .attr("cx", function(d) {
            return d.x;
        })
        .attr("cy", function(d) {
            return d.y;
        })
        .style("cursor", "pointer")
        .attr("finalr", function(d) {
            return d.finalr;
        })
        .attr("r", 0);

    node.call(pvm.force.drag);

    var link = pvm.svg.select("g#linkGroup").selectAll("line").data([nodeData], function(d) {
        return d.id
    })
        .enter().append("svg:line")
        .style("stroke", "white")
        .style("opacity", "0.2")
        .attr("r1", function(d) {
            return d.r1;
        })
        .attr("r2", function(d) {
            return d.r2;
        })
        .attr("id", function(d) {
            return "link" + d.id;
        })
        .attr("stroke-width", 1)
        .style("stroke-dasharray", "0 999999");

    var label = pvm.svg.select("g#labelGroup")
        .selectAll("foreignObject")
        .data([nodeData], function(d) {
            return d.id
        })
        .enter()
        .append("svg:foreignObject")
        .attr("width", 164)
        .attr("height", 54)
        .attr("x", function(d) {
            return (d.source.x + d.target.x) / 2 - 82
        })
        .attr("y", function(d) {
            return (d.source.y + d.target.y) / 2 - 26
        });

    label.append("xhtml:div")
        .attr("class", "transactionLabel")
        .text(function(d) {
            var value;
            if (d.amount.currency) {
                value = d.amount.value;
            } else {
                value = parseInt(d.amount) / 1000000;
            }
            return value.toString() + " ";
        })
        .append("xhtml:span")
        .attr("class", "currencyName")
        .text(function(d) {
            var currency;
            if (d.amount.currency) {
                currency = d.amount.currency;
            } else {
                currency = "XRP";
            }
            return currency;
        });

    pvm.force.start();

    $("circle.node[r=0]").each(function(i, n) {
        pvm.animateAttr("#" + $(n).attr("id"), "r", $(n).attr("finalr"), 100);
    });

    // use this setTimeout to have the nodes and line disappear nicely after a few sec
    setTimeout(function() {
        pvm.animateAttr("#" + newNodes[0].id, "r", 0, 50);
        pvm.animateAttr("#" + newNodes[1].id, "r", 0, 100);
        setTimeout(function() {
            node.remove();
            link.remove();
            label.remove();

            // Remove the nodes from the d3 force layout
            var nodes = pvm.force.nodes();
            nodes = nodes.filter(function(v, i) {
                var found = false;
                newNodes.forEach(function(v2, i2) {
                    if (v.id === v2.id) {
                        found = true;
                    }
                });
                return !found;
            });
            pvm.force.nodes(nodes);
        }, 100);

    }, 3600);
};


pvm.HIGH_SATURATION_COLORS = {
    "__N": "#f00", //RED	
    "BTC": "#fa0", //ORANGE
    "JPY": "#af0", //YELLOW
    "USD": "#0f0", //LIME
    "AUD": "#0fa", //GREEN
    "XRP": "#0af", //BLUE
    "___": "#00f", //INDIGO
    "CAD": "#a0f", //VIOLET
    "EUR": "#f0a" //PINK
};




pvm.lineLength = function(line) {
    var aSquared = Math.pow((line.attr("x1") - line.attr("x2")), 2);
    var bSquared = Math.pow((line.attr("y1") - line.attr("y2")), 2);
    return Math.sqrt(aSquared + bSquared);
};




pvm.animateLine = function(animator, onOrOff, speed, callback) {
    var pct = 0;
    var startRadius = parseInt(animator.attr("r1"));
    var fullLineLength = (pvm.lineLength(animator) - startRadius); // -r1-r2
    var interval = setInterval(function() {
        var len = fullLineLength * pct;
        if (onOrOff == true) { //If we're turning it on
            animator.css("stroke-dasharray", "0 " + startRadius + " " + len + " 999999");
        } else { //If we're turning it off
            animator.css("stroke-dasharray", "0 " + startRadius + " 0 " + len + " 999999");
        }
        pct += speed;
        if (pct >= 1) {
            if (onOrOff == true) {
                animator.css("stroke-dasharray", "0 " + startRadius + " 999999");
            } else {
                animator.css("display", "none");
            }
            clearInterval(interval);
            if (callback) {
                callback(animator);
            }
        }
    }, 20);
};


// pvm.animateAttr is used to expand and shrink the nodes when they are inserted and
// before they are removed
pvm.animateAttr = function(jQuerySelector, attribute, finalValue, duration) {
    var interval;
    var selection = $(jQuerySelector);
    if ("undefined" === typeof duration) {
        duration = 1000;
    }
    var initialValue = $(jQuerySelector).attr(attribute);
    var value = initialValue;
    var incrementPerMillisecond = (finalValue - initialValue) / duration;

    var increasing = incrementPerMillisecond > 0;
    interval = setInterval(function() {
        value = parseFloat(value) + (15 * incrementPerMillisecond);
        if (increasing && value >= finalValue || !increasing && value <= finalValue) {
            clearInterval(interval);
            value = finalValue;
        }
        if (value < 0) {
            alert(value + " TOWARDS " + finalValue + " INCREASING?" + increasing);
        };
        selection.attr(attribute, value);
    }, 15);
};

pvm.resizeNodes = function(radius) {
    pvm.animateAttr(".node", "r", radius, 400);
};

var paymentVisualizationModule = pvm;