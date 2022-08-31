<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-thumbnail">
  <?php
	$images =& get_children( array (
		'post_parent' => $post->ID,
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
	));
	if ( empty($images) || is_single() ) {
		null;
	} else {
		foreach ( $images as $attachment_id => $attachment ) {
			echo wp_get_attachment_image( $attachment_id, 'thumbnail' );
		}
	}
?>
  </div>
  <header class="entry-header">
<?php display_entry_header('post__item__content__title'); ?>
<?php get_post_type() == 'post' ? display_entry_meta('post__item__content__meta') : null ; ?>
  </header>
  <div class="entry-content">
  <?php display_entry_content(); ?>
  <?php ( is_single() ? display_entry_tag('tag_class') :'' ); ?>
  </div>
</article>

