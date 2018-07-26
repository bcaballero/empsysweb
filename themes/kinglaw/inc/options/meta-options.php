<?php
/**
 * Meta box config file
 */
if (! class_exists('MetaFramework')) {
    return;
}

add_action('admin_head', 'kinglaw_metabox');

function kinglaw_metabox() {
  wp_enqueue_style('metabox', get_template_directory_uri() . '/inc/options/css/metabox.css');
}

/**
 * get list menu.
 * @return array
 */
function kinglaw_get_nav_menu(){

    $menus = array(
        '' => esc_html__('Default', 'kinglaw')
    );

    $obj_menus = wp_get_nav_menus();

    foreach ($obj_menus as $obj_menu){
        $menus[$obj_menu->term_id] = $obj_menu->name;
    }

    return $menus;
}

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name' => apply_filters('opt_meta', 'opt_meta_options'),
    // Set a different name for your global variable other than the opt_name
    'dev_mode' => false,
    // Allow you to start the panel in an expanded way initially.
    'open_expanded' => false,
    // Disable the save warning when a user changes a field
    'disable_save_warn' => true,
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults' => false,

    'output' => false,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag' => false,
    // Show the time the page took to load, etc
    'update_notice' => false,
    // 'disable_google_fonts_link' => true, // Disable this in case you want to create your own google fonts loader
    'admin_bar' => false,
    // Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu' => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer' => false,
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export' => false,
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn' => false
);

// -> Set Option To Panel.
MetaFramework::setArgs($args);

/** Page Options */
MetaFramework::setMetabox(array(
    'id' => '_page_main_options',
    'label' => esc_html__('Page Setting', 'kinglaw'),
    'post_type' => 'page',
    'context' => 'advanced',
    'priority' => 'default',
    'open_expanded' => false,
    'sections' => array(
        array(
            'title' => esc_html__('Header', 'kinglaw'),
            'id' => 'tab-page-header',
            'icon' => 'el el-credit-card',
            'fields' => array(
                array(
                    'id'       => 'custom_header',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Custom', 'kinglaw'),
                    'options' => array(
                        '1' => 'Yes', 
                        '' => 'No',
                     ), 
                    'default' => ''
                ),
                array(
                    'id' => 'header_layout',
                    'title' => esc_html__('Layouts', 'kinglaw'),
                    'subtitle' => esc_html__('Select a layout for header', 'kinglaw'),
                    'default' => '1',
                    'type' => 'image_select',
                    'options' => array(
                        '1' => get_template_directory_uri().'/assets/images/header/h1.jpg',
                        '2' => get_template_directory_uri().'/assets/images/header/h2.jpg',
                        '3' => get_template_directory_uri().'/assets/images/header/h3.jpg',
                        '4' => get_template_directory_uri().'/assets/images/header/h4.jpg',
                    ),
                    'required' => array( 'custom_header', '=', '1' )
                ),
            )
        ),
        array(
            'title' => esc_html__('Page Title', 'kinglaw'),
            'id' => 'tab-page-title-bc',
            'icon' => 'el el-map-marker',
            'fields' => array(
                array(
                    'id'       => 'custom_page_title',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Custom Layout', 'kinglaw'),
                    'options' => array(
                        '1' => 'Yes',
                        '' => 'No',
                    ),
                    'default' => ''
                ),
                array(
                    'title' => esc_html__('Page Title', 'kinglaw'),
                    'type'  => 'section',
                    'id' => 'heading_page_title',
                    'indent' => true,
                    'required' => array( 'custom_page_title', '=', '1' )
                ),
                array(
                    'id' => 'page_title_layout',
                    'title' => esc_html__('Layouts', 'kinglaw'),
                    'subtitle' => esc_html__('select a layout for page title', 'kinglaw'),
                    'default' => '1',
                    'type' => 'image_select',
                    'options' => array(
                        '' => get_template_directory_uri().'/assets/images/pagetitle/p0.jpg',
                        '1' => get_template_directory_uri().'/assets/images/pagetitle/p1.jpg',
                        
                    ),
                    'required' => array( 'custom_page_title', '=', '1' )
                ),
                array(
                    'title' => esc_html__('Select Background Image', 'kinglaw'),
                    'id' => 'page_bg_page_title',
                    'type' => 'media',
                    'url' => false,
                    'default' => '',
                    'required' => array( 'custom_page_title', '=', '1' )
                ),
                array(
                    'id' => 'pagetitle_overlay',
                    'type' => 'color_rgba',
                    'title' => __('Overlay Color', 'kinglaw'),
                    'default' => array('color'=>'#1b1a1a','alpha'=>'0.5', 'rgba'=>'rgba(27,26,26,0.5)'),
                    'required' => array( 'custom_page_title', '=', '1' )
                ),
                array(
                    'id' => 'page_title_text',
                    'type' => 'text',
                    'title' => esc_html__('Page Title', 'kinglaw'),
                    'subtitle' => esc_html__('Custom current page title.', 'kinglaw'),
                    'required' => array( 'custom_page_title', '=', '1' )
                ),
                array(
                    'id' => 'page_title_color',
                    'type' => 'color',
                    'title' => esc_html__('Page Title Color', 'kinglaw'),
                    'default' => '',
                    'required' => array( 'custom_page_title', '=', '1' ),
                    'default' => '',
                ),
                array(
                    'id' => 'page_title_font_size',
                    'type' => 'text',
                    'title' => esc_html__('Page Title - Font Size', 'kinglaw'),
                    'subtitle' => esc_html__('Enter: ...px', 'kinglaw'),
                    'required' => array( 'custom_page_title', '=', '1' ),
                ),
                array(
                    'id' => 'page_title_line_height',
                    'type' => 'text',
                    'title' => esc_html__('Page Title - Line Hegiht', 'kinglaw'),
                    'subtitle' => esc_html__('Enter: ...px', 'kinglaw'),
                    'required' => array( 'custom_page_title', '=', '1' )
                ),
                array(
                    'id'             => 'page_pagetitle_padding',
                    'type'           => 'spacing',
                    'right'   => false,
                    'left'    => false,
                    'mode'           => 'padding',
                    'units'          => array('px'),
                    'units_extended' => 'false',
                    'title'          => esc_html__('Content Padding', 'kinglaw'),
                    'desc'           => esc_html__('Default: Top-350px, Bottom-180px', 'kinglaw'),
                    'default'            => array(
                        'padding-top'   => '120',  
                        'padding-bottom'   => '120',  
                        'units'          => 'px', 
                    ),
                    'required' => array( 'custom_page_title', '=', '1' )
                ),
                array(
                    'title' => esc_html__('Breadcrumb', 'kinglaw'),
                    'type'  => 'section',
                    'id' => 'heading_breadcrumb',
                    'indent' => true,
                    'required' => array( 'custom_page_title', '=', '1' )
                ),
                array(
                    'id'       => 'hidden_breadcrumb',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Hidden Breadcrumb', 'kinglaw'),
                    'options' => array(
                        '' => 'No', 
                        'yes' => 'Yes',
                     ), 
                    'default' => '',
                    'required' => array( 'custom_page_title', '=', '1' )
                ),
                array(
                    'id' => 'breadcrumb_color',
                    'type' => 'color',
                    'title' => esc_html__('Breadcrumb Color', 'kinglaw'),
                    'default' => '',
                    'required' => array( 'custom_page_title', '=', '1' )
                ),
            )
        ),
        array(
            'title' => esc_html__('Footer', 'kinglaw'),
            'id' => 'tab-footer-bc',
            'icon' => 'el el-credit-card',
            'fields' => array(
                array(
                    'id'       => 'custom_footer',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Custom', 'kinglaw'),
                    'options' => array(
                        '1' => 'Yes', 
                        '' => 'No',
                     ), 
                    'default' => ''
                ),
                array(
                    'id' => 'footer_layout',
                    'title' => esc_html__('Layouts', 'kinglaw'),
                    'subtitle' => esc_html__('select a layout for page title', 'kinglaw'),
                    'default' => '1',
                    'type' => 'image_select',
                    'options' => array(
                        '0' => get_template_directory_uri().'/assets/images/footer/f0.jpg',
                        '1' => get_template_directory_uri().'/assets/images/footer/f1.jpg',
                        '2' => get_template_directory_uri().'/assets/images/footer/f2.jpg',
                    ),
                    'required' => array( 'custom_footer', '=', '1' )
                ),
                array(
                    'id'       => 'bg_footer',
                    'type'     => 'background',
                    'background-color'    => false,
                    'background-repeat'   => false,
                    'background-attachment' => false,
                    'background-position' => false,
                    'background-size'     => false,
                    'title'    => esc_html__( 'Background Image', 'kinglaw' ),
                    'output'   => array('#colophon.site-footer'),
                    'default'  => '',
                    'required' => array( 'custom_footer', '=', '1' )
                ),
                array(
                    'id' => 'bg_footer_color_overlay',
                    'type' => 'color_rgba',
                    'title' => __('Background Overlay Color', 'kinglaw'),
                    'default'   => array(
                        'color'     => '#000',
                        'alpha'     => 0.8
                    ),
                ),
            )
        ),
        array(
            'title' => esc_html__('Page', 'kinglaw'),
            'id' => 'tab-page-bc',
            'icon' => 'el el-photo',
            'fields' => array(
                array(
                    'id'       => 'enable_sidebar',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Custom Sidebar', 'kinglaw'),
                    'options' => array(
                        '1' => 'Yes', 
                        '' => 'No',
                     ), 
                    'default' => ''
                ),
                array(
                    'id'       => 'page_sidebar',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Set sidebar for Page', 'kinglaw'),
                    'options' => array(
                        'left-sidebar' => 'Sidebar Left', 
                        'no-sidebar' => 'No Sidebar', 
                        'right-sidebar' => 'Sidebar Right'
                     ), 
                    'default' => 'no-sidebar',
                    'required' => array( 'enable_sidebar', '=', '1' )
                ),
                array(
                    'id'             => 'page_content_padding',
                    'type'           => 'spacing',
                    'right'   => false,
                    'left'    => false,
                    'mode'           => 'padding',
                    'units'          => array('px'),
                    'units_extended' => 'false',
                    'title'          => esc_html__('Padding', 'kinglaw'),
                    'default'            => array(
                        'padding-top'   => '120',  
                        'padding-bottom'   => '120',  
                        'units'          => 'px', 
                    )
                ),
            )
        ),
        array(
            'title' => esc_html__('One Page', 'kinglaw'),
            'id' => 'tab-one-page',
            'icon' => 'el el-download-alt',
            'fields' => array(
                array(
                    'subtitle' => esc_html__('Enable one page mode for current page.', 'kinglaw'),
                    'id' => 'page_one_page',
                    'type' => 'switch',
                    'title' => esc_html__('Enable', 'kinglaw'),
                    'default' => false,
                )
            )
        )
    )
));

/** Post Extra Option */
MetaFramework::setMetabox(array(
    'id' => '_post_extra_options',
    'label' => esc_html__('Post Settings', 'kinglaw'),
    'post_type' => 'post',
    'context' => 'advanced',
    'priority' => 'default',
    'open_expanded' => false,
    'sections' => array(
        array(
            'title' => esc_html__('General', 'kinglaw'),
            'id' => 'tab-page-header',
            'icon' => 'el el-credit-card',
            'fields' => array(
                array(
                    'title' => esc_html__('Change Background Images', 'kinglaw'),
                    'id' => 'post_bg_page_title',
                    'type' => 'media',
                    'url' => false,
                    'default' => '',
                ),
                array(
                    'id'       => 'single_sidebar',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Sidebar', 'kinglaw'),
                    'options' => array(
                        '' => 'Default Theme Option', 
                        'left-sidebar' => 'Sidebar Left', 
                        'no-sidebar' => 'No Sidebar', 
                        'right-sidebar' => 'Sidebar Right'
                     ), 
                    'default' => ''
                ),
            )
        ),
    )
));

/** Post Options */
MetaFramework::setMetabox(array(
    'id' => '_page_post_format_options',
    'label' => esc_html__('Post Format', 'kinglaw'),
    'post_type' => 'post',
    'context' => 'advanced',
    'priority' => 'default',
    'open_expanded' => true,
    'sections' => array(
        array(
            'title' => '',
            'id' => 'color-Color',
            'icon' => 'el el-laptop',
            'fields' => array(
                array(
                    'id'       => 'opt-video-type',
                    'type'     => 'select',
                    'title'    => esc_html__( 'Select Video Type', 'kinglaw' ),
                    'subtitle' => esc_html__( 'Local video, Youtube, Vimeo', 'kinglaw' ),
                    'options'  => array(
                        'local' => esc_html__('Upload', 'kinglaw' ),
                        'youtube' => esc_html__('Youtube', 'kinglaw' ),
                        'vimeo' => esc_html__('Vimeo', 'kinglaw' ),
                    )
                ),
                array(
                    'id'       => 'otp-video-local',
                    'type'     => 'media',
                    'url'      => true,
                    'mode'       => false,
                    'title'    => esc_html__( 'Local Video', 'kinglaw' ),
                    'subtitle' => esc_html__( 'Upload video media using the WordPress native uploader', 'kinglaw' ),
                    'required' => array( 'opt-video-type', '=', 'local' )
                ),
                array(
                    'id'       => 'opt-video-youtube',
                    'type'     => 'text',
                    'title'    => esc_html__('Youtube', 'kinglaw'),
                    'subtitle' => esc_html__('Load video from Youtube.', 'kinglaw'),
                    'placeholder' => esc_html__('https://youtu.be/iNJdPyoqt8U', 'kinglaw'),
                    'required' => array( 'opt-video-type', '=', 'youtube' )
                ),
                array(
                    'id'       => 'opt-video-vimeo',
                    'type'     => 'text',
                    'title'    => esc_html__('Vimeo', 'kinglaw'),
                    'subtitle' => esc_html__('Load video from Vimeo.', 'kinglaw'),
                    'placeholder' => esc_html__('https://vimeo.com/155673893', 'kinglaw'),
                    'required' => array( 'opt-video-type', '=', 'vimeo' )
                ),
                array(
                    'id'       => 'otp-video-thumb',
                    'type'     => 'media',
                    'url'      => true,
                    'mode'       => false,
                    'title'    => esc_html__( 'Video Thumb', 'kinglaw' ),
                    'subtitle' => esc_html__( 'Upload thumb media using the WordPress native uploader', 'kinglaw' ),
                    'required' => array( 'opt-video-type', '=', 'local' )
                ),
                array(
                    'id'       => 'otp-audio',
                    'type'     => 'media',
                    'url'      => true,
                    'mode'       => false,
                    'title'    => esc_html__( 'Audio Media', 'kinglaw' ),
                    'subtitle' => esc_html__( 'Upload audio media using the WordPress native uploader', 'kinglaw' ),
                ),
                array(
                    'id'       => 'opt-gallery',
                    'type'     => 'gallery',
                    'title'    => esc_html__( 'Add/Edit Gallery', 'kinglaw' ),
                    'subtitle' => esc_html__( 'Create a new Gallery by selecting existing or uploading new images using the WordPress native uploader', 'kinglaw' ),
                ),
                array(
                    'id'       => 'opt-quote-title',
                    'type'     => 'text',
                    'title'    => esc_html__('Quote Title', 'kinglaw'),
                    'subtitle' => esc_html__('Quote title or quote name...', 'kinglaw'),
                ),
                array(
                    'id'       => 'opt-quote-content',
                    'type'     => 'textarea',
                    'title'    => esc_html__('Quote Content', 'kinglaw'),
                ),
            )
        ),
    )
));

/** Testimonial Options */
MetaFramework::setMetabox(array(
    'id' => '_testimonial_options',
    'label' => esc_html__('Testimonial Setting', 'kinglaw'),
    'post_type' => 'testimonial',
    'context' => 'advanced',
    'priority' => 'default',
    'open_expanded' => false,
    'sections' => array(
        array(
            'title' => esc_html__('General', 'kinglaw'),
            'id' => 'tab-page-header',
            'icon' => 'el el-credit-card',
            'fields' => array(
                array(
                    'id' => 'evaluate_major',
                    'type' => 'text',
                    'title' => esc_html__('Evaluate', 'kinglaw'),
                    'default' => '',
                ),
                array(
                    'id' => 'excerpt1_test',
                    'type' => 'textarea',
                    'title' => esc_html__('Excerpt', 'kinglaw'),
                    'default' => '',
                ),
                array(
                    'id' => 'testimonial_stars',
                    'type' => 'select',
                    'title' => esc_html__('Star Rating', 'kinglaw'),
                    'default' => '0',
                    'options' => array(
                        'no-star' => 'no-star',
                        'star1' => 'star1',
                        'star2' => 'star2',
                        'star3' => 'star3',
                        'star4' => 'star4',
                        'star5' => 'star5',
                    ),
                ),
            )
        ),
    )
));

/** Attorney Options */
MetaFramework::setMetabox(array(
    'id' => '_attorney_options',
    'label' => esc_html__('Attorney Setting', 'kinglaw'),
    'post_type' => 'attorney',
    'context' => 'advanced',
    'priority' => 'default',
    'open_expanded' => false,
    'sections' => array(
        array(
            'title' => esc_html__('General', 'kinglaw'),
            'id' => 'tab-page-position',
            'icon' => 'el el-lines',
            'fields' => array(
                array(
                    'id' => 'attorney_major',
                    'type' => 'text',
                    'title' => esc_html__('Major', 'kinglaw'),
                    'default' => 'Major',
                ),
                array(
                    'id' => 'attorney_position',
                    'type' => 'text',
                    'title' => esc_html__('Position', 'kinglaw'),
                    'default' => 'Position',
                ),
                array(
                    'id' => 'phone_attorney',
                    'type' => 'text',
                    'title' => esc_html__('Phone', 'kinglaw'),
                    'default' => '0123456789',
                ),
                array(
                    'id' => 'skype_name',
                    'type' => 'text',
                    'title' => esc_html__('Skype name', 'kinglaw'),
                    'default' => 'skypename',
                ),
                array(
                    'id' => 'e_mail',
                    'type' => 'text',
                    'title' => esc_html__('Email', 'kinglaw'),
                    'default' => 'abc@gmail.com',
                ),
                array(
                    'id' => 'attorney_excerpt',
                    'type' => 'textarea',
                    'title' => esc_html__('Excerpt', 'kinglaw'),
                    'default' => 'Enter Excerpt',
                ),
            )
        ),
        array(
            'title' => esc_html__('Contact Us', 'kinglaw'),
            'id' => 'tab-page-contact-us',
            'icon' => 'el el-link',
            'fields' => array(
                array(
                    'id' => 'attorney_link',
                    'type' => 'text',
                    'title' => esc_html__('Link', 'kinglaw'),
                    'default' => '#',
                ),
                array(
                    'id' => 'attorney_text',
                    'type' => 'text',
                    'title' => esc_html__('Text', 'kinglaw'),
                    'default' => 'Contact Us',
                ),
            )
        ),
        array(
            'title' => esc_html__('Social', 'kinglaw'),
            'id' => 'tab-page-position-social',
            'icon' => 'el el-credit-card',
            'fields' => array(
                array(
                    'id'      => 'attorney_social',
                    'type'    => 'sorter',
                    'title'   => 'Social',
                    'desc'    => 'Choose which social networks are displayed and edit where they link to.',
                    'options' => array(
                        'enabled'  => array(
                            'facebook'  => 'Facebook', 
                            'twitter'   => 'Twitter', 
                            'email'     => 'Email',
                        ),
                        'disabled' => array(
                            'linkedin'  => 'inkedin',
                            'skype'     => 'Skype',
                            'youtube'   => 'Youtube', 
                            'vimeo'     => 'Vimeo', 
                            'tumblr'    => 'Tumblr', 
                            'rss'       => 'RSS', 
                            'pinterest' => 'Pinterest',
                            'instagram' => 'Instagram',
                            'yelp'      => 'Yelp'
                        )
                    ),
                ),
                array(
                    'id' => 'social_facebook_url',
                    'type' => 'text',
                    'title' => esc_html__('Facebook URL', 'kinglaw'),
                    'default' => '',
                ),
                array(
                    'id' => 'social_twitter_url',
                    'type' => 'text',
                    'title' => esc_html__('Twitter URL', 'kinglaw'),
                    'default' => '',
                ),
                array(
                    'id' => 'social_email_url',
                    'type' => 'text',
                    'title' => esc_html__('Email URL', 'kinglaw'),
                    'default' => '',
                ),
                array(
                    'id' => 'social_inkedin_url',
                    'type' => 'text',
                    'title' => esc_html__('Inkedin URL', 'kinglaw'),
                    'default' => '',
                ),
                array(
                    'id' => 'social_rss_url',
                    'type' => 'text',
                    'title' => esc_html__('Rss URL', 'kinglaw'),
                    'default' => '',
                ),
                array(
                    'id' => 'social_instagram_url',
                    'type' => 'text',
                    'title' => esc_html__('Instagram URL', 'kinglaw'),
                    'default' => '',
                ),
                array(
                    'id' => 'social_google_url',
                    'type' => 'text',
                    'title' => esc_html__('Google URL', 'kinglaw'),
                    'default' => '',
                ),
                array(
                    'id' => 'social_skype_url',
                    'type' => 'text',
                    'title' => esc_html__('Skype URL', 'kinglaw'),
                    'default' => '',
                ),
                array(
                    'id' => 'social_pinterest_url',
                    'type' => 'text',
                    'title' => esc_html__('Pinterest URL', 'kinglaw'),
                    'default' => '',
                ),
                array(
                    'id' => 'social_vimeo_url',
                    'type' => 'text',
                    'title' => esc_html__('Vimeo URL', 'kinglaw'),
                    'default' => '',
                ),
                array(
                    'id' => 'social_youtube_url',
                    'type' => 'text',
                    'title' => esc_html__('Youtube URL', 'kinglaw'),
                    'default' => '',
                ),
                array(
                    'id' => 'social_yelp_url',
                    'type' => 'text',
                    'title' => esc_html__('Yelp URL', 'kinglaw'),
                    'default' => '',
                ),
                array(
                    'id' => 'social_tumblr_url',
                    'type' => 'text',
                    'title' => esc_html__('Tumblr URL', 'kinglaw'),
                    'default' => '',
                ),

            )
        ),
    )
));

/** Client Options */
MetaFramework::setMetabox(array(
    'id' => '_client_options',
    'label' => esc_html__('Client Setting', 'kinglaw'),
    'post_type' => 'client',
    'context' => 'advanced',
    'priority' => 'default',
    'open_expanded' => false,
    'sections' => array(
        array(
            'title' => esc_html__('General', 'kinglaw'),
            'id' => 'tab-page-header',
            'icon' => 'el el-credit-card',
            'fields' => array(
                array(
                    'id' => 'client_link',
                    'type' => 'text',
                    'title' => esc_html__('Link', 'kinglaw'),
                    'default' => '',
                ),
            )
        ),
    )
));

/** Services Options */
MetaFramework::setMetabox(array(
    'id' => '_service_options',
    'label' => esc_html__('Service Setting', 'kinglaw'),
    'post_type' => 'service',
    'context' => 'advanced',
    'priority' => 'default',
    'open_expanded' => false,
    'sections' => array(
        array(
            'title' => esc_html__('General', 'kinglaw'),
            'id' => 'tab-page-header',
            'icon' => 'el el-credit-card',
            'fields' => array(
                array(
                    'title' => esc_html__('Select Image Icon', 'kinglaw'),
                    'id' => 'service_icon_post',
                    'type' => 'media',
                    'url' => false,
                    'default' => '',
                ),
                array(
                    'title' => esc_html__('Image Icon Hover', 'kinglaw'),
                    'id' => 'service_icon_post_hover',
                    'type' => 'media',
                    'url' => false,
                    'default' => '',
                )
            )
        ),        
    )
));


MetaFramework::init();