<?php
/**
 * Redux Framework multi text config.
 * For full documentation, please visit: http://docs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
	$opt_name,
	array(
		'title'      => esc_html__( 'Multi Text', 'white-theme' ),
		'id'         => 'basic-multi-text',
		'desc'       => esc_html__( 'For full documentation on this field, visit: ', 'white-theme' ) . '<a href="//docs.redux.io/core/fields/multi-text/" target="_blank">docs.redux.io/core/fields/multi-text/</a>',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'opt-multitext',
				'type'     => 'multi_text',
				'title'    => esc_html__( 'Multi Text Option', 'white-theme' ),
				'subtitle' => esc_html__( 'Field subtitle', 'white-theme' ),
				'desc'     => esc_html__( 'Field Decription', 'white-theme' ),
			),
		),
	)
);
