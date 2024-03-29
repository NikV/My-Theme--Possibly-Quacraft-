<?php //The template for displaying 404 pages

get_header(); ?>

<div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">
        
    <article id="post-0" class="post error404 not-found">
        <header class="entry-header">
            <h1 class="entry-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'nik'); ?></h1>
        </header><!-- .entry-header -->
        
    <div class="entry-content">
        <p><?php _e('It looks like nothing was found on this side of the website. Try a link or search below to find what you may be looking for.', 'nik'); ?></p>
        
        <?php get_search_form(); ?>
        
        <?php the_widget('WP_Widget_Recent_Posts'); ?>
        
        <div class="widget">
            <h2 class="widgettitle"><?php _e('Most Used Categories', 'nik'); ?></h2>
            <ul>
                <?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 )); ?>
                
            </ul>
        </div><!-- .widget -->
        <?php
        $archive_content = '<p>' . sprintf(__( 'Try Looking in the monthly archives. %1$s', 'nik'), convert_smilies(':)')) . '<p>';
        the_widget('WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content");
    ?>
    
    <?php the_widget('WP_Widget_Tag_Cloud'); ?>
    </div><!-- .entry-content -->
    </article><!-- #post-0 .post .error404 .not-found -->
    
    </div><!--conten .site-content -->
</div><!-- #primary .content-area -->

<?php get_footer(); ?>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    