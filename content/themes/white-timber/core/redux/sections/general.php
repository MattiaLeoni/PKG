<?php 

$section = array(
	'title'  => esc_html__( 'Generali', 'white-theme' ),
	'id'     => 'general',
	'desc'   => esc_html__( 'Impostazioni generali tema', 'white-theme' ),
	'icon'   => 'el el-home',
	'fields' => array(
		array(
			'id'       => 'company_name',
			'type'     => 'text',
			'title'    => esc_html__( 'Ragione sociale', 'white-theme' ),
			// 'desc'     => esc_html__( 'Example description.', 'white-theme' ),
			// 'subtitle' => esc_html__( 'Example subtitle.', 'white-theme' ),
			// 'hint'     => array(
			// 	'content' => wp_kses( __( 'This is a <strong>hint</strong> tool-tip for the text field.<br/><br/>Add any HTML based text you like here.', 'white-theme' ), $kses_exceptions ),
			// ),
		),
		array(
			'id'       => 'phone',
			'type'     => 'text',
			'title'    => esc_html__( 'Telefono', 'white-theme' ),
		),
		array(
			'id'       => 'email',
			'type'     => 'text',
			'title'    => esc_html__( 'E-mail', 'white-theme' ),
		),
		array(
			'id'       => 'address',
			'type'     => 'editor',
			'title'    => esc_html__( 'Indirizzo', 'white-theme' ),
			'args'    => array(
				'wpautop'       => false,
				'media_buttons' => false,
				'textarea_rows' => 3,
				'teeny'         => false,
				'quicktags'     => false,
			),

		),
	),
);
Redux::set_section( $opt_name, $section );