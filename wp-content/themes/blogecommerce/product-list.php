<?php
$type = 'product';
$args = array(
  'post_type' => $type,
  'post_status' => 'publish',
  
);
$my_query = null;
$my_query = new WP_Query($args);
if ($my_query->have_posts()) {
  while ($my_query->have_posts()) : $my_query->the_post(); 
  $my_price = get_post_meta( get_the_ID(), 'price', true);
  $my_unit = get_post_meta( get_the_ID(), 'unit', true);
		 
			if( ! empty( $my_price ) ) {
				echo '<h3>Price: ' . $my_price . '<h3>';
				echo '<p>Unit: ' . $my_unit . '</p>';
			}
      ?>
  
    <article id="post-<?php the_ID(); ?>" <?php post_class('post__item'); ?>>
      <?php display_thumbnail('thumbnail', false); ?>
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