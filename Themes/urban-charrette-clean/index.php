<?php
get_header();
?>

<main>
	<!-- CTA Section -->
	<section class="cta" style="background-image: url('<?php echo esc_url( get_theme_mod( 'urban_charrette_cta_background' ) ); ?>');">
		<div class="cta__overlay"></div>
		<div class="cta__content">
			<h2><?php echo wp_kses_post( get_theme_mod( 'urban_charrette_cta_title', 'Committed to the community through creative interventions.' ) ); ?></h2>
			<p><?php echo wp_kses_post( get_theme_mod( 'urban_charrette_cta_subtitle', 'Learn how you can get involved with the Urban Charrette and help shape our community.' ) ); ?></p>
			<div class="cta__buttons">
				<a href="<?php echo esc_url( home_url( '/learn' ) ); ?>" class="btn btn--text">Learn More</a>
				<a href="<?php echo esc_url( home_url( '/get-involved' ) ); ?>" class="btn btn--primary">Get Involved</a>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
?>
