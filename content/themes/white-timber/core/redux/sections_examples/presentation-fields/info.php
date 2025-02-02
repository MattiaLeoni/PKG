<?php
/**
 * Redux Framework info config.
 * For full documentation, please visit: http://docs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
	$opt_name,
	array(
		'title'      => esc_html__( 'Info', 'white-theme' ),
		'id'         => 'presentation-info',
		'desc'       => esc_html__( 'For full documentation on this field, visit: ', 'white-theme' ) . '<a href="//docs.redux.io/core/fields/info/" target="_blank">docs.redux.io/core/fields/info/</a>',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'   => 'opt-info-field',
				'type' => 'info',
				'desc' => esc_html__( 'This is the info field, if you want to break sections up.', 'white-theme' ),
			),
			array(
				'id'    => 'opt-notice-info1',
				'type'  => 'info',
				'style' => 'info',
				'title' => esc_html__( 'This is a title.', 'white-theme' ),
				'desc'  => wp_kses_post( __( 'This is an info field with the <strong>info</strong> style applied. By default the <strong>normal</strong> style is applied.', 'white-theme' ) ),
			),
			array(
				'id'    => 'opt-info-warning',
				'type'  => 'info',
				'style' => 'warning',
				'title' => esc_html__( 'This is a title.', 'white-theme' ),
				'desc'  => wp_kses_post( __( 'This is an info field with the <strong>warning</strong> style applied.', 'white-theme' ) ),
			),
			array(
				'id'    => 'opt-info-success',
				'type'  => 'info',
				'style' => 'success',
				'icon'  => 'el el-info-circle',
				'title' => esc_html__( 'This is a title.', 'white-theme' ),
				'desc'  => wp_kses_post( __( 'This is an info field with the <strong>success</strong> style applied and an icon.', 'white-theme' ) ),
			),
			array(
				'id'    => 'opt-info-critical',
				'type'  => 'info',
				'style' => 'critical',
				'icon'  => 'el el-info-circle',
				'title' => esc_html__( 'This is a title.', 'white-theme' ),
				'desc'  => wp_kses_post( __( 'This is an info field with the <strong>critical</strong> style applied and an icon.', 'white-theme' ) ),
			),
			array(
				'id'    => 'opt-info-custom',
				'type'  => 'info',
				'style' => 'custom',
				'color' => 'purple',
				'icon'  => 'el el-info-circle',
				'title' => esc_html__( 'This is a title.', 'white-theme' ),
				'desc'  => wp_kses_post( __( 'This is an info field with the <strong>custom</strong> style applied, color arg passed, and an icon.', 'white-theme' ) ),
			),
			array(
				'id'     => 'opt-info-normal',
				'type'   => 'info',
				'notice' => false,
				'title'  => esc_html__( 'This is a title.', 'white-theme' ),
				'desc'   => wp_kses_post( __( 'This is an info non-notice field with the <strong>normal</strong> style applied.', 'white-theme' ) ),
			),
			array(
				'id'     => 'opt-notice-info',
				'type'   => 'info',
				'notice' => false,
				'style'  => 'info',
				'title'  => esc_html__( 'This is a title.', 'white-theme' ),
				'desc'   => wp_kses_post( __( 'This is an info non-notice field with the <strong>info</strong> style applied.', 'white-theme' ) ),
			),
			array(
				'id'     => 'opt-notice-warning',
				'type'   => 'info',
				'notice' => false,
				'style'  => 'warning',
				'icon'   => 'el el-info-circle',
				'title'  => esc_html__( 'This is a title.', 'white-theme' ),
				'desc'   => wp_kses_post( __( 'This is an info non-notice field with the <strong>warning</strong> style applied and an icon.', 'white-theme' ) ),
			),
			array(
				'id'     => 'opt-notice-success',
				'type'   => 'info',
				'notice' => false,
				'style'  => 'success',
				'icon'   => 'el el-info-circle',
				'title'  => esc_html__( 'This is a title.', 'white-theme' ),
				'desc'   => wp_kses_post( __( 'This is an info non-notice field with the <strong>success</strong> style applied and an icon.', 'white-theme' ) ),
			),
			array(
				'id'     => 'opt-notice-critical',
				'type'   => 'info',
				'notice' => false,
				'style'  => 'critical',
				'icon'   => 'el el-info-circle',
				'title'  => esc_html__( 'This is a title.', 'white-theme' ),
				'desc'   => wp_kses_post( __( 'This is an non-notice field with the <strong>critical</strong> style applied and an icon.', 'white-theme' ) ),
			),
		),
	)
);
