<?php
// Template Name: Survivors Stories
get_header();
?>

<div class="banner">
	<div class="banner__image">
		<?php
		$banner = get_field('page_banner');
		$image = wp_get_attachment_image_src( $banner, 'page-banner' );
		$alt = get_post_meta($banner, '_wp_attachment_image_alt', true);
		?>
		<?php if ($image) { ?>
			<div class="banner__img" style="background-image:url(<?php echo $image[0];?>);"></div>
		<?php } else { ?>
			<div class="banner__img" style="background-image:url(<?php echo get_template_directory_uri(); ?>/images/no-banner.jpg);"></div>
		<?php } ?>
		<div class="container banner__container">
			<h1 class="banner__title">Experts by Experience Survivors Voices</h1>
		</div>
	</div>
	<div class="banner__bread">
		<div class="container">
			<?php if (!is_front_page() && function_exists('yoast_breadcrumb') ) {
				 yoast_breadcrumb('<div class="breadcrumbs">','</div>');
			} ?>
		</div>
	</div>
</div>

<div class="container">
	<div class="intro">
		<?php the_content(); ?>
	</div>
</div>

<div class="stories">
	<?php 
	$args = array('post_type' => 'stories', 'posts_per_page' => -1);
	$loop = new WP_Query( $args );
	if ( $loop->have_posts() ) {
	while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<div class="stories__block">
			<div class="container">
				<div class="stories__block-inner">
					<div class="stories__title"><?php the_title(); ?></div>
					<div class="stories__text"><?php the_content(); ?></div>
				</div>
			</div>
		</div>
	<?php endwhile; } wp_reset_query(); ?> 
</div>

<div class="sub-pages__cta">
	<?php include(locate_template('inc/cta.php')); ?>
</div>


<?php 
include(locate_template('inc/get-involved.php'));
 get_footer(); ?>