<?php
/**
 * Page Header Template Part
 * 
 * A customizable header/CTA section for individual pages.
 * Uses post meta for per-page customization with fallback to global CTA settings.
 *
 * @package Urban Charrette
 */

// Check if this page has custom Page Header settings
$is_custom = get_post_meta( get_the_ID(), 'page_header_enabled', true ) === '1';

if ( $is_custom ) {
	// Use page-specific settings
	$title = get_post_meta( get_the_ID(), 'page_header_title', true );
	$subtitle = get_post_meta( get_the_ID(), 'page_header_subtitle', true );
	$background = get_post_meta( get_the_ID(), 'page_header_background', true );
	$button_text = get_post_meta( get_the_ID(), 'page_header_button_text', true );
	$button_url = get_post_meta( get_the_ID(), 'page_header_button_url', true );
} else {
	// Fall back to global CTA settings
	$title = get_theme_mod( 'urban_charrette_cta_title', 'Committed to the community through creative interventions.' );
	$subtitle = get_theme_mod( 'urban_charrette_cta_subtitle', 'Learn how you can get involved with the Urban Charrette and help shape our community.' );
	$background = get_theme_mod( 'urban_charrette_cta_background', '' );
	$button_text = __( 'Get Involved', 'urban-charrette' );
	$button_url = home_url( '/get-involved' );
}

$header_style = '';
if ( ! empty( $background ) ) {
	$header_style = 'style="background-image: url(' . esc_url( $background ) . ');"';
}
?>

<section class="page-header" <?php echo wp_kses_post( $header_style ); ?>>
	<div class="page-header__overlay"></div>
	
	<div class="page-header__content">
		<?php if ( ! empty( $title ) ) : ?>
			<h1 class="page-header__title"><?php echo esc_html( $title ); ?></h1>
		<?php endif; ?>

		<?php if ( ! empty( $subtitle ) ) : ?>
			<p class="page-header__subtitle"><?php echo esc_html( $subtitle ); ?></p>
		<?php endif; ?>

		<?php if ( ! empty( $button_text ) && ! empty( $button_url ) ) : ?>
			<a href="<?php echo esc_url( $button_url ); ?>" class="page-header__button">
				<?php echo esc_html( $button_text ); ?>
			</a>
		<?php endif; ?>
	</div>
</section>
