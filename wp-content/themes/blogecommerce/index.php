<?php get_header();?>

<div id="site-content">
    <div class="post">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="entry">
				<?php the_content(); ?>
			</div>
		</div>
	<?php endwhile; endif; ?>
    </div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
