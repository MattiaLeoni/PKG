<?php

vc_map( 
    array(
        "name" => "Hero",
        "base" => "hero_addon",
        "category" => "Webit",
        "icon" => get_template_directory_uri() . "/core/visual-composer/icon.png",
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => "Titolo Hero",
                "param_name" => "title",
            ),
            array(
                "type" => "textfield",
                "heading" => "Video background",
                "param_name" => "video_bg",
            ),
            array(
                "type" => "attach_image",
                "heading" => "Immagine overlay",
                "param_name" => "img_overlay",
            ),
            array(
                "type" => "param_group",
                "heading" => "Schede laterali",
                "param_name" => "group_slides",
                "params" => array(
                    array(
                        "type" => "textfield",
                        "heading" => "Titolo scheda",
                        "param_name" => "title_card",
                    ),
                    array(
                        "type" => "textfield",
                        "heading" => "Link scheda",
                        "param_name" => "link",
                    ),
                    array(
                        "type" => "textfield",
                        "heading" => "Testo link",
                        "param_name" => "link_text",
                    ),
                    array(
                        "type" => "attach_image",
                        "heading" => "Immagine scheda",
                        "param_name" => "img",
                    ),
                    array(
                        "type" => "attach_image",
                        "heading" => "Logo",
                        "param_name" => "logo",
                    ),
                )
            ),
        )  
    )
);

function hero_shortcode($atts, $content = null){
    
    $data = Timber\Timber::context();

    // if(!empty($atts['img_bg'])) $atts['img_bg_url'] = get_thumb_url_by_img_id($atts['img_bg'], 'full');
    if(!empty($atts['img_overlay'])) $atts['img_overlay_url'] = get_thumb_url_by_img_id($atts['img_overlay'], 'full');

    $atts['schede'] = vc_param_group_parse_atts($atts['group_slides']); 
    foreach($atts['schede'] as $i=>$slide){
        if(isset($slide['img']) && !empty($slide['img'])){
            $atts['schede'][$i]['img_url'] = get_thumb_url_by_img_id($slide['img'], 'large');
        }
        if(isset($slide['logo']) && !empty($slide['logo'])){
            $atts['schede'][$i]['logo_url'] = get_thumb_url_by_img_id($slide['logo'], 'large');
        }
        $atts['schede'][$i]['title_card_line'] = str_replace('\n', '<br>', $slide['title_card']);
        $atts['schede'][$i]['title_card'] = str_replace('\n', ' ', $slide['title_card']);
    }

    $atts['title'] = str_replace("\n", '<br>', $atts['title']);

    $data['component'] = $atts;
    $output = Timber\Timber::fetch('hero.template.twig', $data); 
    
    return $output;
}
add_shortcode('hero_addon', 'hero_shortcode');
