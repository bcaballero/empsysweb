<?php
/**
 * The template for displaying Archive Service - Postype UI
 *
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 *
 */
get_header(); 
?>
<div id="page-service-categories">
    <div class="container">
        <div class="row">
            <?php
            	$term = get_term_by( 'slug', get_query_var( 'service_categories' ), get_query_var( 'taxonomy' ) );
                echo apply_filters('the_content','[cms_grid col_xs="1" col_sm="1" col_md="1" col_lg="1" source="size:10|order_by:date|post_type:service|tax_query:'.$term->term_id.'" cms_template="cms_grid--service.php"]');
            ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>