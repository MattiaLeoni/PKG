<?php
/**
 * Redux Pro Icon Select Sample config.
 * For full documentation, please visit: http://docs.reduxframework.com/
 *
 * @package Redux Pro
 */

defined( 'ABSPATH' ) || exit;

require_once Redux_Pro::$dir . 'core/inc/extensions/icon_select/font-awesome-5-free.php';

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Icon Select', 'white-theme' ),
		'desc'       => esc_html__( 'For full documentation on this field, visit: ', 'white-theme' ) . '<a href="//docs.reduxframework.com/extensions/icon-select/" target="_blank">docs.reduxframework.com/extensions/icon-select/</a>',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'               => 'icon_select_field',
				'type'             => 'icon_select',
				'title'            => esc_html__( 'Icon Select', 'white-theme' ),
				'subtitle'         => esc_html__( 'Select an icon.', 'white-theme' ),
				'default'          => '',
				'options'          => redux_icon_select_fa_5_free(),

				// Disable auto-enqueue of stylesheet if present in the panel.
				'enqueue'          => true,

				// Disable auto-enqueue of stylesheet on the front-end.
				'enqueue_frontend' => false,
				'stylesheet'       => 'https://use.fontawesome.com/releases/v5.6.3/css/all.css',

				// If needed to initialize the icon.
				'prefix'           => 'fa',

				// How each icons begins for this given font.
				'selector'         => 'fa-',

				// Change the height of the container. defaults to 300px; .
				'height'           => 300,
			),
		),
	)
);
