<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
		$appointment_options=theme_setup_data();
		$header_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options);
		if($header_setting['upload_image_favicon']!=''){ ?>
            <link rel="shortcut icon" href="<?php  echo $header_setting['upload_image_favicon']; ?>" />
		<?php } ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<?php if ( get_header_image() != '') {?>
    <div class="header-img">
        <div class="header-content">
			<?php if($header_setting['header_one_name'] != '') { ?>
                <h1><?php echo $header_setting['header_one_name'];?></h1>
			<?php }  if($header_setting['header_one_text'] != '') { ?>
                <h3><?php echo $header_setting['header_one_text'];?></h3>
			<?php } ?>
        </div>
        <img class="img-responsive" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
    </div>
<?php } ?>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
			<?php if($header_setting['text_title'] == 1) { ?>
                <h1><a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Appointment">
						<?php
							if($header_setting['enable_header_logo_text'] == 1)
							{ echo "<div class=appointment_title_head>" . get_bloginfo( ). "</div>"; }
                            elseif($header_setting['upload_image_logo']!='')
							{ ?>
                                <img class="img-responsive" src="<?php echo $header_setting['upload_image_logo']; ?>" style="height:<?php echo $header_setting['height']; ?>px; width:<?php echo $header_setting['width']; ?>px;"/>
							<?php } else { ?>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/red.png">
							<?php } ?>
                    </a></h1>
			<?php } ?>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only"><?php echo 'Toggle navigation'; ?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <ul class="head-contact-social">
            <li class="facebook"><a href="https://fb.com/armadaauto" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <li class="linkedin"><a href="https://vk.com/armadaauto" target="_blank"><i class="fa fa-vk"></i></a></li>
            <li class="googleplus"><a href="https://instagram.com/armadaauto" target="_blank"><i class="fa fa-instagram"></i></a></li>
        </ul>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		    <?php wp_nav_menu( array(
			    'theme_location' => 'primary',
			    'container'  => '',
			    'menu_class' => 'nav navbar-nav navbar-right',
			    'fallback_cb' => 'webriti_fallback_page_menu',
			    'items_wrap'  => $social,
			    'walker' => new webriti_nav_walker()
		    ) );
		    ?>
        </div>
    </div>
</nav>
<div class="clearfix"></div>