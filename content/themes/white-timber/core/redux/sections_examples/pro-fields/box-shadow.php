<?php
/**
 * Redux Pro Box Shadow Sample config.
 * For full documentation, please visit: http://docs.reduxframework.com/
 *
 * @package Redux Pro
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
	$opt_name,
	array(
		'title'      => esc_html__( 'Box Shadow', 'white-theme' ),
		'id'         => 'design-box-shadow',
		'desc'       => esc_html__( 'For full documentation on this field, visit: ', 'white-theme' ) . '<a href="//docs.reduxframework.com/core/fields/box-shadow/" target="_blank">docs.reduxframework.com/core/fields/box_shadow/</a>',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'opt-box_shadow',
				'type'        => 'box_shadow',
				'output'      => array( '.entry-content' ),
				'color_alpha' => array(
					'inset-shadow' => true,
				),
				'media_query' => array(
					'output'   => true,
					'compiler' => true,
					'queries'  => array(
						array(
							'rule'      => 'screen and (max-width: 360px)',
							'selectors' => array( '.box-shadow' ),
						),
						array(
							'rule'      => 'screen and (max-width: 1120px)',
							'selectors' => array( '.box-shadow-wide' ),
						),
					),
				),
				'title'       => esc_html__( 'Box Shadow', 'white-theme' ),
				'subtitle'    => esc_html__( 'Box Shadow with inset and drop shadows.', 'white-theme' ),
				'desc'        => esc_html__( 'This is the description field, again good for additional info.', 'white-theme' ),
			),
		),
	)
);
