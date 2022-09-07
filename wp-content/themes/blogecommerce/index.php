<?php get_header(); ?>

<div class="container__both-main-sidebar">
	<div class="main__container">
		<?php if (have_posts() ) : while (have_posts()) : the_post(); ?>
				<?php get_template_part('content', get_post_format()); ?>
			<?php endwhile; ?>
		<?php else : ?>
			<?php get_template_part('content', 'none'); ?>
		<?php endif; ?>
	</div>
	<section class="sidebar__container">
		<?php get_sidebar(); ?>
	</section>
</div>

<?php get_footer(); ?>