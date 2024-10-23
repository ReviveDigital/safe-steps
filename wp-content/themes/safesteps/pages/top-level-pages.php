<?php
// Template Name: Top Level Pages
get_header();
include(locate_template('inc/banners.php')); ?>

<div class="container">
	<div class="intro">
		<?php the_content(); ?>
	</div>

	<div class="sub-pages sub-pages__container sub-pages__container--main">
		<?php 
		$args = array('post_type' => 'page', 'post_parent' => $post->ID, 'orderby' => 'menu_order', 'post__not_in' => array(555), 'order' => 'ASC');
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
		while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<div class="sub-pages__block">
				<?php
				$thumb = get_field('thumbnail_image');
				$thumbImg = wp_get_attachment_image_src( $thumb, 'our-services-img' );
				$alt = get_post_meta($thumb, '_wp_attachment_image_alt', true);
				?>
				<a href="<?php the_permalink(); ?>">
					<?php if($thumb) { ?>
						<img src="<?php echo $thumbImg[0]; ?>" alt="<?php if($alt) { echo $alt; } else { echo the_title(); } ?>" class="sub-pages__block-img" />
					<?php } else { ?>
						<img src="<?php echo get_template_directory_uri(); ?>/images/no-image.jpg" alt="<?php if($alt) { echo $alt; } else { echo the_title(); } ?>" class="sub-pages__block-img" />
					<?php } ?>	
				</a>
				<a href="<?php the_permalink(); ?>" class="sub-pages__block-title">
					<?php the_title(); ?>
				</a>
				<a href="<?php the_permalink(); ?>" class="sub-pages__block-button">
					More information
				</a>
			</div>
		<?php endwhile; } wp_reset_query(); ?> 
	</div>

	<div class="sub-pages__cta">
		<div class="cta">
			<div class="cta__inner">
				<div class="cta__title">Get in touch</div>

				<?php if( $post->ID == 288) { ?>
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
	</div>

</div>

<?php
include(locate_template('inc/get-involved.php'));
get_footer(); ?>