<?php get_header(); ?>

<main class="container">
	<?php
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			?>
			<article class="post">
				<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'large' ); } ?>
				<h1 class="post-title"><?php the_title(); ?></h1>
				<div class="post-meta">
					📅 <?php echo esc_html( get_the_date() ); ?> | 👤 <?php the_author(); ?>
					<?php
					$categories = get_the_category();
					if ( $categories ) {
						echo ' | 📁 ';
						foreach ( $categories as $cat ) {
							echo '<a href="' . esc_url( get_category_link( $cat->term_id ) ) . '">' . esc_html( $cat->name ) . '</a> ';
						}
					}
					?>
				</div>
				<?php the_content(); ?>
			</article>

			<div style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid var(--border-color);">
				<?php
				// Previous/Next Posts
				$prev_post = get_previous_post();
				$next_post = get_next_post();

				if ( $prev_post || $next_post ) {
					echo '<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">';

					if ( $prev_post ) {
						echo '<div>';
						echo '<p style="font-size: 0.9rem; color: var(--text-gray);">Post anterior</p>';
						echo '<a href="' . esc_url( get_permalink( $prev_post->ID ) ) . '" style="color: var(--primary-orange); text-decoration: none; font-weight: 600;">';
						echo esc_html( get_the_title( $prev_post->ID ) );
						echo '</a>';
						echo '</div>';
					}

					if ( $next_post ) {
						echo '<div style="text-align: right;">';
						echo '<p style="font-size: 0.9rem; color: var(--text-gray);">Próximo post</p>';
						echo '<a href="' . esc_url( get_permalink( $next_post->ID ) ) . '" style="color: var(--primary-orange); text-decoration: none; font-weight: 600;">';
						echo esc_html( get_the_title( $next_post->ID ) );
						echo '</a>';
						echo '</div>';
					}

					echo '</div>';
				}
				?>
			</div>

			<?php
			// Comments
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		}
	}
	?>
</main>

<?php get_footer(); ?>
