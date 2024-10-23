<div class="cta">
	<div class="cta__inner">
		<div class="cta__title">Get in touch</div>
		<a href="tel:<?php echo str_replace(' ','',get_field('phone_number', 'option')); ?>" class="cta__phone"><?php the_field('phone_number', 'option'); ?></a>
		<div class="cta__btn">
			<a href="<?php echo esc_url( home_url( '/get-help/' ) );?>" class="cta__button">
				Get help
			</a>
		</div>
	</div>
</div>