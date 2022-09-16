<aside class=" sidebar__list">
  <!-- randomly post -->
  <div class="post--recommended__container">
    <h2 class="sidebar__title">Recommended</h2>
    <?php
    query_posts(array('orderby' => 'rand', 'showposts' => 2));
    if (have_posts()) :
      while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('post--recommended'); ?>>
          <?php display_thumbnail('thumbnail', true, 'post--recommended__image'); ?>
          <div class="post--recommended__content">
            <?php display_entry_header('post--recommended__content__title'); ?>
            <div class="post--recommended__content__excerpt">
              <?php display_entry_content(); ?>
              <?php (is_single() ? display_entry_tag('post--recommended__content__meta__tag') : ''); ?>
            </div>
            <?php display_entry_meta('post--recommended__content__meta'); ?>
        </article>

    <?php endwhile;

    endif;
    wp_reset_postdata(); ?>
  </div>
  <!-- categories -->
  <h2 class="sidebar__title">Categories</h2>
  <div class="sidebar__taxonomy">
    <?php
    $categories = get_categories('orderby=name&show_count=1');
    $categories_prd = get_terms( ['taxonomy' => 'product_cat'] );
    if ($categories) {
      foreach ($categories as $category) {
        echo '<a  class="sidebar__taxonomy__item" href="' . get_category_link($category->term_id) . '">' . '<span class="sidebar__taxonomy__item--name">' . $category->name . '</span>' . '<span class="sidebar__taxonomy__item--count">' . $category->count . '</span>' . '</a>';
      }
    }
    if ($categories_prd) {
      foreach ($categories_prd as $category) {
        echo '<a  class="sidebar__taxonomy__item" href="' . get_category_link($category->term_id) . '">' . '<span class="sidebar__taxonomy__item--name">' . $category->name . '</span>' . '<span class="sidebar__taxonomy__item--count">' . $category->count . '</span>' . '</a>';
      }
    }
    ?>
  </div>

  <!-- tags -->
  <h2 class="sidebar__title">Tags</h2>
  <div class="sidebar__taxonomy">
    <?php
    $tags = get_tags('');
    $prd_tags = get_terms( ['taxonomy' => 'product_tag'] );

    if ($tags) {
      foreach ($tags as $tag) {
        echo '<a  class="sidebar__taxonomy__item" href="' . get_category_link($tag->term_id) . '">' . '<span class="sidebar__taxonomy__item--name">' . $tag->name . '</span>' . '<span class="sidebar__taxonomy__item--count">' . $tag->count . '</span>' . '</a>';
      }
    }
    if ($prd_tags) {
      foreach ($prd_tags as $prd_tag) {
        echo '<a  class="sidebar__taxonomy__item" href="' . get_category_link($prd_tag->term_id) . '">' . '<span class="sidebar__taxonomy__item--name">' . $prd_tag->name . '</span>' . '<span class="sidebar__taxonomy__item--count">' . $prd_tag->count . '</span>' . '</a>';
      }
    }
     ?>
  </div>
</aside>