<!-- HEADER -->
<?php get_header(); ?>

<!-- ENDS HEADER -->

<!-- banner -->
<div class="banner-holder clearfix">
    <div class="bg-holder">
        <div class="wrapper clearfix">
            <!--start email call to action-->
            <div class="tagline">The world's first open payment network</div>
            <div id="email-collect">
                <h2>sign up to get your spot when we open to all</h2>
                <form action="http://opencoin.us4.list-manage.com/subscribe/post?u=245dbc1c47849f034390dc5bf&amp;id=706ebe5aff" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate="">
                    <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required="">
                    <input type="submit" value="Get your Spot!" name="subscribe" id="mc-embedded-subscribe" class="button">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ENDS banner -->


<!-- MAIN -->
<div id="main">
    <div class="wrapper clearfix">
        <ul id="ripple-features">
            <li id="global"><h1>any currency</h1>
                <div class="feature-image"><img src="<?php echo get_site_url() ?>/wp-content/uploads/2013/01/what3.png" /></div>
                <p>Send money in dollars, euros, yen or Bitcoin. No added work or fees for foreign transactions.</p>
            </li>
            <li id="instant"><h1>instant</h1>
                <div class="feature-image"><img src="<?php echo get_site_url() ?>/wp-content/uploads/2012/12/fast-150x150.png" /></div>
                <p>Transactions are confirmed within seconds. No more waiting days for bank transfers.</p>
            </li>
            <li id="low-fee"><h1>free(ish)</h1>
                <div class="feature-image"><img src="<?php echo get_site_url() ?>/wp-content/uploads/2013/01/what4.png" /></div>
                <p>Say goodbye to 2-3% fees. Your money should belong to you.</p>
            </li>
            <li id="open"><h1>truly open</h1>
                <div class="feature-image"><img src="<?php echo get_site_url() ?>/wp-content/uploads/2012/12/open.png" /></div>
                <p>No restrictions, minimum fees or penalties. You are in control.</p>
            </li>
        </ul>
    </div>

</div>
<!-- ENDS main -->

<?php get_footer() ?>
