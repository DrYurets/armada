<?php
	$appointment_options=theme_setup_data();
	$news_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
	if ( has_post_thumbnail( $post->ID ) ) { // есть изображение записи
		$img = '<a href="' . get_permalink( $post->ID ) . '" title="' . esc_attr( $post->post_title ) . '">'.get_the_post_thumbnail( $post->ID, 'mainpage_thumbnail' ).'</a>';
	}
	else if (get_first_content_image_id($post) > 0) { // первое изображение из текста
		$img = get_first_content_image_id($post);
		$url = wp_get_attachment_image_url($img, 'mainpage_thumbnail', false);
		$img = '<a href="' . get_permalink( $post->ID ) . '" title="' . esc_attr( $post->post_title ) . '"><img src="'.$url.'" /></a>';
	}
	else { // вообще нет ни одной фотки - заглушка
		$upload_dir = wp_upload_dir();
		$url = $upload_dir['baseurl'].'/2017/07/no_photo.jpg';
		$img = '<a href="' . get_permalink( $post->ID ) . '" title="' . esc_attr( $post->post_title ) . '"><img src="'.$url.'" /></a>';;
	}
?>
<div class="col-md-4">
    <div class="blog-sm-area">
        <div class="media">
            <div class="media-body"><?php
					if($news_setting['home_meta_section_settings'] == '' ) { ?>
                        <div class="blog-post-sm">
                            <?php echo $img; ?>
                            <span  class="mainpage_title_header">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            </span>

                            <div class="excerpt">
                                <p class="text-justify"><?php echo get_home_blog_excerpt(); ?></p>
                            </div>
                        </div>
					<?php } ?>
            </div>
        </div>
    </div>
</div>
<?php
	if($i==3)
	{
		echo '<div class="clearfix"></div>';
		$i=0;
	}$i++;
	wp_reset_postdata();
?>