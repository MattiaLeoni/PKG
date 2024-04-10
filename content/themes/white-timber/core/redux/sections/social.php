<?php 

$section = array(
	'title'  => esc_html__( 'Social', 'white-theme' ),
	'id'     => 'social',
	'icon'   => 'fa fa-share-alt',
	'fields' => array(
        array(
            'id'       => 'social',
            'type'     => 'sortable',
            'title'    => esc_html__( 'Link ai social', 'white-theme' ),
            'subtitle' => esc_html__( 'Inserisci il link ai tuoi social e riordinali nell\'ordine di visualizzazione', 'white-theme' ),
            'label'    => true,
            'options'  => array(
                'Facebook'   => '',
                'Instagram'   => '',
                'Twitter' => '',
                'Linkedin' => '',
                'Youtube' => '',
                'Whatsapp' => '',
                'Reddit' => '',
                'Tripadvisor' => '',
            ),
        ),
),
);
Redux::set_section( $opt_name, $section );