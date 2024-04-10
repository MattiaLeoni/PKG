<?php
/**
 * Redux Pro Color Palette Sample config.
 *
 * For full documentation, please visit: http://docs.reduxframework.com/
 *
 * @package Redux Pro
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
	$opt_name,
	array(
		'title'      => esc_html__( 'Color Palette', 'white-theme' ),
		'desc'       => esc_html__( 'For full documentation on this field, visit: ', 'white-theme' ) . '<a href="//docs.reduxframework.com/core/fields/color-palette/" target="_blank">docs.reduxframework.com/core/fields/color-palette/</a>',
		'id'         => 'color-palette',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'opt-color-palette-grey',
				'type'     => 'color_palette',
				'title'    => esc_html__( 'Color Palette Control', 'white-theme' ),
				'subtitle' => esc_html__( 'User defined colors with round selectors.', 'white-theme' ),
				'desc'     => esc_html__( 'This is the description field, again good for additional info.', 'white-theme' ),
				'default'  => '#888888',
				'options'  => array(
					'colors' => array(
						'#000000',
						'#222222',
						'#444444',
						'#666666',
						'#888888',
						'#aaaaaa',
						'#cccccc',
						'#eeeeee',
						'#ffffff',
					),
					'style'  => 'round',
				),
				'output'   => array(
					'background-color' => 'body',
				),
			),
			array(
				'id'       => 'opt-color-palette-mui-all',
				'type'     => 'color_palette',
				'title'    => esc_html__( 'Color Palette Control', 'white-theme' ),
				'subtitle' => esc_html__( 'All Material Dedign Colors.', 'white-theme' ),
				'desc'     => esc_html__( 'This is the description field, again good for additional info.', 'white-theme' ),
				'default'  => '#F44336',
				'options'  => array(
					'colors' => Redux_Pro_Helpers::get_material_design_colors( 'all' ),
					'size'   => 17,
				),
			),
			array(
				'id'       => 'opt-color-palette-mui-primary',
				'type'     => 'color_palette',
				'title'    => esc_html__( 'Color Palette Control', 'white-theme' ),
				'subtitle' => esc_html__( 'Primary Material Dedign Colors.', 'white-theme' ),
				'desc'     => esc_html__( 'This is the description field, again good for additional info.', 'white-theme' ),
				'default'  => '#000000',
				'options'  => array(
					'colors'     => Redux_Pro_Helpers::get_material_design_colors( 'primary' ),
					'size'       => 25,
					'box-shadow' => true,
					'margin'     => true,
				),
			),
			array(
				'id'       => 'opt-color-palette-mui-red',
				'type'     => 'color_palette',
				'title'    => esc_html__( 'Color Palette Control', 'white-theme' ),
				'subtitle' => esc_html__( 'Red Material Dedign Colors.', 'white-theme' ),
				'desc'     => esc_html__( 'This is the description field, again good for additional info.', 'white-theme' ),
				'default'  => '#FF1744',
				'options'  => array(
					'colors' => Redux_Pro_Helpers::get_material_design_colors( 'red' ),
					'size'   => 25,
				),
			),
			array(
				'id'       => 'opt-color-palette-mui-a100',
				'type'     => 'color_palette',
				'title'    => esc_html__( 'Color Palette Control', 'white-theme' ),
				'subtitle' => esc_html__( 'A100 Material Dedign Colors.', 'white-theme' ),
				'desc'     => esc_html__( 'This is the description field, again good for additional info.', 'white-theme' ),
				'default'  => '#FF80AB',
				'options'  => array(
					'colors' => Redux_Pro_Helpers::get_material_design_colors( 'A100' ),
					'size'   => 60,
					'style'  => 'round',
				),
			),
		),
	)
);
