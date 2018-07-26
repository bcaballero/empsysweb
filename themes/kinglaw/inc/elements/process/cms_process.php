<?php
vc_map(array(
    "name" => 'CMS Process',
    "base" => "cms_process",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'kinglaw'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __ ( 'Number', 'kinglaw' ),
            "param_name" => "number_title",
            "value" => '',
            "group" => esc_html__("Process Settings", 'kinglaw'),
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( 'Title', 'kinglaw' ),
            "param_name" => "title",
            "value" => '',
            "group" => esc_html__("Process Settings", 'kinglaw'),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Title Color", 'kinglaw'),
            "param_name" => "title_color",
            "value" => "",
            "group" => esc_html__("Process Settings", 'kinglaw'),
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( 'Title Size', 'kinglaw' ),
            "param_name" => "title_font_size",
            "value" => '',
            "group" => esc_html__("Process Settings", 'kinglaw'),
            "description" => "Enter: ..px",
        ),
        array(
            "type" => "textarea",
            "heading" => __ ( 'Description', 'kinglaw' ),
            "param_name" => "process_desc",
            "value" => '',
            "group" => esc_html__("Process Settings", 'kinglaw'),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Description Color", 'kinglaw'),
            "param_name" => "process_color",
            "value" => "",
            "group" => esc_html__("Process Settings", 'kinglaw'),
        ),

        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Custom Google Fonts", 'kinglaw'),
            'param_name' => 'custom_fonts',
            "group" => esc_html__("Process Settings", 'kinglaw'),
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
            "group" => esc_html__("Process Settings", 'kinglaw'),
            "dependency" => array(
                "element"=>"custom_fonts",
                "value"=>array(
                    "true",
                )
            ),
        ),
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            "shortcode" => "cms_process",
            "heading" => esc_html__("Process Template", 'kinglaw'),
            "value" => "",
            "admin_label" => true,
            "group" => esc_html__("Template", 'kinglaw'),
        ),
    )
));

class WPBakeryShortCode_cms_process extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>