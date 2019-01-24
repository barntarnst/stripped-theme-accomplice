<?php
namespace WordpressStarterTheme;

if ( ! function_exists( __NAMESPACE__ . '\\setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function setup() {
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
	}
endif;
add_action( 'after_setup_theme', __NAMESPACE__ . '\\setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wordpress_starter_theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wordpress_starter_theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', __NAMESPACE__ . '\\widgets_init' );

/**
 * Enqueue scripts and styles.
 */
$rand = substr(md5(rand()), 0, 7);

function scripts() {
	wp_enqueue_style( 'style.css', get_template_directory_uri() . '/dist/css/app.css',false,$rand,'all');
	wp_enqueue_style( 'style.css', get_template_directory_uri() . '/dist/css/chunk-vendors.css',false,$rand,'all');
	wp_enqueue_script( 'main-vue-app', get_template_directory_uri() . '/dist/js/app.js', array(), $rand, true );
	wp_enqueue_script( 'main-vue-vendors', get_template_directory_uri() . '/dist/js/chunk-vendors.js', array(), $rand, true );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\scripts' );

/**
 * Enqueue scripts and styles.
 */
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
