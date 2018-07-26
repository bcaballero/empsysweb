<?php
	$params = array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Item Space", "kinglaw"),
            "param_name" => "item_space",
            "value" => "",
            "description" => "Default: 15px",
            "group" => esc_html__("Template", 'kinglaw'),
            "template" => array(
                "cms_grid--gallery.php",
            ),
        ),
        array(
            'type' => 'attach_image',
            'heading' => __( 'Image Overlay', 'kinglaw' ),
            'param_name' => 'image',
            'value' => '',
            'description' => __( 'Select image from media library. Only apply to gallery', 'kinglaw' ),
            "group" => esc_html__("Template", 'kinglaw'),
            "template" => array(
                "cms_grid--gallery.php",
                "cms_grid--team.php",
                "cms_grid--service.php",
            ),
        ),
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Grid Style", 'kinglaw'),
            'param_name' => 'grid_style',
            "group" => esc_html__("Grid Settings", 'kinglaw'),
            'value' => array(
                'Style 1' => 'style-1',       
                'Style 2' => 'style-2',       
            ),
            "template" => array(
                "cms_grid--service2.php",
            ),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Title Color", 'kinglaw'),
            "param_name" => "title_color",
            "value" => "",
            "group" => esc_html__("Grid Settings", 'kinglaw'),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Position Color", 'kinglaw'),
            "param_name" => "position_color",
            "value" => "",
            "group" => esc_html__("Grid Settings", 'kinglaw'),
            "template" => array(
                "cms_grid--team.php",
            ),
        ),
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Custom Google Fonts", 'kinglaw'),
            'param_name' => 'custom_fonts',
            "group" => esc_html__("Grid Settings", 'kinglaw'),
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
            "group" => esc_html__("Grid Settings", 'kinglaw'),
            "dependency" => array(
                "element"=>"custom_fonts",
                "value"=>array(
                    "true",
                )
            ),
        ),

	);
	vc_remove_param('cms_grid','cms_template');
	$cms_template_attribute = array(
		'type' => 'cms_template_img',
	    'param_name' => 'cms_template',
	    "shortcode" => "cms_grid",
	    "heading" => esc_html__("Shortcode Template", 'kinglaw'),
	    "admin_label" => true,
	    "group" => esc_html__("Template", 'kinglaw'),
		);
	vc_add_param('cms_grid',$cms_template_attribute);
?>
