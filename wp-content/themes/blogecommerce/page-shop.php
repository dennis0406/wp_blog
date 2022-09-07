<?php get_header(); ?>

<div class="container__both-main-sidebar">
  <div class="main__container">
    <div id="alert_cart">
      <?php do_action('woocommerce_before_cart'); ?>
    </div>
    <?php
    $args = array(
      'post_type' => 'product',
      'post_status' => 'publish',

    );
    $my_query = new WP_Query($args);
    if ($my_query->have_posts()) {
      while ($my_query->have_posts()) : $my_query->the_post();
        $regular_price = get_post_meta(get_the_ID(), '_regular_price', true);
        $sale_price = get_post_meta(get_the_ID(), '_sale_price', true);
        $desc = get_post(get_the_ID())->post_excerpt;
    ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('product__item'); ?>>
          <?php display_thumbnail('', false, 'product__item__image'); ?>
          <div class="product__item__content">
            <div class="product__item__content__category">
              <?php // todo: Get the category of the product
              echo (wp_get_post_terms(get_the_ID(), 'product_cat')[0]->name);
              ?>
            </div>
            <?php display_entry_header('product__item__content__title'); ?>
            <p class="product__item__content__desc"><?php echo $desc ?></p>
            <div class="product__item__content__price">
              <?php if ($sale_price == !null) {
                echo '<p class="product__item__content__price--sale price">' . $sale_price . '</p>';
              } ?>
              <p class="product__item__content__price--regular price"><?php echo $regular_price ?></p>
            </div>
            <div class="product__item__content__add-to-card">
              <a href="?add-to-cart=<?php echo the_ID(); ?>" class="btn">Add to card</a>
            </div>
          </div>
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