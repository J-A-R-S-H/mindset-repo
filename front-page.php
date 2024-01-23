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

			<?php the_post_thumbnail("large")  ?>
		</section>

		<section class="home-work"></section>

		<section class="home-work"></section>

		<section class="home-left"></section>

		<section class="home-right"></section>

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
