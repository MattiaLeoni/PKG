<?php

vc_map( 
    array(
        "name" => "component_name",
        "base" => "component_slug_addon",
        "category" => "component_category",
        "icon" => get_template_directory_uri() . "/core/visual-composer/icon.png",
        "params" => array(
        )  
    )
);

function component_slug_shortcode($atts, $content = null){
    
    $data = Timber\Timber::context();

    

    $data['component'] = $atts;
    $output = Timber\Timber::fetch('component_slug.template.twig', $data); 
    
    return $output;
}
add_shortcode('component_slug_addon', 'component_slug_shortcode');
