<?php
/**
 * @internal never define functions inside callbacks.
 * these functions could be run multiple times; this would result in a fatal error.
 */
 
/**
 * custom option and settings
 */
function emp_settings_init() {
	// register a new setting for "emp" page
	register_setting( 'emp', 'emp_options' );

	// register a new section in the "wporg" page
	add_settings_section(
		'emp_section_developers',
		__('Maid search API Config.','emp'),
		'emp_section_developers_cb',
		'emp'
	);

	add_settings_field(
		'emp_field_page',
		__('Search Page', 'emp'),
		'emp_field_page_cb',
		'emp',
		'emp_section_developers',
		[
			'label_for' => 'emp_field_page',
			'class' => 'emp_row',
			'emp_custom_data' => 'custom',
		]
	);

	add_settings_field(
		'emp_field_page_cn',
		__('Search Page (CN) <br /><small>CN Page for zh locale.</small>', 'emp'),
		'emp_field_page_cn_cb',
		'emp',
		'emp_section_developers',
		[
			'label_for' => 'emp_field_page_cn',
			'class' => 'emp_row',
			'emp_custom_data' => 'custom',
		]
	);

	add_settings_field(
		'emp_field_host',
		__('Search API Host', 'emp'),
		'emp_field_host_cb', 
		'emp',
		'emp_section_developers',
		[
			'label_for' => 'emp_field_host',
			'class' => 'emp_row',
			'emp_custom_data' => 'custom',
		]
	);

	add_settings_field(
		'emp_field_endpoint',
		__('Search API Endpoint', 'emp'),
		'emp_field_endpoint_cb', 
		'emp',
		'emp_section_developers',
		[
			'label_for' => 'emp_field_endpoint',
			'class' => 'emp_row',
			'emp_custom_data' => 'custom',
		]
	);

	add_settings_field(
		'emp_field_inquiry_form',
		__('Employer Inquiry Form shortcode <br /><small>(e.g. Contact Form 7, Gravity Form)</small>', 'emp'),
		'emp_field_inquiry_form_cb', 
		'emp',
		'emp_section_developers',
		[
			'label_for' => 'emp_field_inquiry_form',
			'class' => 'emp_row',
			'emp_custom_data' => 'custom',
		]
    );
    
    add_settings_field(
		'emp_field_inquiry_form_cn',
		__('Employer Inquiry Form shortcode [CN]<br /><small>(e.g. Contact Form 7, Gravity Form)</small>', 'emp'),
		'emp_field_inquiry_form_cn_cb', 
		'emp',
		'emp_section_developers',
		[
			'label_for' => 'emp_field_inquiry_form_cn',
			'class' => 'emp_row',
			'emp_custom_data' => 'custom',
		]
	);
}
 
/**
 * register our wporg_settings_init to the admin_init action hook
 */
add_action( 'admin_init', 'emp_settings_init' );
 
/**
 * custom option and settings:
 * callback functions
 */
 
// developers section cb
 
// section callbacks can accept an $args parameter, which is an array.
// $args have the following keys defined: title, id, callback.
// the values are defined at the add_settings_section() function.
function emp_section_developers_cb($args) {
?>
	<!--
		<p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'Follow the white rabbit.', 'emp' ); ?></p>
	-->
<?php
}

function emp_field_host_cb($args) {
	$options = get_option( 'emp_options' );
?>
	<input type="text" name="emp_options[<?php echo esc_attr($args['label_for']); ?>]" value="<?php echo isset( $options[ $args['label_for'] ] ) ? ( $options[$args['label_for']] ) : ( '' ); ?>" style="min-width:400px;"/>
<?php
}

function emp_field_endpoint_cb($args) {
	$options = get_option( 'emp_options' );
?>
	<input type="text" name="emp_options[<?php echo esc_attr($args['label_for']); ?>]" value="<?php echo isset( $options[ $args['label_for'] ] ) ? ( $options[$args['label_for']] ) : ( '' ); ?>" style="min-width:400px;"/>
<?php
}

function emp_field_inquiry_form_cb($args) {
	$options = get_option( 'emp_options' );
?>
	<input type="text" name="emp_options[<?php echo esc_attr($args['label_for']); ?>]" value="<?php echo isset( $options[ $args['label_for'] ] ) ? ( str_replace('"', "'", $options[$args['label_for']]) ) : ( '' ); ?>" style="min-width:400px;"/>
<?php
}

function emp_field_inquiry_form_cn_cb($args) {
	$options = get_option( 'emp_options' );
?>
	<input type="text" name="emp_options[<?php echo esc_attr($args['label_for']); ?>]" value="<?php echo isset( $options[ $args['label_for'] ] ) ? ( str_replace('"', "'", $options[$args['label_for']]) ) : ( '' ); ?>" style="min-width:400px;"/>
<?php
}

function emp_field_page_cb($args) {
	$options = get_option( 'emp_options' );
	wp_dropdown_pages(
        array(
             'name' => 'emp_options[' . esc_attr($args['label_for']) . ']',
             'echo' => 1,
             'show_option_none' => __( '&mdash; Select &mdash;' ),
             'option_none_value' => '0',
             'selected' => (isset($options[$args['label_for']])) ? $options[$args['label_for']] : 0
        )
    );
}

function emp_field_page_cn_cb($args) {
	$options = get_option( 'emp_options' );
	wp_dropdown_pages(
        array(
             'name' => 'emp_options[' . esc_attr($args['label_for']) . ']',
             'echo' => 1,
             'show_option_none' => __( '&mdash; Select &mdash;' ),
             'option_none_value' => '0',
             'selected' => (isset($options[$args['label_for']])) ? $options[$args['label_for']] : 0
        )
    );
}
 

/**
 * top level menu
 */
function emp_options_page() {
	// add top level menu page
	add_menu_page(
		'Maid Search',
		'Maid Search Options',
		'manage_options',
		'emp',
		'emp_options_page_html'
	);
}
 
/**
 * register our wporg_options_page to the admin_menu action hook
 */
add_action( 'admin_menu', 'emp_options_page' );
 
/**
 * top level menu:
 * callback functions
 */
function emp_options_page_html() {
	// check user capabilities
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	if ( isset( $_GET['settings-updated'] ) ) {
 		add_settings_error('emp_messages', 'emp_message', __( 'Settings Saved', 'emp' ), 'updated');
 	}

 	settings_errors( 'emp_messages' );
?>
	<div class="wrap">
 		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
 		<form action="options.php" method="post">
<?php
		settings_fields( 'emp' );
		do_settings_sections( 'emp' );
		submit_button('Save');
?>
		</form>
	</div>
<?php
}