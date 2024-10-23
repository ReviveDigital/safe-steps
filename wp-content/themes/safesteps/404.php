<?php
get_header(); ?>
	<div class="nothing-found">
		<div class="container">
			<h1 class="nothing-found__title">Oops! That page can’t be found!</h1>
			<p class="nothing-found__text"><a href="<?php echo esc_url( home_url( '/' ) );?>" class="nothing-found__link">Click here</a> to go back to the home page.</p>
		</div>
	</div>
<?php
get_footer();
