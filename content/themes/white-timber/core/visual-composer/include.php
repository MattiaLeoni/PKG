<?php

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme( true );
}
/**
 * Change path for overridden templates
 */
if ( function_exists( 'vc_set_shortcodes_templates_dir' ) ) {
    $dir = get_template_directory() . '/core/visual-composer/vc-core-fix';
	vc_set_shortcodes_templates_dir( $dir );
}

/* INCLUDE VC FIXEX */
include('vc-map-extend/vc-row-extend.php'); 
include('vc-map-extend/vc-add-param.php'); 

/* INCLUDE SHORTCODES AND TEMPLATING FOR WPBAKERY */
include(get_template_directory().'/templates/components/include.php'); 
