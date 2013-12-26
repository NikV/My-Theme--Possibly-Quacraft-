<?php
//The template for single posts
get_header(); ?>

<div id="primary" class="content-area">
<div id="content" class="site-content" role="main">
    
    <?php while ( have_posts()): the_post(); ?>
    
    
    <div class="one-post"> 
    <?php get_template_part('content', 'single'); ?>
    <div id="authorarea">
<?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '100' ); }?>
<div class="authorinfo">
<h3>About <?php the_author_posts_link(); ?></h3>
<p><?php the_author_meta('description') ?> </p>
</div>
</div>
    <?php
    global $post;
if ( user_can( $post->post_author, 'administrator' ) ) {
  echo 'Administrator';
} elseif ( user_can( $post->post_author, 'editor' ) ) {
  echo 'Editor';
} elseif ( user_can( $post->post_author, 'author' ) ) {
  echo 'Author';
} elseif ( user_can( $post->post_author, 'contributor' ) ) {
  echo 'Contributor';
} elseif ( user_can( $post->post_author, 'subscriber' ) ) {
  echo 'Subscriber';
} else {
  echo '<strong>Guest</strong>';
  
}
?>
    </div>
     <?php nik_content_nav('nav-below'); ?>
     <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() )
                        comments_template( '', true );
                ?>
                
 

    <?php endwhile; ?>





    
</div><!-- #content .site-content -->
</div><!-- #primary .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>