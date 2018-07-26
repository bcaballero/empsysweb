<?php 
    $icon_name = "icon_" . $atts['icon_type'];
    $iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
    $icon_custom = isset($atts['icon_custom']) ? $atts['icon_custom'] : '';
    $icon_color = isset($atts['icon_color']) ? $atts['icon_color'] : '';

    $font_family_custom = isset($atts['font_family_custom']) ? $atts['font_family_custom'] : '';
    $title_font_size = isset($atts['title_font_size']) ? $atts['title_font_size'] : '';
    $title_line_height = isset($atts['title_line_height']) ? $atts['title_line_height'] : '';
    $title_margin = isset($atts['title_margin']) ? $atts['title_margin'] : '';
    $title_color = isset($atts['title_color']) ? $atts['title_color'] : '';

    $decs_color = isset($atts['decs_color']) ? $atts['decs_color'] : '';

?>
<div class="cms-fancyboxes-wraper cms-fancyboxes-contactinfo <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class="cms-fancybox-item">
            <div class="content-item">
                <?php if($atts['title_item']):?>
                    <span class="cms-fancybox-title <?php echo esc_attr($font_family_custom); ?>" style="font-size:<?php echo esc_attr($title_font_size); ?>;line-height:<?php echo esc_attr($title_line_height); ?>;color:<?php echo esc_attr($title_color); ?>;margin:<?php echo esc_attr($title_margin); ?>;">
                        <?php echo apply_filters('the_title',$atts['title_item']);?>
                    </span>
                <?php endif;?>

                <?php if($atts['description_item']): ?>
                    <span class="cms-fancybox-description" style="color:<?php echo esc_attr($decs_color); ?>;">
                        <?php echo apply_filters('the_content',$atts['description_item']);?>
                    </span>
                <?php endif; ?>
            </div>
    </div>
</div>