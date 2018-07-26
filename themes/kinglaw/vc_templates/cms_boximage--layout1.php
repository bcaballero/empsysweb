<?php
extract(shortcode_atts(array(         
    'image_icon' => '',
    'title' => '',
    'title_size' => '15px',
    'title_color' =>'#c29765',
    'custom_fonts' => 'false',
    'google_fonts' => '',
    'boximage_text_transform'=> 'unset',
), $atts));
$html_id = cmsHtmlID('cms-boximage');
$atts['html_id'] = $html_id;

$image_url_ic = '';
if (!empty($atts['image_icon'])) {
    $attachment_image = wp_get_attachment_image_src($atts['image_icon'], 'lager');
    $image_url_ic = $attachment_image[0];
}
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
<div id="<?php echo esc_attr($atts['html_id']);?>" class="cms-boximage cms-boximage-layout1">
    <div class="boximage-content">
    	<div class="boximage-thumb">
            <?php if($image_url_ic) {?>
    		  <img src="<?php echo esc_url($image_url_ic); ?>" alt="<?php echo esc_attr($title); ?>" />
            <?php } ?>
    	</div>
        <h3 class="boximage-title" style="<?php echo wp_kses_post($inline_style);?> color:<?php echo esc_attr($title_color); ?>;font-size: <?php echo esc_attr($title_size); ?>; text-transform: <?php echo esc_attr($boximage_text_transform);?>">
            <?php echo wp_kses_post($title); ?>
        </h3>
    </div>
</div>