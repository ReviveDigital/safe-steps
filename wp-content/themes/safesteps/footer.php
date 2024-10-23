<section class="accreditations">
	<div class="accreditations__image-container">
		<img src="<?php echo get_template_directory_uri(); ?>/images/leading-light.jpg" alt="Leading Light Accreditation Logo 2023" class="accreditations__image" />
	</div>
	<div class="accreditations__image-container">
		<img src="<?php echo get_template_directory_uri(); ?>/images/award.jpg" alt="BBC Essex Make a Difference Awards logo 2023" class="accreditations__image" />
	</div>
</section>


<footer class="footer">
	<div class="container">
		<div class="footer__container">
			<div class="footer__contact">
				<div class="footer__contact-text">
					<?php the_field('footer_text','option'); ?>
				</div>
				<a href="tel:<?php echo str_replace(' ','',get_field('phone_number', 'option')); ?>" class="footer__contact-phone"><?php the_field('phone_number', 'option'); ?></a>
				<div class="footer__contact-address">
					<?php the_field('address','option'); ?>
				</div>
				<div class="footer__charity-num">
					Charity Number: 1177687
				</div>
			</div>

			<div class="footer__nav">
				<div class="footer__nav-block">
					<a href="<?php echo esc_url( home_url( '/get-help/' ) );?>" class="footer__nav-title">
						Get Help
					</a>
					<ul class="footer__nav-list">
						<?php
					    $ourServices = array('child_of' => 148, 'sort_column' => 'menu_order', 'title_li' => __(''));
					    wp_list_pages($ourServices);
						?>
					</ul>
				</div>

				<div class="footer__nav-block">
					<a href="<?php echo esc_url( home_url( '/get-informed/' ) );?>" class="footer__nav-title">
						Get Informed
					</a>
					<ul class="footer__nav-list">
						<?php
					    $supportUs = array('child_of' => 322, 'sort_column' => 'menu_order', 'title_li' => __(''));
					    wp_list_pages($supportUs);
						?>
					</ul>
				</div>

				<div class="footer__nav-block">
					<a href="<?php echo esc_url( home_url( '/' ) );?>" class="footer__nav-title">
						About Us
					</a>
					<ul class="footer__nav-list">
						<li><a href="<?php echo home_url() ?>/about-us/our-organisation/">Our Organisation</a></li>
					</ul>
				</div>
				<div class="footer__nav-block">
					<a href="<?php echo home_url() ?>/about-us/governance/" class="footer__nav-title">
						Governance
					</a>
					<ul class="footer__nav-list">
					<?php
					if( have_rows('governance_docs', 'option') ):
						while( have_rows('governance_docs', 'option') ) : the_row();

							$docName = get_sub_field('document_name');
							$documentDownload = get_sub_field('document'); ?>

							<li>
								<a target="_blank" href="<?php echo $documentDownload['url'] ?>">
									<?php echo $docName ?>
								</a>
							</li>

						<?php
						endwhile;
					endif;
					?>					
					</ul>
				</div>
			</div>
		</div>
		
		<div class="footer__container footer__container--bottom">
			<div class="footer__bottom-text">
				Copyright &copy; <?php echo date('Y'); ?> Safe Steps | <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) );?>">Privacy Policy</a> | All rights reserved
			</div>
			<div class="footer__bottom-text">
				Website design & built by <a href="https://revive.digital" rel="nofollow noreferrer" target="_blank" class="footer__bottom-link">Revive.Digital</a>
			</div>
		</div>
	</div>	
</footer>

<?php wp_footer(); ?> 
</body>
</html>
