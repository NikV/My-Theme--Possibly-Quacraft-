<?php
/**
 *Nik's Theme Functions and defenitions
 */

if (! isset($content_width))
$content_width = 654;

if (! function_exists('nik_setup')):

function nik_setup(){
    
   /**
     * Custom template tags for this theme.
     */
    require( get_template_directory() . '/inc/template-tags.php' );
 
    /**
     * Custom functions that act independently of the theme templates
     */
    require( get_template_directory() . '/inc/tweaks.php' );
 
    
    //Add Default Posts and comment RSS Feed Links
    add_theme_support('automatic_feed_links');
    
    //Enable support for Aside Post Format
    add_theme_support('post-formats', array('aside'));
    
    //This Theme uses wp_nav_menu() in one location
    register_nav_menus( array(
        'primary' => __('Primary Menu', 'nik'),
        
        
        )
                       
     );
        
}
endif;
add_action('after_setup_theme', 'nik_setup');

/*
 * Register Sidebar Widget area
 *
 * @since Nik 1.0
 * */
function nik_widgets_init(){
    register_sidebar( array(
        'name' => __('Primary Widget Area', 'nik'),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
        ));
    
    register_sidebar( array(
        'name' => __('Secondary Widget Area', 'nik'),
        'id' => 'sidebar-2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
        ));
    
    register_sidebar( array(
  'name' => __( 'Header Widgets Area', 'twentytwelve' ),
  'id' => 'sidebar-header',
  'description' => __( 'A new header widgets area for my child them' ,  'twentytwelve' ),
  'before_widget' => '<aside class="right-widget">',
  'after_widget' => '</aside>',
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
) );
    
    register_sidebar( array(
  'name' => __( 'home', 'nik' ),
  'id' => 'homephp',
  'description' => __( 'A new header widgets area for my child them' ,  'twentytwelve' ),
  'before_widget' => '<aside class="right-widget">',
  'after_widget' => '</aside>',
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
) );

  register_sidebar( array(
  'name' => __( 'home2', 'nik' ),
  'id' => 'homephp2',
  'description' => __( 'A new header widgets area for my child them' ,  'twentytwelve' ),
  'before_widget' => '<aside class="right-widget">',
  'after_widget' => '</aside>',
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
) );

register_sidebar( array(
  'name' => __( 'Homewide', 'nik' ),
  'id' => 'homephpwidewidget',
  'description' => __( 'A new header widgets area for my child them' ,  'twentytwelve' ),
  'before_widget' => '<aside class="right-widget">',
  'after_widget' => '</aside>',
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
) );
    
    
register_sidebar( array(
  'name' => __( 'home3', 'nik'),
  'id' => 'homephpwide3',
  'description' => __( 'A new header widgets area for my child them' ,  'twentytwelve' ),
  'before_widget' => '<aside class="right-widget">',
  'after_widget' => '</aside>',
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
) );
    
    }
        
        add_action('widgets_init', 'nik_widgets_init');
        
        

//Enqueue scripts and styles
function nik_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
 
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
 
    wp_enqueue_script( 'navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
 
    if ( is_singular() && wp_attachment_is_image() ) {
        wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
    }
}
add_action( 'wp_enqueue_scripts', 'nik_scripts' );

add_filter( 'the_author', 'guest_author_name' );
add_filter( 'get_the_author_display_name', 'guest_author_name' );

function guest_author_name( $name ) {
global $post;

$author = get_post_meta( $post->ID, 'guest-author', true );

if ( $author )
$name = $author;

return $name;
}

//Add support for post thumbnails
add_theme_support('post-thumbnails');

set_post_thumbnail_size( 50, 50);

//Enable Walker Class
class Menu_With_Description extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '<br /><span class="sub">' . $item->description . '</span>';
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

function nik_register_custom_background(){
    $args = array(
        'default-color' => '#ecf0f1',
    );
    
    $args = apply_filters('nik_custom_background_args', $args);
    
    if( function_exists('wp_get_theme')){
        add_theme_support('custom-background', $args);
    } else{
        define( 'BACKGROUND_COLOR', $args['default-color']);
        define( 'BACKGROUND_IMAGE', $args['default-image']);
        
    }
}
add_action('after_setup_theme', 'nik_register_custom_background');

add_theme_support('automatic-feed-links');

/*
 *Adds the editor style
 */
function nik_add_editor_styles(){
    add_editor_style('custom-editor-style.css');
}
add_action('init', 'nik_add_editor_styles');

require( get_template_directory() . '/inc/custom-header.php' );

function themeslug_theme_customizer( $wp_customize ) {
    $wp_customize->add_section( 'themeslug_logo_section' , array(
    'title'       => __( 'Logo', 'themeslug' ),
    'priority'    => 30,
    'description' => 'Upload a logo to replace the default site name and description in the header',
) );
    $wp_customize->add_setting( 'themeslug_logo' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
    'label'    => __( 'Logo', 'themeslug' ),
    'section'  => 'themeslug_logo_section',
    'settings' => 'themeslug_logo',
) ) );
}
add_action('customize_register', 'themeslug_theme_customizer');
