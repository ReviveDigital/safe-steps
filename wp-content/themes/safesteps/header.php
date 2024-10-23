<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/iconified/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/iconified/apple-touch-icon.png" />
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/images/iconified/apple-touch-icon-57x57.png" />
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/iconified/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/images/iconified/apple-touch-icon-76x76.png" />
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/iconified/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/images/iconified/apple-touch-icon-120x120.png" />
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/images/iconified/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/images/iconified/apple-touch-icon-152x152.png" />

<?php wp_head(); ?>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NLS28SK');</script>
<!-- End Google Tag Manager -->

</head>

<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NLS28SK"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<header class="header">
	<div class="container header__container">
		<div class="header__logo">
			<a href="<?php echo esc_url( home_url( '/' ) );?>">
				<!-- <img src="/images/logo.svg" alt="SafeSteps" class="header__logo-img" /> -->
				<img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="SafeSteps" class="header__logo-img" />
<!-- 				<img src="<?php echo get_template_directory_uri(); ?>/images/logo-pride.png" alt="SafeSteps" class="header__logo-img" /> -->
			</a>
		</div>

		<div class="d-block d-lg-none header__mobile-icon">
			<i class="fal fa-bars"></i>
		</div>

		<div class="header__right">
			<div class="header__top-right">
				<div class="header__top-right-block">
					<span class="header__top-right-text">Get Help - Southend:</span> <a href="tel:<?php echo str_replace(' ','',get_field('phone_number', 'option')); ?>" class="header__top-phone"><?php the_field('phone_number', 'option'); ?></a>
				</div>
				<div class="header__top-right-block header__top-right-block--last">
					<a href="https://www.essexcompass.org.uk/" target="_blank" rel="noreferrer" class="header__top-right-text header__top-right-text--link">Get Help - Essex:</a> <a href="tel:<?php echo str_replace(' ','',get_field('essex_phone_number', 'option')); ?>" class="header__top-phone"><?php the_field('essex_phone_number', 'option'); ?></a>
				</div>
			</div>
			<div class="header__navigation">
				<nav class="header__nav">
					<?php $nav = array('menu' => 'Navigation');?>
					<?php wp_nav_menu( $nav ); ?> 
					<a href="https://safesteps.enthuse.com/donate#!/" target="_blank" rel="noreferrer" class="d-block d-lg-none header__mobile-donate">
						Donate
					</a>	
				</nav>
				<a href="<?php the_field('link','option'); ?>" target="_blank" rel="noreferrer" class="d-none d-lg-block header__navigation-button header__navigation-button--donate">
					Donate
				</a>
			</div>
		</div>
	</div>
	<?php echo do_shortcode('[google-translator]'); ?>
</header>

<a href="https://www.google.co.uk" class="exit">
	<i class="exit__icon fal fa-sign-out"></i>
	<div class="exit__text">
		Exit website
	</div>
</a>