<?php
	$appointment_options=theme_setup_data();
	$news_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );





	if ( has_post_thumbnail( $post->ID ) ) { // есть изображение записи
		$img = '<a href="' . get_permalink( $post->ID ) . '" title="' . esc_attr( $post->post_title ) . '">'.get_the_post_thumbnail( $post->ID, 'mainpage_thumbnail' ).'</a>';
		$url = '';
	}
	else {
	    $img = get_first_content_image_id($post);
		$url = wp_get_attachment_image_url($img, 'mainpage_thumbnail', false);

		$img = '<a href="' . get_permalink( $post->ID ) . '" title="' . esc_attr( $post->post_title ) . '"><img src="'.$url.'" /></a>';
    }
?>





<div class="col-md-4">
    <div class="blog-sm-area">
        <div class="media">
            <div class="media-body"><?php

					if($news_setting['home_meta_section_settings'] == '' ) { ?>
                        <div class="blog-post-sm">
							<?php _e('By','appointment');?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php echo get_the_author();?></a>
                            <a href="<?php echo get_month_link(get_post_time('Y'),get_post_time('m')); ?>">
								<?php echo get_the_date('j.m.y'); ?></a>
							<?php 	$tag_list = get_the_tag_list();
								if(!empty($tag_list)) ?>
                            <div class="blog-tags-sm"><?php the_tags('<i class="fas fa-hashtag"></i>', ', ', ''); ?></div>
                        </div>
					<?php } ?>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p><?php
		                echo $img;
		                echo '<br />';

                        echo get_home_blog_excerpt(); ?></p>
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