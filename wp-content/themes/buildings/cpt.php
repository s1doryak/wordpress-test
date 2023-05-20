<?php

if (!defined('ABSPATH')) {
	exit;
}

add_action('init', function () {

	/**
	 * ЖК
	 */
	register_post_type('building', [
		'labels' => [
			'name' => __('ЖК'),
			'singular_name' => __('ЖК'),
			'add_new' => __('Добавить ЖК'),
			'add_new_item' => __('Новый ЖК'),
			'edit_item' => __('Редактировать'),
			'new_item' => __('Добавить ЖК'),
			'view_item' => __('Посмотреть ЖК'),
			'search_items' => __('Поиск'),
			'all_items' => __('Все ЖК'),
			'menu_name' => __('ЖК'),
		],
		'rewrite' => [
			'slug' => 'buildings'
		],
		'supports' => [
			'title',
			'editor',
			'thumbnail'
		],
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'menu_icon' => 'dashicons-admin-home',
		'menu_position' => 31,
	]);

	/**
	 * Метро
	 */
	register_taxonomy('metro', 'building', [
		'labels' => [
			'name' => __('Метро'),
			'singular_name' => __('Метро'),
			'menu_name' => __('Метро'),
			'all_items' => __('Все'),
			'edit_item' => __('Изменить'),
			'view_item' => __('Посмотреть'),
			'update_item' => __('Обновить'),
			'add_new_item' => __('Добавить метро'),
			'new_item_name' => __('Новое метро'),
			'search_items' => __('Поиск'),
		],
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
	]);

	/**
	 * Класс жилья
	 */
	register_taxonomy('type', 'building', [
		'labels' => [
			'name' => __('Класс'),
			'singular_name' => __('Класс'),
			'menu_name' => __('Классы'),
			'all_items' => __('Все классы'),
			'edit_item' => __('Изменить'),
			'view_item' => __('Посмотреть'),
			'update_item' => __('Обновить'),
			'add_new_item' => __('Добавить Класс'),
			'new_item_name' => __('Новый класс'),
			'search_items' => __('Поиск'),
		],
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
	]);

});
