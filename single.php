<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="page-header" style="background: var(--white); border-bottom: 1px solid var(--border-color); padding: 6rem 0; margin-bottom: 5rem; text-align: center;">
	<div class="container" style="max-width: 900px;">
		<p class="hero-badge" style="margin-bottom: 1.5rem; justify-content: center;">
			<?php echo esc_html( get_the_date() ); ?>
		</p>
		<h1 class="page-title" style="margin-bottom: 2rem; line-height: 1.1;"><?php the_title(); ?></h1>
		<div style="display: flex; justify-content: center; gap: 2rem; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.1em; font-weight: 700;">
			<span>Por: <?php the_author(); ?></span>
			<?php
			$categories = get_the_category();
			if ( $categories ) {
				echo '<span>Categoría: ';
				foreach ( $categories as $cat ) {
					echo '<a href="' . esc_url( get_category_link( $cat->term_id ) ) . '" style="color: var(--primary-orange); text-decoration: none;">' . esc_html( $cat->name ) . '</a> ';
				}
				echo '</span>';
			}
			?>
		</div>
	</div>
</div>

<main class="container" style="max-width: 900px;">
	<article class="blog-post fade-up">
		<?php if ( has_post_thumbnail() ) : ?>
			<div style="margin-bottom: 4rem; border: 1px solid var(--border-color);">
				<?php the_post_thumbnail( 'full', array( 'style' => 'width: 100%; height: auto; display: block;' ) ); ?>
			</div>
		<?php endif; ?>

		<div class="post-content" style="font-size: 1.15rem; line-height: 1.8; color: #334155;">
			<?php the_content(); ?>
		</div>

		<div style="margin-top: 6rem; padding-top: 4rem; border-top: 1px solid var(--border-color);">
			<?php
			$prev_post = get_previous_post();
			$next_post = get_next_post();

			if ( $prev_post || $next_post ) : ?>
				<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem;">
					<?php if ( $prev_post ) : ?>
						<a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" style="text-decoration: none; group">
							<p style="font-size: 0.75rem; color: var(--primary-orange); text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 1rem; font-weight: 700;">Anterior</p>
							<h4 style="color: var(--primary-navy); margin: 0; font-size: 1.1rem; line-height: 1.4;"><?php echo esc_html( get_the_title( $prev_post->ID ) ); ?></h4>
						</a>
					<?php else : ?>
						<div></div>
					<?php endif; ?>

					<?php if ( $next_post ) : ?>
						<a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" style="text-decoration: none; text-align: right;">
							<p style="font-size: 0.75rem; color: var(--primary-orange); text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 1rem; font-weight: 700;">Siguiente</p>
							<h4 style="color: var(--primary-navy); margin: 0; font-size: 1.1rem; line-height: 1.4;"><?php echo esc_html( get_the_title( $next_post->ID ) ); ?></h4>
						</a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>

		<?php if ( comments_open() || get_comments_number() ) : ?>
			<div style="margin-top: 6rem; padding: 4rem; background: var(--white); border: 1px solid var(--border-color);">
				<?php comments_template(); ?>
			</div>
		<?php endif; ?>
	</article>
</main>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
