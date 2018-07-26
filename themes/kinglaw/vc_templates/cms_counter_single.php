<?php 
    $icon_name = "icon_" . $atts['icon_type'];
    $iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
    $icon_custom = isset($atts['icon_custom']) ? $atts['icon_custom'] : '';
    $icon_color = isset($atts['icon_color']) ? $atts['icon_color'] : '';

    
    $digit_color = isset($atts['digit_color']) ? $atts['digit_color'] : '';
    $title_color = isset($atts['title_color']) ? $atts['title_color'] : '';
    $style_counter = isset($atts['style_counter']) ? $atts['style_counter'] : '';

    $title_fontsize = isset($atts['title_fontsize']) ? $atts['title_fontsize'] : '';
    $digit_fontsize = isset($atts['digit_fontsize']) ? $atts['digit_fontsize'] : '';
?>
<div class="cms-counter-wraper cms-counter-default <?php echo esc_attr($style_counter);?> <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">

    <div class="cms-counter-body clearfix">
        
        <?php 
            $image_url = '';
            if (!empty($atts['image'])) {
                $attachment_image = wp_get_attachment_image_src($atts['image'], 'full');
                $image_url = $attachment_image[0];
            }
        ?>
        
        <?php if($image_url):?>
            <div class="counter-icon">
                <img src="<?php echo esc_attr($image_url);?>" alt="" />
            </div>
        <?php else:?>
            <div class="counter-icon">
                <?php if( $icon_custom ): ?>
                    <i class="<?php echo esc_attr($icon_custom); ?>" style="color:<?php echo esc_attr($icon_color); ?>;"></i>
                    <?php else: if( $iconClass ): ?>
                        <i class="<?php echo esc_attr($iconClass); ?>" style="color:<?php echo esc_attr($icon_color); ?>;"></i>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        <?php endif;?>

        <div class="counter-content">
            <div style="font-size: <?php echo esc_attr($digit_fontsize); ?>; color: <?php echo esc_attr($digit_color)?>" id="counter_<?php echo esc_attr($atts['html_id']);?>" class="number-counter cms-counter <?php echo esc_attr(strtolower($atts['type']));?>" data-suffix="<?php echo esc_attr($atts['suffix']);?>" data-prefix="<?php echo esc_attr($atts['prefix']);?>" data-type="<?php echo esc_attr(strtolower($atts['type']));?>" data-digit="<?php echo esc_attr($atts['digit']);?>">
            </div>
            <?php if($atts['c_title']):?>
                <span class="counter-title" style="font-size: <?php echo esc_attr($title_fontsize); ?>; color: <?php echo esc_attr($title_color)?>">
                    <?php echo apply_filters('the_title',$atts['c_title']);?>
                </span>
            <?php endif;?>
        </div>
    </div>
</div>