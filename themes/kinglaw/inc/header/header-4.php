<?php
/**
 * @name : Default Header
 * @package : CMSSuperHeroes
 * @author : Fox
 */
global $opt_theme_options;
?>
<div id="cshero-header-inner" class="header-4">
    <div id="cshero-header-wrapper">
        <?php if(class_exists('EF3_Framework')) { ?>
            <div id="cshero-header-top" class="cshero-topbar hidden-xs hidden-sm">
                <div class="container">
                    <?php if ( is_active_sidebar( 'topbar-menu' ) ) : ?>
                        <div class="row">
                            <?php dynamic_sidebar('topbar-menu');?>
                        </div>
                    <?php endif;?>
                    <div class="row">
                        <div id="cshero-header-logo-top" class="col-xs-12 col-sm-2 hidden-md col-lg-2">
                            <?php kinglaw_header_logo_one(); ?>
                        </div>
                        <div id="cshero-headerinfor-right" class="col-xs-12 col-sm-10 col-md-12 col-lg-10">
                            <ul class="list-item-info">
                                <?php if ($opt_theme_options['top_bar_phone'] || $opt_theme_options['phone_link'] || $opt_theme_options['top_bar_email']) { ?>
                                <li class="cms-item-info-topbar cshero-box-email">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <a class="cshero-box-title" href="tel:<?php echo esc_attr($opt_theme_options['phone_link']);?>">
                                        <?php echo esc_attr($opt_theme_options['top_bar_phone']);?>
                                    </a>
                                    <a class="cshero-box-title-label" href="mailto:<?php echo esc_attr($opt_theme_options['top_bar_email']);?>">
                                        <?php echo esc_attr($opt_theme_options['top_bar_email']);?>
                                    </a>
                                </li>
                                <?php } ?>
                                <?php if ($opt_theme_options['top_bar_address'] || $opt_theme_options['top_bar_address2']) { ?>
                                <li class="cms-item-info-topbar cshero-box-address">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <span class="cshero-box-title"><?php echo esc_attr($opt_theme_options['top_bar_address']);?></span>
                                    <span class="cshero-box-title-label"><?php echo esc_attr($opt_theme_options['top_bar_address2']);?></span>
                                </li>
                                <?php } ?>
                                <?php if ($opt_theme_options['top_bar_time'] || $opt_theme_options['top_bar_time_label']) { ?>
                                <li class="cms-item-info-topbar cshero-box-time">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <span class="cshero-box-title"><?php echo esc_attr($opt_theme_options['top_bar_time']);?></span>
                                    <span class="cshero-box-title-label"><?php echo esc_attr($opt_theme_options['top_bar_time_label']);?></span>
                                </li>
                                <?php } ?>
                                <li class="cms-list-item-social">
                                    <?php kinglaw_top_social();?>
                                </li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div id="cshero-header-holder">
            <div id="cshero-header" class="<?php kinglaw_header_class('cshero-main-header'); ?>">                
                <div class="container">
                    <div class="row">
                        <div id="cshero-header-logo" class="col-xs-12 hidden-5 hidden-md hidden-lg">
                            <?php kinglaw_header_logo(); ?>
                        </div><!-- #site-logo -->

                        <div id="cshero-header-navigation" class="effect-line col-xs-12 col-sm-7 col-md-10 col-lg-9">
                            <div class="cshero-header-navigation-inner clearfix">
                                <div id="cshero-header-navigation-primary" class="cshero-header-navigation">
                                    <div class="cshero-navigation-right hidden-xs hidden-sm">
                                        <?php if ($opt_theme_options['show_search_icon']) { ?>
                                            <div class="h-search-wrapper h-icon">
                                                <i class="search open-search fa fa-search"></i>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <nav id="site-navigation" class="main-navigation">
                                        <?php kinglaw_header_navigation_primary(); ?>
                                    </nav><!-- #site-navigation -->  
                                </div>
                            </div>
                        </div>
                        <div id="cshero-menu-mobile">
                            <i class="open-menu lnr lnr-menu"></i>
                            <?php if ($opt_theme_options['show_search_icon']) { ?>
                                <i class="open-search lnr lnr-magnifier"></i>
                            <?php } ?>
                        </div><!-- #menu-mobile -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



