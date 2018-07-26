<?php
extract(shortcode_atts(array(
    'icon_type' => 'fontawesome',
    'button_text'  => 'Button',
    'button_align'  => 'button-left',
    'link_button'  => '#',
    'icon_align'  => 'left',
    'icon_custom'  => '',
    'btn_style'  => 'default',
    'btn_radius'  => '0',
    'el_class'  => ''     
), $atts));
 
    $icon_name = "icon_" . $icon_type;
    $iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
    $link = vc_build_link($link_button);
    $a_href = '#';
    if ( strlen( $link['url'] ) > 0 ) {
        $a_href = $link['url'];
    }
    $a_target = !empty($link['target']) ? $link['target'] : '_self';

?>
<div class="cms-button <?php echo esc_attr($button_align); ?> <?php echo esc_attr($el_class); ?>">

    <a class="btn-<?php echo esc_attr($btn_style);?>" href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>" style="-webkit-border-radius: <?php echo esc_attr($btn_radius); ?>; -moz-border-radius: <?php echo esc_attr($btn_radius); ?>;">
        <span class="btn-text">
            <?php switch ($icon_align) {
                case 'right':
                    ?>
                        <span><?php echo esc_attr($button_text); ?></span>
                        <?php if( $icon_custom ): ?>
                            <i class="<?php echo esc_attr($icon_custom);?>"></i>
                            <?php else: if( $iconClass ): ?>
                                <i class="<?php echo esc_attr($iconClass);?>"></i>
                            <?php endif; ?>
                        <?php endif;?>
                    <?php
                    break;
                case 'left':
                default:
                    ?>
                        <?php if( $icon_custom ): ?>
                            <i class="<?php echo esc_attr($icon_custom);?>"></i>
                            <?php else: if( $iconClass ): ?>
                                <i class="<?php echo esc_attr($iconClass);?>"></i>
                            <?php endif; ?>
                        <?php endif;?>
                        <span><?php echo esc_attr($button_text); ?></span>
                    <?php
                    break;
            }?>
        </span>
    </a>
</div>
