<?php
$args = array(
  'post_type' => 'product',
  'post_status' => 'publish',
  'posts_per_page' => 10,

);
$my_query = new WP_Query($args);
if ($my_query->have_posts()) {
  while ($my_query->have_posts()) : $my_query->the_post();
    $regular_price = get_post_meta(get_the_ID(), 'regular price', true);
    $sale_price = get_post_meta(get_the_ID(), 'sale price', true);
    $desc = get_post_meta(get_the_ID(), 'desc', true);
    $color = get_post_meta(get_the_ID(), 'color', true);

    if (!empty($regular_price)) {
    }
?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('product__item'); ?>>
      <?php display_thumbnail('', false, 'product__item__image'); ?>
      <div class="product__item__content">
        <div class="product__item__content__category">
          <?php the_category(' &bull; ') ; ?>
        </div>
        <?php display_entry_header('product__item__content__title'); ?>
        <p class="product__item__content__desc"><?php echo $desc ?></p>
        <div class="product__item__content__price">
          <p class="product__item__content__price--sale price"><?php echo $sale_price ?></p>
          <p class="product__item__content__price--regular price"><?php echo $regular_price ?></p>
        </div>
        <div class="product__item__content__add-to-card">
          <a href="#addtocard" class="btn">Add to card</a>
        </div>
      </div>
    </article>
<?php
  endwhile;
}
wp_reset_postdata();
?>