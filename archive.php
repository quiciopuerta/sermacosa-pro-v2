<?php get_header(); ?>

<main class="container">
	<?php
	if ( have_posts() ) {
		// Archive title
		if ( is_category() ) {
			echo '<h1 class="page-title">Categoría: ' . esc_html( single_cat_title( '', false ) ) . '</h1>';
		} elseif ( is_tag() ) {
			echo '<h1 class="page-title">Etiqueta: ' . esc_html( single_tag_title( '', false ) ) . '</h1>';
		} elseif ( is_author() ) {
			echo '<h1 class="page-title">Autor: ' . esc_html( get_the_author() ) . '</h1>';
		} elseif ( is_date() ) {
			echo '<h1 class="page-title">' . esc_html( get_the_archive_title() ) . '</h1>';
		} elseif ( is_search() ) {
			echo '<h1 class="page-title">Resultados de búsqueda para: <em>' . esc_html( get_search_query() ) . '</em></h1>';
		}

		// Posts grid
		echo '<div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 2rem; margin: 2rem 0;">';

		while ( have_posts() ) {
			the_post();
			?>
			<article class="post">
				<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'large' ); } ?>
				<h2 class="post-title" style="font-size: 1.5rem;">
					<a href="<?php the_permalink(); ?>" style="color: var(--primary-navy); text-decoration: none;">
						<?php the_title(); ?>
					</a>
				</h2>
				<div class="post-meta">
					📅 <?php echo esc_html( get_the_date() ); ?>
				</div>
				<p><?php echo wp_trim_words( get_the_content(), 20, '...' ); ?></p>
				<a href="<?php the_permalink(); ?>" class="button">Leer más</a>
			</article>
			<?php
		}

		echo '</div>';

		the_posts_pagination();
	} else {
		echo '<p>No se encontraron entradas.</p>';
	}
	?>
</main>

<?php get_footer(); ?>
