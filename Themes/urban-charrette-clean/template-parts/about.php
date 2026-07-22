<?php
/**
 * About Template Part
 *
 * @package Urban Charrette
 */

$title = get_theme_mod( 'urban_charrette_about_title', 'About the Urban Charrette' );
$text_1 = get_theme_mod( 'urban_charrette_about_text_1', 'The Urban Charrette facilitates connections between the community and the built environment by cultivating awareness of respectful urban design through dialogue, collaboration, and education.' );
$text_2 = get_theme_mod( 'urban_charrette_about_text_2', 'We are a private, not-for-profit organization whose primary goal is to educate citizens on the importance of quality urban design in shaping more beautiful, sustainable, and authentic cities. We host educational forums and consensus building workshops incorporating meaningful and broad-based public participation. Founded in Tampa, the Urban Charrette believes in leading by example to develop a more socially, economically and sustainable local environment that addresses the needs of young professionals, children, families, and the aging.' );
$image = get_theme_mod( 'urban_charrette_about_image', '' );
$button_1_text = get_theme_mod( 'urban_charrette_about_button_1_text', 'Learn More' );
$button_1_url = get_theme_mod( 'urban_charrette_about_button_1_url', '#' );
$button_2_text = get_theme_mod( 'urban_charrette_about_button_2_text', 'Get Involved' );
$button_2_url = get_theme_mod( 'urban_charrette_about_button_2_url', '#' );
?>

<section class="about">
	<div class="about__container">
		<div class="about__content">
			<h2 class="about__title"><?php echo esc_html( $title ); ?></h2>
			
			<?php if ( ! empty( $text_1 ) ) : ?>
				<p class="about__text"><?php echo esc_html( $text_1 ); ?></p>
			<?php endif; ?>

			<?php if ( ! empty( $text_2 ) ) : ?>
				<p class="about__text"><?php echo esc_html( $text_2 ); ?></p>
			<?php endif; ?>

			<div class="about__buttons">
				<?php if ( ! empty( $button_1_text ) && ! empty( $button_1_url ) ) : ?>
					<a href="<?php echo esc_url( $button_1_url ); ?>" class="about__button about__button--secondary">
						<?php echo esc_html( $button_1_text ); ?>
					</a>
				<?php endif; ?>

				<?php if ( ! empty( $button_2_text ) && ! empty( $button_2_url ) ) : ?>
					<a href="<?php echo esc_url( $button_2_url ); ?>" class="about__button about__button--primary">
						<?php echo esc_html( $button_2_text ); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>

		<div class="about__image-wrapper">
			<?php if ( ! empty( $image ) ) : ?>
				<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="about__image">
			<?php else : ?>
				<div style="width: 100%; height: 100%; background: #f0f0f0; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #999;">
					<span><?php esc_html_e( 'Upload an image in the About Section customizer settings', 'urban-charrette' ); ?></span>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
