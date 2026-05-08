<?php get_header(); ?>

<main class="container" style="min-height: 70vh; display: flex; align-items: center; justify-content: center; text-align: center;">
	<div class="premium-card fade-up" style="max-width: 600px; padding: 4rem;">
		<div style="font-size: 6rem; font-weight: 900; color: rgba(232, 80, 10, 0.1); line-height: 1; margin-bottom: 1rem;">404</div>
		<h1 class="page-title" style="font-size: 2rem;">Página No Encontrada</h1>
		<p class="page-subtitle" style="margin-bottom: 3rem;">Lo sentimos, la página que estás buscando no existe o ha sido movida.</p>
		
		<div style="display: flex; flex-direction: column; gap: 1rem;">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button" style="padding: 1.25rem;">
				VOLVER AL INICIO
			</a>
			<a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" style="color: var(--primary-navy); text-decoration: none; font-weight: 700; font-size: 0.9rem;">
				Ver catálogo de maquinaria
			</a>
		</div>
	</div>
</main>

<?php get_footer(); ?>
