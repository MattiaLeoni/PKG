<?php

function admin_scripts()  { 
	// get the theme directory style.css and link to it in the header
	wp_enqueue_style('summernotecss', get_template_directory_uri() .'/core/visual-composer/vc-map-extend/summernote/summernote.min.css');
	wp_enqueue_style('bootstrapcss', get_template_directory_uri() .'/core/visual-composer/vc-map-extend/summernote/editor-bootstrap.css');
	// add libraries 
	wp_enqueue_script( 'summernotejs', get_template_directory_uri() .'/core/visual-composer/vc-map-extend/summernote/summernote.min.js', array( 'jquery' ));
	wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() .'/core/visual-composer/vc-map-extend/summernote/bootstrap.min.js', array( 'jquery' ));
} 
add_action( 'admin_enqueue_scripts', 'admin_scripts' ); // Register this fxn and allow Wordpress to call it automatcally in the header


vc_add_shortcode_param( 
    'textarea_loop' , 
    'textarea_loop_value',  
    get_template_directory_uri() . '/core/visual-composer/vc-map-extend/summernote/summernote.js?v=20' 
);
function textarea_loop_value($settings, $value){
    $value = "<p>".str_replace("\n", "</p><p>", $value)."</p>";

    return
    '<div class="my_param_block summernote-editor">'
        .'<textarea name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value summernote ' .
        esc_attr( $settings['param_name'] ) . ' ' .
        esc_attr( $settings['type'] ) . '_field" type="text" >' . $value . '</textarea>' .
    '</div>'; // This is html markup that will be outputted in content elements edit form
}