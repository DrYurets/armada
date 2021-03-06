<?php
	$appointment_options=theme_setup_data();
	$slider_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options);
	if($slider_setting['home_banner_enabled'] == 0 ) {
		?>
        <div class="homepage-mycarousel">
        <div id="carousel-example-generic" class="carousel slide <?php echo $slider_setting['slider_options']; ?>" data-ride="carousel"
			<?php if($slider_setting['slider_transition_delay'] != '') { ?> data-interval="<?php echo $slider_setting['slider_transition_delay']; } ?>" >
			<?php
				$query_args = array();
				if($slider_setting['slider_radio'] == 'demo') { ?>
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="<?php echo get_theme_root_uri('armada', 'themes/armada'); ?>/slide/1sl.jpg">
                            <div class="container slide-caption">
                                <div class="slide-text-bg1"><h2>Крупнейший в Могилеве</h2></div>
                                <div class="slide-text-bg2"><span>Два огромных этажа: более 130 магазинов различной автомобильной направленности под одной крышей! Автозапчасти, аксессуары, автохимия и многое другое.</span></div>
                                <div class="slide-btn-area-sm"><a href="/1st" class="slide-btn-sm">План Торгового Центра</a></div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo get_theme_root_uri('armada', 'themes/armada'); ?>/slide/2sl.jpg">
                            <div class="container slide-caption">
                                <div class="slide-text-bg1"><h2>Удобный сервис</h2></div>
                                <div class="slide-text-bg2"><span>Отделение МРЭО ГАИ, страховка автомобилей, аптека, рыболовный магазин и вкусный кофе!</span></div>
                                <div class="slide-btn-area-sm"></div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo get_theme_root_uri('armada', 'themes/armada'); ?>/slide/3sl.jpg">
                            <div class="container slide-caption">
                                <div class="slide-text-bg1"><h2>Удобная парковка</h2></div>
                                <div class="slide-text-bg2"><span>Она просто огромная! Найти удобное место для своего автомобиля теперь не проблема!</span></div>
                                <div class="slide-btn-area-sm"><a href="/map" class="slide-btn-sm">Посмотреть со спутника</a></div>
                            </div>
                        </div><div class="item">
                            <img src="<?php echo get_theme_root_uri('armada', 'themes/armada'); ?>/slide/sl5.jpg">
                            <div class="container slide-caption">
                                <div class="slide-text-bg1"><h2>Удачное соседство</h2></div>
                                <div class="slide-text-bg2"><span>В шаговой доступности еще несколько десятков популярных магазинов: ЕВРООПТ, 5-й элемент, ПАЛАС, Электросила и др.</span></div>
                                <div class="slide-btn-area-sm"><a href="#" class="slide-btn-sm"><?php _e('Read More','appointment'); ?></a></div>
                            </div>
                        </div>
                    </div>

					<?php
				}

				else
				{
					$featured_slider_post = $slider_setting['featured_slider_post'];

					$slider_select_category = array();
					$slider_select_category = $slider_setting['slider_select_category' ];

					$query_args = array( 'category__in'  => $slider_select_category,'ignore_sticky_posts' => 1 ,'posts_per_page' =>$featured_slider_post);

				}
				$t=true;

				$the_query = new WP_Query($query_args);
			?>
            <ol class="carousel-indicators">
				<?php
					$i=0;
					if ( $the_query->have_posts() ) {
						while ( $the_query->have_posts() ) {
							$the_query->the_post();  ?>
                            <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i;?>" class="<?php if($i==0){ echo 'active';} ?>"></li>
							<?php $i++; } }?>
            </ol>
            <div class="carousel-inner" role="listbox">
				<?php

					if ( $the_query->have_posts() ) {
						while ( $the_query->have_posts() ) {
							$the_query->the_post();

							?>
                            <div class="item <?php if($t==true){echo 'active';}$t=false; ?>">
								<?php $default_arg =array('class' => "img-responsive"); ?>
								<?php if(has_post_thumbnail()){
									the_post_thumbnail('', $default_arg);
								}
									if(!has_post_thumbnail()){
										echo '<img class="img-responsive" src="'.WEBRITI_TEMPLATE_DIR_URI.'/images/slide/no-image.jpg">'; ?>
                                        <div class="container slide-caption">
											<?php if($post->post_title !="") {?>
                                                <div class="slide-text-bg1"><h2><?php the_title();?></h2></div>
											<?php }
												if($post->post_content !="")
												{
													echo get_the_excerpt();
												}?>
                                        </div>
									<?php }
									else { ?>
                                        <div class="container slide-caption">
											<?php if($post->post_title !="") {?>
                                                <div class="slide-text-bg1"><h2><?php the_title();?></h2></div>
											<?php }
												if($post->post_content !="")
												{
													echo get_the_excerpt();
												}?>
                                        </div>
									<?php } ?>
                            </div>
						<?php } wp_reset_postdata();  }  ?>

            </div>
			<?php  if($i>1){ ?>
                <ul class="carou-direction-nav">
                    <li><a class="carou-prev" href="#carousel-example-generic" data-slide="prev"></a></li>
                    <li><a class="carou-next" href="#carousel-example-generic" data-slide="next"></a></li>
                </ul>
			<?php } ?>
        </div>
	<?php } ?>