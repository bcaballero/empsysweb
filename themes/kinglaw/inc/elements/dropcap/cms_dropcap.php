<?php
vc_map(array(
    "name" => 'CMS Text Block',
    "base" => "cms_dropcap",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'kinglaw'),
    "params" => array(

        array(
            "type" => "textarea",
            "heading" => esc_html__("Content", 'kinglaw'),
            "param_name" => "dropcap_content",
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( 'Font Size', 'kinglaw' ),
            "param_name" => "font_size",
            "value" => '',
            "description" => "Enter: ..px",
        ),   
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Set color", 'kinglaw'),
            "param_name" => "drc_color",
            "value" => "",
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Text Align", 'kinglaw'),
            "admin_label" => true,
            "param_name" => "text_align",
            "value" => array(
                "Left" => "left",
                "Center"=> "center",
                "Right" => "right"
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
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Font Weight", 'kinglaw'),
            "admin_label" => true,
            "param_name" => "custom_font_weight",
            "value" => array(
                "Default" => "normal",
                "Normal 400 " => "400",
                "Bold 500" => "500",
                "Bold 600" => "600",
                "Bold 700" => "700",
                "Bold 800" => "800",
            ),
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Font-style", 'kinglaw'),
            "admin_label" => true,
            "param_name" => "font_style",
            "value" => array(
                "Normal" => "normal",
                "Italic"=> "italic",
            ),
        ),
    )
));

class WPBakeryShortCode_cms_dropcap extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>