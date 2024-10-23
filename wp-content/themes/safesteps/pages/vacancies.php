<?php
// Template Name: Vacancies
get_header();
include(locate_template('inc/banners.php')); ?>

<div class="container">
	<div class="sub-pages sub-pages__container">
		<div class="sub-pages__left">
			<div class="sub-pages__text">
				<?php the_content(); ?>
			</div>
			<h2 class="sub-pages__subtitle">Our current opportunities </h2>
			<?php
			if( have_rows('opportunities') ): 
			    while( have_rows('opportunities') ) : the_row(); ?>
			    	<div class="sub-pages__opportunity">
						<div class="sub-pages__opportunity-title"><?php the_sub_field('title'); ?></div>

						<ul class="sub-pages__opportunity-list">
							<?php if(get_sub_field('type')) { ?>
								<li class="sub-pages__opportunity-info"><strong>Length:</strong> <?php the_sub_field('type'); ?></li>
							<?php } ?>

							<?php if(get_sub_field('location')) { ?>
								<li class="sub-pages__opportunity-info"><strong>Location:</strong> <?php the_sub_field('location'); ?></li>
							<?php } ?>

							<?php if(get_sub_field('hours')) { ?>
								<li class="sub-pages__opportunity-info"><strong>Hours:</strong> <?php the_sub_field('hours'); ?></li>
							<?php } ?>

							<?php if(get_sub_field('annual_leave')) { ?>
								<li class="sub-pages__opportunity-info"><strong>Annual leave:</strong> <?php the_sub_field('annual_leave'); ?></li>
							<?php } ?>

							<?php if(get_sub_field('salary')) { ?>
								<li class="sub-pages__opportunity-info"><strong>Salary:</strong> <?php the_sub_field('salary'); ?></li>
							<?php } ?>

							<?php if(get_sub_field('pension')) { ?>
								<li class="sub-pages__opportunity-info"><strong>Pension:</strong> <?php the_sub_field('pension'); ?></v>
							<?php } ?>
						</ul>

						<div class="sub-pages__opportunity-description"><?php the_sub_field('description'); ?></div>

						<?php if(get_sub_field('closing_date')) { ?>
							<div class="sub-pages__opportunity-info"><strong>Closing date: <?php the_sub_field('closing_date'); ?></strong></div>
						<?php } ?>
					</div>
			    <?php endwhile; ?>
			<?php endif; ?>

			<div class="sub-pages__opportunity-cta">
				<div class="sub-pages__opportunity-subtitle">Want to enquire about one of our opportunities? </div>
				<div class="sub-pages__opportunity-inner">
					<div class="sub-pages__opportunity-block">
						<a href="mailto:<?php the_field('vacancies_email_address','option'); ?>" class="sub-pages__opportunity-email"><i class="fal fa-envelope"></i><?php the_field('vacancies_email_address','option'); ?></a>
					</div>
					<div class="sub-pages__opportunity-block">
						<a href="<?php echo esc_url( home_url( '/get-in-touch/' ) );?>" class="sub-pages__opportunity-button">Contact us online</a>
					</div>
				</div>
			</div>
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