<?php //The template for displaying the archive Pages
get_header(); ?>

<section id="primary" class="content-area">
<div id="content" class="site-content" role="main">
    
<?php if( have_posts()) : ?>
<header class="page-header">
    <h1 class="page-title">
        
        <?php
        if(is_category()) {
            printf( __( 'Category Archives: %s', 'nik' ), '<span>' . single_cat_title( '', false ) . '</span>' );
 }
 
 elseif (is_tag()){
    printf( __( 'Tag Archives: %s', 'nik' ), '<span>' . single_tag_title( '', false ) . '</span>' );
}

elseif(is_author()) {
    the_post();
     printf( __( 'Author Archives: %s', 'nik' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
rewind_posts();
}

elseif ( is_day() ) {
                printf( __( 'Daily Archives: %s', 'nik' ), '<span>' . get_the_date() . '</span>' );
 
            } elseif ( is_month() ) {
                printf( __( 'Monthly Archives: %s', 'nik' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
 
            } elseif ( is_year() ) {
                printf( __( 'Yearly Archives: %s', 'nik' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
 
            } else {
                _e( 'Archives', 'nik' );
 
}
?>
    </h1>
    <?php
    if(is_category()) {
        $category_description = category_description();
        if (! empty($category_description))
        echo apply_filters('categories_archive_meta', '<div class="taxonomy-description>' . $category_description . '<div>');
}

elseif (is_tag()){
    $tag_description = tag_description();
    if(! empty($tag_description))
   
    echo apply_filters('tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>');
}
?>
</header><!-- .page-header -->

<?php ?>
<?php while ( have_posts() ) : the_post(); ?>

<?php
get_template_part('content', get_post_format());
?>
<?php endwhile; ?>

<?php else : ?>

<?php get_template_part('no-results', 'archive'); ?>

<?php endif; ?>
</div><!-- #content .site-content -->
</section><!-- #primary .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    








