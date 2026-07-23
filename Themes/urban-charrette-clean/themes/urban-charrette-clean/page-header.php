<?php
/**
 * Page Header Template
 * 
 * A customizable header/CTA section for individual pages.
 * Uses post meta for per-page customization with fallback to global CTA settings.
 */

// Get page-specific settings or fall back to global CTA settings
$heading = get_post_meta( get_the_ID(), 'page_header_heading', true ) ?: get_theme_mod( 'urban_charrette_cta_title', 'Committed to the community through creative interventions.' );
$subtitle = get_post_meta( get_the_ID(), 'page_header_subtitle', true ) ?: get_theme_mod( 'urban_charrette_cta_subtitle', 'Learn how you can get involved with the Urban Charrette and help shape our community.' );
$background_image = get_post_meta( get_the_ID(), 'page_header_background', true ) ?: get_theme_mod( 'urban_charrette_cta_background', '' );

// Get optional button settings
$button_text = get_post_meta( get_the_ID(), 'page_header_button_text', true );
$button_url = get_post_meta( get_the_ID(), 'page_header_button_url', true );

// Build inline styles
$bg_style = '';
if ( $background_image ) {
	$bg_style = 'background-image: url(' . esc_url( $background_image ) . ');';
}

?>
<section class="page-header" style="<?php echo $bg_style; ?>">
	<div class="page-header__overlay"></div>
	
	<div class="page-header__content">
		<?php if ( $heading ) : ?>
			<h1 class="page-header__heading">
				<?php echo wp_kses_post( $heading ); ?>
			</h1>
		<?php endif; ?>
		
		<?php if ( $subtitle ) : ?>
			<p class="page-header__subtitle">
				<?php echo wp_kses_post( $subtitle ); ?>
			</p>
		<?php endif; ?>
		
		<?php if ( $button_text && $button_url ) : ?>
			<a href="<?php echo esc_url( $button_url ); ?>" class="page-header__button">
				<?php echo esc_html( $button_text ); ?>
			</a>
		<?php endif; ?>
	</div>
</section>
