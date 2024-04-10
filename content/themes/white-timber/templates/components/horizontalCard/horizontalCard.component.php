<?php

vc_map( 
    array(
        "name" => "Card orizzontale",
        "base" => "horizontal_card_addon",
        "category" => "White",
        "icon" => get_template_directory_uri() . "/core/visual-composer/icon.png",
        "params" => array( 
            
            array(
                "type" => "textfield",
                "heading" => "Titolo",
                "param_name" => "title",
                "admin_label" => true,
                "group"       => "Testo"

            ),
            array(
                "type" => "textarea_loop",
                "heading" => "testo",
                "param_name" => "text",
                "group"       => "Testo"

            ),
            array(
                "type" => "textfield",
                "heading" => "Testo link",
                "param_name" => "link_text",
                "group"       => "Testo"

            ),
            array(
                "type" => "textfield",
                "heading" => "Link",
                "param_name" => "link",
                "group"       => "Testo"

            ),
            array(
                "type" => "colorpicker",
                "heading" => "Sfondo testo",
                "param_name" => "bg_text",
                "group"       => "Testo"

            ),
            array(
                "type" => "colorpicker",
                "heading" => "Colore testo",
                "param_name" => "color_text",
                "group"       => "Testo"

            ),
            array(
                "type" => "dropdown",
                "heading" => "Posizione immagine",
                "param_name" => "reversed",
                "value"       => array(
                    "Destra" => 'uk-flex-row',
                    "Sinistra" => 'uk-flex-row-reverse',
                ),
                "group"       => "Immagine"
            ),
            array(
                "type" => "dropdown",
                "heading" => "Grandezza immagine",
                "param_name" => "img_size",
                "value"       => array(
                    "Centra" => 'centered',
                    "Riempi" => 'fill',
                    "Intera" => 'full',
                ),
                "group"       => "Immagine"

            ),
            array(
                "type" => "attach_image",
                "heading" => "Immagine",
                "param_name" => "img",
                "group"       => "Immagine"

            ),
            array(
                "type" => "colorpicker",
                "heading" => "Sfondo immagine",
                "param_name" => "bg_img",
                "group"       => "Immagine"

            ),

        )
    )
);

function horizontal_card_addon_shortcode($atts, $content = null){

    $data = Timber\Timber::context();

    $atts['text'] = preg_replace('"/<p[^>]*><\\/p[^>]*>/"', '', $atts['text']);
    if(!empty($atts['img'])) $atts['img_url'] = get_thumb_url_by_img_id($atts['img'], 'full');

    $data['vc'] = $atts;
    $output = Timber\Timber::fetch('horizontalCard.template.twig', $data); 
    
    return $output;
}
add_shortcode('horizontal_card_addon', 'horizontal_card_addon_shortcode');
