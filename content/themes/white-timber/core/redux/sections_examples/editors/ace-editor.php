<?php
/**
 * Redux Framework ACE editor config.
 * For full documentation, please visit: http://docs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
	$opt_name,
	array(
		'title'      => esc_html__( 'ACE Editor', 'white-theme' ),
		'id'         => 'editor-ace',
		'subsection' => true,
		'desc'       => esc_html__( 'For full documentation on the this field, visit: ', 'white-theme' ) . '<a href="//docs.redux.io/core/fields/ace-editor/" target="_blank">docs.redux.io/core/fields/ace-editor/</a>',
		'fields'     => array(
			array(
				'id'       => 'opt-ace-editor-css',
				'type'     => 'ace_editor',
				'title'    => esc_html__( 'CSS Code', 'white-theme' ),
				'subtitle' => esc_html__( 'Paste your CSS code here.', 'white-theme' ),
				'mode'     => 'css',
				'theme'    => 'monokai',
				'desc'     => 'Possible modes can be found at <a href="//ace.c9.io" target="_blank">ace.c9.io/</a>.',
				'default'  => '#header{
	margin: 0 auto;
}',
			),
			array(
				'id'       => 'opt-ace-editor-js',
				'type'     => 'ace_editor',
				'title'    => esc_html__( 'JS Code', 'white-theme' ),
				'subtitle' => esc_html__( 'Paste your JS code here.', 'white-theme' ),
				'mode'     => 'javascript',
				'theme'    => 'chrome',
				'desc'     => 'Possible modes can be found at <a href="//ace.c9.io" target="_blank">ace.c9.io/</a>.',
				'default'  => 'jQuery(document).ready(function(){\n\n});',
			),
			array(
				'id'         => 'opt-ace-editor-php',
				'type'       => 'ace_editor',
				'full_width' => true,
				'title'      => esc_html__( 'PHP Code', 'white-theme' ),
				'subtitle'   => esc_html__( 'Paste your PHP code here.', 'white-theme' ),
				'mode'       => 'php',
				'theme'      => 'chrome',
				'desc'       => 'Possible modes can be found at <a href="//ace.c9.io" target="_blank">ace.c9.io/</a>.',
				'default'    => '<?php
    echo "PHP String";',
			),
		),
	)
);
