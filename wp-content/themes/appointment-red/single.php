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
                    <?php include('author-info.php'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="page-title-section">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="page-title"><h1>Другие публикации <?php the_author(); ?></h1></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-builder">
        <div class="container">
        <div class="row">
            <div class="col-md-12 coffee">
                    <div id="primary-coffee" class="primary-sidebar widget-area coffee" role="complementary">
	                    <?php
		                    $query_news = new WP_Query('post__not_in[]='.$post->ID.'&author='.get_the_author_meta( 'ID' ).'&post_type=post&showposts=4');
                            $i = 0;
		                    while($query_news->have_posts()) { $query_news->the_post();
			                    ?>
                                <div class="col-md-3">
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
                                if ($i==4) {
	                                echo '<div class="clearfix"></div>';
                                    $i=0;
                                }
                            } wp_reset_postdata(); ?>
                    </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>