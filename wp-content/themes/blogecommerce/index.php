<?php get_header(); ?>

<section id="main-content">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php get_template_part('content', get_post_format()); ?>
		<?php endwhile; ?>
		<?php display_pagination(); ?>
	<?php else : ?>
		<?php get_template_part('content', 'none'); ?>
	<?php endif; ?>
</section>
<section id="sidebar-content">
	<?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>