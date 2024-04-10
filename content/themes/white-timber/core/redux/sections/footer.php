<?php 

$section = array(
	'title'  => esc_html__( 'Footer', 'white-theme' ),
	'id'     => 'footer',
	'desc'   => esc_html__( 'Impostazioni footer tema', 'white-theme' ),
	'icon'   => 'el el-th-list',
	'fields' => array(
	),
);
Redux::set_section( $opt_name, $section );