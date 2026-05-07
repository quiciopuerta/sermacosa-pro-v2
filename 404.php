<?php get_header(); ?>

<main class="container">
	<article class="page" style="text-align: center;">
		<h1 class="page-title" style="font-size: 4rem; color: var(--primary-orange);">404</h1>
		<h2>Página no encontrada</h2>
		<p style="font-size: 1.1rem; color: var(--text-gray); margin: 2rem 0;">
			Lo sentimos, la página que buscas no existe o ha sido movida.
		</p>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button">Volver al inicio</a>

		<div style="margin-top: 3rem; padding-top: 2rem; border-top: 1px solid var(--border-color);">
			<h3>Buscar contenido</h3>
			<?php get_search_form(); ?>
		</div>
	</article>
</main>

<?php get_footer(); ?>
