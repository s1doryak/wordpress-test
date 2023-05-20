<?php

if (!defined('ABSPATH')) {
    exit;
}

require_once(__DIR__ . '/pluggable.php');

if (!is_acf_enabled()) {

	if (is_admin() || is_login_page()) {
		add_admin_message(__('Необходимо активировать плагин Advanced Custom Fields PRO'), 'error');
	} else {
		wp_die(__('Необходимо активировать плагин Advanced Custom Fields PRO'));
	}

	return;
}

require_once(__DIR__ . '/cpt.php');
require_once(__DIR__ . '/hooks.php');
