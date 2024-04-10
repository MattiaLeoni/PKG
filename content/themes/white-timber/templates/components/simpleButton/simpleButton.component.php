<?php

use Timber\Timber;

vc_map( 
    array(
        "name" => "Bottone",
        "base" => "button_addon",
        "category" => "White",
        "icon" => get_template_directory_uri() . "/core/visual-composer/icon.png",
        "params" => array( 
            array(
                "type" => "textfield",
                "heading" => "Titolo bottone",
                "param_name" => "button_title",
            ),
            array(
                "type" => "textfield",
                "heading" => "Link",
                "param_name" => "button_link",
            ),
            array(
                "type" => "dropdown",
                "heading" => "Stile",
                "param_name" => "button_style",
                "value"       => array(
                    "Standard" => 'theme-button',
                ),
            ),
            array(
                "type" => "dropdown",
                "heading" => "Allineamento",
                "param_name" => "button_align",
                "value"       => array(
                    "Sinistra" => '',
                    "Centrale" => 'center',
                ),
            ),
        )
    )
);

function button_addon_shortcode($atts, $content = null){

    $output = Timber\Timber::fetch('simpleButton.template.twig', $atts); 
    
    return $output;
}
add_shortcode('button_addon', 'button_addon_shortcode');
