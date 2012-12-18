<?php 
/*
* Regular page
*
*/
?>

<?php get_header() ?>

	<?php get_template_part('includes/subnav-howitworks') ?>
	
	<!-- MAIN -->
	<div id="main" class="howitworks">
		<!-- WRAPPER -->
		<div class="wrapper cf">
   		
			<?php the_post() ?>
		
			<!-- Content area -->
			<div class="content-area">
				<div class="entry-content">
<!--					--><?php //the_content() ?>
                    <h3 class="title"><a id="technical-summary">Technical Summary</a></h3>

                    <div class="block">
                        <img alt="P2P" src="<?php bloginfo('template_directory'); ?>/img/p2p.png" class="left" />
                        <div class="text right">
                            <h4>P2P Network</h4>
                            <p>At its heart, ripple is a network of shared information. It's not housed on a central server but is powered by all the servers around the globe running the free ripple software. These servers share and sync information to keep current a distributed database.</p>
                        </div>
                    </div>
                    <div class="block">
                        <img alt="Ledger" src="<?php bloginfo('template_directory'); ?>/img/ledger.png" class="right" />
                        <div class="text left">
                            <h4>The Ledger</h4>
                            <p>This database is called the Ledger. The Ledger keeps track of accounts and balances. The time it takes to move money within the ripple network is the time it takes to update the Ledger. The network updates the Ledger every few seconds.</p>
                        </div>
                    </div>
                    <div class="block">
                        <img alt="Consensus" src="<?php bloginfo('template_directory'); ?>/img/consensus.png" class="left" />
                        <div class="text right">
                            <h4>Consensus</h4>
                            <p>Ledger updates occur through a process called Consensus. Consensus is the process by which all the servers in the network verify and agree upon a common view of the database. Only legitimate transactions make it to Consensus and enter the Ledger.</p>
                        </div>
                    </div>

                    <h3 class="title"><a id="virtual-currency">Virtual Currency</a></h3>

                    <div class="block">
                        <img alt="Ripple Credits" src="<?php bloginfo('template_directory'); ?>/img/ripplecoin.png" class="right" />
                        <div class="text left">
                            <h4>Ripple Credits</h4>
                            <p>Ripple contains a virtual currency, called ripple credits (XRP).</p>
                            <p>These are used to pay the small fee (~ 1/1000th of a cent) required by the network for each transaction. They can also be sent between any two accounts, converted into other currencies, or spent at venues that accept them.</p>
                            <p>The network was created with a fixed and finite number of credits (100 billion). No more can be made.</p>
                        </div>
                    </div>

                    <div class="window-title">Fees</div>
                    <div class="window">
                        <p>While ripple does not charge a typical fee, each transaction does require a small portion of a ripple credit for security.</p>
                        <p>This fractional cost is required by the network to prevent someone from sending millions of transactions and bogging down the system.</p>
                        <p>No one collects these amounts. They are simply destroyed within the system. The effect is the same as redistributing them evenly to all the ripple account holders in proportion to their account balance.</p>
                    </div>

                    <h3 class="title"><a id="the-open-platform">The Open Platform</a></h3>

                    <div class="block">
                        <img alt="Open Source" class="left" src="<?php bloginfo('template_directory'); ?>/img/open.png" />
                        <div class="text right">
                            <h4>Open for all</h4>
                            <p>Ripple is fundamentally an open platform. Like http, it's an open protocol, but for money. Anyone can build on top of it, the way anyone can use it. So eventually there will be still other ways that ripple works.</p>
                            <a href="#">View the ripple documentation.</a>
                            <a href="#">Check out the ripple code.</a>
                        </div>
                    </div>
                </div>
			</div>
		    <!-- ENDS content area -->
		
		</div>
		<!-- ENDS WRAPPER -->

        <div class="call-to-action">
            <div class="bg">
                <a href="#">
                    <img src="<?php bloginfo('template_directory'); ?>/img/call-to-action.png" alt="Start Ripple">
                </a>
            </div>
        </div>

        <div class="find-more">Find out more about ripple</div>

        <ul class="main-buttons">
            <li class="bitcoin"><a href="#"></a></li>
            <li class="merchants"><a href="#"></a></li>
            <li class="developers"><a href="#"></a></li>
        </ul>

	</div>
	<!-- ENDS MAIN -->

		
<?php get_footer() ?>