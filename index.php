<?php

/**
 * Main template file.
 * 
 * @package QodeSquare
 */

get_header();
?>

<div class="primary">
	<main class="site-main" id="main" role="main">
		<?php
		if (have_posts()) :
		?>
		<div class="container">
			<?php
				if (is_home() && !is_front_page()) :
				?>

			<div class="hero text-center">
				<h1><?php single_post_title(); ?></h1>
			</div>
			<?php
				endif; ?>

			<div class="row">
				<?php
					$index = 0;
					$no_of_columns = 3;

					// Case index = 0
					// Start the loop
					while (have_posts()) : the_post();
						if (0 === $index % $no_of_columns) {
					?>
				<div class="col-lg-4 col-md-6 col-sm-12">
					<?php
						}
						get_template_part('template-parts/content');
						$index++;
						// Index value = 1
						if (0 !== $index && 0 === $index % $no_of_columns) {
							?>
				</div>
				<?php
						}
					endwhile;
					?>
			</div>

		</div>
		<?php
		else :
			get_template_part('template-parts/content-none');
		endif;

		?>
	</main>
</div>

<?php get_footer();