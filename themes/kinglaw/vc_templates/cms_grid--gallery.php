<?php 
extract(shortcode_atts(array(         
    'image' => '',
), $atts));
$image_url = '';
if (!empty($atts['image'])) {
    $attachment_image = wp_get_attachment_image_src($atts['image'], 'lager');
    $image_url = $attachment_image[0];
}

/* get categories */
$taxo = 'category';
$_category = array();
if(!isset($atts['cat']) || $atts['cat']==''){
    $terms = get_terms($taxo);
    foreach ($terms as $cat){
        $_category[] = $cat->term_id;
    }
} else {
    $_category  = explode(',', $atts['cat']);
}
$atts['categories'] = $_category;

?>
<div class="cms-grid-wraper cms-grid-gallery <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class="row <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        $size = 'kinglaw_gallery_680x658';
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            global $opt_meta_options;
            $groups[] = '"all"';
            $hide_feature_image = isset( $atts['hide_feature_image'] ) ? $atts['hide_feature_image'] : '';
            foreach(cmsGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            ?>
            <div class="<?php echo esc_attr($atts['item_class']);?>" data-groups='[<?php echo implode(',', $groups);?>]'>
                <?php 
                    if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
                        $class = ' has-feature-img';
                        $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false);
                        $thumbnail = get_the_post_thumbnail(get_the_ID(), $size);
                    else:
                        $class = ' no-feature-img';
                        $thumbnail_url[0] = get_template_directory_uri(). '/assets/images/no-image.jpg';
                        $thumbnail = '<img src="'.get_template_directory_uri(). '/assets/images/no-image.jpg" alt="'.get_the_title().'" />';
                    endif;
                ?>
                <div class="entry-gallery">
                    <div class="entry-thumbnail <?php echo esc_attr($class); ?> <?php if($hide_feature_image == 'yes') { echo 'hidden-feature-image'; } ?>">
                        <div class="cms-images-zoom" data-dot="<img src='<?php echo esc_url($thumbnail_url[0]); ?>' />">
                            <a href="<?php echo esc_url($thumbnail_url[0]); ?>" class="z-view"><?php echo ''.$thumbnail.''; ?>
                            <?php if($image_url):?>
                                <img class="iamge-overlay" src="<?php echo esc_url($image_url); ?>" alt="<?php echo get_the_title(); ?>" />
                            <?php endif;?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>