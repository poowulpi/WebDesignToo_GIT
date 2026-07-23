<?php
/**
 * CTA Template Part
 *
 * @package Urban Charrette
 */

$title = get_theme_mod( 'urban_charrette_cta_title', 'Committed to the community through creative interventions.' );
$subtitle = get_theme_mod( 'urban_charrette_cta_subtitle', 'Learn how you can get involved with the Urban Charrette and help shape our community.' );
$background = get_theme_mod( 'urban_charrette_cta_background', '' );

$cta_style = '';
if ( ! empty( $background ) ) {
	$cta_style = 'style="background-image: url(' . esc_url( $background ) . ');"';
}
?>

<section class="cta" <?php echo wp_kses_post( $cta_style ); ?>>
	<div class="cta__overlay"></div>
	
	<div class="cta__content">
		<h2 class="cta__content"><?php echo esc_html( $title ); ?></h2>
		<p class="cta__content"><?php echo esc_html( $subtitle ); ?></p>
		<div class="cta__buttons">
			<a href="<?php echo esc_url( home_url( '/get-involved' ) ); ?>" class="btn btn--white"><?php esc_html_e( 'Get Involved', 'urban-charrette' ); ?></a>
		</div>
	</div>
</section>
