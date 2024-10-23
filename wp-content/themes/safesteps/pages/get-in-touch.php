<?php
// Template Name: Get In Touch
get_header();
include(locate_template('inc/banners.php')); ?>

<div class="container">
	<div class="contact__text">
		<?php the_content(); ?>
	</div>
	<div class="contact__container">
		<div class="contact__block">
			<a href="tel:<?php echo str_replace(' ','',get_field('adults_number', 'option')); ?>" class="contact__phone"><?php the_field('adults_number', 'option'); ?></a>
		</div>

<!-- 		<div class="contact__block">
			<div class="contact__subtitle">
				Children, teenager and family services
			</div>
			<a href="tel:<?php echo str_replace(' ','',get_field('childrens_number', 'option')); ?>" class="contact__phone"><?php the_field('childrens_number', 'option'); ?></a>
		</div>

		<div class="contact__block">
			<div class="contact__subtitle">
				Management, HR and Finance
			</div>
			<a href="tel:<?php echo str_replace(' ','',get_field('management_number', 'option')); ?>" class="contact__phone"><?php the_field('management_number', 'option'); ?></a>
		</div> -->

		<div class="contact__block">
			<a href="<?php echo esc_url( home_url( '/get-help/' ) );?>" class="contact__button">
				Get Help
			</a>
		</div>
	</div>

	<div class="contact__container contact__container--location">
		<div class="contact__left">
			<div class="contact__address-title">Visit Safe Steps</div>
			<div class="contact__address">
				<?php the_field('address','option'); ?>
			</div>

			<ul class="contact__social">
				<?php if(get_field('facebook','option')) { ?>
					<li class="contact__social-item">
						<a href="<?php the_field('facebook','option'); ?>" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt="SafeSteps on Facebook" class="contact__social-img">
						</a>
					</li>
				<?php } ?>
				<?php if(get_field('twitter','option')) { ?>
					<li class="contact__social-item">
						<a href="<?php the_field('twitter','option'); ?>" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/images/x-twitter.png" alt="SafeSteps on Twitter" class="contact__social-img">
						</a>
					</li>
				<?php } ?>
				<?php if(get_field('instagram','option')) { ?>
					<li class="contact__social-item">
						<a href="<?php the_field('instagram','option'); ?>" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/images/instagram.png" alt="SafeSteps on Instagram" class="contact__social-img">
						</a>
					</li>
				<?php } ?>
			</ul>

			<div class="contact__management">
				<div class="contact__address-title">General enquiries</div>
				<div class="contact__management-title">Tel:</div>
				<a href="tel:<?php echo str_replace(' ','',get_field('management_number', 'option')); ?>" class="contact__management-phone"><?php the_field('management_number', 'option'); ?></a>
				<div class="contact__management-title">Email:</div>
				<a href="mailto:<?php the_field('enquiries_email','option'); ?>" class="contact__management-email"><?php the_field('enquiries_email','option'); ?></a>
			</div>
		</div>
		<div class="contact__right">
			<?php $location = get_field('map','option'); if( !empty($location) ):?>
            <div class="acf-map">
            	<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
            </div>
            <?php endif; ?>
		</div>
	</div>
</div>

<?php 
include(locate_template('inc/get-involved.php')); 
get_footer(); ?>