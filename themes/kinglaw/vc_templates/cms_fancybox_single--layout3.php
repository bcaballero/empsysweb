<?php 
    $icon_name = "icon_" . $atts['icon_type'];
    $iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';

    $title_font_size = isset($atts['title_font_size']) ? $atts['title_font_size']: '' ;
    $title_color = isset($atts['title_color']) ? $atts['title_color'] : '#565656';
    $decs_color = isset($atts['decs_color']) ? $atts['decs_color'] : '#787878';
    $bg_item = isset($atts['bg_item']) ? $atts['bg_item'] : '';
    $fancybox_style = isset($atts['fancybox_style']) ? $atts['fancybox_style'] : 'fcb-style1';
    $custom_fonts = isset($atts['custom_fonts']) ? $atts['custom_fonts'] : 'false';
    $google_fonts = isset($atts['google_fonts']) ? $atts['google_fonts'] : 'Montserrat';

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
<div class="cms-fancyboxes-wraper cms-fancyboxes-layout3 <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class="cms-fancybox-item <?php echo esc_attr($fancybox_style);?>" style="background-color: <?php echo esc_attr($bg_item);?>">
        <?php 
            $image_url = '';
            if (!empty($atts['image'])) {
                $attachment_image = wp_get_attachment_image_src($atts['image'], 'full');
                $image_url = $attachment_image[0];
            }
        ?>
        
        <?php if($image_url):?>
            <div class="fancybox-icon">
                <img src="<?php echo esc_attr($image_url);?>" alt="<?php echo apply_filters('the_title',$atts['title_item']);?>" />
            </div>
        <?php else:?>
            <div class="fancybox-icon">
                <i class="<?php echo esc_attr($iconClass); ?>"></i>
            </div>
        <?php endif;?>
        <?php if($atts['title_item']):?>
            <h3 class="fancybox-title" style="<?php echo wp_kses_post($inline_style);?> font-size:<?php echo esc_attr($title_font_size); ?>; color:<?php echo esc_attr($title_color); ?>">
                <?php echo apply_filters('the_title',$atts['title_item']);?>
            </h3>
        <?php endif;?>
        <?php if($atts['description_item']): ?>
            <div class="fancybox-description" style="color: <?php echo esc_attr($decs_color); ?>">
                <?php echo apply_filters('the_content',$atts['description_item']);?>
            </div>
        <?php endif; ?>
    </div>
</div>