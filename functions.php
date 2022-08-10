<?php

/**
 * Theme Functions.
 * 
 * @package QodeSquare
 */


if (!defined('QODESQUARE_DIR_PATH')) {
	define('QODESQUARE_DIR_PATH', untrailingslashit(get_template_directory()));
}

if (!defined('QODESQUARE_DIR_URI')) {
	define('QODESQUARE_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

require_once QODESQUARE_DIR_PATH . '/inc/helpers/autoloader.php';
require_once QODESQUARE_DIR_PATH . '/inc/helpers/template-tags.php';

function qodesquare_get_theme_instance()
{
	\QODESQUARE_THEME\Inc\QODESQUARE_THEME::get_instance();
}

qodesquare_get_theme_instance();