<?php

/**
 * Enqueue Theme Assets
 * 
 * @package QodeSquare
 */

namespace QODESQUARE_THEME\Inc;

use QODESQUARE_THEME\Inc\Traits\Singleton;

class Menus
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
		add_action('init', [$this, 'register_menus']);
		add_filter('nav_menu_css_class', [$this, 'filter_bs_nav_menu_css_class'], 10, 3);
		add_filter('nav_menu_link_attributes', [$this, 'filter_bootstrap_nav_menu_link_attributes'], 10, 4);
		add_filter('nav_menu_submenu_css_class', [$this, 'filter_bootstrap_nav_menu_submenu_css_class'], 10, 3);
	}

	public function register_menus()
	{
		register_nav_menus([
			'header-menu' => esc_html__('Header Menu', 'qodesquare'),
			'footer-menu' => esc_html__('Footer Menu', 'qodesquare'),
		]);
	}

	/**
	 * Add bootstrap classes to individual menu list items
	 */
	public function filter_bs_nav_menu_css_class($classes, $item, $args)
	{
		if (isset($args->bootstrap)) {
			$classes[] = 'nav-item';

			if (in_array('menu-item-has-children', $classes)) {
				$classes[] = 'dropdown';
			}

			if (in_array('dropdown-header', $classes)) {
				unset($classes[array_search('dropdown-header', $classes)]);
			}

			if (isset($args->active_class) && in_array('menu-item-has-children', $classes)) {
				$classes[] = $args->active_class;
			}
		}
		return $classes;
	}

	/**
	 * Add bootstrap attributes to individual link elements.
	 */
	public function filter_bootstrap_nav_menu_link_attributes($atts, $item, $args, $depth)
	{
		if (isset($args->bootstrap)) {

			// if (!$atts['class']) {
			$atts['class'] = '';
			// }

			if ($depth > 0) {
				if (in_array('dropdown-header', $item->classes)) {
					$atts['class'] = 'dropdown-header';
				} else {
					$atts['class'] .= 'dropdown-item';
				}

				if ($item->description) {
					$atts['class'] .= ' has-description';
				}
			} else {
				$atts['class'] .= 'nav-link';
				if ($atts['aria-current']) {
					$atts['class'] .= ' active';
				}

				if (in_array('menu-item-has-children', $item->classes)) {
					$atts['class'] .= ' dropdown-toggle';
					$atts['role'] = 'button';
					$atts['data-bs-toggle'] = 'dropdown';
					$atts['aria-expanded'] = 'false';
				}
			}
		}
		return $atts;
	}

	/**
	 * Add Bootstrap classes to dropdown menus
	 */
	public function filter_bootstrap_nav_menu_submenu_css_class($classes, $args, $depth)
	{
		if (isset($args->bootstrap)) {
			$classes[] = 'dropdown-menu';
			// echo '<pre>';
			// print_r($args);
			// wp_die();
		}
		return $classes;
	}

	public function get_menu_id($location)
	{
		// Get all the locations.
		$locations = get_nav_menu_locations();

		// Get object id by location
		$menu_id = $locations[$location];

		return !empty($menu_id) ? $menu_id : '';
	}

	public function get_child_menu_items($menu_array, $parent_id)
	{
		$child_menus = [];

		if (!empty($menu_array) && is_array($menu_array)) {
			foreach ($menu_array as $menu) {
				if (intval($menu->menu_item_parent) === $parent_id) {
					array_push($child_menus, $menu);
				}
			}
		}

		return $child_menus;
	}
}