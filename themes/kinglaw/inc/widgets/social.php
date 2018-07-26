<?php

class CS_Social_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'cs_social_widget', // Base ID
            esc_html__('Social', 'kinglaw'), // Name
            array('description' => esc_html__('Social Widget', 'kinglaw'),) // Args
        );
    }

    function widget($args, $instance) {
        global $opt_theme_options;

        extract($args);
        if (!empty($instance['title'])) {
        $title = apply_filters('widget_title', empty($instance['title']) ? esc_html__('Social', 'kinglaw' ) : $instance['title'], $instance, $this->id_base);
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
        if ($instance['linkedin'] == 'yes') {
            echo '<li><a target="_blank" href="'.esc_url($opt_theme_options['social_linkedin_url']).'"><i class="fa fa-linkedin"></i></a></li>';
        }
        if ($instance['skype'] == 'yes') {
            echo '<li><a target="_blank" href="'.esc_url($opt_theme_options['social_skype_url']).'"><i class="fa fa-skype"></i></a></li>';
        }
        if ($instance['youtube'] == 'yes') {
            echo '<li><a target="_blank" href="'.esc_url($opt_theme_options['social_youtube_url']).'"><i class="fa fa-youtube"></i></a></li>';
        }
        if ($instance['vimeo'] == 'yes') {
            echo '<li><a target="_blank" href="'.esc_url($opt_theme_options['social_vimeo_url']).'"><i class="fa fa-vimeo"></i></a></li>';
        }
        if ($instance['tumblr'] == 'yes') {
            echo '<li><a target="_blank" href="'.esc_url($opt_theme_options['social_tumblr_url']).'"><i class="fa fa-tumblr"></i></a></li>';
        }
        if ($instance['rss'] == 'yes') {
            echo '<li><a target="_blank" href="'.esc_url($opt_theme_options['social_rss_url']).'"><i class="fa fa-rss"></i></a></li>';
        }
        if ($instance['pinterest'] == 'yes') {
            echo '<li><a target="_blank" href="'.esc_url($opt_theme_options['social_pinterest_url']).'"><i class="fa fa-pinterest"></i></a></li>';
        }
        if ($instance['instagram'] == 'yes') {
            echo '<li><a target="_blank" href="'.esc_url($opt_theme_options['social_instagram_url']).'"><i class="fa fa-instagram"></i></a></li>';
        }
        if ($instance['yelp'] == 'yes') {
            echo '<li><a target="_blank" href="'.esc_url($opt_theme_options['social_yelp_url']).'"><i class="fa fa-yelp"></i></a></li>';
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
         $instance['linkedin'] = strip_tags($new_instance['linkedin']);
         $instance['skype'] = strip_tags($new_instance['skype']);
         $instance['youtube'] = strip_tags($new_instance['youtube']);
         $instance['vimeo'] = strip_tags($new_instance['vimeo']);
         $instance['tumblr'] = strip_tags($new_instance['tumblr']);
         $instance['rss'] = strip_tags($new_instance['rss']);
         $instance['pinterest'] = strip_tags($new_instance['pinterest']);
         $instance['instagram'] = strip_tags($new_instance['instagram']);
         $instance['yelp'] = strip_tags($new_instance['yelp']);

         return $instance;
    }

    function form( $instance ) {
         $title = isset($instance['title']) ? esc_attr($instance['title']) : '';

         $facebook = isset($instance['facebook']) ? esc_attr($instance['facebook']) : '';
         $google = isset($instance['google']) ? esc_attr($instance['google']) : '';
         $twitter = isset($instance['twitter']) ? esc_attr($instance['twitter']) : '';
         $linkedin = isset($instance['linkedin']) ? esc_attr($instance['linkedin']) : '';
         $skype = isset($instance['skype']) ? esc_attr($instance['skype']) : '';
         $youtube = isset($instance['youtube']) ? esc_attr($instance['youtube']) : '';
         $vimeo = isset($instance['vimeo']) ? esc_attr($instance['vimeo']) : '';
         $tumblr = isset($instance['tumblr']) ? esc_attr($instance['tumblr']) : '';
         $rss = isset($instance['rss']) ? esc_attr($instance['rss']) : '';
         $pinterest = isset($instance['pinterest']) ? esc_attr($instance['pinterest']) : '';
         $instagram = isset($instance['instagram']) ? esc_attr($instance['instagram']) : '';
         $yelp = isset($instance['yelp']) ? esc_attr($instance['yelp']) : '';
         ?>


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

         <p><label for="<?php echo esc_url($this->get_field_id('linkedin')); ?>"><?php esc_html_e( 'Linkedin', 'kinglaw' ); ?></label>
         <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('linkedin') ); ?>" name="<?php echo esc_attr( $this->get_field_name('linkedin') ); ?>">
            <option value="no"<?php if( $linkedin == 'no' ){ echo 'selected="selected"';} ?>><?php esc_html_e('No', 'kinglaw'); ?></option>
            <option value="yes"<?php if( $linkedin == 'yes' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Yes', 'kinglaw'); ?></option>
         </select>
         </p>

         <p><label for="<?php echo esc_url($this->get_field_id('skype')); ?>"><?php esc_html_e( 'Skype', 'kinglaw' ); ?></label>
         <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('skype') ); ?>" name="<?php echo esc_attr( $this->get_field_name('skype') ); ?>">
            <option value="no"<?php if( $skype == 'no' ){ echo 'selected="selected"';} ?>><?php esc_html_e('No', 'kinglaw'); ?></option>
            <option value="yes"<?php if( $skype == 'yes' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Yes', 'kinglaw'); ?></option>
         </select>
         </p>

         <p><label for="<?php echo esc_url($this->get_field_id('youtube')); ?>"><?php esc_html_e( 'Youtube', 'kinglaw' ); ?></label>
         <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('youtube') ); ?>" name="<?php echo esc_attr( $this->get_field_name('youtube') ); ?>">
            <option value="no"<?php if( $youtube == 'no' ){ echo 'selected="selected"';} ?>><?php esc_html_e('No', 'kinglaw'); ?></option>
            <option value="yes"<?php if( $youtube == 'yes' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Yes', 'kinglaw'); ?></option>
         </select>
         </p>

         <p><label for="<?php echo esc_url($this->get_field_id('vimeo')); ?>"><?php esc_html_e( 'Vimeo', 'kinglaw' ); ?></label>
         <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('vimeo') ); ?>" name="<?php echo esc_attr( $this->get_field_name('vimeo') ); ?>">
            <option value="no"<?php if( $vimeo == 'no' ){ echo 'selected="selected"';} ?>><?php esc_html_e('No', 'kinglaw'); ?></option>
            <option value="yes"<?php if( $vimeo == 'yes' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Yes', 'kinglaw'); ?></option>
         </select>
         </p>

         <p><label for="<?php echo esc_url($this->get_field_id('tumblr')); ?>"><?php esc_html_e( 'Tumblr', 'kinglaw' ); ?></label>
         <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('tumblr') ); ?>" name="<?php echo esc_attr( $this->get_field_name('tumblr') ); ?>">
            <option value="no"<?php if( $tumblr == 'no' ){ echo 'selected="selected"';} ?>><?php esc_html_e('No', 'kinglaw'); ?></option>
            <option value="yes"<?php if( $tumblr == 'yes' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Yes', 'kinglaw'); ?></option>
         </select>
         </p>

         <p><label for="<?php echo esc_url($this->get_field_id('rss')); ?>"><?php esc_html_e( 'Rss', 'kinglaw' ); ?></label>
         <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('rss') ); ?>" name="<?php echo esc_attr( $this->get_field_name('rss') ); ?>">
            <option value="no"<?php if( $rss == 'no' ){ echo 'selected="selected"';} ?>><?php esc_html_e('No', 'kinglaw'); ?></option>
            <option value="yes"<?php if( $rss == 'yes' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Yes', 'kinglaw'); ?></option>
         </select>
         </p>

         <p><label for="<?php echo esc_url($this->get_field_id('pinterest')); ?>"><?php esc_html_e( 'Pinterest', 'kinglaw' ); ?></label>
         <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('pinterest') ); ?>" name="<?php echo esc_attr( $this->get_field_name('pinterest') ); ?>">
            <option value="no"<?php if( $pinterest == 'no' ){ echo 'selected="selected"';} ?>><?php esc_html_e('No', 'kinglaw'); ?></option>
            <option value="yes"<?php if( $pinterest == 'yes' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Yes', 'kinglaw'); ?></option>
         </select>
         </p>

         <p><label for="<?php echo esc_url($this->get_field_id('instagram')); ?>"><?php esc_html_e( 'Instagram', 'kinglaw' ); ?></label>
         <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('instagram') ); ?>" name="<?php echo esc_attr( $this->get_field_name('instagram') ); ?>">
            <option value="no"<?php if( $instagram == 'no' ){ echo 'selected="selected"';} ?>><?php esc_html_e('No', 'kinglaw'); ?></option>
            <option value="yes"<?php if( $instagram == 'yes' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Yes', 'kinglaw'); ?></option>
         </select>
         </p>

         <p><label for="<?php echo esc_url($this->get_field_id('yelp')); ?>"><?php esc_html_e( 'Yelp', 'kinglaw' ); ?></label>
         <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('yelp') ); ?>" name="<?php echo esc_attr( $this->get_field_name('yelp') ); ?>">
            <option value="no"<?php if( $yelp == 'no' ){ echo 'selected="selected"';} ?>><?php esc_html_e('No', 'kinglaw'); ?></option>
            <option value="yes"<?php if( $yelp == 'yes' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Yes', 'kinglaw'); ?></option>
         </select>
         </p>
         
    <?php
    }

}

/**
* Class CS_Social_Widget
*/

function register_social_widget() {
    register_widget('CS_Social_Widget');
}
add_action('widgets_init', 'register_social_widget');
?>