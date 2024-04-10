<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

$context          = Timber\Timber::context();
$context['posts'] = new Timber\PostQuery();
$context['foo']   = 'bar';
$templates        = array( 'index.twig' );

$timber_post     = new Timber\Post();
$context['post'] = $timber_post;

foreach($context['posts'] as $i=>$post){
	$post_class = new CustomPost($post->ID);
	$post_class->get_custom_fields();
	$context['posts'][$i]->meta = $post_class->fields;
	$post_class->get_categories();
	$context['posts'][$i]->categories = $post_class->categories;
}

$post_list_categories = new CustomPostList();
$post_list_categories->category = "category";
$post_list_categories->get_categories_list();
$context['categories'] = $post_list_categories->categories;

if ( is_home() ) {
	array_unshift( $templates, 'front-page.twig', 'home.twig' );
}
Timber\Timber::render( $templates, $context );
