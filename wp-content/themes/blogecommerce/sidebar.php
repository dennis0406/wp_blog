<aside class=" sidebar__list">
  <!-- categories -->
  <h2 class="sidebar__title">Categories</h2>
  <div class="sidebar__taxonomy">
    <?php
    $categories = get_categories('orderby=name&show_count=1');
    if($categories){
      foreach ($categories as $category) {
        echo '<a  class="sidebar__taxonomy__item" href="' . get_category_link($category->term_id) . '">' . '<span class="sidebar__taxonomy__item--name">'.$category->name.'</span>' . '<span class="sidebar__taxonomy__item--count">'. $category->count.'</span>'. '</a>';
      }
    }
    ?>
  </div>

  <!-- tags -->
  <h2 class="sidebar__title">Tags</h2>
  <div class="sidebar__taxonomy">    
<?php
    $tags = get_tags('');
    
    if($tags){
      foreach ($tags as $category) {
        echo '<a  class="sidebar__taxonomy__item" href="' . get_category_link($category->term_id) . '">' . '<span class="sidebar__taxonomy__item--name">'.$category->name.'</span>' . '<span class="sidebar__taxonomy__item--count">'. $category->count.'</span>'. '</a>';
      }
    }?>
</div>
</aside>