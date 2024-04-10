<?php 

class CustomPostList{

    public $posts = [];
    public $post_type = null;
    public $category_taxonomy = 'category';
    public $categories = null;
    public $args = [];
    public $meta_query = [];
    public $tax_query = [];
    public $exclude = [];
    public $orderby = 'date';
    public $order = 'DESC';


    public function __construct($post_type = 'post'){
        $this->post_type = $post_type;
    }

    /**
     * 
     * Prendi lista di post tramite funzione get_post di wordpress
     */
    public function get_custom_posts($n = -1, $page = 0){

        $this->args = array(
            'post_type' => $this->post_type,
            'numberposts' => $n,
            'orderby' => $this->orderby,
            'order' => $this->order,
            'paged' => $page,
            'post__not_in' => $this->exclude,
        ); 
        if($this->meta_query) $this->args['meta_query'] = $this->meta_query;
        if($this->tax_query) $this->args['tax_query'] = $this->tax_query;
        
        $this->posts = get_posts(
            $this->args
        );
        return $this->posts;
    }

    /**
     * 
     * Prendi i metadati dei post nella lista tramite funzione CustomPost::get_custom_fields per ogni post
     */
    public function get_custom_fields_list(){
        foreach($this->posts as $i=>$post){
            $Post = new CustomPost($post->ID);
            $fields = $Post->get_custom_fields();
            $this->posts[$i]->meta = $fields;
        }
    }

    /**
     * 
     * Prendi la categoria dei post nella lista tramite funzione CustomPost::get_categories per ogni post
     */
    public function get_posts_categories(){
        foreach($this->posts as $i=>$post){
            $Post = new CustomPost($post->ID);
            $categories = $Post->get_categories($this->category_taxonomy);
            $this->posts[$i]->categories = $categories;
        }
        return;

    }

    /**
     * 
     * Prendi lista di categorie del post_type selezionato, con gerarchia
     */
    public function get_categories_list($active = 0){ 
        if(empty($this->category_taxonomy)) return;
        $categories = get_categories( array( 
            'taxonomy' => $this->category_taxonomy,
            'hide_empty' => false,
            'hierarchical' => true,
            'order' => 'ASC',
            'orderby' => 'slug'
        ) );
        $cats_by_parent = array();
        foreach ($categories as $cat)
        {
            $parent_id = $cat->category_parent;
            if (!array_key_exists($parent_id, $cats_by_parent)) 
            {
                $cats_by_parent[$parent_id] = array();
            }
            $cat->url = get_term_link($cat->term_id);
            if($cat->term_id == $active) $cat->active = 'active';

            $cats_by_parent[$parent_id][] = $cat;
        }

        $cat_tree = array();
        $this->add_category_to_list($cat_tree, $cats_by_parent[0], $cats_by_parent);
        foreach($cat_tree as $i=>$tree){
            if(is_array($tree->children)){
                foreach($tree->children as $j=>$child){
                    if($child->active == 'active'){
                        $cat_tree[$i]->open = 'uk-open';
                    }
                }
            }
        }
        $this->categories = $cat_tree;
    }
    private function add_category_to_list(&$child_bag, &$children, $cats_by_parent)
    {
       foreach ($children as $child_cat) 
       {
         $child_id = $child_cat->cat_ID;
         if (array_key_exists($child_id, $cats_by_parent)) 
         {
            $child_cat->children = array();
            $this->add_category_to_list($child_cat->children, $cats_by_parent[$child_id], $cats_by_parent);
         }
         $child_bag[$child_id] = $child_cat;
       }
    }


}