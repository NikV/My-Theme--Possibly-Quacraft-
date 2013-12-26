<?php //The template for displaying all pages
get_header(); ?>

<div id="primary" class="content-area">
   
   

        
    <div id="content" class="site-content" >
         
        <?php while( have_posts()) : the_post(); ?>
        <div class="one-post">
        <?php get_template_part('content', 'page'); ?>
        
        </div>
        <?php comments_template('', true); ?>
        
       
       

        <?php endwhile; ?>
        
    </div><!-- #content .site-content -->
    
</div><!-- #primary .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

