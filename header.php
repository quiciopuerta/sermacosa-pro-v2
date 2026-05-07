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
				<span>📞 +593 2 123-4567</span>
				<span>✉️ info@sermacosa.com</span>
			</div>
			<div class="top-bar-right">
				<span>🌍 SOPORTE 24/7</span>
				<span>🏠 ECUADOR</span>
			</div>
		</div>
	</div>

	<!-- Main Header -->
	<header class="main-header">
		<div class="container header-container">
			<div class="site-branding">
				<?php
				if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
					the_custom_logo();
				} else {
					?>
					<div class="logo-text">
						<h1 class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<?php bloginfo( 'name' ); ?>
							</a>
						</h1>
						<?php
						$description = get_bloginfo( 'description' );
						if ( $description ) {
							?>
							<p class="site-description"><?php echo esc_html( $description ); ?></p>
							<?php
						}
						?>
					</div>
					<?php
				}
				?>
			</div>

			<nav class="main-navigation">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'fallback_cb' => 'wp_page_menu',
					'container_class' => '',
					'menu_class' => 'nav-menu',
				) );
				?>
			</nav>

			<div class="header-actions">
				<form method="get" class="header-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="search" name="s" placeholder="Buscar..." value="<?php echo esc_attr( get_search_query() ); ?>" />
					<button type="submit">🔍</button>
				</form>

				<?php if ( class_exists( 'WooCommerce' ) ) { ?>
					<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="cart-icon">
						🛒
						<?php
						$cart_count = WC()->cart->get_cart_contents_count();
						if ( $cart_count > 0 ) {
							echo '<span class="cart-count">' . esc_html( $cart_count ) . '</span>';
						}
						?>
					</a>
				<?php } ?>

				<a href="<?php echo esc_url( home_url( '/contacto' ) ); ?>" class="btn-presupuesto">PRESUPUESTO</a>
			</div>
		</div>
	</header>
