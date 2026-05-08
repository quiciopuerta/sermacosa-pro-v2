<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="page-header">
	<div class="container">
		<h1 class="page-title"><?php the_title(); ?></h1>
		<?php if ( has_excerpt() ) : ?>
			<p class="page-subtitle"><?php echo get_the_excerpt(); ?></p>
		<?php endif; ?>
	</div>
</div>

<main class="container">
	<article class="premium-card fade-up" style="margin-bottom: 5rem; padding: 4rem;">
		<?php if ( has_post_thumbnail() ) : ?>
			<div style="margin-bottom: 3rem; border-radius: var(--radius); overflow: hidden;">
				<?php the_post_thumbnail( 'large', array( 'style' => 'width: 100%; height: auto;' ) ); ?>
			</div>
		<?php endif; ?>

		<div class="post-content">
			<?php the_content(); ?>
		</div>
	</article>
</main>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
