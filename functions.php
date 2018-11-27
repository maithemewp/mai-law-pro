<?php

// Child theme (Do not remove!).
define( 'CHILD_THEME_NAME', 'Mai Law Pro' );
define( 'CHILD_THEME_URL', 'https://maitheme.com/' );
define( 'CHILD_THEME_VERSION', '1.0.0' );
define( 'MAI_THEME_SP', true );

// Support the Mai Theme Engine (Do not remove!).
add_theme_support( 'mai-theme-engine' );

/**
 * Mai Theme dependencies (Do not remove!).
 * This auto-installs Mai Theme Engine plugin,
 * which is required for the theme to function properly.
 *
 * @version 1.4.4
 */
require_once 'includes/dependencies/wp-dependency-installer.php';
WP_Dependency_Installer::instance()->run( dirname( __FILE__ ) . '/includes/dependencies' );

// Don't do anything else if the Mai Theme Engine plugin is not active.
if ( ! class_exists( 'Mai_Theme_Engine' ) ) {
	return;
}

// Include all php files in the /includes/ directory.
foreach ( glob( dirname( __FILE__ ) . '/includes/*.php' ) as $file ) { include $file; }


/**********************************
 * Add your customizations below! *
 **********************************/


// Enqueue CSS files.
add_action( 'wp_enqueue_scripts', 'maitheme_enqueue_fonts' );
function maitheme_enqueue_fonts() {
	wp_enqueue_style( 'maitheme-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Slab:700|Poppins:400,600,700|Source+Sans+Pro:300,300i,400,700', array(), CHILD_THEME_VERSION );
}

// Customize the site footer text.
add_filter( 'genesis_footer_creds_text', 'maitheme_site_footer_text' );
function maitheme_site_footer_text( $text ) {
	$url  = 'https://maitheme.com/';
	$name = 'Mai Theme';
	return sprintf( 'Copyright &copy; %s <a href="%s" title="%s">%s</a> &middot; All Rights Reserved &middot; Powered by <a rel="nofollow noopener" href="%s">%s</a>',
		date('Y'),
		get_bloginfo('url'),
		get_bloginfo('name'),
		get_bloginfo('name'),
		$url,
		$name
	);
}
