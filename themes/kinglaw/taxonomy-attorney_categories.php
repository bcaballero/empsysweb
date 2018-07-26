<?php
/**
 * The template for displaying Archive Attorney - Postype UI
 *
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 *
 */
get_header(); 
?>
<div id="page-attorney-categories">
    <div class="container">
        <div class="row">
            <?php
            	$term = get_term_by( 'slug', get_query_var( 'attorney_categories' ), get_query_var( 'taxonomy' ) );
                echo apply_filters('the_content','[cms_grid col_xs="1" col_sm="2" col_md="3" col_lg="3" custom_fonts="true" google_fonts="font_family:Montserrat%3Aregular%2C700|font_style:700%20bold%20regular%3A700%3Anormal" source="size:6|order_by:date|post_type:attorney|tax_query:'.$term->term_id.'" cms_template="cms_grid--team.php"]');
            ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>