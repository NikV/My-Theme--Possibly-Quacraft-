<?php //The sidebar containing the main widget areas ?>
<div id="home" class="widget-area" role="complementary">
    <?php do_action('before_sidebar'); ?>
    <?php if(! dynamic_sidebar('home3')) : ?>
    
    
    
    <?php endif; //End sidebar widget area ?>
</div><!-- #secondary .widget-area -->