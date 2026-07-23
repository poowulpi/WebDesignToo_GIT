<?php
/**
 * Text Left Text Right Template Part
 * 
 * A customizable two-column text layout for individual pages.
 * Uses post meta for per-page customization with fallback to global settings.
 *
 * @package Urban Charrette
 */

// Check if this page has custom Text Left Text Right settings
$is_custom = get_post_meta( get_the_ID(), 'text_left_text_right_enabled', true ) === '1';

if ( $is_custom ) {
	// Use page-specific settings
	$title = get_post_meta( get_the_ID(), 'text_left_text_right_title', true );
	$text_left = get_post_meta( get_the_ID(), 'text_left_text_right_left', true );
	$text_right = get_post_meta( get_the_ID(), 'text_left_text_right_right', true );
} else {
	// Fall back to global About settings
	$title = get_theme_mod( 'urban_charrette_about_title', 'About the Urban Charrette' );
	$text_1 = get_theme_mod( 'urban_charrette_about_text_1', 'The Urban Charrette facilitates connections between the community and the built environment by cultivating awareness of respectful urban design through dialogue, collaboration, and education.' );
	$text_2 = get_theme_mod( 'urban_charrette_about_text_2', 'We are a private, not-for-profit organization whose primary goal is to educate citizens on the importance of quality urban design in shaping more beautiful, sustainable, and authentic cities. We host educational forums and consensus building workshops incorporating meaningful and broad-based public participation. Founded in Tampa, the Urban Charrette believes in leading by example to develop a more socially, economically and sustainable local environment that addresses the needs of young professionals, children, families, and the aging.' );
	$text_left = $text_1;
	$text_right = $text_2;
}
?>

<section class="text-left-text-right">
	<div class="text-left-text-right__container">
		<?php if ( ! empty( $title ) ) : ?>
			<h2 class="text-left-text-right__title"><?php echo esc_html( $title ); ?></h2>
		<?php endif; ?>

		<div class="text-left-text-right__columns">
			<div class="text-left-text-right__column">
				<?php if ( ! empty( $text_left ) ) : ?>
					<div class="text-left-text-right__text">
						<?php echo wp_kses_post( $text_left ); ?>
					</div>
				<?php endif; ?>
			</div>

			<div class="text-left-text-right__column">
				<?php if ( ! empty( $text_right ) ) : ?>
					<div class="text-left-text-right__text">
						<?php echo wp_kses_post( $text_right ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
