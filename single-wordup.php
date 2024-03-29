<?php
//The template for single posts
get_header(); ?>

<div id="primary" class="content-area">
<div id="content" class="site-content" role="main">
    
    <?php while ( have_posts()): the_post(); ?>
     
    <?php get_template_part('content', 'single'); ?>
    
   
    
     <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() )
                        comments_template( '', true );
                ?>
                
    <?php endwhile; ?>
    
</div><!-- #content .site-content -->
</div><!-- #primary .content-area -->


<?php get_footer(); ?>