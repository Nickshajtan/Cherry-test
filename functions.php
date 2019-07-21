<?php
/**
 * File for functions and definitions of the test theme
 *
 * Contain loding of styles and scripts
 *
 */

function load_css_js() {
//load css    
wp_register_style( 'style', get_stylesheet_uri(), array(), ' ' );
wp_enqueue_style( 'style', get_stylesheet_uri(), ' ' );

wp_register_style( 'mine', get_template_directory_uri() . '/css/mine.css', array(), ' ' );
wp_enqueue_style( 'mine', get_template_directory_uri() . '/css/mine.css', ' ' );
    
//load js    
wp_register_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array(), ' ' );    
wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array(), ' ' );    
}
add_action('wp_enqueue_scripts', 'load_css_js');

//Add new paragraph into menu
function menu_options() {
	add_menu_page( 'My menu 1', 'My menu 1', 1, 'mymenu1.php', 'my_menu_page');  
    function my_menu_page(){
        echo 'lorem ipsum';
    }

}
add_action('admin_menu', 'menu_options');

//Add new subparagraph into menu
function submenu_options() {
	add_submenu_page( 'mymenu1.php', 'My menu 2', 'My menu 2', 1, 'mymenu2.php', 'menu_subpage');  
    function menu_subpage(){
        echo 'lorem ipsum second';
    }

}
add_action('admin_menu', 'submenu_options');

//Add new post type
if ( ! function_exists( 'kolba_type' ) ) {
    function kolba_type() {
 
        $labels = array(
            'name'                => _x( 'kolba', 'Post Type General Name', 'kolba' ),
            'singular_name'       => _x( 'kolba', 'Post Type Singular Name', 'kolba' ),
            'menu_name'           => __( 'kolba', 'kolba' ),
            'parent_item_colon'   => __( 'Родительский:', 'kolba' ),
            'all_items'           => __( 'Все записи', 'kolba' ),
            'view_item'           => __( 'Просмотреть', 'kolba' ),
            'add_new_item'        => __( 'Добавить новую запись в kolba', 'kolba' ),
            'add_new'             => __( 'Добавить новую', 'kolba' ),
            'edit_item'           => __( 'Редактировать запись', 'kolba' ),
            'update_item'         => __( 'Обновить запись', 'kolba' ),
            'search_items'        => __( 'Найти запись', 'kolba' ),
            'not_found'           => __( 'Не найдено', 'kolba' ),
            'not_found_in_trash'  => __( 'Не найдено в корзине', 'kolba' ),
        );
        $args = array(
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor','thumbnail' ),
            'taxonomies'          => array( 'post' ), 
            'public'              => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-book',
        );
        register_post_type( 'kolba', $args );
 
    }
 
    add_action( 'init', 'kolba_type', 0 ); 
 
}
//Add custom fields for kolba post type
function true_custom_fields() {
	add_post_type_support( 'kolba', 'custom-fields'); 
} 
add_action('init', 'true_custom_fields');
//Add new metabox
function metatest_init() { 
    add_meta_box('metatest', 'My text 1', 'metatest_showup', 'post', 'side', 'default'); 
    add_meta_box('metatest1', 'My text 1', 'metatest_showup', 'kolba', 'side', 'default'); 
    function metatest_showup() { 
        echo 'Lorem ipsum'; 
    } 

} 
add_action('add_meta_boxes', 'metatest_init');

//Add new image size
add_theme_support( 'post-thumbnails' ); 
add_image_size( 'kolba-img', 300, 200 );
add_filter('image_size_names_choose', 'true_new_image_sizes');
 
function true_new_image_sizes($sizes) {
	$addsizes = array(
		"kolba-img" => '1'
	);
	$newsizes = array_merge($sizes, $addsizes);
	return $newsizes;
}
//Add menus
if (function_exists('add_menus')) {
	add_menus('menus');
}

if ( ! function_exists( 'test_setup' ) ) :

function test_setup() {
//Add custom logo
add_theme_support( 'custom-logo', array(
		'height'      => 48,
		'width'       => 58,
		'flex-height' => true,
	) );

// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Top Menu',      'test' ),
		'social'  => __( 'Footer first menu', 'test' ),
        'table'   => __( 'Footer second menu', 'test' ),
	) );
    
//Add title    
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
//Add support theme html 5    
add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) ); 

//Add post formats
add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat',
	) );    

}
endif;
add_action( 'after_setup_theme', 'test_setup' );
remove_filter('the_content', 'wpautop');

//Remove admin bar
 add_action ('get_header', 'remove_admin_login_header');
 function remove_admin_login_header () {
	 remove_action ('wp_head', '_admin_bar_bump_cb');
 }
//Register sidebars
//Header section
register_sidebar( array(
        'name' => __( 'Contact info', '' ),
        'id' => 'top-area-first',
        'description' => __( 'Шапка', '' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
register_sidebar( array(
        'name' => __( 'Description', '' ),
        'id' => 'top-area-second',
        'description' => __( 'Шапка', '' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
register_sidebar( array(
        'name' => __( 'Slogan', '' ),
        'id' => 'top-area-third',
        'description' => __( 'Шапка', '' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
//Content section
register_sidebar( array(
        'name' => __( 'First banner', '' ),
        'id' => 'content-area-first',
        'description' => __( 'content', '' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
register_sidebar( array(
        'name' => __( 'Second banner', '' ),
        'id' => 'content-area-second',
        'description' => __( 'content', '' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
register_sidebar( array(
        'name' => __( 'Sidebar', '' ),
        'id' => 'content-area-third',
        'description' => __( 'content', '' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
register_sidebar( array(
        'name' => __( 'About first banner', '' ),
        'id' => 'content-area-about',
        'description' => __( 'content', '' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
//Footer section
register_sidebar( array(
        'name' => __( 'First footer menu', '' ),
        'id' => 'footer-area-first',
        'description' => __( 'footer', '' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
register_sidebar( array(
        'name' => __( 'Second footer menu', '' ),
        'id' => 'footer-area-second',
        'description' => __( 'footer', '' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );