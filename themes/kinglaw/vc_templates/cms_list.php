<?php
extract(shortcode_atts(array(                         
    'label' => 'Label',
    'lb_color' => '#565656',
    'email' => 'abc@gmail.com',  
    'em_color' => '#c29764'
), $atts));
$html_id = cmsHtmlID('cms-list');
$atts['html_id'] = $html_id;
?>
<?php if($label || $email):?>
<div id="<?php echo esc_attr($atts['html_id']);?>" class="cms-team">
	<div class="cms-list-item">
		<span class="cms-list-label" style="color: <?php echo esc_attr($lb_color);?>"><?php echo esc_attr($label); ?></span>
		<span class="cms-list-text"><a style="color: <?php echo esc_attr($em_color);?>" href="mailto:<?php echo esc_attr($email); ?>" class="cms-team-email"><?php echo esc_attr($email); ?></a></span>
	</div>
</div>
<?php endif;?>