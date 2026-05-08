<?php
/**
 * Footer Template
 */
?>
	<footer role="contentinfo">
		<div class="container footer-grid">

			<?php if ( is_active_sidebar( 'footer-area-1' ) || is_active_sidebar( 'footer-area-2' ) || is_active_sidebar( 'footer-area-3' ) ) : ?>
				<?php if ( is_active_sidebar( 'footer-area-1' ) ) : ?>
					<div><?php dynamic_sidebar( 'footer-area-1' ); ?></div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-area-2' ) ) : ?>
					<div><?php dynamic_sidebar( 'footer-area-2' ); ?></div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-area-3' ) ) : ?>
					<div><?php dynamic_sidebar( 'footer-area-3' ); ?></div>
				<?php endif; ?>

			<?php else : ?>

				<!-- Col 1: Marca -->
				<div class="footer-col footer-brand">
					<p class="footer-logo-text">SERMACOSA</p>
					<p class="footer-tagline">Soluciones profesionales en maquinaria industrial textil desde 1994.</p>
					<div class="footer-social">
						<a href="#" aria-label="Facebook" class="social-link">
							<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
						</a>
						<a href="#" aria-label="LinkedIn" class="social-link">
							<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
						</a>
						<a href="#" aria-label="Instagram" class="social-link">
							<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
						</a>
					</div>
				</div>

				<!-- Col 2: Navegación -->
				<div class="footer-col">
					<h3 class="footer-heading">Navegación</h3>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'footer',
						'fallback_cb'    => 'wp_page_menu',
						'container'      => false,
						'menu_class'     => 'footer-nav-list',
					) );
					?>
				</div>

				<!-- Col 3: Contacto -->
				<div class="footer-col">
					<h3 class="footer-heading">Contacto</h3>
					<ul class="footer-contact-list">
						<li>
							<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.64 3.4 2 2 0 0 1 3.61 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.6a16 16 0 0 0 6 6l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21.73 16l.19.92z"/></svg>
							<?php echo esc_html( get_theme_mod( 'sermacosa_phone', '+593 2 123-4567' ) ); ?>
						</li>
						<li>
							<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
							<?php
							$email = get_theme_mod( 'sermacosa_email', 'info@sermacosa.com' );
							?>
							<a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
						</li>
						<li>
							<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
							<?php echo esc_html( get_theme_mod( 'sermacosa_address', 'Quito, Ecuador' ) ); ?>
						</li>
					</ul>
				</div>

			<?php endif; ?>

		</div><!-- .footer-grid -->

		<div class="footer-bottom">
			<div class="container">
				<p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> <strong><?php bloginfo( 'name' ); ?></strong>. Todos los derechos reservados.</p>
				<p class="footer-credits">Distribuidores oficiales <strong>KINGTEX</strong> &amp; <strong>SWF</strong></p>
			</div>
		</div>
	</footer>

	<?php wp_footer(); ?>
</body>
</html>
