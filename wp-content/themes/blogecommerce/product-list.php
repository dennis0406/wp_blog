<?php
$args = array(
  'post_type' => 'product',
  'post_status' => 'publish',

);
$my_query = new WP_Query($args);
if ($my_query->have_posts()) {
  while ($my_query->have_posts()) : $my_query->the_post();
    $regular_price = get_post_meta(get_the_ID(), 'regular price', true);
    $sale_price = get_post_meta(get_the_ID(), 'sale price', true);
    $name = get_post_meta(get_the_ID(), 'name', true);
    $desc = get_post_meta(get_the_ID(), 'desc', true);
    $color = get_post_meta(get_the_ID(), 'color', true);

    if (!empty($regular_price)) {
    }
?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('product__item'); ?>>
      <?php display_thumbnail('thumbnail', false, 'product__item__image'); ?>
      <div class="product__item__content">
        <a class="product__item__name" href="<?php the_permalink() ?>"><?php echo $name ?></a>
        <?php the_category() ; display_entry_tag('product__item__tag'); ?>
      </div>
    </article>
<?php
  endwhile;
}
wp_reset_postdata();
?>