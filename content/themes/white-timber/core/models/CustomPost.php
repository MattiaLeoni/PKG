<?php 

class CustomPost{

    public $post_id;
    public $post_type = 'post';
    public $post;
    public $fields;
    public $categories;
    public $category_taxonomy = 'category';
    public $author;

    public function __construct($id){
        $this->post_id = $id;
    }
    
    /**
     * 
     * Prendi post con la funzione base di wordpress
     */
    public function get_post(){
        $this->post = get_post($this->post_id);
        return $this->post;
    }

    /**
     * 
     * Prendi campi utili per la visualizzazione del post
     */
    public function get_custom_fields(){
        $post_fields = get_fields($this->post_id);
        $post_fields['img_url'] = get_thumb_url_by_post_id($this->post_id, 'large');
        $post_fields['img_url_medium'] = get_thumb_url_by_post_id($this->post_id, 'medium_large');
        $post_fields['img_url_full'] = get_thumb_url_by_post_id($this->post_id, 'full');
        $post_fields['excerpt'] = get_the_excerpt($this->post_id);
        $post_fields['link'] = get_permalink($this->post_id);
        $this->fields = $post_fields;
        return $this->fields;
    } 

    /** 
     * 
     * Prendi le categorie del post, con taxonomy definita
     * Ritorna sia le categoria formattete per la visualizzazione sia in forma raw
     */
    public function get_categories($category_taxonomy = null){
        if(!empty($category_taxonomy)) $this->category_taxonomy = $category_taxonomy;
        $post_cat = [
            'raw' => array(),
            'formatted' => ''
        ];
        $categories = get_the_terms($this->post_id, $this->category_taxonomy);
        if(empty($categories)) return;
        foreach($categories as $j=>$cat){
            $category = get_category($cat);
            $cat_link = get_term_link($cat);
            $post_cat['raw'][] = [ 
                'name' => $category->name,
                'term_id' => $category->term_id,
                'slug' => $category->slug,
                'link' => $cat_link
            ];
            if($j!=0) $post_cat['formatted'] .= ', ';
            $post_cat['formatted'] .= $category->name;
            continue;
        }
        $this->categories = $post_cat; 
        return $this->categories;
    }

    /**
     * 
     * Prendi meta dell'autore del post
     */
    public function get_author_meta(){
        if(empty($this->post)) $this->get_post();
        if(empty($this->post->post_author)) return;
        $this->author = get_userdata( $this->post->post_author )->data;
        $this->author->img = get_field('user_image_website', 'user_'.$this->post->post_author)['sizes']['medium'];
        $this->author->title = get_field('user_title', 'user_'.$this->post->post_author);
        return $this->author;
    }
    
    /**
     * 
     * Prendi post correlati, favorendo quelli con categoria della tassonomia specificata uguale
     */
    public function get_related_posts($n = 6){

        // PRENDI CATEGORIE DEL POST TRAMITE TAXONOMY PREDEFINITA
        $terms = get_the_terms( $this->post_id, $this->category_taxonomy );
        if ( empty( $terms ) ) $terms = array();
        $term_list = wp_list_pluck( $terms, 'slug' );

        // PRENDI POST CORRELATI TRAMITE CATEGORIE
        $related_post_list = new CustomPostList($this->post_type);
        $related_post_list->tax_query = array(
            'relation' => 'OR',
            array(
                'taxonomy' => $this->category_taxonomy,
                'field' => 'slug',
                'terms' => $term_list
            ),
        );
        // ESCLUDI POST ID
        $related_post_list->exclude = [ $this->post_id ];
        $this->related_posts = $related_post_list->get_custom_posts($n);
        
        // SE NON SONO ALMENO DEL NUMERO NECESSARIO, PRENDI ALTRI POST PER FILLARE LA LISTA
        if(count($this->related_posts) < $n){
            //ESCLUDENDO POST GIA TROVATI IN PRECEDENZA E IL POST_ID
            $exclude_fill_list = [$this->post_id];
            $exclude_fill_list = array_merge($exclude_fill_list, wp_list_pluck( $this->related_posts, 'ID' ));

            $fill_post_list = new CustomPostList($this->post_type);
            $fill_post_list->exclude = $exclude_fill_list;
            $fill_posts = $fill_post_list->get_custom_posts($n - count($this->related_posts));
            foreach($fill_posts as $fill_post) $this->related_posts[] = $fill_post;
        }

        // PRENDI METADATI PER CREARE CARDS 
        foreach($this->related_posts as $i=>$post){
            $post_class = new CustomPost($post->ID);
            $post_class->get_custom_fields();
            $this->related_posts[$i]->meta = $post_class->fields;
            $post_class->get_categories();
            $this->related_posts[$i]->categories = $post_class->categories;
        }
        return ($this->related_posts);
    }
}