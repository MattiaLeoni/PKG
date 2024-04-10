<?php
/**
 * Redux Framework date config.
 * For full documentation, please visit: http://docs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
	$opt_name,
	array(
		'title'      => esc_html__( 'Date', 'white-theme' ),
		'id'         => 'additional-date',
		'desc'       => esc_html__( 'For full documentation on this field, visit: ', 'white-theme' ) . '<a href="//docs.redux.io/core/fields/date/" target="_blank">docs.redux.io/core/fields/date/</a>',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'opt-datepicker',
				'type'     => 'date',
				'title'    => esc_html__( 'Date Option', 'white-theme' ),
				'subtitle' => esc_html__( 'No validation can be done on this field type', 'white-theme' ),
				'desc'     => esc_html__( 'This is the description field, again good for additional info.', 'white-theme' ),
			),
		),
	)
);
