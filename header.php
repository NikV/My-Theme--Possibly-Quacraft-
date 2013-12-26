<?php
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<div id="page" class="hfeed site">
    <header id="masthead" class="site-header" role="banner">
        <?php if ( get_theme_mod( 'themeslug_logo' ) ) : ?>
    <div class='site-logo'>
        <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'themeslug_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
    </div>
     <?php else : ?>   
<hgroup>
     <h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
     <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
</hgroup>
<?php endif; ?>
<hgroup>
     <?php get_sidebar( 'header' ); ?>
</hgroup>

<?php $header_image = get_header_image();
        if ( ! empty( $header_image ) ) { ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
            </a>
<?php } // if ( ! empty( $header_image ) ) 
?>
        <nav role="navigation" class="site-navigation main-navigation">
     <?php $walker = new Menu_With_Description; ?>
     <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'walker' => $walker ) ); ?>
     
     </nav><!-- .site-navigation .main-navigation -->
     
     </header><!-- #masthead .site-header -->
<div id="main" class="site-main">

<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width"/>
<title>

<?php

global $page, $paged;

wp_title('|', true, 'right');

//Add the blog name
bloginfo('name');

//Blog Description
$site_description = get_bloginfo('description', 'display');
if ($site_description && (is_home() || is_front_page() ))
echo" | $site_description";

//Add a page number
if($paged >= 2 || $page >= 2)
echo '|' . sprintf( __( 'Page %s', 'nik' ), max( $paged, $page ) );





?></title>


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>



