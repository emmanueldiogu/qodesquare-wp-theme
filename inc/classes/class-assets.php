<?php

/**
 * Enqueue Theme Assets
 * 
 * @package QodeSquare
 */

namespace QODESQUARE_THEME\Inc;

use QODESQUARE_THEME\Inc\Traits\Singleton;

class Assets
{
	use Singleton;

	protected function __construct()
	{
		// load classes
		$this->setup_hooks();
	}

	protected function setup_hooks()
	{
		/**
		 * Actions
		 */
		add_action('wp_enqueue_scripts', [$this, 'register_styles']);
		add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
	}

	public function register_styles()
	{
		// Register Styles
		wp_register_style('bootstrap-css', QODESQUARE_DIR_URI . '/assets/vendor/bootstrap/css/bootstrap.min.css', [], false, 'all');
		wp_register_style('stylesheet', get_stylesheet_uri(), [], filemtime(QODESQUARE_DIR_PATH . '/style.css'), 'all');

		// Enqueue Styles
		wp_enqueue_style('bootstrap-css');
		wp_enqueue_style('stylesheet');
	}

	public function register_scripts()
	{
		// Register Scripts
		wp_register_script('bootstrap-js', QODESQUARE_DIR_URI . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', [], false, true);
		wp_register_script('main-js', QODESQUARE_DIR_URI . '/assets/js/main.js', [], filemtime(QODESQUARE_DIR_PATH . '/assets/js/main.js'), true);

		// Enqueue Scripts
		wp_enqueue_script('jquery');
		wp_enqueue_script('bootstrap-js');
		wp_enqueue_script('main-js');
	}
}