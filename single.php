<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="page-header" style="background: var(--light-bg); border-bottom: none;">
	<div class="container">
		<h1 class="page-title"><?php the_title(); ?></h1>
		<div class="post-meta" style="justify-content: center; border-bottom: none; margin-bottom: 0;">
			<span>📅 <?php echo esc_html( get_the_date() ); ?></span>
			<span>👤 <?php the_author(); ?></span>
			<?php
			$categories = get_the_category();
			if ( $categories ) {
				echo '<span>📁 ';
				foreach ( $categories as $cat ) {
					echo '<a href="' . esc_url( get_category_link( $cat->term_id ) ) . '" style="color: var(--primary-orange); text-decoration: none;">' . esc_html( $cat->name ) . '</a> ';
				}
				echo '</span>';
			}
			?>
		</div>
	</div>
</div>

<main class="container">
	<article class="blog-post fade-up">
		<?php if ( has_post_thumbnail() ) : ?>
			<div style="margin-bottom: 3rem; border-radius: var(--radius); overflow: hidden; box-shadow: var(--shadow-md);">
				<?php the_post_thumbnail( 'large', array( 'style' => 'width: 100%; height: auto; display: block;' ) ); ?>
			</div>
		<?php endif; ?>

		<div class="post-content">
			<?php the_content(); ?>
		</div>

		<div style="margin-top: 5rem; padding-top: 3rem; border-top: 1px solid var(--border-color);">
			<?php
			$prev_post = get_previous_post();
			$next_post = get_next_post();

			if ( $prev_post || $next_post ) : ?>
				<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
					<?php if ( $prev_post ) : ?>
						<a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" style="text-decoration: none; group">
							<p style="font-size: 0.85rem; color: var(--text-gray); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.5rem;">Anterior</p>
							<h4 style="color: var(--primary-navy); transition: var(--transition);"><?php echo esc_html( get_the_title( $prev_post->ID ) ); ?></h4>
						</a>
					<?php else : ?>
						<div></div>
					<?php endif; ?>

					<?php if ( $next_post ) : ?>
						<a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" style="text-decoration: none; text-align: right;">
							<p style="font-size: 0.85rem; color: var(--text-gray); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.5rem;">Siguiente</p>
							<h4 style="color: var(--primary-navy); transition: var(--transition);"><?php echo esc_html( get_the_title( $next_post->ID ) ); ?></h4>
						</a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>

		<?php if ( comments_open() || get_comments_number() ) : ?>
			<div style="margin-top: 5rem;">
				<?php comments_template(); ?>
			</div>
		<?php endif; ?>
	</article>
</main>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
