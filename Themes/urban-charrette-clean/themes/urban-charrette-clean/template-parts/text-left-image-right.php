<?php
/**
 * Text Left Image Right Template Part
 * 
 * A customizable text-left-image-right layout for individual pages.
 * Uses post meta for per-page customization with fallback to global settings.
 *
 * @package Urban Charrette
 */

// Check if this page has custom Text Left Image Right settings
$is_custom = get_post_meta( get_the_ID(), 'text_left_image_right_enabled', true ) === '1';

if ( $is_custom ) {
	// Use page-specific settings
	$title = get_post_meta( get_the_ID(), 'text_left_image_right_title', true );
	$text = get_post_meta( get_the_ID(), 'text_left_image_right_text', true );
	$image = get_post_meta( get_the_ID(), 'text_left_image_right_image', true );
	$button_1_text = get_post_meta( get_the_ID(), 'text_left_image_right_button_1_text', true );
	$button_1_url = get_post_meta( get_the_ID(), 'text_left_image_right_button_1_url', true );
	$button_2_text = get_post_meta( get_the_ID(), 'text_left_image_right_button_2_text', true );
	$button_2_url = get_post_meta( get_the_ID(), 'text_left_image_right_button_2_url', true );
} else {
	// Fall back to global About settings
	$title = get_theme_mod( 'urban_charrette_about_title', 'About the Urban Charrette' );
	$text_1 = get_theme_mod( 'urban_charrette_about_text_1', 'The Urban Charrette facilitates connections between the community and the built environment by cultivating awareness of respectful urban design through dialogue, collaboration, and education.' );
	$text_2 = get_theme_mod( 'urban_charrette_about_text_2', 'We are a private, not-for-profit organization whose primary goal is to educate citizens on the importance of quality urban design in shaping more beautiful, sustainable, and authentic cities. We host educational forums and consensus building workshops incorporating meaningful and broad-based public participation. Founded in Tampa, the Urban Charrette believes in leading by example to develop a more socially, economically and sustainable local environment that addresses the needs of young professionals, children, families, and the aging.' );
	$text = $text_1 . '</p><p>' . $text_2;
	$image = get_theme_mod( 'urban_charrette_about_image', '' );
	$button_1_text = get_theme_mod( 'urban_charrette_about_button_1_text', 'Learn More' );
	$button_1_url = get_theme_mod( 'urban_charrette_about_button_1_url', '#' );
	$button_2_text = get_theme_mod( 'urban_charrette_about_button_2_text', 'Get Involved' );
	$button_2_url = get_theme_mod( 'urban_charrette_about_button_2_url', '#' );
}
?>

<section class="text-left-image-right">
	<div class="text-left-image-right__container">
		<div class="text-left-image-right__content">
			<?php if ( ! empty( $title ) ) : ?>
				<h2 class="text-left-image-right__title"><?php echo esc_html( $title ); ?></h2>
			<?php endif; ?>
			
			<?php if ( ! empty( $text ) ) : ?>
				<div class="text-left-image-right__text">
					<?php echo wp_kses_post( $text ); ?>
				</div>
			<?php endif; ?>

			<?php if ( ! empty( $button_1_text ) || ! empty( $button_2_text ) ) : ?>
				<div class="text-left-image-right__buttons">
					<?php if ( ! empty( $button_1_text ) && ! empty( $button_1_url ) ) : ?>
						<a href="<?php echo esc_url( $button_1_url ); ?>" class="text-left-image-right__button text-left-image-right__button--secondary">
							<?php echo esc_html( $button_1_text ); ?>
						</a>
					<?php endif; ?>

					<?php if ( ! empty( $button_2_text ) && ! empty( $button_2_url ) ) : ?>
						<a href="<?php echo esc_url( $button_2_url ); ?>" class="text-left-image-right__button text-left-image-right__button--primary">
							<?php echo esc_html( $button_2_text ); ?>
						</a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>

		<div class="text-left-image-right__image-wrapper">
			<?php if ( ! empty( $image ) ) : ?>
				<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="text-left-image-right__image">
			<?php else : ?>
				<div style="width: 100%; height: 100%; background: #f0f0f0; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #999;">
					<span><?php esc_html_e( 'Upload an image in the Text Left Image Right settings', 'urban-charrette' ); ?></span>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
