<?php

vc_map( 
    array(
        "name" => "Contatti",
        "base" => "contatti_addon",
        "category" => "White",
        "icon" => get_template_directory_uri() . "/core/visual-composer/icon.png",
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => "Form id",
                "param_name" => "form_id",
            ),
        )  
    )
);

function contatti_shortcode($atts, $content = null){
    
    $data = Timber\Timber::context();
    $data['component'] = $atts;

    $output = Timber\Timber::fetch('contatti.template.twig', $data); 
    
    return $output;
}
add_shortcode('contatti_addon', 'contatti_shortcode');
