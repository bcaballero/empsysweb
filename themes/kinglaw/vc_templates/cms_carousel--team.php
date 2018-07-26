<?php 
    $dot_style = isset($atts['dot_style']) ? $atts['dot_style'] : 'dark'; 
    $box_style = isset($atts['box_style']) ? $atts['box_style'] : 'light'; 
    $nav_style = isset($atts['nav_style']) ? $atts['nav_style'] : 'dark'; 
    $margin_dots_style = isset($atts['margin_dots_style']) ? $atts['margin_dots_style'] : 'top-40'; 

extract(shortcode_atts(array(         
    'image' => '',
), $atts));
$image_url = '';
if (!empty($atts['image'])) {
    $attachment_image = wp_get_attachment_image_src($atts['image'], 'lager');
    $image_url = $attachment_image[0];
}


extract(shortcode_atts(array(                 
    'custom_fonts' => 'false',
    'google_fonts' => 'Arial',
), $atts));

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

<div class="cms-carousel cms-layout-team nav-style-<?php echo esc_attr($nav_style); ?> dot-style-<?php echo esc_attr($dot_style); ?> margin-<?php echo esc_attr($margin_dots_style); ?> <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    $size = 'kinglaw_attorney_480x612';
    while($posts->have_posts()){
        $posts->the_post();
        $attorney_meta = kinglaw_get_post_meta();
        $image_crop = isset($atts['image_crop']) ? $atts['image_crop'] : 'full';
        $size = $image_crop;
        $title_color = isset($atts['title_color']) ? $atts['title_color'] : '#333';
        $position_color = isset($atts['position_color']) ? $atts['position_color'] : '#565656';
        ?>
        <div class="cms-carousel-item">
            <div class="cms-team-wrapper text-left">
                <div class="team-header">
                    <?php 
                        if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
                            $class = ' has-thumbnail';
                            $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false);
                            $thumbnail = get_the_post_thumbnail(get_the_ID(),$size);
                        else:
                            $class = ' no-image';
                            $thumbnail_url[0] = get_template_directory_uri(). '/assets/images/no-image-540.jpg';
                            $thumbnail = '<img src="'.esc_url(get_template_directory_uri(). '/assets/images/no-image.jpg').'" alt="'.get_the_title().'" />';
                        endif;
                    ?>
                    <div class="cms-team-images" data-dot="<img src='<?php echo esc_url($thumbnail_url[0]); ?>' />">
                        <a href="<?php the_permalink();?>"><?php echo ''.$thumbnail.''; ?></a>
                    </div>
                    <div class="cms-svg">
                        <img class="iamge-overlay" src="<?php echo esc_url($image_url); ?>" alt="<?php echo get_the_title(); ?>" />
                    </div>
                    <?php // get_template_part( 'page-templates/svg' );?>
                </div>
                <div class="entry-content">
                    <h3 class="entry-title" style="<?php echo wp_kses_post($inline_style);?> color: <?php echo esc_attr($title_color); ?>">
                        <a href="<?php the_permalink(); ?>"><?php the_title();?></a>
                        <span class="entry-position" style="color: <?php echo esc_attr($position_color);?>"> - <?php echo esc_attr($attorney_meta['attorney_position']); ?></span> 
                    </h3>
                    <?php if(!empty($attorney_meta['attorney_excerpt'])) { ?>
                        <div class="entry-specialized">
                            <?php echo esc_attr($attorney_meta['attorney_excerpt']);?>
                        </div>
                    <?php } ?>
                    <div class="entry-metasocial">
                        <?php if(!empty($attorney_meta['phone_attorney'])) { ?>
                            <a class="entry-phone" href="tel:<?php echo esc_attr($attorney_meta['phone_attorney']); ?>"><?php echo esc_attr($attorney_meta['phone_attorney']); ?>
                            </a>
                        <?php } ?>
                        <?php kinglaw_attorney_social();?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>