<!-- Footer Section -->
<?php
$appointment_options=theme_setup_data();
$footer_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
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
<?php }
// if ( is_active_sidebar( 'footer-widget-area' ) ) { ?>
<!-- /Footer Section -->
<div class="clearfix"></div>
<!-- Footer Copyright Section -->
<div class="footer-copyright-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="footer-copyright">
					<?php if( $footer_setting['footer_menu_bar_enabled'] == 0) { ?>
					<?php echo $footer_setting[ 'footer_copyright_text']; ?>
					</a>
					<?php } // end if ?>
				</div>
			</div>
				<?php if($footer_setting['footer_social_media_enabled'] == 0 ) {
			    $footer_facebook = $footer_setting['footer_social_media_facebook_link'];
				$footer_twitter = $footer_setting['footer_social_media_twitter_link'];
				$footer_linkdin = $footer_setting['footer_social_media_linkedin_link'];
				$footer_googleplus = $footer_setting['footer_social_media_googleplus_link'];
				$footer_skype = $footer_setting['footer_social_media_skype_link'];
				?>
			<div class="col-md-4">
			<ul class="footer-contact-social">
					<?php if($footer_setting['footer_social_media_facebook_link']!='') { ?>
					<li class="facebook"><a href="<?php echo esc_url($footer_facebook); ?>" <?php if($footer_setting['footer_facebook_media_enabled']==1){ echo "target='_blank'"; } ?> ><i class="fa fa-facebook"></i></a></li>
					<?php } if($footer_setting['footer_social_media_twitter_link']!='') { ?>
					<li class="twitter"><a href="<?php echo esc_url($footer_twitter); ?>" <?php if($footer_setting['footer_twitter_media_enabled']==1){ echo "target='_blank'"; } ?> ><i class="fa fa-twitter"></i></a></li>
					<?php } if($footer_setting['footer_social_media_linkedin_link']!='') { ?>
					<li class="linkedin"><a href="<?php echo esc_url($footer_linkdin); ?>" <?php if($footer_setting['footer_linkedin_media_enabled']==1){ echo "target='_blank'"; } ?> ><i class="fa fa-linkedin"></i></a></li>
					<?php } if($footer_setting['footer_social_media_googleplus_link']!='') { ?>
					<li class="googleplus"><a href="<?php echo esc_url($footer_googleplus); ?>" <?php if($footer_setting['footer_googleplus_media_enabled']==1){ echo "target='_blank'"; } ?> ><i class="fa fa-google-plus"></i></a></li>
					<?php } if($footer_setting['footer_social_media_skype_link']!='') { ?>
					<li class="skype"><a href="<?php echo esc_url($footer_skype); ?>" <?php if($footer_setting['footer_skype_media_enabled']==1){ echo "target='_blank'"; } ?> ><i class="fa fa-skype"></i></a></li>
					<?php } ?>
				</ul>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<!-- /Footer Copyright Section -->
<!--Scroll To Top-->
<a href="#" class="hc_scrollup"><i class="fa fa-chevron-up"></i></a>
<!--/Scroll To Top-->
<?php wp_footer(); ?>
</body>
</html>