<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<header class="site-header">
	<div class="site-header__inner">

		<div class="site-header__logo">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<a href="<?php echo esc_url( home_url( '/') ); ?>">
					<?php bloginfo( 'name' ); ?>
				</a>
			<?php endif; ?>
		</div>

		<button
			class="site-header__toggle"
			type="button"
			aria-expanded="false"
			aria-controls="primary-navigation"
			aria-label="<?php esc_attr_e( 'Open navigation menu', 'urban-charrette' ); ?>"
		>
			<span></span>
			<span></span>
			<span></span>
		</button>

		<nav
			id="primary-navigation"
			class="site-header__navigation"
			aria-label="<?php esc_attr_e( 'Primary Navigation', 'urban-charrette' ); ?>"
		>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary-menu',
					'container' => false,
					'menu_class' => 'site-header__menu',
					'fallback_cb' => false,
				)
			);
			?>
		</nav>

	</div>
</header>
