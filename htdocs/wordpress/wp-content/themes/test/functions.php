<?php
/**
 * @auther Yamashita <yamashita.antapp@gmail.com>
 *
 */

function add_my_styles_and_scripts() {
	//bootstrap.min.css の読み込み
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

  $custom_header = array(
    'default-image' => get_template_directory_uri().'/images/header-img.jpg',
    'width' => 1000,
    'height' => 400,
    'flex-height' => true,
    'flex-width' => false,
    'uploads' => true,
);
  add_theme_support( 'custom-header', $custom_header);
  if(function_exists('register_nav_menu')) {
	register_nav_menu('global-menu',__( 'Global menu', 'tcd-w'));
  }


// function theme_enqueue_styles() {
// 	// CSSを有効にする
//   wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
//   wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));
// }
// add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function theme_setup() {
	// アイキャッチ画像を有効にする
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'theme_setup');

// カスタム投稿タイプ
function custom_register_news(){
	$labels = [
		"singular_name" => "news",
		"edit_item" => "news",
	];
	$args = [
		"label" => "新着情報",
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_active" => true,
		"delete_with_user" => true,
		"exclude_from_search" => false,
		"mamp_meta_cap" => true,
		"hierarchial" => true,
		"rewrite" => ["slug" => "news", "with_front" => true],
		"query_var" => true,
		"menu_position" => 5,
		"supports" => ['title', "editor", "thumbnail"],
	];
	register_post_type("news",$args);
}
add_action('init', 'custom_register_news');

function style_change() {
	?>
	<!-- grid-listのサムネサイズをデフォルtの設定値に合わせる -->
	<style type="text/css">
	.grid-list .grid-list-image {
	 width: <?php echo(get_option('thumbnail_size_w')."px");?>;
	 height: <?php echo(get_option('thumbnail_size_h')."px");?>;
	}
	</style>
	<?php 
	}
	add_action( 'wp_head', 'style_change');
?>