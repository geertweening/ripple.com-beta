// Guide Nav Affixation
$(".guide-nav").affix({
    offset: {
        top: $(".guide-header").outerHeight(true) +1,
        bottom: $(".site-footer").outerHeight(true) + 130
    }
});

// Guide Nav Scrollspy
$('body').scrollspy({ target: '#scrollspy-nav' });

// attach bootstrap tooltip to the explanation div

    $(".developer-page").append('<span class="pull-right" id="explanation2"><i class="icon-question-sign"></i></span>');
    $("#explanation2").tooltip({
        title: "This feed shows the live stream of transactions being received by a Ripple server. When the network has come to consensus on the set of valid transactions, the ledger is closed.",
        placement: "left"
    });


