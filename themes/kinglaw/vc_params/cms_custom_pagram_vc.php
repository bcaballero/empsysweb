<?php
/*
 * VC
 */
vc_add_param("vc_row", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("CMS Custom Style", 'kinglaw'),
    "param_name" => "el_class",
    "value" => array(
        'None' => '',
        'Row Box Shadow' => 'row-has-boxshadow', 
        'Row Box Shadow Top' => 'row-has-boxshadow-top', 
        'Row Box Shadow Bottom' => 'row-has-boxshadow-bottom', 
        'Row BG Color Primary' => 'bg-primary', 
        'Overlay0(Black 0.2)' => 'row-overlay0',
        'Overlay1(Black 0.8)' => 'row-overlay',
        'Overlay2(Black 0.6)' => 'row-overlay2',
        'Overlay3(Gray 0.7)' => 'row-overlay3',
        'Overlay4(White 0.5)' => 'row-overlay4',
        'Overlay5(White 0.7)' => 'row-overlay5',
        'Overlay6(Brown 0.77)' => 'row-overlay6',
        'Row z-index' => 'row-z-index',  
    ),  
));

vc_add_param("vc_row", array(
    "type" => "textfield",
    "heading" => esc_html__("CMS Custom Class", "kinglaw"),
    "param_name" => "el_class_row",
    "value" => "",
));

vc_add_param("vc_column", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("CMS Custom Style", 'kinglaw'),
    "param_name" => "el_class",
    "value" => array(
        'None' => '',
        'Column Overlay' => 'col-overlay', 
        'Column Offset Left' => 'section-offset-left rm-padding-sm rm-padding-xs col-overlay',
        'Column Offset Right' => 'section-offset-right rm-padding-xs rm-padding-sm col-overlay',
        'Remove Padding Tablet ( < 992 )' => 'rm-padding-sm',
        'Remove Padding Mobile ( < 767 )' => 'rm-padding-xs',
        'Text Align Center' => 'text-center',
        'Text Align Left' => 'text-left',
        'Text Align Right' => 'text-right',
        'Column custom' => 'column-custom', 
    ),  
));

vc_add_param("vc_column", array(
    "type" => "textfield",
    "heading" => esc_html__("CMS Custom Class", "kinglaw"),
    "param_name" => "el_class_col",
    "value" => "",
));