<?php
/**
 * Template Name: About
 * Description: About template with Page Header, About, Projects, and Events sections
 *
 * @package Urban Charrette
 */

get_header();
?>

<?php get_template_part( 'template-parts/page-header' ); ?>

<?php get_template_part( 'template-parts/text-left-image-right' ); ?>

<?php get_template_part( 'template-parts/text-left-text-right' ); ?>

<?php get_template_part( 'template-parts/projects' ); ?>

<?php get_template_part( 'template-parts/events' ); ?>

<main>
	<div class="container" style="padding: 60px 20px;">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				?>
				<article>
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
