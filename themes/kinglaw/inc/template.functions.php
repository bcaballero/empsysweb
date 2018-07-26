<?php

/**
 * Get Post Meta
**/

function kinglaw_get_meta_options() { 
    global $opt_meta_options; 
    return $opt_meta_options;  
}

/**
 * Get Header Layout
 */
function kinglaw_header(){
    global $opt_theme_options, $opt_meta_options;

    if(!isset($opt_theme_options)){
        get_template_part('inc/header/header', '2');
        return;
    }

    if(is_page() && !empty($opt_meta_options['custom_header'])) {
        $opt_theme_options['header_layout'] = $opt_meta_options['header_layout'];
    }

    /* load custom header template. */
    get_template_part('inc/header/header', $opt_theme_options['header_layout']);
}

add_filter( 'body_class', 'kinglaw_body_header_class' );
function kinglaw_body_header_class($classes) {
    global $opt_theme_options, $opt_meta_options;

    if(is_page() && !empty($opt_meta_options['custom_header'])) {
        $opt_theme_options['header_layout'] = $opt_meta_options['header_layout'];
    }

    if ( $opt_theme_options['header_layout'] ) {
        $classes[] = 'header-'.$opt_theme_options['header_layout'];
    }
    return $classes;
}

/**
 * Get Header Layout
 */
function kinglaw_footer(){
    global $opt_theme_options, $opt_meta_options;

    if(!isset($opt_theme_options)){
        get_template_part('inc/footer/footer', '1');
        return;
    }

    if(is_page() && !empty($opt_meta_options['custom_footer'])) {
        $opt_theme_options['footer_layout'] = $opt_meta_options['footer_layout'];
    }

    if(is_404()) {
        get_template_part('inc/footer/footer', '1');
        return;
    }

    /* load custom footer template. */
    if(class_exists('EF3_Framework')) {
        get_template_part('inc/footer/footer', $opt_theme_options['footer_layout']);
    }
}
/**
 * Get Logo
 */
function kinglaw_header_logo_one(){
    global $opt_theme_options, $opt_meta_options;

    if(isset($opt_theme_options)) {
        echo '<a class="main-logo hidden-xs hidden-sm" href="' . esc_url(home_url('/')) . '"><img alt="' . esc_html__('Main Logo', 'kinglaw') . '" src="' . esc_url($opt_theme_options['main_logo']['url']) . '"></a>';
    } else {
        echo '<a class="main-logo" href="' . esc_url(home_url('/')) . '"><img alt="' . esc_html__('Main Logo', 'kinglaw') . '" src="' . esc_url(get_template_directory_uri().'/assets/images/logo.png') . '"></a>';
    }
}

function kinglaw_header_logo(){
    global $opt_theme_options, $opt_meta_options;

    if(isset($opt_theme_options)) {
        echo '<a class="main-logo hidden-xs hidden-sm" href="' . esc_url(home_url('/')) . '"><img alt="' . esc_html__('Main Logo', 'kinglaw') . '" src="' . esc_url($opt_theme_options['main_logo']['url']) . '"></a>';
        echo '<a class="sticky-logo hidden-xs hidden-sm" href="' . esc_url(home_url('/')) . '"><img alt="' . esc_html__('Sticky Logo', 'kinglaw') . '" src="' . esc_url($opt_theme_options['sticky_logo']['url']) . '"></a>';
        echo '<a class="mobile-logo hidden-lg hidden-md" href="' . esc_url(home_url('/')) . '"><img alt="' . esc_html__('Mobile Logo', 'kinglaw') . '" src="' . esc_url($opt_theme_options['mobile_logo']['url']) . '"></a>';
    } else {
        echo '<a class="main-logo" href="' . esc_url(home_url('/')) . '"><img alt="' . esc_html__('Main Logo', 'kinglaw') . '" src="' . esc_url(get_template_directory_uri().'/assets/images/logo.png') . '"></a>';
        echo '<a class="sticky-logo" href="' . esc_url(home_url('/')) . '"><img alt="' . esc_html__('Logo Sticky', 'kinglaw') . '" src="' . esc_url(get_template_directory_uri().'/assets/images/logo.png') . '"></a>';
    }
}

function kinglaw_header_logo_light(){
    global $opt_theme_options, $opt_meta_options;

    if(isset($opt_theme_options)) {
        echo '<a class="main-logo hidden-xs hidden-sm" href="' . esc_url(home_url('/')) . '"><img alt="' . esc_html__('Transparent Logo', 'kinglaw') . '" src="' . esc_url($opt_theme_options['tran_logo']['url']) . '"></a>';
        echo '<a class="sticky-logo hidden-xs hidden-sm" href="' . esc_url(home_url('/')) . '"><img alt="' . esc_html__('Sticky Logo', 'kinglaw') . '" src="' . esc_url($opt_theme_options['sticky_logo']['url']) . '"></a>';
        echo '<a class="mobile-logo hidden-lg hidden-md" href="' . esc_url(home_url('/')) . '"><img alt="' . esc_html__('Mobile Logo', 'kinglaw') . '" src="' . esc_url($opt_theme_options['mobile_logo']['url']) . '"></a>';
    } else {
        echo '<a class="main-logo" href="' . esc_url(home_url('/')) . '"><img alt="' . esc_html__('Transparent Logo', 'kinglaw') . '" src="' . esc_url(get_template_directory_uri().'/assets/images/logo-light.png') . '"></a>';
        echo '<a class="sticky-logo" href="' . esc_url(home_url('/')) . '"><img alt="' . esc_html__('Logo Sticky', 'kinglaw') . '" src="' . esc_url(get_template_directory_uri().'/assets/images/logo.png') . '"></a>';
    }
}

/**
 * Get Bg Footer
 */
function kinglaw_bg_footer(){
    global $opt_theme_options;

    if(isset($opt_theme_options)) {
        echo esc_url($opt_theme_options['footer_bg']['url']);
    } else {
        echo esc_url(get_template_directory_uri().'/assets/images/bg-footer.jpg');
    }
}

/**
 * get header class.
 */
function kinglaw_header_class($class = ''){
    global $opt_theme_options;

    if(!isset($opt_theme_options)){
        echo esc_attr($class);
        return;
    }

    if($opt_theme_options['menu_sticky'])
        $class .= ' sticky-desktop';

    echo esc_attr($class);
}

/**
 * Main navigation.
 */
function kinglaw_header_navigation_primary (){

    global $opt_meta_options;

    $attr = array(
        'menu_class' => 'nav-menu menu-main-menu',
        'theme_location' => 'primary'
    );

    if(is_page() && !empty($opt_meta_options['header_menu']))
        $attr['menu'] = $opt_meta_options['header_menu'];

    /* enable mega menu. */
    if(class_exists('HeroMenuWalker')){ $attr['walker'] = new HeroMenuWalker(); }

    /* main nav. */
    if ( has_nav_menu( 'primary' ) ) {
        wp_nav_menu( $attr );
    } else { ?>
        <div class="new-item-menu"><a href="<?php echo get_admin_url(); ?>nav-menus.php"><?php esc_html_e('Create New Menu', 'kinglaw'); ?></a></div>
    <?php }
}

/**
 * Main navigation - Left
 */
function kinglaw_header_navigation_left (){

    $attr = array(
        'menu_class' => 'nav-menu menu-main-menu nav-menu-left',
        'theme_location' => 'pr_menu_left'
    );

    /* enable mega menu. */
    if(class_exists('HeroMenuWalker')){ $attr['walker'] = new HeroMenuWalker(); }

    /* main nav. */
    wp_nav_menu( $attr );
}

/**
 * Main navigation - Right
 */
function kinglaw_header_navigation_right (){

    $attr = array(
        'menu_class' => 'nav-menu menu-main-menu nav-menu-right',
        'theme_location' => 'pr_menu_right'
    );

    /* enable mega menu. */
    if(class_exists('HeroMenuWalker')){ $attr['walker'] = new HeroMenuWalker(); }

    /* main nav. */
    wp_nav_menu( $attr );
}


/**
 * get page title layout
 */
function kinglaw_page_title(){
    global $opt_theme_options, $opt_meta_options;

    if(is_page() && !empty($opt_meta_options['custom_page_title'])) {
        $opt_theme_options['page_title_layout'] = $opt_meta_options['page_title_layout'];
    }

    /* BG image */
    if (is_page() && !empty($opt_meta_options['page_bg_page_title']['url'])) {
        $opt_theme_options['bg_page_title']['url'] = $opt_meta_options['page_bg_page_title']['url'];
    }
    if (is_singular('post') && !empty($opt_meta_options['post_bg_page_title']['url']) && $opt_meta_options['post_bg_page_title']['url']) {
        $opt_theme_options['bg_page_title']['url'] = $opt_meta_options['post_bg_page_title']['url'];
    }
    /* BG 404 Page */
    if (is_404()) {
        $opt_theme_options['bg_page_title']['url'] = get_template_directory_uri(). '/assets/images/pt-404.jpg';
    }

    /* Breadcrumb Page */
    if(is_page() && !empty($opt_meta_options['custom_page_title']) && !empty($opt_meta_options['hidden_breadcrumb'])){
        $opt_theme_options['hidden_breadcrumb'] = $opt_meta_options['hidden_breadcrumb'];
    }

    if (is_singular('attorney') && !empty($opt_theme_options['attorney_bg_page_title']['url'])) {
        $opt_theme_options['bg_page_title']['url'] = $opt_theme_options['attorney_bg_page_title']['url'];
    }

    if (is_singular('service') && !empty($opt_theme_options['service_bg_page_title']['url'])) {
        $opt_theme_options['bg_page_title']['url'] = $opt_theme_options['service_bg_page_title']['url'];
    }

    $page_pagetitle_fullscreen  = '';

    if (is_page() && !empty($opt_meta_options['custom_page_title']) && !empty($opt_meta_options['page_pagetitle_fullscreen'])) {
        $page_pagetitle_fullscreen = 'page-title-fullscreen';
    }
    /* Custom layout from Woocommerce page. */
    if(class_exists('Woocommerce')){
        if (is_woocommerce() && !empty($opt_theme_options['shop_bg_page_title']['url']) || is_checkout() ||  is_cart()) {
            $opt_theme_options['bg_page_title']['url'] = $opt_theme_options['shop_bg_page_title']['url'];
        }
    }

    /* Custom layout from page. */
    if(is_404()) {
        return;
    } ?> 
    <?php if(class_exists('EF3_Framework')) {
        if($opt_theme_options['page_title_layout'] != '') {
            $align = !empty($opt_meta_options['page_pagetitle_align']) ? $opt_meta_options['page_pagetitle_align'] : ''; ?>
            <div id="cms-page-title" class="page-title pt-style4 text-<?php echo esc_attr($align);?>" style="background-image: url(<?php echo esc_url($opt_theme_options['bg_page_title']['url']); ?>)">
                <div class="container">
                    <div class="cms-inner-page-title">
                        <div class="row">
                                <div class="cms-page-title-inner col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <h1><?php kinglaw_get_page_title(); ?></h1>
                                </div>
                                <?php if(empty($opt_theme_options['hidden_breadcrumb'])) { ?>
                                    <div class="cms-breadcrumb col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <?php kinglaw_get_bread_crumb(); ?>
                                    </div>
                                <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <div id="cms-page-title" class="page-title page-title-default text-center" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/bg-page-title.jpg)">
            <div class="container">
                <div class="row">
                    <div class="cms-page-title-inner col-md-12">
                        <h1><?php kinglaw_get_page_title(); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    <?php }
}

/**
 * page title
 */
function kinglaw_get_page_title(){

    global $opt_meta_options;

    if (!is_archive()){
        /* page. */
        if(is_page()) :
            /* custom title. */
            if(!empty($opt_meta_options['page_title_text'])):
                echo esc_html($opt_meta_options['page_title_text']);
            else :
                the_title();
            endif;
        elseif (is_front_page()):
            esc_html_e('Blog', 'kinglaw');
        /* search */
        elseif (is_search()):
            printf( esc_html__( 'Search Results for: %s', 'kinglaw' ), '<cite>' . get_search_query() . '</cite>' );
        /* 404 */
        elseif (is_404()):
            esc_html_e( '404 Error', 'kinglaw');
        /* Single Post */
        elseif (is_singular('post')):
            the_title();
        /* other */
        else :
            the_title();
        endif;
    } else {
        /* category. */
        if ( is_category() ) :
            single_cat_title();
        elseif ( is_tag() ) :
            /* tag. */
            single_tag_title();
        /* author. */
        elseif ( is_author() ) :
            printf( esc_html__( 'Author: %s', 'kinglaw' ), '<span class="vcard">' . get_the_author() . '</span>' );
        /* date */
        elseif ( is_day() ) :
            printf( esc_html__( 'Day: %s', 'kinglaw' ), '<span>' . get_the_date() . '</span>' );
        elseif ( is_month() ) :
            printf( esc_html__( 'Month: %s', 'kinglaw' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'kinglaw' ) ) . '</span>' );
        elseif ( is_year() ) :
            printf( esc_html__( 'Year: %s', 'kinglaw' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'kinglaw' ) ) . '</span>' );
        /* post format */
        elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
            esc_html_e( 'Asides', 'kinglaw' );
        elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
            esc_html_e( 'Galleries', 'kinglaw');
        elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
            esc_html_e( 'Images', 'kinglaw');
        elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
            esc_html_e( 'Videos', 'kinglaw' );
        elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
            esc_html_e( 'Quotes', 'kinglaw' );
        elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
            esc_html_e( 'Links', 'kinglaw' );
        elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
            esc_html_e( 'Statuses', 'kinglaw' );
        elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
            esc_html_e( 'Audios', 'kinglaw' );
        elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
            esc_html_e( 'Chats', 'kinglaw' );
        /* Attorney */
        elseif (is_tax('attorney_categories')):
            $term = get_term_by( 'slug', get_query_var( 'attorney_categories' ), get_query_var( 'taxonomy' ) );
            echo apply_filters('the_title', $term->name);
        elseif (is_post_type_archive('attorney')):
            esc_html_e('Attorneys', 'kinglaw');
        /* Services */
        elseif (is_tax('service_categories')):
            $term = get_term_by( 'slug', get_query_var( 'service_categories' ), get_query_var( 'taxonomy' ) );
            echo apply_filters('the_title', $term->name);
        elseif (is_post_type_archive('service')):
            esc_html_e('Services', 'kinglaw');
        else :
            /* other */
            the_title();
        endif;
    }
}

/**
 * Breadcrumb
 *
 * 
 */
function kinglaw_get_bread_crumb($separator = '') {
    global $opt_theme_options, $post;

    if(!is_home()) {
        echo '<ul class="breadcrumbs"><li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Home', 'kinglaw') . '</a></li>';
        $params['link_none'] = '';

        /* category */
        if (is_category()) {
            $category = get_the_category();
            $ID = $category[0]->cat_ID;
            echo is_wp_error( $cat_parents = get_category_parents($ID, TRUE, '', FALSE ) ) ? '' : '<li>'.wp_kses_post($cat_parents).'</li>';
        }
        /* tax */
        if (is_tax()) {
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            $link = get_term_link( $term );

            if ( is_wp_error( $link ) ) {
                echo sprintf('<li>%s</li>', $term->name );
            } else {
                echo sprintf('<li><a href="%s" title="%s">%s</a></li>', $link, $term->name, $term->name );
            }
        }

        /* page not front_page */
        if(is_page() && !is_front_page()) {
            $parents = array();
            $parent_id = $post->post_parent;
            while ( $parent_id ) :
                $page = get_page( $parent_id );
                if ( $params["link_none"] )
                    $parents[]  = get_the_title( $page->ID );
                else
                    $parents[]  = '<li><a href="' . esc_url(get_permalink( $page->ID )) . '" title="' . esc_attr(get_the_title( $page->ID )) . '">' . esc_html(get_the_title( $page->ID )) . '</a></li>' . $separator;
                $parent_id  = $page->post_parent;
            endwhile;
            $parents = array_reverse( $parents );
            echo join( '', $parents );
            echo '<li>'.esc_html(get_the_title()).'</li>';
        }
        /* single */
        if(is_single()) {
            $categories_1 = get_the_category($post->ID);
            if($categories_1):
                foreach($categories_1 as $cat_1):
                    $cat_1_ids[] = $cat_1->term_id;
                endforeach;
                $cat_1_line = implode(',', $cat_1_ids);
            endif;
            if( isset( $cat_1_line ) && $cat_1_line ) {
                $categories = get_categories(array(
                    'include' => $cat_1_line,
                    'orderby' => 'id'
                ));
                if ( $categories ) :
                    foreach ( $categories as $cat ) :
                        $cats[] = '<li><a href="' . esc_url(get_category_link( $cat->term_id )) . '" title="' . esc_attr($cat->name) . '">' . esc_html($cat->name) . '</a></li>';
                    endforeach;
                    echo join( '', $cats );
                endif;
            }
            echo '<li>'.get_the_title().'</li>';
        }
        /* tag */
        if( is_tag() ){ echo '<li>'."Tag: ".single_tag_title('',FALSE).'</li>'; }
        /* search */
        if( is_search() ){ echo '<li>'.esc_html__("Search", 'kinglaw').'</li>'; }
        /* date */
        if( is_year() ){ echo '<li>'.get_the_time('Y').'</li>'; }
        /* 404 */
        if( is_404() ) {
            echo '<li>'.esc_html__("404 - Page not Found", 'kinglaw').'</li>';
        }
        /* archive */
        if( is_archive() && is_post_type_archive() ) {
            $title = post_type_archive_title( '', false );
            echo '<li>'. esc_html($title) .'</li>';
        }
        echo "</ul>";
    }
}

/**
 * Display an optional post detail.
 */
function kinglaw_post_detail(){
    ?>
    <ul class="post-details">
        <li class="detail-date"><?php echo get_the_date(); ?></li>
    </ul>
    <?php
}

function kinglaw_post_meta1(){
    ?>
    <ul>
        <li class="detail-date"><?php echo get_the_date(); ?></li>
        <?php if(has_category()): ?>
            <li class="detail-terms"><?php esc_html_e('Published in ', 'kinglaw'); ?> <?php the_terms( get_the_ID(), 'category', '', ', ' ); ?></li>
        <?php endif;   ?>
        <li class="detail-comment"><i class="fa fa-comments-o" aria-hidden="true"></i><a href="<?php the_permalink(); ?>"><?php echo comments_number(' 0','1','%'); ?></a></li>
    </ul>
    <?php
}
function kinglaw_post_meta2(){
    ?>
    <ul>
        <li class="detail-date"><?php echo get_the_date(); ?></li>
        <li class="detail-comment"><i class="fa fa-comments-o" aria-hidden="true"></i><a href="<?php the_permalink(); ?>"><?php echo comments_number(' 0','1','%'); ?></a></li>
        <li class="counter-view"><i class="fa fa-eye"></i>
            <?php if(function_exists('kinglaw_post_views')) { 
                echo kinglaw_post_views(get_the_ID()); 
            }?>
        </li>
    </ul>
    <?php
}
function kinglaw_crs_blog1(){
    ?>
    <ul>
        <li class="detail-date"><i class="fa fa-file-text-o" aria-hidden="true"></i><?php echo get_the_date(); ?></li>
        <li class="counter-view"><i class="fa fa-eye"></i>
            <?php if(function_exists('kinglaw_post_views')) { 
                echo kinglaw_post_views(get_the_ID()); 
            }?>
        </li>
        <li class="detail-comment"><i class="fa fa-comments-o" aria-hidden="true"></i><a href="<?php the_permalink(); ?>"><?php echo comments_number('No ','1','%'); ?><?php esc_html_e('Comments', 'kinglaw'); ?></a></li>
    </ul>
    <?php
}

/**
 * Display an optional post video.
 */
function kinglaw_post_video() {
    global $opt_meta_options, $wp_embed;
    /* no video. */
    if(empty($opt_meta_options['opt-video-type'])) {
        kinglaw_post_thumbnail();
        return;
    }

    if($opt_meta_options['opt-video-type'] == 'local' && !empty($opt_meta_options['otp-video-local']['id'])){

        $video = wp_get_attachment_metadata($opt_meta_options['otp-video-local']['id']);

        echo do_shortcode('[video width="'.esc_attr($opt_meta_options['otp-video-local']['width']).'" height="'.esc_attr($opt_meta_options['otp-video-local']['height']).'" '.$video['fileformat'].'="'.esc_url($opt_meta_options['otp-video-local']['url']).'" poster="'.esc_url($opt_meta_options['otp-video-thumb']['url']).'"][/video]');

    } elseif($opt_meta_options['opt-video-type'] == 'youtube' && !empty($opt_meta_options['opt-video-youtube'])) {

        echo do_shortcode($wp_embed->run_shortcode('[embed]'.esc_url($opt_meta_options['opt-video-youtube']).'[/embed]'));

    } elseif($opt_meta_options['opt-video-type'] == 'vimeo' && !empty($opt_meta_options['opt-video-vimeo'])) {

        echo do_shortcode($wp_embed->run_shortcode('[embed]'.esc_url($opt_meta_options['opt-video-vimeo']).'[/embed]'));

    }
}

/**
 * Display an optional post audio.
 */
function kinglaw_post_audio() {
    global $opt_meta_options;

    /* no audio. */
    if(empty($opt_meta_options['otp-audio']['id'])) {
        kinglaw_post_thumbnail();
        return;
    }

    $audio = wp_get_attachment_metadata($opt_meta_options['otp-audio']['id']);

    echo do_shortcode('[audio '.$audio['fileformat'].'="'.esc_url($opt_meta_options['otp-audio']['url']).'"][/audio]');
}

/**
 * Display an optional post gallery.
 */
function kinglaw_post_gallery(){
    global $opt_meta_options;

    /* no audio. */
    if(empty($opt_meta_options['opt-gallery'])) {
        kinglaw_post_thumbnail();
        return;
    }

    $array_id = explode(",", $opt_meta_options['opt-gallery']);

    ?>
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php $i = 0; ?>
            <?php foreach ($array_id as $image_id): ?>
                <?php
                $attachment_image = wp_get_attachment_image_src($image_id, 'full', false);
                if($attachment_image[0] != ''):?>
                    <div class="item <?php if( $i == 0 ){ echo 'active'; } ?>">
                        <img style="width:100%;" data-src="holder.js" src="<?php echo esc_url($attachment_image[0]);?>" alt="" />
                    </div>
                <?php $i++; endif; ?>
            <?php endforeach; ?>
        </div>
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="fa fa-angle-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="fa fa-angle-right"></span>
        </a>
    </div>
    <?php
}

/**
 * Display an optional post quote.
 */
function kinglaw_post_quote() {
    global $opt_meta_options;

    if(empty($opt_meta_options_options['opt-quote-content'])){
        kinglaw_post_thumbnail();
        return;
    }

    $opt_meta_options_options['opt-quote-title'] = !empty($opt_meta_options_options['opt-quote-title']) ? '<span>'.esc_html($opt_meta_options_options['opt-quote-title']).'</span>' : '' ;

    echo '<blockquote>'.esc_html($opt_meta_options_options['opt-quote-content']).wp_kses_post($opt_meta_options_options['opt-quote-title']).'</blockquote>';
}

/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index
 * views, or a div element when on single views.
 */

function kinglaw_post_thumbnail() {
    if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
        return;
    }
    $size = 'kinglaw_blog_630x340';

    if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
        $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false);
        $thumbnail = get_the_post_thumbnail(get_the_ID(),$size);
    else:
        $thumbnail_url[0] = get_template_directory_uri(). '/assets/images/no-image.jpg';
        $thumbnail = '<img src="'.esc_url(get_template_directory_uri(). '/assets/images/no-image.jpg').'" alt="'.get_the_title().'" />';
    endif;
    echo '<div class="post-thumbnail"><a href="'.get_the_permalink().'">'.$thumbnail.'</a></div>';
}

function kinglaw_blog3_thumbnail() {
    if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
        return;
    }
    $size = 'kinglaw_blog_680x680';

    if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
        $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false);
        $thumbnail = get_the_post_thumbnail(get_the_ID(),$size);
    else:
        $thumbnail_url[0] = get_template_directory_uri(). '/assets/images/no-image.jpg';
        $thumbnail = '<img src="'.esc_url(get_template_directory_uri(). '/assets/images/no-image.jpg').'" alt="'.get_the_title().'" />';
    endif;
    echo '<div class="post-thumbnail"><a href="'.get_the_permalink().'">'.$thumbnail.'</a></div>';
}

function kinglaw_gridblog_thumbnail() {
    if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
        return;
    }
    $size = 'kinglaw_gridblog_360x257';

    if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
        $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false);
        $thumbnail = get_the_post_thumbnail(get_the_ID(),$size);
    else:
        $thumbnail_url[0] = get_template_directory_uri(). '/assets/images/no-image.jpg';
        $thumbnail = '<img src="'.esc_url(get_template_directory_uri(). '/assets/images/no-image.jpg').'" alt="'.get_the_title().'" />';
    endif;
    echo '<div class="post-thumbnail"><a href="'.get_the_permalink().'">'.$thumbnail.'</a></div>';
}

function kinglaw_recnet_post_thumbnail() {
    if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
        return;
    }
    $size = 'kinglaw_recentblog_100x70';

    if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
        $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false);
        $thumbnail = get_the_post_thumbnail(get_the_ID(),$size);
    else:
        $thumbnail_url[0] = get_template_directory_uri(). '/assets/images/no-image.jpg';
        $thumbnail = '<img src="'.esc_url(get_template_directory_uri(). '/assets/images/no-image.jpg').'" alt="'.get_the_title().'" />';
    endif;
    echo '<div class="post-thumbnail"><a href="'.get_the_permalink().'">'.$thumbnail.'</a></div>';
}

function kinglaw_post_thumbnail_single() {
    if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
        return;
    }
    $size = 'kinglaw_blogsingle_771x487';

    if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
        $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false);
        $thumbnail = get_the_post_thumbnail(get_the_ID(),$size);
    else:
        $thumbnail_url[0] = get_template_directory_uri(). '/assets/images/no-image.jpg';
        $thumbnail = '<img src="'.esc_url(get_template_directory_uri(). '/assets/images/no-image.jpg').'" alt="'.get_the_title().'" />';
    endif;
    echo '<div class="post-thumbnail">'.$thumbnail.'</div>';
}

function kinglaw_footer_top(){
    global $opt_theme_options, $opt_meta_options;

    if(!empty($opt_meta_options['custom_footer']) && !empty($opt_meta_options['footer_logo']['url'])) {
       $opt_theme_options['footer_logo']['url'] = $opt_meta_options['footer_logo']['url'];
    }

    /* Footer Top */
    if(empty($opt_theme_options['footer-top-column']))
        return;

    $_class = "";

    switch ($opt_theme_options['footer-top-column']){
        case '2':
            $_class = 'col-lg-6 col-md-6 col-sm-6 col-xs-12';
            break;
        case '3':
            $_class = 'col-lg-4 col-md-4 col-sm-4 col-xs-12';
            break;
        case '4':
            $_class = 'col-lg-3 col-md-3 col-sm-6 col-xs-12';
            break;
        case '6':
            $_class = 'col-lg-2 col-md-2 col-sm-6 col-xs-12';
            break;
    }

    for($i = 1 ; $i <= $opt_theme_options['footer-top-column'] ; $i++){
        if ( is_active_sidebar( 'sidebar-footer-top-' . $i ) ){
            echo '<div class="cms-footer-top-item text-center-xs text-center-sm ' . esc_html($_class) . '">';
                dynamic_sidebar( 'sidebar-footer-top-' . $i );
            echo "</div>";
        }
    }
}


/**
 * Footer - Back To Top
**/
function kinglaw_back_to_top() {
    global $opt_theme_options;
    if (isset($opt_theme_options['footer_button_back_to_top']) && $opt_theme_options['footer_button_back_to_top']) { ?>
        <div id="back_to_top" class="back_to_top"><span class="go_up"><i class="fa fa-angle-up"></i></span></div>
    <?php }
}


/**
 * List socials share for post.
 * 
 * 
 */
function kinglaw_get_socials_share(){
    ?>
    <li><a data-toggle="tooltip" data-placement="top" title="Facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>"><i class="fa fa-facebook"></i></a></li>
    <li><a data-toggle="tooltip" data-placement="top" title="Google Plus" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink();?>"><i class="fa fa-google-plus"></i></a></li>
    <li><a data-toggle="tooltip" data-placement="top" title ="Pinterest" target="_blank" href="https://pinterest.com/pin/create/button/??u=<?php the_permalink();?>"><i class="fa fa-pinterest"></i></a>   </li>
    <?php
}



/*
 * Top Social
 * 
 */
function kinglaw_top_social() {

    global $opt_theme_options;

    $cms_top_social = $opt_theme_options['top_bar_social']['enabled'];
    ?>
    <ul class="social-meta social-top">
        <?php
            if ($cms_top_social): foreach ($cms_top_social as $key=>$value) {
                switch($key) {
             
                    case 'facebook': echo '<li><a href="'.esc_url($opt_theme_options['social_facebook_url']).'"><i class="fa fa-facebook"></i></a></li>';
                    break;
             
                    case 'twitter': echo '<li><a href="'.esc_url($opt_theme_options['social_twitter_url']).'"><i class="fa fa-twitter"></i></a></li>';
                    break;

                    case 'email': echo '<li><a href="'.esc_url($opt_theme_options['social_email_url']).'"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>';
                    break;
             
                    case 'linkedin': echo '<li><a href="'.esc_url($opt_theme_options['social_inkedin_url']).'"><i class="fa fa-linkedin"></i></a></li>';
                    break;
             
                    case 'rss': echo '<li><a href="'.esc_url($opt_theme_options['social_rss_url']).'"><i class="fa fa-rss"></i></a></li>';    
                    break;  
                    
                    case 'instagram': echo '<li><a href="'.esc_url($opt_theme_options['social_instagram_url']).'"><i class="fa fa-instagram"></i></a></li>';    
                    break;

                    case 'google': echo '<li><a href="'.esc_url($opt_theme_options['social_google_url']).'"><i class="fa fa-google-plus"></i></a></li>';    
                    break;

                    case 'skype': echo '<li><a href="'.esc_url($opt_theme_options['social_skype_url']).'"><i class="fa fa-skype"></i></a></li>';    
                    break;

                    case 'pinterest': echo '<li><a href="'.esc_url($opt_theme_options['social_pinterest_url']).'"><i class="fa fa-pinterest"></i></a></li>';    
                    break;

                    case 'vimeo': echo '<li><a href="'.esc_url($opt_theme_options['social_vimeo_url']).'"><i class="fa fa-vimeo"></i></a></li>';    
                    break;

                    case 'youtube': echo '<li><a href="'.esc_url($opt_theme_options['social_youtube_url']).'"><i class="fa fa-youtube"></i></a></li>';    
                    break;

                    case 'yelp': echo '<li><a href="'.esc_url($opt_theme_options['social_yelp_url']).'"><i class="fa fa-yelp"></i></a></li>';    
                    break;

                    case 'tumblr': echo '<li><a href="'.esc_url($opt_theme_options['social_tumblr_url']).'"><i class="fa fa-tumblr"></i></a></li>';    
                    break;

                }
            }
            endif;
        ?>
    </ul>
    <?php 
}

/*
 * Footer Social
 * 
 */
function kinglaw_footer_social() {

    global $opt_theme_options;

    $cms_top_social = $opt_theme_options['footer_social']['enabled'];
    ?>
    <ul class="social-meta social-footer-bottom">
        <?php
            if ($cms_top_social): foreach ($cms_top_social as $key=>$value) {
                switch($key) {
             
                    case 'facebook': echo '<li><a href="'.esc_url($opt_theme_options['social_facebook_url']).'">'.esc_html__('Facebook', 'kinglaw').'</a></li>';
                    break;
             
                    case 'twitter': echo '<li><a href="'.esc_url($opt_theme_options['social_twitter_url']).'">'.esc_html__('Twitter', 'kinglaw').'</a></li>';
                    break;
             
                    case 'linkedin': echo '<li><a href="'.esc_url($opt_theme_options['social_inkedin_url']).'">'.esc_html__('Linkedin', 'kinglaw').'</a></li>';
                    break;
             
                    case 'rss': echo '<li><a href="'.esc_url($opt_theme_options['social_rss_url']).'">'.esc_html__('Rss', 'kinglaw').'</a></li>';    
                    break;  
                    
                    case 'instagram': echo '<li><a href="'.esc_url($opt_theme_options['social_instagram_url']).'">'.esc_html__('Instagram', 'kinglaw').'</a></li>';    
                    break;

                    case 'google': echo '<li><a href="'.esc_url($opt_theme_options['social_google_url']).'">'.esc_html__('Google', 'kinglaw').'</a></li>';    
                    break;

                    case 'skype': echo '<li><a href="'.esc_url($opt_theme_options['social_skype_url']).'">'.esc_html__('Skype', 'kinglaw').'</a></li>';    
                    break;

                    case 'pinterest': echo '<li><a href="'.esc_url($opt_theme_options['social_pinterest_url']).'">'.esc_html__('Pinterest', 'kinglaw').'</a></li>';    
                    break;

                    case 'vimeo': echo '<li><a href="'.esc_url($opt_theme_options['social_vimeo_url']).'">'.esc_html__('Vimeo', 'kinglaw').'</a></li>';    
                    break;

                    case 'youtube': echo '<li><a href="'.esc_url($opt_theme_options['social_youtube_url']).'">'.esc_html__('Youtube', 'kinglaw').'</a></li>';    
                    break;

                    case 'yelp': echo '<li><a href="'.esc_url($opt_theme_options['social_yelp_url']).'">'.esc_html__('Yelp', 'kinglaw').'</a></li>';    
                    break;

                    case 'tumblr': echo '<li><a href="'.esc_url($opt_theme_options['social_tumblr_url']).'">'.esc_html__('Tumblr', 'kinglaw').'</a></li>';    
                    break;

                }
            }
            endif;
        ?>
    </ul>
    <?php 
}

/*
 * Teams Social
 * 
 */
function kinglaw_attorney_social() {

    global $opt_meta_options;

    $cms_attorney_social = $opt_meta_options['attorney_social']['enabled'];
    ?>
    <ul class="social-meta social-team-bottom">
        <?php
            if ($cms_attorney_social): foreach ($cms_attorney_social as $key=>$value) {
                switch($key) {
             
                    case 'facebook': echo '<li><a href="'.esc_url($opt_meta_options['social_facebook_url']).'"><i class="fa fa-facebook"></i></a></li>';
                    break;
             
                    case 'twitter': echo '<li><a href="'.esc_url($opt_meta_options['social_twitter_url']).'"><i class="fa fa-twitter"></i></a></li>';
                    break;

                    case 'email': echo '<li><a href="'.esc_url($opt_meta_options['social_email_url']).'"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>';
                    break;
             
                    case 'linkedin': echo '<li><a href="'.esc_url($opt_meta_options['social_inkedin_url']).'"><i class="fa fa-linkedin"></i></a></li>';
                    break;
             
                    case 'rss': echo '<li><a href="'.esc_url($opt_meta_options['social_rss_url']).'"><i class="fa fa-rss"></i></a></li>';    
                    break;  
                    
                    case 'instagram': echo '<li><a href="'.esc_url($opt_meta_options['social_instagram_url']).'"><i class="fa fa-instagram"></i></a></li>';    
                    break;

                    case 'google': echo '<li><a href="'.esc_url($opt_meta_options['social_google_url']).'"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>';    
                    break;

                    case 'skype': echo '<li><a href="'.esc_url($opt_meta_options['social_skype_url']).'"><i class="fa fa-skype"></i></a></li>';    
                    break;

                    case 'pinterest': echo '<li><a href="'.esc_url($opt_meta_options['social_pinterest_url']).'"><i class="fa fa-pinterest"></i></a></li>';    
                    break;

                    case 'vimeo': echo '<li><a href="'.esc_url($opt_meta_options['social_vimeo_url']).'"><i class="fa fa-vimeo"></i></a></li>';    
                    break;

                    case 'youtube': echo '<li><a href="'.esc_url($opt_meta_options['social_youtube_url']).'"><i class="fa fa-youtube"></i></a></li>';    
                    break;

                    case 'yelp': echo '<li><a href="'.esc_url($opt_meta_options['social_yelp_url']).'"><i class="fa fa-yelp"></i></a></li>';    
                    break;

                    case 'tumblr': echo '<li><a href="'.esc_url($opt_meta_options['social_tumblr_url']).'"><i class="fa fa-tumblr"></i></a></li>';    
                    break;

                }
            }
            endif;
        ?>
    </ul>
    <?php 
}

/* Page Layout */

function kinglaw_page_sidebar(){
    global $opt_meta_options;

    $_sidebar = 'no-sidebar';

    if(isset($opt_meta_options['page_sidebar']))
        $_sidebar = $opt_meta_options['page_sidebar'];

    return 'is-' . esc_attr($_sidebar);
}

function kinglaw_page_class(){
    global $opt_meta_options;

    $_class = "col-md-12";

    if(isset($opt_meta_options['page_sidebar']) && $opt_meta_options['page_sidebar'] == 'left-sidebar' || isset($opt_meta_options['page_sidebar']) && $opt_meta_options['page_sidebar'] == 'right-sidebar')
        $_class = "col-xs-12 col-sm-8 col-md-8 col-lg-8";

    echo esc_attr($_class);
}

/* Blog Layout */
function kinglaw_blog_sidebar(){
    global $opt_theme_options, $opt_meta_options;

    $_sidebar = 'right-sidebar';

    if(is_page() && !empty($opt_meta_options['enable_sidebar'])) {
        $opt_theme_options['blog_sidebar'] = $opt_meta_options['page_sidebar'];
    }

    if(isset($opt_theme_options['blog_sidebar']))
        $_sidebar = $opt_theme_options['blog_sidebar'];

    return 'is-' . esc_attr($_sidebar);
}

function kinglaw_blog_class(){
    global $opt_theme_options;

    $_class = "col-xs-12 col-sm-8 col-md-8 col-lg-8";

    if(is_page() && !empty($opt_meta_options['enable_sidebar'])) {
        $opt_theme_options['blog_sidebar'] = $opt_meta_options['page_sidebar'];
    }

    if(isset($opt_theme_options['blog_sidebar']) && $opt_theme_options['blog_sidebar'] == 'no-sidebar')
        $_class = "col-md-12 content-full-width";

    echo esc_attr($_class);
}
function kinglaw_single_post_sidebar(){
    global $opt_theme_options, $opt_meta_options;

    $_sidebar = 'right-sidebar';

    if(!empty($opt_meta_options['single_sidebar'])) {
        $opt_theme_options['single_sidebar'] = $opt_meta_options['single_sidebar'];
    }

    if(isset($opt_theme_options['single_sidebar']))
        $_sidebar = $opt_theme_options['single_sidebar'];

    return 'is-' . esc_attr($_sidebar);
}
function kinglaw_single_post_class(){
    global $opt_theme_options, $opt_meta_options;

    $_class = "col-xs-12 col-sm-8 col-md-8 col-lg-8";

    if(!empty($opt_meta_options['single_sidebar'])) {
        $opt_theme_options['single_sidebar'] = $opt_meta_options['single_sidebar'];
    }

    if(isset($opt_theme_options['single_sidebar']) && $opt_theme_options['single_sidebar'] == 'no-sidebar')
        $_class = "col-md-12 content-full-width";

    echo esc_attr($_class);
}

function kinglaw_single_service_sidebar(){
    global $opt_theme_options, $opt_meta_options;
    $_sidebar = 'right-sidebar';
    if(!empty($opt_meta_options['single_service_sidebar'])) {
        $opt_theme_options['single_service_sidebar'] = $opt_meta_options['single_service_sidebar'];
    }

    if(isset($opt_theme_options['single_service_sidebar']))
        $_sidebar = $opt_theme_options['single_service_sidebar'];
    return 'is-' . esc_attr($_sidebar);
}
function kinglaw_single_service_class(){
    global $opt_theme_options, $opt_meta_options;

    $_class = "col-xs-12 col-sm-8 col-md-8 col-lg-8";

    if(!empty($opt_meta_options['single_service_sidebar'])) {
        $opt_theme_options['single_service_sidebar'] = $opt_meta_options['single_service_sidebar'];
    }

    if(isset($opt_theme_options['single_service_sidebar']) && $opt_theme_options['single_service_sidebar'] == 'no-sidebar')
        $_class = "col-md-12 content-full-width";

    echo esc_attr($_class);
}

function kinglaw_post_comment() {
    global $opt_theme_options;
    if(class_exists('EF3_Framework')) {
        if(isset($opt_theme_options['post_comment']) && $opt_theme_options['post_comment'] == 'show') {
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
        }
    } else {
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
    }
}

/* Social User */
function kinglaw_get_user_social() {

    $user_facebook = get_user_meta(get_the_author_meta( 'ID' ), 'user_facebook', true);
    $user_twitter = get_user_meta(get_the_author_meta( 'ID' ), 'user_twitter', true);
    $user_linkedin = get_user_meta(get_the_author_meta( 'ID' ), 'user_linkedin', true);
    $user_skype = get_user_meta(get_the_author_meta( 'ID' ), 'user_skype', true);
    $user_google = get_user_meta(get_the_author_meta( 'ID' ), 'user_google', true);
    $user_youtube = get_user_meta(get_the_author_meta( 'ID' ), 'user_youtube', true);
    $user_vimeo = get_user_meta(get_the_author_meta( 'ID' ), 'user_vimeo', true);
    $user_tumblr = get_user_meta(get_the_author_meta( 'ID' ), 'user_tumblr', true);
    $user_rss = get_user_meta(get_the_author_meta( 'ID' ), 'user_rss', true);
    $user_pinterest = get_user_meta(get_the_author_meta( 'ID' ), 'user_pinterest', true);
    $user_instagram = get_user_meta(get_the_author_meta( 'ID' ), 'user_instagram', true);
    $user_yelp = get_user_meta(get_the_author_meta( 'ID' ), 'user_yelp', true);

    ?>
    <ul class="user-social">
        <?php if(!empty($user_facebook)) { ?>
            <li><a href="<?php echo esc_url($user_facebook); ?>"><i class="fa fa-facebook"></i></a></li>
       <?php } ?>
        <?php if(!empty($user_twitter)) { ?>
            <li><a href="<?php echo esc_url($user_twitter); ?>"><i class="fa fa-twitter"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_linkedin)) { ?>
            <li><a href="<?php echo esc_url($user_linkedin); ?>"><i class="fa fa-linkedin"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_rss)) { ?>
            <li><a href="<?php echo esc_url($user_rss); ?>"><i class="fa fa-rss"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_instagram)) { ?>
            <li><a href="<?php echo esc_url($user_instagram); ?>"><i class="fa fa-instagram"></i></a></li> 
        <?php } ?>
        <?php if(!empty($user_google)) { ?>
            <li><a href="<?php echo esc_url($user_google); ?>"><i class="fa fa-google-plus"></i></a></li>  
        <?php } ?>
        <?php if(!empty($user_skype)) { ?> 
            <li><a href="<?php echo esc_url($user_skype); ?>"><i class="fa fa-skype"></i></a></li>   
        <?php } ?>
        <?php if(!empty($user_pinterest)) { ?>
            <li><a href="<?php echo esc_url($user_pinterest); ?>"><i class="fa fa-pinterest"></i></a></li>  
        <?php } ?>
        <?php if(!empty($user_vimeo)) { ?> 
            <li><a href="<?php echo esc_url($user_vimeo); ?>"><i class="fa fa-vimeo"></i></a></li>  
        <?php } ?>
        <?php if(!empty($user_youtube)) { ?>
            <li><a href="<?php echo esc_url($user_youtube); ?>"><i class="fa fa-youtube"></i></a></li> 
        <?php } ?> 
        <?php if(!empty($user_yelp)) { ?> 
            <li><a href="<?php echo esc_url($user_yelp); ?>"><i class="fa fa-yelp"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_tumblr)) { ?>
            <li><a href="<?php echo esc_url($user_tumblr); ?>"><i class="fa fa-tumblr"></i></a></li>  
        <?php } ?>

    </ul> <?php  
}

/* Related Post */
function kinglaw_related_post() {
    global $post;
    $current_id = $post->ID;
    $posttags = get_the_category($post->ID);
    
    if(empty($posttags)) return ;
    
    $tags = array();
    
    foreach ($posttags as $tag) {
        
        $tags[] = $tag->term_id;
    }
    
    $query = new WP_Query(array('posts_per_page'=> 3, 'post_type' => 'post', 'post_status'=> 'publish', 'category__in'=>$tags));
    
    if(count($query->posts) > 1){
        ?> 
        <div class="cms-related-post clearfix"> 
            <h3 class="wg-title">
                <?php esc_html_e('Related Posts', 'kinglaw'); ?>
            </h3>
           <div class="cms-grid-wraper cms-grid-blog1 cms-related-post-inner row">
        <?php
        while ($query->have_posts()): $query->the_post();
        $thumbnail = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'kinglaw_gridblog_680x496') ); 
        if ($post->ID !== $current_id) :
        ?>
            <div class="item cms-grid-item <?php echo has_post_thumbnail() ? ' has-feature-img' : ' no-feature-img' ; ?> col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="entry-blog-grid item-inner">
                    <header class="entry-header">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo ''.$thumbnail.''; ?>">
                        </a>
                    </header>
                    <div class="entry-body">
                        <div class="entry-meta entry-meta-style2">
                            <?php kinglaw_post_meta2(); ?>
                        </div>
                        <h3 class="entry-title"><a href="<?php the_permalink(); ?>">
                            <?php echo wp_trim_words(strip_tags(strip_shortcodes(get_the_title())),4); ?>
                        </a></h3>
                        <div class="entry-excerpt">
                            <?php echo wp_trim_words(strip_tags(strip_shortcodes(get_the_content())),30); ?>
                        </div>
                        <a class="read-more read-more-style2" href="<?php the_permalink(); ?>">
                            <?php esc_html_e('Read more', 'kinglaw') ?>
                        </a>
                    </div>
                </div>
            </div>
        <?php
        endif;
        endwhile;
        ?> </div></div> <?php
    }
    
    wp_reset_postdata();
}

/**
 * Main Menu Popup.
 */
function kinglaw_menu_popup(){
    global $opt_theme_options; ?>

    <div class="cms-menu-popup-wrap">
        <span class="cms-modal-close lnr lnr-cross"></span>
        <div class="cms-menu-popup-inner">
            <?php 
                if(is_page() && !empty($opt_meta_options['custom_header'])) {
                    $opt_theme_options['header_layout'] = $opt_meta_options['header_layout'];
                }
                if ($opt_theme_options['header_layout'] == '4' || $opt_theme_options['header_layout'] == '5') {
                    $attr = array(
                        'menu_class' => 'nav-menu menu-main-menu menu-accordion',
                        'theme_location' => 'pr_menu_popup'
                    );

                    /* enable mega menu. */
                    if(class_exists('HeroMenuWalker')){ $attr['walker'] = new HeroMenuWalker(); }

                    /* main nav. */
                    wp_nav_menu( $attr );
                } 
            ?>
        </div>
        <?php kinglaw_top_social(); ?>
    </div> <?php 
}

/**
 * Main Menu Sidebar.
 */
function kinglaw_menu_sidebar() {

     $attr = array(
        'menu_class' => 'nav-menu menu-main-menu menu-accordion',
        'theme_location' => 'pr_menu_sidebar'
    );

    /* enable mega menu. */
    if(class_exists('HeroMenuWalker')){ $attr['walker'] = new HeroMenuWalker(); }

    /* main nav. */
    wp_nav_menu( $attr );
}

/* Portfolio Layout */

function kinglaw_search_popup() { 
    global $opt_theme_options;
    
    if(class_exists('EF3_Framework')) {
        if ($opt_theme_options['show_search_icon']) { ?>
            <div class="cms-search-wrap">
                <span class="cms-modal-close lnr lnr-cross"></span>
                <div class="cshero-search-inner">
                    <div class="widget-search-footer">
                        <?php get_search_form (); ?>
                    </div>   
                </div>                    
            </div>
        <?php }
    }
}

/**
 * Loading.
 * 
 * 
 */
function kinglaw_get_page_loading() {
    global $opt_theme_options;
    if($opt_theme_options['page_loadding'] == '1'){
        echo '<div id="cms-loadding"><div class="cms-loader"></div></div>';
    }
}

/**
 * Login + Register
 * 
 * @author Zack
 */
function kinglaw_login_register() {
    global $opt_theme_options, $opt_meta_options;

    if(class_exists('EF3_Framework')) {
        if(function_exists('up_get_template_part')) { ?>
            <div class="cms-login-wrap cms-popup">
                <div class="cms-form-login">
                    <div class="cms-modal-dialog dialog-popup" role="document">
                        <div class="cms-modal-content">
                            <div class="cms-modal-close"><i class="fa fa-close"></i></div>
                            <div class="cms-modal-header">
                                <div class="cms-modal-header-inner">
                                    <div class="cms-heading-wrapper">
                                        <h3 class="cms-heading-title text-capitalize"><?php esc_html_e('Sign In', 'kinglaw'); ?></h3>
                                        <div class="cms-heading-line"></div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="cms-modal-body modal-body">
                                <?php  echo do_shortcode('[user-press layout="" form_type="login" is_logged="profile"]'); ?>
                            </div>
                        </div>
                        <div class="cms-modal-footer more-sign-up">
                            <span class="form-sign-up"><?php esc_html_e('Don’t have an account, ', 'kinglaw');?></span>
                            <a href="javascript:void(0)" class="switch_to_sign_up"> <?php esc_html_e('Sign Up Here', 'kinglaw');?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cms-register-wrap cms-popup">
                <div class="cms-form-register">
                    <div class="cms-modal-dialog dialog-popup" role="document">
                        <div class="cms-modal-content">
                            <div class="cms-modal-close"><i class="fa fa-close"></i></div>
                            <div class="cms-modal-header">
                                <div class="cms-modal-header-inner">
                                    <div class="cms-heading-wrapper">
                                        <h3 class="cms-heading-title text-capitalize"><?php esc_html_e('Sign Up', 'kinglaw'); ?></h3>
                                        <div class="cms-heading-line"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="cms-modal-body modal-body">
                                <?php up_get_template_part('default/form', 'register'); ?>
                            </div>
                        </div>
                        <div class="cms-modal-footer more-sign-in">
                            <span class="form-sign-in"><?php esc_html_e('have an account, ', 'kinglaw');?></span>
                            <a href="javascript:void(0)" class="switch_to_login"> <?php esc_html_e('Sign In Here', 'kinglaw');?></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
    }
}
