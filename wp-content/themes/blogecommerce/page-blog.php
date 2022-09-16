<?php get_header(); ?>

<div class="container__both-main-sidebar">
	<div class="main__container">
		
  <?php
$type = 'post';
$args = array(
  'post_type' => $type,
  'post_status' => 'publish',
  'posts_per_page' => 10,
  
);
$my_query = null;
$my_query = new WP_Query($args);
if ($my_query->have_posts()) {
  while ($my_query->have_posts()) : $my_query->the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('post__item'); ?>>
      <?php display_thumbnail('thumbnail', true, 'post__item__image--latest'); ?>
      <div class="post__item__content">
        <?php display_entry_header('post__item__content__title'); ?>
        <div class="post__item__content__excerpt">
          <?php display_entry_content(); ?>
        </div>
        <?php display_entry_meta('post__item__content__meta'); ?>
    </article>
<?php
  endwhile;
}
wp_reset_postdata();
?>


	</div>
	<section class="sidebar__container">
		<?php get_sidebar(); ?>
	</section>
</div>

<?php get_footer(); ?>