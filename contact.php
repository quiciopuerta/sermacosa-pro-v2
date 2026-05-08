<?php
/**
 * Template Name: Contacto
 * Contact Page Template
 */
get_header();
?>

<div class="page-header">
	<div class="container">
		<h1 class="page-title">Solicitar Presupuesto</h1>
		<p class="page-subtitle">Completa el formulario y nos pondremos en contacto contigo para ofrecerte la mejor solución industrial</p>
	</div>
</div>

<main class="container">
	<div class="contact-container">
		<div class="premium-card fade-up">
			<form class="contact-form" method="POST" action="">
				<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
					<div class="form-group">
						<label for="nombre">Nombre Completo *</label>
						<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ej: Juan Pérez" required>
					</div>

					<div class="form-group">
						<label for="email">Email Corporativo *</label>
						<input type="email" id="email" name="email" class="form-control" placeholder="email@empresa.com" required>
					</div>
				</div>

				<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
					<div class="form-group">
						<label for="telefono">Teléfono de Contacto *</label>
						<input type="tel" id="telefono" name="telefono" class="form-control" placeholder="+593 ..." required>
					</div>

					<div class="form-group">
						<label for="empresa">Nombre de la Empresa</label>
						<input type="text" id="empresa" name="empresa" class="form-control" placeholder="Sermacosa S.A.">
					</div>
				</div>

				<div class="form-group">
					<label for="productos">Interés Principal</label>
					<select id="productos" name="productos" class="form-control">
						<option value="">Selecciona una categoría</option>
						<option value="maquinaria">Maquinaria Industrial</option>
						<option value="bordadoras">Bordadoras Profesionales</option>
						<option value="servicios">Servicio Técnico</option>
						<option value="repuestos">Repuestos y Accesorios</option>
						<option value="otro">Otros</option>
					</select>
				</div>

				<div class="form-group">
					<label for="asunto">Asunto *</label>
					<input type="text" id="asunto" name="asunto" class="form-control" placeholder="Ej: Cotización de bordadora Tajima" required>
				</div>

				<div class="form-group">
					<label for="mensaje">Mensaje detallado *</label>
					<textarea id="mensaje" name="mensaje" class="form-control" placeholder="Cuéntanos sobre tus necesidades..." required></textarea>
				</div>

				<button type="submit" class="button" style="width: 100%; padding: 1.25rem; font-size: 1rem; letter-spacing: 0.05em;">
					ENVIAR SOLICITUD DE PRESUPUESTO
				</button>
			</form>
		</div>

		<div class="contact-sidebar">
			<div class="info-item fade-up" style="--delay: 0.1s">
				<div class="info-icon">
					<svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
				</div>
				<div class="info-content">
					<h4>Llámanos</h4>
					<p>
						<?php
						$phone = get_theme_mod( 'sermacosa_phone', '+593 2 123-4567' );
						echo '<a href="tel:' . esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ) . '">';
						echo esc_html( $phone );
						echo '</a>';
						?>
					</p>
					<p style="font-size: 0.85rem;">Lun - Vie, 9:00 - 18:00</p>
				</div>
			</div>

			<div class="info-item fade-up" style="--delay: 0.2s">
				<div class="info-icon">
					<svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
				</div>
				<div class="info-content">
					<h4>Escríbenos</h4>
					<p>
						<?php $email = get_theme_mod( 'sermacosa_email', 'info@sermacosa.com' ); ?>
						<a href="mailto:<?php echo esc_attr( $email ); ?>">
							<?php echo esc_html( $email ); ?>
						</a>
					</p>
					<p style="font-size: 0.85rem;">Respuesta en menos de 24h</p>
				</div>
			</div>

			<div class="info-item fade-up" style="--delay: 0.3s">
				<div class="info-icon">
					<svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
				</div>
				<div class="info-content">
					<h4>Visítanos</h4>
					<p>
						<?php echo esc_html( get_theme_mod( 'sermacosa_address', 'Quito, Ecuador' ) ); ?>
					</p>
					<p style="font-size: 0.85rem;">Showroom disponible con cita previa</p>
				</div>
			</div>

			<div class="premium-card" style="padding: 2rem; background: var(--primary-navy); color: var(--white); margin-top: 3rem;">
				<h4 style="margin-bottom: 1rem;">¿Necesitas ayuda técnica?</h4>
				<p style="color: rgba(255,255,255,0.7); font-size: 0.9rem; margin-bottom: 1.5rem;">Nuestro equipo de expertos está listo para ayudarte con el mantenimiento de tu maquinaria.</p>
				<a href="#" class="button" style="background: var(--primary-orange); border-color: var(--primary-orange);">SOPORTE TÉCNICO</a>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>
