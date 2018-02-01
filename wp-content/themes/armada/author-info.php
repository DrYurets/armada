<div class="media">
	<div class="media-body">
		<h2> <?php the_author(); ?> </h2>
		<div class="pull-left">
			<?php echo get_avatar( get_the_author_meta( 'ID') , 200); ?>
		</div>
		<p><?php the_author_meta( 'description' ); ?> </p>
		<ul class="blog-author-social">
			<?php
				$google_profile = get_the_author_meta( 'google_profile' );
				if ( $google_profile && $google_profile != '' ) {
					echo '<li class="googleplus"><a href="' . esc_url($google_profile) . '" rel="author"><i class="fa fa-google-plus"></i></a></li>';
				}

				$twitter_profile = get_the_author_meta( 'twitter_profile' );
				if ( $twitter_profile && $twitter_profile != '' ) {
					echo '<li class="twitter"><a href="' . esc_url($twitter_profile) . '"><i class="fa fa-twitter"></i></a></li>';
				}

				$facebook_profile = get_the_author_meta( 'facebook_profile' );
				if ( $facebook_profile && $facebook_profile != '' ) {
					echo '<li class="facebook"><a href="' . esc_url($facebook_profile) . '"><i class="fa fa-facebook"></i></a></li>';
				}

				$linkedin_profile = get_the_author_meta( 'linkedin_profile' );
				if ( $linkedin_profile && $linkedin_profile != '' ) {
					echo '<li class="linkedin"><a href="' . esc_url($linkedin_profile) . '"><i class="fa fa-linkedin"></i></a></li>';
				}
				$skype_profile = get_the_author_meta( 'skype_profile' );
				if ( $skype_profile && $skype_profile != '' ) {
					echo '<li class="skype"><a href="' . esc_url($skype_profile) . '"><i class="fa fa-skype"></i></a></li>';
				}
			?>
		</ul>
	</div>
</div>