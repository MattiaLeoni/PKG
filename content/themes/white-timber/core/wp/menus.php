<?php

/*-----------------------------------------------------------------------------------*/
/* Register menus for Wordpress
/*-----------------------------------------------------------------------------------*/
register_nav_menus( 
	array(
		'primary'	=>	__( 'Menu Header', 'theme_menu' ), // Register the Primary menu
		'modal_1'	=>	__( 'Menu Modale', 'theme_menu' ), // Register the Primary menu
	)
);
