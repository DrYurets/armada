<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'armadaautoby');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');



/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'lePmr#-5?f![toSP~] P+5(R+X-};4L}|aKAZ*ZF,f)%nmmt!Mkq0/OATc}N3rl(');
define('SECURE_AUTH_KEY',  'u<d-J,2>&)rHwv&y+1)dUKn&^&I1.Cm$OaJ)kcu>[HR]Ach&t_/$@dybRx[+vvXs');
define('LOGGED_IN_KEY',    '&WACt(=C2{:X/%Z`C:vX%]:AO>_GMx)+QJa-B)i<PtV{pf2c0[1n^!a-zKDz@J9*');
define('NONCE_KEY',        'J%v<IWLc#4NN`+%K[-kO,(P|sBrKH}7aA=|{c=eF6:SB9)2P,n-.P1CuO_N,[i25');
define('AUTH_SALT',        '.rRtN!q<+0geh~s[D-[2|9k+s?|j hA.j!Xl*ha6}WPdnsy)u@Y=ti_(+Hiv0@i ');
define('SECURE_AUTH_SALT', 'T0eyNe,m-_j9[OhQR=!mlhhgqU3_biMO.(vUqT1adf-No;ZvGUW-hDw<E.8,UCiq');
define('LOGGED_IN_SALT',   'j|3PzO?&?5EU>JGL&W8f<-R:,MBw=~]7oPXzSYHXg35{S9PqE~^1.f2$is^;?k,F');
define('NONCE_SALT',       'NP9tRA2nn=>Uxn(A}itzFeyK9AE}yVvgf,X}TUC4/bD[CGS0SD(G_T4+-1-I^ndj');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
