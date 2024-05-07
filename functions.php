<?php
/**
 * Duvar Child Theme functions and definitions
 *
 * @package Duvar
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = 'inc';

// Array of files to include.
$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/block-editor.php',                    // Load Block Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
	'/indat-custom-functions.php',                      // Load Indat custom functions.
	

);

/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );



/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles() {

	// Get the theme data.
	$the_theme = wp_get_theme();

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";

	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $the_theme->get( 'Version' ) );
	wp_enqueue_style( 'custom-styles', get_stylesheet_directory_uri() . '/css/custom.css', array(), $the_theme->get( 'Version' ) );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $the_theme->get( 'Version' ), true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );


/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'duvar', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @param string $current_mod The current value of the theme_mod.
 * @return string
 */
function understrap_default_bootstrap_version( $current_mod ) {
	return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20 );



/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js() {
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js' );


// ============================================================================================
// Custom functions and Hooks	 Naghun 	- 	Abdullah Sinanović 	- 	Duvar Apartmani
// ============================================================================================

function understrap_register_menus() {
    register_nav_menus( array(
        'footer-menu' => __( 'Footer Menu', 'understrap' ),
		'header-menu-2' => __( 'Header Menu 2', 'understrap' ),
    ) );
}
add_action( 'after_setup_theme', 'understrap_register_menus' );

// ========================================================
// adding custom js and css

function duvar_files() {
	// js
	if (is_page('Početna Stranica') || is_page_template('Home Page Template')) {
		wp_enqueue_script('custom-calendar', get_stylesheet_directory_uri() . '/src/js/calendar.js', array(), '1.0', true);
	}

	if (is_page('Rezervacija') || is_page_template('Reservation Page Template')) {
		wp_enqueue_script('reservation-form', get_stylesheet_directory_uri() . '/src/js/reservation.js', array(), '1.0', true);
		wp_enqueue_style('reservation-style', get_stylesheet_directory_uri() . '/css/custom-css/reservation.css', array(), null, 'all');
		wp_enqueue_script('reservation-calendar', get_stylesheet_directory_uri() . '/src/js/calendar.js', array(), '1.0', true);
		wp_enqueue_script('reservation-logic', get_stylesheet_directory_uri() . '/src/js/reservation-logic.js', array(), '1.0', true);

		wp_localize_script('reservation-logic', 'form_reservation_data', array(
			'site_url' => 'https://duvar-apartmani.local',
			'nonce' => wp_create_nonce('wp_rest'),
			'ajax_url' => admin_url('admin-ajax.php')
		));

	}
	if (is_page('apartman') || is_page_template('Apartman')) {
		wp_enqueue_style('apartman-style', get_stylesheet_directory_uri() . '/css/custom-css/apartman.css', array(), null, 'all');
	}
	if (is_singular('apartman')) {
		wp_enqueue_script('image-slider', get_stylesheet_directory_uri() . '/src/js/image-slider.js', array(), '1.0', true);
		wp_enqueue_style('apartman-single-style', get_stylesheet_directory_uri() . '/css/custom-css/single-apartman.css', array(), null, 'all');
	}
	if (is_page('Kontakt') || is_page_template('Kontakt Page Template')) {
		wp_enqueue_style('contact-style', get_stylesheet_directory_uri() . '/css/custom-css/contact.css', array(), null, 'all');
		wp_enqueue_script('contact-logic', get_stylesheet_directory_uri() . '/src/js/contact.js', array(), '1.0', true);

		wp_localize_script('contact-logic', 'form_contact_data', array(
			'site_url' => 'https://duvar-apartmani.local',
			'nonce' => wp_create_nonce('wp_contact'),
			'ajax_url' => admin_url('admin-ajax.php')
		));
	}
	if (is_page('Lokacija') || is_page_template('Location Page Template')) {
		wp_enqueue_style('location-style', get_stylesheet_directory_uri() . '/css/custom-css/location.css', array(), null, 'all');
		wp_enqueue_script('custom-calendar', get_stylesheet_directory_uri() . '/src/js/calendar.js', array(), '1.0', true);
	}
	if (is_page('Blagaj')) {
		wp_enqueue_style('location-style', get_stylesheet_directory_uri() . '/css/custom-css/blagaj.css', array(), null, 'all');
	}
	if (is_page('Politika Privatnosti') || is_page_template('Privacy Page Template'))  {
		wp_enqueue_style('location-style', get_stylesheet_directory_uri() . '/css/custom-css/privacy.css', array(), null, 'all');
	}
	
	if (is_single()) {
		wp_enqueue_style('single-style', get_stylesheet_directory_uri() . '/css/custom-css/single.css', array(), null, 'all');
	}

	if ( is_page_template( 'global-templates/page-break-template.php' || is_page_template('global-templates/page-banner.php'))) {
        wp_enqueue_style( 'global-styles-style', get_stylesheet_directory_uri() . '/css/custom-css/global-temp.css', array(), null, 'all');
    }

	wp_enqueue_style('navigation-style', get_stylesheet_directory_uri() . '/css/custom-css/navbar.css', array(), null, 'all');
	wp_enqueue_style('footer-style', get_stylesheet_directory_uri() . '/css/custom-css/footer.css', array(), null, 'all');
	wp_enqueue_style('front-page-style', get_stylesheet_directory_uri() . '/css/custom-css/front-page.css', array(), null, 'all');
	wp_enqueue_style('blog-style', get_stylesheet_directory_uri() . '/css/custom-css/index.css', array(), null, 'all');

	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', array(), '5.15.4');
	wp_enqueue_script('jquery');


}

add_action('wp_enqueue_scripts', 'duvar_files');


require get_theme_file_path('inc-php/reservation-ajax.php');
require get_theme_file_path('inc-php/contact-ajax.php');
