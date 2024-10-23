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
				<h1 class="banner__title"><?php the_title(); ?></h1>
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