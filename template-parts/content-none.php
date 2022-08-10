<?php

/**
 * The template part for displaying a message that post cannot be found
 * 
 * @package QodeSquare
 */

?>

<section class="no-result not-found">
	<div class="page-hero">
		<h1 class="page-title"><?php esc_html_e('Nothing Found', 'qodesquare'); ?></h1>
	</div>
	<div class="page-content">
		<?php
		if (is_home() && current_user_can('publish_posts')) { ?>
		<p>
			<?php printf(
					wp_kses(
						__('Ready to publish your first post? <a href="%s">Get started here</a>', 'qodesquare'),
						[
							'a' => [
								'href' => []
							]
						]
					),
					esc_url(admin_url('post-new.php'))
				); ?>
		</p>
		<?php
		} elseif (is_search()) {
		?>
		<p><?php esc_html_e('Sorry, but nothinng matched your search item. Please try again with another keyword') ?>
		</p>
		<?php
			get_search_form();
		} else {
		?>
		<p><?php esc_html_e('We can\'t find what you are looking for. Please try searching') ?>
		</p>
		<?php
			get_search_form();
		}
		?>
	</div>
</section>