<?php

function create_custom_post_type() {
	$label = array(
		'name' => 'products',
		'singular_name'=>'product'
	);

	$args = array(
		'labels' => $label,
		'description' => 'Post type use to post product',
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'author',
			'thumbnail',
			'comments',
			'trackbacks',
			'revisions',
			'custom-fields',
		),
		'taxonomies' => array('category', 'post_tag'),
		'hierarchical' =>false, //khong cho phep phan cap
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
		'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
		'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
		'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
		'menu_icon' => 'wp-content/themes/twentytwentytwo/assets/images/icon-product.png', //Đường dẫn tới icon sẽ hiển thị
		'can_export' => true, //Có thể export nội dung bằng Tools -> Export
		'has_archive' => true, //Cho phép lưu trữ (month, date, year)
		'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
		'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
		'capability_type' => 'post' //
	);

	register_post_type('product', $args);
}

add_action('init', 'create_custom_post_type');

// function to set post as default
add_filter('pre_get_posts', 'get_custom_post_type');
function get_custom_post_type($query) {
  if (is_home() && $query->is_main_query ())
    $query->set ('post_type', array ('post','product'));
    return $query;
}

  if ( ! function_exists( 'base_setup_theme' ) ) {
  	function base_setup_theme() {
  		add_theme_support( 'automatic-feed-links' );
  		add_theme_support( 'post-thumbnails' );
  		add_theme_support( 'title-tag' );
  		add_theme_support( 'post-formats',
  			array(
  				'video',
  				'image',
  				'audio',
  				'gallery'
  			)
  		 );
  		// $default_background = array(
  		// 	'default-color' => '#e8e8e8',
  		// );
  		// add_theme_support( 'custom-background', $default_background );
      //          /*
      //            * Tạo menu cho theme
      //            */
      //            register_nav_menu ( 'primary-menu', __('Primary Menu', 'thachpham') );
      //          /*
      //            * Tạo sidebar cho theme
      //            */
      //            $sidebar = array(
      //               'name' => __('Main Sidebar', 'thachpham'),
      //               'id' => 'main-sidebar',
      //               'description' => 'Main sidebar for Thachpham theme',
      //               'class' => 'main-sidebar',
      //               'before_title' => '<h3 class="widgettitle">',
      //               'after_sidebar' => '</h3>'
      //            );
      //            register_sidebar( $sidebar );
  	}
  	add_action ( 'init', 'base_setup_theme' );
 }

?>