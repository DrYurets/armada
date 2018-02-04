<?php

// ARMADA
	add_action( 'wp_enqueue_scripts', 'appointment_red_theme_css',999);
function appointment_red_theme_css() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'theme-menu', get_template_directory_uri() . '/css/theme-menu.css' );
	wp_enqueue_style( 'default-css', get_stylesheet_directory_uri()."/css/default.css" );
	wp_enqueue_style( 'element-style', get_template_directory_uri() . '/css/element.css' );
	wp_enqueue_style( 'media-responsive' ,get_template_directory_uri() . '/css/media-responsive.css');
	wp_dequeue_style('appointment-default',get_template_directory_uri() .'/css/default.css');
}

/*
	 * Let WordPress manage the document title.
	 */
	function appointment_red_setup() {
   add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'appointment_red_setup' );

// Yurets mod

	function true_after_theme_setup() {
		add_image_size( 'mainpage_thumbnail', 350, 262, true );
	}

	add_action( 'after_setup_theme', 'true_after_theme_setup', 11 );

	function get_first_content_image_id () {
		// set variables
		global $wpdb;
		$post = get_post();
		if ( $post and isset( $post->post_content ) ) {
			// look for images in HTML code
			preg_match_all( '/<img[^>]+>/i', $post->post_content, $all_img_tags );
			if ( $all_img_tags ) {
				foreach ( $all_img_tags[ 0 ] as $img_tag ) {
					// find class attribute and catch its value
					preg_match( '/<img.*?class\s*=\s*[\'"]([^\'"]+)[\'"][^>]*>/i', $img_tag, $img_class );
					if ( $img_class ) {
						// Look for the WP image id
						preg_match( '/wp-image-([\d]+)/i', $img_class[ 1 ], $found_id );
						// if first image id found: check whether is image
						if ( $found_id ) {
							$img_id = absint( $found_id[ 1 ] );
							// if is image: return its id
							if ( wp_attachment_is_image( $img_id ) ) {
								return $img_id;
							}
						} // if(found_id)
					} // if(img_class)

					// else: try to catch image id by its url as stored in the database
					// find src attribute and catch its value
					preg_match( '/<img.*?src\s*=\s*[\'"]([^\'"]+)[\'"][^>]*>/i', $img_tag, $img_src );
					if ( $img_src ) {
						// delete optional query string in img src
						$url = preg_replace( '/([^?]+).*/', '\1', $img_src[ 1 ] );
						// delete image dimensions data in img file name, just take base name and extension
						$guid = preg_replace( '/(.+)-\d+x\d+\.(\w+)/', '\1.\2', $url );
						// look up its id in the db
						$found_id = $wpdb->get_var( $wpdb->prepare( "SELECT `ID` FROM $wpdb->posts WHERE `guid` = '%s'", $guid ) );
						// if id is available: return it
						if ( $found_id ) {
							return absint( $found_id );
						} // if(found_id)
					} // if(img_src)
				} // foreach(img_tag)
			} // if(all_img_tags)
		} // if (post content)

		// if nothing found: return 0
		return 0;
	}

	function start_armtek_sidebar() {
		$args = array(
			'id'            => 'sidebar-armtek',
			'name'          => __( 'Armtek Sidebar', 'striped' ),
			'description'   => __( 'Новости компании Армтек', 'striped' ),
			'class'         => 'striped-widget armtek',
			'before_title'  => '<header><h2 class="widgettitle">',
			'after_title'   => '</h2></header>',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		);
		register_sidebar( $args );
	}
	function start_coffee_sidebar() {
		$args = array(
			'id'            => 'sidebar-coffee',
			'name'          => __( 'COFFEE', 'striped' ),
			'description'   => __( 'sidebar-coffee', 'striped' ),
			'class'         => 'striped-widget coffee',
			'before_title'  => '<header><h2 class="widgettitle">',
			'after_title'   => '</h2></header>',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		);
		register_sidebar( $args );
	}
	function start_auto_sidebar() {
		$args = array(
			'id'            => 'sidebar-auto',
			'name'          => __( 'Автосалон', 'striped' ),
			'description'   => __( 'Автосалон Армада', 'striped' ),
			'class'         => 'striped-widget autohouse',
			'before_title'  => '<header><h2 class="widgettitle">',
			'after_title'   => '</h2></header>',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		);
		register_sidebar( $args );
	}
	function start_footer_sidebar() {
		$args = array(
			'id'            => 'sidebar-footer',
			'name'          => __( 'Footer', 'striped' ),
			'description'   => __( 'Сайдбар в футере', 'striped' ),
			'class'         => 'striped-widget footer',
			'before_title'  => '<header><h2 class="widgettitle">',
			'after_title'   => '</h2></header>',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		);
		register_sidebar( $args );
	}
// Хук для функции 'widgets_init'
	add_action( 'widgets_init', 'start_armtek_sidebar' );
	add_action( 'widgets_init', 'start_coffee_sidebar' );
	add_action( 'widgets_init', 'start_footer_sidebar' );
	add_action( 'widgets_init', 'start_auto_sidebar' );


	function register_my_menus() {
		register_nav_menus(
			array(
				'top' => __( 'Топ' ),
				'autohaus' => __( 'Автохаус' ),
				'footer_menu' => __( 'Футер' )
			)
		);
	}
	add_action( 'init', 'register_my_menus' );

	if ( ! function_exists( 'appointment_aside_meta_content' ) ) :

		function appointment_aside_meta_content()
		{
			$appointment_options=theme_setup_data();
			$news_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
			if($news_setting['home_meta_section_settings'] == '' ) { ?>
				<aside class="blog-post-date-area">
					<div class="date"><?php echo get_the_date('j'); ?> <div class="month-year"><?php echo get_the_date('m'); ?>.<?php echo get_the_date('Y'); ?></div></div>
					<!--<div class="comment"><a href="<?php // the_permalink(); ?>"><i class="fa fa-comments"></i><?php // comments_number( '0', '1', '%' ); ?></a></div> -->
				</aside>
			<?php }  } endif;
	if ( ! function_exists( 'appointment_post_meta_content' ) ) :
		function appointment_post_meta_content()
		{
			$appointment_options=theme_setup_data();
			$news_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
			if($news_setting['home_meta_section_settings'] == 0 ) { ?>
				<div class="blog-post-lg">
					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php echo get_avatar( get_the_author_meta('user_email'), $size = '40'); ?></a>
					<?php _e('By','appointment');?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php echo get_the_author();?></a>
					<?php 	$tag_list = get_the_tag_list();
						if(!empty($tag_list)) { ?>
							<div class="blog-tags-lg"><i class="fa fa-tags"></i><?php the_tags('', ', ', ''); ?></div>
						<?php } ?>
				</div>
			<?php }
		} endif;

	if(!function_exists( 'appointment_post_thumbnail')) :
		function appointment_post_thumbnail($preset,$class){
			if(has_post_thumbnail()){
				$defalt_arg =array('class' => $class); ?>
				<div class="blog-lg-box">
					<a class ="img-responsive" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
						<?php the_post_thumbnail($preset, $defalt_arg); ?>
				</div>
			<?php } }endif;

	if(!function_exists( 'appointment_post_layout_class' )) :
		function appointment_post_layout_class(){
			if(is_active_sidebar('sidebar-primary'))
			{ echo 'col-md-8'; }
			else
			{ echo 'col-md-12'; }
		} endif;

	function thumbnail_by_yurets($post, $size='mainpage_thumbnail') { // Yurets mod
		if ( has_post_thumbnail( $post->ID ) ) { // указано изображение записи
			$img = '<a href="' . get_permalink( $post->ID ) . '" title="' . esc_attr( $post->post_title ) . '">'.get_the_post_thumbnail( $post->ID, $size ).'</a>';
		}
		else if (get_first_content_image_id($post) > 0) { // есть первая картинка вместо изображения записи
			$img = get_first_content_image_id($post);
			$url = wp_get_attachment_image_url($img, $size, false);
			$img = '<a href="' . get_permalink( $post->ID ) . '" title="' . esc_attr( $post->post_title ) . '"><img src="'.$url.'" /></a>';
		}
		else { // вообще нет изображений - показываем заглушку с логотипом Армады
			$url = wp_get_attachment_image_url(256, $size, false);
			$img = '<a href="' . get_permalink( $post->ID ) . '" title="' . esc_attr( $post->post_title ) . '"><img src="'.$url.'" /></a>';;
		}
		return $img;
	}
	function get_home_blog_excerpt_yurets()
	{
		global $post;
		$excerpt = get_the_content();
		$excerpt = strip_tags(preg_replace(" (\[.*?\])",'',$excerpt));
		$excerpt = strip_shortcodes($excerpt);
		$original_len = strlen($excerpt);

		if($original_len>275) {
			return $excerpt . '<div class="blog-btn-area-sm"><a href="' . get_permalink() . '" class="readmore_link">'.__("Read More","appointment").'</a></div>';
		}
		else
		{ return $excerpt; }

		//return $excerpt;
	}

	function qt_custom_breadcrumbs_yurets() {

		$showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
		$delimiter = ''; // delimiter between crumbs
		$home = 'Главная'; // text for the 'Home' link
		$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
		$before = '<li class="active">'; // tag before the current crumb
		$after = '</li>'; // tag after the current crumb

		global $post;
		$homeLink = home_url();

		if (is_home() || is_front_page()) {

			if ($showOnHome == 1) echo '<li><a href="' . $homeLink . '">' . $home . '</a></li>';

		} else {

			echo '<li><a href="' . $homeLink . '">' . $home . '</a> ' . '&nbsp &#47; &nbsp';

			if ( is_category() ) {
				$thisCat = get_category(get_query_var('cat'), false);
				if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' / ' . ' ');
				echo $before . '&nbsp; ' . single_cat_title('', false) . $after;

			} elseif ( is_search() ) {
				echo $before . 'Search results for "' . get_search_query() . '"' . $after;

			} elseif ( is_day() ) {
				echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . '&nbsp &#47; &nbsp';
				echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . '&nbsp &#47; &nbsp';
				echo $before . get_the_time('d') . $after;

			} elseif ( is_month() ) {
				echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . '&nbsp &#47; &nbsp';
				echo $before . get_the_time('F') . $after;

			} elseif ( is_year() ) {
				echo $before . get_the_time('Y') . $after;

			} elseif ( is_single() && !is_attachment() ) {
				if ( get_post_type() != 'post' ) {
					$post_type = get_post_type_object(get_post_type());
					$slug = $post_type->rewrite;
					echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
					if ($showCurrent == 1) echo ' ' . $delimiter . '&nbsp &#47; &nbsp' . $before . get_the_title() . $after;
				} else {
					$cat = get_the_category(); $cat = $cat[0];
					$cats = get_category_parents($cat, TRUE, ' ' . $delimiter . '&nbsp &#47; &nbsp');
					if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
					echo $cats;
					if ($showCurrent == 1) echo $before . get_the_title() . $after;
				}

			} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
				$post_type = get_post_type_object(get_post_type());
				echo $before . $post_type->labels->singular_name . $after;

			} elseif ( is_attachment() ) {
				$parent = get_post($post->post_parent);
				$cat = get_the_category($parent->ID);
				if(!empty($cat)){
					$cat = $cat[0];
					echo get_category_parents($cat, TRUE, ' ' . $delimiter . '&nbsp &#47; &nbsp');
				}
				echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
				if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

			} elseif ( is_page() && !$post->post_parent ) {
				if ($showCurrent == 1) echo $before . get_the_title() . $after;

			} elseif ( is_page() && $post->post_parent ) {
				$parent_id  = $post->post_parent;
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>' . '&nbsp &#47; &nbsp';
					$parent_id  = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo $breadcrumbs[$i];
					if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter;
				}
				if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

			} elseif ( is_tag() ) {
				echo $before . 'Публикации с тегом "' . single_tag_title('', false) . '"' . $after;

			} elseif ( is_author() ) {
				global $author;
				$userdata = get_userdata($author);
				echo $before . 'Публикации ' . $userdata->display_name . $after;

			} elseif ( is_404() ) {
				echo $before . 'Ошибка 404' . $after;
			}

			if ( get_query_var('paged') ) {
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '';
				echo ' ( ' . __('Page','appointment') . '' . get_query_var('paged'). ' )';
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '';
			}

			echo '</li>';

		}
	}

?>
