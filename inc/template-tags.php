<?php

//Custom Template tags for this theme

if ( ! function_exists( 'nik_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since Shape 1.0
 */
function nik_posted_on() {
    printf( __( 'Posted on <a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="byline"> by <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'nik' ),
        esc_url( get_permalink() ),
        esc_attr( get_the_time() ),
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() ),
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        esc_attr( sprintf( __( 'View all posts by %s', 'nik' ), get_the_author() ) ),
        esc_html( get_the_author() )
    );
}
endif;
 
/**
 * Returns true if a blog has more than 1 category
 *
 * @since Shape 1.0
 */
function nik_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
        // Create an array of all the categories that are attached to posts
        $all_the_cool_cats = get_categories( array(
            'hide_empty' => 1,
        ) );
 
        // Count the number of categories that are attached to the posts
        $all_the_cool_cats = count( $all_the_cool_cats );
 
        set_transient( 'all_the_cool_cats', $all_the_cool_cats );
    }
 
    if ( '1' != $all_the_cool_cats ) {
        // This blog has more than 1 category so nik_categorized_blog should return true
        return true;
    } else {
        // This blog has only 1 category so nik_categorized_blog should return false
        return false;
    }
}
 
/**
 * Flush out the transients used in nik_categorized_blog
 *
 * @since Shape 1.0
 */
function nik_category_transient_flusher() {
    // Like, beat it. Dig?
    delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'nik_category_transient_flusher' );
add_action( 'save_post', 'nik_category_transient_flusher' );


if (! function_exists('nik_comment')) :
//Template for comments and pingbacks
function nik_comment( $comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    switch ($comment->comment_type ) :
    case 'pingback':
    case 'trackback' :
    ?>
     <li class="post pingback">
        <p><?php _e( 'Pingback:', 'nik' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'nik' ), ' ' ); ?></p>
   <?php
          break;
        default;
            ?>
    


<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
<article id="comment-<?php comment_ID(); ?>" class="comment">
<footer>
    <div class"comment-author vcard">
        <?php echo get_avatar($comment, 40); ?>
        <?php printf( __( '%s <span class="says">says:</span>', 'nik' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
                </div><!-- .comment-author .vcard -->
                <?php if ( $comment->comment_approved == '0' ) : ?>
                    <em><?php _e( 'Your comment is awaiting moderation.', 'nik' ); ?></em>
                    <br />
                <?php endif; ?>
                
     <div class="comment-meta commentmetadata">
                    <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
                    <?php
                        /* translators: 1: date, 2: time */
                        printf( __( '%1$s at %2$s', 'nik' ), get_comment_date(), get_comment_time() ); ?>
                    </time></a>
                    <?php edit_comment_link( __( '(Edit)', 'nik' ), ' ' );
                    ?>
                </div><!-- .comment-meta .commentmetadata -->
            </footer>

            <div class="comment-content"><?php comment_text(); ?></div>
            
            <div class="reply">
                <?php comment_reply_link( array_merge( $args, array('depth' =>$depth, 'max-depth' => $args['max-depth'] ))); ?>
            </div><!-- .reply -->
            </article><!-- #comment-## -->
            
            <?php
            break;
        endswitch;
}
endif;

if ( ! function_exists( 'nik_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 *
 * @since Shape 1.0
 */
function nik_content_nav( $nav_id ) {
    global $wp_query, $post;
 
    if ( is_single() ) {
        $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
        $next = get_adjacent_post( false, '', false );
 
        if ( ! $next && ! $previous )
            return;
    }
 
    if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
        return;
 
    $nav_class = 'site-navigation paging-navigation';
    if ( is_single() )
        $nav_class = 'site-navigation post-navigation';
 
    ?>
    <nav role="navigation" id="<?php echo $nav_id; ?>" class="<?php echo $nav_class; ?>">
        <h1 class="assistive-text"><?php _e( 'Post navigation', 'nik' ); ?></h1>
 
    <?php if ( is_single() ) : // navigation links for single posts ?>
 
        <?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'nik' ) . '</span> %title' ); ?>
        <?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'nik' ) . '</span>' ); ?>
 
    <?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>
 
        <?php if ( get_next_posts_link() ) : ?>
        <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'nik' ) ); ?></div>
        <?php endif; ?>
 
        <?php if ( get_previous_posts_link() ) : ?>
        <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'nik' ) ); ?></div>
        <?php endif; ?>
 
    <?php endif; ?>
 
    </nav><!-- #<?php echo $nav_id; ?> -->
    <?php
}
endif; // nik_content_nav
