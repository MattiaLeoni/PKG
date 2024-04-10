<?php
/**
 * Search results page
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

$templates = array( 'search.twig', 'archive.twig', 'index.twig' );

$context          = Timber\Timber::context();
$context['title'] = 'Search results for ' . get_search_query();
$context['searched'] = get_search_query();
$context['posts'] = new Timber\PostQuery();

foreach($context['posts'] as $i=>$post){
	$post_class = new CustomPost($post->ID);
	$post_class->get_custom_fields();
	$context['posts'][$i]->meta = $post_class->fields;
	$post_class->get_categories();
	$context['posts'][$i]->categories = $post_class->categories;
}
Timber\Timber::render( $templates, $context );
