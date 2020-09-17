<?php
/**
 * gurza functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gurza
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'gurza_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function gurza_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on gurza, use a find and replace
		 * to change 'gurza' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'gurza', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'header-menu' => esc_html__('Header menu', 'gurza'),
				'footer-menu' => esc_html__('Footer menu', 'gurza'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'gurza_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'gurza_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gurza_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gurza_content_width', 640 );
}
add_action( 'after_setup_theme', 'gurza_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gurza_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'gurza' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'gurza' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'gurza_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gurza_scripts() {
	wp_enqueue_style( 'gurza-style', get_stylesheet_uri());
	wp_enqueue_style('gurza-custom', get_template_directory_uri() . '/gurza/css/style.min.css', array(), _S_VERSION);

	wp_deregister_script('jquery');
	wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js');

	wp_enqueue_script('gurza-elfsight-js', 'https://apps.elfsight.com/p/platform.js');
	wp_enqueue_script('gurza-custom-js', get_template_directory_uri() . '/gurza/js/script.min.js', array('jquery'), _S_VERSION, true);
	// wp_enqueue_script( 'gurza-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
}
add_action( 'wp_enqueue_scripts', 'gurza_scripts' );

// !Custom
// svg support
function cc_mime_types($mimes)
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


add_action( 'init', 'register_post_types' );
function register_post_types(){
	register_post_type( 'product-item', [
		'label'  => null,
		'labels' => [
			'name'               => 'Товар', // основное название для типа записи
			'singular_name'      => 'Товар', // название для одной записи этого типа
			'add_new'            => 'Добавить товар', // для добавления новой записи
			'add_new_item'       => 'Добавление товара', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование товара', // для редактирования типа записи
			'new_item'           => 'Новый товар', // текст новой записи
			'view_item'          => 'Смотреть товар', // для просмотра записи этого типа.
			'search_items'       => 'Искать товар', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Товары', // название меню
		],
		'description'         => '',
		'public'              => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 5,
		'menu_icon'           => null,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => ['size', 'color'],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
}

// хук для регистрации
add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){
	// список параметров: wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy( 'size', [ 'product-item' ], [ 
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Размеры',
			'singular_name'     => 'Размер',
			'search_items'      => 'Найти размер',
			'all_items'         => 'Все размеры',
			'view_item '        => 'Посмотреть размер',
			'parent_item'       => 'Родительский размер',
			'parent_item_colon' => 'Родительский размер:',
			'edit_item'         => 'Изменить размер',
			'update_item'       => 'Обновить размер',
			'add_new_item'      => 'Добавить новый размер',
			'new_item_name'     => 'Имя нового размера',
			'menu_name'         => 'Размеры',
		],
		'description'           => 'Размеры товаров', // описание таксономии
		'public'                => true,
		'publicly_queryable'    => null, // равен аргументу public
		'show_in_nav_menus'     => true, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_in_menu'          => true, // равен аргументу show_ui
		'show_tagcloud'         => true, // равен аргументу show_ui
		'show_in_quick_edit'    => null, // равен аргументу show_ui
		'show_in_rest'        	=> true, // добавить в REST API. C WP 4.7
		'hierarchical'          => false,

		'rewrite'               => true,
	] );
	register_taxonomy( 'color', [ 'product-item' ], [ 
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Цвета',
			'singular_name'     => 'Цвет',
			'search_items'      => 'Найти цвет',
			'all_items'         => 'Все цвета',
			'view_item '        => 'Посмотреть цвет',
			'parent_item'       => 'Родительский цвет',
			'parent_item_colon' => 'Родительский цвет:',
			'edit_item'         => 'Изменить цвет',
			'update_item'       => 'Обновить цвет',
			'add_new_item'      => 'Добавить новый цвет',
			'new_item_name'     => 'Имя нового цвета',
			'menu_name'         => 'Цвета',
		],
		'description'           => 'Цвет товаров', // описание таксономии
		'public'                => true,
		'publicly_queryable'    => null, // равен аргументу public
		'show_in_nav_menus'     => true, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_in_menu'          => true, // равен аргументу show_ui
		'show_tagcloud'         => true, // равен аргументу show_ui
		'show_in_quick_edit'    => null, // равен аргументу show_ui
		'show_in_rest'        	=> true, // добавить в REST API. C WP 4.7
		'hierarchical'          => false,
		'rewrite'               => true,
	] );
};