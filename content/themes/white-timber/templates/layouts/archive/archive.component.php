<?php 

$templates = array( 'layouts/archive/archive.template.twig', 'index.twig' );

$context = Timber\Timber::context();

$context['title'] = 'Archive';
if ( is_day() ) {
	$context['title'] = 'Archive: ' . get_the_date( 'D M Y' );
} elseif ( is_month() ) {
	$context['title'] = 'Archive: ' . get_the_date( 'M Y' );
} elseif ( is_year() ) {
	$context['title'] = 'Archive: ' . get_the_date( 'Y' );
} elseif ( is_tag() ) {
	$context['title'] = single_tag_title( '', false );
} elseif ( is_category() ) {
	$context['title'] = single_cat_title( '', false );
	array_unshift( $templates, 'layouts/archive/archive-' . get_query_var( 'cat' ) . '.template.twig' );
} elseif ( is_post_type_archive() ) {
	$context['title'] = post_type_archive_title( '', false );
	array_unshift( $templates, 'layouts/archive/archive-' . get_post_type() . '.template.twig' );
}
$context['description'] = category_description();
$context['posts'] = new Timber\PostQuery();
$cat = get_query_var('cat');

foreach($context['posts'] as $i=>$post){
	$post_class = new CustomPost($post->ID);
	$post_class->get_custom_fields();
	$context['posts'][$i]->meta = $post_class->fields;
	$post_class->get_categories();
	$context['posts'][$i]->categories = $post_class->categories;
} 

$context['categories'] = get_all_categories('category', $cat);

Timber\Timber::render( $templates, $context );
