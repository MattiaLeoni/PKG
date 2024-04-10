<?php
/**
 * Redux Framework disable field config.
 * For full documentation, please visit: http://docs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Disable Field', 'white-theme' ),
		'id'               => 'basic-checkbox-disable',
		'subsection'       => true,
		'customizer_width' => '450px',
		'desc'             => esc_html__( 'For full documentation on this field, visit: ', 'white-theme' ) . '<a href="//docs.redux.io/core/fields/checkbox/" target="_blank">docs.redux.io/core/fields/checkbox/</a>',
		'fields'           => array(
			array(
				'id'       => 'opt-checkbox-disable',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Checkbox Option', 'white-theme' ),
				'subtitle' => esc_html__( 'No validation can be done on this field type', 'white-theme' ),
				'desc'     => esc_html__( 'This is the description field, again good for additional info.', 'white-theme' ),
				'disabled' => true,
				'default'  => '1', // 1 = on | 0 = off.
			),
		),
	)
);