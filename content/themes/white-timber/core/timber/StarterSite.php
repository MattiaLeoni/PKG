<?php 


/**
 * We're going to configure our theme inside of a subclass of Timber\Site
 * You can move this to its own file and include here via php's include("MySite.php")
 */
class StarterSite extends Timber\Site {
	/** Add timber support. */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'theme_supports' ) );
		add_filter( 'timber/context', array( $this, 'add_to_context' ) );
		add_filter( 'timber/twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_option_pages' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		add_action( 'init', array( $this, 'models' ) );
		add_action( 'widgets_init', array( $this, 'widgets' ) ); 

		parent::__construct();
	}
	/** This is where you can register custom post types. */
	public function register_option_pages() {
		// include(get_template_directory().'/core/wp/custom_options.php');
		include(get_template_directory().'/core/wp/admin_menu.php');

	}

	public function widgets(){
        include(get_template_directory().'/core/wp/register_widgets.php');
	}
 
	public function register_post_types() {
        include(get_template_directory().'/core/wp/custom_post_types.php');
	}
	
	/** This is where you can register custom taxonomies. */
	public function register_taxonomies() {
        include(get_template_directory().'/core/wp/custom_taxonomies.php');
	}

	/** This is where you can register controllers. */
	public function models() {
		include(get_template_directory().'/core/models/_include.php');
	}

	/** This is where you add some context
	 *
	 * @param string $context context['this'] Being the Twig's {{ this }}.
	 */
	public function add_to_context( $context ) {
		global $white_settings;
		// $context['options'] = get_fields('options');
		$context['options'] = $white_settings;

		if(function_exists('pll_the_languages')){
			$context['languages'] = pll_the_languages(
				array(
					'dropdown'=>0,
					// 'raw'=>1,
					'display_names_as'=>'slug',
					'echo'=>0,
					'hide_if_empty'=>0,
				)
			);
			$context['language_active'] = pll_current_language();
		}

		// $context['menu']  = new Timber\Menu('primary', ['depth'=>2]);
		$context['site']  = $this;
		$context['breadcrumbs'] = breadcrumbs();

		/* URL UTILI */
		global $wp;
		$context['page_url'] = home_url( $wp->request );
		$context['blog_url'] =  get_permalink( get_option( 'page_for_posts' ) );

		/* WIDGETS */
		$context['footer_widgets'] = [];
		$context['footer_widgets']['one'] = Timber\Timber::get_widgets( 'footer_area_one' );
		// echo "<pre>";
		// var_dump($context);
		// echo "</pre>";
		include get_template_directory().'/templates/layouts/include.php';

		return $context;
	}


	public function theme_supports() {
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

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'audio',
			)
		);

		add_theme_support( 'menus' );

		// Routes::map('progetti/page/:pg', function($params){
		// 	$query = 'paged='.$params['pg'];
		// 	Routes::load('/page.php?page_id=111', null, $query, 200);
		// });
		
	}

	/** This Would return 'foo bar!'.
	 *
	 * @param string $text being 'foo', then returned 'foo bar!'.
	 */
	public function myfoo( $text ) {
		$text .= ' bar!';
		return $text;
	}

	/** This is where you can add your own functions to twig.
	 *
	 * @param $twig get extension.
	 */
	public function add_to_twig( $twig ) {
		$twig->addExtension( new Twig\Extension\StringLoaderExtension() );
		$twig->addFilter( new Twig\TwigFilter( 'myfoo', array( $this, 'myfoo' ) ) );

		/* ADD FUNCTIONS*/
		$twig->addFunction( new Timber\Twig_Function( 'trl', 'trl' ) );
		$twig->addFunction( new Timber\Twig_Function( 'echodate', 'echodate' ) );
		$twig->addFunction( new Timber\Twig_Function( 'clean', 'clean' ) );
		$twig->addFunction( new Timber\Twig_Function( 'strtolower', 'strtolower' ) );

		return $twig;
	}

}

new StarterSite();

