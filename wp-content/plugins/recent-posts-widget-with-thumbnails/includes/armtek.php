  <div class="<?php echo $args['widget_id']; ?>">
            <div class="row">
				<?php while ( $r->have_posts() ) : $r->the_post(); ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 armtek_news_div">
                        <div class="date-sm-armtk"><?php echo get_the_date(); ?></div>
                        <a href="<?php the_permalink(); ?>">
                            <?php echo thumbnail_by_yurets($post, 'mainpage_thumbnail_2nd'); ?>
                        </a>
                        <div class="<?php echo $args['widget_id']; ?>-post-title">
                        <a href="<?php the_permalink(); ?>">
                                    <?php if ( $post_title = $this->get_the_trimmed_post_title() ) {
	                                    echo $post_title;
                                    } else {
	                                    the_ID();
                                    } ?>
                        </a>
                    </div>
                                <div class="<?php echo $args['widget_id']; ?>-post-excerpt">
                                    <?php echo $this->get_the_trimmed_excerpt(); ?>
                                </div>
                    </div>
				<?php endwhile; ?>
            </div>
        </div>
