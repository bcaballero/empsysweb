<?php
/**
 * Theme Framework functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
*
 */

// Set up the content width value based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 625;
	
/**
 * CMS Theme setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * CMS Theme supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * 
 */
function kinglaw_setup() {

	// load language.
	load_theme_textdomain( 'kinglaw' , get_template_directory() . '/languages' );

	// Adds title tag
	add_theme_support( "title-tag" );

	// Add woocommerce
	add_theme_support('woocommerce');

	// Adds custom header
	add_theme_support( 'custom-header' );
	
	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'video', 'audio' , 'gallery', 'quote') );


	register_nav_menu( 'primary', esc_html__( 'Primary Menu', 'kinglaw' ) );
	/*
	 * This theme supports custom background color and image,
	 * and here we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array('default-color' => 'e6e6e6',) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.

	add_theme_support( 'post-thumbnails' );
	add_image_size('kinglaw_blog_630x340', 630, 340, true);
	add_image_size('kinglaw_singlepost_630x340', 630, 340, true);
	add_image_size('kinglaw_blogsingle_771x487', 771, 487, true);
	add_image_size('kinglaw_gridblog_680x496', 680, 496, true);
	add_image_size('kinglaw_gridblog_360x257', 360, 257, true);
	add_image_size('kinglaw_blog_680x680', 680, 680, true);
	add_image_size('kinglaw_recentblog_100x70', 100, 70, true);
	add_image_size('kinglaw_attorney_480x612', 480, 612, true);
	add_image_size('kinglaw_gallery_680x658', 680, 658, true);
	add_image_size('kinglaw_client_262x92', 292, 92, true);
	set_post_thumbnail_size( 624, 9999 );
	
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
}

add_action( 'after_setup_theme', 'kinglaw_setup' );

/**
 * Custom params & remove VC Elements.
 * 
 * 
 */
function kinglaw_page_menu_args( $args ) {
    if ( ! isset( $args['show_home'] ) )
        $args['show_home'] = true;
    return $args;
}
add_filter( 'wp_page_menu_args', 'kinglaw_page_menu_args' );


function kinglaw_vc_after_init(){
    require_once ( get_template_directory() . '/vc_params/vc_custom_heading.php' );
    require_once ( get_template_directory() . '/vc_params/cms_custom_pagram_vc.php' );
    vc_remove_element( "vc_button" );
    vc_remove_element( "vc_button2" );
    vc_remove_element( "vc_cta_button" );
    vc_remove_element( "vc_cta_button2" );
    vc_remove_element( "vc_cta" );
    vc_remove_element( "cms_fancybox" );
    vc_remove_element( "cms_counter" );
}
add_action('vc_after_init', 'kinglaw_vc_after_init');

/* Include CMS Shortcode */
function kinglaw_shortcodes_list(){
	$kinglaw_shortcodes_list = array(
		'cms_carousel',
		'cms_grid',
		'cms_fancybox_single',
		'cms_counter_single',
		'cms_progressbar',
		);

	return $kinglaw_shortcodes_list;
}

function kinglaw_get_post_meta($post_id = 0){
	global $post;
	if(!$post_id) $post_id = $post->ID;

	$_post_meta = maybe_unserialize(get_post_meta($post_id, 'opt_meta_options', true));

	if($_post_meta) return $_post_meta;

	return null;
}

/**
 * Add new elements for VC
 * 
 * 
 */

function kinglaw_vc_elements(){
    
    if(class_exists('CmsShortCode')) {
    	add_filter('cms-shorcode-list', 'kinglaw_shortcodes_list');
	    require_once( get_template_directory() . '/inc/elements/button/cms_button.php' );
	    require_once( get_template_directory() . '/inc/elements/googlemap/cms_googlemap.php' );
	    require_once( get_template_directory() . '/inc/elements/heading/cms_heading.php' );
	    require_once( get_template_directory() . '/inc/elements/cta/cms_cta.php' );
	    require_once( get_template_directory() . '/inc/elements/countdown/cms_countdown.php' );
	    require_once( get_template_directory() . '/inc/elements/dropcap/cms_dropcap.php' );
	    require_once( get_template_directory() . '/inc/elements/process/cms_process.php' );
	    require_once( get_template_directory() . '/inc/elements/boximage/cms_boximage.php' );
	    require_once( get_template_directory() . '/inc/elements/list/cms_list.php' );
	    require_once( get_template_directory() . '/inc/elements/mediadropcap/cms_mediadropcap.php' );
	}
}
add_action('vc_before_init', 'kinglaw_vc_elements');


/**
 * Add custom class in Row Visual Composer
 */
function kinglaw_vc_shortcode_css_class( $classes, $settings_base, $atts )
{
    $classes_arr = explode( ' ', $classes );

    if ( 'vc_row' == $settings_base ) {
        if ( $atts['el_class_row'] ) {
            $classes_arr[] = $atts['el_class_row'];
        }
    }

    if ( 'vc_column' == $settings_base ) {
        if ( $atts['el_class_col'] ) {
            $classes_arr[] = $atts['el_class_col'];
        }
    }

    return implode( ' ', $classes_arr );
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
	add_filter( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'kinglaw_vc_shortcode_css_class', 10, 3 );
}

/* Add widgets */
require_once( get_template_directory() . '/inc/widgets/social.php' );
require_once( get_template_directory() . '/inc/widgets/social-service.php' );
require_once( get_template_directory() . '/inc/widgets/recent-posts.php' );
require_once( get_template_directory() . '/inc/widgets/recent-posts2.php' );
require_once( get_template_directory() . '/inc/widgets/recent-service.php' );
require_once( get_template_directory() . '/inc/post_favorite/post_favorite.php' );

/* Add Custom Editor VC */
require( get_template_directory() . '/inc/tinymce/tinymce.php' );

/**
 * Enqueue scripts and styles for front-end.
 * 
 * @since CMS SuperHeroes 1.0
 */
function kinglaw_front_end_scripts() {

	/*------------------------------------- JavaScript ---------------------------------------*/
	
	/** --------------------------libs--------------------------------- */
	
	/* Adds JavaScript Bootstrap. */
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '3.3.2');

	/* Adds Magnific Popup. */
	wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array(), '1.0.0');

	/* Add main.js */
	wp_enqueue_script('kinglaw-main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true);
	
	/* Add menu.js */
	wp_enqueue_script('kinglaw-menu', get_template_directory_uri() . '/assets/js/menu.js', array(), '1.0.0', true);
    
	/* Comment */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Add Same Height */
    wp_enqueue_script('matchHeight', get_template_directory_uri() . '/assets/js/jquery.matchHeight-min.js', array( 'jquery' ), '1.0.0', true);

    /* Slick */
	wp_register_style('cms-slick-css', get_template_directory_uri() . '/assets/css/slick.css', array(), '1.0.1');
	wp_register_script('cms-slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array( 'jquery' ), '1.0.0', true);

	/* Style Scroll */
    wp_enqueue_script('scroll-bar', get_template_directory_uri() . '/assets/js/enscroll.js', array( 'jquery' ), '1.0.0', true);

    /* animation column */
    wp_enqueue_script('animation-column', get_template_directory_uri() . '/assets/js/animation-column.js', array( 'jquery' ), '1.0.0', true);
    
    /*pie chart*/
	wp_enqueue_script('progressCircle', get_template_directory_uri() . '/assets/js/process_cycle.js', array( 'jquery' ), '1.0.0', true);
	wp_enqueue_script('vc_pie_custom', get_template_directory_uri() . '/assets/js/vc_pie_custom.js', array( 'jquery' ), '1.0.0', true);
	
	/** ----------------------------------------------------------------------------------- */
	
	/* Loads Bootstrap stylesheet. */
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '3.3.2');
	
	/* Loads Bootstrap stylesheet. */
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.3.0');

	/* Loads fonts stylesheet. */
	wp_enqueue_style('kinglaw-fonts', get_template_directory_uri() . '/assets/css/fonts.css');

	/* Loads Magnific Popup stylesheet. */
	wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), '1.0.0');

	/* Font Material Icon */
	wp_enqueue_style('font-material-icon', get_template_directory_uri() . '/assets/css/material-design-iconic-font.min.css', array(), '4.3.0');
	
	/* Loads our main stylesheet. */
	wp_enqueue_style( 'kinglaw-style', get_stylesheet_uri(), array( 'bootstrap' ));

	/* Loads the Internet Explorer specific stylesheet. */
	wp_enqueue_style( 'kinglaw-ie', get_template_directory_uri() . '/assets/css/ie.css', array( 'kinglaw-style' ), '2.0' );
	
	/* ie */
	wp_style_add_data( 'kinglaw-ie', 'conditional', 'lt IE 9' );

	/* Loads Pe Icon. */
	wp_enqueue_style('kinglaw-pe-icon', get_template_directory_uri() . '/assets/css/pe-icon-7-stroke.css', array(), '1.0.1');
	
	/* Load static css*/
	wp_enqueue_style('kinglaw-static', get_template_directory_uri() . '/assets/css/static.css', array( 'kinglaw-style' ), '1.0.0');

	/* Load static css*/
	wp_enqueue_style('kinglaw-hover', get_template_directory_uri() . '/assets/css/imagehover.min.css', array( 'kinglaw-style' ));

	/* Loads animations stylesheet. */
	wp_enqueue_style('animations', get_template_directory_uri() . '/assets/css/animations.css');

}

add_action( 'wp_enqueue_scripts', 'kinglaw_front_end_scripts' );

/**
 * load admin scripts.
 * 
 * 
 */
function kinglaw_admin_scripts(){

	/* Loads Bootstrap stylesheet. */
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.3.0');

	$screen = get_current_screen();

	/* load js for edit post. */
	if($screen->post_type == 'post'){
		/* post format select. */
		wp_enqueue_script('post-format', get_template_directory_uri() . '/assets/js/post-format.js', array(), '1.0.0', true);
	}
}

add_action( 'admin_enqueue_scripts', 'kinglaw_admin_scripts' );

/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since Fox
 */
function kinglaw_widgets_init() {

	global $opt_theme_options;

    register_sidebar(array(
        'name' => 'Topbar Menu',
        'id' => 'topbar-menu',
        'before_widget' => '<aside id="%1$s" class="widget nav-topbar %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<span class="wg-title title-hiddent">',
		'after_title' => '</span>',
    ));
	register_sidebar( array(
		'name' => esc_html__( 'Main Sidebar', 'kinglaw' ),
		'id' => 'main-sidebar',
		'description' => esc_html__( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'kinglaw' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );

    register_sidebar(array(
        'name' => 'Services Sidebar',
        'id' => 'service-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => 'Newsletter',
        'id' => 'newsletter-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => 'Social Homepage',
        'id' => 'social-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
    ));
	/* Footer Top */
	if(!empty($opt_theme_options['footer-top-column'])) {

		for($i = 1 ; $i <= $opt_theme_options['footer-top-column'] ; $i++){
			register_sidebar(array(
				'name' => sprintf(esc_html__('Footer Top - Column %s', 'kinglaw'), $i),
				'id' => 'sidebar-footer-top-' . $i,
				'description' => esc_html__('Appears on posts and pages except the optional Front Page template, which has its own widgets', 'kinglaw'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget' => '</aside>',
				'before_title' => '<h3 class="wg-title">',
				'after_title' => '</h3>',
			));
		}
	}

	register_sidebar( array(
		'name' => esc_html__( 'Footer Social', 'kinglaw' ),
		'description' => esc_html__( 'Apply Footer layout 5.', 'kinglaw' ),
		'id' => 'footer-fixed',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );

}
add_action( 'widgets_init', 'kinglaw_widgets_init' );

/**
 * Display navigation to next/previous comments when applicable.
 *
 * 
 */
function kinglaw_comment_nav() {
    // Are there comments to navigate through?
    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
    ?>
	<nav class="navigation comment-navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'kinglaw' ); ?></h2>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'kinglaw' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'kinglaw' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}

/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * 
 */
function kinglaw_paging_nav() {
    // Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	// Set up paginated links.
	$links = paginate_links( array(
			'base'     => $pagenum_link,
			'total'    => $GLOBALS['wp_query']->max_num_pages,
			'current'  => $paged,
			'mid_size' => 1,
			'add_args' => array_map( 'urlencode', $query_args ),
			'prev_text' => '<i class="fa fa-angle-left"></i>',
			'next_text' => '<i class="fa fa-angle-right"></i>',
	) );

	if ( $links ) :

	?>
	<nav class="navigation cms-paging-navigation clearfix">
			<div class="pagination loop-pagination">
				<?php echo wp_kses_post($links); ?>
			</div><!-- .pagination -->
	</nav><!-- .navigation -->
	<?php
	endif;
}

/**
* Display navigation to next/previous post when applicable.
*
* 
*/
function kinglaw_post_nav() {
    global $post;
    // Don't print empty markup if there's nowhere to navigate.
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous )
        return;
    ?>
    <?php
    $next_post = get_next_post();
    $previous_post = get_previous_post();
    if( !empty($next_post) )
    {
    ?>
	<nav class="navigation post-navigation">
		<div class="nav-links row clearfix">
			<div class="nav-link-prev col-sm-6 col-xs-12 text-left">
				<?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { ?>
					<a href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>">
						<?php 
							$url_prev = wp_get_attachment_url( get_post_thumbnail_id($previous_post->ID, 'medium') );
						?>
						<span class="nav-image" style="background-image: url(<?php echo esc_url($url_prev); ?>);"></span>
						<div class="nav-inner">
				  			<span><?php esc_html_e('Previous Post', 'kinglaw') ?></span>
					  		<h3><?php echo get_the_title( $previous_post->ID ); ?></h3>
					  	</div>
				  	</a>
				<?php } ?>
			</div>
			<div class="nav-link-next col-sm-6 col-xs-12 text-right">
				<?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') { ?>
					<a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">
						<?php 
							$url_next = wp_get_attachment_url( get_post_thumbnail_id($next_post->ID), 'medium'); 
						?>
						<span class="nav-image" style="background-image: url(<?php echo esc_url($url_next); ?>);"></span>
						<div class="nav-inner">
				  			<span><?php esc_html_e('Next Post', 'kinglaw') ?></span>
					  		<h3><?php echo get_the_title( $next_post->ID ); ?></h3>
					  	</div>
				  	</a>
				<?php } ?>
			</div>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
    }
}

/* Add Custom Comment */
function kinglaw_custom_list_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo ''.$tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
        	<div class="bg-reply-comment">
    <?php endif; ?>
    <div class="comment-holder">
	    <div class="comment-author vcard">
	        <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
	    </div>
	    <?php /* if ( $comment->comment_approved == '0' ) : ?>
	         <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'kinglaw' ); ?></em>
	          <br />
	    <?php endif;*/ ?>
	</div>
	<div class="commetn-meta">
		<div class="commetn-meta-inner">
			<div class="author-date">
				<cite class="fn"><?php printf( '%s' , get_comment_author_link() ); ?></cite>
		        <span class="comment-date">
					<?php
						echo get_comment_date() .' - '. get_comment_time();
					?>
				</span>
			</div>

	    	<?php comment_text(); ?>
	    	<div class="reply">
		        <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		    </div>
		    <div class="line-comment"></div>
		</div>
    </div>

    <?php if ( 'div' != $args['style'] ) : ?>
    		</div>
    	</div>
    <?php endif; ?>
    <?php
}


/* core functions. */
require_once( get_template_directory() . '/inc/functions.php' );

add_action( 'vc_before_init', 'kinglaw_integrate_with_vc' );
function kinglaw_integrate_with_vc() {
	vc_add_param("vc_tta_section", array(
			"type" => "css_editor",
			"param_name" => 'body_css',
			"group" => esc_html__("Style", 'kinglaw'),
		)
	);
}


/**
 * User custom fields.
 */
add_action( 'show_user_profile', 'kinglaw_user_fields' );
add_action( 'edit_user_profile', 'kinglaw_user_fields' );
function kinglaw_user_fields($user){

	$user_facebook = get_user_meta($user->ID, 'user_facebook', true);
	$user_twitter = get_user_meta($user->ID, 'user_twitter', true);
	$user_linkedin = get_user_meta($user->ID, 'user_linkedin', true);
	$user_skype = get_user_meta($user->ID, 'user_skype', true);
	$user_google = get_user_meta($user->ID, 'user_google', true);
	$user_youtube = get_user_meta($user->ID, 'user_youtube', true);
	$user_vimeo = get_user_meta($user->ID, 'user_vimeo', true);
	$user_tumblr = get_user_meta($user->ID, 'user_tumblr', true);
	$user_rss = get_user_meta($user->ID, 'user_rss', true);
	$user_pinterest = get_user_meta($user->ID, 'user_pinterest', true);
	$user_instagram = get_user_meta($user->ID, 'user_instagram', true);
	$user_yelp = get_user_meta($user->ID, 'user_yelp', true);

	?>
	<h3><?php esc_html_e('Social', 'kinglaw'); ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="user_facebook"><?php esc_html_e('Facebook', 'kinglaw'); ?></label></th>
            <td>
                <input id="user_facebook" name="user_facebook" type="text" value="<?php echo esc_attr(isset($user_facebook) ? $user_facebook : ''); ?>" />
			</td>
		</tr>
		<tr>
            <th><label for="user_twitter"><?php esc_html_e('Twitter', 'kinglaw'); ?></label></th>
            <td>
                <input id="user_twitter" name="user_twitter" type="text" value="<?php echo esc_attr(isset($user_twitter) ? $user_twitter : ''); ?>" />
			</td>
		</tr>
		<tr>
            <th><label for="user_linkedin"><?php esc_html_e('Linkedin', 'kinglaw'); ?></label></th>
            <td>
                <input id="user_linkedin" name="user_linkedin" type="text" value="<?php echo esc_attr(isset($user_linkedin) ? $user_linkedin : ''); ?>" />
			</td>
		</tr>
		<tr>
            <th><label for="user_skype"><?php esc_html_e('Skype', 'kinglaw'); ?></label></th>
            <td>
                <input id="user_skype" name="user_skype" type="text" value="<?php echo esc_attr(isset($user_skype) ? $user_skype : ''); ?>" />
			</td>
		</tr>
		<tr>
            <th><label for="user_google"><?php esc_html_e('Google', 'kinglaw'); ?></label></th>
            <td>
                <input id="user_google" name="user_google" type="text" value="<?php echo esc_attr(isset($user_google) ? $user_google : ''); ?>" />
			</td>
		</tr>
		<tr>
            <th><label for="user_youtube"><?php esc_html_e('Youtube', 'kinglaw'); ?></label></th>
            <td>
                <input id="user_youtube" name="user_youtube" type="text" value="<?php echo esc_attr(isset($user_youtube) ? $user_youtube : ''); ?>" />
			</td>
		</tr>
		<tr>
            <th><label for="user_vimeo"><?php esc_html_e('Vimeo', 'kinglaw'); ?></label></th>
            <td>
                <input id="user_vimeo" name="user_vimeo" type="text" value="<?php echo esc_attr(isset($user_vimeo) ? $user_vimeo : ''); ?>" />
			</td>
		</tr>
		<tr>
            <th><label for="user_tumblr"><?php esc_html_e('Tumblr', 'kinglaw'); ?></label></th>
            <td>
                <input id="user_tumblr" name="user_tumblr" type="text" value="<?php echo esc_attr(isset($user_tumblr) ? $user_tumblr : ''); ?>" />
			</td>
		</tr>
		<tr>
            <th><label for="user_rss"><?php esc_html_e('Rss', 'kinglaw'); ?></label></th>
            <td>
                <input id="user_rss" name="user_rss" type="text" value="<?php echo esc_attr(isset($user_rss) ? $user_rss : ''); ?>" />
			</td>
		</tr>
		<tr>
            <th><label for="user_pinterest"><?php esc_html_e('Pinterest', 'kinglaw'); ?></label></th>
            <td>
                <input id="user_pinterest" name="user_pinterest" type="text" value="<?php echo esc_attr(isset($user_pinterest) ? $user_pinterest : ''); ?>" />
			</td>
		</tr>
		<tr>
            <th><label for="user_instagram"><?php esc_html_e('Instagram', 'kinglaw'); ?></label></th>
            <td>
                <input id="user_instagram" name="user_instagram" type="text" value="<?php echo esc_attr(isset($user_instagram) ? $user_instagram : ''); ?>" />
			</td>
		</tr>
		<tr>
            <th><label for="user_yelp"><?php esc_html_e('Yelp', 'kinglaw'); ?></label></th>
            <td>
                <input id="user_yelp" name="user_yelp" type="text" value="<?php echo esc_attr(isset($user_yelp) ? $user_yelp : ''); ?>" />
			</td>
		</tr>
	</table>
	<?php
}

/**
 * Save user custom fields.
 */
add_action( 'personal_options_update', 'kinglaw_save_user_custom_fields' );
add_action( 'edit_user_profile_update', 'kinglaw_save_user_custom_fields' );
function kinglaw_save_user_custom_fields( $user_id )
{
	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	if(isset($_POST['user_facebook']))
		update_user_meta( $user_id, 'user_facebook', $_POST['user_facebook'] );
	if(isset($_POST['user_twitter']))
		update_user_meta( $user_id, 'user_twitter', $_POST['user_twitter'] );
	if(isset($_POST['user_linkedin']))
		update_user_meta( $user_id, 'user_linkedin', $_POST['user_linkedin'] );
	if(isset($_POST['user_skype']))
		update_user_meta( $user_id, 'user_skype', $_POST['user_skype'] );
	if(isset($_POST['user_google']))
		update_user_meta( $user_id, 'user_google', $_POST['user_google'] );
	if(isset($_POST['user_youtube']))
		update_user_meta( $user_id, 'user_youtube', $_POST['user_youtube'] );
	if(isset($_POST['user_vimeo']))
		update_user_meta( $user_id, 'user_vimeo', $_POST['user_vimeo'] );
	if(isset($_POST['user_tumblr']))
		update_user_meta( $user_id, 'user_tumblr', $_POST['user_tumblr'] );
	if(isset($_POST['user_rss']))
		update_user_meta( $user_id, 'user_rss', $_POST['user_rss'] );
	if(isset($_POST['user_pinterest']))
		update_user_meta( $user_id, 'user_pinterest', $_POST['user_pinterest'] );
	if(isset($_POST['user_instagram']))
		update_user_meta( $user_id, 'user_instagram', $_POST['user_instagram'] );
	if(isset($_POST['user_yelp']))
		update_user_meta( $user_id, 'user_yelp', $_POST['user_yelp'] );
}

/* Update CSS within in Admin */
function kinglaw_admin_style() {
  wp_enqueue_style('kinglaw_admin_style', get_template_directory_uri().'/assets/css/admin.css');
}
add_action('admin_enqueue_scripts', 'kinglaw_admin_style');

/**
 * Demo Data
 */
add_filter('ef3-theme-options-opt-name', 'kinglaw_set_demo_opt_name');

function kinglaw_set_demo_opt_name(){
	return 'opt_theme_options';
}

add_filter('ef3-replace-content', 'kinglaw_replace_content', 10 , 2);

function kinglaw_replace_content($replaces, $attachment){
	return array(
		'/tax_query:/' => 'remove_query:',
		'/categories:/' => 'remove_query:',
	);
}

add_filter('ef3-replace-theme-options', 'kinglaw_replace_theme_options');

function kinglaw_replace_theme_options(){
	return array(
		'dev_mode' => 0,
	);
}

add_filter('ef3-enable-create-demo', 'kinglaw_enable_create_demo');

function kinglaw_enable_create_demo(){
	return false;
}

/**
 * End Demo Data
 */

/**
* End View count post
*/
function kinglaw_post_views($post_ID) {
    //Set the name of the Posts Custom Field.
    $count_key = 'post_views_count'; 
    //Returns values of the custom field with the specified key from the specified post.
    $count = get_post_meta($post_ID, $count_key, true);
    $count = $count ? (int)$count : 0 ;
    if(is_single()){
     $count++;
     update_post_meta($post_ID, $count_key, $count);
    }
    return $count;
}

/*
Woocommerce
*/
add_action('ef3-export-finish', 'kinglaw_export_woo');
function kinglaw_export_woo($folder_dir)
{
    $options_woo = array(
        'woocommerce_cart_page_id',
        'woocommerce_checkout_page_id',
        'woocommerce_shop_page_id',
    );
    global $wp_filesystem;
    $obj = array();
    foreach ($options_woo as $option) {
        $page_id = get_option($option);
        $page = get_post($page_id);
        $obj[$option] = $page->post_name;
    }
    $wp_filesystem->put_contents($folder_dir . 'woocommerce_settings.json', json_encode($obj));
}

add_action('ef3-import-finish', 'kinglaw_import_woo', 10, 2);
function kinglaw_import_woo($id, $folder_dir)
{
    if (file_exists($folder_dir . 'woocommerce_settings.json')) {
        $options = json_decode(file_get_contents($folder_dir . 'woocommerce_settings.json'), true);
        foreach ($options as $key => $option) {
            $post = get_page_by_path( $option, OBJECT, 'page' );
            update_option($key, $post->ID);
        }
    }
}


add_action( 'after_setup_theme', 'construct_pr_gallery' );
function construct_pr_gallery() {
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}


/* Add Template Woocommerce */
if(class_exists('Woocommerce')){
	require_once( get_template_directory() . '/woocommerce/wc-function-hooks.php' );
}


add_filter( 'woocommerce_show_page_title' , 'woo_hide_page_title' );
/**
 * woo_hide_page_title
 *
 * Removes the "shop" title on the main shop page
 *
 * @access      public
 * @since       1.0 
 * @return      void
*/
function woo_hide_page_title() {
	return false;
}
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

/**
 * WooCommerce Extra Feature
 * --------------------------
 *
 * Change number of related products on product page
 * Set your own value for 'posts_per_page'
 *
 */ 
function woo_related_products_limit() {
  global $product;
	
	$args['posts_per_page'] = 3;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
  function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 4 related products
	$args['columns'] = 3; // arranged in 2 columns
	return $args;
}