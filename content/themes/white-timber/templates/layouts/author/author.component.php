<?php

global $wp_query;

$context          = Timber\Timber::context();
$context['posts'] = new Timber\PostQuery();
if ( isset( $wp_query->query_vars['author'] ) ) {
	$author            = new Timber\User( $wp_query->query_vars['author'] );
	$context['author'] = $author;
	$context['title']  = 'Author Archives: ' . $author->name();
}
Timber\Timber::render( array( 'layouts/author/author.template.twig', 'layouts/archive/archive.template.twig' ), $context );

?>