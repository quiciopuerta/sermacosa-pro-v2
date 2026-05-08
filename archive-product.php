<?php get_header(); ?>

<div class="page-header">
	<div class="container">
		<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
		<p class="page-subtitle">Explora nuestra selección de maquinaria industrial textil de alta gama</p>
	</div>
</div>

<main class="container">
	<?php
	if ( have_posts() ) {
		// Products loop
		echo '<div class="product-grid">';

		$delay = 0;
		while ( have_posts() ) {
			the_post();
			global $product;
			?>
			<div class="product-card fade-up" style="--delay: <?php echo $delay; ?>s">
				<div class="product-image-wrapper">
					<a href="<?php the_permalink(); ?>">
						<?php 
						if ( has_post_thumbnail() ) { 
							the_post_thumbnail( 'large' ); 
						} else {
							echo '<img src="' . get_template_directory_uri() . '/images/placeholder.jpg" alt="Sermacosa Placeholder">';
						}
						?>
					</a>
				</div>
				
				<div class="product-details">
					<span class="product-category">
						<?php
						$terms = get_the_terms( get_the_ID(), 'product_cat' );
						if ( $terms && ! is_wp_error( $terms ) ) {
							echo esc_html( $terms[0]->name );
						}
						?>
					</span>
					
					<h3 class="product-name">
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h3>
					
					<div class="product-excerpt">
						<?php echo wp_trim_words( get_the_excerpt(), 12, '...' ); ?>
					</div>
					
					<div class="product-price">
						<?php if ( $product ) echo wp_kses_post( $product->get_price_html() ); ?>
					</div>
					
					<div style="margin-top: 1.5rem;">
						<a href="<?php the_permalink(); ?>" class="button" style="width: 100%; text-align: center;">
							VER DETALLES
						</a>
					</div>
				</div>
			</div>
			<?php
			$delay += 0.1;
		}

		echo '</div>';

		// Pagination
		echo '<div class="pagination-wrapper" style="margin: 4rem 0; display: flex; justify-content: center;">';
		woocommerce_pagination();
		echo '</div>';
		
	} else {
		echo '<div class="premium-card" style="text-align: center; margin: 5rem 0;">';
		echo '<h2>No se encontraron productos</h2>';
		echo '<p>Prueba con otros términos de búsqueda o vuelve más tarde.</p>';
		echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="button" style="margin-top: 2rem;">VOLVER AL INICIO</a>';
		echo '</div>';
	}
	?>
</main>

<?php get_footer(); ?>
