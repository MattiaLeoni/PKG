<?php

vc_map( 
    array(
        "name" => "Sezione form di contatto",
        "base" => "contact_form_section_addon",
        "category" => "White",
        "icon" => get_template_directory_uri() . "/core/visual-composer/icon.png",
        "params" => array( 
            array(
                "type" => "textfield",
                "heading" => "Numero Form Contatto",
                "param_name" => "shortcode",
                "admin_label" => true,
            ),
            array(
                "type" => "colorpicker",
                "heading" => "Colore sfondo sezione",
                "param_name" => "bg_large",
            ),
            array(
                "type" => "colorpicker",
                "heading" => "Colore sfondo contact form",
                "param_name" => "bg_form",
            ),
            array(
                "type" => "attach_image",
                "heading" => "Immagine di sfondo sezione",
                "param_name" => "img",
            ),

        )
    )
);

function contact_form_section_addon_shortcode($atts, $content = null){
     
    $data = Timber\Timber::context();

    if(!empty($atts['img'])) $atts['img_url'] = get_thumb_url_by_img_id($atts['img'], 'full');

    $data['vc'] = $atts;

    $output = Timber\Timber::fetch('contactFormSection.template.twig', $data); 

    return $output;
}
add_shortcode('contact_form_section_addon', 'contact_form_section_addon_shortcode');
