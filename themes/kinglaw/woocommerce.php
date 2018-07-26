<?php
/**
 * Custom Woocommerce shop page.
 */

$_get_sidebar = kinglaw_blog_sidebar();
get_header(); ?>

    <div id="primary" class="container">
        <div class="row">
            <div id="content" class="col-xs-12">
                <main id="main" class="site-main">
                    <?php woocommerce_content(); ?>
                </main><!-- #content -->
            </div>
        </div>
    </div><!-- #primary -->
    
<?php get_footer(); ?>