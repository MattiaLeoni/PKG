<?php
/**
 * Redux Framework link color config.
 * For full documentation, please visit: http://docs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
	$opt_name,
	array(
		'title'      => esc_html__( 'Link Color', 'white-theme' ),
		'desc'       => esc_html__( 'For full documentation on this field, visit: ', 'white-theme' ) . '<a href="//docs.redux.io/core/fields/link-color/" target="_blank">docs.redux.io/core/fields/link-color/</a>',
		'id'         => 'color-link',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'opt-link-color',
				'type'     => 'link_color',
				'title'    => esc_html__( 'Links Color Option', 'white-theme' ),
				'subtitle' => esc_html__( 'Only color validation can be done on this field type', 'white-theme' ),
				'desc'     => esc_html__( 'This is the description field, again good for additional info.', 'white-theme' ),
				'default'  => array(
					'regular' => '#aaa',
					'hover'   => '#bbb',
					'active'  => '#ccc',
				),
				'output'   => 'a',

				// phpcs:ignore Squiz.PHP.CommentedOutCode
				// 'regular'   => false, // Disable Regular Color.
				// 'hover'     => false, // Disable Hover Color.
				// 'active'    => false, // Disable Active Color.
				// 'visited'   => true,  // Enable Visited Color.
			),
		),
	)
);
