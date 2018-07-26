<?php
extract(shortcode_atts(array(
    'button_text'  => '',
    'link_button'  => '',
    'button_style'  => '',
    'font_style' => '400',
    'cta_title'  => '',
    'cta_size'  => '20px',
    'cta_title_color'  => '#333',
    'bg_cta_color'   =>'#c29765',
    'custom_fonts' => 'false',
    'google_fonts' => '', 
), $atts));
 
    $html_id = cmsHtmlID('cms-cta');
    $atts['html_id'] = $html_id;

    $link = vc_build_link($link_button);
    $a_href = '';
    if ( strlen( $link['url'] ) > 0 ) {
        $a_href = $link['url'];
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
<div id="<?php echo esc_attr($atts['html_id']);?>" class="cms-cta-wrapper clearfix">
    <div class="cms-cta-inner" style="background-color: <?php echo esc_attr($bg_cta_color);?>">
        <div class="row">
            <div class="cms-cta-content col-xs-12 col-sm-12 col-md-9 col-lg-9">
            <?php if (!empty($cta_title) && $cta_title) { ?>
                <h3 class="title" style="<?php echo wp_kses_post($inline_style);?> color: <?php echo esc_attr($cta_title_color); ?>;font-weight: <?php echo esc_attr($font_style);?>; font-size: <?php echo esc_attr($cta_size);?>">
                    <?php echo esc_attr($cta_title); ?>
                </h3>
            <?php } ?>
            </div>

            <?php if (!empty($button_text) && $button_text) { ?>
                <div class="cms-cta-button col-xs-12 col-sm-12 col-md-3 col-lg-3 text-right">
                    <a href="<?php echo esc_url($a_href);?>" class="btn <?php echo esc_attr($button_style); ?>">
                        <?php echo esc_attr($button_text); ?>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>


