<?php

$opt_name = 'options_theme';
$args     = array(
	'display_name' => 'Theme Options',
	'menu_title'   => 'Theme Options',
	'page_title' => 'Theme Options',
	'dev_mode' => false
);
Redux::setArgs( $opt_name, $args );

$arraySetSection = array(
	'title'  => 'General',
	'icon'   => 'el el-th-large',
	'fields' => array(

		array(
			'id'    => 'option_logo',
			'type'  => 'media',
			'title' => 'Logo',
		),

		array(
			'id'    => 'option_icon_logo',
			'type'  => 'media',
			'title' => 'Favicon Logo',
		),
	),
);
Redux::setSection( $opt_name, $arraySetSection );

Redux::setSection( $opt_name, array(
  'title' => 'Code',
  'icon'   => 'el el-puzzle',
	'fields' => array(
		array(
			'title' => 'Head Code',
			'type' => 'ace_editor',
			'id' => 'option_head_code',
			'mode'     => 'html',
		),
		array(
			'title' => 'After body open tag',
			'type' => 'ace_editor',
			'id' => 'option_body_code',
			'mode'     => 'html',
		),
		array(
			'title' => 'Before body close tag',
			'type' => 'ace_editor',
			'id' => 'option_footer_code',
			'mode'     => 'html',
		)
	)
));

Redux::setSection( $opt_name, array(
	'title' => 'Slider',
	'icon' => 'el el-film',
	'fields' => array(
		array(
			'title' => 'Slides',
			'type' => 'slides',
			'id' => 'option_slides',
		),
	)
));


function wpedu_get_option( $option_name, $default_value = false ) {
  	global $options_theme;
	if ( isset( $options_theme[ $option_name ] ) ) {
		return $options_theme[ $option_name ];
	}
	return $default_value;
}