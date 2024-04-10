<?php
/**
 * Redux Framework gallery config.
 * For full documentation, please visit: http://docs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
	$opt_name,
	array(
		'title'      => esc_html__( 'Gallery', 'white-theme' ),
		'id'         => 'media-gallery',
		'desc'       => esc_html__( 'For full documentation on this field, visit: ', 'white-theme' ) . '<a href="//docs.redux.io/core/fields/gallery/" target="_blank">docs.redux.io/core/fields/gallery/</a>',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'opt-gallery',
				'type'     => 'gallery',
				'title'    => esc_html__( 'Add/Edit Gallery', 'white-theme' ),
				'subtitle' => esc_html__( 'Create a new Gallery by selecting existing or uploading new images using the WordPress native uploader', 'white-theme' ),
				'desc'     => esc_html__( 'This is the description field, again good for additional info.', 'white-theme' ),
			),
		),
	)
);
