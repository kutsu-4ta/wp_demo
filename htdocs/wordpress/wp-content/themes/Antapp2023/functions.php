<?php
/**
 * Twenty Twenty-Two functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Two
 * @since Twenty Twenty-Two 1.0
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 * override to Twenty Twenty-Two 1.0
 * @since Twenty Twenty-Two 1.0
 *
 * @return void
 */
function twentytwentytwo_support() {

    // Add support for block styles.
    add_theme_support( 'wp-block-styles' );

    // Enqueue editor styles.
    add_editor_style( 'style.css' );

}

add_action( 'after_setup_theme', 'twentytwentytwo_support' );

/**
 * Enqueue styles.
 * override to Twenty Twenty-Two 1.0
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

add_action( 'wp_enqueue_scripts', 'twentytwentytwo_styles' );

define( 'MY_DIR_URL', get_stylesheet_directory_uri() );
define( 'MY_DIR_PATH', get_stylesheet_directory() );

/**
 * import GridSystem of bootstrap
 * 軽量化の為グリッドシステムのみインポート
 * @since Antapp2023 1.0
 * @return void
 */
function add_my_styles_and_scripts() {
    wp_enqueue_style(
        'my-template-bs-style',
        '//stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' ,
        array(),
        '5.2.0'
    );

    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));

}
add_action( 'wp_enqueue_scripts', 'add_my_styles_and_scripts' );

/**
 * import JavaScript
 * @since Antapp2023 1.0
 * @return void
 */
add_action('wp_enqueue_scripts', 'add_scripts');
function add_scripts() {
    wp_deregister_script('jquery'); // デフォルトのjQuery削除
    wp_register_script('jquery_script','https://code.jquery.com/jquery-1.11.1.min.js', array(),'1.0');

    wp_enqueue_script('index_script',  get_template_directory_uri() . '/js/index.js', array('jquery_script'),'1.0');

    //gsap.min.js
    $timestamp = date( 'Ymdgis', filemtime(MY_DIR_PATH . '/js/gsap/gsap.min.js' ));
    wp_enqueue_script( 'gsap_js', MY_DIR_URL . '/js/gsap/gsap.min.js', [], $timestamp, true);
    $timestamp = date( 'Ymdgis', filemtime(MY_DIR_PATH . '/js/gsap/ScrollTrigger.min.js' ));
    wp_enqueue_script( 'ScrollTrigger_js', MY_DIR_URL . '/js/gsap/ScrollTrigger.min.js', [], $timestamp, true);

    //loader.js
    //    $timestamp = date( 'Ymdgis', filemtime(MY_DIR_PATH . '/loader.js' ));
    //    wp_enqueue_script( 'loader_js', MY_DIR_URL . '/loader.js', ['gsap_js'], $timestamp, true);

    // inview.js
    $timestamp = date( 'Ymdgis', filemtime(MY_DIR_PATH . '/js/jqueryInview/jquery.inview.min.js' ));
    wp_enqueue_script( 'jqueryInview_js', MY_DIR_URL . '/js/jqueryInview/jquery.inview.min.js', [], $timestamp, true);

    // desvg.js
    $timestamp = date( 'Ymdgis', filemtime(MY_DIR_PATH . '/js/desvg/desvg.js' ));
    wp_enqueue_script( 'desvg_js', MY_DIR_URL . '/js/desvg/desvg.js', [], $timestamp, true);
}

/**
 * give index.js defer
 * @since Antapp2023 1.0
 * @return void
 */
add_filter('script_loader_tag', 'add_defer', 10, 2);
function add_defer($tag, $handle) {
    if ($handle !== 'index_script') {
        return $tag;
    }
    return str_replace(' src=', ' defer src=', $tag);
}

/**
 * active menu
 * メニューの有効化
 * @since Antapp2023 1.0
 * @return void
 */
add_action('after_setup_theme', 'menu_init');
function menu_init() {
    register_nav_menus(array(
            'header' => 'ヘッダーメニュー',
            'footer' => 'フッターメニュー',
        )
    );
}

/**
 * add custom post type
 * @since Antapp2023 1.0
 * @return void
 */
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
            'show_ui' => true,
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

/**
 * display index custom post type column
 * @since Antapp2023 1.0
 * @return void
 */
function add_blog_columns ($columns) {
    $columns['blog-cat'] = 'カテゴリー';
    $columns['blog-tag'] = 'タグ';
    $columns['author'] = '投稿者';
    return $columns;
}
add_filter('manage_edit-blog_columns', 'add_blog_columns');

function blog_cat_content($column_name, $post_id) {
    if($column_name == 'blog-cat'){
        if ($terms = get_the_terms($post_id, 'blog-cat')) {
            echo($terms[0]->name);
        }
    }

    if($column_name == 'blog-tag'){
        if ($terms = get_the_terms($post_id, 'blog-tag')) {
            echo($terms[0]->name);
        }
    }

    if($column_name == 'blog-pv'){
        if ($terms = get_the_terms($post_id, '')) {
            echo($terms[0]->name);
        }
    }
}
add_action( 'manage_blog_posts_custom_column', 'blog_cat_content', 10, 2 );

/**
 * sort custom post type by column data
 * @since Antapp2023 1.0
 * @return void
 */
function custom_sortable_columns($sort_column) {

    $sort_column['blog-cat'] = 'blog-cat';
    $sort_column['blog-tag'] = 'blog-tag';
    $sort_column['author'] = 'author';
    return $sort_column;
}
add_filter( 'manage_edit-blog_sortable_columns', 'custom_sortable_columns' );

function custom_orderby_columns( $vars ) {
    if (isset($vars['orderby']) && 'blog-cat' == $vars['orderby']) {
        $vars = array_merge($vars, array(
            'taxonomy' => 'blog-cat',
            'orderby' => 'name',
        ));
    }
    if (isset($vars['orderby']) && 'blog-tag' == $vars['orderby']) {
        $vars = array_merge($vars, array(
            'taxonomy' => 'blog-tag',
            'orderby' => 'name',
        ));
    }
    if (isset($vars['orderby']) && 'author' == $vars['orderby']) {
        $vars = array_merge($vars, array(
            'orderby' => 'author',
        ));
    }
    return $vars;

}
add_filter( 'request', 'custom_orderby_columns' );



// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';
