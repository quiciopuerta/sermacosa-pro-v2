<?php get_header(); ?>

<main class="container">
	<?php
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			?>
			<article class="page">
				<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'large' ); } ?>
				<h1 class="page-title"><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</article>
			<?php
		}
	}
	?>
</main>

<?php get_footer(); ?>
