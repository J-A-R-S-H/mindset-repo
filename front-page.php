<?php

/**
 * The template for displaying the front page		
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php
	while (have_posts()) :
		the_post();

		// get_template_part('template-parts/content', 'page');
	?>
		<section class="home-intro">

			<?php the_post_thumbnail("large");

			if (function_exists('get_field')) {
				if (get_field('top_section')) {
					the_field('top_section');
				}
			}

			?>

		</section>

		<section class="home-work">
			<h2>Featured Works</h2>
			<?php
			$args = array(
				'post_type'      => 'fwd-work',
				'posts_per_page' => 4,
			);
			$query = new WP_Query($args);

			if ($query->have_posts()) {
				while ($query->have_posts()) {
					$query->the_post();
			?>
					<article>
						<a href="<?php the_permalink(); ?>">
							<h3><?php the_title(); ?></h3>
							<?php the_post_thumbnail('medium'); ?>
						</a>
						<?php the_excerpt(); ?>
					</article>
			<?php
				}
			}
			?>
		</section>

		<section class="home-work"></section>

		<section class="home-left">

			<?php
			if (function_exists('get_field')) {

				if (get_field('left_section_title')) {
					echo '<h2>';
					the_field('left_section_title');
					echo '</h2>';
				}

				if (get_field('left_section_text')) {
					echo '<p>';
					the_field('left_section_text');
					echo '</p>';
				}
			}


			?>

		</section>

		<section class="home-right">

			<?php
			if (function_exists('get_field')) {

				if (get_field('right_section_title')) {
					echo '<h2>';
					the_field('right_section_title');
					echo '</h2>';
				}

				if (get_field('right_section_text')) {
					echo '<p>';
					the_field('right_section_text');
					echo '</p>';
				}
			}


			?>

		</section>

		<section class="home-slider"></section>

		<section class="home-blog"></section>
		<h2><?php esc_html_e("Latest Blog Posts", "fwd") ?></h2>
		<?php

		$args = array(
			"post_type" => "post",
			"posts_per_page" => 4
		);
		$blog_query = new WP_Query($args);
		if ($blog_query->have_posts()) {
			while ($blog_query->have_posts()) {
				$blog_query->the_post();
		?>

				<article>
					<a class="post-thumbnail" href="<?php the_permalink(); ?>">
						<?php
						the_post_thumbnail("landscape-blog-featured")
						?>
					</a>

					<a href="<?php the_permalink(); ?>">
						<h3><?php the_title() ?></h3>
					</a>
					<?php
					fwd_posted_on()
					?>


				</article>
		<?php
			}
		}

		?>


	<?php

	endwhile; // End of the loop.
	?>

</main><!-- #primary -->

<?php
get_sidebar();
get_footer();
