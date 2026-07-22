<?php
?>

</main>

<footer class="site-footer">
	<div class="site-footer__container">
		<!-- Left: Logo & Subscription -->
		<div class="site-footer__left">
			<div class="site-footer__logo">
				<?php if ( has_custom_logo() ) : ?>
					<?php the_custom_logo(); ?>
				<?php else : ?>
					<span><?php bloginfo( 'name' ); ?></span>
				<?php endif; ?>
			</div>
			
			<p class="site-footer__tagline"><?php echo wp_kses_post( get_theme_mod( 'urban_charrette_footer_tagline', 'Subscribe to stay up to date on news and events.' ) ); ?></p>
			
			<!-- Email Subscription Block -->
			<div class="site-footer__subscription">
				<!-- Add email subscription form here -->
			</div>
			
			<p class="site-footer__consent">
				<?php 
					$consent_text = get_theme_mod( 'urban_charrette_footer_consent', 'By subscribing you agree to with our Privacy Policy and provide consent to receive updates from our company.' );
					// Replace Privacy Policy link if it exists in the text
					$consent_text = str_replace( 'Privacy Policy', '<a href="' . esc_url( home_url( '/privacy-policy' ) ) . '">Privacy Policy</a>', $consent_text );
					echo wp_kses_post( $consent_text );
				?>
			</p>
		</div>

		<!-- Center: Quick Links & Get Involved -->
		<div class="site-footer__center">
			<div class="site-footer__column">
				<h3><?php esc_html_e( 'Quick Links', 'urban-charrette' ); ?></h3>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'quick-links',
						'container' => false,
						'menu_class' => 'site-footer__menu',
						'depth' => 1,
						'fallback_cb' => false,
					)
				);
				?>
			</div>

			<div class="site-footer__column">
				<h3><?php esc_html_e( 'Get Involved', 'urban-charrette' ); ?></h3>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'get-involved',
						'container' => false,
						'menu_class' => 'site-footer__menu',
						'depth' => 1,
						'fallback_cb' => false,
					)
				);
				?>
			</div>
		</div>

		<!-- Right: Follow Us -->
		<div class="site-footer__right">
			<h3><?php esc_html_e( 'Follow Us', 'urban-charrette' ); ?></h3>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'social-links',
					'container' => false,
					'menu_class' => 'site-footer__social',
					'depth' => 1,
					'fallback_cb' => false,
				)
			);
			?>
		</div>
	</div>

	<!-- Bottom: Copyright & Links -->
	<div class="site-footer__bottom">
		<p class="site-footer__copyright">
			&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved. Powered by', 'urban-charrette' ); ?> <a href="https://webdesigntoo.com" target="_blank" rel="noopener noreferrer">WebDesignToo</a>.
		</p>
		<div class="site-footer__bottom-links">
			<a href="<?php echo esc_url( home_url( '/privacy-policy' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'urban-charrette' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/terms-of-service' ) ); ?>"><?php esc_html_e( 'Terms of Service', 'urban-charrette' ); ?></a>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
