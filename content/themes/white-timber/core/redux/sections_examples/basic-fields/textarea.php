<?php
/**
 * Redux Framework textarea config.
 * For full documentation, please visit: http://docs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
	$opt_name,
	array(
		'title'      => esc_html__( 'Textarea', 'white-theme' ),
		'id'         => 'basic-textarea',
		'desc'       => esc_html__( 'For full documentation on this field, visit: ', 'white-theme' ) . '<a href="//docs.redux.io/core/fields/textarea/" target="_blank">docs.redux.io/core/fields/textarea/</a>',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'opt-textarea',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Textarea Option - HTML Validated Custom', 'white-theme' ),
				'subtitle' => esc_html__( 'Subtitle', 'white-theme' ),
				'desc'     => esc_html__( 'This is the description field, again good for additional info.', 'white-theme' ),
				'default'  => 'Default Text',
			),
		),
	)
);
