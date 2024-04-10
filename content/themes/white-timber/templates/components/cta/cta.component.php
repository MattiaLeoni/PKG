<?php

vc_map( 
    array(
        "name" => "Call to action",
        "base" => "cta_addon",
        "category" => "White",
        "icon" => get_template_directory_uri() . "/core/visual-composer/icon.png",
        "params" => array( 
            
            array(
                "type" => "textfield",
                "heading" => "Titolo",
                "param_name" => "cta_title",
                "admin_label" => true,
                "group"       => "Testo"

            ),
            array(
                "type" => "textarea",
                "heading" => "testo",
                "param_name" => "cta_text",
                "group"       => "Testo"

            ),
            array(
                "type" => "textfield",
                "heading" => "Testo link",
                "param_name" => "cta_link_text",
                "group"       => "Testo"

            ),
            array(
                "type" => "textfield",
                "heading" => "Link",
                "param_name" => "cta_link",
                "group"       => "Testo"
            ),
            array(
                "type" => "textfield",
                "heading" => "Stile link bottone",
                "param_name" => "cta_link_style",
                "group"       => "Testo"
            ),
        )
    )
);

function cta_addon_shortcode($atts, $content = null){

    $output = Timber\Timber::fetch('cta.template.twig', $atts); 

    return $output;
}
add_shortcode('cta_addon', 'cta_addon_shortcode');
