<?php
/**
 * @name : Default Header
 * @package : CMSSuperHeroes
 * @author : Fox
 */
global $opt_theme_options;
?>
<footer id="colophon" class="site-footer cms-footer1">
    <?php if ( is_active_sidebar( 'sidebar-footer-top-1' ) ) : ?>
        <div id="cms-footer-top">
            <div class="container">
                <div class="row">
                    <?php kinglaw_footer_top();?> 
                </div>
            </div>
        </div>
        <div class="boder-footer"></div>
    <?php endif; ?>
    <div id="cms-footer-bottom">
        <div class="container">
            <div class="row">
                <div class="cms-footer-bottom-item1 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php if(!empty($opt_theme_options['cms_copyright'])) { 
                        echo wp_kses_post($opt_theme_options['cms_copyright']);
                    } else {
                        echo '© '.date("Y").' Kinglaw by <a target="_blank" href="http://themenovo.com">ThemeNovo</a>';
                    } ?>
                </div>
            </div>
        </div>
    </div>
</footer><!-- .site-footer -->


