<?php

function create_custom_post_type()
{
	$label = array(
		'name' => 'Products',
		'singular_name' => 'Product'
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
		'hierarchical' => false, //khong cho phep phan cap
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => true,
		'menu_position' => 5,
		// 'menu_icon' => 'http://site.com/wp-content/themes/theme_name/i/icon_16x16.png', 
		'can_export' => true,
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'post'
	);

	register_post_type('product', $args);
}

add_action('init', 'create_custom_post_type');

// function to set post as default
add_filter('pre_get_posts', 'get_custom_post_type');
function get_custom_post_type($query)
{
	if (is_home() && $query->is_main_query())
		$query->set('post_type', array('post', 'product'));
	return $query;
}

if (!function_exists('base_setup_theme')) {
	function base_setup_theme()
	{
		add_theme_support('automatic-feed-links');
		add_theme_support('post-thumbnails');
		add_theme_support('title-tag');
		add_theme_support(
			'post-formats',
			array(
				'video',
				'image',
				'audio',
				'gallery'
			)
		);
	
		add_theme_support('custom-background');
		register_nav_menu('primary-menu', __('Primary Menu', 'dennis'));
		// sidebar
		$sidebar = array(
			'name' => __('Main Sidebar', 'dennis'),
			'id' => 'main-sidebar',
			'class' => 'main-sidebar',
			'before_title' => '<h3 class="widgettitle">',
			'after_sidebar' => '</h3>'
		);
		register_sidebar($sidebar);
	}
	add_action('init', 'base_setup_theme');
}

// Function to display logo
if (!function_exists('display_logo')) {
	function display_logo()
	{ ?>
		<div class="header__logo">
			<div class="header__logo--site-name">
				<?php printf(
					'<h1><a href="%1$s" title="%2$s">%3$s</a></h1>',
					get_bloginfo('url'),
					get_bloginfo('description'),
					get_bloginfo('sitename')
				); ?>
			</div>

		</div>
	<?php }
}


// Function to display menu
if (!function_exists('display_menu')) {
	function display_menu($slug, $container_class)
	{
		$menu = array(
			'theme_location' => $slug,
			'container' => 'nav',
			'container_class' => $container_class,
			'menu_class' => 'header__menu'
		);
		wp_nav_menu($menu);
	}
}

// Function for pagination
if (!function_exists('display_pagination')) {
	function display_pagination()
	{
		// Not show if the number of page less than two
		if ($GLOBALS['wp_query']->max_num_pages < 2) {
			return '';
		}
	?>

		<nav class="pagination" role="navigation">
			<?php if (get_next_post_link()) : ?>
				<div class="prev"><?php previous_posts_link(__('Newer Posts', 'dennis')); ?></div>
			<?php endif; ?>
			<?php if (get_previous_post_link()) : ?>
				<div class="next"><?php next_posts_link(__('Older Posts', 'dennis')); ?></div>
			<?php endif; ?>
		</nav><?php
				}
			}

			// Function display thumbnail
			if (!function_exists('display_thumbnail')) {
				function display_thumbnail($size, $latest, $class)
				{
					if($latest){
						if (!post_password_required() || has_post_format('image')) : ?>
							<?php
										if (has_post_thumbnail() ) {
											$attr = array('class' => $class);
											the_post_thumbnail($size, $attr);
										} else {
							?> <img class="<?php echo $class ?>" src="<?php bloginfo('template_directory'); ?>/assets/images/default-featured-image.jpg" alt=""> <?php
				}?><?php
									endif;
					}else{
						if (!is_single()  && !post_password_required() || has_post_format('image')) : ?>
							<?php
										if (has_post_thumbnail() ) {
											$attr = array('class' => $class);
											the_post_thumbnail($size, $attr);
										}?><?php
									endif;
					}
				}
			}

			//Function display entry header
			if (!function_exists('display_entry_header')) {
				function display_entry_header($class)
				{
					if (is_single()) : ?>
				<h1 class="<?php echo $class ?>">
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
						<?php the_title(); ?>
					</a>
				</h1>
			<?php else : ?>
				<h3 class="<?php echo $class ?>">
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
						<?php the_title(); ?>
					</a>
				</h3><?php
						endif;
					}
				}

				// Function display information of the post
				if (!function_exists('display_entry_meta')) {
					function display_entry_meta($class)
					{
						if (!is_page()) :
							echo '<div class="'.$class.'">';
							printf(
								__('<span class="'.$class.'--author">by <b>%1$s</b></span>', 'dennis'),
								get_the_author()
							);

							printf(
								__('<span class="'.$class.'--published"> %1$s</span>', 'dennis'),
								get_the_date()
							);
							echo '</div>';
						endif;
					}
				}

				// Function to display quick content of the post
				if (!function_exists('display_entry_content')) {
					function display_entry_content()
					{
						if (!is_single()) :
							the_excerpt();
						else :
							the_content();

							// Paginate in post type
							$link_pages = array(
								'before' => __('<p>Page:', 'dennis'),
								'after' => '</p>',
								'nextpagelink'     => __('Next page', 'dennis'),
								'previouspagelink' => __('Previous page', 'dennis')
							);
							wp_link_pages($link_pages);
						endif;
					}
				}

				// Function display tag if in the single page
				if (!function_exists('display_entry_tag')) {
					function display_entry_tag($class)
					{
						if (has_tag()) :
							echo '<div class="'.$class.'">';
							printf(__('Tagged in %1$s', 'dennis'), get_the_tag_list('', ', '));
							echo '</div>';
						endif;
					}
				}

				
							?>