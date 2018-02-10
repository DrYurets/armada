<?php $header_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options); ?>
<!doctype html>
<html lang="ru" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#FFFFFF" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <a href="https://msdn.microsoft.com/en-us/library/jj676915%28v=vs.85%29.aspx" name="ie_engine_link"></a>
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <script src="<?php echo esc_url( home_url() ); ?>/wp-content/themes/armada/js/jquery-3.3.1.slim.min.js"></script>
    <?php
        wp_head();
        if (is_home()) { ?>
            <script src="<?php echo esc_url( home_url() ); ?>/wp-content/themes/armada/js/parallaxie.js"></script>
    <?php }  ?>
</head>
<body <?php body_class(); ?> >
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Армада Авто Мир" name="Armada Auto">
                        <img class="img-responsive" alt="Армада Авто Мир" width="201px" height="59px" src="<?php echo esc_url( home_url( '/' ) ); ?>images/armada-logo.gif" />
                    </a>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Меню</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php
            wp_nav_menu(array('theme_location' => 'top','menu_class' => 'nav navbar-nav navbar-right'));
            ?>
        </div>
    </div>
</nav>
<div class="clearfix"></div>