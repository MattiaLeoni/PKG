<?php
/**
 * Redux Repeater Sample config.
 *
 * For full documentation, please visit: http://docs.reduxframework.com/
 *
 * @package Redux Pro
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
	$opt_name,
	array(
		'title'      => __( 'Repeater', 'white-theme' ),
		'desc'       => esc_html__( 'For full documentation on this field, visit: ', 'white-theme' ) . '<a href="//docs.reduxframework.com/extensions/repeater" target="_blank">docs.reduxframework.com/extensions/repeater</a>',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'repeater-field-id2',
				'type'        => 'repeater',
				'title'       => esc_html__( 'Repeater Demo', 'white-theme' ),
				'full_width'  => true,
				'subtitle'    => esc_html__( 'Repeater', 'white-theme' ),
				'item_name'   => '',
				'sortable'    => true,
				'active'      => false,
				'collapsible' => false,
				'fields'      => array(
					array(
						'id'          => 'title_field',
						'type'        => 'text',
						'placeholder' => esc_html__( 'Title', 'white-theme' ),
					),
					array(
						'id'          => 'textarea_field',
						'type'        => 'textarea',
						'placeholder' => esc_html__( 'Text Field', 'white-theme' ),
						'default'     => 'Text Field here',
					),
					array(
						'id'          => 'select_field',
						'type'        => 'select',
						'title'       => esc_html__( 'Select Field', 'white-theme' ),
						'options'     => array(
							'1' => esc_html__( 'Option 1', 'white-theme' ),
							'2' => esc_html__( 'Option 2', 'white-theme' ),
							'3' => esc_html__( 'Option 3', 'white-theme' ),
						),
						'placeholder' => esc_html__( 'Listing Field', 'white-theme' ),
					),
					array(
						'id'          => 'switch_field',
						'type'        => 'switch',
						'placeholder' => esc_html__( 'Switch Field', 'white-theme' ),
						'default'     => true,
					),
					array(
						'id'          => 'text_field',
						'type'        => 'text',
						'placeholder' => esc_html__( 'Text Field', 'white-theme' ),
						'required'    => array( 'switch_field', '=', false ),
						'default'     => 'Text Field here',
					),
				),
			),
		),
	)
);
