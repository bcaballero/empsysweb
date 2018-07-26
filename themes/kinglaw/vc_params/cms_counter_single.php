<?php
	$params = array(
		array(
			'type' => 'cms_template_img',
		    'param_name' => 'cms_template',
		    "heading" => esc_html__("Shortcode Template", 'kinglaw'),
		    "shortcode" => "cms_counter_single",
		    "admin_label" => true,
		    "group" => esc_html__("Template", 'kinglaw'),
		),
        array(
            'type' => 'attach_image',
            'heading' => __( 'Image', 'kinglaw' ),
            'param_name' => 'image',
            'value' => '',
            'description' => __( 'Select image from media library.', 'kinglaw' ),
            "group" => esc_html__("Template", 'kinglaw'),
        ),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Icon Color", 'kinglaw'),
			"param_name" => "icon_color",
			"value" => "",
			"group" => esc_html__("Template", 'kinglaw')
		),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Counter style", 'kinglaw'),
            "admin_label" => true,
            "param_name" => "style_counter",
            "value" => array(
                "Style 1" => "counter-style-1",
                "Style 2" => "counter-style-2",
            ),
            "group" => esc_html__("Template", 'kinglaw'),
        ),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Digit Color", 'kinglaw'),
			"param_name" => "digit_color",
			"value" => "",
			"group" => esc_html__("Template", 'kinglaw')
		),	
		array(
			"type" => "textfield",
			"heading" => esc_html__("Digit Font Size", 'kinglaw'),
			"param_name" => "digit_fontsize",
			"value" => "",
			"group" => esc_html__("Template", 'kinglaw'),
			"description" => esc_html__("Enter: ...px", 'kinglaw'),
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Title Color", 'kinglaw'),
			"param_name" => "title_color",
			"value" => "",
			"group" => esc_html__("Template", 'kinglaw')
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Title Font Size", 'kinglaw'),
			"param_name" => "title_fontsize",
			"value" => "",
			"group" => esc_html__("Template", 'kinglaw'),
			"description" => esc_html__("Enter: ...px", 'kinglaw'),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Custom Icon -  Add Class Icon", "kinglaw"),
			"param_name" => "icon_custom",
			"value" => "",
			"group" => esc_html__("Template", 'kinglaw'),
			"description" => 'Please add class icon. Use the library <a href="https://linearicons.com/free" target="_blank">Linearicons Free</a>, <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target="_blank">FontAwesome</a>',
		),	 
	);
	vc_remove_param( "cms_counter_single", "title" );
	vc_remove_param( "cms_counter_single", "description" );
	vc_remove_param( "cms_counter_single", "content_align" );
	//vc_remove_param( "cms_counter_single", "suffix" );
	vc_remove_param( "cms_counter_single", "prefix" );
?>