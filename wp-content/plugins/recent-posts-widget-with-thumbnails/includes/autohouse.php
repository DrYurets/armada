<?php
		echo '<div class="container ' . $args['id'] . '">';
		echo '<div class="row">';
		$i = 0;
		$k = 0;
		while ( $r->have_posts() ) : $r->the_post();
	if (get_the_author() <> 'uri') {
			echo '<div class="col-md-3">';
			?>
            <div class="service-area">
                <div class="media">
                    <div class="media-body">
                        <h3>
                            <a href="<?php echo the_permalink(); ?>" name="<?php echo $post_title; ?>">
								<?php if ( $post_title = $this->get_the_trimmed_post_title( $post_title_length ) ) {
									echo $post_title;
								}
								?>
                            </a>
                        </h3>
                        <p><a href="<?php the_permalink(); ?>"<?php echo $this->customs['link_target']; ?>  name="<?php echo $post_title; ?>"><?php
			                        if ( $bools['show_thumb'] ) :
				                        $is_thumb = false;
				                        // if only first image
				                        if ( $bools['only_1st_img'] ) :
					                        // try to find and to display the first post image and to return success
					                        $is_thumb = $this->the_first_post_image();
				                        else :
					                        // look for featured image
					                        if ( has_post_thumbnail() ) :
						                        // if there is featured image then show it
						                        the_post_thumbnail( $this->customs['thumb_dimensions'] );
						                        $is_thumb = true;
					                        else :
						                        // if user wishes first image trial
						                        if ( $bools['try_1st_img'] ) :
							                        // try to find and to display the first post image and to return success
							                        $is_thumb = $this->the_first_post_image();
						                        endif; // try_1st_img
					                        endif; // has_post_thumbnail
				                        endif; // only_1st_img
				                        // if there is no image
				                        if ( ! $is_thumb ) :
					                        // if user allows default image then
					                        if ( $bools['use_default'] ) :
						                        echo $default_img;
					                        endif; // use_default
				                        endif; // not is_thumb
				                        // (else do nothing)
			                        endif; // show_thumb
		                        ?></a></p>
                    </div>
                </div>
            </div>
            </div>
			<?php
			$i ++;
			if ( $i == 4 ) {
				echo '<div class="clearfix"></div>';
				$i = 0;
			}
			$k ++;
	}
		endwhile;

?>
    </div>
  </div>
<!-- Меню автохауса -->
<div class="autohaus-bottom col-md-12">
    <div class="autohaus-menu">
        <?php wp_nav_menu( array( 'theme_location' => 'autohaus','menu_class' => 'nav navbar-nav navbar-right') ); ?>
    </div>
</div>
