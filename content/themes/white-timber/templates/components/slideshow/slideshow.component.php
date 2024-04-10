<?php

vc_map( 
    array(
        "name" => "Slideshow",
        "base" => "slideshow_addon",
        "category" => "White",
        "icon" => get_template_directory_uri() . "/core/visual-composer/icon.png",
        "params" => array( 
            array(
                'type' => 'param_group',
                'param_name' => 'group_slides', 
                "heading" => "Add a slider item",
                'params' => array(
                    array(
                        "type" => "textfield",
                        "heading" => "Titolo slide",
                        "param_name" => "title",
                    ),
                    array(
                        "type" => "textfield",
                        "heading" => "Sottotitolo slide",
                        "param_name" => "subtitle",
                    ),
                    array(
                        "type" => "attach_image",
                        "heading" => "Immagine slide",
                        "param_name" => "img",
                    ),
                    array(
                        "type" => "textfield",
                        "heading" => "Link slide",
                        "param_name" => "link",
                    ),
                )
            )
        )
    )
);

function slideshow_addon_shortcode($atts, $content = null){
    
    $data = Timber\Timber::context();

    $atts['slides'] = vc_param_group_parse_atts($atts['group_slides']); 
    foreach($atts['slides'] as $i=>$slide){
        $atts['slides'][$i]['img_url'] = get_thumb_url_by_img_id($slide['img'], 'full');
    }

    $data['vc'] = $atts;
    
    $output = Timber\Timber::fetch('slideshow.template.twig', $data); 

    return $output;
}
add_shortcode('slideshow_addon', 'slideshow_addon_shortcode');
