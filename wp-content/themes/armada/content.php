<div class="blog-sm-area">
	<div class="media">						
	<?php appointment_aside_meta_content(); ?>
		<div class="media-body">
            <div class="mainpage-thumbnail">
			    <?php  echo thumbnail_by_yurets($post, 'medium'); ?>
            </div>
            <div  class="mainpage_title_header">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            </div>
            <div class="excerpt">
                <p class="text-justify"><?php echo get_home_blog_excerpt_yurets(); ?></p>
            </div>
			<?php
				wp_link_pages( );
			?>
           <?php appointment_post_meta_content(); ?>
		</div>
	 </div>
</div>


