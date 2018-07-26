<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */
if (! class_exists('Redux')) {
    return;
}

// This line is only for altering the demo. Can be easily removed.
$opt_name = apply_filters('opt_name', 'opt_theme_options');

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name' => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name' => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version' => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type' => 'menu',
    // Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu' => true,
    // Show the sections below the admin menu item or not
    'menu_title' => $theme->get('Name'),
    'page_title' => $theme->get('Name'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key' => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography' => false,
    // Use a asynchronous font on the front end or font string
    // 'disable_google_fonts_link' => true, // Disable this in case you want to create your own google fonts loader
    'admin_bar' => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon' => 'dashicons-smiley',
    // Choose an icon for the admin bar menu
    'admin_bar_priority' => 50,
    // Choose an priority for the admin bar menu
    'global_variable' => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode' => false,
    // Show the time the page took to load, etc
    'update_notice' => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer' => true,
    // Enable basic customizer support
    // 'open_expanded' => true, // Allow you to start the panel in an expanded way initially.
    // 'disable_save_warn' => true, // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority' => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent' => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions' => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon' => 'dashicons-nametag',
    // Specify a custom URL to an icon
    'last_tab' => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon' => 'dashicons-smiley',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug' => '',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults' => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show' => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark' => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export' => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time' => 60 * MINUTE_IN_SECONDS,
    'output' => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag' => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit' => '', // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database' => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn' => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints' => array(
        'icon' => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color' => 'lightgray',
        'icon_size' => 'normal',
        'tip_style' => array(
            'color' => 'red',
            'shadow' => true,
            'rounded' => false,
            'style' => ''
        ),
        'tip_position' => array(
            'my' => 'top left',
            'at' => 'bottom right'
        ),
        'tip_effect' => array(
            'show' => array(
                'effect' => 'slide',
                'duration' => '500',
                'event' => 'mouseover'
            ),
            'hide' => array(
                'effect' => 'slide',
                'duration' => '500',
                'event' => 'click mouseleave'
            )
        )
    )
);

Redux::setArgs($opt_name, $args);

/**
 * Header Options
 * 
 * 
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Header', 'kinglaw'),
    'icon' => 'el-icon-credit-card',
    'fields' => array(
        array(
            'id' => 'header_layout',
            'title' => esc_html__('Layouts', 'kinglaw'),
            'subtitle' => esc_html__('select a layout for header', 'kinglaw'),
            'default' => '1',
            'type' => 'image_select',
            'options' => array(
                '1' => get_template_directory_uri().'/assets/images/header/h1.jpg',
                '2' => get_template_directory_uri().'/assets/images/header/h2.jpg',
                '3' => get_template_directory_uri().'/assets/images/header/h3.jpg',
                '4' => get_template_directory_uri().'/assets/images/header/h4.jpg',
            )
        ),
        array(
            'subtitle' => esc_html__('enable sticky mode for menu.', 'kinglaw'),
            'id' => 'menu_sticky',
            'type' => 'switch',
            'title' => esc_html__('Sticky Header', 'kinglaw'),
            'default' => true,
        ),
        array(
            'id' => 'show_search_icon',
            'type' => 'switch',
            'title' => esc_html__('Show Search Icon', 'kinglaw'),
            'default' => true,
        ),
    )
));

/* Top Bar */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Top Bar', 'kinglaw'),
    'icon' => 'el el-resize-vertical',
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'top_bar_phone',
            'type' => 'text',
            'title' => esc_html__('Phone', 'kinglaw'),
            'default' => '0123.456.789',
        ),
        array(
            'id' => 'phone_link',
            'type' => 'text',
            'title' => esc_html__('Phone link', 'kinglaw'),
            'default' => '0123456789',
        ),
        array(
            'id' => 'top_bar_email',
            'type' => 'text',
            'title' => esc_html__('Email', 'kinglaw'),
            'default' => 'kinglaw@gmail.com',
        ),
        array(
            'id' => 'top_bar_address',
            'type' => 'text',
            'title' => esc_html__('Address', 'kinglaw'),
            'default' => 'Tanta AlGharbia',
        ),

        array(
            'id' => 'top_bar_address2',
            'type' => 'text',
            'title' => esc_html__('Sub Address', 'kinglaw'),
            'default' => 'Mountain View CA 94043',
        ),

        array(
            'id' => 'top_bar_time',
            'type' => 'text',
            'title' => esc_html__('Time', 'kinglaw'),
            'default' => 'Mon-Fri 9.00 - 17.00',
        ),
        array(
            'id' => 'top_bar_time_label',
            'type' => 'text',
            'title' => esc_html__('Sub Time', 'kinglaw'),
            'default' => 'Sat : 10.00 - 14.00   Sunday : CLOSE',
        ),

        array(
            'id' => 'top_bar_theme',
            'type' => 'text',
            'title' => esc_html__('Text - buy theme', 'kinglaw'),
            'default' => 'BUY THIS THEME',
        ),
        array(
            'id' => 'top_bar_theme_link',
            'type' => 'text',
            'title' => esc_html__('Link - buy theme', 'kinglaw'),
            'default' => '#',
        ),

        array(
            'id'      => 'top_bar_social',
            'type'    => 'sorter',
            'title'   => 'Social',
            'desc'    => 'Choose which social networks are displayed and edit where they link to.',
            'options' => array(
                'enabled'  => array(
                    'facebook'  => 'Facebook', 
                    'twitter'   => 'Twitter', 
                    'email'     => 'Email',
                    'linkedin'  => 'Linkedin',
                    'skype'     => 'Skype',
                ),
                'disabled' => array(
                    'google'    => 'Google',
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
    )
));

/* Logo */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Logo', 'kinglaw'),
    'icon' => 'el-icon-picture',
    'subsection' => true,
    'fields' => array(
        array(
            'title' => esc_html__('Transparent Logo', 'kinglaw'),
            'id' => 'tran_logo',
            'type' => 'media',
            'url' => false,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo-light.png'
            )
        ),

        array(
            'title' => esc_html__('Main Logo', 'kinglaw'),
            'id' => 'main_logo',
            'type' => 'media',
            'url' => false,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo.png'
            )
        ),

        array(
            'title' => esc_html__('Sticky Logo', 'kinglaw'),
            'id' => 'sticky_logo',
            'type' => 'media',
            'url' => false,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo.png'
            )
        ),

        array(
            'title' => esc_html__('Mobile Logo + Tablet Logo', 'kinglaw'),
            'id' => 'mobile_logo',
            'type' => 'media',
            'url' => false,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo.png'
            )
        ),
      
        array(
            'id'       => 'main_logo_height',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'title'    => esc_html__('Logo (Max-Height)', 'kinglaw'),
            'width'   => false, 
            'default'  => array(
                'Height'  => '60'
            ),
        ),
        array(
            'id'       => 'sticky_logo_height',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'title'    => esc_html__('Logo Sticky (Max-Height)', 'kinglaw'),
            'width'   => false,
            'default'  => array(
                'Height'  => '30'
            ),
        ),
    )
));

/* Menu */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Menu', 'kinglaw'),
    'icon' => 'el el-lines',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'font_menu',
            'type' => 'typography',
            'title' => esc_html__('Menu Font', 'kinglaw'),
            'google' => true,
            'font-backup' => false,
            'all_styles' => true,
            'color' => false,
            'font-style' => false,
            'font-weight' => true,
            'font-subsets' => false,
            'font-size' => true,
            'line-height' => false,
            'text-align' => false,
            'output'  => array('.cshero-header-navigation .main-navigation .menu-main-menu li a'),
            'units' => 'px',
            'subtitle' => esc_html__('Set menu font.', 'kinglaw'),
            'default' => array(
                'font-family' => '',
                'google' => true,
            )
        ),
        array(
            'id' => 'bg_menu_color',
            'type'     => 'background',
            'background-color'     => true,
            'background-image'     => false,
            'background-repeat'    =>false,
            'background-size'      =>false,
            'background-attachment'=>false,
            'background-position'  =>false,
            'title' => __('Background Color', 'kinglaw'),
            'output'   => array('#cshero-header-inner.header-1 .cshero-main-header, #cshero-header-inner.header-4 .cshero-main-header, #cshero-header-inner.header-1 div#cshero-header-wrapper .header-fixed, #cshero-header-inner.header-4 div#cshero-header-wrapper .header-fixed'),
            'default'  => array(
                'background-color' => '#333',
            )
        )
    )
));
/**
 * Page Title
 *
 * 
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Page Title', 'kinglaw'),
    'icon' => 'el-icon-map-marker',
    'fields' => array(
        array(
            'id' => 'page_title_layout',
            'title' => esc_html__('Layouts', 'kinglaw'),
            'subtitle' => esc_html__('select a layout for page title', 'kinglaw'),
            'default' => '1',
            'type' => 'image_select',
            'options' => array(
                '1' => get_template_directory_uri().'/assets/images/pagetitle/p1.jpg',
            )
        ),
        array(
            'title' => esc_html__('Select Background Image', 'kinglaw'),
            'id' => 'bg_page_title',
            'type' => 'media',
            'url' => false,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/bg-page-title.jpg'
            )
        ),
        array(
            'id' => 'pagetitle_overlay',
            'type' => 'color_rgba',
            'title' => __('Overlay Color', 'kinglaw'),
            'default' => '',
        ),
        array(
            'id' => 'page_title_color',
            'type' => 'color',
            'title' => esc_html__('Page Title Color', 'kinglaw'),
            'default' => '',
            'output'  => array('#cms-theme #cms-page-title .cms-page-title-inner h1'),
        ),
        array(
            'id' => 'breadcrumb_color',
            'type' => 'color',
            'title' => esc_html__('Breadcrumb Color', 'kinglaw'),
            'default' => '',
            'output'  => array('#cms-page-title.page-title .cms-breadcrumb .breadcrumbs li, #cms-page-title.page-title .cms-breadcrumb .breadcrumbs li a, #cms-page-title.page-title .cms-breadcrumb .breadcrumbs li:after'),
        ),
        array(
            'id'       => 'hidden_breadcrumb',
            'type'     => 'button_set',
            'title'    => esc_html__('Hidden Breadcrumb', 'kinglaw'),
            'options' => array(
                '' => 'No', 
                'yes' => 'Yes',
             ), 
            'default' => ''
        ),
    )
));

/**
 * Body
 *
 * 
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Body', 'kinglaw'),
    'icon' => 'el el-website',
    'fields' => array(
        array(
            'id' => 'page_loadding',
            'type' => 'switch',
            'title' => esc_html__('Page Loadding', 'kinglaw'),
            'default' => false,
        ),
        array(
            'id'             => 'content_padding',
            'type'           => 'spacing',
            'output'         => array('body #cms-content'),
            'right'   => false,
            'left'    => false,
            'mode'           => 'padding',
            'units'          => array('px'),
            'units_extended' => 'false',
            'title'          => esc_html__('Content Padding', 'kinglaw'),
            'desc'           => esc_html__('Default: Top-120px, Bottom-120px', 'kinglaw'),
            'default'            => array(
                'padding-top'   => '',  
                'padding-bottom'   => '',  
                'units'          => 'px', 
            )
        ),
    )
));


/**
 * Footer
 *
 * 
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Footer', 'kinglaw'),
    'icon' => 'el el-credit-card',
    'fields' => array(
        array(
            'id' => 'footer_layout',
            'title' => esc_html__('Layouts', 'kinglaw'),
            'subtitle' => esc_html__('select a layout for footer', 'kinglaw'),
            'default' => '1',
            'type' => 'image_select',
            'options' => array(
                '1' => get_template_directory_uri().'/assets/images/footer/f1.jpg',
                '2' => get_template_directory_uri().'/assets/images/footer/f2.jpg',
            )
        ),
        array(
            'id' => 'footer_button_back_to_top',
            'title' => esc_html__('Back To Top', 'kinglaw'),
            'subtitle' => esc_html__('Enable button back to top.', 'kinglaw'),
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Properties', 'kinglaw'),
            'type'  => 'section',
            'id' => 'footer_top_start',
            'indent' => true
        ),
        array(
            'id' => 'bg_footer_color',
            'type'     => 'background',
            'background-color'     => true,
            'background-image'     => false,
            'background-repeat'    =>false,
            'background-size'      =>false,
            'background-attachment'=>false,
            'background-position'  =>false,
            'title' => __('Background Color', 'kinglaw'),
            'output'   => array('#colophon'),
            'default'  => array(
                'background-color' => '#333',
            )
        ),
        array(
            'id'       => 'bg_footer',
            'type'     => 'background',
            'background-color'     => false,
            'title'    => esc_html__( 'Background Image', 'kinglaw' ),
            'output'   => array('#colophon.site-footer'),
            'default'  => '',
        ),
        array(
            'id' => 'bg_footer_color_overlay',
            'type' => 'color_rgba',
            'title' => __('Background Overlay Color', 'kinglaw'),
            'default'   => array(
                'color'     => '#333',
                'alpha'     => 0.8
            ),
        ),
        array(
            'id'       => 'footer-top-column',
            'type'     => 'button_set',
            'title'    => esc_html__('Column', 'kinglaw'),
            'options' => array( 
                '2' => '2 Columns', 
                '3' => '3 Columns',
                '4' => '4 Columns',
             ), 
            'default' => '4'
        ),
        array(
            'subtitle' => esc_html__('Set title heading color', 'kinglaw'),
            'id' => 'footer_heading_color',
            'type' => 'color',
            'title' => esc_html__('Heading Color', 'kinglaw'),
            'default' => '',
            'output'  => array('body #cms-footer-top .wg-title, #colophon #cms-footer-top .wg-title'),
        ),
        array(
            'subtitle' => esc_html__('Set text color', 'kinglaw'),
            'id' => 'footer_text_color',
            'type' => 'color',
            'title' => esc_html__('Text Color', 'kinglaw'),
            'default' => '',
            'output'  => array('body #cms-footer-top, #colophon #cms-footer-top .cms-footer-top-item .widget_text, #colophon #cms-footer-top .widget ul li'),
        ),
        array(
            'subtitle' => esc_html__('Set link color', 'kinglaw'),
            'id' => 'footer_link_color',
            'type' => 'color',
            'title' => esc_html__('Link Color', 'kinglaw'),
            'default' => '$primary_color',
            'output'  => array('body #colophon #cms-footer-top .cms-recent-post ul li a, body #colophon #cms-footer-top .widget_nav_menu ul li a, body #colophon #cms-footer-top .widget_footer_info li a'),
        ),
        array(
            'subtitle' => esc_html__('Set icon color', 'kinglaw'),
            'id' => 'footer_icon_color',
            'type' => 'color',
            'title' => esc_html__('Icon Color', 'kinglaw'),
            'default' => '$primary_color',
            'output'  => array('#colophon #cms-footer-top .widget ul li i, #colophon #cms-footer-top .cms-recent-post ul li:before, #colophon #cms-footer-top .widget_nav_menu ul li:before'),
        ),

        array(
            'subtitle' => esc_html__('Set link color hover', 'kinglaw'),
            'id' => 'footer_link_color_hover',
            'type' => 'color',
            'title' => esc_html__('Link Color Hover', 'kinglaw'),
            'default' => '$primary_color',
            'output'  => array('body #colophon #cms-footer-top .cms-recent-post ul li a:hover, body #colophon #cms-footer-top .widget_nav_menu ul li a:hover, body #colophon #cms-footer-top .widget_footer_info li a:hover'),
        ),
        array(
            'title' => esc_html__('Footer Bottom', 'kinglaw'),
            'type'  => 'section',
            'id' => 'footer_bottom_start',
            'indent' => true
        ),
        array(
            'subtitle' => esc_html__('Set text color', 'kinglaw'),
            'id' => 'footer_bottom_text_color',
            'type' => 'color',
            'title' => esc_html__('Text Color', 'kinglaw'),
            'default' => '',
            'output'  => array('body #cms-footer-bottom'),
        ),
        array(
            'subtitle' => esc_html__('Set link color', 'kinglaw'),
            'id' => 'footer_bottom_link_color',
            'type' => 'color',
            'title' => esc_html__('Link Color', 'kinglaw'),
            'default' => '',
            'output'  => array('body #cms-footer-bottom a, body #cms-footer-bottom .cms-footer-bottom-item1 a'),
        ),
        array(
            'subtitle' => esc_html__('Set link color hover', 'kinglaw'),
            'id' => 'footer_bottom_link_color_hover',
            'type' => 'color',
            'title' => esc_html__('Link Color Hover', 'kinglaw'),
            'default' => '$primary_color',
            'output'  => array('body #cms-footer-bottom a:hover, body #cms-footer-bottom .cms-footer-bottom-item1 a:hover'),
        ),
        array(
            'id'=>'cms_copyright',
            'type' => 'textarea',
            'title' => esc_html__('Copyright Right', 'kinglaw'),
            'validate' => 'html_custom',
            'default' => '© 2018 King Law made by <a target="_blank" href="http://themenovo.com ">ThemeNovo</a>',
            'allowed_html' => array(
                'a' => array(
                    'href' => array(),
                    'title' => array()
                ),
                'br' => array(),
                'em' => array(),
                'strong' => array(),
                'span' => array(),
            )
        ),
    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('404', 'kinglaw'),
    'icon' => 'el el-stop',
    'fields' => array(
        array(
            'title' => esc_html__('Background Image', 'kinglaw'),
            'id' => 'bg_404',
            'type' => 'media',
            'url' => false,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/pt-404.jpg'
            )
        ),
    )
));


/**
 * Styling
 * css color.
 * 
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Styling', 'kinglaw'),
    'icon' => 'el-icon-adjust',
    'fields' => array(
        array(
            'subtitle' => esc_html__('Set primary color.', 'kinglaw'),
            'id' => 'primary_color',
            'type' => 'color',
            'title' => esc_html__('Primary Color', 'kinglaw'),
            'default' => '#c29765'
        ),
        array(
            'subtitle' => esc_html__('Set link color.', 'kinglaw'),
            'id' => 'link_color',
            'type' => 'color',
            'title' => esc_html__('Link Color', 'kinglaw'),
            'default' => '#c29765',
            'output'  => array('a'),
        ),
        array(
            'subtitle' => esc_html__('Set link color hover.', 'kinglaw'),
            'id' => 'link_color_hover',
            'type' => 'color',
            'title' => esc_html__('Link Color Hover', 'kinglaw'),
            'default' => '#c29765',
            'output'  => array('a:hover'),
        ),
    )
));

/**
 * Typography
 * 
 * 
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Typography', 'kinglaw'),
    'icon' => 'el-icon-text-width',
    'fields' => array(
        array(
            'id' => 'font_body',
            'type' => 'typography',
            'title' => esc_html__('Body Font', 'kinglaw'),
            'google' => true,
            'font-backup' => false,
            'all_styles' => true,
            'output'  => array('body'),
            'units' => 'px',
            'text-align' => false,
            'subtitle' => esc_html__('Typography option with each property can be called individually.', 'kinglaw'),
            'default' => array(
                'color' => '#9b9b9b',
                'font-style' => '',
                'font-weight' => '',
                'font-family' => 'Poppins',
                'google' => true,
                'font-size' => '14px',
                'line-height' => '23px',
            )
        ),

        array(
            'id' => 'font_h1',
            'type' => 'typography',
            'title' => esc_html__('H1', 'kinglaw'),
            'google' => true,
            'font-backup' => false,
            'all_styles' => true,
            'text-align' => false,
            'output'  => array('h1'),
            'units' => 'px',
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-weight' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => '',
            )
        ),

        array(
            'id' => 'font_h2',
            'type' => 'typography',
            'title' => esc_html__('H2', 'kinglaw'),
            'google' => true,
            'font-backup' => false,
            'all_styles' => true,
            'text-align' => false,
            'output'  => array('h2'),
            'units' => 'px',
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-weight' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => '',
            )
        ),
        array(
            'id' => 'font_h3',
            'type' => 'typography',
            'title' => esc_html__('H3', 'kinglaw'),
            'google' => true,
            'font-backup' => false,
            'all_styles' => true,
            'text-align' => false,
            'output'  => array('h3'),
            'units' => 'px',
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-weight' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => '',
            )
        ),
        array(
            'id' => 'font_h4',
            'type' => 'typography',
            'title' => esc_html__('H4', 'kinglaw'),
            'google' => true,
            'font-backup' => false,
            'all_styles' => true,
            'text-align' => false,
            'output'  => array('h4'),
            'units' => 'px',
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-weight' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => '',
            )
        ),
        array(
            'id' => 'font_h5',
            'type' => 'typography',
            'title' => esc_html__('H5', 'kinglaw'),
            'google' => true,
            'font-backup' => false,
            'all_styles' => true,
            'text-align' => false,
            'output'  => array('h5'),
            'units' => 'px',
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-weight' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => '',
            )
        ),
        array(
            'id' => 'font_h6',
            'type' => 'typography',
            'title' => esc_html__('H6', 'kinglaw'),
            'google' => true,
            'font-backup' => false,
            'all_styles' => true,
            'text-align' => false,
            'output'  => array('h6'),
            'units' => 'px',
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-weight' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => '',
            )
        ),
    )
));

/* Extra Font. */
$custom_font_1 = Redux::getOption($opt_name, 'google-font-selector-1');
$custom_font_1 = !empty($custom_font_1) ? explode(',', $custom_font_1) : array();

Redux::setSection($opt_name, array(
    'title' => esc_html__('Extra Fonts', 'kinglaw'),
    'icon' => 'el el-fontsize',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'google-font-1',
            'type' => 'typography',
            'title' => esc_html__('Custom Font', 'kinglaw'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  =>  $custom_font_1,
            'units' => 'px',
            'subtitle' => esc_html__('Typography option with each property can be called individually.', 'kinglaw'),
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-weight' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => '',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'google-font-selector-1',
            'type' => 'textarea',
            'title' => esc_html__('Selector 1', 'kinglaw'),
            'subtitle' => esc_html__('add html tags ID or class (body,a,.class,#id)', 'kinglaw'),
            'validate' => 'no_html',
            'default' => '',
        )
    )
));

/**
 * Blog Option
 * 
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Blog', 'kinglaw'),
    'icon' => 'el el-blogger',
    'subsection' => false,
    'fields' => array(
        array(
            'id'       => 'blog_sidebar',
            'type'     => 'button_set',
            'title'    => esc_html__('Set sidebar for Blog', 'kinglaw'),
            'options' => array(
                'left-sidebar' => 'Sidebar Left', 
                'no-sidebar' => 'No Sidebar', 
                'right-sidebar' => 'Sidebar Right'
             ), 
            'default' => 'right-sidebar'
        ),
    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Single Post', 'kinglaw'),
    'icon' => 'el el-file-edit',
    'subsection' => true,
    'fields' => array(
        array(
            'id'       => 'single_sidebar',
            'type'     => 'button_set',
            'title'    => esc_html__('Set sidebar for Single Post', 'kinglaw'),
            'options' => array(
                'left-sidebar' => 'Sidebar Left', 
                'no-sidebar' => 'No Sidebar', 
                'right-sidebar' => 'Sidebar Right'
             ), 
            'default' => 'right-sidebar'
        ),
        array(
            'id'       => 'post_comment',
            'type'     => 'button_set',
            'title' => esc_html__('Show/Hide Comment', 'kinglaw'),
            'options' => array(
                'show' => 'Show', 
                'hide' => 'Hide',
             ), 
            'default' => 'show'
        ),
        array(
            'id'       => 'post_author',
            'type'     => 'button_set',
            'title' => esc_html__('Show/Hide Author Info', 'kinglaw'),
            'options' => array(
                'show' => 'Show', 
                'hide' => 'Hide',
             ), 
            'default' => 'hide'
        ),
    )
));

/**
 * Attorney Option
 * 
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Attorney', 'kinglaw'),
    'icon' => 'fa fa-building',
    'subsection' => false,
    'fields' => array(
        array(
            'title' => esc_html__('Background Images', 'kinglaw'),
            'subtitle' => esc_html__('Change background image for Page Title', 'kinglaw'),
            'id' => 'attorney_bg_page_title',
            'type' => 'media',
            'url' => false,
            'default' => '',
        ),
    )
));

/**
 * Servies Option
 * 
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Service', 'kinglaw'),
    'icon' => 'fa fa-cogs',
    'subsection' => false,
    'fields' => array(
        array(
            'title' => esc_html__('Background Images', 'kinglaw'),
            'subtitle' => esc_html__('Change background image for Page Title', 'kinglaw'),
            'id' => 'service_bg_page_title',
            'type' => 'media',
            'url' => false,
            'default' => '',
        ),
    )
));

/**
 * Optimal Core
 * 
 * Optimal options for theme. optimal speed
 * 
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Optimal Core', 'kinglaw'),
    'icon' => 'el-icon-idea',
    'fields' => array(
        array(
            'subtitle' => esc_html__('no minimize , generate css over time...', 'kinglaw'),
            'id' => 'dev_mode',
            'type' => 'switch',
            'title' => esc_html__('Dev Mode (not recommended)', 'kinglaw'),
            'default' => true
        )
    )
));

/* Social Media */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Social Media', 'kinglaw'),
    'icon' => 'el el-twitter',
    'subsection' => false,
    'fields' => array(
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

        array(
            'id' => 'social_linkedin_url',
            'type' => 'text',
            'title' => esc_html__('Linkedin URL', 'kinglaw'),
            'default' => '',
        ),

    )
));
