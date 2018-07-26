<?php

class CS_Social_Widget_sv extends WP_Widget {

    function __construct() {
        parent::__construct(
            'cs_social_widget_sv', // Base ID
            esc_html__('Social service', 'kinglaw'), // Name
            array('description' => esc_html__('Social Service', 'kinglaw'),) // Args
        );
    }

    function widget($args, $instance) {
        global $opt_theme_options;

        extract($args);
        if (!empty($instance['title'])) {
        $title = apply_filters('widget_title', empty($instance['title']) ? esc_html__('Social Servece', 'kinglaw' ) : $instance['title'], $instance, $this->id_base);
        }

        echo ''.$before_widget;

        if (!empty($title))
            echo ''.$before_title . $title . $after_title;
        echo "<ul>";

        if ($instance['facebook'] == 'yes') {
            echo '<li><a target="_blank" href="'.esc_url($opt_theme_options['social_facebook_url']).'"><i class="fa fa-facebook"></i></a></li>';
        }
        if ($instance['google'] == 'yes') {
            echo '<li><a target="_blank" href="'.esc_url($opt_theme_options['social_google_url']).'"><i class="fa fa-google-plus"></i></a></li>';
        }
        if ($instance['twitter'] == 'yes') {
            echo '<li><a target="_blank" href="'.esc_url($opt_theme_options['social_twitter_url']).'"><i class="fa fa-twitter"></i></a></li>';
        }
        if ($instance['youtube'] == 'yes') {
            echo '<li><a target="_blank" href="'.esc_url($opt_theme_options['social_youtube_url']).'"><i class="fa fa-youtube"></i></a></li>';
        }
        if ($instance['pinterest'] == 'yes') {
            echo '<li><a target="_blank" href="'.esc_url($opt_theme_options['social_pinterest_url']).'"><i class="fa fa-pinterest"></i></a></li>';
        }

        echo "</ul>";


        echo ''.$after_widget;
    }

    function update( $new_instance, $old_instance ) {
         $instance = $old_instance;
         $instance['title'] = strip_tags($new_instance['title']);

         $instance['facebook'] = strip_tags($new_instance['facebook']);
         $instance['google'] = strip_tags($new_instance['google']);
         $instance['twitter'] = strip_tags($new_instance['twitter']);
         $instance['youtube'] = strip_tags($new_instance['youtube']);
         $instance['pinterest'] = strip_tags($new_instance['pinterest']);
         return $instance;
    }

    function form( $instance ) {
         $title = isset($instance['title']) ? esc_attr($instance['title']) : '';

         $facebook = isset($instance['facebook']) ? esc_attr($instance['facebook']) : '';
         $google = isset($instance['google']) ? esc_attr($instance['google']) : '';
         $twitter = isset($instance['twitter']) ? esc_attr($instance['twitter']) : '';
         $youtube = isset($instance['youtube']) ? esc_attr($instance['youtube']) : '';
         $pinterest = isset($instance['pinterest']) ? esc_attr($instance['pinterest']) : '';
         ?>

        <p><label for="<?php echo ''.$this->get_field_id('title'); ?>"><?php esc_html_e( 'Title:', 'kinglaw' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
         <p><label for="<?php echo esc_url($this->get_field_id('facebook')); ?>"><?php esc_html_e( 'Facebook', 'kinglaw' ); ?></label>
         <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('facebook') ); ?>" name="<?php echo esc_attr( $this->get_field_name('facebook') ); ?>">
            <option value="no"<?php if( $facebook == 'no' ){ echo 'selected="selected"';} ?>><?php esc_html_e('No', 'kinglaw'); ?></option>
            <option value="yes"<?php if( $facebook == 'yes' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Yes', 'kinglaw'); ?></option>
         </select>
         </p>
         <p><label for="<?php echo esc_url($this->get_field_id('google')); ?>"><?php esc_html_e( 'Google', 'kinglaw' ); ?></label>
         <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('google') ); ?>" name="<?php echo esc_attr( $this->get_field_name('google') ); ?>">
            <option value="no"<?php if( $google == 'no' ){ echo 'selected="selected"';} ?>><?php esc_html_e('No', 'kinglaw'); ?></option>
            <option value="yes"<?php if( $google == 'yes' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Yes', 'kinglaw'); ?></option>
         </select>
         </p>
         <p><label for="<?php echo esc_url($this->get_field_id('twitter')); ?>"><?php esc_html_e( 'Twitter', 'kinglaw' ); ?></label>
         <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('twitter') ); ?>" name="<?php echo esc_attr( $this->get_field_name('twitter') ); ?>">
            <option value="no"<?php if( $twitter == 'no' ){ echo 'selected="selected"';} ?>><?php esc_html_e('No', 'kinglaw'); ?></option>
            <option value="yes"<?php if( $twitter == 'yes' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Yes', 'kinglaw'); ?></option>
         </select>
         </p>

         <p><label for="<?php echo esc_url($this->get_field_id('youtube')); ?>"><?php esc_html_e( 'Youtube', 'kinglaw' ); ?></label>
         <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('youtube') ); ?>" name="<?php echo esc_attr( $this->get_field_name('youtube') ); ?>">
            <option value="no"<?php if( $youtube == 'no' ){ echo 'selected="selected"';} ?>><?php esc_html_e('No', 'kinglaw'); ?></option>
            <option value="yes"<?php if( $youtube == 'yes' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Yes', 'kinglaw'); ?></option>
         </select>
         </p>

         <p><label for="<?php echo esc_url($this->get_field_id('pinterest')); ?>"><?php esc_html_e( 'Pinterest', 'kinglaw' ); ?></label>
         <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('pinterest') ); ?>" name="<?php echo esc_attr( $this->get_field_name('pinterest') ); ?>">
            <option value="no"<?php if( $pinterest == 'no' ){ echo 'selected="selected"';} ?>><?php esc_html_e('No', 'kinglaw'); ?></option>
            <option value="yes"<?php if( $pinterest == 'yes' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Yes', 'kinglaw'); ?></option>
         </select>
         </p>
         
    <?php
    }

}

/**
* Class CS_Social_Widget
*/

function register_social_widget_sv() {
    register_widget('CS_Social_Widget_sv');
}

add_action('widgets_init', 'register_social_widget_sv');
?>