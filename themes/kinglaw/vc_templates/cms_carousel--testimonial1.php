<?php 
    $dot_style = isset($atts['dot_style']) ? $atts['dot_style'] : 'dark'; 
    $box_style = isset($atts['box_style']) ? $atts['box_style'] : 'light'; 
    $nav_style = isset($atts['nav_style']) ? $atts['nav_style'] : 'dark'; 
    $margin_dots_style = isset($atts['margin_dots_style']) ? $atts['margin_dots_style'] : 'top-40'; 
    $custom_fonts = isset($atts['custom_fonts']) ? $atts['custom_fonts'] : 'false';
    $google_fonts = isset($atts['google_fonts']) ? $atts['google_fonts'] : '';

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
<div class="cms-carousel cms-testimonial cms-testimonial-layout1 nav-style-<?php echo esc_attr($nav_style); ?> dot-style-<?php echo esc_attr($dot_style); ?> margin-<?php echo esc_attr($margin_dots_style); ?> <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    while($posts->have_posts()){
        $posts->the_post();
        global $opt_meta_options;
        $test_meta = kinglaw_get_post_meta();
        $bg_item_color = isset($atts['bg_testimonial_color']) ? $atts['bg_testimonial_color'] : '';
        $title_color = isset($atts['title_color']) ? $atts['title_color'] : '';
        $test_star = isset($atts['testimonial_stars']) ? $atts['testimonial_stars'] : '';
        ?>
        <div class="cms-carousel-item cms-testimonial-item">
            <div class="cms-testimonial-wrapper clearfix" style="background-color: <?php echo esc_attr($bg_item_color);?>">
                <div class="row">
                    <div class="col-xs-12 col-sm-5 col-md-4 col-lg-4">
                        <div class="testimonial-image text-center">
                            <?php 
                                if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'medium', false)):
                                    $class = ' has-thumbnail';
                                    $thumbnail = get_the_post_thumbnail(get_the_ID(),'medium');
                                else:
                                    $class = ' no-image';
                                    $thumbnail = '<img src="'.esc_url(get_template_directory_uri(). '/assets/images/no-image.jpg').'" alt="'.get_the_title().'" />';
                                endif;
                                echo ''.$thumbnail.'';
                            ?>
                            <h3 class="entry-title" style="<?php echo wp_kses_post($inline_style);?>  color: <?php echo esc_attr($title_color);?>"><?php the_title();?></h3>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-8 col-lg-8">
                        <div class="entry-content">
                            <h4 class="entry-slogan" style="<?php echo wp_kses_post($inline_style);?>">
                                <?php echo esc_attr($test_meta['evaluate_major']);?>
                            </h4>
                            <div class="entry-meta">
                                <span class="testimonial-star <?php echo esc_attr($opt_meta_options['testimonial_stars']);?>"></span>
                            </div>
                            <div class="entry-excerpt">
                                <i class="fa fa-quote-left" aria-hidden="true"></i> <?php echo esc_attr($test_meta['excerpt1_test']); ?>
                            </div>
                            <div class="entry-description">
                                    <?php echo substr(strip_tags(strip_shortcodes(get_the_content())), 0,134); ?>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>