<?php
/**
 * Template Name: Homepage
 * Description: Homepage template with hero, What We Do, and About sections
 *
 * @package Urban Charrette
 */

get_header();
?>

<?php get_template_part( 'template-parts/hero' ); ?>

<?php get_template_part( 'template-parts/what-we-do' ); ?>

<?php get_template_part( 'template-parts/about' ); ?>

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
