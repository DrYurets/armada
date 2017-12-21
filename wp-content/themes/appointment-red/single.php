<?php
get_header();
get_template_part('index','banner'); ?>
<div class="page-builder">
	<div class="container">
		<div class="row">
            <div class="col-md-9">
			    <div class="<?php appointment_post_layout_class(); ?>" >
                                    <?php
                                if(have_posts())
                                {
                                while(have_posts()) {
                                the_post();
                                get_template_part('content_single',''); ?>
                                            <div class="comment-title"></div>
                                            <?php } comments_template('',true);  } ?>
				</div>
            </div>
            <div class="col-md-3">
                <div class="blog-author">
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
                </div>
            </div>

            <div class="col-md-11 col-md-offset-1 coffee">
                    <div id="primary-coffee" class="primary-sidebar widget-area coffee" role="complementary">
	                    <?php
		                    $query_news = new WP_Query('post__not_in[]='.$post->ID.'&author='.get_the_author_meta( 'ID' ).'&post_type=post&showposts=5');
                            $i = 0;
		                    while($query_news->have_posts()) { $query_news->the_post();
			                    ?>
                                <div class="col-md-4">
                                    <div class="blog-post-sm">
                                        <div class="thumbnail">
			                                <?php echo thumbnail_by_yurets($post, 'thumbnail'); ?>
                                        </div>
                                        <span  class="mainpage_title_header">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            </span>
                                        <div class="excerpt">
                                            <p class="text-justify"><?php echo get_home_blog_excerpt(); ?></p>
                                        </div>
                                    </div>
                                </div>
		                    <?php
			                    $i++;
                                if ($i==3) {
	                                echo '<div class="clearfix"></div>';
                                    $i=0;
                                }
                            } wp_reset_postdata(); ?>
                    </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>