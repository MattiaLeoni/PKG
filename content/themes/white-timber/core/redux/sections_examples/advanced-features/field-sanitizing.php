<?php
/**
 * Redux Framework field sanitizing config.
 * For full documentation, please visit: http://docs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
	$opt_name,
	array(
		'title'      => esc_html__( 'Field Sanitizing', 'white-theme' ),
		'id'         => 'sanitizing',
		'desc'       => esc_html__( 'For full documentation on sanitizing, visit: ', 'white-theme' ) . '<a href="//docs.redux.io/core/the-basics/sanitizing/" target="_blank">docs.redux.io/core/the-basics/sanitizing/</a>',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'opt-text-uppercase',
				'type'     => 'text',
				'title'    => esc_html__( 'Text Option - Force Uppercase', 'white-theme' ),
				'subtitle' => esc_html__( 'Uses the strtoupper function to force all uppercase characters.', 'white-theme' ),
				'desc'     => esc_html__( 'This is the description field, again good for additional info.', 'white-theme' ),
				'sanitize' => array( 'strtoupper' ),
				'default'  => 'Force Uppercase',
			),
			array(
				'id'       => 'opt-text-sanitize-title',
				'type'     => 'text',
				'title'    => esc_html__( 'Text Option - Sanitize Title', 'white-theme' ),
				'subtitle' => esc_html__( 'Uses the WordPress sanitize_title function to format text.', 'white-theme' ),
				'desc'     => esc_html__( 'This is the description field, again good for additional info.', 'white-theme' ),
				'sanitize' => array( 'sanitize_title' ),
				'default'  => 'Sanitize This Title',
			),
			array(
				'id'       => 'opt-text-custom-sanitize',
				'type'     => 'text',
				'title'    => esc_html__( 'Text Option - Custom Sanitize', 'white-theme' ),
				'subtitle' => esc_html__( 'Uses the custom function redux_custom_santize to capitalize every other letter.', 'white-theme' ),
				'desc'     => esc_html__( 'This is the description field, again good for additional info.', 'white-theme' ),
				'sanitize' => array( 'redux_custom_sanitize' ),
				'default'  => 'Sanitize This Text',
			),
		),
	)
);
