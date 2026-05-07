<?php
/**
 * Footer Template
 */
?>
	<footer>
		<div class="container">
			<?php if ( is_active_sidebar( 'footer-area-1' ) || is_active_sidebar( 'footer-area-2' ) || is_active_sidebar( 'footer-area-3' ) ) { ?>
				<?php
				if ( is_active_sidebar( 'footer-area-1' ) ) {
					dynamic_sidebar( 'footer-area-1' );
				}
				if ( is_active_sidebar( 'footer-area-2' ) ) {
					dynamic_sidebar( 'footer-area-2' );
				}
				if ( is_active_sidebar( 'footer-area-3' ) ) {
					dynamic_sidebar( 'footer-area-3' );
				}
				?>
			<?php } else { ?>
				<div>
					<h3>SERMACOSA</h3>
					<p>Soluciones profesionales en maquinaria industrial textil</p>
				</div>
				<div>
					<h3>Enlaces</h3>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'footer',
						'fallback_cb' => 'wp_page_menu',
						'container_class' => '',
						'menu_class' => '',
					) );
					?>
				</div>
				<div>
					<h3>Contacto</h3>
					<p>
						<?php
						$phone = get_theme_mod( 'sermacosa_phone', '+34 XXX XXX XXX' );
						echo esc_html( $phone );
						?>
						<br>
						<?php
						$email = get_theme_mod( 'sermacosa_email', 'info@sermacosa.com' );
						?>
						<a href="mailto:<?php echo esc_attr( $email ); ?>">
							<?php echo esc_html( $email ); ?>
						</a>
					</p>
				</div>
			<?php } ?>
		</div>

		<div class="footer-bottom">
			<p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> <strong><?php bloginfo( 'name' ); ?></strong>. Todos los derechos reservados.</p>
		</div>
	</footer>

	<?php wp_footer(); ?>
</body>
</html>
