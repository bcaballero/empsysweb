<?php 
    $dot_style = isset($atts['dot_style']) ? $atts['dot_style'] : 'dark'; 
    $box_style = isset($atts['box_style']) ? $atts['box_style'] : 'light'; 
    $nav_style = isset($atts['nav_style']) ? $atts['nav_style'] : 'dark'; 
    $margin_dots_style = isset($atts['margin_dots_style']) ? $atts['margin_dots_style'] : 'top-40'; 
?>
<div class="cms-carousel cms-carousel-client nav-style-<?php echo esc_attr($nav_style); ?> dot-style-<?php echo esc_attr($dot_style); ?> margin-<?php echo esc_attr($margin_dots_style); ?> <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    $size = 'kinglaw_client_262x92';
    $counter = 0;
    $rows = 2;

    while ($posts->have_posts()) {

        $posts->the_post();

        $counter++;

        if($rows == 1){
            echo '<div class="cs-carousel-item-wrap">';
        }else{
            if($counter % $rows == 1){
                echo '<div class="cs-carousel-item-wrap">';
            }
        }
        ?>
        <div class="cms-carousel-item">
            <?php 
                if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
                    $class = ' has-thumbnail';
                    $thumbnail = get_the_post_thumbnail(get_the_ID(),'medium');
                else:
                    $class = ' no-image';
                    $thumbnail = '<img src="'.esc_url(get_template_directory_uri(). '/assets/images/no-image.jpg').'" alt="'.get_the_title().'" />';
                endif;
                echo '<span class="cms-carousel-media '.esc_attr($class).'">'.$thumbnail.'</span>';
            ?>
        </div>
        <?php
        if($rows == 1){
            echo '</div>';
        }else{
            if($counter % $rows == 0){
                echo '</div>';
            }
        }
        ?>
    <?php
    }
    ?>
</div>