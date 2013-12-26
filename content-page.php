<?php //Displaying Page content in page.php ?>

<article id="post-<php the_ID(); ?>"<?php post_class(); ?>>
<header class="entry-header">
    <h1 class="entry-title"><?php the_title(); ?></h1>
</header><!-- .entry-header -->
 <body style="width:100%;">
<div style="width:100%;background-color:red;">
    <div style="width:960px;margin:0 auto;">Content here</div>
</div> 
<div class="entry-content">
    <?php the_content(); ?>
   
    <?php wp_link_pages( array('before' => '<div class="page-links>' . __('Pages', 'nik'), 'after' => '</div>' )); ?>
    <?php edit_post_link( __('Edit', 'shape'), '<span class="edit-link">', '</span>' ); ?>
</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->