<?php
if( have_rows('flexible') ):
    while ( have_rows('flexible') ) : the_row(); ?>
	
	<?php if( get_row_layout() == 'heading' ): ?>
		<div class="sub-pages__flex">
	    	<div class="sub-pages__heading">
	    		<?php the_sub_field('heading'); ?>
	    	</div>
	    </div>

   	<?php elseif( get_row_layout() == 'text' ): ?>
    	<div class="sub-pages__flex">
    		<div class="sub-pages__text">
	    		<?php the_sub_field('text'); ?>
	    	</div>
		</div>

	<?php elseif( get_row_layout() == 'donations' ): ?>
    	<div class="sub-pages__flex sub-pages__flex--donations">
    		<div class="sub-pages__donation-left">
    			<div class="sub-pages__donation-title">Support us by donating</div>
    		</div>
    		<div class="sub-pages__donation-right">
    			<a href="<?php the_sub_field('link'); ?>" target="_blank" class="sub-pages__donation-button">
    				<?php the_sub_field('button_text'); ?>
    			</a>
    		</div>
    		<div class="sub-pages__text">
	    		<?php the_sub_field('text'); ?>
	    	</div>
		</div>

	<?php elseif( get_row_layout() == 'image' ): ?>
    	<div class="sub-pages__flex">
    		<?php
			$flexImg = get_sub_field('image');
			$image = wp_get_attachment_image_src( $flexImg, 'flex-image' );
			$alt = get_post_meta($flexImg, '_wp_attachment_image_alt', true);
			?>
			<img src="<?php echo $image[0]; ?>" alt="<?php if($alt) { echo $alt; } else { echo the_title(); } ?>" class="sub-pages__flex-img" />
		</div>

	<?php elseif( get_row_layout() == 'button' ): ?>
		<div class="sub-pages__flex">
	    	<a href="<?php the_sub_field('button'); ?>" class="sub-pages__button" target="_blank">
	    		<?php the_sub_field('button_text'); ?>
	    	</a>
	    </div>

	<?php elseif( get_row_layout() == 'add_list_of_sub_pages'): ?>

		<?php if ( get_sub_field( 'list_of_sub_pages' ) ): ?>
			<div class="sub-pages__text">
				<ul class="sub-pages__text-list">
					<?php
				    $side_nav = array('child_of' => $post->ID, 'sort_column' => 'menu_order', 'title_li' => __(''));
				    wp_list_pages( $side_nav ); ?>
				</ul>
			</div>
		<?php endif; ?>

 <?php endif; ?>
 <?php endwhile; ?>
<?php endif; ?>
