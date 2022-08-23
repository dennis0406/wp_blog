<?php
$type = 'post';
$args = array(
  'post_type' => $type,
  'post_status' => 'publish',
  'posts_per_page' => 3,
  
);
$my_query = null;
$my_query = new WP_Query($args);
if ($my_query->have_posts()) {
  while ($my_query->have_posts()) : $my_query->the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('post__item'); ?>>
      <?php display_thumbnail('thumbnail', true); ?>
      <div class="post__item__content">
        <?php display_entry_header(); ?>
        <div class="post__item__content__excerpt">
          <?php display_entry_content(); ?>
          <?php (is_single() ? display_entry_tag() : ''); ?>
        </div>
        <?php display_entry_meta(); ?>
    </article>
<?php
  endwhile;
}
wp_reset_postdata();
?>