<?php
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
    if ( has_post_thumbnail( $post->ID ) ) {
		$img = '<a href="' . get_permalink( $post->ID ) . '" title="' . esc_attr( $post->post_title ) . '">'.get_the_post_thumbnail( $post->ID, $size ).'</a>';
	}
	else if (get_first_content_image_id($post) > 0) {
		$img = get_first_content_image_id($post);
		$url = wp_get_attachment_image_url($img, $size, false);
		$img = '<a href="' . get_permalink( $post->ID ) . '" title="' . esc_attr( $post->post_title ) . '"><img src="'.$url.'" /></a>';
	}
	else {
		$url = wp_get_attachment_image_url(256, $size, false);
		$img = '<a href="' . get_permalink( $post->ID ) . '" title="' . esc_attr( $post->post_title ) . '"><img src="'.$url.'" /></a>';;
	}
	return $img;
}
?>