<?php
// Template Name: About Us
get_header();
include(locate_template('inc/banners.php')); ?>

<div class="about-us">
	<div class="container">
		<div class="about-us__container">
			<div class="about-us__left">
				<div class="about-us__left-text">
					<?php the_field('footer_text','option'); ?>
				</div>
			</div>
			<div class="about-us__right">
				<?php the_content(); ?>
			</div>
		</div>
	</div>

	<?php if(get_field('testimonials')) { ?>

		<div class="about-us__testimonials">
			<div class="container">
				<div class="swiper-container">
					<div class="swiper-wrapper">
						<?php
							if( have_rows('testimonials') ):
							    while ( have_rows('testimonials') ) : the_row(); ?>
									<div class="swiper-slide">
										<div class="about-us__testimonials-title">
											<?php the_sub_field('title'); ?>
										</div>
										<div class="about-us__testimonials-text">
											<?php the_sub_field('text'); ?>
										</div>
									</div>
						    <?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>

	<?php } ?>

	<div class="container">
		<div class="about-us__buttons">
			<div class="about-us__container">
				
		    	<a href="<?php echo esc_url( home_url( '/about-us/our-organisation/' ) );?>" class="about-us__large-button">
					<img src="<?php echo get_template_directory_uri(); ?>/images/history.png" class="about-us__large-button-icon" alt="Our history & governance" />
					<span class="about-us__large-button-title">
						Our Organisation
					</span>
				</a>

				<a href="<?php echo esc_url( home_url( 'about-us/governance/' ) );?>" class="about-us__large-button">
					<img src="<?php echo get_template_directory_uri(); ?>/images/future.png" class="about-us__large-button-icon" alt="Our strategy for the future" />
					<span class="about-us__large-button-title">
						Governance
					</span>
				</a>
			</div>
		</div>
	</div>
</div>

<?php 
include(locate_template('inc/get-involved.php'));
get_footer(); ?>