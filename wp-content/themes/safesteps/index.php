<?php
get_header(); ?>

<div class="container">
	<div class="sub-pages__articles">
		<?php 
		    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
		    $args = array( 
		    	'post_type' => 'post',
				'orderby' => 'meta_value date', 
				'order' => 'DESC',
				'paged' => $paged,
		    );

		    $loop = new WP_Query( $args );
		    if ( $loop->have_posts() ) {
		    while ( $loop->have_posts() ) : $loop->the_post(); ?>

			<div class="sub-pages__article-block">
				<div class="sub-pages__article-image">
		        	<?php
					$articleImg = get_field('image');
					$image = wp_get_attachment_image_src( $articleImg, 'article-thumbnail' );
					$alt = get_post_meta($articleImg, '_wp_attachment_image_alt', true);
					?>
					<?php if ($image) { ?>
						<a href="<?php echo the_permalink(); ?>">
							<img src="<?php echo $image[0]; ?>" class="sub-pages__article-img" alt="<?php if($alt) { echo $alt; } else { echo the_title(); } ?>" />
						</a>
					<?php } else { ?>
						<a href="<?php echo the_permalink(); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/images/no-image.jpg" alt="<?php if($alt) { echo $alt; } else { echo the_title(); } ?>" class="sub-pages__article-img" />
						</a>
					<?php } ?>	
				</div>

	            <div class="sub-pages__article-content">
	            	<div class="sub-pages__article-inner">
	            		<h3>
		            		<a href="<?php echo the_permalink(); ?>" class="sub-pages__article-title">
		            			<?php echo the_title(); ?>
		            		</a>
		            	</h3>
		            	<div class="sub-pages__article-date"><p><?php echo get_the_date(); ?></p></div>
						<div class="sub-pages__article-text"><?= get_excerpt(); ?></div>
						<a href="<?php echo the_permalink(); ?>" class="sub-pages__article-link">Read article</a>
					</div>
				</div>

			</div>

		<?php endwhile;

		wp_pagenavi( array( 'query' => $loop ) );

		}
		wp_reset_query();
		?> 
	</div>
</div>

<?php
get_footer();
