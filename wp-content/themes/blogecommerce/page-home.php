<?php get_header(); ?>

	<?php wptutsplus_home_page_banner(); ?>
<h2 class="title__section">Latest posts</h2>
<a href="/blog" class="view-all">View all</a>
<section class="post--latest">
	<?php get_template_part('latest-post') ?>
</section>

<div class="container__both-main-sidebar">
	<div class="main__container">
		<h2 class="title__section">our products</h2>
		<a href="/shop" class="view-all">View all</a>
		<!-- echo get_post_type_archive_link('product')  -->
		<div id="alert_cart">
			<?php do_action('woocommerce_before_cart'); ?>
		</div>
		<section class="product__list">
			<?php get_template_part('product-list', 'none'); ?>
		</section>
	</div>
	<section class="sidebar__container">
		<?php get_sidebar(); ?>
	</section>
</div>

<?php get_footer(); ?>