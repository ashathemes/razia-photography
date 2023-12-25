<?php
/**
 * Megla Plus functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Razia Photography
 */

if ( ! defined( 'RAZIA_PHOTOGRAPHY_VERSION' ) ) {
	$razia_photography_theme = wp_get_theme();
	define( 'RAZIA_PHOTOGRAPHY_VERSION', $razia_photography_theme->get( 'Version' ) );
}

/**
 * Enqueue scripts and styles.
 */
function razia_photography_scripts() {
    wp_enqueue_style( 'razia-photography-parent-style', get_template_directory_uri() . '/style.css',array('bootstrap','slicknav','razia-default-block','razia-style'), '', 'all');
    wp_enqueue_style( 'razia-photography-main-style',get_stylesheet_directory_uri() . '/assets/css/main-style.css',array(), RAZIA_PHOTOGRAPHY_VERSION, 'all');

    wp_enqueue_script( 'isotope', get_stylesheet_directory_uri() . '/assets/js/isotope.pkgd.min.js', array('jquery'), '3.0.6', true );
    wp_enqueue_script( 'razia-photography', get_stylesheet_directory_uri() . '/assets/js/razia-photography-main.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'razia_photography_scripts' );

/**
 * Load Razia Photography Tags files.
 */
require get_stylesheet_directory() . '/inc/template-tags.php';