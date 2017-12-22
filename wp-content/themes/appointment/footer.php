<?php
$appointment_options=theme_setup_data();
$ftr_img = get_header_image();


$footer_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
    /*echo '<pre>';
    print_r($footer_setting);
    echo '</pre>';*/
	if (is_front_page() && is_active_sidebar( 'sidebar-armtek' ) ) { ?>
<div class="footer-section ftr-white">
            <div class="col-md-6 armtek">
                <div id="primary-armtek" class="primary-sidebar widget-area armtek" role="complementary">
					<?php dynamic_sidebar( 'sidebar-armtek' ); ?>
                </div>
            </div>
        <div class="col-md-6 coffee">
	        <?php if ( is_active_sidebar( 'sidebar-coffee' ) ) : ?>
                <div id="primary-coffee" class="primary-sidebar widget-area coffee" role="complementary">
			        <?php dynamic_sidebar( 'sidebar-coffee' ); ?>
                </div>
	        <?php endif; ?>
        </div>
    <div class="clearfix"></div>
</div>
<div class="footer-autohouse-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-1">
                        <div class="page-title">
                            <h1><a href="/armada-autohaus"><img src="/wp-content/uploads/2017/12/autohaus_logo-1.png" alt="Автохауз АРМАДА"></a></h1>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <p>Автосалон "АРМАDА" - официальный автосалон автомобилей с пробегом в Могилеве!
<br />
                            Наши менеджеры помогут быстро и выгодно продать Ваш автомобиль (комиссионная продажа), приобрести авто в рассрочку на самых лучших условиях, оформить авто в лизинг, что часто выгоднее кредита.</p>
                    </div>
                </div>
            </div>
</div>
<?php
     if (is_active_sidebar('sidebar-auto')  && is_front_page()) { ?>
	     <div class="footer-autohouse">
                <div id="primary-autohouse" class="primary-sidebar widget-area autohouse" role="complementary">
					<?php dynamic_sidebar( 'sidebar-auto' ); ?>
         </div>
         </div>
    <?php }
     ?>
<?php } ?>
<div class="clearfix"></div>
<div class="footer-copyright-section">
	<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="footer_logo">
                    <a href="/"><img src="<?php echo $footer_setting['upload_image_logo']; ?>" height="<?php echo $footer_setting['height']; ?>" width="<?php echo $footer_setting['width']; ?>" alt="<?php echo $footer_setting['footer_copyright_text']; ?>" /></a>
                </div>
            </div>
        </div>

		<div class="row">
            <div class="col-md-4 col-md-offset-1">
                <p>Навигация</p>
				<?php   if (is_active_sidebar('sidebar-footer')) { ?>
                    <div id="primary-footer" class="primary-sidebar widget-area" role="complementary">
						<?php dynamic_sidebar( 'sidebar-footer' ); ?>
                    </div>
				<?php }	?>
            </div>
            <div class="col-md-4">
                <p>Полезные ссылки</p>
                    <ul class="useful_links">
                        <li><a href="#">Регистрация транспорта</a></li>
                        <li><a href="#">График работы МРЭО ГАИ</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Рекламодателям</a></li>
                        <li><a href="#">Контакты</a></li>
                    </ul>
            </div>
            <div class="col-md-3">
                <p>Дружите с нами</p>
                <ul class="footer-contact-social">
                    <li class="facebook"><a href="https://fb.com/armadaauto" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
                    <li class="linkedin"><a href="https://vk.com/armadaauto" target="_blank"><i class="fab fa-vk"></i></a></li>
                    <li class="googleplus"><a href="https://instagram.com/armadaauto" target="_blank"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
		</div>
	</div>
</div>
<a href="#" class="hc_scrollup"><i class="fa fa-chevron-up"></i></a>
<?php wp_footer(); ?>
</body>
</html>