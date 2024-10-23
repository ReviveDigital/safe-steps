<?php
get_header();
include(locate_template('inc/banners.php')); ?>

<div class="container">
	<div class="sub-pages sub-pages__container">
		<div class="sub-pages__left">

			<?php
			include(locate_template('inc/flex.php')); ?>
			
			<div class="sub-pages__funders">
				<?php if($post->ID == 336) { ?>
					<?php
					if( have_rows('funders') ): 
					    while( have_rows('funders') ) : the_row(); ?>
					    	<?php
							$funderLogo = get_sub_field('image');
							$image = wp_get_attachment_image_src( $funderLogo, 'funder-logo' );
							$alt = get_post_meta($funderLogo, '_wp_attachment_image_alt', true);
							?>
							<div class="sub-pages__funders-block">
								<?php if(get_sub_field('link')) { ?>
									<a href="<?php the_sub_field('link'); ?>" target="_blank">
										<img src="<?php echo $image[0]; ?>" class="sub-pages__funders-img" alt="<?php if($alt) { echo $alt; } else { echo the_title(); } ?>" />
									</a>
								<?php } else { ?>
									<img src="<?php echo $image[0]; ?>" class="sub-pages__funders-img" alt="<?php if($alt) { echo $alt; } else { echo the_title(); } ?>" />
								<?php } ?>
							</div>
					    <?php endwhile; ?>
					<?php endif; ?>
				<?php } ?>
			</div>
			
			<?php if( $post->ID == 226) { ?>

				<h2 class="sub-pages__opportunity-subtitle">Our current opportunities</h2>

				<?php
				if( have_rows('opportunities') ):
				    while ( have_rows('opportunities') ) : the_row(); ?>
				    	<div class="sub-pages__opportunity">
							<div class="sub-pages__opportunity-title">
								<?php the_sub_field('title'); ?>
							</div>
							<ul class="sub-pages__opportunity-list">
								<li class="sub-pages__opportunity-list-item">
									<?php the_sub_field('location'); ?>
								</li>
								<li class="sub-pages__opportunity-list-item">
									<?php the_sub_field('type'); ?>
								</li>
							</ul>
							<div class="sub-pages__opportunity-text">
								<?php the_sub_field('text'); ?>
							</div>
						</div>
				    <?php endwhile; ?>
				<?php endif; ?>

				<div class="sub-pages__opportunity-cta">
					<div class="sub-pages__opportunity-cta-title">
						Want to enquire about one of our opportunities? 
					</div>

					<div class="sub-pages__opportunity-cta-inner">
						<a href="mailto:volunteer@safesteps.org.uk" class="sub-pages__opportunity-cta-email">
							<i class="fa fa-envelope"></i> volunteer@safesteps.org.uk
						</a>
						<a href="<?php echo esc_url( home_url( '/about-us/contact-us/' ) );?>" class="sub-pages__opportunity-cta-button">
							Contact us online
						</a>
					</div>
				</div>
			<?php } ?>

			
			<?php if (is_page(336) || (is_page(358)) || (is_page(277)) ) { ?>
			<?php } else { ?>
			<div class="cta">
				<div class="cta__inner">
					<div class="cta__title">Get in touch</div>

					<?php if( $post->post_parent == 288) { ?>
						<a href="tel:<?php echo str_replace(' ','',get_field('childrens_number', 'option')); ?>" class="cta__phone"><?php the_field('childrens_number', 'option'); ?></a>
					<?php } else { ?>
						<a href="tel:<?php echo str_replace(' ','',get_field('adults_number', 'option')); ?>" class="cta__phone"><?php the_field('adults_number', 'option'); ?></a>
					<?php } ?>
					<div class="cta__btn">
						<a href="<?php echo esc_url( home_url( '/get-help/' ) );?>" class="cta__button">
							Get help
						</a>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>

		<?php 
		if ( $post->post_parent ) { ?>
			<div class="sub-pages__right">
				<div class="sub-pages__nav">
					<h2 class="sub-pages__subtitle">
						How can we help you?
					</h2>
					<ul class="sub-pages__list">
						<?php
					    $side_nav = array('child_of' => $post->post_parent, 'sort_column' => 'menu_order', 'title_li' => __(''));
					    wp_list_pages( $side_nav ); ?>
					</ul>
				</div>
			</div>
		<?php } ?>
	</div>
</div>

<?php 
include(locate_template('inc/get-involved.php'));
 get_footer(); ?>