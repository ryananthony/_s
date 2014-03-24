<?php
/**
 * _s functions and definitions
 *
 * @package _s
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( '_s_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function _s_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _s, use a find and replace
	 * to change '_s' to the name of your theme in all the template files
	 */
	load_theme_textdomain( '_s', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', '_s' ),
	) );

	add_action( 'init', 'create_post_type' );
	function create_post_type() {
		register_post_type( 'show',
			array(
				'labels' => array(
					'name' => __( 'Shows' ),
					'singular_name' => __( 'Show' ),
					'add_new' => 'Add New Show',
					'add_new_item' => 'Add New Show',
					'edit_item' => 'Edit Show',
					'new_item' => 'New Show',
					'view_item' => 'View Show',
					'search_items' => 'Search Shows',
					'not_found' => 'No shows found',
					'not_found_in_trash' => 'No shows found in Trash',
				),
				'public' => true,
				'has_archive' => true,
				'description' => 'Information about an artists performance',
				'show_ui' => true,
				'show_in_menu' => true,
				'show_in_nav_menus' => true,
				'menu_position' => 5,
				'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
				'rewrite' => array( 'slug' => 'show','with_front' => false)
			)
		);
		register_post_type( 'cover',
			array(
				'labels' => array(
					'name' => __( 'Covers' ),
					'singular_name' => __( 'Cover' ),
					'add_new' => 'Add New Cover',
					'add_new_item' => 'Add New Cover',
					'edit_item' => 'Edit Cover',
					'new_item' => 'New Cover',
					'view_item' => 'View Cover',
					'search_items' => 'Search Covers',
					'not_found' => 'No covers found',
					'not_found_in_trash' => 'No covers found in Trash',
				),
				'public' => true,
				'has_archive' => true,
				'description' => 'Information about an artists performance',
				'show_ui' => true,
				'show_in_menu' => true,
				'show_in_nav_menus' => true,
				'menu_position' => 6,
				'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
				'rewrite' => array( 'slug' => 'cover','with_front' => false)
			)
		);
	}

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( '_s_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // _s_setup
add_action( 'after_setup_theme', '_s_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function _s_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', '_s' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', '_s_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function _s_scripts() {
	wp_enqueue_style( '_s-style', get_stylesheet_uri() );

	wp_enqueue_style( 'flannel-custom-style', get_stylesheet_directory_uri() . '/layouts/custom.css' );

	wp_enqueue_script( '_s-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( '_s-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', '_s_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
