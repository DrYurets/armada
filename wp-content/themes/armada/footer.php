<?php
$appointment_options=theme_setup_data();
$ftr_img = get_header_image();
$footer_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
	if (is_front_page() && is_active_sidebar( 'sidebar-armtek' ) ) { ?>
<div class="footer-section ftr-white row">
    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 armtek">
        <div id="primary-armtek" class="primary-sidebar widget-area armtek" role="complementary">
		    <?php dynamic_sidebar( 'sidebar-armtek' ); ?>
        </div>
    </div>
    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 coffee">
	    <?php if ( is_active_sidebar( 'sidebar-coffee' ) ) : ?>
            <div id="primary-coffee" class="primary-sidebar widget-area coffee" role="complementary">
			    <?php dynamic_sidebar( 'sidebar-coffee' ); ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="clearfix"></div>
</div>
    <?php } ?>
<div class="footer-autohouse-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12 col-md-offset-1">
                        <div class="page-title">
                            <h1><a href="/armada-autohaus" name="Автохауз АРМАДА"><img src="/wp-content/uploads/2017/12/autohaus_logo-1.png" alt="Автохауз АРМАДА"></a></h1>
                        </div>
                    </div>
                    <div class="col-md-7 news-disclaimer">
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

<div class="clearfix"></div>
<div class="footer-copyright-section">
	<div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="footer_logo">
                    <a href="/" name="Главная"><img src="<?php echo $footer_setting['upload_image_logo']; ?>" height="<?php echo $footer_setting['height']; ?>" width="<?php echo $footer_setting['width']; ?>" alt="<?php echo $footer_setting['footer_copyright_text']; ?>" /></a>
                </div>
            </div>
        </div>

		<div class="row footer-useful">
            <div class="col-md-4 col-lg-4 col-lg-offset-1 col-sm-6 col-xs-6">
                <p>Навигация</p>
				<?php   if (is_active_sidebar('sidebar-footer')) { ?>
                    <div id="primary-footer" class="primary-sidebar widget-area" role="complementary">
						<?php dynamic_sidebar( 'sidebar-footer' ); ?>
                    </div>
				<?php }	?>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-6">
                <p>Полезные ссылки</p>
                    <ul class="useful_links">
                        <li><a href="#" name="Регистрация транспорта">Регистрация транспорта</a></li>
                        <li><a href="#" name="МРЭО ГАИ">График работы МРЭО ГАИ</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#" name="Рекламодателям">Рекламодателям</a></li>
                        <li><a href="#" name="Контакты">Контакты</a></li>
                    </ul>
            </div>
            <div class="col-md-4 col-lg-3 col-sm-12 col-xs-12 footer-contact-social">
                <p>Дружите с нами</p>
                <ul class="footer-contact-social">
                    <li class="facebook"><a href="https://fb.com/armadaauto" target="_blank" rel="noopener" name="Facebook link"><i class="fab fa-facebook-square"></i></a></li>
                    <li class="linkedin"><a href="https://vk.com/armadaauto" target="_blank" rel="noopener" name="VK link"><i class="fab fa-vk"></i></a></li>
                    <li class="googleplus"><a href="https://instagram.com/armadaauto" target="_blank" rel="noopener" name="Instagram link"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
<?php if(is_home()) { ?>
    <script>
        $('.parallaxie').parallaxie({
            speed: 0.8,
            size: "cover"
        });
    </script>
<?php } ?>
</body>
</html>