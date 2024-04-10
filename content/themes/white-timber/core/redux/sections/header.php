<?php 

$section = array(
	'title'  => esc_html__( 'Header', 'white-theme' ),
	'id'     => 'header',
	// 	'subsection' => true,
	'desc'   => esc_html__( 'Impostazioni header del sito', 'white-theme' ),
	'icon'   => 'el el-th-list',
	'fields' => array(
		array(
			'id'           => 'logo',
			'type'         => 'media',
			'url'          => false,
			'title'        => esc_html__( 'Logo', 'white-theme' ),
			'compiler'     => 'true',
		),
		array(
			'id'           => 'logo_mobile',
			'type'         => 'media',
			'url'          => false,
			'title'        => esc_html__( 'Logo mobile', 'white-theme' ),
			'compiler'     => 'true',
			'subtitle'     => esc_html__( 'Se diverso dall\'originale', 'white-theme' ),
		),
		array(
			'id'       => 'header_style',
			'type'     => 'select',
			'title'    => esc_html__( 'Stile header', 'white-theme' ),
			'options'  => array(
				'standard' => 'Standard',
				'floating' => 'Floating',
			),
			'default'  => 'standard',
		),
		array(
			'id'       => 'header_width',
			'type'     => 'select',
			'title'    => esc_html__( 'Larghezza header', 'white-theme' ),
			'options'  => array(
				'full' => 'Larghezza intera',
				'grid' => 'Container',
			),
			'default'  => 'grid',
		),
		array(
			'id'       => 'hamburger_always_on',
			'type'     => 'switch',
			'title'    => esc_html__( 'Hamburger sempre visibile', 'white-theme' ),
			'subtitle'     => esc_html__( 'Se deselezionato il menù ad hamburger sarà visibile solo in mobile', 'white-theme' ),
			'on' => 'Si',
			'off' => 'No',
			'default'  => '1', // 1 = on | 0 = off.
		),

		array(
			'id'       => 'language_position',
			'type'     => 'select',
			'title'    => esc_html__( 'Posizione menù lingue', 'white-theme' ),
			'options'  => array(
				'top_header' => 'Top header',
				'main_header' => 'Header principale',
			),
			'default'  => 'top_header',
		),
		array(
			'id'       => 'search_position',
			'type'     => 'select',
			'title'    => esc_html__( 'Posizione icona di ricerca', 'white-theme' ),
			'options'  => array(
				'top_header' => 'Top header',
				'main_header' => 'Header principale',
			),
			'default'  => 'top_header',
		),
		array(
			'id'       => 'modal_position',
			'type'     => 'select',
			'title'    => esc_html__( 'Posizione testo menù modale', 'white-theme' ),
			'options'  => array(
				'right' => 'Destra',
				'center' => 'Centro',
				'left' => 'Sinistra',
			),
			'default'  => 'right',
		),
	),
);
Redux::set_section( $opt_name, $section );