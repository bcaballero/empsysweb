<?php
/**
 * The template for displaying login form.
 *
 * Override this template by copying it to yourtheme/userpress/layoutname/form-login.php
 *
 * @author 		UserPress
 * @package 	UserPress/Templates
 * @version     1.0.0
 */

if (! defined ( 'ABSPATH' )) {
	exit (); // Exit if accessed directly
}
?>
<div class="user-press-login">
	<div class="login-form">
		<div class="fields-content">
			<div class="field-group">
				<input id="user" type="text" class="input user_name" placeholder="Username" data-validate="<?php esc_html_e('Required Field', 'kinglaw'); ?>">
			</div>
			<div class="field-group">
				<input id="pass" type="password" class="input password" placeholder="Password" data-validate="<?php esc_html_e('Required Field', 'kinglaw'); ?>">
			</div>
			<div class="field-group clearfix">
				<div class="cms-field-checkbox field-remember cms-field-check left">
					<input id="check2" type="checkbox" class="check" checked>
					<span class="icon-check"></span>
					<label for="check2"><?php esc_html_e('Remember!', 'kinglaw');?></label>
				</div>
				<div class="field-forget right">
					<a class="forget" href="<?php echo wp_lostpassword_url(get_permalink()); ?>"><?php esc_html_e('Forget Password?', 'kinglaw') ?></a>
				</div>
			</div>
		</div>
		<div class="fields-footer">
			<div class="field-group">
				<button type="button" class="button button-login btn-block btn btn-primary btn-circle"><?php esc_html_e('Sign In', 'kinglaw');?></button>
			</div>
		</div>
	</div>
</div>
