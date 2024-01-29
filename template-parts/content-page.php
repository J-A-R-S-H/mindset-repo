<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
	</header><!-- .entry-header -->

	<?php fwd_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'fwd'),
				'after'  => '</div>',
			)
		);

		if (is_page(6)) {
			if (function_exists('get_field')) {

				if (get_field('contact_address')) {
					echo '<p>' . esc_html(get_field('contact_address')) . '</p>';
				}

				if (get_field('contact_email')) {
					echo '<p>' . esc_html(get_field('contact_email')) . '</p>';
				}
			}
		}

		$args = array(
			'post_type'      => 'fwd-service',
			'posts_per_page' => -1,
			"order" => "ASC",
			"orderby" => "title",
		);
		$query = new WP_Query($args);


		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();

				echo "<a href='#" . get_the_ID() . "'>";
				echo esc_html(get_the_title());
				echo "</a>";
			}
			wp_reset_postdata();
		}




		$args = array(
			'post_type'      => 'fwd-service',
			'posts_per_page' => -1,
			"order" => "ASC",
			"orderby" => "title",
		);
		$query = new WP_Query($args);


		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();


				if (function_exists('get_field')) {
					if (get_field('service_post')) {
						echo "<h2 id='" . get_the_ID()  . "'>" . esc_html(get_the_title()) . "</h2>";
						echo '<p>' . esc_html(get_field('service_post')) . '</p>';
					}
				}
			}
			wp_reset_postdata();
		}




		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php fwd_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->