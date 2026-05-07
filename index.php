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
				</div>
				<?php the_content(); ?>
				<hr style="margin: 2rem 0; border: none; border-top: 1px solid var(--border-color);">
			</article>
			<?php
		}
		the_posts_pagination();
	} else {
		echo '<p>No hay contenido disponible.</p>';
	}
	?>
</main>

<?php get_footer(); ?>
