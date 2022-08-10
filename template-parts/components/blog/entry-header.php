<?php

/**
 * Template for post entry header
 * 
 * @package QodeSquare
 */

$the_post_id = get_the_ID();
$has_post_thumbnail = get_the_post_thumbnail($the_post_id);
?>

<header class="entry-header">

	<?php
	// Featured image
	if ($has_post_thumbnail) {
	?>
	<div class="entry-image mb-3">
		<a title="<?php the_title(); ?>" href="<?php echo esc_url(get_permalink()); ?>">
			<?php the_post_custom_thumbnail(
					$the_post_id,
					'featured-thumbnail',
					[
						'sizes' => '(max-width: 416px) 416px, 312px',
						'class' => 'attachment-featured-image img-fluid'
					]
				) ?>
		</a>
	</div>
	<?php
	}
	?>

</header>