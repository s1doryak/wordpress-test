<?php

if (!defined('ABSPATH')) {
	exit;
}
                                                                                                                                                      
/**
 * Инициализация темы
 */
add_action('after_setup_theme', function () {

	load_theme_textdomain('default', sprintf('%s/i18n', get_template_directory()));

	add_theme_support('title-tag');

	add_theme_support('post-thumbnails');

	add_image_size('gallery', 380, 229, ['center', 'center']);

	add_image_size('gallery@2x', 760, 458, ['center', 'center']);

	add_image_size('gallery@full', 1600, 1200, false);

});

/**
 * Подключение стилей и скриптов сайта
 */
add_action('wp_enqueue_scripts', function () {
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css', [], get_theme_version());
	wp_enqueue_script('script', get_template_directory_uri() . '/script.js', [], get_theme_version(), true);
	wp_localize_script('script', 'options', [
		'ajax_url' => admin_url('admin-ajax.php'),
	]);
});

/**
 * Разрешаем загружать определенные MIME-типы.
 */
add_filter('upload_mimes', function ($defaults) {

	$extra = [
		'svg' => 'image/svg+xml',
	];

	return array_merge($defaults, $extra);
}, 10, 1);

/**
 * Кодировка сообщений эл.почты
 */
add_filter('wp_mail_charset', function () {
	return 'UTF-8';
});

/**
 * Тип содержимого сообщений эл.почты
 */
add_filter('wp_mail_content_type', function () {
	return 'text/html';
});

/**
 * Адрес сайта на странице входа
 */
add_filter('login_headerurl', function () {
	return get_bloginfo('url');
});

/**
 * Название сайта на странице входа
 */
add_filter('login_headertext', function () {
	return get_bloginfo('name');
});

/**
 * Стили на странице входа
 */
add_action('login_enqueue_scripts', function () {
	wp_enqueue_style('style-login', get_stylesheet_directory_uri() . '/style.css');
});

/**
 * Обработка shortcodes в текстовых ACF полях
 */
add_filter('acf/format_value', function ($value, $post_id, $field) {
	if (is_string($value)) {
		return do_shortcode($value);
	}

	return $value;
}, 10, 3);

add_filter('image_size_names_choose', function ($sizes) {
	return array_merge($sizes, [
		'gallery' => __('Новостройки'),
		'gallery@2x' => __('Новостройки (увеличенный)'),
		'gallery@full' => __('Новостройки (оригинал)'),
	]);
});

/**
 * Не вызывать беспокойство из-за использования Git.
 */
add_filter('automatic_updates_is_vcs_checkout', function ($active, $abspath) {
	return false;
}, 99, 2);

/**
 * Удаление "'Архивы: " из списков записей
 */
add_filter('post_type_archive_title', function ($title, $post_type) {
	return str_replace('Архивы: ', '', $title);
}, 10, 2);

/**
 * Удаление "'Архивы: " из <title>
 */
add_filter('document_title', function ($title) {
	return str_replace('Архивы: ', '', $title);
}, 10, 2);

