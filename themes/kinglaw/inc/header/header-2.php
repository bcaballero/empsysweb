<?php
/**
 * @name : Default Header
 * @package : CMSSuperHeroes
 * @author : Fox
 */
global $opt_theme_options;

?>
<div id="cshero-header-inner" class="header-2">
    <div id="cshero-header-wrapper">
        <?php if(class_exists('EF3_Framework')) { ?>
            <div id="cshero-header-top" class="cshero-topbar header-top">
                <div class="container">
                    <div class="cms-topbar-inner">
                        <ul class="cms-top-info">
                            <?php if ($opt_theme_options['top_bar_phone'] || $opt_theme_options['phone_link']) { ?>
                                <li class="li-phone"><i class="fa fa-phone" aria-hidden="true"></i>
                                    <a href="tel:<?php echo esc_attr($opt_theme_options['phone_link']);?>"><?php echo esc_attr($opt_theme_options['top_bar_phone']);?></a>
                                </li>
                            <?php } ?>
                            <?php if ($opt_theme_options['top_bar_email']) { ?>
                                <li class="li-email"><i class="fa fa-envelope" aria-hidden="true"></i>
                                    <a href="mailto:<?php echo esc_attr($opt_theme_options['top_bar_email']);?>"><?php echo esc_attr($opt_theme_options['top_bar_email']);?></a>
                                </li>
                            <?php } ?>
                            <?php if ($opt_theme_options['top_bar_time']) { ?>
                                <li class="li-time"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <span class="cshero-box-title"><?php echo esc_attr($opt_theme_options['top_bar_time']);?></span>
                                </li>
                            <?php } ?>
                        </ul>
                        <?php kinglaw_top_social();?>
                        <div class="cshero-navigation-right hidden-xs hidden-sm">
                            <?php if ($opt_theme_options['show_search_icon']) { ?>
                                <div class="h-search-wrapper h-icon">
                                    <i class="search open-search fa fa-search"></i>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div id="cshero-header-holder">
            <div id="cshero-header" class="<?php kinglaw_header_class('cshero-main-header'); ?>">
                <div class="container">
                    <div class="row">
                        <div id="cshero-header-logo" class="col-xs-12 col-sm-5 col-md-2 col-lg-3">
                            <?php kinglaw_header_logo_light(); ?>
                        </div><!-- #site-logo -->
                        <div id="cshero-header-navigation" class="effect-line col-xs-12 col-sm-7 col-md-10 col-lg-9">
                            <div class="cshero-header-navigation-inner clearfix">
                                <div id="cshero-header-navigation-primary" class="cshero-header-navigation">
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
