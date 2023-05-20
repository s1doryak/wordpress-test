<?php

if (!defined('ABSPATH')) {
	exit;
}

if (!function_exists('is_acf_enabled')) :

	/**
	 * Проверяет, включен ли плагин ACF.
	 *
	 * @return boolean
	 */
	function is_acf_enabled()
	{
		return function_exists('acf_add_options_page');
	}

endif;

if (!function_exists('add_admin_message')) :

	/**
	 * Показывает текстовое сообщение в панели управления.
	 *
	 * @param string $message Текст сообщения.
	 * @param string $type Тип сообщения. Возможные значения: success, error, warning, info.
	 * @param boolean $dismissible Добавляет иконку-кнопку "закрыть".
	 */
	function add_admin_message($message, $type = 'success', $dismissible = false)
	{
		$classes = [
			'notice'
		];

		$classes[] = sprintf('notice-%s', $type);

		if ($dismissible) {
			$classes[] = 'is-dismissible';
		}

		add_action('admin_notices', function () use ($classes, $message) { ?>
            <div class="<?php echo implode(' ', $classes); ?>">
                <p><?php echo esc_html($message); ?></p>
            </div>
		<?php });
	}

endif;

if (!function_exists('is_login_page')) :

	/**
	 * Проверяет, находится ли пользователь на странице входа или регистрации.
	 *
	 * @return integer
	 */
	function is_login_page()
	{
		global $pagenow;

		return preg_match('/login\.php|register\.php/mui', $pagenow);
	}

endif;

if (!function_exists('add_ajax_handler')) :

	/**
	 * Добавляет обработчик AJAX запросов.
	 *
	 * @param string $action Действие.
	 * @param Closure $callback Функция-обработчик запроса.
	 * @param boolean $public Разрешить принимать AJAX запросы от неавторизованных пользователей.
	 */
	function add_ajax_handler($action, $callback, $public = true)
	{
		add_action('wp_ajax_' . $action, $callback);

		if ($public) {
			add_action('wp_ajax_nopriv_' . $action, $callback);
		}
	}

endif;

if (!function_exists('ajax_handler')) :

	/**
	 * Возвращает URL для AJAX запросов.
	 *
	 * @param string $action Действие.
	 * @return string
	 */
	function ajax_handler($action)
	{
		return add_query_arg(['action' => $action], admin_url('admin-ajax.php'));
	}

endif;


if (!function_exists('is_ajax')) :

	/**
	 * Проверяет, выполняется ли сейчас AJAX запрос.
	 *
	 * @return boolean
	 */
	function is_ajax()
	{
		$a = defined('DOING_AJAX') && DOING_AJAX;
		$b = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';

		if ($a || $b) {
			return true;
		}

		return false;
	}

endif;

if (!function_exists('get_current_url')) :

	/**
	 * Возвращает URL текущей страницы
	 *
	 * @return string
	 */
	function get_current_url()
	{
		global $wp;

		return home_url($wp->request);
	}

endif;

if (!function_exists('get_object_square')) :

	function get_object_square()
	{
		$context = sprintf('post_%d', get_the_ID());

		$attributes = get_field('attributes', $context);

		if (is_array($attributes) && count($attributes)) {

			$square = array_shift($attributes);

			return $square['value'];
		}

		return '&mdash;';
	}

endif;

if (!function_exists('get_object_material')) :

	function get_object_material()
	{
		$terms = wp_get_post_terms(get_the_ID(), 'material', []);

		if (is_array($terms) && count($terms)) {
			/** @var WP_Term $material */
			$material = array_shift($terms);

			return $material->name;
		}

		return '&mdash;';
	}

endif;

if (!function_exists('get_theme_name')) :

	/**
	 * Возвращает версию темы.
	 *
	 * @return string
	 */
	function get_theme_name()
	{
		return wp_get_theme()->get_template();
	}

endif;

if (!function_exists('get_theme_version')) :

	/**
	 * Возвращает версию темы.
	 *
	 * @return string
	 */
	function get_theme_version()
	{
		return wp_get_theme()->get('Version');
	}

endif;
