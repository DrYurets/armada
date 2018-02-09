<?php 
$appointment_options=theme_setup_data(); 
$service_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
if($service_setting['service_section_enabled'] == 0 ) { ?>
    <div class="Service-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="section-heading-title">
                        <h1> Наши услуги</h1>
                        <p> </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="service-area">
                        <div class="media">
                            <div class="service-icon">
                                <i class="fas fa-map-marker-alt fa-2x"></i>
                            </div>
                            <div class="media-body">
                                <h3>Адрес торгового центра</h3>
                                <p>г.Могилев, ул.Лазаренко, 73В<br><a href="/map" title="Схема проезда">Схема проезда</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="service-area">
                        <div class="media">
                            <div class="service-icon">
                                <i class="fas fa-clock fa-2x"></i>
                            </div>
                            <div class="media-body">
                                <h3>Режим работы</h3>
                                <p>Понедельник- пятница: 9-00 — 18-00<br>Суббота: 9-00 — 17-00<br>Воскресенье: 9-00 — 16-00</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="service-area">
                        <div class="media">
                            <div class="service-icon">
                                <i class="fas fa-building fa-2x"></i>
                            </div>
                            <div class="media-body">
                                <h3>Два этажа</h3>
                                <p>Вместили 130 различных по размеру павильонов. Комфортное посещение обеспечивает эскалатор, делающий путь от первого этажа до второго максимально коротким и легким.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="service-area">
                        <div class="media">
                            <div class="service-icon">
                                <i class="fas fa-car fa-2x"></i>
                            </div>
                            <div class="media-body">
                                <h3>Огромный паркинг</h3>
                                <p>Для покупателей, приехавших в торговый центр на личном автомобиле, предусмотрена большая гостевая парковка, где вы без труда и опасений можете оставить свою машину.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="service-area">
                        <div class="media">
                            <div class="service-icon">
                                <i class="fas fa-cart-plus fa-2x"></i>
                            </div>
                            <div class="media-body">
                                <h3>Огромный ассортимент</h3>
                                <p>Здесь можно купить автозапчасти, профессиональную автохимию, автокосметику и автомасла, сигнализации, аксессуары для авто и даже рыболовные снасти</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="service-area">
                        <div class="media">
                            <div class="service-icon">
                                <i class="fas fa-bus fa-2x"></i>
                            </div>
                            <div class="media-body">
                                <h3>Доступность</h3>
                                <p>«Армада Авто Мир» расположен в шаговой доступности от 4 остановок общественного транспорта.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>