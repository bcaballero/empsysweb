<?php
	$params = array(
        array(
            'type' => 'attach_image',
            'heading' => __( 'Image Overlay', 'kinglaw' ),
            'param_name' => 'image',
            'value' => '',
            'description' => __( 'Select image from media library. Only apply to gallery', 'kinglaw' ),
            "group" => esc_html__("Template", 'kinglaw'),
            "template" => array(
                "cms_carousel--team.php",
                "cms_carousel--blog.php",
            ),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Title Color", 'kinglaw'),
            "param_name" => "title_color",
            "value" => "",
            "group" => esc_html__("Template", 'kinglaw'),
            "template" => array(
                "cms_carousel--testimonial2.php",
                "cms_carousel--testimonial3.php",
                "cms_carousel--team.php",
            ),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Position Color", 'kinglaw'),
            "param_name" => "position_color",
            "value" => "",
            "group" => esc_html__("Template", 'kinglaw'),
            "template" => array(
                "cms_carousel--team.php",
            ),
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Style Background Content", 'kinglaw'),
            "admin_label" => true,
            "param_name" => "bg_testimonial_color",
            "group" => esc_html__("Template", 'kinglaw'),
            "value" => array(
                "Background Default" => "color",
                "Background Tranparent" => "tranparent",
            ),
            "template" => array(
                "cms_carousel--testimonial2.php"
            ),
        ),
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Custom Google Fonts", 'kinglaw'),
            'param_name' => 'custom_fonts',
            "group" => esc_html__("Carousel Settings", 'kinglaw'),
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
            "group" => esc_html__("Carousel Settings", 'kinglaw'),
            "dependency" => array(
                "element"=>"custom_fonts",
                "value"=>array(
                    "true",
                )
            ),
        ),

        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Nav Background", 'kinglaw'),
            "admin_label" => true,
            "param_name" => "nav_style",
            "value" => array(
                "Dark" => "dark",
                "White" => "white",
                "Gray" => "gray",
                "Bg_overlay" => "color-overlay",
                "Bg_575" => "color-575",
                "Bg_686" => "color-686",
                "Bg_0d0" => "color-0d0",
                "Bg_151" => "color-151",
                "Bg_171" => "color-171",
                "Bg_191" => "color-191",
                "Bg_212" => "color-212",
                "Bg_222" => "color-222",
                "Bg_333" => "color-333",
                "Bg_404" => "color-404",
                "Bg_444" => "color-444",
                "Bg_666" => "color-666",
                "Bg_8b8" => "color-8b8",
                "Bg_999" => "color-999",
                "Bg_f5f" => "color-f5f",
                "Bg_f8f" => "color-f8f",
                "Bg_f9f" => "color-f9f",
                "Bg_ebe" => "color-ebe",
                "Bg_e0e" => "color-e0e",
            ),
            "group" => esc_html__("Template", 'kinglaw'),
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Nav Position", 'kinglaw'),
            "admin_label" => true,
            "param_name" => "nav_position",
            "value" => array(
                "Top Right" => "top-right",
                "Medium" => "medium",
            ),
            "group" => esc_html__("Template", 'kinglaw'),
            "template" => array(
                "cms_carousel--testimonial2.php",
            ),
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Margin Dots", 'kinglaw'),
            "admin_label" => true,
            "param_name" => "margin_dots_style",
            "value" => array(
                "Default" => "top-40",
                "Bottom_20px" => "top-20",
                "Bottom_25px" => "top-25",
                "Bottom_30px" => "top-30",
                "Bottom_35px" => "top-35",
                "Bottom_42px" => "top-42",
                "Bottom_45px" => "top-45",
                "Bottom_50px" => "top-50",
                "Bottom_55px" => "top-55",
                "Bottom_60px" => "top-60",
                "Bottom_65px" => "top-65",
                "Bottom_70px" => "top-70",
                "Bottom_75px" => "top-75",
                "Bottom_80px" => "top-80",
            ),
            "group" => esc_html__("Template", 'kinglaw'),
        ),

        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Dots Style", 'kinglaw'),
            "admin_label" => true,
            "param_name" => "dot_style",
            "value" => array(
                "Dark" => "dark",
                "White" => "white",
                "Gray" => "gray",
                "Tranparent" => "col-tranparent",
                "Color #999" => "color-999",
            ),
            "group" => esc_html__("Template", 'kinglaw'),
        ),
	);
    vc_remove_param('cms_carousel','l_icon_type');
    vc_remove_param('cms_carousel','l_icon_fontawesome');
    vc_remove_param('cms_carousel','l_icon_openiconic');
    vc_remove_param('cms_carousel','l_icon_typicons');
    vc_remove_param('cms_carousel','l_icon_entypo');
    vc_remove_param('cms_carousel','l_icon_glyphicons');
    vc_remove_param('cms_carousel','l_icon_rticon');
    vc_remove_param('cms_carousel','l_icon_pe7stroke');
    vc_remove_param('cms_carousel','l_icon_pixelicons');
    vc_remove_param('cms_carousel','l_icon_linecons');

    vc_remove_param('cms_carousel','r_icon_type');
    vc_remove_param('cms_carousel','r_icon_type');
    vc_remove_param('cms_carousel','r_icon_fontawesome');
    vc_remove_param('cms_carousel','r_icon_openiconic');
    vc_remove_param('cms_carousel','r_icon_typicons');
    vc_remove_param('cms_carousel','r_icon_entypo');
    vc_remove_param('cms_carousel','r_icon_glyphicons');
    vc_remove_param('cms_carousel','r_icon_rticon');
    vc_remove_param('cms_carousel','r_icon_pe7stroke');
    vc_remove_param('cms_carousel','r_icon_pixelicons');
    vc_remove_param('cms_carousel','r_icon_linecons');
	vc_remove_param('cms_carousel','cms_template');
    
	$cms_template_attribute = array(
		'type' => 'cms_template_img',
	    'param_name' => 'cms_template',
	    "shortcode" => "cms_carousel",
	    "heading" => esc_html__("Shortcode Template", 'kinglaw'),
	    "admin_label" => true,
	    "group" => esc_html__("Template", 'kinglaw'),
		);
	vc_add_param('cms_carousel',$cms_template_attribute);
?>