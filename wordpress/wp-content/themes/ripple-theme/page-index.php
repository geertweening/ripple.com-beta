<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Ripple</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/responsive.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/jquery.rs.carousel.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/landing.css">

    <script src="<?php echo get_template_directory_uri() ?>/js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body class="home">
<!--[if lt IE 7]>
<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser
    today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better
    experience this site.</p>
<![endif]-->

<!-- HEADER -->
<header>
    <div class="wrapper clearfix">
        <div id="logo" class="clearfix">
            <a href="index.html"><img src="<?php echo get_template_directory_uri() ?>/img/logo-home.png" /></a>
            <div class="slogan">The world's open payment network</div>
        </div>
    </div>
</header>
<!-- ENDS HEADER -->

<!-- banner -->
<div class="banner-holder clearfix">
    <div class="bg-holder">
        <div class="wrapper clearfix">
            <div class="tagline">Send money to anyone, anywhere</div>
            <a href="/client" class="call-to-action">
                <span class="hover"></span>
                <span class="text">start ripple</span>
            </a>
        </div>
    </div>
</div>
<!-- ENDS banner -->

<!-- main buttons -->
<div class="wrapper clearfix">
    <ul class="main-buttons clearfix">
        <li class="bitcoin"><a href="/bitcoiners"></a></li>
        <li class="merchants"><a href="/merchants"></a></li>
        <li class="developers"><a href="/developers"></a></li>
    </ul>
</div>
<!-- ENDS main buttons -->

<!-- MAIN -->
<div id="main">
    <div class="wrapper clearfix">

        <h1>What is ripple?</h1>
        <p class="heading-desc">Simple, global, open, and practically free. ripple is an open source person to person payment network</p>
        <div id="slides">
            <ul class="pagination">
                <li class="active"><a href="slideSimple"><i class="one"></i>Simple</a></li>
                <li><a href="slideFree"><i class="four"></i>Free(ish)</a></li>
                <li><a href="slideGlobal"><i class="three"></i>Global</a></li>
                <li><a href="slideFlexible"><i class="two"></i>Truly Open</a></li>
            </ul>
            <div class="slide">
                <ul class="rs-carousel-runner">
                    <li class="rs-carousel-item" id="slideSimple">
                        <p class="slide-h1">Ripple is Simple</p>
                        <a href="/about-ripple"><img src="<?php echo get_template_directory_uri() ?>/img/simple.png"></a>

                        <p>Think online cash. No profiles to make. No forms for personal info. Unlike other payment systems, ripple does
                            not need or want your personal data.</p>
                    </li>
                    <li class="rs-carousel-item" id="slideFree">
                        <p class="slide-h1">Don't spend to send</p>
                        <a href="/about-ripple"><img src="<?php echo get_template_directory_uri() ?>/img/freeish.png"></a>

                        <p>Ripple is not technically free, because for security reasons each transaction costs the
                            equivalent of 1/100th of a cent. But it's still practically free. </p>
                    </li>
                    <li class="rs-carousel-item" id="slideGlobal">
                        <p class="slide-h1">Anywhere, instantly</p>
                        <a href="/about-ripple"><img src="<?php echo get_template_directory_uri() ?>/img/global.png"></a>

                        <p>Wherever there is internet, there is ripple. So your money can reach your mom in Mexico, your
                            friend in Thailand, or that developer you hired in Bangladesh. In pesos, baht, or taka.</p>
                    </li>
                    <li class="rs-carousel-item" id="slideFlexible">
                        <p class="slide-h1">Ripple is Open</p>
                        <a href="/about-ripple"><img src="<?php echo get_template_directory_uri() ?>/img/open.png"></a>

                        <ul>
                            <li>Anyone can use it.</li>
                            <li>No one owns it.</li>
                            <li>The software is open source.</li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
        <p class="learn-more"><a href="/about-ripple/">Learn More</a></p>

        <hr />

        <h1>How does it work?</h1>
        <p class="heading-desc">ripple is a single unified system that doesn’t require ACH, banks, or credit card
            networks, ripple avoids many of the obstacles that drive other systems’ fees and hassles. ripple also
            automatically exchanges currencies within the platform to make global payments easy. Finally, ripple is
            truly open. No one owns it. Anyone can use it. It’s open source, so anyone can build on top of it.
        </p>
        <div class="section-image">
            <img src="<?php echo get_template_directory_uri() ?>/img/how.png" alt="How does it work?" title="How does it work?" />
        </div>
        <p class="learn-more"><a href="/how-ripple-works/">Learn More</a></p>

        <hr />

        <h1>Advanced uses of ripple</h1>
        <p class="heading-desc">Many prefer the simplest use of ripple, but others may be interested in the rich
            possibilities it provides for getting more involved. See how you can use ripple to facilitate more
            transactions within your network, act as your own paypal, or buy and sell currency.
        </p>
        <div class="section-image">
            <img src="<?php echo get_template_directory_uri() ?>/img/advanced.png" alt="Advanced uses of ripple" title="Advanced uses of ripple" />
        </div>
        <p class="learn-more"><a href="/working-with-ripple/">Learn More</a></p>
    </div>

</div>
<!-- ENDS main -->

<?php get_footer() ?>
