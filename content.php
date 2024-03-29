<?php ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="entry-header">
    <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'nik' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
 
 <?php if ('post' == get_post_type()): ?>
 <div class="entry-meta">
    
    <?php nik_posted_on(); ?>
        
 </div><!-- .entry-header -->
 <?php endif; ?>
</header><!-- .entry-header -->

<?php if( is_search()) : //Only display Excerpts for search ?>
<div class="entry-summary">
    <?php the_excerpt(); ?>
</div><!-- .entry-summary -->
<?php else: ?>
<div class="entry-content">
        <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'nik' ) ); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'nik' ), 'after' => '</div>' ) ); ?>
    </div><!-- .entry-content -->
    <?php endif; ?>
    
<footer class="entry-meta">
    <?php if('post' == get_post_type()) : ?>
    <div class="entry-meta">
           
        </div><!-- .entry-meta -->
    
    <?php
    $tag_list = get_the_tag_list('', __(',', 'nik'));
    if ($tags_list) :
    ?>
    <span class="sep"> | </span>
    <span class="tag-links">
        <?php printf(__('Tagged %1$s', 'nik'), $tags_list); ?>
    </span>
    
    
    <?php endif; ?>
    <?php endif; ?>
    
     <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
          <span class="sep">  </span>
          <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'nik' ), __( '1 Comment', 'nik' ), __( '% Comments', 'nik' ) ); ?></span>
          <?php endif; ?>
          
          <?php edit_post_link(__('Edit', 'nik'),'<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
          
          
</footer><!-- .entry-meta -->
<?php //Close the article and the loop ?>
</article><!-- #post-<?php the_ID(); ?> -->

    
    
    
    
    
    
    
    
    