<?php
if (basename(get_permalink()) == 'checkout' || basename(get_permalink()) == 'cart' || basename(get_permalink()) == 'my-account' || str_contains(str_replace(home_url(),'',get_permalink()),'/product/')) {
	the_content();
}else{
	?>
	<article id="post-<?php the_ID(); ?>" <?php if (!is_single() && 'post'==get_post_type()) {
																				post_class('post__item');
																			}  ?>>
	<?php
	$images = &get_children(array(
		'post_parent' => $post->ID,
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
	));
	
	if('post'==get_post_type()){
	?>
      <?php display_thumbnail('thumbnail', true, 'post__item__image--latest'); ?>
      <div class="post__item__content">
        <?php display_entry_header('post__item__content__title'); ?>
        <div class="post__item__content__excerpt">
          <?php display_entry_content(); ?>
        </div>
        <?php display_entry_meta('post__item__content__meta'); ?>
			</div>
			</article>
		<?php }else{ ?>
	<?php display_entry_header('post__item__content__title'); ?>
	<?php get_post_type() == 'post' ? display_entry_meta('post__item__content__meta') : null; ?>
	<?php display_entry_content(); ?>
	<?php (is_single() ? display_entry_tag('tag_class') : ''); ?>
</article>
	<?php }
}; ?>