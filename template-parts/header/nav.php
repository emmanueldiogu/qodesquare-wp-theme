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
		<a class="navbar-brand mw-25" href="<?php bloginfo('url') ?>">
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
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#qodesquareHeaderMenu"
			aria-controls="qodesquareHeaderMenu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="qodesquareHeaderMenu">
			<?php
			wp_nav_menu([
				'menu' => 'header-menu',
				'container' => false,
				'menu_id' => false,
				'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0',
				// 'class' => '',
				'bootstrap' => true,
				'active_class' => 'active',
				'depth' => 3,
			]);
			?>
			<!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link" href="">
					</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown"
						aria-expanded="false">Link
					</a>
					<ul class="dropdown-menu">
						<li>
							<a class="dropdown-item" href="">
							</a>
						</li>
					</ul>
				</li>
			</ul> -->
			<form class="d-flex" role="search">
				<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success" type="submit">Search</button>
			</form>
		</div>
	</div>
</nav>