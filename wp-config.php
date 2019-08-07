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
define( 'DB_NAME', 'slawek-DB' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'rootuser' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'root' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '+(i8k[*2v5[&EULM8cl?.>e>BI-fnn|WKC-*d~E~>fxh:z t(+n%Ut0mvKx;U^EK' );
define( 'SECURE_AUTH_KEY',  'Z/ EQz77,#m|;:ly@J;wd.O!<yY?7Hb%^|>L%OI>M<*F[b1ta}}MlE1Y1Ncr53Pq' );
define( 'LOGGED_IN_KEY',    ':!DGW,:e[{*hYhx#gFpt#j^P~Bbt07#JYoZw{pCA{4B[IC&{cZroNL%OnED%Tw45' );
define( 'NONCE_KEY',        'vlxiE!rGH0L_C:N~3>*WfGd7&AE|YEW|,/)H0i %a&v0Oqob5S1w)hQxh?Y40gI;' );
define( 'AUTH_SALT',        ':Sa*._V&T4Y~1d25*m6PpMqKHH#rzBWia@TS`cIJi31a c^MGHUP-bwN,>`DpB81' );
define( 'SECURE_AUTH_SALT', 't7gluOi&]m~Wd(A~<o}bL]n30TwFW]-e@rGp5WKwH4h8X2s{9H]wk0x]>uaufbs#' );
define( 'LOGGED_IN_SALT',   'sLk}M5G?JksP(c.6GaBG&e#x-|G97NW</Cf4r0I:C]KGWzevZFOJV?UO`b4]{dX%' );
define( 'NONCE_SALT',       '&G(8)5 3V)|WwC-=:gu)Jy.f;)(-3n%*:Er^O#Q.0Cos]eTb138<|MU:5u%> &0(' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'slawek_';

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
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
