<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FWD_Starter_Theme
 */

if (!is_active_sidebar('sidebar-1')) {
	return;
}



?>

<aside id="secondary" class="widget-area">
	<?php
	if (is_page_template()) {
		dynamic_sidebar('sidebar-2');
	} else {
		dynamic_sidebar('sidebar-1');
	}


	?>
	<?php
	$terms = get_terms(
		array(
			'taxonomy' => 'fwd-work-category',
		)
	);
	if ($terms && !is_wp_error($terms)) : ?>
		<section>
			<h2><?php esc_html_e('See Our Work', 'fwd'); ?></h2>
			<ul>
				<?php foreach ($terms as $term) : ?>
					<li><a href="<?php echo get_term_link($term); ?>"><?php echo esc_html($term->name); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</section>
	<?php endif; ?>

	<?php get_template_part('template-parts/testimonial-randomizer'); ?>

</aside>

<!-- #secondary -->