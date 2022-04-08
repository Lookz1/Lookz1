<?php
/**
 * hair-price functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package hair-price
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'hair_price_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function hair_price_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on hair-price, use a find and replace
		 * to change 'hair-price' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'hair-price', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'hair-price' ),
				'footer' => esc_html__( 'Footer', 'hair-price' ),
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
				'hair_price_custom_background_args',
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
add_action( 'after_setup_theme', 'hair_price_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hair_price_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hair_price_content_width', 640 );
}
add_action( 'after_setup_theme', 'hair_price_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hair_price_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'hair-price' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'hair-price' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'hair_price_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hair_price_scripts() {
	wp_enqueue_style( 'hair-price-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_enqueue_style( 'hair-price-style-bootstrap', get_template_directory_uri() . '/libs/bootstrap/bootstrap-grid.css', array(), _S_VERSION );
	wp_enqueue_style( 'hair-price-style-fontawesome', get_template_directory_uri() . '/libs/fontawesome-free-5.12.0-web/css/all.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'hair-price-style-rangeSlider', get_template_directory_uri() . '/libs/ion.rangeSlider-master/css/ion.rangeSlider.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'hair-price-style-fancybox', get_template_directory_uri() . '/libs/fancybox/jquery.fancybox.css', array(), _S_VERSION );
	wp_enqueue_style( 'hair-price-style-slick', get_template_directory_uri() . '/libs/slick-1.5.9/slick/slick.css', array(), _S_VERSION );
	wp_enqueue_style( 'hair-price-style-slick-theme', get_template_directory_uri() . '/libs/slick-1.5.9/slick/slick-theme.css', array(), _S_VERSION );

	wp_enqueue_style( 'hair-price-style-fonts', get_template_directory_uri() . '/css/fonts.css', array(), _S_VERSION );
	wp_enqueue_style( 'hair-price-style-main', get_template_directory_uri() . '/css/main.css', array(), _S_VERSION );
	wp_enqueue_style( 'hair-price-style-media', get_template_directory_uri() . '/css/media.css', array(), _S_VERSION );


	wp_enqueue_script( 'hair-price-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'hair-price-jquery', get_template_directory_uri() . '/libs/jquery/jquery-1.11.1.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'hair-price-mousewheel', get_template_directory_uri() . '/libs/jquery-mousewheel/jquery.mousewheel.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'hair-price-fancybox', get_template_directory_uri() . '/libs/fancybox/jquery.fancybox.pack.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'hair-price-slick', get_template_directory_uri() . '/libs/slick-1.5.9/slick/slick.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'hair-price-PageScroll2id', get_template_directory_uri() . '/libs/scroll2id/PageScroll2id.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'hair-price-rangeSlider', get_template_directory_uri() . '/libs/ion.rangeSlider-master/js/ion.rangeSlider.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'hair-price-maskedinput', get_template_directory_uri() . '/libs/mask/jquery.maskedinput.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'hair-price-jQueryFormStyler', get_template_directory_uri() . '/libs/jQueryFormStyler-master/jquery.formstyler.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'hair-price-common', get_template_directory_uri() . '/js/common.js', array(), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'hair_price_scripts' );

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

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();	
}



function sold_posts(){?>
	<h2 class="title-section title-section_sidebar">Sold Hair</h2>
	<div class="sidebar-wrap">
		<?php
		$args =  array(
			'posts_per_page' => 5,
			'post_type'   => 'ads',
			'date_query' => array(
				array(
					'before' => '2 week ago' 
				)
			)
		);
		$sold_posts = new WP_Query( $args );
		if( $sold_posts->have_posts() ) :
			while( $sold_posts->have_posts() ) : $sold_posts->the_post(); ?>
				<a href="<?php echo get_permalink();?>" class="item-feature item-feature_sidebar">
					<span class="item-feature__image">
						<img src="<?php echo get_field('sidebar_img', get_the_ID())['url']; ?>" alt="<?php echo get_field('sidebar_img', get_the_ID())['alt']; ?>">
						<span class="item-feature_satus">Sold</span>
					</span>
					<span class="item-feature__name"><?php the_title(); ?></span>
					<span class="item-feature__price"><?php the_field('price', get_the_ID());?></span>
				</a>
			<?php endwhile;
		endif; ?>
	</div>
<?php }




function post_add(){

	// все ок! Продолжаем.
	// Эти файлы должны быть подключены в лицевой части (фронт-энде).
	require_once( ABSPATH . 'wp-admin/includes/image.php' );
	require_once( ABSPATH . 'wp-admin/includes/file.php' );
	require_once( ABSPATH . 'wp-admin/includes/media.php' );

	$post_title = $_POST['title'];
	$price = $_POST['price'];
	$length = $_POST['length'];
	$thickness = $_POST['thickness'];

	$new_post = array(
	    'ID' => '',
	    'post_type'      => 'ads',
	    'post_author' => $user->ID,
	    'post_title' => $post_title,
	    'post_status' => 'pending'
	);
	$post_id = wp_insert_post($new_post);
	$post = get_post($post_id);

	$attachment_id = media_handle_upload( 'my_image_upload', $post_id );

	$files = $_FILES['my_image_upload'];
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	    require_once( ABSPATH . 'wp-admin/includes/image.php' );
	    require_once( ABSPATH . 'wp-admin/includes/file.php' );
	    require_once( ABSPATH . 'wp-admin/includes/media.php' );

	    $attachment_id = array();
	    foreach ($files['name'] as $key => $value) {
	        if ($files['name'][$key]) {
	            $file = array(
	                'name' => $files['name'][$key],
	                'type' => $files['type'][$key],
	                'tmp_name' => $files['tmp_name'][$key],
	                'error' => $files['error'][$key],
	                'size' => $files['size'][$key]
	            );
	            $_FILES = array("my_image_upload" => $file);
	            $attachment_id[] = media_handle_upload("my_image_upload", 0);
	        }
	    }
	}

	if ( is_wp_error( $attachment_id ) ) {

	} else {
		update_field('gallery', $attachment_id, $post_id);
		update_post_meta( $post_id, 'price', $price );
		update_post_meta( $post_id, 'length', $length );
		update_post_meta( $post_id, 'thickness', $thickness );
	}

}




if(isset($_POST['submit_my_image_upload']) == '1') {

	echo post_add();
}
