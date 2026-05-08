<?php
/**
 * Homepage Template
 */
get_header();
?>

<!-- Hero Section -->
<section class="hero">
	<div class="container hero-container">
		<div class="hero-content fade-up">
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

		<div class="hero-image fade-up" style="--delay:0.15s">
			<div class="swiper hero-swiper">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<img src="<?php echo get_template_directory_uri(); ?>/images/hero-1.png" alt="Maquinaria Kingtex SERMACOSA">
					</div>
					<div class="swiper-slide">
						<img src="<?php echo get_template_directory_uri(); ?>/images/hero-2.png" alt="Infraestructura Industrial SWF">
					</div>
					<div class="swiper-slide">
						<img src="<?php echo get_template_directory_uri(); ?>/images/hero-3.png" alt="Tecnología de Bordado Precisión">
					</div>
				</div>
				<!-- Add Pagination -->
				<div class="swiper-pagination"></div>
				<!-- Add Navigation -->
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
			</div>
		</div>
	</div>

	<!-- Stats Section -->
	<div class="hero-stats">
		<div class="container">
			<div class="stats-grid">
				<div class="stat-item fade-up">
					<div class="stat-number" data-target="30" data-suffix="+">30+</div>
					<div class="stat-label">AÑOS DE EXPERIENCIA</div>
				</div>
				<div class="stat-item fade-up" style="--delay:0.1s">
					<div class="stat-number" data-target="500" data-suffix="+">500+</div>
					<div class="stat-label">CLIENTES ACTIVOS</div>
				</div>
				<div class="stat-item fade-up" style="--delay:0.2s">
					<div class="stat-number" data-target="5000" data-suffix="+">5000+</div>
					<div class="stat-label">MÁQUINAS INSTALADAS</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Main Content -->
<main class="container" id="main-content">
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
		echo '<section class="recent-products fade-up" style="--delay:0.3s">';
		echo '	<div class="section-header">';
		echo '		<span class="section-badge">NUESTRA MAQUINARIA</span>';
		echo '		<h2 class="section-title">Equipos de <em>Alta Precisión</em></h2>';
		echo '	</div>';
		
		echo '	<div class="products-container">';
		echo do_shortcode( '[products limit="4" columns="4" orderby="date" order="DESC"]' );
		echo '	</div>';
		
		echo '	<div class="section-footer">';
		echo '		<a href="' . esc_url( home_url( '/shop' ) ) . '" class="btn btn-outline">VER CATÁLOGO COMPLETO</a>';
		echo '	</div>';
		echo '</section>';
	}
	?>
</main>

<?php get_footer(); ?>
