<?php
/**
 * The template for displaying Author Archive pages
 *
 * Used to display archive-type pages for posts by an author.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
*
 */

$_get_sidebar = kinglaw_blog_sidebar();
get_header(); ?>

<div id="primary" class="container <?php echo esc_attr($_get_sidebar); ?>">
    <div class="row">
        <div id="content" class="<?php kinglaw_blog_class(); ?>">
            <main id="main" class="site-main">
                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();

                        get_template_part( 'single-templates/content/content', get_post_format() );

                    endwhile; // end of the loop.

                    /* blog nav. */
                    kinglaw_paging_nav();

                else :
                    /* content none. */
                    get_template_part( 'single-templates/content', 'none' );

                endif; ?>
                
            </main><!-- #content -->
        </div>
        
        <?php if($_get_sidebar != 'is-no-sidebar'):
            get_sidebar();
        endif; ?>
        <!-- #sidebar -->

    </div><!-- #primary -->
</div>

<?php get_footer(); ?>


