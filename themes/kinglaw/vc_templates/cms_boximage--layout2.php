<?php
extract(shortcode_atts(array(         
    'image' => '',
    'image_icon' => '',
), $atts));
$html_id = cmsHtmlID('cms-boximage');
$atts['html_id'] = $html_id;

$image_url = '';
if (!empty($atts['image'])) {
    $attachment_image = wp_get_attachment_image_src($atts['image'], 'lager');
    $image_url = $attachment_image[0];
}
$image_url_ic = '';
if (!empty($atts['image_icon'])) {
    $attachment_image = wp_get_attachment_image_src($atts['image_icon'], 'lager');
    $image_url_ic = $attachment_image[0];
}
?>
<div id="<?php echo esc_attr($atts['html_id']);?>" class="cms-boximage cms-boximage-layout2">
	<div class="boximage-content">
		<div class="boximage-thumb">
			<?php if($image_url) {?>
				<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>" />
			<?php } ?>
			<?php if($image_url_ic) {?>
				<div class="cms-overlay">
					<div class="cms-svg">
						<img src="<?php echo esc_url($image_url_ic); ?>" alt="<?php echo esc_attr($title); ?>" />
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>