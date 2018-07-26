<?php
extract(shortcode_atts(array(       
    'dropcap_content' => '',
    'font_size' => '15px',
    'text_align' => 'left',
    'drc_color' =>'#333',
    'letter_spacing' =>'0em',
    'custom_font_weight' =>'400',
    'font_style' =>'normal'
), $atts));
?>
<div class="cms-dropcap">
	<div class="cms-dropcap-content" style="font-size: <?php echo esc_attr($font_size);?>; color: <?php echo esc_attr($drc_color);?>; font-style: <?php echo esc_attr($font_style);?>; text-align: <?php echo esc_attr($text_align);?>; letter-spacing: <?php echo esc_attr($letter_spacing);?>; font-weight: <?php echo esc_attr($custom_font_weight);?>">
		<?php echo wp_kses_post($dropcap_content);?>
	</div>
</div>