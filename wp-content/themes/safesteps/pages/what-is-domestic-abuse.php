<?php
// Template Name: What Is Domestic Abuse
get_header();
include(locate_template('inc/banners.php')); ?>

<div class="container">
	<div class="sub-pages sub-pages__container">
		<div class="sub-pages__left">
			<?php the_content(); ?>
		</div>
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
	</div>
</div>

<div class="domestic">
	<div class="container">
		<h2 class="domestic__subtitle"><?php the_field('subtitle'); ?></h2>
		<div class="domestic__list">
			<?php
				if( have_rows('bullet_points') ):
				    while ( have_rows('bullet_points') ) : the_row(); ?>
						<div class="domestic__list-item">
							<div class="domestic__list-item-title">
								<?php the_sub_field('text'); ?>
							</div>
							<?php if(get_field('subtext')) { ?>
								<div class="domestic__list-text">
									<?php the_sub_field('subtext'); ?>
								</div>
							<?php } ?>
						</div>
			    <?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</div>

<div class="container">
	<div class="domestic__text">
		<?php the_field('domestic_text'); ?>
	</div>
</div>

<?php 
include(locate_template('inc/get-involved.php'));
 get_footer(); ?>