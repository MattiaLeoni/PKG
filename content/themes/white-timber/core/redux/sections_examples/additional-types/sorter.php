<?php
/**
 * Redux Framework sorter config.
 * For full documentation, please visit: http://docs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
	$opt_name,
	array(
		'title'      => esc_html__( 'Sorter', 'white-theme' ),
		'id'         => 'additional-sorter',
		'desc'       => esc_html__( 'For full documentation on this field, visit: ', 'white-theme' ) . '<a href="//docs.redux.io/core/fields/sorter/" target="_blank">docs.redux.io/core/fields/sorter/</a>',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'opt-homepage-layout',
				'type'     => 'sorter',
				'title'    => 'Layout Manager Advanced',
				'subtitle' => 'You can add multiple drop areas or columns.',
				'compiler' => 'true',
				'options'  => array(
					'enabled'  => array(
						'highlights' => 'Highlights',
						'slider'     => 'Slider',
						'staticpage' => 'Static Page',
						'services'   => 'Services',
					),
					'disabled' => array(),
					'backup'   => array(),
				),
				'limits'   => array(
					'disabled' => 1,
					'backup'   => 2,
				),
			),
			array(
				'id'       => 'opt-homepage-layout-2',
				'type'     => 'sorter',
				'title'    => 'Homepage Layout Manager',
				'desc'     => 'Organize how you want the layout to appear on the homepage',
				'compiler' => 'true',
				'options'  => array(
					'disabled' => array(
						'highlights' => 'Highlights',
						'slider'     => 'Slider',
					),
					'enabled'  => array(
						'staticpage' => 'Static Page',
						'services'   => 'Services',
					),
				),
			),
		),
	)
);
