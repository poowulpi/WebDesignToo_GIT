<?php
/**
 * Template Name: About
 * Description: About template with sections
 *
 * @package Urban Charrette
 */

get_header();
?>

<?php get_template_part( 'template-parts/page-header' ); ?>

<?php get_template_part( 'template-parts/text-left-image-right' ); ?>

<?php get_template_part( 'template-parts/text-left-text-right' ); ?>

<?php get_template_part( 'template-parts/board-of-directors' ); ?>

<?php get_template_part( 'template-parts/events' ); ?>

<?php
get_footer();
