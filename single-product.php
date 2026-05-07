<?php get_header(); ?>

<main class="container">
	<?php
	while ( have_posts() ) {
		the_post();
		?>
		<article class="product">
			<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; align-items: start;">
				<div>
					<?php woocommerce_show_product_images(); ?>
				</div>
				<div>
					<h1 class="post-title"><?php the_title(); ?></h1>

					<?php
					global $product;
					if ( $product ) {
						// Price
						echo '<div style="margin: 1rem 0; font-size: 1.5rem; color: var(--primary-orange); font-weight: 700;">';
						echo wp_kses_post( $product->get_price_html() );
						echo '</div>';

						// Description
						echo '<div style="margin: 1rem 0; color: var(--text-gray);">';
						echo wp_kses_post( $product->get_short_description() );
						echo '</div>';

						// Add to cart form
						woocommerce_template_single_add_to_cart();

						// Product meta
						echo '<div style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid var(--border-color);">';
						woocommerce_template_single_meta();
						echo '</div>';
					}
					?>
				</div>
			</div>

			<?php
			// Full description
			if ( $product && $product->get_description() ) {
				echo '<div style="margin-top: 3rem; padding-top: 2rem; border-top: 1px solid var(--border-color);">';
				echo '<h2>Descripción</h2>';
				echo wp_kses_post( $product->get_description() );
				echo '</div>';
			}
			?>
		</article>

		<?php
		// Related products
		woocommerce_output_related_products();
	}
	?>
</main>

<?php get_footer(); ?>
