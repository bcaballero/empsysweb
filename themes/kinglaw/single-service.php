<?php
/**
 * The Template for displaying all single services
 *
*
 */
$_get_post_sidebar = kinglaw_single_service_sidebar();
get_header(); ?>
<div id="primary" class="container <?php echo esc_attr($_get_post_sidebar); ?>">
    <div class="row">
        <div id="content" class="<?php kinglaw_single_service_class();?>">
            <main id="main" class="site-main">
                <?php
                // Start the loop.
                while ( have_posts() ) : the_post();
                    ?>
                     <div class="single-services-wrap">
                        <?php 
                            // Include the single content template.
                            get_template_part( 'single-templates/single-service/content', get_post_format());
                        ?>
                    </div>
                    <?php 
                endwhile;
                ?>
            </main>        
        </div><!-- #main -->
        <?php if($_get_post_sidebar != 'is-no-sidebar'):
            get_sidebar('service');
        endif; ?>
    </div>
</div><!-- #primary -->
<?php get_footer(); ?>