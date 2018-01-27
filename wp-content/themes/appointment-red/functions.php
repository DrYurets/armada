<?php
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



?>