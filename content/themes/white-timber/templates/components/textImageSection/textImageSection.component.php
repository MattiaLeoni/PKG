<?php

vc_map( 
    array(
        "name" => "Testo ed immagine",
        "base" => "text_image_section_addon",
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
                "type" => "attach_image",
                "heading" => "Immagine",
                "param_name" => "img",
                "group"       => "Immagine"
            ),
            array(
                "type" => "dropdown",
                "heading" => "Allineamento",
                "param_name" => "align",
                "value"       => array(
                    "Sinistra" => '',
                    "Centrale" => 'center',
                ),
                "group"       => "Testo"
            ),
        )
    )
);

function text_image_section_addon_shortcode($atts, $content = null){

    $data = Timber\Timber::context();

    $atts['text'] = preg_replace('"/<p[^>]*><\\/p[^>]*>/"', '', $atts['text']);
    if(!empty($atts['img'])) $atts['img_url'] = get_thumb_url_by_img_id($atts['img'], 'full');

    $data['vc'] = $atts;
    $output = Timber\Timber::fetch('textImageSection.template.twig', $data); 
    
    return $output;
}
add_shortcode('text_image_section_addon', 'text_image_section_addon_shortcode');
