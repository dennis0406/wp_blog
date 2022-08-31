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
<h2 class="title__section">Latest posts</h2>
<a href="/post" class="view-all">View all</a>
<section class="post--latest">
	<?php get_template_part('latest-post') ?>
</section>

<div class="container__both-main-sidebar">
	<div class="main__container">
		<h2 class="title__section">our products</h2>
		<a href="<?php echo get_post_type_archive_link('product') ?>" class="view-all">View all</a>
		<section class="product__list">
			<?php get_template_part('product-list', 'none'); ?>
		</section>
	</div>
	<section class="sidebar__container">
		<?php get_sidebar(); ?>
	</section>
</div>

<?php get_footer(); ?>