<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wordpress' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'wordpress' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', 'wordpress' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'database' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '#;Ju#E314M0P0Bh~jy#?nS#yC]hF~+Bn]!g[VE~A$9k7O>NT,1;>X1~T[%U2d=#&' );
define( 'SECURE_AUTH_KEY',  ':HmI:IC=d^rJ~MTP{{h]>H!c;xR)Hv#vdWC)Za MM/3P%~Bb#IkCd|wKF;wQk]ue' );
define( 'LOGGED_IN_KEY',    'jyYxG&S$sv^KOBkcTD@X,@6L&KlDSIbzV:DZl`(IcxP(rhrhUslq`^YP&P`2<bhL' );
define( 'NONCE_KEY',        ')U/b7GC=]CU`RKV53KB3p^2-4_3/$],9O2i6, z7QH>gP-}I>cd^,!M76?#hJBTV' );
define( 'AUTH_SALT',        '0}<s.SF7xt-Z_F QR|`i{7{=p,FokqDh=KBy6P]V71D4nt3_c`k$tqOL]%(7G3NI' );
define( 'SECURE_AUTH_SALT', 'o2Qsn/wIX5K)0DOB!`C)=V!D66.Ga]XfDbc>t@{&G}h}~8yg8rj6y/c*LpaLuNkJ' );
define( 'LOGGED_IN_SALT',   '|4H&74[ajFh?^Mw[t<x%(E46$AKOlG^}7$V,VaZk?u4=G%6a9&hzU-(X[<V@_Y2/' );
define( 'NONCE_SALT',       '6H9BGcbrAGGl.4O{CQF9t6Afr=#RoM=Y`x|:X0h>&Ul/S9kI[O%+_uRmNdO[-ls?' );

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
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
