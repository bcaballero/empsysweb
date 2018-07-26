<?php
vc_map(array(
    "name" => 'CMS List',
    "base" => "cms_list",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'kinglaw'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __ ( 'Label', 'kinglaw' ),
            "param_name" => "label",
            "value" => '',
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Label color", 'kinglaw'),
            "param_name" => "lb_color",
            "value" => "",
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( 'Email', 'kinglaw' ),
            "param_name" => "email",
            "value" => '',
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Text color", 'kinglaw'),
            "param_name" => "em_color",
            "value" => "",
        ),
    )
));

class WPBakeryShortCode_cms_list extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>