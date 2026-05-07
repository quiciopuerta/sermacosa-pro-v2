<?php
/**
 * Template Name: Contacto
 * Contact Page Template
 */
get_header();
?>

<main class="container">
	<div class="page-header">
		<h1 class="page-title">Solicitar Presupuesto</h1>
		<p class="page-subtitle">Completa el formulario y nos pondremos en contacto contigo</p>
	</div>

	<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 3rem; margin: 3rem 0;">
		<div>
			<form class="contact-form" method="POST" action="">
				<div class="form-group">
					<label for="nombre">Nombre *</label>
					<input type="text" id="nombre" name="nombre" required>
				</div>

				<div class="form-group">
					<label for="email">Email *</label>
					<input type="email" id="email" name="email" required>
				</div>

				<div class="form-group">
					<label for="telefono">Teléfono *</label>
					<input type="tel" id="telefono" name="telefono" required>
				</div>

				<div class="form-group">
					<label for="empresa">Empresa</label>
					<input type="text" id="empresa" name="empresa">
				</div>

				<div class="form-group">
					<label for="asunto">Asunto *</label>
					<input type="text" id="asunto" name="asunto" required>
				</div>

				<div class="form-group">
					<label for="mensaje">Mensaje *</label>
					<textarea id="mensaje" name="mensaje" rows="6" required></textarea>
				</div>

				<div class="form-group">
					<label for="productos">¿Qué productos te interesan?</label>
					<select id="productos" name="productos">
						<option value="">Selecciona una opción</option>
						<option value="maquinaria">Maquinaria</option>
						<option value="bordadoras">Bordadoras</option>
						<option value="servicios">Servicios</option>
						<option value="repuestos">Repuestos</option>
						<option value="otro">Otro</option>
					</select>
				</div>

				<button type="submit" class="btn btn-dark" style="width: 100%; padding: 1rem;">
					ENVIAR PRESUPUESTO
				</button>
			</form>
		</div>

		<div class="contact-info">
			<div class="info-box">
				<h3>Información de Contacto</h3>

				<div class="info-item">
					<h4>Teléfono</h4>
					<p>
						<?php
						$phone = get_theme_mod( 'sermacosa_phone', '+593 2 123-4567' );
						echo '<a href="tel:' . esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ) . '">';
						echo esc_html( $phone );
						echo '</a>';
						?>
					</p>
				</div>

				<div class="info-item">
					<h4>Email</h4>
					<p>
						<?php
						$email = get_theme_mod( 'sermacosa_email', 'info@sermacosa.com' );
						?>
						<a href="mailto:<?php echo esc_attr( $email ); ?>">
							<?php echo esc_html( $email ); ?>
						</a>
					</p>
				</div>

				<div class="info-item">
					<h4>Dirección</h4>
					<p>
						<?php
						$address = get_theme_mod( 'sermacosa_address', 'Ecuador' );
						echo esc_html( $address );
						?>
					</p>
				</div>

				<div class="info-item">
					<h4>Soporte</h4>
					<p>Disponible 24/7 para resolver tus inquietudes</p>
				</div>
			</div>
		</div>
	</div>
</main>

<style>
	.page-header {
		text-align: center;
		margin: 3rem 0;
	}

	.page-subtitle {
		font-size: 1.1rem;
		color: var(--text-gray);
		margin-top: 1rem;
	}

	.contact-form {
		background: var(--white);
		padding: 2.5rem;
		border-radius: 4px;
		border: 1px solid var(--border-color);
	}

	.form-group {
		margin-bottom: 1.5rem;
	}

	.form-group label {
		display: block;
		margin-bottom: 0.5rem;
		font-weight: 600;
		color: var(--primary-navy);
	}

	.form-group input,
	.form-group textarea,
	.form-group select {
		width: 100%;
		padding: 0.75rem;
		border: 1px solid var(--border-color);
		border-radius: 4px;
		font-family: inherit;
		font-size: 1rem;
		transition: var(--transition);
	}

	.form-group input:focus,
	.form-group textarea:focus,
	.form-group select:focus {
		outline: none;
		border-color: var(--primary-orange);
		box-shadow: 0 0 0 3px rgba(232, 80, 10, 0.1);
	}

	.contact-info {
		background: var(--white);
		padding: 2.5rem;
		border-radius: 4px;
		border: 1px solid var(--border-color);
		height: fit-content;
	}

	.info-box h3 {
		margin-top: 0;
		margin-bottom: 2rem;
		color: var(--primary-navy);
	}

	.info-item {
		margin-bottom: 2rem;
		padding-bottom: 2rem;
		border-bottom: 1px solid var(--border-color);
	}

	.info-item:last-child {
		border-bottom: none;
		margin-bottom: 0;
		padding-bottom: 0;
	}

	.info-item h4 {
		margin: 0 0 0.5rem 0;
		color: var(--primary-navy);
		font-weight: 700;
	}

	.info-item p {
		margin: 0;
		color: var(--text-gray);
	}

	.info-item a {
		color: var(--primary-orange);
		text-decoration: none;
		font-weight: 600;
	}

	.info-item a:hover {
		color: var(--primary-navy);
	}
</style>

<?php get_footer(); ?>
