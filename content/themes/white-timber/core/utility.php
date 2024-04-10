<?php 

/*-----------------------------------------------------------------------------------*/
/* UTILITY 
/*-----------------------------------------------------------------------------------*/
/* 
	('thumbnail');       // Thumbnail (default 150px x 150px max)
	('medium');          // Medium resolution (default 300px x 300px max)
	('medium_large');    // Medium Large resolution (default 768px x 0px max)
	('large');           // Large resolution (default 1024px x 1024px max)
	('full');            // Original image resolution (unmodified)
*/
function get_thumb_url_by_post_id($id, $size){
	$thumb_id = get_post_thumbnail_id($id);
	$thumb_url_array = wp_get_attachment_image_src($thumb_id, $size, true);
	$thumb_url = (empty($thumb_id) ? '' : $thumb_url_array[0]);
	return $thumb_url;
}
function get_thumb_url_by_img_id($id, $size = 'full'){
	$thumb_url_array = wp_get_attachment_image_src($id, $size, true);
	$thumb_url = (empty($thumb_url_array) ? '' : $thumb_url_array[0]);
	return $thumb_url;
}

// TNP::subscribe(['email'=>'email@address.com']);
function filter_site_upload_size_limit( $size ) {
    // Set the upload size limit to 10 MB for users lacking the 'manage_options' capability.
	// 10 MB.
	$size = 1024 * 50000;
    return $size;
}
add_filter( 'upload_size_limit', 'filter_site_upload_size_limit', 20 );

function clean($string) {
	$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
	return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}


function get_menu_by_position($position){
	$menu_locations = get_nav_menu_locations(); 
	if(!array_key_exists($position, $menu_locations)) return [];
	$menu_id = $menu_locations[$position]; 
	$menu = wp_get_nav_menu_items($menu_id); // Get the array of wp objects, the nav items for our queried location.
	return $menu;
}
function get_menu_id_by_position($position){
	$menu_locations = get_nav_menu_locations();
	return $menu_locations[$position]; 
}
function get_struttura_menu($menu){
	$struttura = [];
	$current_page = get_queried_object_id();
	if(!empty($menu)):
		foreach($menu as $menu_item){
			if($menu_item->object_id)
			$array_item = [
				'id' => $menu_item->ID,
				'title' => $menu_item->title,
				'url' => $menu_item->url,
				'active' => ($menu_item->object_id == $current_page)
			];
			if(!empty($menu_item->menu_item_parent)){
				$struttura[$menu_item->menu_item_parent]['children'][$menu_item->ID] = $array_item;
			}else{
				$struttura[$menu_item->ID] = $array_item;
			}
		}
	endif;
	return $struttura;
}

function trl($string){
	if(function_exists('pll__')){
		return pll__($string);
	}else{
		return $string;
	}
}

function echodate($date){
	$date = strtotime($date);
	$giorno = date('d', $date);
	$mese = __(date('F', $date));
	$anno = date('Y', $date);
	return $giorno.' '.$mese.' '.$anno;
}

function breadcrumbs(){
	$op = [];
	$showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter = '&raquo;'; // delimiter between crumbs
    $home = 'Home'; // text for the 'Home' link
    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb

    global $post;
	$homeLink = get_bloginfo('url');
	
	$op[] = "<a href='$homeLink'>$home</a>";
	
	if (is_category()) {
		$thisCat = get_category(get_query_var('cat'), false);
		if ($thisCat->parent != 0) {
			$parent_cat = explode('__', get_category_parents($thisCat->parent, true, '__'));
			foreach($parent_cat as $parent){
				if(!empty($parent)) $op[] = $parent;
			}
		}
		$op[] = $before.single_cat_title('', false).$after;

	} elseif (is_search()) {
		$op[] = trl('Cerca') .': '.$before .  get_search_query() . $after;
	} elseif (is_day()) {
		$op[] = '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ';
		$op[] = '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ';
		$op[] = $before . get_the_time('d') . $after;
	} elseif (is_month()) {
		$op[] = '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ';
		$op[] = $before . get_the_time('F') . $after;
	} elseif (is_year()) {
		$op[] = $before . get_the_time('Y') . $after;
	} elseif (is_single() && !is_attachment()) {
		if (get_post_type() != 'post') {
			$post_type = get_post_type_object(get_post_type());
			$slug = $post_type->rewrite;
			$op[] = '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
			if ($showCurrent == 1) {
				$op[] = $before . get_the_title() . $after;
			}
		} else {
			$thisCat = get_the_category();
			$thisCat = $thisCat[0];

			if ($thisCat->parent != 0) {
				$parent_cat = explode('__', get_category_parents($thisCat->parent, true, '__'));
				foreach($parent_cat as $parent){
					if(!empty($parent)) $op[] = $parent;
				}
				$op[] = '<a href="'.get_category_link($thisCat->term_id).'">'.$thisCat->name.'</a>';
			}
			if ($showCurrent == 1) {
				$op[] = $before.get_the_title('', false).$after;
			}
		}
	} elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
		$post_type = get_post_type_object(get_post_type());
		$op[] = $before . $post_type->labels->singular_name . $after;
	} elseif (is_attachment()) {

	} elseif (is_page() && !$post->post_parent) {
		if ($showCurrent == 1) {
			$op[] = $before . get_the_title() . $after;
		}
	} elseif (is_page() && $post->post_parent) {
		$parent_id  = $post->post_parent;
		$breadcrumbs = array();
		while ($parent_id) {
			$page = get_page($parent_id);
			$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
			$parent_id  = $page->post_parent;
		}
		$breadcrumbs = array_reverse($breadcrumbs);
		for ($i = 0; $i < count($breadcrumbs); $i++) {
			$op[] = $breadcrumbs[$i];
		}
		if ($showCurrent == 1) {
			$op[] = $before . get_the_title() . $after;
		}
	} elseif (is_tag()) {
		$op[] = 'Tag: "' . $before .  single_tag_title('', false) . '"' . $after;
	} elseif (is_author()) {
		global $author;
		$userdata = get_userdata($author);
		$op[] = trl("Autore") . $before . $userdata->display_name . $after;
	} elseif (is_404()) {
		$op[] = $before . '404' . $after;
	}
	if (get_query_var('paged')) {
		$paged = '';
		if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
			$paged .= ' (';
		}
		$paged .= __('Page') . ' ' . get_query_var('paged');
		if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
			$paged .= ')';
		}
		$op[] = $paged;
	}
	return $op;
}

function get_post_by_name($post_name, $post_type = 'post', $output = OBJECT) {
    global $wpdb;
    $post = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_name = %s AND post_type= %s", $post_name, $post_type ));
    if ( $post ) return get_post($post, $output);
    return null;
}

function get_all_categories($cat = 'category', $active = 0){
	$post_list_categories = new CustomPostList();
	$post_list_categories->category = $cat;
	$post_list_categories->get_categories_list($active);
	return $post_list_categories->categories;
}