<?php
vc_map(array(
    "name" => 'CMS Mediadropcap',
    "base" => "cms_mediadropcap",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'kinglaw'),
    "params" => array(
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            "shortcode" => "cms_mediadropcap",
            "heading" => esc_html__("Mediadropcap Template", 'kinglaw'),
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
            "group" => esc_html__("Mediadropcap Settings", 'kinglaw'),
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( 'Number', 'kinglaw' ),
            "param_name" => "number",
            "value" => '',
            "group" => esc_html__("Mediadropcap Settings", 'kinglaw'),
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( 'Title', 'kinglaw' ),
            "param_name" => "title",
            "value" => '',
            "group" => esc_html__("Mediadropcap Settings", 'kinglaw'),
        ),
        array(
            "type" => "textarea",
            "heading" => __ ( 'Description', 'kinglaw' ),
            "param_name" => "position",
            "value" => '',
            "group" => esc_html__("Mediadropcap Settings", 'kinglaw'),
        ),
    )
));

class WPBakeryShortCode_cms_mediadropcap extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>