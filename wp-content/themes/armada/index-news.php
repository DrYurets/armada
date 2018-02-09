<?php
	$appointment_options=theme_setup_data();
	$news_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options ); ?>

<div class="page-title-section-frontpage">
    <div class="frontpage-overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <div class="page-title">
                        <h1><a href="/category/news/">Новости</a></h1>
                    </div>
                </div>
                <div class="col-md-7 news-disclaimer">
                    <p>Следите за новостями магазинов ТЦ "Армада Авто Мир". <br>Самая свежая и самая полная информация о скидках, акциях, мероприятиях, новинках ассортимента и мн.др.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Сами новости, собссно -->
<div class="blog-section">
    <div class="container">
        <div class="row">
			<?php
                $postnum = 1;
				$cat_id = array();
				$cat_id = $news_setting['blog_selected_category_id'];
				$no_of_post = 9; // yurets
				$args = array( 'post_type' => 'post','ignore_sticky_posts' => 1 , 'category__in' => $cat_id, 'posts_per_page' => $no_of_post);
				$news_query = new WP_Query($args);
				$i=1;
				$k=1;
				while($news_query->have_posts() ) : $news_query->the_post();
                    include( 'mainpagenews.php' );
				endwhile;
                 ?>
        </div>
    </div>
</div>
<!-- /Новости -->