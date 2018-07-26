<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * 
 */

global $opt_meta_options;
$attorney_meta = kinglaw_get_post_meta();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="sg-attorney-layout1">
		<div class="single-attorney-main">
			<div id="single-attorney-image-one" class="single-attorney-image">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-5 col-single-attorney-thumnail">
						<?php kinglaw_blog3_thumbnail(); ?>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-7 col-single-attorney-shortinfo">
						<div class="wg-title"><?php the_title();?></div>
						<div class="entry-position">
							<?php if($attorney_meta['attorney_major'] || $attorney_meta['attorney_position']):?>
								<?php echo esc_attr($attorney_meta['attorney_major']);?>
								<?php echo esc_attr($attorney_meta['attorney_position']);?>
							<?php endif;?>
						</div>
						<ul class="entry-attorney-info">
							<?php if($attorney_meta['phone_attorney']):?>
							<li class="phone-attor"><i class="fa fa-phone" aria-hidden="true"></i>
		                        <a class="entry-phone" href="tel:<?php echo esc_attr($attorney_meta['phone_attorney']); ?>"><?php echo esc_attr($attorney_meta['phone_attorney']); ?>
		                        </a>
							</li>
							<?php endif;?>
							<?php if($attorney_meta['e_mail']):?>
								<li class="email-attor"><i class="fa fa-envelope-open" aria-hidden="true"></i>
	                                <a href="mailto:<?php echo esc_attr($attorney_meta['e_mail']);?>">
	                                	<?php echo esc_attr($attorney_meta['e_mail']);?>
	                                </a>
								</li>
							<?php endif;?>
							<?php if($attorney_meta['skype_name']):?>
								<li class="skype-name"><i class="fa fa-skype" aria-hidden="true"></i>
									<a href="skype:<?php echo esc_attr($attorney_meta['skype_name']);?>?call">
										<?php echo esc_attr($attorney_meta['skype_name']);?>
									</a>
								</li>
							<?php endif;?>
						</ul>
						<div class="entry-meta-social">
							<?php kinglaw_attorney_social();?>
						</div>
						<div class="entry-attorney-excerpt">
							<?php echo esc_attr($attorney_meta['attorney_excerpt']);?>
						</div>
                        <a class="readmore" href="<?php echo esc_attr($attorney_meta['attorney_link']);?>">
                        	<?php echo esc_attr($attorney_meta['attorney_text']);?>
                        </a>
					</div>
				</div>
			</div>
			<div class="single-attorney-holder">
				<div class="single-attorney-content ">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
</article><!-- #post-## -->