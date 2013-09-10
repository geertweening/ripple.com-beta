// Guide Nav Affixation
$(".guide-nav").affix({
    offset: {
        top: $(".guide-header").outerHeight(true) +1,
        bottom: $(".site-footer").outerHeight(true) + 177
    }
});

// Guide Nav Scrollspy
$('body').scrollspy({ target: '#scrollspy-nav' });

// attach bootstrap tooltip to the explanation div

    $(".developer-page").append('<span class="pull-right" id="explanation"><i class="icon-question-sign"></i></span>');
    $("#explanation").tooltip({
        title: "This is a visualization of transactions on the ripple network.\nCircles are actual wallets on the ripple network.  Lines represent payments moving between wallets.",
        placement: "left"
    });
