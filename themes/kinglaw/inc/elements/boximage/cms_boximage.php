<?php
vc_map(array(
    "name" => 'CMS Box Image',
    "base" => "cms_boximage",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'kinglaw'),
    "params" => array(
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            "shortcode" => "cms_boximage",
            "heading" => esc_html__("Boximage Template", 'kinglaw'),
            "value" => "",
            "admin_label" => true,
            "group" => esc_html__("Template", 'kinglaw'),
        ),
        array(
            'type' => 'attach_image',
            'heading' => __( 'Image', 'kinglaw' ),
            'param_name' => 'image',
            'value' => '',
            'description' => __( 'Select image from media library.', 'kinglaw' ),
            "group" => esc_html__("Boximage Settings", 'kinglaw'),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_boximage.php",
                    "cms_boximage--layout2.php",
                )
            ),
        ),
        array(
            'type' => 'attach_image',
            'heading' => __( 'Image Icon', 'kinglaw' ),
            'param_name' => 'image_icon',
            'value' => '',
            'description' => __( 'Select image from media library.', 'kinglaw' ),
            "group" => esc_html__("Boximage Settings", 'kinglaw'),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_boximage--layout1.php",
                    "cms_boximage--layout2.php",
                )
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( 'Title', 'kinglaw' ),
            "param_name" => "title",
            "value" => '',
            "group" => esc_html__("Boximage Settings", 'kinglaw'),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_boximage.php",
                    "cms_boximage--layout1.php",
                )
            ),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Title color", 'kinglaw'),
            "param_name" => "title_color",
            "value" => "",
            "group" => esc_html__("Boximage Settings", 'kinglaw'),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_boximage.php",
                    "cms_boximage--layout1.php",
                )
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( 'Font size', 'kinglaw' ),
            "param_name" => "title_size",
            "value" => '',
            "group" => esc_html__("Boximage Settings", 'kinglaw'),
            "description" => "Enter: ..px",
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_boximage.php",
                    "cms_boximage--layout1.php",
                )
            ),
        ),
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Custom Google Fonts", 'kinglaw'),
            'param_name' => 'custom_fonts',
            "group" => esc_html__("Boximage Settings", 'kinglaw'),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_boximage.php",
                    "cms_boximage--layout1.php",
                )
            ),
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
            "group" => esc_html__("Boximage Settings", 'kinglaw'),
            "dependency" => array(
                "element"=>"custom_fonts",
                "value"=>array(
                    "true",
                    "cms_boximage--layout1.php",
                )
            ),
        ),
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Text-Transform", 'kinglaw'),
            'param_name' => 'boximage_text_transform',
            'value' => array(
                'Default' =>'unset',
                'Uppercase' => 'uppercase',   
                'Capitalize' => 'capitalize',     
                'Lowercase' => 'lowercase',     
            ),
            "group" => esc_html__("Boximage Settings", 'kinglaw'),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_boximage.php",
                    "cms_boximage--layout1.php",
                )
            ),
        ),
    )
));

class WPBakeryShortCode_cms_boximage extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>