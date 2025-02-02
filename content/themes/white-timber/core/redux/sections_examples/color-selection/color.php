<?php
/**
 * Redux Framework color config.
 * For full documentation, please visit: http://docs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
	$opt_name,
	array(
		'title'      => esc_html__( 'Color', 'white-theme' ),
		'id'         => 'opt-color',
		'desc'       => esc_html__( 'For full documentation on this field, visit: ', 'white-theme' ) . '<a href="//docs.redux.io/core/fields/color/" target="_blank">docs.redux.io/core/fields/color/</a>',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'opt-color-title',
				'type'        => 'color',
				'output'      => array(
					'background-color' => '.site-background',
					'color'            => '.site-title',
				),
				'title'       => esc_html__( 'Site Title Color', 'white-theme' ),
				'subtitle'    => esc_html__( 'Pick a title color for the theme (default: #000).', 'white-theme' ),
				'default'     => '#000000',
				'color_alpha' => true,
			),
			array(
				'id'       => 'opt-color-footer',
				'type'     => 'color',
				'title'    => esc_html__( 'Footer Background Color', 'white-theme' ),
				'subtitle' => esc_html__( 'Pick a background color for the footer (default: #dd9933).', 'white-theme' ),
				'default'  => '#dd9933',
				'validate' => 'color',
				'output'   => array( '.footer' ),
			),
		),
	)
);
