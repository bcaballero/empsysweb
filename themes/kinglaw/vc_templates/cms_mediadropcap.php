<?php
extract(shortcode_atts(array(         
    'image' => '',                                          
    'number' => '',
    'title' => '',
    'position' => '',
), $atts));
$html_id = cmsHtmlID('cms-mediadropcap');
$atts['html_id'] = $html_id;

$image_url = '';
if (!empty($atts['image'])) {
    $attachment_image = wp_get_attachment_image_src($atts['image'], 'lager');
    $image_url = $attachment_image[0];
}

?>
<div id="<?php echo esc_attr($atts['html_id']);?>" class="cms-mediadropcap">
		<div class="row">
			<?php if(!empty($image_url)) { ?>
			<div class="col-xs-12 col-sm-5 col-md-5 mediadropcap-col-thumbnail">
				<div class="cms-mediadropcap-image">
					<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>" />
				</div>
			</div>
			<?php } ?>
			<div class="col-xs-12 col-sm-7 col-md-7 mediadropcap-col-content">
				<div class="entry-process">
					<?php if(!empty($number)) { ?>
				    	<span class="number-title"><?php echo wp_kses_post($number); ?></span>
					<?php } ?>
				    <h3 class="title">
				        <?php echo wp_kses_post($title); ?>
				    </h3>
				    <?php if(!empty($position)) { ?>
				    <div class="supb-title">
				        <?php echo wp_kses_post($position); ?>
				    </div>
				    <?php } ?>
			    </div>
		    </div>
	    </div>
</div>