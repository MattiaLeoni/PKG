<?php
/**
 * Redux Framework WordPress editor config.
 * For full documentation, please visit: http://docs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
	$opt_name,
	array(
		'title'      => esc_html__( 'WordPress Editor', 'white-theme' ),
		'id'         => 'editor-wordpress',
		'desc'       => esc_html__( 'For full documentation on this field, visit: ', 'white-theme' ) . '<a href="//docs.redux.io/core/fields/editor/" target="_blank">docs.redux.io/core/fields/editor/</a>',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'opt-editor',
				'type'     => 'editor',
				'title'    => esc_html__( 'Editor', 'white-theme' ),
				'subtitle' => esc_html__( 'Use any of the features of WordPress editor inside your panel!', 'white-theme' ),
				'default'  => 'Powered by Redux Framework.',
			),
			array(
				'id'      => 'opt-editor-tiny',
				'type'    => 'editor',
				'title'   => esc_html__( 'Editor w/o Media Button', 'white-theme' ),
				'default' => 'Powered by Redux Framework.',
				'args'    => array(
					'wpautop'       => false,
					'media_buttons' => false,
					'textarea_rows' => 5,
					'teeny'         => false,
					'quicktags'     => false,
				),
			),
			array(
				'id'         => 'opt-editor-full',
				'type'       => 'editor',
				'title'      => esc_html__( 'Editor - Full Width', 'white-theme' ),
				'full_width' => true,
			),
		),
	)
);
