<?php

vc_map( 
    array(
        "name" => "Titolo pagina",
        "base" => "title_addon",
        "category" => "White",
        "icon" => get_template_directory_uri() . "/core/visual-composer/icon.png",
        "params" => array( 
            array(
                "type" => "textfield",
                "heading" => "Titolo pagina",
                "param_name" => "title",
                "admin_label" => true,
            ),
            array(
                "type" => "textfield",
                "heading" => "Sottotitolo",
                "param_name" => "subtitle",
            ),
            array(
                "type" => "attach_image",
                "heading" => "Immagine",
                "param_name" => "img",
                'group' => 'Stile'

            ),
        )
    )
);

function title_addon_shortcode($atts, $content = null){


    if(!empty($atts['img'])) $atts['img_url'] = get_thumb_url_by_img_id($atts['img'], 'full');

    if(class_exists('Timber')){  
        $data = Timber\Timber::context();
        $output = Timber\Timber::fetch('components/pageTitle/pageTitle.template.twig', $atts); 
    }
    return $output;
}
add_shortcode('title_addon', 'title_addon_shortcode');




