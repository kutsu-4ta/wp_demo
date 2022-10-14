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

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';

define( 'MY_DIR_URL', get_stylesheet_directory_uri() );
define( 'MY_DIR_PATH', get_stylesheet_directory() );

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

// カスタム背景
$defaults = array(
//    'default-color'          => '',
//    'default-image'          => '',
//    'default-repeat'         => '',
//    'default-position-x'     => '',
//    'default-attachment'     => '',
//    'wp-head-callback'       => '',
//    'admin-head-callback'    => '',
//    'admin-preview-callback' => '',
);
add_theme_support( 'custom-background', $defaults );

function menu_init() {

    //メニューを有効化する
    register_nav_menus(array(
            'header' => 'ヘッダーメニュー',
            'footer' => 'フッターメニュー',
            'drawer' => 'ドロワーメニュー',
        )
    );
}
add_action('after_setup_theme', 'menu_init');

/* ---------- カスタム投稿タイプを追加 ---------- */
add_action( 'init', 'create_post_type' );

function create_post_type()
{
    // 「お役立ち記事」のカスタム投稿追加
    register_post_type(
        'blog', //カスタム投稿タイプ名
        array(
            'label' => 'お役立ち記事',
            'public' => true,
            'has_archive' => true,
            'menu_position' => 5,
            'show_in_rest' => true,
            'supports' => array(
                'title',  //タイトル
                'editor',  //本文の編集機能
                'thumbnail',  //アイキャッチ画像（add_theme_support('post-thumbnails')が必要）
                'excerpt',  //抜粋
                'custom-fields', //カスタムフィールド
                'revisions'  //リビジョンを保存
            ),
            'taxonomies' => array('blog-cat', 'blog-tag')  //使用するタクソノミー
        )
    );

    // 「お役立ち記事」のカスタム投稿にカテゴリーを追加
    register_taxonomy(
        'blog-cat',
        'blog', // カテゴリーを追加したいカスタム投稿タイプ名
        array(
            'label' => 'お役立ち記事カテゴリー',
            'hierarchical' => true,
            'public' => true,
            'show_in_rest' => true,
        )
    );

    // 「お役立ち記事」のカスタム投稿にタグを追加
    register_taxonomy(
        'blog-tag',
        'blog', // タグを追加したいカスタム投稿タイプ名
        array(
            'label' => 'お役立ち記事タグ',
            'public' => true,
            'hierarchical' => false,
            'show_in_rest' => true,
        )
    );
}

add_action('admin_menu', function () {
    add_menu_page('サンプル設定', 'サンプル設定', 'manage_options', 'my_example_settings', function () {
        ?>
        <divclass="wrap">
            <h2>サンプル設定</h2>
        </div>
        <?php
    },
        'dashiconsadmingeneric');
});

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


// jsの読み込み
add_action('wp_enqueue_scripts', 'add_scripts');
function add_scripts() {
    // デフォルトのjQuery削除
    wp_deregister_script('jquery');
    // jQuery読み込み
    wp_register_script(
        'jquery_script',
        'http://code.jquery.com/jquery-1.11.1.min.js',
        array(),
        '1.0'
    );

    // メインのjs読み込み
    wp_enqueue_script(
        'main_script',
        get_template_directory_uri() . '/js/index.js',
        array('jquery_script'),
        '1.0'
    );
}

/* index.js にdefer属性を付与 */
add_filter('script_loader_tag', 'add_defer', 10, 2);
function add_defer($tag, $handle) {
    // 識別名がmain_script以外はそのまま返却
    if ($handle !== 'main_script') {
        return $tag;
    }
    // defer追加
    return str_replace(' src=', ' defer src=', $tag);
}

add_action( 'wp_enqueue_scripts', function(){
    //gsap.min.jsの読み込み
    $timestamp = date( 'Ymdgis', filemtime(MY_DIR_PATH . '/js/gsap/gsap.min.js' ));
    wp_enqueue_script( 'gsap_js', MY_DIR_URL . '/js/gsap/gsap.min.js', [], $timestamp, true);
    $timestamp = date( 'Ymdgis', filemtime(MY_DIR_PATH . '/js/gsap/ScrollTrigger.min.js' ));
    wp_enqueue_script( 'ScrollTrigger_js', MY_DIR_URL . '/js/gsap/ScrollTrigger.min.js', [], $timestamp, true);
//    //loader.jsの読み込み
////    $timestamp = date( 'Ymdgis', filemtime(MY_DIR_PATH . '/loader.js' ));
////    wp_enqueue_script( 'loader_js', MY_DIR_URL . '/loader.js', ['gsap_js'], $timestamp, true);
});

add_action( 'wp_enqueue_scripts', 'twentytwentytwo_styles' );
