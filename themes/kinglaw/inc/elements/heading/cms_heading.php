<?php
vc_map(array(
    "name" => 'CMS Heading',
    "base" => "cms_heading",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'kinglaw'),
    "params" => array(
        array(
            'type' => 'cms_template_img',
            "shortcode" => "cms_heading",
            'param_name' => 'cms_template',
            "admin_label" => true,
            "group" => esc_html__("Template", 'kinglaw'),
            "heading" => esc_html__("Heading Template", 'kinglaw'),
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( 'Title 1', 'kinglaw' ),
            "param_name" => "title1",
            "value" => '',
            "group" => esc_html__("Heading Settings", 'kinglaw'),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_heading--layout3.php",
                )
            ),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Title color 1", 'kinglaw'),
            "param_name" => "color_title1",
            "value" => "",
            "group" => esc_html__("Heading Settings", 'kinglaw'),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_heading--layout3.php",
                )
            ),
        ),

        array(
            "type" => "textfield",
            "heading" => __ ( 'Title 2', 'kinglaw' ),
            "param_name" => "title2",
            "value" => '',
            "group" => esc_html__("Heading Settings", 'kinglaw'),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_heading--layout3.php",
                )
            ),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Title Color 2", 'kinglaw'),
            "param_name" => "color_title2",
            "value" => "",
            "group" => esc_html__("Heading Settings", 'kinglaw'),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_heading--layout3.php",
                )
            ),
        ),

        array(
            "type" => "textfield",
            "heading" => __ ( 'Title', 'kinglaw' ),
            "param_name" => "title",
            "value" => '',
            "group" => esc_html__("Heading Settings", 'kinglaw'),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_heading.php",
                    "cms_heading--layout1.php",
                    "cms_heading--layout2.php",
                )
            ),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Title Color", 'kinglaw'),
            "param_name" => "title_color",
            "value" => "",
            "group" => esc_html__("Heading Settings", 'kinglaw'),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_heading.php",
                    "cms_heading--layout1.php",
                    "cms_heading--layout2.php",
                )
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( 'Title Size', 'kinglaw' ),
            "param_name" => "title_size",
            "value" => '',
            "group" => esc_html__("Heading Settings", 'kinglaw'),
            "description" => "Enter: ..px",
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_heading.php",
                    "cms_heading--layout1.php",
                    "cms_heading--layout2.php",
                    "cms_heading--layout3.php",
                )
            ),
        ),  

        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Text-Transform", 'kinglaw'),
            'param_name' => 'heading_text_transform',
            'value' => array(
                'Default' =>'unset',
                'Uppercase' => 'uppercase',   
                'Capitalize' => 'capitalize',     
                'Lowercase' => 'lowercase',     
            ),
            "group" => esc_html__("Heading Settings", 'kinglaw'),
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Text Align", 'kinglaw'),
            "admin_label" => true,
            "param_name" => "text_align",
            "description" => "Don't aplly for layout 2",
            "value" => array(
                "Left" => "left",
                "Center"=> "center",
                "Right" => "right"
            ),
            "group" => esc_html__("Heading Settings", 'kinglaw'),
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_html__("Style", 'kinglaw'),
            "param_name" => "heading1_style",
            "value" => array(
                "Line top" => "heading-style1",
                "Line bottom" => "heading-style2",
            ),
            "group" => esc_html__("Heading Settings", 'kinglaw'),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_heading--layout1.php",
                )
            ),
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Letter Spacing", 'kinglaw'),
            "admin_label" => true,
            "param_name" => "letter_spacing",
            "value" => array(
                '0' => '0em',
                '-0.05em' => '-0.05em',
                '-0.04em' => '-0.04em',
                '-0.03em' => '-0.03em',
                '-0.02em' => '-0.02em',
                '-0.01em' => '-0.01em',
                '0.01em' => '0.01em',
                '0.015em' => '0.015em',
                '0.02em' => '0.02em',
                '0.025em' => '0.025em',
                '0.03em' => '0.03em',
                '0.035em' => '0.035em',
                '0.04em' => '0.04em',
                '0.045em' => '0.045em',
                '0.05em' => '0.05em',
                '0.055em' => '0.055em',
                '0.06em' => '0.06em',
                '0.065em' => '0.065em',
                '0.07em' => '0.07em',
                '0.075em' => '0.075em',
                '0.08em' => '0.08em',
                '0.085em' => '0.085em',
                '0.09em' => '0.09em',
                '0.095em' => '0.095em',
                '0.1em' => '0.1em',
                '0.15em' => '0.15em',
                '0.2em' => '0.2em',
                '0.3em' => '0.3em',
                '0.4em' => '0.4em',
                '0.5em' => '0.5em',
                '0.6em' => '0.6em',
                '0.7em' => '0.7em',
                '0.8em' => '0.8em',
                '0.9em' => '0.9em',
            ),
            "group" => esc_html__("Heading Settings", 'kinglaw'),
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
    )
));

class WPBakeryShortCode_cms_heading extends CmsShortCode
{
    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}
?>