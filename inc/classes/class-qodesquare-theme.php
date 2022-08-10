<?php

/**
 * Bootstraps the Theme.
 * 
 * @package Qodesquare
 */

namespace QODESQUARE_THEME\Inc;

use QODESQUARE_THEME\Inc\Traits\Singleton;

class QODESQUARE_THEME
{
	use Singleton;

	protected function __construct()
	{
		// Load classes
		Assets::get_instance();
		Menus::get_instance();
		$this->setup_hooks();
	}

	protected function setup_hooks()
	{
		/**
		 * Actions
		 */
		add_action('after_setup_theme', [$this, 'setup_theme']);
	}

	public function setup_theme()
	{

		add_theme_support('title-tag');

		add_theme_support('custom-logo', [
			'header-text' => ['site-title', 'site-description'],
			'height' => 100,
			'width' => 400,
			'flex-height' => true,
			'flex-width' => true,
		]);

		add_theme_support('custom-background', [
			'default-color' => '#fff',
			'default-image' => '',
			'default-repeat' => 'repeat',
		]);

		/**
		 * Enable support for Post Thumbnails on posts and pages.
		 * 
		 * Adding this will allow you to select the featured image on posts and pages.
		 * 
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		/**
		 * Register image sizes
		 */
		add_image_size('featured-thumbnail', 416, 312, true);

		add_theme_support('customize-selective-refresh-widgets');

		add_theme_support('automatic-feed-links');

		add_theme_support('html5', [
			'search-form',
			'comment-list',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		]);

		add_editor_style();
		add_theme_support('wp-block-style');

		add_theme_support('align-wide');

		global $content_width;
		if (!isset($content_width)) {
			$content_width = 1240;
		}
	}
}