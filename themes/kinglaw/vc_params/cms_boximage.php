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
                "cms_grid--portfolio1.php",
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Image Crop", 'kinglaw'),
            "param_name" => "image_crop_masonry",
            "value" => array(
	            "Normal" => "normal",             
	            "Masonry" => "masonry",             
            ),
            "group" => esc_html__("Template", 'kinglaw'),
            "template" => array(
                "cms_grid--portfolio1.php",
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