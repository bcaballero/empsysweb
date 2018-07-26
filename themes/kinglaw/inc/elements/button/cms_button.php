<?php
vc_map(array(
    "name" => 'CMS Button',
    "base" => "cms_button",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'kinglaw'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __ ( 'Text on the button', 'kinglaw' ),
            "param_name" => "button_text",
            "value" => '',
            "group" => esc_html__("Button Settings", 'kinglaw')
        ),
        array(
            "type" => "vc_link",
            "class" => "",
            "heading" => esc_html__("Link button", 'kinglaw'),
            "param_name" => "link_button",
            "value" => '',
            "group" => esc_html__("Button Settings", 'kinglaw')
        ),
        /* Start Icon */
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Icon library', 'kinglaw' ),
            'value' => array(
                esc_html__( 'Font Awesome', 'kinglaw' ) => 'fontawesome',
                esc_html__( 'Open Iconic', 'kinglaw' ) => 'openiconic',
                esc_html__( 'Typicons', 'kinglaw' ) => 'typicons',
                esc_html__( 'Entypo', 'kinglaw' ) => 'entypo',
                esc_html__( 'Linecons', 'kinglaw' ) => 'linecons',
                esc_html__( 'Pixel', 'kinglaw' ) => 'pixelicons',
                esc_html__( 'P7 Stroke', 'kinglaw' ) => 'pe7stroke',
                esc_html__( 'RT Icon', 'kinglaw' ) => 'rticon',
            ),
            'param_name' => 'icon_type',
            'description' => esc_html__( 'Select icon library.', 'kinglaw' ),
            "group" => esc_html__("Button Settings", 'kinglaw'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'kinglaw' ),
            'param_name' => 'icon_fontawesome',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'fontawesome',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'fontawesome',
            ),
            'description' => esc_html__( 'Select icon from library.', 'kinglaw' ),
            "group" => esc_html__("Button Settings", 'kinglaw'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'kinglaw' ),
            'param_name' => 'icon_openiconic',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'openiconic',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'openiconic',
            ),
            'description' => esc_html__( 'Select icon from library.', 'kinglaw' ),
            "group" => esc_html__("Button Settings", 'kinglaw'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'kinglaw' ),
            'param_name' => 'icon_typicons',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'typicons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'typicons',
            ),
            'description' => esc_html__( 'Select icon from library.', 'kinglaw' ),
            "group" => esc_html__("Button Settings", 'kinglaw'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'kinglaw' ),
            'param_name' => 'icon_entypo',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'entypo',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'entypo',
            ),
            'description' => esc_html__( 'Select icon from library.', 'kinglaw' ),
            "group" => esc_html__("Button Settings", 'kinglaw'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'kinglaw' ),
            'param_name' => 'icon_linecons',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'linecons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'linecons',
            ),
            'description' => esc_html__( 'Select icon from library.', 'kinglaw' ),
            "group" => esc_html__("Button Settings", 'kinglaw'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'kinglaw' ),
            'param_name' => 'icon_pixelicons',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'pixelicons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'pixelicons',
            ),
            'description' => esc_html__( 'Select icon from library.', 'kinglaw' ),
            "group" => esc_html__("Button Settings", 'kinglaw'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'kinglaw' ),
            'param_name' => 'icon_pe7stroke',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'pe7stroke',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'pe7stroke',
            ),
            'description' => esc_html__( 'Select icon from library.', 'kinglaw' ),
            "group" => esc_html__("Button Settings", 'kinglaw'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'kinglaw' ),
            'param_name' => 'icon_rticon',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'rticon',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'rticon',
            ),
            'description' => esc_html__( 'Select icon from library.', 'kinglaw' ),
            "group" => esc_html__("Button Settings", 'kinglaw'),
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Button Align", 'kinglaw'),
            "admin_label" => true,
            "param_name" => "button_align",
            "value" => array(
                "Left" => "button-left",
                "Center"=> "button-center",
                "Right" => "button-right"
            ),
            "group" => esc_html__("Button Settings", 'kinglaw'),
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Button Style", 'kinglaw'),
            "admin_label" => true,
            "param_name" => "btn_style",
            "value" => array(
                "Default" => "default",
                "Style 1"=> "style1",
                "Style 2"=> "style2"
            ),
            "group" => esc_html__("Button Settings", 'kinglaw'),
        ),

        /* End Icon */
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Icon Align", 'kinglaw'),
            "admin_label" => true,
            "param_name" => "icon_align",
            "value" => array(
                "Left" => "left",
                "Right" => "right"
            ),
            "group" => esc_html__("Button Settings", 'kinglaw'),
        ),     
        array(
            "type" => "textfield",
            "heading" => esc_html__("Button Border Radius", 'kinglaw'),
            "param_name" => "btn_radius",
            "value" => "",
            "description" => "Enter: ...px",
            "group" => esc_html__("Button Settings", 'kinglaw'),
        ),     
        array(
            "type" => "textfield",
            "heading" => __ ( "Extra class name", 'kinglaw' ),
            "param_name" => "el_class",
            "description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'kinglaw' ),
            "group" => esc_html__("Button Settings", 'kinglaw'),
        ), 
    )
));

class WPBakeryShortCode_cms_button extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>