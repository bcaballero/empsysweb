<?php 
    $dot_style = isset($atts['dot_style']) ? $atts['dot_style'] : 'dark'; 
    $box_style = isset($atts['box_style']) ? $atts['box_style'] : 'light'; 
    $nav_style = isset($atts['nav_style']) ? $atts['nav_style'] : 'dark'; 
    $margin_dots_style = isset($atts['margin_dots_style']) ? $atts['margin_dots_style'] : 'top-40'; 
?>
<div class="cms-carousel cms-testimonial cms-testimonial-layout3 nav-style-<?php echo esc_attr($nav_style); ?> dot-style-<?php echo esc_attr($dot_style); ?> margin-<?php echo esc_attr($margin_dots_style); ?> <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>" data-center="true">
    <?php
    $posts = $atts['posts'];
    while($posts->have_posts()){
        $test_meta = kinglaw_get_post_meta();
        $posts->the_post();
        $title_color = isset($atts['title_color']) ? $atts['title_color'] : '';
        ?>
        <div class="cms-carousel-item cms-testimonial-item">
            <div class="cms-testimonial-wrapper text-center clearfix">
                <div class="testimonial-meta">
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

                    <h3 class="testimonial-title" style="color: <?php echo esc_attr($title_color);?>">
                        <?php the_title();?>
                    </h3>
                    <div class="entry-description" style="color: <?php echo esc_attr($title_color);?>">
                        <span class="quoter"><i class="fa fa-quote-left" aria-hidden="true"></i></span> 
                            <?php echo get_the_content();?> 
                        <span class="quoter"><i class="fa fa-quote-right" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>