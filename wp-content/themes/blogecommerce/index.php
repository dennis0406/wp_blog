<?php get_header(); ?>

<section class="banner">
	<a class="banner__item" href="#">
		<img class="banner__item__image" src="https://img.freepik.com/free-vector/sport-shoes-sneakers-set_74855-313.jpg?w=2000" alt="">
		<p class="banner__item__category switch__dark-mode">Espadrilles</p>
		<div class="banner__item--bottom">
			<h2 class="banner__item--bottom__title">This is the title banner</h2>
			<p class="banner__item--bottom__excerpt">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus, voluptatem!</p>
			<button class="banner__item--bottom__btn btn switch__dark-mode">See more</button>
		</div>
	</a>
</section>
<section class="post--latest">
	<?php get_template_part('latest-post') ?>
</section>

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