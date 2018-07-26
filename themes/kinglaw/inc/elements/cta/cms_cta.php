<?php
vc_map(array(
    "name" => 'CMS Call To Action',
    "base" => "cms_cta",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'kinglaw'),
    "params" => array(
        array(
            "type" => "textarea",
            "heading" => __ ( 'Title', 'kinglaw' ),
            "param_name" => "cta_title",
            "value" => '',
            "group" => esc_html__("Settings", 'kinglaw')
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Title Color", 'kinglaw'),
            "param_name" => "cta_title_color",
            "value" => "",
            "group" => esc_html__("Settings", 'kinglaw')
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( 'Title Size', 'kinglaw' ),
            "param_name" => "cta_size",
            "value" => '18px',
            "group" => esc_html__("Settings", 'kinglaw'),
            "description" => "Enter: ..px",
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( 'Text Button', 'kinglaw' ),
            "param_name" => "button_text",
            "value" => 'Button',
            "group" => esc_html__("Settings", 'kinglaw')
        ),
        array(
            "type" => "vc_link",
            "class" => "",
            "heading" => esc_html__("Link Button", 'kinglaw'),
            "param_name" => "link_button",
            "value" => '#',
            "group" => esc_html__("Settings", 'kinglaw')
        ),
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Button Style", 'kinglaw'),
            'param_name' => 'button_style',
            'value' => array(      
                'Primary button' => 'btn-primary-alt',
                'Tranparent button' => 'btn-tranparent-alt',
                'White button' => 'btn-white-alt',
            ),
            "group" => esc_html__("Settings", 'kinglaw'),
        ),  
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background", 'kinglaw'),
            "param_name" => "bg_cta_color",
            "value" => "#c29765",
            "group" => esc_html__("Settings", 'kinglaw'),
        ),
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Custom Google Fonts", 'kinglaw'),
            'param_name' => 'custom_fonts',
            "group" => esc_html__("Settings", 'kinglaw'),
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
            "group" => esc_html__("Settings", 'kinglaw'),
            "dependency" => array(
                "element"=>"custom_fonts",
                "value"=>array(
                    "true",
                )
            ),
        ), 
    )
));

class WPBakeryShortCode_cms_cta extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>
