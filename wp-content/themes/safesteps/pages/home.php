<?php
// Template Name: Home Page
get_header(); ?>

<div class="hp-slider">
	<div class="swiper-container">
	<div class="swiper-wrapper">
	  	<?php
		if( have_rows('slider') ):
		    while ( have_rows('slider') ) : the_row(); ?>
		    	<div class="swiper-slide">
					<?php
					$slider = get_sub_field('image');
					$image = wp_get_attachment_image_src( $slider, 'slider' );
					$alt = get_post_meta($slider, '_wp_attachment_image_alt', true);
					?>
					<img src="<?php echo $image[0]; ?>" alt="<?php if($alt) { echo $alt; } else { echo the_sub_field('title'); } ?>" class="hp-slider__img" />
					<div class="hp-slider__overlay">
						<div class="hp-slider__overlay-title">
							<?php the_sub_field('title'); ?>
						</div>
						<?php if(get_sub_field('button')) { ?>
							<a href="<?php the_sub_field('button'); ?>" class="hp-slider__overlay-button">
								<?php the_sub_field('button_text'); ?>
							</a>
						<?php } ?>
					</div>
				</div>
		    <?php endwhile; ?>
		<?php endif; ?>
	</div>

	<div class="swiper-pagination"></div>
	</div>
</div>

<div id="home">
	
</div>

<div class="hp-welcome">
	<div class="container">
		<div class="hp-welcome__inner">
			<h1 class="hp-welcome__title"><?php the_field('welcome_title'); ?></h1>
			<div class="hp-welcome__text"><?php the_field('welcome_text'); ?></div>
			<?php if(get_field('welcome_button')) { ?>
				<a href="<?php the_field('welcome_button'); ?>" class="hp-welcome__button">
					<?php the_field('welcome_button_text'); ?>
				</a>
			<?php } ?>
		</div>
	</div>
</div>

<div class="hp-help">
	<div class="container hp-help__container">
		<div class="hp-help__left">
			<h2 class="hp-help__title">
				Get Informed
			</h2>
			<ul class="hp-help__list">
			<?php 
			$args = array('post_type' => 'page', 'post_parent' => 322, 'orderby' => 'menu_order', 'order' => 'ASC');
			$loop = new WP_Query( $args );
			if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<li class="hp-help__list-item">
					<a href="<?php the_permalink(); ?>" class="hp-help__list-link">
						<?php the_title(); ?>
					</a>
				</li>
			<?php endwhile; } wp_reset_query(); ?> 
			</ul>
			<div class="hp-help__cta">
				<div class="hp-help__cta-title">
					Talk to us
				</div>
				<a href="tel:<?php echo str_replace(' ','',get_field('phone_number', 'option')); ?>" class="hp-help__cta-phone"><?php the_field('phone_number', 'option'); ?></a>
			</div>
		</div>
		<div class="hp-help__right">
			<?php
			$hpHelpImage = get_field('hp_help_image');
			$helpImg = wp_get_attachment_image_src( $hpHelpImage, 'home-page-help-image' );
			$alt = get_post_meta($hpHelpImage, '_wp_attachment_image_alt', true);
			?>
			<img src="<?php echo $helpImg[0]; ?>" alt="<?php if($alt) { echo $alt; } else { echo 'How can we help you?'; } ?>" class="hp-slider__img" />
		</div>
	</div>
</div>

<?php
$hpDomesticImage = get_field('hp_domestic_image');
$hpDomesticImg = wp_get_attachment_image_src( $hpDomesticImage, 'home-page-domestic-image' );
$alt = get_post_meta($hpDomesticImage, '_wp_attachment_image_alt', true);
?>

<div class="hp-domestic">
	<div class="hp-domestic__img" style="background-image:url(<?php echo $hpDomesticImg[0];?>);"></div>
	<div class="hp-domestic__container">
		<div class="hp-domestic__overlay">
			<div class="hp-domestic__title">
				<?php the_field('hp_domestic_title'); ?>
			</div>
			<div class="hp-domestic__text">
				<?php the_field('hp_domestic_text'); ?>
			</div>
			<div class="hp-domestic__buttons">
				<a href="<?php echo esc_url( home_url( '/get-informed/what-is-domestic-abuse/' ) );?>" class="hp-domestic__button">
					What is domestic abuse?
				</a>
			</div>
		</div>
	</div>
</div>

<div class="hp-about">
	<div class="container">
		<div class="hp-about__container">
			<div class="hp-about__content">
				<div class="hp-about__inner">
					<h3 class="hp-about__title">
						About Us
					</h3>
					<div class="hp-about__text">
						<?php the_field('about_us_text'); ?>
					</div>
					<a href="<?php echo esc_url( home_url( '/about-us/' ) );?>" class="hp-about__button">
						More About Us
					</a>
				</div>
			</div>
			<div class="hp-about__image">
				<?php
				$hpAboutImage = get_field('about_us_image');
				$hpAboutImg = wp_get_attachment_image_src( $hpAboutImage, 'home-page-about-image' );
				$alt = get_post_meta($hpAboutImage, '_wp_attachment_image_alt', true);
				?>
				<img src="<?php echo $hpAboutImg[0]; ?>" alt="<?php if($alt) { echo $alt; } else { echo 'About SafeSteps'; } ?>" class="hp-about__img" />
			</div>
		</div>
	</div>
</div>

<?php 
include(locate_template('inc/get-involved.php'));
 get_footer(); ?>