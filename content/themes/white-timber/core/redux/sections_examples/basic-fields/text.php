<?php
/**
 * Redux Framework text config.
 * For full documentation, please visit: http://docs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Text', 'white-theme' ),
		'desc'             => esc_html__( 'For full documentation on this field, visit: ', 'white-theme' ) . '<a href="//docs.redux.io/core/fields/text/" target="_blank">docs.redux.io/core/fields/text/</a>',
		'id'               => 'basic-text',
		'subsection'       => true,
		'customizer_width' => '700px',
		'fields'           => array(
			array(
				'id'       => 'text-example',
				'type'     => 'text',
				'title'    => esc_html__( 'Text Field', 'white-theme' ),
				'subtitle' => esc_html__( 'Subtitle', 'white-theme' ),
				'desc'     => esc_html__( 'Field Description', 'white-theme' ),
				'default'  => 'Default Text',
			),
			array(
				'id'        => 'text-example-hint',
				'type'      => 'text',
				'title'     => esc_html__( 'Text Field w/ Hint', 'white-theme' ),
				'subtitle'  => esc_html__( 'Subtitle', 'white-theme' ),
				'desc'      => esc_html__( 'Field Description', 'white-theme' ),
				'default'   => 'Default Text',
				'text_hint' => array(
					'title'   => 'Hint Title',
					'content' => 'Hint content about this field!',
				),
			),
			array(
				'id'          => 'text-placeholder',
				'type'        => 'text',
				'title'       => esc_html__( 'Text Field w/ placeholder using custom data object.', 'white-theme' ),
				'subtitle'    => esc_html__( 'Subtitle', 'white-theme' ),
				'desc'        => esc_html__( 'Field Description', 'white-theme' ),
				'placeholder' => 'Placeholder Text',
				'data'        => array( 'box1', 'box2' ),
			),
		),
	)
);
