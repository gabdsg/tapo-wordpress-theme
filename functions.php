<?php
/**
 * TalkingPoints functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package TalkingPoints
 */

if ( ! function_exists( 'talkingpoints_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function talkingpoints_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on TalkingPoints, use a find and replace
		 * to change 'talkingpoints' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'talkingpoints', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Primary', 'talkingpoints' ),
			'footer-menu' => esc_html__( 'Footer', 'talkingpoints' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'talkingpoints_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;


add_action( 'after_setup_theme', 'talkingpoints_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function talkingpoints_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'talkingpoints_content_width', 640 );
}
add_action( 'after_setup_theme', 'talkingpoints_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function talkingpoints_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'talkingpoints' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'talkingpoints' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'talkingpoints' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'talkingpoints' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Banner', 'talkingpoints' ),
		'id'            => 'banner',
		'description'   => esc_html__( 'Add widgets here.', 'talkingpoints' ),
		'before_widget' => '<div class="top-banner">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'talkingpoints_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function talkingpoints_scripts() {
	wp_enqueue_style( 'talkingpoints-style', get_stylesheet_uri() );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', false, '1.0', 'all');

	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css', false, '1.0', 'all');
	

	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.3.1.slim.min.js', array(), '20151215', true );
	wp_enqueue_script( 'popperjs', get_template_directory_uri() . '/js/popper.min.js', array(), '20151215', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20151215', true );

	wp_enqueue_script( 'talkingpoints-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'talkingpoints_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


// Menu for bootstrap
require_once get_template_directory() . '/inc/bs4navwalker.php';

// Support for SVG
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


// Achive title
add_filter( 'get_the_archive_title', function ($title) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>' ;
	}elseif ( is_archive() ){
		
	}
	return $title;
});



// Custom post type for press news
function wpdocs_codex_news_init() {
    $labels = array(
        'name'                  => _x( 'News', 'Post type general name', 'talkingpoints' ),
        'singular_name'         => _x( 'News', 'Post type singular name', 'talkingpoints' ),
        'menu_name'             => _x( 'News', 'Admin Menu text', 'talkingpoints' ),
        'name_admin_bar'        => _x( 'News', 'Add New on Toolbar', 'talkingpoints' ),
        'add_new'               => __( 'Add New', 'talkingpoints' ),
        'add_new_item'          => __( 'Add New News', 'talkingpoints' ),
        'new_item'              => __( 'New News', 'talkingpoints' ),
        'edit_item'             => __( 'Edit News', 'talkingpoints' ),
        'view_item'             => __( 'View News', 'talkingpoints' ),
        'all_items'             => __( 'All News', 'talkingpoints' ),
        'search_items'          => __( 'Search News', 'talkingpoints' ),
        'parent_item_colon'     => __( 'Parent News:', 'talkingpoints' ),
        'not_found'             => __( 'No News found.', 'talkingpoints' ),
        'not_found_in_trash'    => __( 'No News found in Trash.', 'talkingpoints' ),
        'featured_image'        => _x( 'News image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'talkingpoints' ),
        'set_featured_image'    => _x( 'Set news image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'talkingpoints' ),
        'remove_featured_image' => _x( 'Remove image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'talkingpoints' ),
        'use_featured_image'    => _x( 'Use as image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'talkingpoints' ),
        'archives'              => _x( 'News archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'talkingpoints' ),
        'insert_into_item'      => _x( 'Insert into news', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'talkingpoints' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this news', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'talkingpoints' ),
        'filter_items_list'     => _x( 'Filter news list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'talkingpoints' ),
        'items_list_navigation' => _x( 'News list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'talkingpoints' ),
        'items_list'            => _x( 'News list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'talkingpoints' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'news' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 4,
		'supports'           => array( 'title', 'thumbnail', 'excerpt', 'custom-fields' ),
		'taxonomies' 	     => array('year'),
    );
 
    register_post_type( 'news', $args );
}
 
add_action( 'init', 'wpdocs_codex_news_init' );




// Let us create Taxonomy for Custom Post Type
add_action( 'init', 'create_news_custom_taxonomy', 0 );
 
//create a custom taxonomy name it "type" for your posts
function create_news_custom_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Years', 'taxonomy general name' ),
    'singular_name' => _x( 'Year', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Year' ),
    'all_items' => __( 'All Years' ),
    'edit_item' => __( 'Edit Year' ), 
    'update_item' => __( 'Update Year' ),
    'add_new_item' => __( 'Add New Year' ),
    'new_item_name' => __( 'New Year Name' ),
    'menu_name' => __( 'Years' ),
  ); 	
 
  register_taxonomy('year',array('news'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'year' ),
  ));
}




add_action( 'init', function() {

	add_shortcode( 'site_url', function( $atts = null, $content = null ) {
		$url = site_url();
		$url = str_replace("http://", "", $url);
		$url = str_replace("https://", "", $url);
		return $url;
	} );

} );






function news_date_customfield( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'news_meta',
		'title' => esc_html__( 'News Meta Info', 'talkingpoints' ),
		'post_types' => array('news' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => 'false',
		'fields' => array(
			array(
				'id' => $prefix . 'date',
				'type' => 'date',
				'name' => esc_html__( 'Date', 'talkingpoints' ),
				'std' => 'News date',
				'size' => 80,
			),
			array(
				'id' => $prefix . 'url',
				'type' => 'url',
				'name' => esc_html__( 'Url', 'talkingpoints' ),
				'placeholder' => esc_html__( 'News url', 'talkingpoints' ),
				'size' => 80,
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'news_date_customfield' );