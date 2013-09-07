<?php
/**
 * @package Ripple
 */
?>
<article>
        <header class="entry-header">
            <h2 class="callout">A Global Payment Network, Right Out of the Box.</h2>
        </header><!-- .entry-header -->


        <div class="entry-content">
            <!-- Begin Callout Box -->
              <div class="col-md-4">
                <a href="#" class="thumbnail">
                    <span class="icon-stack">
                        <i class="circle icon-stack-base"></i>
                        <i class="icon-circle icon-light"></i>
                    </span>
                <p>
                    <!-- Begin Custom Field  -->
                    <?php $list_item = get_post_meta($post->ID, 'Callout Box 1 Text', true);
                    if ($list_item) { ?>
                    <?php echo $list_item; ?>
                    <?php } 
                    else { ?>
                    Total network transactions
                    <?php } ?>
                    <!-- End Custom Field  -->
                </p>
                
                <p class="large">
                     <!-- Begin Custom Field  -->
                    <?php $list_item = get_post_meta($post->ID, 'Callout Box 1 Amount', true);
                    if ($list_item) { ?>
                    <?php echo $list_item; ?>
                    <?php } 
                    else { ?>
                     245, 000 k
                    <?php } ?>
                    <!-- End Custom Field  -->
                 </p>
                </a>
              </div>
              <!-- Begin Callout Box -->
              <div class="col-md-4">
                <a href="#" class="thumbnail">
                    <span class="icon-stack">
                        <i class="circle icon-stack-base"></i>
                        <i class="icon-circle icon-light"></i>
                    </span> 
                    <p>   
                    <!-- Begin Custom Field  -->
                    <?php $list_item = get_post_meta($post->ID, 'Callout Box 2 Text', true);
                    if ($list_item) { ?>
                    <?php echo $list_item; ?>
                    <?php } 
                    else { ?>
                    Total network transactions
                    <?php } ?>
                    <!-- End Custom Field  -->
                    </p>
                 <p class="large">
                     <!-- Begin Custom Field  -->
                    <?php $list_item = get_post_meta($post->ID, 'Callout Box 2 Amount', true);
                    if ($list_item) { ?>
                    <?php echo $list_item; ?>
                    <?php } 
                    else { ?>
                     245, 000 k
                    <?php } ?>
                    <!-- End Custom Field  -->
                 </p>
                </a>
              </div>
              <!-- Begin Callout Box -->
              <div class="col-md-4">
                <a href="#" class="thumbnail">
                    <span class="icon-stack">
                        <i class="circle icon-stack-base"></i>
                        <i class="icon-circle icon-light"></i>
                    </span>    
                 <p>Active Users</p>
                 <p class="large">
                    <!-- Begin Custom Field  -->
                    <?php $list_item = get_post_meta($post->ID, 'Callout Box 3 Amount', true);
                    if ($list_item) { ?>
                    <?php echo $list_item; ?>
                    <?php } 
                    else { ?>
                     245, 000 k
                    <?php } ?>
                    <!-- End Custom Field  -->
                 </p>
                </a>
              </div>
        </div><!-- .entry-content -->
</article><!-- #post-## -->