<?php get_header(); ?>

<div class="page-header" style="padding: 2rem 0; margin-bottom: 2rem;">
	<div class="container" style="text-align: left;">
		<a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" style="color: var(--primary-orange); text-decoration: none; font-weight: 700; font-size: 0.85rem; display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1rem;">
			<svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"></path></svg>
			VOLVER A LA TIENDA
		</a>
		<h1 class="page-title" style="margin: 0; font-size: 2rem;"><?php the_title(); ?></h1>
	</div>
</div>

<main class="container">
	<?php
	while ( have_posts() ) {
		the_post();
		global $product;
		?>
		<article class="product-single">
			<div class="contact-container" style="gap: 4rem;">
				<div class="product-gallery fade-up">
					<?php 
					if ( has_post_thumbnail() ) {
						echo '<div class="premium-card" style="padding: 1rem;">';
						the_post_thumbnail( 'large', array( 'style' => 'width: 100%; height: auto; border-radius: var(--radius);' ) );
						echo '</div>';
					}
					?>
				</div>
				
				<div class="product-info fade-up" style="--delay: 0.1s">
					<div class="premium-card">
						<span class="product-category" style="display: block; margin-bottom: 1rem;">
							<?php echo wc_get_product_category_list( get_the_ID(), ', ', '<span class="posted_in">', '</span>' ); ?>
						</span>
						
						<div class="product-price" style="font-size: 2rem; margin-bottom: 1.5rem;">
							<?php if ( $product ) echo wp_kses_post( $product->get_price_html() ); ?>
						</div>

						<div class="product-short-description" style="font-size: 1.1rem; color: var(--text-gray); margin-bottom: 2rem; line-height: 1.6;">
							<?php the_excerpt(); ?>
						</div>

						<div class="product-actions" style="margin-bottom: 2rem;">
							<?php woocommerce_template_single_add_to_cart(); ?>
						</div>

						<div style="padding-top: 2rem; border-top: 1px solid var(--border-color); font-size: 0.85rem; color: var(--text-gray);">
							<?php woocommerce_template_single_meta(); ?>
						</div>
					</div>
				</div>
			</div>

			<?php if ( get_the_content() ) : ?>
				<div class="premium-card fade-up" style="margin-top: 4rem; --delay: 0.2s">
					<h2 style="margin-bottom: 2rem; color: var(--primary-navy); border-left: 4px solid var(--primary-orange); padding-left: 1.5rem;">Descripción Detallada</h2>
					<div class="post-content">
						<?php the_content(); ?>
					</div>
				</div>
			<?php endif; ?>

			<div class="related-products-section fade-up" style="margin-top: 5rem; --delay: 0.3s">
				<h3 style="font-size: 1.75rem; margin-bottom: 3rem; text-align: center;">Productos Relacionados</h3>
				<?php woocommerce_output_related_products(); ?>
			</div>
		</article>
	<?php } ?>
</main>

<?php get_footer(); ?>
