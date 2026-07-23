<?php
/**
 * What We Do Template Part
 *
 * @package Urban Charrette
 */

$section_title = get_theme_mod( 'urban_charrette_what_we_do_title', 'What We Do' );
$section_description = get_theme_mod( 'urban_charrette_what_we_do_description', 'The Urban Charrette facilitates connections between the community and the built environment by cultivating awareness of respectful urban design through dialogue, collaboration, and education.' );

// Card data
$cards = array(
	array(
		'image' => get_theme_mod( 'urban_charrette_what_we_do_card_1_image', '' ),
		'title' => get_theme_mod( 'urban_charrette_what_we_do_card_1_title', 'Community' ),
		'description' => get_theme_mod( 'urban_charrette_what_we_do_card_1_description', 'The Urban Charrette is committed to community through creative interventions. We continue to engage and educate our neighbors about the built environment and it\'s impacts towards smarter growth.' ),
		'link' => get_theme_mod( 'urban_charrette_what_we_do_card_1_link', '#' ),
		'link_text' => get_theme_mod( 'urban_charrette_what_we_do_card_1_link_text', 'Learn More' ),
	),
	array(
		'image' => get_theme_mod( 'urban_charrette_what_we_do_card_2_image', '' ),
		'title' => get_theme_mod( 'urban_charrette_what_we_do_card_2_title', 'Facilitation' ),
		'description' => get_theme_mod( 'urban_charrette_what_we_do_card_2_description', 'Fostering partnerships between local agencies, design professionals, and engaged citizens is a core component of the Urban Charrette. We believe in bringing people together and creating consensus.' ),
		'link' => get_theme_mod( 'urban_charrette_what_we_do_card_2_link', '#' ),
		'link_text' => get_theme_mod( 'urban_charrette_what_we_do_card_2_link_text', 'Learn More' ),
	),
	array(
		'image' => get_theme_mod( 'urban_charrette_what_we_do_card_3_image', '' ),
		'title' => get_theme_mod( 'urban_charrette_what_we_do_card_3_title', 'Education' ),
		'description' => get_theme_mod( 'urban_charrette_what_we_do_card_3_description', 'The Urban Charrette helps to educate the general public about the importance of urban design in the development by providing opportunities for the community to participate in open discourse.' ),
		'link' => get_theme_mod( 'urban_charrette_what_we_do_card_3_link', '#' ),
		'link_text' => get_theme_mod( 'urban_charrette_what_we_do_card_3_link_text', 'Learn More' ),
	),
);
?>

<section class="what-we-do">
	<div class="what-we-do__container">
		<div class="what-we-do__header">
			<h2 class="what-we-do__title"><?php echo esc_html( $section_title ); ?></h2>
			<p class="what-we-do__description"><?php echo esc_html( $section_description ); ?></p>
		</div>

		<div class="what-we-do__cards">
			<?php foreach ( $cards as $card ) : ?>
				<div class="what-we-do__card">
					<?php if ( ! empty( $card['image'] ) ) : ?>
						<img src="<?php echo esc_url( $card['image'] ); ?>" alt="<?php echo esc_attr( $card['title'] ); ?>" class="what-we-do__card-image">
					<?php endif; ?>
					
					<div class="what-we-do__card-content">
						<h3 class="what-we-do__card-title"><?php echo esc_html( $card['title'] ); ?></h3>
						<p class="what-we-do__card-text"><?php echo esc_html( $card['description'] ); ?></p>
						<a href="<?php echo esc_url( $card['link'] ); ?>" class="what-we-do__card-link"><?php echo esc_html( $card['link_text'] ); ?></a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
