<?php 

$context = Timber\Timber::context();

$timber_post     = new Timber\Post();
$context['post'] = $timber_post;
Timber\Timber::render( array( 'layouts/page/page-' . $timber_post->post_name . '.template.twig', 'layouts/page/page.template.twig' ), $context );

?>