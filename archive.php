<?php get_header(); ?>

<div class="page-header" style="background: var(--white); border-bottom: 1px solid var(--border-color); padding: 5rem 0; margin-bottom: 5rem;">
	<div class="container">
		<?php
		if ( is_category() ) {
			echo '<p class="hero-badge" style="margin-bottom: 1rem;">Categoría</p>';
			echo '<h1 class="page-title" style="margin: 0;">' . esc_html( single_cat_title( '', false ) ) . '</h1>';
		} elseif ( is_tag() ) {
			echo '<p class="hero-badge" style="margin-bottom: 1rem;">Etiqueta</p>';
			echo '<h1 class="page-title" style="margin: 0;">' . esc_html( single_tag_title( '', false ) ) . '</h1>';
		} elseif ( is_author() ) {
			echo '<p class="hero-badge" style="margin-bottom: 1rem;">Autor</p>';
			echo '<h1 class="page-title" style="margin: 0;">' . esc_html( get_the_author() ) . '</h1>';
		} elseif ( is_date() ) {
			echo '<p class="hero-badge" style="margin-bottom: 1rem;">Archivo</p>';
			echo '<h1 class="page-title" style="margin: 0;">' . esc_html( get_the_archive_title() ) . '</h1>';
		} elseif ( is_search() ) {
			echo '<p class="hero-badge" style="margin-bottom: 1rem;">Búsqueda</p>';
			echo '<h1 class="page-title" style="margin: 0;">Resultados para: ' . esc_html( get_search_query() ) . '</h1>';
		} else {
			echo '<p class="hero-badge" style="margin-bottom: 1rem;">Editorial</p>';
			echo '<h1 class="page-title" style="margin: 0;">Blog & Noticias</h1>';
		}
		?>
	</div>
</div>

<main class="container">
	<?php if ( have_posts() ) : ?>
		<div class="blog-grid">
			<?php while ( have_posts() ) : the_post(); ?>
				<article class="blog-card fade-up">
					<div class="blog-card-image">
						<a href="<?php the_permalink(); ?>">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'large' ); ?>
							<?php else : ?>
								<div class="placeholder-image" style="height: 100%;">SERMACOSA</div>
							<?php endif; ?>
						</a>
					</div>
					<div class="blog-card-content">
						<div class="blog-card-date"><?php echo esc_html( get_the_date() ); ?></div>
						<h2 class="blog-card-title">
							<a href="<?php the_permalink(); ?>" style="color: inherit; text-decoration: none;">
								<?php the_title(); ?>
							</a>
						</h2>
						<div class="blog-card-excerpt">
							<?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?>
						</div>
						<a href="<?php the_permalink(); ?>" class="blog-card-link">Leer Artículo</a>
					</div>
				</article>
			<?php endwhile; ?>
		</div>

		<div style="margin: 5rem 0;">
			<?php the_posts_pagination( array(
				'prev_text' => 'Anterior',
				'next_text' => 'Siguiente',
				'class'     => 'sermacosa-pagination'
			) ); ?>
		</div>
	<?php else : ?>
		<div style="text-align: center; padding: 5rem 0;">
			<p style="font-size: 1.25rem; color: var(--text-gray);">No se encontraron entradas disponibles.</p>
			<a href="<?php echo home_url(); ?>" class="btn btn-dark" style="margin-top: 2rem;">Volver al Inicio</a>
		</div>
	<?php endif; ?>
</main>

<?php get_footer(); ?>
