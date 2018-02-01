<div class="col-md-4">
    <div class="blog-sm-area">
        <div class="media">
            <div class="media-body"><?php
					if($news_setting['home_meta_section_settings'] == '' ) { ?>
                        <div class="blog-post-sm">
                            <div class="thumbnail">
                                <?php echo thumbnail_by_yurets($post, 'mainpage_thumbnail'); ?>
                            </div>
                            <span  class="mainpage_title_header">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            </span>
                            <div class="excerpt">
                                <p class="text-justify"><?php echo get_home_blog_excerpt_yurets(); ?></p>
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