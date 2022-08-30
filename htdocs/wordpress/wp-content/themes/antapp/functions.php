<?php
/**
 * antapp custom theme
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage antapp
 * @since antapp 1.0
 */


// bootstrap.min.css の読み込み
function add_my_styles_and_scripts() {
    wp_enqueue_style(
        'my-template-bs-style',
        '//stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' ,
        array(),
        '5.2.0'
    );

    //スタイルシート style.css の読み込み
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));

}
add_action( 'wp_enqueue_scripts', 'add_my_styles_and_scripts' );

function my_scripts_method() {
    wp_enqueue_script(
        'custom_script',
        get_template_directory_uri() . '/js/index.js',
    );
}
add_action('wp_enqueue_scripts', 'my_scripts_method');

//$custom_header = array(
//    'default-image' => get_template_directory_uri().'/images/header-img.jpg',
//    'width' => 1000,
//    'height' => 400,
//    'flex-height' => true,
//    'flex-width' => false,
//    'uploads' => true,
//);
//add_theme_support( 'custom-header', $custom_header);
//if(function_exists('register_nav_menu')) {
//    register_nav_menu('global-menu',__( 'Global menu', 'tcd-w'));
//}

//if ( ! function_exists( 'twentytwentytwo_support' ) ) :
//
//	/**
//	 * Sets up theme defaults and registers support for various WordPress features.
//	 *
//	 * @since Twenty Twenty-Two 1.0
//	 *
//	 * @return void
//	 */
//	function twentytwentytwo_support() {
//
//		// Add support for block styles.
//		add_theme_support( 'wp-block-styles' );
//
//		// Enqueue editor styles.
//		add_editor_style( 'style.css' );
//
//	}
//
//endif;
//
//add_action( 'after_setup_theme', 'twentytwentytwo_support' );

if ( ! function_exists( 'twentytwentytwo_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'twentytwentytwo-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'twentytwentytwo-style' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'twentytwentytwo_styles' );

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';
