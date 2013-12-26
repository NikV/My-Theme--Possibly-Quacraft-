<?php //The template for displaying comments ?>

<?php

if(post_password_required())
return;
?>

<div id="comments" class="comments-area">
    
    <?php //You can start editing after this ?>
    
    <?php if(have_comments()) : ?>
    <h2 class="comments-title">
        <?php
        printf( _n( 'One thought on "%2$s&rdquo;', '%1$s thoughts on "%2$s&rdquo;', get_comments_number(), 'nik' ),
               number_format_i18n(get_comments_number()), '<span>' . get_the_title() . '</span>' );
        ?>
    </h2>
    
     <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through? If so, show navigation ?>
        <nav role="navigation" id="comment-nav-above" class="site-navigation comment-navigation">
            <h1 class="assistive-text"><?php _e( 'Comment navigation', 'nik' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'nik' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'nik' ) ); ?></div>
        </nav><!-- #comment-nav-before .site-navigation .comment-navigation -->
        <?php endif; // check for comment navigation ?>

        <ol class="commentlist">
            <?php
            //This code comes from template-tags.php, nik_comment()
            wp_list_comments( array( 'callback' => 'nik_comment' ));
            ?>
        </ol><!-- .commentlist -->
        
        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through? If so, show navigation ?>
        <nav role="navigation" id="comment-nav-below" class="site-navigation comment-navigation">
            <h1 class="assistive-text"><?php _e( 'Comment navigation', 'nik' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'nik' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'nik' ) ); ?></div>
        </nav><!-- #comment-nav-below .site-navigation .comment-navigation -->
        <?php endif; // check for comment navigation ?>
        
        <?php endif; //have_comments() ?>
        
         <?php
        // If comments are closed and there are comments, let's leave a little note, shall we?
        if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
    ?>
        <p class="nocomments"><?php _e( 'Comments are now closed.', 'nik' ); ?></p>
    <?php endif; ?>
        
        <?php comment_form(); ?>
        </div><!-- #comments .comments-area -->
        
        
        
        
        
        
        
        
        
         
