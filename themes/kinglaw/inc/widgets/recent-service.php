<?php
add_action('widgets_init', 'cs_recent_service_carousel');

function cs_recent_service_carousel() {
    register_widget('CS_Recent_services_Carousel');
}

class CS_Recent_services_Carousel extends WP_Widget {

    function __construct() {
        parent::__construct(
                'cs_recent_service_carousel', esc_html__('CMS Recent Services', 'kinglaw'), array('description' => esc_html__('Recent Services Widget.', 'kinglaw'),)
        );
    }

    function widget($args, $instance) {
        extract($args);

        //$title = apply_filters('widget_title', empty($instance['title']) ? esc_html__('Recent services', 'kinglaw' ) : $instance['title'], $instance, $this->id_base);
        $show_date = (int) $instance['show_date'];
        $show_decs = (int) $instance['show_decs'];
        $number = (int) $instance['number'];

        echo '<aside id="cms-recent-services" class="widget widget_nav_menu">';

            $sticky = get_option('sticky_posts');
            $args = array(
                'posts_per_page' => $number,
                'post_type' => 'services',
                'post_status' => 'publish',
                'post__not_in'  => $sticky,
                'orderby' => 'date',
                'order' => 'DESC',
                'paged' => 1
            );

            $wp_query = new WP_Query($args);
            $extra_class = !empty($instance['extra_class']) ? $instance['extra_class'] : "";

            // no 'class' attribute - add one with the value of width
            if( strpos($before_widget, 'class') === false ) {
                $before_widget = str_replace('>', 'class="'. $extra_class . '"', $before_widget);
            }
            // there is 'class' attribute - append width value to it
            else {
                $before_widget = str_replace('class="', 'class="'. $extra_class . ' ', $before_widget);
            }
            ?>
            <?php if ($wp_query->have_posts()){ ?>
                <div class="cms-recent-post">
                    <ul class="cms-recent-services-wrapper menu">
                        <?php global $post; while ($wp_query->have_posts()): $wp_query->the_post(); ?>
                            <li class="menu-item clearfix">
                                <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
                <?php 
                wp_reset_postdata();
                wp_reset_query(); ?>
            <?php } else { ?>
                <span class="notfound">No post found!</span>
            <?php
            }
        echo '</aside>';
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $instance['title'] = $new_instance['title'];
        $instance['show_date'] = $new_instance['show_date'];
        $instance['show_decs'] = $new_instance['show_decs'];
        $instance['number'] = (int) $new_instance['number'];
        $instance['extra_class'] = $new_instance['extra_class'];

        return $instance;
    }

    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $show_date = isset($instance['show_date']) ? esc_attr($instance['show_date']) : '';
        $show_decs = isset($instance['show_decs']) ? esc_attr($instance['show_decs']) : '';
        if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
                     $number = 5;
        ?>
        <p>
            <label for="<?php echo ''.$this->get_field_id('title'); ?>"><?php esc_html_e( 'Title:', 'kinglaw' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo ''.$this->get_field_id('extra_class'); ?>">Extra Class:</label>
            <input class="widefat" id="<?php echo ''.$this->get_field_id('extra_class'); ?>" name="<?php echo esc_attr($this->get_field_name('extra_class')); ?>" value="<?php if(isset($instance['extra_class'])){echo esc_attr($instance['extra_class']);} ?>" />
        </p>
        <p>
            <label for="<?php echo ''.$this->get_field_id('number'); ?>"><?php esc_html_e( 'Number of post to show:', 'kinglaw' ); ?></label>
            <input id="<?php echo esc_attr( $this->get_field_id('number') ); ?>" name="<?php echo esc_attr( $this->get_field_name('number') ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" size="3" />
        </p>
        <?php
    }
}
?>