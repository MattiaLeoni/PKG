<?php 


$context         = Timber\Timber::context();
$timber_post     = Timber\Timber::query_post();
$context['post'] = $timber_post;
$categories = $timber_post->terms( 'category' );
$context['post_categories_details'] = [];
$context['post_categories_link'] = [];
foreach($categories as $cat){
	$cat_link = get_term_link($cat->ID);
	$context['post_categories'][] = [ 
		'name' => $cat->name,
		'ID' => $cat->ID,
		'slug' => $cat->slug,
		'link' => $cat_link
	];
	$context['post_categories_link'][] = '<a href="'.$cat_link.'">'.$cat->name.'</a>';
}
$cover_image_id = $timber_post->_thumbnail_id;
$context['cover_image'] = new Timber\Image($cover_image_id);
$context['meta'] = get_fields($timber_post->ID);

$post_class = new CustomPost($timber_post->ID);
$context['related_news'] = $post_class->get_related_posts();

if ( post_password_required( $timber_post->ID ) ) {
	Timber\Timber::render( 'layouts/single/single-password.template.twig', $context );
} else {
	Timber\Timber::render( array( 'layouts/single/single-' . $timber_post->ID . '.template.twig', 'layouts/single/single-' . $timber_post->post_type . '.template.twig', 'layouts/single/single-' . $timber_post->slug . '.template.twig', 'layouts/single/single.template.twig' ), $context );
}
