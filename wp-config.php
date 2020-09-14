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
define( 'DB_NAME', 'gurza' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '.?x]E4$m,DaA}/FuWo>AspPjZO5:kz=R7`FynaarH^l`_?m-RD>w(z5OVoz!))Uu' );
define( 'SECURE_AUTH_KEY',  '.)l1IyEp>3v>4=0|9(0)Q=N+F9HE@E3|-Yp%k6d9fVi)voX<Q< [x{J2cb*Q9W}&' );
define( 'LOGGED_IN_KEY',    'p83!Z17/XQ9MEZ.xSv0 Jr9[DA+[z&=gw?Ee#m)Mu]Ot^FBm*n!y#A|Jmr.!]P6H' );
define( 'NONCE_KEY',        '{v`Q^7-^J[N}SxE4V5kBH&NbHkg 51s kWyH#gTKOphRMKDvp].Y^6h@gvp`Z@oN' );
define( 'AUTH_SALT',        '06)c0/YiH`R(}Hz/9CT).)|XE `7-}{C[grlkiExT(vyc(soAj8GfXk9#m%s?*EJ' );
define( 'SECURE_AUTH_SALT', 's{<r`#,EqJiw0qJn{awG:/v5d7h@i;/SQ)*I@ FB2PFB7o;>M>kERfl~q^4W%sul' );
define( 'LOGGED_IN_SALT',   'zz:sEAEA{ G~M3vKrO,j+jXL6JT d2u=5*USk .*:^HSl9AMHx?zrdr?K:[W.^lE' );
define( 'NONCE_SALT',       'avhaue8|$dX~3:x7F8!:/M7anpCw@m j~^L(M7Gyc/z@FLT+T4vJfu_rla%q`Nw4' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

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
