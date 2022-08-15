<?php

/**
 * Single post.
 * 
 * @package QodeSquare
 */

get_header();
?>


<div class="container">
	<?php
	if (have_posts()) :
		while (have_posts()) : the_post();
	?>
	<?php the_post_thumbnail('medium') ?>
	<h2><?php the_title(); ?></h2>
	<div><?php the_content(); ?></div>
	<?php
		endwhile;
	endif;
	?>
</div>

<?php get_footer();