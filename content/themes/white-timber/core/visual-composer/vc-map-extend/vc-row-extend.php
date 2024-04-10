<?php		

    /* OUTER ROW */
    vc_add_param( 'vc_row',
        array(
            'type'       => 'dropdown',
            'param_name' => 'row_content_width',
            'heading'    => esc_html__( 'Tipologia di riga', 'ml' ),
            'value'      => array(
                esc_html__( 'Full Width', 'ml' ) => 'full-width',
                esc_html__( 'In Grid', 'ml' )    => 'in-grid'
            ),
            'group'      => esc_html__( 'ML Settings', 'ml' )
        )
    );
    vc_add_param( 'vc_row',
        array(
            'type'       => 'dropdown',
            'param_name' => 'row_margin_top',
            'heading'    => esc_html__( 'Margine superiore', 'ml' ),
            'value'      => array(
                esc_html__( 'Default', 'ml' ) => '',
                esc_html__( 'Nessun margine', 'ml' ) => 'uk-margin-remove-top',
                esc_html__( 'Piccolo', 'ml' ) => 'uk-margin-small-top',
                esc_html__( 'Standard', 'ml' ) => 'uk-margin-top',
                esc_html__( 'Medio', 'ml' ) => 'uk-margin-medium-top',
                esc_html__( 'Grande', 'ml' ) => 'uk-margin-large-top',
            ),
            'group'      => esc_html__( 'ML Settings', 'ml' )
        )
    );
    vc_add_param( 'vc_row',
        array(
            'type'       => 'dropdown',
            'param_name' => 'row_margin_bottom',
            'heading'    => esc_html__( 'Margine inferiore', 'ml' ),
            'value'      => array(
                esc_html__( 'Default', 'ml' ) => '',
                esc_html__( 'Nessun margine', 'ml' ) => 'uk-margin-remove-bottom',
                esc_html__( 'Piccolo', 'ml' ) => 'uk-margin-small-bottom',
                esc_html__( 'Standard', 'ml' ) => 'uk-margin-bottom',
                esc_html__( 'Medio', 'ml' ) => 'uk-margin-medium-bottom',
                esc_html__( 'Grande', 'ml' ) => 'uk-margin-large-bottom',
            ),
            'group'      => esc_html__( 'ML Settings', 'ml' )
        )
    );

    /* INNER ROW */
    vc_add_param( 'vc_row_inner',
        array(
            'type'       => 'dropdown',
            'param_name' => 'row_content_width',
            'heading'    => esc_html__( 'Tipologia di riga', 'ml' ),
            'value'      => array(
                esc_html__( 'Full Width', 'ml' ) => 'full-width',
                esc_html__( 'In Grid', 'ml' )    => 'in-grid'
            ),
            'group'      => esc_html__( 'ML Settings', 'ml' )
        )
    );
    vc_add_param( 'vc_row_inner',
        array(
            'type'       => 'dropdown',
            'param_name' => 'row_margin_top',
            'heading'    => esc_html__( 'Margine superiore', 'ml' ),
            'value'      => array(
                esc_html__( 'Default', 'ml' ) => '',
                esc_html__( 'Nessun margine', 'ml' ) => 'uk-margin-remove-top',
                esc_html__( 'Piccolo', 'ml' ) => 'uk-margin-small-top',
                esc_html__( 'Standard', 'ml' ) => 'uk-margin-top',
                esc_html__( 'Medio', 'ml' ) => 'uk-margin-medium-top',
                esc_html__( 'Grande', 'ml' ) => 'uk-margin-large-top',
            ),
            'group'      => esc_html__( 'ML Settings', 'ml' )
        )
    );
    vc_add_param( 'vc_row_inner',
        array(
            'type'       => 'dropdown',
            'param_name' => 'row_margin_bottom',
            'heading'    => esc_html__( 'Margine inferiore', 'ml' ),
            'value'      => array(
                esc_html__( 'Default', 'ml' ) => '',
                esc_html__( 'Nessun margine', 'ml' ) => 'uk-margin-remove-bottom',
                esc_html__( 'Piccolo', 'ml' ) => 'uk-margin-small-bottom',
                esc_html__( 'Standard', 'ml' ) => 'uk-margin-bottom',
                esc_html__( 'Medio', 'ml' ) => 'uk-margin-medium-bottom',
                esc_html__( 'Grande', 'ml' ) => 'uk-margin-large-bottom',
            ),
            'group'      => esc_html__( 'ML Settings', 'ml' )
        )
    );