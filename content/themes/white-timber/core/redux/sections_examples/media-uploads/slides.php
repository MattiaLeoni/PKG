<?php
/**
 * Redux Framework slides config.
 * For full documentation, please visit: http://docs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
	$opt_name,
	array(
		'title'      => esc_html__( 'Slides', 'white-theme' ),
		'id'         => 'additional-slides',
		'desc'       => esc_html__( 'For full documentation on this field, visit: ', 'white-theme' ) . '<a href="//docs.redux.io/core/fields/slides/" target="_blank">docs.redux.io/core/fields/slides/</a>',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'opt-slides',
				'type'        => 'slides',
				'title'       => esc_html__( 'Slides Options', 'white-theme' ),
				'subtitle'    => esc_html__( 'Unlimited slides with drag and drop sortings.', 'white-theme' ),
				'desc'        => esc_html__( 'This field will store all slides values into a multidimensional array to use into a foreach loop.', 'white-theme' ),
				'placeholder' => array(
					'title'       => esc_html__( 'This is a title', 'white-theme' ),
					'description' => esc_html__( 'Description Here', 'white-theme' ),
					'url'         => esc_html__( 'Give us a link!', 'white-theme' ),
				),
			),
		),
	)
);
