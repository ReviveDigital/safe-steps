<?php
get_header();
include(locate_template('inc/banners.php')); ?>

<div class="container">
	<div class="sub-pages sub-pages__container">
		<div class="sub-pages__left">
			<?php
			$articleImg = get_field('image');
			$image = wp_get_attachment_image_src( $articleImg, 'article-image' );
			$alt = get_post_meta($articleImg, '_wp_attachment_image_alt', true);
			?>
			<?php if ($image) { ?>
				<img src="<?php echo $image[0]; ?>" class="sub-pages__article-main-img" alt="<?php if($alt) { echo $alt; } else { echo the_title(); } ?>" />
			<?php } ?>

			<div class="sub-pages__text">
				<?php the_content(); ?>
			</div>

			<a href="<?php echo esc_url( home_url( '/latest-news/' ) ); ?>" class="sub-pages__back-link"><i class="fa fa-angle-left" aria-hidden="true"></i> Back to our latest news</a>
		</div>
		<div class="sub-pages__right">
			<div class="sub-pages__nav">
				<h3 class="sub-pages__subtitle">Latest articles</h3>
				<ul class="sub-pages__list">
					 <?php
	                $args = array( 
	                	'post_type' => 'post',
	                	'orderby' => 'menu_order', 
	                	'order' => 'ASC', 
	                	'posts_per_page' => 5
	                );
	                $loop = new WP_Query( $args );
	                while ( $loop->have_posts() ) : $loop->the_post();?>
	                    <li><a href="<?= get_permalink(); ?>"><?php the_title();?></a></li>

	                <?php endwhile;
	                wp_reset_query();
	                ?>
	            </ul>
	        </div>
		</div>
	</div>
</div>

<?php 
get_template_part( 'inc/support-us' );
get_footer(); ?>
