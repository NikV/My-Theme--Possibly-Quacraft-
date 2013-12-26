<?php
/**
 * Nik Content-single
 */
?>
 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>

        <div class="entry-meta">
            <?php nik_posted_on(); ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->
 
    <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'shape' ), 'after' => '</div>' ) ); ?>
    
    
     <?php get_the_author_meta('description'); ?>
 
    </div><!-- .entry-content -->
 
 
 
    <footer class="entry-meta">
        <?php
            /* translators: used between list items, there is a space after the comma */
            $category_list = get_the_category_list( __( ', ', 'nik' ) );
 
            /* translators: used between list items, there is a space after the comma */
            $tag_list = get_the_tag_list( '', ', ' );
            
            if(! nik_categorized_blog()){
                if ( '' != $tag_list ) {
                    $meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'nik' );
                } else {
                    $meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'nik' );
                }
            }
            
            else{
                if('' !=$tag_list){
                    $meta_text = __('This entry was posted in %1$s and tagged %2$s.', 'nik' );
                }
                else {
                    $meta_text = __('This entry was posted in %1$s.' , 'nik');
                }
                
                
            }
 
  printf(
                $meta_text,
                $category_list,
                $tag_list,
                get_permalink(),
                the_title_attribute( 'echo=0' )
            );
        ?>
        
       
        
       

    <div class="custom-field">
    <?php the_meta(); ?>
 </div><!-- .custom-field -->
    </footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->