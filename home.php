<?php
/**
 * Homepage Template
 */
get_header();
?>

<!-- Hero Section -->
<section class="hero">
	<div class="container hero-container">
		<div class="hero-content">
			<span class="hero-badge">EST. 1994 — LÍDERES EN MAQUINARIA INDUSTRIAL</span>
			<h1 class="hero-title">Infraestructura <em>que impulsa</em> el futuro textil.</h1>
			<p class="hero-description">
				Especialistas en tecnología KINGTEX y SWF. Soluciones integrales de costura y bordado con los más altos estándares industriales del Ecuador.
			</p>
			<div class="hero-buttons">
				<a href="<?php echo esc_url( home_url( '/shop' ) ); ?>" class="btn btn-dark">
					EXPLORAR CATÁLOGO →
				</a>
				<a href="<?php echo esc_url( home_url( '/contacto' ) ); ?>" class="btn btn-outline">
					SOLICITAR PRESUPUESTO
				</a>
			</div>
		</div>

		<div class="hero-image">
			<?php
			// Show featured image if available
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'large' );
			} else {
				echo '<div class="placeholder-image">Maquinaria industrial textil</div>';
			}
			?>
		</div>
	</div>

	<!-- Stats Section -->
	<div class="hero-stats">
		<div class="container">
			<div class="stats-grid">
				<div class="stat-item">
					<div class="stat-number">30+</div>
					<div class="stat-label">AÑOS DE EXPERIENCIA</div>
				</div>
				<div class="stat-item">
					<div class="stat-number">500+</div>
					<div class="stat-label">CLIENTES ACTIVOS</div>
				</div>
				<div class="stat-item">
					<div class="stat-number">5000+</div>
					<div class="stat-label">MÁQUINAS INSTALADAS</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Main Content -->
<main class="container">
	<?php
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			?>
			<div class="page-content">
				<?php the_content(); ?>
			</div>
			<?php
		}
	}

	// Show recent products
	if ( class_exists( 'WooCommerce' ) ) {
		echo '<section class="recent-products">';
		echo '<h2>Productos Destacados</h2>';
		echo do_shortcode( '[products limit="8" columns="4" orderby="date" order="DESC"]' );
		echo '</section>';
	}
	?>
</main>

<?php get_footer(); ?>
