<?php
/**
 * Redux Framework section config.
 * For full documentation, please visit: http://docs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
	$opt_name,
	array(
		'title'      => esc_html__( 'Section', 'white-theme' ),
		'id'         => 'presentation-section',
		'desc'       => esc_html__( 'For full documentation on this field, visit: ', 'white-theme' ) . '<a href="//docs.redux.io/core/fields/section/" target="_blank">docs.redux.io/core/fields/section/</a>',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'section-start',
				'type'     => 'section',
				'title'    => esc_html__( 'Section Example', 'white-theme' ),
				'subtitle' => esc_html__( 'With the "section" field you can create indented option sections.', 'white-theme' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => 'section-test',
				'type'     => 'text',
				'title'    => esc_html__( 'Field Title', 'white-theme' ),
				'subtitle' => esc_html__( 'Field Subtitle', 'white-theme' ),
			),
			array(
				'id'       => 'section-test-media',
				'type'     => 'media',
				'title'    => esc_html__( 'Field Title', 'white-theme' ),
				'subtitle' => esc_html__( 'Field Subtitle', 'white-theme' ),
			),
			array(
				'id'     => 'section-end',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'   => 'section-info',
				'type' => 'info',
				'desc' => esc_html__( 'And now you can add more fields below and outside of the indent.', 'white-theme' ),
			),
		),
	)
);
