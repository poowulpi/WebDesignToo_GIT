<?php
/**
 * Hero Template Part
 *
 * @package Urban Charrette
 */

$hero_background = get_theme_mod( 'urban_charrette_hero_background', '' );
$hero_heading = get_theme_mod( 'urban_charrette_hero_heading', 'Char-rette • [shuh-ret] • noun' );
$hero_definition = get_theme_mod( 'urban_charrette_hero_definition', '– an intense, collaborative design process.' );

// Card data
$cards = array(
	array(
		'title'    => get_theme_mod( 'urban_charrette_hero_card_1_title', 'Learn' ),
		'subtitle' => get_theme_mod( 'urban_charrette_hero_card_1_subtitle', 'our mission' ),
		'link'     => get_theme_mod( 'urban_charrette_hero_card_1_link', '#' ),
		'dark'     => false,
	),
	array(
		'title'    => get_theme_mod( 'urban_charrette_hero_card_2_title', 'Donate' ),
		'subtitle' => get_theme_mod( 'urban_charrette_hero_card_2_subtitle', 'to the cause' ),
		'link'     => get_theme_mod( 'urban_charrette_hero_card_2_link', '#' ),
		'dark'     => true,
	),
	array(
		'title'    => get_theme_mod( 'urban_charrette_hero_card_3_title', 'Attend' ),
		'subtitle' => get_theme_mod( 'urban_charrette_hero_card_3_subtitle', 'local events' ),
		'link'     => get_theme_mod( 'urban_charrette_hero_card_3_link', '#' ),
		'dark'     => false,
	),
);

$hero_style = '';
if ( ! empty( $hero_background ) ) {
	$hero_style = 'style="background-image: url(' . esc_url( $hero_background ) . ');"';
}
?>

<div class="hero-wrapper">
	<section class="hero" <?php echo wp_kses_post( $hero_style ); ?>>
		<div class="hero__overlay"></div>
		
		<div class="hero__content">
			<div class="hero__text">
				<h1 class="hero__heading"><?php echo esc_html( $hero_heading ); ?></h1>
				<p class="hero__definition"><?php echo esc_html( $hero_definition ); ?></p>
			</div>
		</div>
	</section>

	<div class="hero__cards">
		<?php foreach ( $cards as $card ) : ?>
			<a href="<?php echo esc_url( $card['link'] ); ?>" class="hero__card <?php echo $card['dark'] ? 'is-dark' : ''; ?>">
				<div>
					<h2 class="hero__card-title"><?php echo esc_html( $card['title'] ); ?></h2>
					<p class="hero__card-subtitle"><?php echo esc_html( $card['subtitle'] ); ?></p>
				</div>
				<svg class="hero__card-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
					<path d="M5 12h14M12 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
			</a>
		<?php endforeach; ?>
	</div>
</div>
