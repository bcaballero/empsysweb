<?php 
    $dot_style = isset($atts['dot_style']) ? $atts['dot_style'] : 'dark'; 
    $box_style = isset($atts['box_style']) ? $atts['box_style'] : 'light'; 
    $nav_style = isset($atts['nav_style']) ? $atts['nav_style'] : 'dark'; 
    $nav_position = isset($atts['nav_position']) ? $atts['nav_position'] : 'top-right'; 
    $margin_dots_style = isset($atts['margin_dots_style']) ? $atts['margin_dots_style'] : 'top-40'; 
?>

<div class="cms-carousel cms-testimonial cms-testimonial-layout2 nav-style-<?php echo esc_attr($nav_style); ?> nav-position-<?php echo esc_attr($nav_position); ?> dot-style-<?php echo esc_attr($dot_style); ?> margin-<?php echo esc_attr($margin_dots_style); ?> <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    while($posts->have_posts()){
        $posts->the_post();
        global $opt_meta_options;
        $bg_item_color = isset($atts['bg_testimonial_color']) ? $atts['bg_testimonial_color'] : 'color';
        $title_color = isset($atts['title_color']) ? $atts['title_color'] : '#c29765';
        ?>
        <div class="cms-carousel-item cms-testimonial-item">
            <div class="cms-testimonial-wrapper background-<?php echo esc_attr($bg_item_color);?> clearfix">
               <div class="testimonial-image">
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
                </div>
                
                <div class="entry-content">
                    <div class="entry-description">
                        <?php echo get_the_content(); ?>
                    </div>
                    <h3 class="testimonial-title" style="color: <?php echo esc_attr($title_color);?>">
                        -<?php the_title();?>-
                    </h3>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>