<footer>
        <div class="footer__container">
            <div class="footer--left">
                <?php display_logo('footer--left__image') ?>
                <p class="footer--left__desc">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas, debitis earum ea corporis corrupti optio magni asperiores dicta similique fugit.</p>
            </div>
            <div class="footer--middle">
                <div class="footer--middle__posts">
                    <?php
                    $type = 'post';
                    $args = array(
                        'post_type' => $type,
                        'post_status' => 'publish',
                        'posts_per_page' => 3,

                    );
                    $my_query = null;
                    $my_query = new WP_Query($args);
                    if ($my_query->have_posts()) {
                        while ($my_query->have_posts()) : $my_query->the_post(); ?>
                            <?php display_entry_header('footer--middle__posts__item'); ?>
                    <?php
                        endwhile;
                    }
                    wp_reset_postdata();
                    ?>
                </div>
                <div class="footer--middle__category">
                    <?php
                    $categories = get_categories('orderby=name&show_count=1');
                    if ($categories) {
                        foreach ($categories as $category) {
                            echo '<a  class="footer--middle__category__item" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="footer--right">
                <a href="#reference" class="footer--right__item">
                    <ion-icon name="logo-facebook"></ion-icon>
                    <span>13</span>
                </a>
                <a href="#reference" class="footer--right__item">
                    <ion-icon name="logo-twitter"></ion-icon>
                    <span>69K</span>
                </a>
                <a href="#reference" class="footer--right__item">
                    <ion-icon name="logo-instagram"></ion-icon>
                    <span>44</span>
                </a>
                <a href="#reference" class="footer--right__item">
                    <ion-icon name="logo-pinterest"></ion-icon>
                    <span>12K</span>
                </a>

            </div>
        </div>
        <p class="footer__author">
            Design by <a href="#author" target="blank">Dennis © <?php echo date('Y'); ?>
            </a>
        </p>
</footer>
</div> <!-- end container -->
<?php wp_footer(); ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/assets/js/general.js"></script>
</body>

</html>