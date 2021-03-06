<?php
  get_header();
  ?>
<div class="page-title-section">
	<div class="overlay">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="page-title"><h1><?php echo single_cat_title("", false); ?></h1></div>
				</div>
				<div class="col-md-6">
					<ul class="page-breadcrumb">
						<?php if (function_exists('qt_custom_breadcrumbs_yurets')) qt_custom_breadcrumbs_yurets();?>
					</ul>
				</div>
			</div>
		</div>	
	</div>
</div>
    <div class="container page-author">
        <div class="row">
            <div class="blog-author">
                <?php include('author-info.php'); ?>
            </div>
        </div>
    </div>

	<div class="container">
		<div class="row">
			<div class="<?php appointment_post_layout_class(); ?>" >
			   <?php 
				if ( have_posts() ) :
                    $i==0;
					while ( have_posts() ) : the_post();
                ?>
                    <div class="col-md-6">
                        <?php get_template_part( 'content',''); ?>
                    </div>
                <?php
					$i++;
                    if ($i==2) {
                    echo '<div class="clearfix"></div>';
                        $i=0;
                    }
                    endwhile;
				endif;
				the_posts_pagination( array(
				'prev_text'          => '<i class="fas fa-angle-double-left"></i>',
				'next_text'          => '<i class="fas fa-angle-double-right"></i>',
				) );
				?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>