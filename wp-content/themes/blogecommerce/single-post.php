<?php get_header(); ?>

<div class="container__both-main-sidebar">
  <div class="main__container">
  <article id="post-<?php the_ID(); ?>" <?php post_class('single__post'); ?>>
  <?php display_entry_header('post__item__content__title'); ?>
	<?php get_post_type() == 'post' ? display_entry_meta('post__item__content__meta') : null; ?>
	<?php display_entry_content(); ?>
	<?php (is_single() ? display_entry_tag('tag_class') : ''); ?>
</article>
  </div>
  <section class="sidebar__container">
    <?php get_sidebar(); ?>
  </section>
</div>

<?php get_footer(); ?>
