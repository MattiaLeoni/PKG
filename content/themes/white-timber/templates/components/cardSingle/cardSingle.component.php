<?php

vc_map( 
    array(
        "name" => "Card singola",
        "base" => "cardsingle_addon",
        "category" => "White",
        "icon" => get_template_directory_uri() . "/core/visual-composer/icon.png",
        "params" => array( 
            array(
                "type" => "textfield",
                "heading" => "Titolo card",
                "param_name" => "title",
                "admin_label" => true,
            ),
            array(
                "type" => "textfield",
                "heading" => "Testo card",
                "param_name" => "text",
            ),
            array(
                "type" => "textfield",
                "heading" => "Link card",
                "param_name" => "link",
            ),
            array(
                "type" => "attach_image",
                "heading" => "Image",
                "param_name" => "img",
            ),
        )
    )
);

function cardsingle_addon_shortcode($atts, $content = null){
    $data = Timber\Timber::context();

    if(!empty($atts['img'])) $atts['img_url'] = get_thumb_url_by_img_id($atts['img'], 'large');

    $data['vc'] = $atts;

    $output = Timber\Timber::fetch('cardSingle.template.twig', $data); 

    return $output;
}
add_shortcode('cardsingle_addon', 'cardsingle_addon_shortcode');
