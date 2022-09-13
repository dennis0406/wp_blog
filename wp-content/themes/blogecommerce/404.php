<?php get_header(); ?>

<div class="container__both-main-sidebar">
  <section class="page__404">
    <img src="https://cdn.pixabay.com/photo/2016/03/12/14/19/error-404-1252056_960_720.png" alt="" class="page__404__content--image">
    <div class="page__404__content--text">
      <p class="page__404__content__message">Oops! Page you are looking for doesn't exist. Please use search for help!</p>
      <form action="<?php echo home_url(); ?>" method="get" class="page__404__content__search">
        <input type="text" name="s" value="<?php echo get_search_query(); ?>" placeholder="Search..." class="page__404__content__search--input">
        <button type="submit" class="page__404__content__search--submit">
          <ion-icon name="search-outline"></ion-icon>
        </button>
      </form>
      <p class="page__404__content__go-home"><a class="btn animate_underline" href="<?php echo home_url(); ?>">Go to home page</a></p>
    </div>
  </section>
</div>

<?php get_footer(); ?>