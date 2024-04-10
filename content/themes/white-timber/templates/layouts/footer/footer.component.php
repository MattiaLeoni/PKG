<?php 

$timberContext['content'] = ob_get_contents();
ob_end_clean();
$templates = array( 'page-plugin.twig' );
Timber\Timber::render( $templates, $timberContext );
