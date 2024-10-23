<div class="support-us">
	<div class="container">
		<div class="support-us__title">Get involved</div>
		<div class="support-us__text"><?php the_field('text_for_home_page',32); ?></div>

		<div class="support-us__container">
			<?php 
			$args = array('post_type' => 'page', 'post__in' => array(16,358));
			$loop = new WP_Query( $args );
			if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div class="support-us__block support-us__block--<?php the_field('colour'); ?>">
					<?php
					$thumb = get_field('thumbnail_image');
					$thumbImg = wp_get_attachment_image_src( $thumb, 'support-us-thumbnail' );
					$alt = get_post_meta($thumb, '_wp_attachment_image_alt', true);
					?>
					<a href="<?php the_permalink(); ?>">
						<?php if($thumb) { ?>
							<img src="<?php echo $thumbImg[0]; ?>" alt="<?php if($alt) { echo $alt; } else { echo the_title(); } ?>" class="support-us__block-img" />
						<?php } else { ?>
							<img src="<?php echo get_template_directory_uri(); ?>/images/no-product-image.jpg" alt="<?php if($alt) { echo $alt; } else { echo the_title(); } ?>" class="support-us__block-img" />
						<?php } ?>	
					</a>
					<div class="support-us__block-content">
						<a href="<?php the_permalink(); ?>" class="support-us__block-title">
							<?php the_title(); ?>
						</a>
						<div class="support-us__block-text">
							<?php the_field('text_for_home_page'); ?>	
						</div>
						<a href="<?php the_permalink(); ?>" class="support-us__block-button">
							More Information
						</a>
					</div>
				</div>
			<?php endwhile; } wp_reset_query(); ?> 

			<a href="<?php the_field('link','option'); ?>" rel="nofollow noreferrer" target="_blank" class="support-us__block support-us__block--blue">

				<?php
				$thumb = get_field('image','option');
				$thumbImg = wp_get_attachment_image_src( $thumb, 'support-us-thumbnail' );
				$alt = get_post_meta($thumb, '_wp_attachment_image_alt', true);
				?>

				<?php if($thumb) { ?>
					<img src="<?php echo $thumbImg[0]; ?>" alt="<?php if($alt) { echo $alt; } else { echo the_title(); } ?>" class="support-us__block-img" />
				<?php } else { ?>
					<img src="<?php echo get_template_directory_uri(); ?>/images/no-product-image.jpg" alt="<?php if($alt) { echo $alt; } else { echo the_title(); } ?>" class="support-us__block-img" />
				<?php } ?>	

				<div class="support-us__block-content">
					<span class="support-us__block-title">
						Donate
					</span>
					<span class="support-us__block-text">
						<?php the_field('text','option'); ?>	
					</span>
					<span class="support-us__block-button">
						Donate now
					</span>
				</div>
			</a>
				
		</div>
	</div>
</div>