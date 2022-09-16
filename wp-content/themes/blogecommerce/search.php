<?php get_header(); ?>

<div class="container__both-main-sidebar">
  <div class="main__container">
    <div class="search__container">
      <?php _e("<h2 class='search__title'>Search Results for: <span class='search__word'>" . get_query_var('s') . "</span></h2>"); ?>
      <?php $s = get_search_query();
      $args = array(
        's' => $s
      );
      // The Query
      $the_query = new WP_Query($args);
      if ($the_query->have_posts()) {
        $check = false; ?>
        <!-- Results are posts -->
        <div class="search__posts">
          <h2 class="search__post__title title__section">Posts</h2>
          <div class="search__post__content">
            <?php
            while ($the_query->have_posts()) {
              $the_query->the_post();
              if ('post' == get_post_type()) {
                $check = true;
            ?>
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
              }
            }
            if (!$check) { ?>
              <div class="woocommerce-notices-wrapper">
                <div class="woocommerce-message" role="alert">No post available</div>
              </div>
            <?php }
            $check = false; ?>
          </div>
        </div>

        <!-- Results are products -->
        <div class="search__products">
          <h2 class="search__product__title title__section">products</h2>
          <div class="search__product__content">
            <?php
            // While loop for product display
            while ($the_query->have_posts()) {
              $the_query->the_post();
              if ('product' == get_post_type()) {
                $check = true;
                $regular_price = get_post_meta(get_the_ID(), '_regular_price', true);
                $sale_price = get_post_meta(get_the_ID(), '_sale_price', true);
                $desc = get_post(get_the_ID())->post_excerpt;
            ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class('product__item'); ?>>
                  <?php display_thumbnail('', false, 'product__item__image'); ?>
                  <div class="product__item__content">
                    <div class="product__item__content__category">
                      <?php echo (wp_get_post_terms(get_the_ID(), 'product_cat')[0]->name); ?>
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
                      <a href="?add-to-cart=<?php echo the_ID(); ?>#alert_cart" class="btn">Add to card</a>
                    </div>
                  </div>
                </article>

              <?php
              }
            }
            if (!$check) {
              ?>
              <div class="woocommerce-notices-wrapper">
                <div class="woocommerce-message" role="alert">No product available</div>
              </div>
            <?php

            }
            $check = false; ?>
          </div>
        </div>
        <!-- Search page -->
        <div class="search__page">
          <h2 class="search__page__titile title__section">Pages</h2>
          <div class="search__page__content">
            <?php
            while ($the_query->have_posts()) {
              $the_query->the_post();
              if ('page' == get_post_type()) {
                $check = true;
            ?>
                <li class="search__page__content__item">
                  <a class="animate_underline" href="<?php the_permalink(); ?>"><ion-icon name="return-down-forward-outline"></ion-icon><?php the_title(); ?></a>
                </li>
              <?php }
            }
            if (!$check) { ?>
              <div class="woocommerce-notices-wrapper">
                <div class="woocommerce-message" role="alert">No page available</div>
              </div>
            <?php } ?>
          </div>
        </div>
        <!-- Search banner -->
        <div class="search__banner">
          <h2 class="search__banner__titile title__section">events</h2>
          <div class="search__banner__content">
            <?php
            if ( $the_query->have_posts() ) { $count_post = 0; ?>
              <section class="banner ">
                  <?php while ( $the_query->have_posts()  ) : $the_query->the_post(); 
                  if ('banner' == get_post_type()) {
                    $check = true;
                    $count_post +=1;  ?>
                  <div class="banner__item fade" >
                    <?php display_thumbnail('image', false, 'banner__item__image'); ?>
                    
                    <div class="banner__item--bottom">
                      <a class="banner__item--bottom__title animate_underline" href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a>
                      <p class="banner__item--bottom__excerpt"><?php echo get_post(get_the_ID())->post_excerpt; ?></p>
                      <a href="<?php echo the_permalink(); ?>" class="banner__item--bottom__btn btn">See more</a>
                    </div>
                  </div>
                  <?php } endwhile; ?>
              </section>
              <br>
        
        <div style="text-align:center">
          <?php for($i = 0; $i < $count_post; $i+=1){
            echo '<span class="dot" onclick="currentSlide('.($i).')"></span> ';
          } ?>
        </div>
          <?php }
            if (!$check) { ?>
              <div class="woocommerce-notices-wrapper">
                <div class="woocommerce-message" role="alert">No page available</div>
              </div>
            <?php } ?>
          </div>
        </div>
      <?php
      } else {
      ?>
        <h2 class="search__nothing-found">Nothing Found</h2>
        <div class="woocommerce-notices-wrapper">
          <div class="woocommerce-message" role="alert">Sorry, but nothing matched your search criteria. Please try again with some different keywords.</div>
        </div>
      <?php } ?>
    </div>
  </div>
  <section class="sidebar__container">
    <?php get_sidebar(); ?>
  </section>
</div>

<?php get_footer(); ?>