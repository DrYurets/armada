<?php
/**Theme Name	: Appointment
 * Theme Core Functions and Codes
*/
	/**Includes reqired resources here**/
	define('WEBRITI_TEMPLATE_DIR_URI', get_template_directory_uri());
    define('WEBRITI_TEMPLATE_DIR' , get_template_directory());
    define('WEBRITI_THEME_FUNCTIONS_PATH' , WEBRITI_TEMPLATE_DIR.'/functions');
	require( WEBRITI_THEME_FUNCTIONS_PATH .'/scripts/script.php');
    require( WEBRITI_THEME_FUNCTIONS_PATH .'/menu/default_menu_walker.php');
    require( WEBRITI_THEME_FUNCTIONS_PATH .'/menu/appoinment_nav_walker.php');
    require( WEBRITI_THEME_FUNCTIONS_PATH .'/widgets/sidebars.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH .'/widgets/appointment_info_widget.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/template-tag.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/breadcrumbs/breadcrumbs.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/font/font.php');
	//Customizer
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer_theme_style.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-callout.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-slider.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-copyright.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-header.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-news.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-service.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-pro.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-project.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-testimonial.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-client.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-footer-callout.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-template.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-emailcourse.php');

	// Appointment Info Page
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/appointment-info/welcome-screen.php');

	// Custom Category control
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/custom-controls/select/category-dropdown-custom-control.php');
	/* Theme Setup Function */
	add_action( 'after_setup_theme', 'appointment_setup' );

	function appointment_setup()
	{
	// Load text domain for translation-ready
    load_theme_textdomain( 'appointment', WEBRITI_THEME_FUNCTIONS_PATH . '/lang' );

	$header_args = array(
				 'flex-height' => true,
				 'height' => 200,
				 'flex-width' => true,
				 'width' => 1600,
				 'admin-head-callback' => 'mytheme_admin_header_style',
				 );

				 add_theme_support( 'custom-header', $header_args );
    add_theme_support( 'post-thumbnails' ); //supports featured image
	// Register primary menu
    register_nav_menu( 'primary', __('Primary Menu', 'appointment' ) );

	//Add Theme Support Title Tag
	add_theme_support( "title-tag" );

	// Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
	// Set the content_width with 900
    if ( ! isset( $content_width ) ) $content_width = 900;
	require_once('theme_setup_data.php');
	}
// set appointment page title
function appointment_title( $title, $sep )
{
    global $paged, $page;

	if ( is_feed() )
        return $title;
		// Add the site name.
		$title .= get_bloginfo( 'name' );
		// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";
		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( __( 'Page', 'appointment' ), max( $paged, $page ) );
		return $title;
}
add_filter( 'wp_title', 'appointment_title', 10,2 );

add_filter('get_avatar','appointment_add_gravatar_class');

function appointment_add_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='img-responsive img-circle", $class);
    return $class;
}
function appointment_add_to_author_profile( $contactmethods ) {
		$contactmethods['facebook_profile'] = __('Facebook URL','appointment');
		$contactmethods['twitter_profile'] = __('Twitter URL','appointment');
		$contactmethods['linkedin_profile'] = __('LinkedIn URL','appointment');
		$contactmethods['google_profile'] = __('GooglePlus URL','appointment');
		return $contactmethods;
		}
		add_filter( 'user_contactmethods', 'appointment_add_to_author_profile', 10, 1);


	    add_filter('get_the_excerpt','appointment_post_slider_excerpt');
	    function appointment_post_slider_excerpt($output){
		$output = strip_tags(preg_replace(" (\[.*?\])",'',$output));
		$output = strip_shortcodes($output);
		$original_len = strlen($output);
		$output = substr($output, 0, 155);
		$len=strlen($output);
		if($original_len>155) {
		$output = $output;
		return  '<div class="slide-text-bg2">' .'<span>'.$output.'</span>'.'</div>'.
	                       '<div class="slide-btn-area-sm"><a href="' . get_permalink() . '" class="slide-btn-sm">'
						   .__("Read More","appointment").'</a></div>';
		}
		else
		{ return '<div class="slide-text-bg2">' .'<span>'.$output.'</span>'.'</div>'; }
        }

	function get_home_blog_excerpt()
	{
		global $post;
		$excerpt = get_the_content();
		$excerpt = strip_tags(preg_replace(" (\[.*?\])",'',$excerpt));
		$excerpt = strip_shortcodes($excerpt);
		$original_len = strlen($excerpt);
		//$excerpt = substr($excerpt, 0, 145);
		//$len=strlen($excerpt);

		if($original_len>275) {
		//$excerpt = $excerpt;
		return $excerpt . '<div class="blog-btn-area-sm"><a href="' . get_permalink() . '" class="readmore_link">'.__("Read More","appointment").'</a></div>';
		}
		else
		{ return $excerpt; }

		//return $excerpt;
	}

	function appointment_import_files() {
  return array(
    array(
      'import_file_name'           => 'Demo Import 1',
      'categories'                 => array( 'Category 1', 'Category 2' ),
      'import_file_url'            => 'https://webriti.com/themes/dummydata/appointment/lite/appointment-content.xml',
      'import_widget_file_url'     => 'https://webriti.com/themes/dummydata/appointment/lite/appointment-widget.json',
      'import_customizer_file_url' => 'https://webriti.com/themes/dummydata/appointment/lite/appointment-customize.dat',
      'import_notice'              => sprintf(__( 'Click the large blue button to start the dummy data import process.</br></br>Please be patient while WordPress imports all the content.</br></br>
			<h3>Recommended Plugins</h3> Appointment theme supports the following plugins:</br> </br><li> <a href="https://wordpress.org/plugins/contact-form-7/"> Contact form 7</a> </l1> </br></br> <li> <a href="https://wordpress.org/plugins/bootstrap-3-shortcodes/"> Bootstrap Shortcodes</a> </l1>','appointment' )),
			),



	);
}
add_filter( 'pt-ocdi/import_files', 'appointment_import_files' );


function appointment_after_import_setup() {

	// Menus to assign after import.
	$main_menu   = get_term_by( 'name', 'Menu 1', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
		'primary'   => $main_menu->term_id,
	));

	// Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );


}
add_action( 'pt-ocdi/after_import', 'appointment_after_import_setup' );
// RED
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
?>
