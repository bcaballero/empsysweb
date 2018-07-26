<?php
extract(shortcode_atts(array(         
    'number_title' => '',
    'title' => '',
    'title_color' => '#565656',
    'title_font_size' => '20px',
    'process_desc' => '',
    'process_color' => '#777',
    'custom_fonts' => 'false',
    'google_fonts' => '',
), $atts));
$html_id = cmsHtmlID('cms-process');
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
<div id="<?php echo esc_attr($atts['html_id']);?>" class="cms-process-wrapper cms-process-layout">
    <span class="number-title"><?php echo wp_kses_post($number_title); ?></span>
    <h3 class="title" style="<?php echo wp_kses_post($inline_style);?> color: <?php echo esc_attr($title_color);?>">
        <?php echo wp_kses_post($title); ?>
    </h3>
    <div class="supb-title" style="color: <?php echo esc_attr($process_color);?>">
        <?php echo wp_kses_post($process_desc); ?>
    </div>
</div>