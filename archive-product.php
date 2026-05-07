<?php get_header(); ?>

<main class="container">
	<?php
	if ( have_posts() ) {
		// Archive title
		woocommerce_page_title();

		// Products loop
		echo '<div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 2rem; margin: 2rem 0;">';

		while ( have_posts() ) {
			the_post();
			global $product;
			?>
			<div class="product">
				<div class="product-image">
					<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'large' ); } ?>
				</div>
				<h3 class="post-title" style="font-size: 1.25rem;">
					<a href="<?php the_permalink(); ?>" style="color: var(--primary-navy); text-decoration: none;">
						<?php the_title(); ?>
					</a>
				</h3>
				<?php if ( $product ) { ?>
					<div style="color: var(--primary-orange); font-weight: 700; margin: 1rem 0;">
						<?php echo wp_kses_post( $product->get_price_html() ); ?>
					</div>
				<?php } ?>
				<p style="color: var(--text-gray); font-size: 0.9rem; margin: 1rem 0;">
					<?php echo wp_trim_words( get_the_content(), 15, '...' ); ?>
				</p>
				<a href="<?php the_permalink(); ?>" class="button" style="display: block; text-align: center;">
					Ver detalles
				</a>
			</div>
			<?php
		}

		echo '</div>';

		// Pagination
		woocommerce_pagination();
	} else {
		echo '<p>No se encontraron productos.</p>';
	}
	?>
</main>

<?php get_footer(); ?>
