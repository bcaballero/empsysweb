<?php

/**
 * Auto create css from Meta Options.
 */
class CMSSuperHeroes_DynamicCss
{

    function __construct()
    {
        add_action('wp_head', array($this, 'generate_css'));
    }

    /**
     * generate css inline.
     *
     * 
     */
    public function generate_css()
    {
        echo '<style type="text/css" data-type="custom-css">'.$this->css_render().'</style>';
    }

    /**
     * header css
     *
     * 
     * @return string
     */
    public function css_render()
    {
        global $opt_theme_options, $opt_meta_options;
        ob_start();

          /* Start Style */
        if (is_page() && !empty($opt_meta_options['page_pagetitle_padding']['padding-top'])) {
            echo "body #cms-page-title { 
                padding-top: ".esc_attr($opt_meta_options['page_pagetitle_padding']['padding-top']).";
            }";
            //(isset($opt_meta_options['page_pagetitle_padding']['padding-top']) ||
        }
        if (is_page() && !empty($opt_meta_options['page_pagetitle_padding']['padding-bottom'])) {
            echo "body #cms-page-title {
                padding-bottom: ".esc_attr($opt_meta_options['page_pagetitle_padding']['padding-bottom']).";
            }";
            //(isset($opt_meta_options['page_pagetitle_padding']['padding-bottom']) ||
        }

        /* Page Title */
        if(!empty($opt_meta_options['custom_page_title']) && !empty($opt_meta_options['pagetitle_overlay']['rgba'])) {
            echo "body #cms-page-title:before {
                background-color:".esc_attr($opt_meta_options['pagetitle_overlay']['rgba']).";
            }";
        }

        if (is_page() && !empty($opt_meta_options['custom_page_title']) && (isset($opt_meta_options['page_title_padding']['padding-top']) || !empty($opt_meta_options['page_title_padding']['padding-top']))) {
            echo "#cms-page-title .cms-page-title-inner h1 { 
                padding-top: ".esc_attr($opt_meta_options['page_title_padding']['padding-top']).";
            }";
        }
        if (is_page() && !empty($opt_meta_options['custom_page_title']) && (isset($opt_meta_options['page_title_padding']['padding-bottom']) || !empty($opt_meta_options['page_title_padding']['padding-bottom']))) {
            echo "#cms-page-title .cms-page-title-inner h1 {
                padding-bottom: ".esc_attr($opt_meta_options['page_title_padding']['padding-bottom']).";
            }";
        }

        if (is_page() && (isset($opt_meta_options['page_content_padding']['padding-top'])) && $opt_meta_options['page_content_padding']['padding-top'] != 'px') {
            echo "body #cms-content.site-content { 
                padding-top: ".esc_attr($opt_meta_options['page_content_padding']['padding-top']).";
            }";
        }
        if (is_page() && (isset($opt_meta_options['page_content_padding']['padding-bottom']) || !empty($opt_meta_options['page_content_padding']['padding-bottom']))) {
            echo "body #cms-content.site-content {
                padding-bottom: ".esc_attr($opt_meta_options['page_content_padding']['padding-bottom']).";
            }";
        }

        if (is_page() && !empty($opt_meta_options['custom_page_title']) && !empty($opt_meta_options['page_title_color'])) {
            echo "#cms-theme #cms-page-title.page-title .cms-page-title-inner h1 {
                color: ".esc_attr($opt_meta_options['page_title_color']).";
            }";
        }

        if (is_page() && !empty($opt_meta_options['custom_page_title']) && !empty($opt_meta_options['page_title_font_size'])) {
            echo "#cms-theme #cms-page-title.page-title .cms-page-title-inner h1 {
                font-size: ".esc_attr($opt_meta_options['page_title_font_size']).";
            }";
        }

        if (is_page() && !empty($opt_meta_options['custom_page_title']) && !empty($opt_meta_options['page_title_line_height'])) {
            echo "#cms-theme #cms-page-title.page-title .cms-page-title-inner h1 {
                line-height: ".esc_attr($opt_meta_options['page_title_line_height']).";
            }";
        }
        if (is_page() && !empty($opt_meta_options['custom_page_title']) && !empty($opt_meta_options['breadcrumb_color'])) {
            echo "#cms-theme #cms-page-title .cms-breadcrumb .breadcrumbs li, #cms-theme #cms-page-title .cms-breadcrumb .breadcrumbs li a, #cms-theme #cms-page-title .cms-breadcrumb .breadcrumbs li::after {
                color: ".esc_attr($opt_meta_options['breadcrumb_color']).";
            }";
        }

        /* Header */
        if (is_page() && !empty($opt_meta_options['custom_page_title']) && !empty($opt_meta_options['main_logo_height']['height'])) {
            echo "@media screen and (min-width: 992px) { body #cshero-header-inner #cshero-header-logo a img, body #cshero-header-inner #cshero-header-logo-top a img  {
                height: ".esc_attr($opt_meta_options['main_logo_height']['height']).";
            }}";
        }
        
        /* Footer */
        if(!empty($opt_meta_options['custom_footer']) && !empty($opt_meta_options['bg_footer_color']['background-color'])) {
            echo "#cms-theme #colophon.site-footer::before {
                background-color:".esc_attr($opt_meta_options['bg_footer_color']['background-color']).";
            }";
        }
        if(!empty($opt_meta_options['custom_footer']) && !empty($opt_meta_options['bg_footer']['background-image'])) {
            echo "#cms-theme #colophon.site-footer {
                background-image: url(".$opt_meta_options['bg_footer']['background-image'].");
            }";
        }
        if(!empty($opt_meta_options['custom_footer']) && !empty($opt_meta_options['bg_footer_color_overlay']['rgba'])) {
            echo "#cms-theme #colophon.site-footer::before {
                background-color:".esc_attr($opt_meta_options['bg_footer_color_overlay']['rgba']).";
            }";
        }
        /* Custom CSS */
        if(!empty($opt_theme_options['custom_css']))
            echo esc_html($opt_theme_options['custom_css']);
        
        return ob_get_clean();
    }
}

new CMSSuperHeroes_DynamicCss();