<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-thumbnail">
  <?php display_thumbnail( 'thumbnail' ); ?>
  </div>
  <header class="entry-header">
<?php display_entry_header(); ?>
<?php display_entry_meta(); ?>
  </header>
  <div class="entry-content">
  <?php display_entry_content(); ?>
  <?php ( is_single() ? display_entry_tag() :'' ); ?>
  </div>
</article>