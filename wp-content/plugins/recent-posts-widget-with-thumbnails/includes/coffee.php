  <div class="<?php echo $args['widget_id']; ?>">
            <div class="row">
				<?php while ( $r->have_posts() ) : $r->the_post(); ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 coffee_news_div">
                        <div class="date-sm-coffee">
                            <span class="pull-left">
                                <?php echo get_the_date(); ?>
                            </span>
                            <span class="pull-right"><?php echo $this->get_the_author(); ?></span>
                        </div>
	                        <?php
		                        if (is_home()) $dimension = 'mainpage_thumbnail_2nd';
		                        else $dimension = 'news_thumbnail';
		                        echo thumbnail_by_yurets($post, $dimension);
	                        ?>
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
