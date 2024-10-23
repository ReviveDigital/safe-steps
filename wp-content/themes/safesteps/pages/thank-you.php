<?php
// Template Name: Thank You
get_header(); ?>

<div class="thank-you">
	<i class="fal fa-check-circle"></i>
		<?php if ($_GET['form'] == 'self') { ?>
			
			<h1 class="thank-you__title"><?php the_field('self_referral_title'); ?></h1>
			<div class="thank-you__text">
				<?php the_field('self_referral_text'); ?>
			</div>

		<?php } elseif ($_GET['form'] == 'young') { ?>

			<h1 class="thank-you__title"><?php the_field('young_people_title'); ?></h1>
			<div class="thank-you__text">
				<?php the_field('young_people_text'); ?>
			</div>

		<?php } ?>

		<?php if ($_GET['form'] == 'children') { ?>
		<h1 class="thank-you__title"><?php the_field('children_&_families_title'); ?></h1>
	    <div class="thank-you__text">
	    	<?php the_field('children_&_families_text'); ?>
	    </div>

	<?php } ?>
</div>

<?php get_footer(); ?>