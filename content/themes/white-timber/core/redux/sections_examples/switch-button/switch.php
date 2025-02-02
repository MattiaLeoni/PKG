<?php
/**
 * Redux Framework switch config.
 * For full documentation, please visit: http://docs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
	$opt_name,
	array(
		'title'      => esc_html__( 'Switch', 'white-theme' ),
		'id'         => 'switch_buttonset-switch',
		'desc'       => esc_html__( 'For full documentation on this field, visit: ', 'white-theme' ) . '<a href="//docs.redux.io/core/fields/switch/" target="_blank">docs.redux.io/core/fields/switch/</a>',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'switch-on',
				'type'     => 'switch',
				'title'    => esc_html__( 'Switch On', 'white-theme' ),
				'subtitle' => esc_html__( 'Look, it\'s on!', 'white-theme' ),
				'default'  => true,
			),
			array(
				'id'       => 'switch-off',
				'type'     => 'switch',
				'title'    => esc_html__( 'Switch Off', 'white-theme' ),
				'subtitle' => esc_html__( 'Look, it\'s on!', 'white-theme' ),
				'default'  => false,
			),
			array(
				'id'       => 'switch-parent',
				'type'     => 'switch',
				'title'    => esc_html__( 'Switch - Nested Children, Enable to show', 'white-theme' ),
				'subtitle' => esc_html__( 'Look, it\'s on! Also hidden child elements!', 'white-theme' ),
				'default'  => false,
				'on'       => 'Enabled',
				'off'      => 'Disabled',
			),
			array(
				'id'       => 'switch-child1',
				'type'     => 'switch',
				'required' => array( 'switch-parent', '=', true ),
				'title'    => esc_html__( 'Switch - This and the next switch required for patterns to show', 'white-theme' ),
				'subtitle' => esc_html__( 'Also called a "fold" parent.', 'white-theme' ),
				'desc'     => esc_html__( 'Items set with a fold to this ID will hide unless this is set to the appropriate value.', 'white-theme' ),
				'default'  => false,
			),
			array(
				'id'       => 'switch-child2',
				'type'     => 'switch',
				'required' => array( 'switch-parent', '=', true ),
				'title'    => esc_html__( 'Switch2 - Enable the above switch and this one for patterns to show', 'white-theme' ),
				'subtitle' => esc_html__( 'Also called a "fold" parent.', 'white-theme' ),
				'desc'     => esc_html__( 'Items set with a fold to this ID will hide unless this is set to the appropriate value.', 'white-theme' ),
				'default'  => false,
			),
		),
	)
);
