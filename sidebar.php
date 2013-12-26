<?php //The sidebar containing the main widget areas ?>
<div id="secondary" class="widget-area" role="complementary">
    <?php do_action('before_sidebar'); ?>
    <?php if(! dynamic_sidebar('sidebar-1')) : ?>
    
    
    <?php endif; //End sidebar widget area ?>
</div><!-- #secondary .widget-area -->
 
<div id="tertiary" class="widget-area">
    <?php dynamic_sidebar('sidebar-2'); ?>
</div><!-- #tertiary .widget-area -->