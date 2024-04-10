<?php

vc_map( 
    array(
        "name" => "Example",
        "base" => "example",
        "category" => "Categoria addon",
        "icon" => get_template_directory_uri() . "/vc-addons/icon.png",
        "params" => array(
            array(
                "type"        => "textfield",
                "heading"     => "Titolo",
                "param_name"  => "title",
            ),
            array(
                "type"        => "textarea",
                "heading"     => "Testo",
                "param_name"  => "testo",
            ),
            array(
                "type" => "attach_image",
                "heading" => "Image",
                "param_name" => "img",
            ),
            array(
                "type" => "attach_images",
                "heading" => "Images",
                "param_name" => "imgs",
            ),
            array(
                "type" => "dropdown",
                "heading" => "Dropdown",
                "param_name" => "dropdown",
                "value"       => array(
                    "Style One" => 1,
                    "Style Two" => 2,
                ),
            ),
            array(
                "type" => "checkbox",
                "heading" => "Checkbox",
                "param_name" => "checkbox",
                "description" => "Description",
                'dependency' => array(
                    "element" => "dropdown",
                    "value" => array("2"),
                )
            ),
            array(
                "type" => "posttypes",
                "heading" => "Post types",
                "param_name" => "posttypes"
            ),
            array(
                "type" => "colorpicker",
                "heading" => "Color picker",
                "param_name" => "colorpicker"
            ),
            array(
                "type" => "loop",
                "heading" => "Loop",
                "param_name" => "loop"
            ),
            array(
                'type' => 'param_group',
                'param_name' => 'group_slides', 
                "heading" => "Add a slider item",
                'params' => array(
                    array(
                        "type" => "textfield",
                        "heading" => "Title",
                        "param_name" => "title",
                        "description" => "banner title",
                    ),
                    array(
                        "type" => "textfield",
                        "heading" => "Subtitle",
                        "param_name" => "subtitle",
                        "description" => "banner subtitle",
                    ),
                    array(
                        "type" => "textarea",
                        "heading" => "Description",
                        "param_name" => "desc",
                        "description" => "banner description",
                    ),
                    array(
                        "type" => "attach_image",
                        "heading" => "Banner image",
                        "param_name" => "img",
                    ),
                    array(
                        "type" => "textfield",
                        "heading" => "Button", "gunter-toolkit",
                        "param_name" => "btn1",
                        "description" => "Button Name"
                    ),
                    array(
                        "type" => "textfield",
                        "heading" => "Button Link",
                        "param_name" => "btn1_link",
                        "description" => "Button Link"
                    ),
                )
            )
        )  
    )
);

function example_shortcode($atts, $content = null){
    
    $data = Timber\Timber::context();

    $output = Timber\Timber::fetch('example.template.twig', $atts); 
    
    return $output;

}
add_shortcode('example', 'example_shortcode');
