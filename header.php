<?php
/**
 * Header Template
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<!-- Top Bar -->
	<div class="top-bar">
		<div class="container">
			<div class="top-bar-left">
				<?php if ( get_theme_mod( 'sermacosa_phone', '+593 2 123-4567' ) ) : ?>
				<span>
					<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.64 3.4 2 2 0 0 1 3.61 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.6a16 16 0 0 0 6 6l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21.73 16l.19.92z"/></svg>
					<?php echo esc_html( get_theme_mod( 'sermacosa_phone', '+593 2 123-4567' ) ); ?>
				</span>
				<?php endif; ?>
				
				<?php if ( get_theme_mod( 'sermacosa_email', 'info@sermacosa.com' ) ) : ?>
				<span>
					<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
					<?php echo esc_html( get_theme_mod( 'sermacosa_email', 'info@sermacosa.com' ) ); ?>
				</span>
				<?php endif; ?>
			</div>
			<div class="top-bar-right">
				<?php if ( get_theme_mod( 'sermacosa_top_bar_support', 'SOPORTE 24/7' ) ) : ?>
				<span>
					<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12,6 12,12 16,14"/></svg>
					<?php echo esc_html( get_theme_mod( 'sermacosa_top_bar_support', 'SOPORTE 24/7' ) ); ?>
				</span>
				<?php endif; ?>
				
				<?php if ( get_theme_mod( 'sermacosa_top_bar_location', 'ECUADOR' ) ) : ?>
				<span>
					<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9,22 9,12 15,12 15,22"/></svg>
					<?php echo esc_html( get_theme_mod( 'sermacosa_top_bar_location', 'ECUADOR' ) ); ?>
				</span>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<!-- Main Header -->
	<header class="main-header" role="banner">
		<div class="container header-container">

			<div class="site-branding">
				<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
					<?php the_custom_logo(); ?>
				<?php else : ?>
					<div class="logo-text">
						<?php if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
							</h1>
						<?php else : ?>
							<p class="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
							</p>
						<?php endif; ?>
						<?php
						$description = get_bloginfo( 'description' );
						if ( $description ) :
						?>
							<span class="site-description"><?php echo esc_html( $description ); ?></span>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>

			<!-- Hamburger -->
			<button class="menu-toggle" aria-label="Abrir menú" aria-expanded="false" aria-controls="primary-navigation">
				<span class="hamburger-bar"></span>
				<span class="hamburger-bar"></span>
				<span class="hamburger-bar"></span>
			</button>

			<nav class="main-navigation" id="primary-navigation" role="navigation" aria-label="Menú principal">
				<?php
				// Menú Principal (Responsive)
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'fallback_cb'    => 'wp_page_menu',
					'container'      => false,
					'menu_class'     => 'nav-menu',
				) );
				?>
			</nav>

			<div class="header-actions">
				<form method="get" class="header-search" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
					<input type="search" name="s" placeholder="Buscar..." value="<?php echo esc_attr( get_search_query() ); ?>" aria-label="Buscar" />
					<button type="submit" aria-label="Buscar">
						<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
					</button>
				</form>

				<?php if ( class_exists( 'WooCommerce' ) ) : ?>
					<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="cart-icon" aria-label="Carrito de compras">
						<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
						<?php
						$cart_count = WC()->cart->get_cart_contents_count();
						if ( $cart_count > 0 ) :
						?>
							<span class="cart-count"><?php echo esc_html( $cart_count ); ?></span>
						<?php endif; ?>
					</a>
				<?php endif; ?>

				<?php
				$cta_text = get_theme_mod( 'sermacosa_cta_text', 'PRESUPUESTO' );
				$cta_link_raw = get_theme_mod( 'sermacosa_cta_link', '/contacto' );
				$cta_link = ( strpos( $cta_link_raw, 'http' ) === 0 || strpos( $cta_link_raw, 'tel:' ) === 0 || strpos( $cta_link_raw, 'mailto:' ) === 0 ) ? $cta_link_raw : home_url( $cta_link_raw );
				?>
				<a href="<?php echo esc_url( $cta_link ); ?>" class="btn-presupuesto"><?php echo esc_html( $cta_text ); ?></a>
			</div>

		</div>
	</header>
