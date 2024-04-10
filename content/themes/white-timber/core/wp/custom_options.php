<?php


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Opzioni tema',
		'menu_title'	=> 'Opzioni tema',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
		
	acf_add_options_page(array(
		'page_title' 	=> 'Info aziendali',
		'menu_title'	=> 'Info aziendali',
		'menu_slug' 	=> 'company-settings',
		'parent_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}