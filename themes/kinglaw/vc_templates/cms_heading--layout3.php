<?php
extract(shortcode_atts(array(         
    'title1' => '',
    'color_title1' => '',
    'title2' => '',
    'color_title2' => '',
    'title_size' => '',
    'cms_font_weight' => '',
    'heading_text_transform'=> 'unset',
    'text_align' => '',
    'letter_spacing' => '',
    'title_margin' => '',
    'custom_fonts' => 'false',
    'google_fonts' => '',            
), $atts));
$html_id = cmsHtmlID('cms-heading');
$atts['html_id'] = $html_id;

$inline_style = '';
if($custom_fonts == 'true') {
    // Build the data array
    $googleFontsParam = new Vc_Google_Fonts();      
    $fieldSettings = array();
    $text_font_data = strlen( $google_fonts ) > 0 ? $googleFontsParam->_vc_google_fonts_parse_attributes( $fieldSettings, $google_fonts ) : '';
     
    // Build the inline style
    if(isset($text_font_data['values']['font_family'])) {
        $fontFamily = explode( ':', $text_font_data['values']['font_family'] );
        $styles[] = 'font-family:' . $fontFamily[0];
    }
    if(isset($text_font_data['values']['font_style'])) {
        $fontStyles = explode( ':', $text_font_data['values']['font_style'] );
        $styles[] = 'font-weight:' . $fontStyles[1];
        $styles[] = 'font-style:' . $fontStyles[2];  
    }
    if(isset($text_font_data['values']['font_family']) || isset($text_font_data['values']['font_style'])) {
        foreach( $styles as $attribute ){           
            $inline_style .= $attribute.'; ';       
        } 
    }
             
    // Enqueue the right font   
    $settings = get_option( 'wpb_js_google_fonts_subsets' );
    if ( is_array( $settings ) && ! empty( $settings ) ) {
        $subsets = '&subset=' . implode( ',', $settings );
    } else {
        $subsets = '';
    }
     
    // We also need to enqueue font from googleapis
    if ( isset( $text_font_data['values']['font_family'] ) ) {
        wp_enqueue_style( 
            'vc_google_fonts_' . vc_build_safe_css_class( $text_font_data['values']['font_family'] ), 
            '//fonts.googleapis.com/css?family=' . $text_font_data['values']['font_family'] . $subsets
        );
    }
} else {
    $inline_style = '';
}

?>
<div id="<?php echo esc_attr($atts['html_id']);?>" class="cms-heading-wrapper cms-heading-layout3">
        <div class="cms-heading-content">
            <h2 class="title" style="<?php echo wp_kses_post($inline_style);?> text-transform: <?php echo esc_attr($heading_text_transform);?>; font-size: <?php echo esc_attr($title_size);?>; font-weight: <?php echo esc_attr($cms_font_weight);?>; letter-spacing: <?php echo esc_attr($letter_spacing);?>; text-align: <?php echo esc_attr($text_align);?>;">
                <span class="title1" style="color:<?php echo esc_attr($color_title1); ?>;">
                    <?php echo wp_kses_post($title1); ?>    
                </span>
                <span class="title2" style="color:<?php echo esc_attr($color_title2); ?>;">
                    <?php echo wp_kses_post($title2); ?>
                </span>
            </h2>
        </div>
</div>