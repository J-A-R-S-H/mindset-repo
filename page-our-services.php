<?php

/**
 * The template for displaying all pages
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

		get_template_part('template-parts/content', 'page');



	endwhile; // End of the loop.
	?>

	<?php


	$args = array(
		'post_type'      => 'fwd-service',
		'posts_per_page' => -1,
		"order" => "ASC",
		"orderby" => "title",
	);
	$query = new WP_Query($args);

	echo "<nav class='service-links'>";
	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();

			echo "<a href='#" . get_the_ID() . "'>";
			echo esc_html(get_the_title());
			echo "</a>";
		}
		wp_reset_postdata();
	}
	echo "</nav>";

	$terms = get_terms(
		array(
			'taxonomy' => 'fwd-service-types',
		)
	);
	if ($terms && !is_wp_error($terms)) {


		foreach ($terms as $term) {
			echo '<h2>' . esc_html($term->name) . '</h2>';

			$args = array(
				'post_type'      => 'fwd-service',
				'posts_per_page' => -1,
				"order" => "ASC",
				"orderby" => "title",
				'tax_query'      => array(
					array(
						'taxonomy' => 'fwd-service-types',
						'field'    => 'slug',
						'terms'    => $term->slug,
					),
				),
			);
			$query = new WP_Query($args);


			if ($query->have_posts()) {
				while ($query->have_posts()) {
					$query->the_post();


					if (function_exists('get_field')) {
						if (get_field('service_post')) {
							echo "<h3 id='" . get_the_ID()  . "'>" . esc_html(get_the_title()) . "</h3>";
							echo '<p>' . esc_html(get_field('service_post')) . '</p>';
						}
					}
				} // while loop
				wp_reset_postdata();
			}

			// Use $term->slug in your tax_query
			// Use $term->name to organize the posts
		} //for each
	}
	?>



</main><!-- #primary -->

<?php
get_sidebar();
get_footer();
