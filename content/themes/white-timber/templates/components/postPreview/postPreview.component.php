<?php

vc_map( 
    array(
        "name" => "Lista articoli",
        "base" => "posts_preview_addon",
        "category" => "White",
        "icon" => get_template_directory_uri() . "/core/visual-composer/icon.png",
        "params" => array( 
            array(
                "type" => "textfield",
                "heading" => "Categoria",
                "param_name" => "category",
                "admin_label" => true,
                "group"       => "Articoli"
            ),
            array(
                "type" => "textfield",
                "heading" => "Numero elementi",
                "param_name" => "num",
                "group"       => "Articoli"
            ),
            array(
                "type" => "dropdown",
                "heading" => "Stile card",
                "param_name" => "style",
                "value"       => array(
                    "Standard" => 'standard',
                ),
                "group"       => "Articoli"
            ),
            array(
                "type" => "dropdown",
                "heading" => "Tipologia",
                "param_name" => "type",
                "value"       => array(
                    "Articoli" => 'posts',
                    "Sottocategorie" => 'subcategories',
                ),
                "group"       => "Articoli"
            ),
            array(
                "type" => "textfield",
                "heading" => "Testo senza articoli",
                "param_name" => "no_articles_text",
                "group"       => "Altro"
            ),
        )
    )
);

function posts_preview_addon_shortcode($atts, $content = null){

    $data = Timber\Timber::context();

    $num = (int)$atts['num'];
    if(empty($atts['type'])) $atts['type'] = 'posts';

    if($atts['type'] == 'subcategories'){
        $posts = array();
        $parent_category = get_category_by_slug($atts['category']);
        $categories = get_categories( array('parent' => $parent_category->term_id, 'hide_empty' => 0 ) );
        foreach($categories as $i=>$cat){
            if($i >= $num) break;
            $posts[] = array(
                'post_title' => $cat->name,
                'meta' => array(
                    'link' => get_category_link( $cat->term_id ),
                    'img_url' => get_field('img', $cat->taxonomy.'_'.$cat->term_id),
                )
            );
        }
    }else{
        $post_class = new CustomPostList();
        if(!empty($atts['category'])){
            $cat = get_category_by_slug($atts['category']);
            $post_class->post_category = $cat->term_id;
        }
        $post_class->get_custom_posts($num);
        $post_class->get_custom_fields_list();
        $post_class->get_posts_categories();
        $posts = $post_class->posts;
    }
    
    if(empty($atts['style'])) $atts['style'] = 'standard';

    $data['vc'] = $atts;
    $data['posts'] = $posts;
    $data['no_articles_text'] = $atts['no_articles_text'];
    
    $output = Timber\Timber::fetch('templates/postPreview.'.$atts['style'].'.template.twig', $data); 

    return $output;
}
add_shortcode('posts_preview_addon', 'posts_preview_addon_shortcode');
