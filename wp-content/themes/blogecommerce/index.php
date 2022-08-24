<?php get_header(); ?>
<section id="post">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php get_template_part('content', get_post_format()); ?>
		<?php endwhile; ?>

	<?php else : ?>
		<?php get_template_part('content', 'none'); ?>
	<?php endif; ?>
</section>
<section id="sidebar-content">
	<?php get_sidebar(); ?>
</section>
<?php get_footer(); ?>