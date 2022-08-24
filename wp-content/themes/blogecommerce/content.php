<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-thumbnail">
  <?php display_thumbnail( 'thumbnail', false,'post__item__image' ); ?>
  </div>
  <header class="entry-header">
<?php display_entry_header('post__item__content__title'); ?>
<?php display_entry_meta('post__item__content__meta'); ?>
  </header>
  <div class="entry-content">
  <?php display_entry_content(); ?>
  <?php ( is_single() ? display_entry_tag('tag_class') :'' ); ?>
  </div>
</article>