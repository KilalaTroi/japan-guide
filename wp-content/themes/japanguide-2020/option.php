<?php
$opt_name = 'options_theme';
$args     = array(
	'display_name' => 'Theme Options',
	'menu_title'   => 'Theme Options',
	'page_title' => 'Theme Options',
	'dev_mode' => false
);
Redux::setArgs($opt_name, $args);

$arraySetSection = array(
	'title'  => 'General',
	'icon'   => 'el el-th-large',
	'fields' => array(

		array(
			'id'    => 'option_logo_kilala',
			'type'  => 'media',
			'title' => 'Logo Kilala',
		),

		array(
			'id'    => 'option_logo',
			'type'  => 'media',
			'title' => 'Logo Japan Guide',
		),

		array(
			'id'    => 'option_phone',
			'type'  => 'text',
			'title' => 'Phone number',
		),

		array(
			'id'    => 'option_email',
			'type'  => 'text',
			'validate' => 'email',
			'title' => 'Email',
		),

		array(
			'id'    => 'option_logo_footer',
			'type'  => 'media',
			'title' => 'Footer logo',
		),

		array(
			'id'    => 'option_text_copyright',
			'type'  => 'text',
			'title' => 'Footer copyright text',
		),
		array(
			'id'        => 'option_map',
			'type'      => 'select',
			'data'      => 'terms',
			'multi'    => true,
			'args'      => array('taxonomies' => 'regions','hide_empty' => false),
			'title' => 'Map',
		),
	),
);
Redux::setSection($opt_name, $arraySetSection);

Redux::setSection($opt_name, array(
	'title' => 'Banner Page',
	'icon' => 'el el-file-edit',
	'fields' => array(
		array(
			'id'    => 'des_feature_image',
			'type'  => 'media',
			'title' => 'Feature Image Destination',
		),
		array(
			'id'    => 'des_feature_image_mb',
			'type'  => 'media',
			'title' => 'Feature Image Mobile Destination',
		),

		array(
			'id'    => 'int_feature_image',
			'type'  => 'media',
			'title' => 'Feature Image Interest',
		),
		array(
			'id'    => 'int_feature_image_mb',
			'type'  => 'media',
			'title' => 'Feature Image Mobile Interest',
		),
	)
));

Redux::setSection($opt_name, array(
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

Redux::setSection($opt_name, array(
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

Redux::setSection($opt_name, array(
	'title' => 'Slider Mobile',
	'icon' => 'el el-film',
	'fields' => array(
		array(
			'title' => 'Slides',
			'type' => 'slides',
			'id' => 'option_slides_mb',
		),
	)
));


function wpedu_get_option($option_name, $default_value = false)
{
	global $options_theme;
	if (isset($options_theme[$option_name])) {
		return $options_theme[$option_name];
	}
	return $default_value;
}
