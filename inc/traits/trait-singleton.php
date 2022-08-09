<?php

namespace QODESQUARE_THEME\Inc\Traits;

/**
 * Singleton trait
 */
trait Singleton
{
	protected function __construct()
	{
		# code...
	}

	/**
	 * Prevent object cloning
	 */
	protected function __clone()
	{
		# code...
	}

	/**
	 * Prevent object cloning
	 */
	final public static function get_instance()
	{
		/**
		 * Collection of instance
		 * 
		 * @var array
		 */
		static $instance = [];

		/**
		 * If this trait is implemented in a class
		 */
		$called_class = get_called_class();

		if (!isset($instance[$called_class])) {
			$instance[$called_class] = new $called_class();

			/**
			 * Dependent items can use the `qodesquare_theme_singleton_init_{$called_class}` hook to execute code
			 */
			do_action(sprintf('qodesquare_theme_singleton_init_%s', $called_class)); // phpcs:ignore WordPress.NamingConventions.ValidHookName.UseUnderscores
		}

		return $instance[$called_class];
	}
} //End trait