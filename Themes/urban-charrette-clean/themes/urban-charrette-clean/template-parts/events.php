<?php
/**
 * Events Template Part
 *
 * @package Urban Charrette
 */

$title = get_theme_mod( 'urban_charrette_events_title', 'Events' );
$description = get_theme_mod( 'urban_charrette_events_description', 'Stay updated with our upcoming events and programs.' );
?>

<section class="events">
	<div class="events__container">
		<div class="events__header">
			<h2 class="events__title"><?php echo esc_html( $title ); ?></h2>
			<?php if ( ! empty( $description ) ) : ?>
				<p class="events__description"><?php echo esc_html( $description ); ?></p>
			<?php endif; ?>
		</div>

		<div class="events__widget-area">
			<?php
			if ( is_active_sidebar( 'urban-charrette-events' ) ) {
				dynamic_sidebar( 'urban-charrette-events' );
			} else {
				echo '<p style="text-align: center; color: #999;">' . esc_html__( 'Add widgets to the Events section in Appearance > Widgets', 'urban-charrette' ) . '</p>';
			}
			?>
		</div>
	</div>
</section>
