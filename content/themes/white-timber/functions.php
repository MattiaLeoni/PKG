<?php
/**
 * White theme Mattia Leoni - Timber
 * VERSION 1.0
 *
*/

/**
 * If you are installing Timber as a Composer dependency in your theme, you'll need this block
 * to load your dependencies and initialize Timber. If you are using Timber via the WordPress.org
 * plug-in, you can safely delete this block.
 */
// $composer_autoload = __DIR__ . '/vendor/autoload.php';
// if ( file_exists( $composer_autoload ) ) {
// 	require_once $composer_autoload;
// 	$timber = new Timber\Timber();
// }

/**
 * This ensures that Timber is loaded and available as a PHP class.
 * If not, it gives an error message to help direct developers on where to activate
 */


if ( ! class_exists( 'Timber' ) ) {

	add_action(
		'admin_notices',
		function() {
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
		}
	);

	add_filter(
		'template_include',
		function( $template ) {
			return get_stylesheet_directory() . '/static/no-timber.html';
		}
	);
	return;
}

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber\Timber::$dirname = array( 'templates', 'views' );

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber\Timber::$autoescape = false;




/*-----------------------------------------------------------------------------------*/
/* Include core functions
/*-----------------------------------------------------------------------------------*/
include('core/utility.php');
//timber
include('core/timber/StarterSite.php');
//wp
include('core/wp/menus.php');
// include('core/wp/custom_fields.php');
include('core/wp/translate_strings.php');
//visual composer
include('core/visual-composer/include.php');
//redux
include('core/redux/barebones-config.php');


/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/
function theme_scripts()  { 
	// get the theme directory style.css and link to it in the header
	wp_enqueue_style('style.css', get_stylesheet_directory_uri() . '/style.css');
	// add libraries 
	wp_enqueue_script( 'lazy', get_template_directory_uri() . '/js/lazyload.min.js', array( 'jquery' ));
	// add main js
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ));
	wp_enqueue_script( 'menu', get_template_directory_uri() . '/js/menu.js', array( 'jquery' ));
} 
add_action( 'wp_enqueue_scripts', 'theme_scripts' ); // Register this fxn and allow Wordpress to call it automatcally in the header

/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts Admin panel
/*-----------------------------------------------------------------------------------*/
function admin_style() {
    wp_enqueue_style('admin-styles', get_template_directory_uri().'/sass/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');

/*-----------------------------------------------------------------------------------*/
/* ADD PREFIX NEWS TO POSTS
/*-----------------------------------------------------------------------------------*/
// function add_rewrite_rules( $wp_rewrite )
// {
//     $new_rules = array(
//         'news/(.+?)/?$' => 'index.php?post_type=post&name='. $wp_rewrite->preg_index(1),
//     );

//     $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
// }
// add_action('generate_rewrite_rules', 'add_rewrite_rules'); 
flush_rewrite_rules();

// function change_blog_links($post_link, $id=0){

//     $post = get_post($id);

//     if( is_object($post) && $post->post_type == 'post'){
//         return home_url('/news/'. $post->post_name.'/');
//     }

//     return $post_link;
// }
// add_filter('post_link', 'change_blog_links', 1, 3);

function my_excerpt_length($length){
	return 30;
}
add_filter('excerpt_length', 'my_excerpt_length');
