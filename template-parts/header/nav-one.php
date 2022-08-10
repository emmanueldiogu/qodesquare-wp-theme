<?php

/**
 * Header Navigation template
 * 
 * @package Qodesquare
 */

use QODESQUARE_THEME\Inc\Menus;

$menu_class = Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id('header-header-menu');
$header_menus = wp_get_nav_menu_items($header_menu_id);
?>

<nav class="navbar navbar-expand-lg bg-light">
	<div class="container">
		<a class="navbar-brand mw-25" href="#">
			<?php
			$custom_logo_id = get_theme_mod('custom_logo');
			$logo = wp_get_attachment_image_src($custom_logo_id, 'full');

			if (has_custom_logo()) {
				echo '<img height="36" src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">';
			} else {
				echo 'Navbar';
			}
			?>
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<?php
			if (!empty($header_menus) && is_array($header_menus)) : ?>
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<?php
					foreach ($header_menus as $menu_item) :
						if (!$menu_item->menu_item_parent) :
							$child_menu_items = $menu_class->get_child_menu_items($header_menus, $menu_item->ID);
							$has_children = !empty($child_menu_items) && is_array($child_menu_items);

							if (!$has_children) : ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo esc_url($menu_item->url); ?>">
						<?php echo esc_html($menu_item->title); ?>
					</a>
				</li>
				<?php
							else : ?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="<?php echo esc_url($menu_item->url); ?>" role="button"
						data-bs-toggle="dropdown" aria-expanded="false">
						<?php echo esc_html($menu_item->title); ?>
					</a>
					<ul class="dropdown-menu">
						<?php foreach ($child_menu_items as $child_menu_item) : ?>
						<li>
							<a class="dropdown-item" href="<?php echo esc_url($child_menu_item->url); ?>">
								<?php echo esc_html($child_menu_item->title); ?>
							</a>
						</li>
						<?php endforeach; ?>
					</ul>
				</li>
				<?php
							endif;
						endif;
					endforeach;
					?>
			</ul>
			<?php endif; ?>
			<form class="d-flex" role="search">
				<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success" type="submit">Search</button>
			</form>
		</div>
	</div>
</nav>