<?php
	$params = array(
		array(
			'type' => 'cms_template_img',
		    'param_name' => 'cms_template',
		    "shortcode" => "cms_fancybox_single",
		    "heading" => esc_html__("Shortcode Template", 'kinglaw'),
		    "admin_label" => true,
		    "group" => esc_html__("Template", 'kinglaw'),
		),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Style", 'kinglaw'),
            "param_name" => "fancybox_style",
            "value" => array(
                "Style 1" => "fcb-style1",
                "Style 2" => "fcb-style2",
            ),
            "group" => esc_html__("Template", 'kinglaw'),
            "template" => array(
                "cms_fancybox_single--layout3.php",
            ),
        ),
		array(
            "type" => "dropdown",
            "heading" => esc_html__("Content Align", 'kinglaw'),
            "param_name" => "fancybox_content_align",
            "value" => array(
                "Center" => "center",
	            "Left" => "left",             
	            "Right" => "right",             
            ),
            "group" => esc_html__("Template", 'kinglaw'),
            "template" => array(
                "cms_fancybox_single.php",
                "cms_fancybox_single--layout4.php",
            ),
        ),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Title Font Size", 'kinglaw'),
			"param_name" => "title_font_size",
			"value" => "",
			"group" => esc_html__("Template", 'kinglaw'),
			"description" => "Enter: ...px"
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Icon Color", 'kinglaw'),
			"param_name" => "icon_color",
			"value" => "",
			"group" => esc_html__("Template", 'kinglaw'),
			"template" => array(
                "cms_fancybox_single.php",
                "cms_fancybox_single--layout1.php",
                "cms_fancybox_single--layout3.php",
            ),
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Title Color", 'kinglaw'),
			"param_name" => "title_color",
			"value" => "",
			"group" => esc_html__("Template", 'kinglaw'),
		),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background", 'kinglaw'),
            "param_name" => "bg_item",
            "value" => "",
            "group" => esc_html__("Template", 'kinglaw'),
            "template" => array(
                "cms_fancybox_single--layout3.php",
            ),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Content Color", 'kinglaw'),
            "param_name" => "content_color",
            "value" => "",
            "group" => esc_html__("Template", 'kinglaw'),
            "template" => array(
                "cms_fancybox_single--layout4.php",
            ),
        ),
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Custom Google Fonts", 'kinglaw'),
            'param_name' => 'custom_fonts',
            "group" => esc_html__("Heading Settings", 'kinglaw'),
            'value' => array(
                'No' => 'false',       
                'Yes' => 'true',       
            ),
        ),  
        array(
            'type' => 'google_fonts',
            'param_name' => 'google_fonts',
            'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
            'settings' => array(
                'fields' => array(
                    'font_family_description' => esc_html__( 'Select font family.', 'kinglaw' ),
                    'font_style_description' => esc_html__( 'Select font styling.', 'kinglaw' ),
                ),
            ),
            "group" => esc_html__("Heading Settings", 'kinglaw'),
            "dependency" => array(
                "element"=>"custom_fonts",
                "value"=>array(
                    "true",
                )
            ),
        ),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Content Color", 'kinglaw'),
			"param_name" => "decs_color",
			"value" => "",
			"group" => esc_html__("Template", 'kinglaw')
		),

	);
    vc_remove_param( "cms_fancybox_single", "title" );
    vc_remove_param( "cms_fancybox_single", "description" );
    vc_remove_param( "cms_fancybox_single", "content_align" );
    vc_remove_param( "cms_fancybox_single", "button_type" );
?>