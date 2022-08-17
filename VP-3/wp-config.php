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
define( 'DB_NAME', 'vp-3' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         '9Pb4LH-Un:cm2,JBh|c;w_RvUz7$SwA3-)}qDlOqLC5<zB7<#-&lhJ9}85m1Lgi~' );
define( 'SECURE_AUTH_KEY',  ',EFH>5&~5UZ+P3#O{Xz_`(-e)ld,1EqS#+;`KpeXuX2U<WQsv~1>$|47< !Drv44' );
define( 'LOGGED_IN_KEY',    '|bxQaCQ#8]|eUz`01x0~AsyzK0]m:pX<Q}1Y|~5c n]vuCb1kpdWT-5OI n;jAU3' );
define( 'NONCE_KEY',        'OV$=!kEI$%ZgxU[Q0#=F 224Ka;|]=Em2xfe}PT?La{wET^G;F0f+<dL(yUsD7Yo' );
define( 'AUTH_SALT',        'K&~[=8+#gcQJ3-(p*i4)jcgNBOr#L!>s`{yh2(5t:<^?OTmY bz16ruG[hQ4Me&|' );
define( 'SECURE_AUTH_SALT', ';[s$pO/3B==q)||0b2uHH!V-Q~OY>).,(sfHt4a/j<.q<j!<^;h25~FU~IW6^Zo%' );
define( 'LOGGED_IN_SALT',   'pw;/koxivp$a9(tyV3ngksxc^5TsJR:d5?D}H9)^:`7|<6VP~E~2r^GVr2GK0$K7' );
define( 'NONCE_SALT',       '?Q2V0X&^@9fqCnQvYMhvh*q@LeGNkeY`R|-&iK`;.AOs@gQee91n,.Gp7|5_6jRX' );

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
