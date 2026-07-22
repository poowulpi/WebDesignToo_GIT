<?php
/**
 * Template Name: Hero Page
 * Description: Page template with hero section
 *
 * @package Urban Charrette
 */

get_header();
?>

<?php get_template_part( 'template-parts/hero' ); ?>

<main>
	<div class="container" style="padding: 60px 20px;">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				?>
				<article>
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</article>
				<?php
			}
		}
		?>
	</div>
</main>

<?php
get_footer();
