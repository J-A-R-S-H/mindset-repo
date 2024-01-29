<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php if (have_posts()) : ?>

		<header class="page-header">
			<h1 class="page-title">
				<?php
				single_term_title();
				?>
			</h1>
			<?php

			the_archive_description('<div class="archive-description">', '</div>');
			?>
		</header><!-- .page-header -->

		<?php
		/* Start the Loop */
		while (have_posts()) :
			the_post();

			/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
			get_template_part('template-parts/content', get_post_type());

		endwhile;

		the_posts_navigation();

	else :

		?>
		<article>
			<a href="<?php the_permalink(); ?>">
				<h2><?php the_title(); ?></h2>
				<?php the_post_thumbnail('large'); ?>
			</a>
		</article>

	<?php

	endif;
	?>

</main><!-- #primary -->

<?php
get_sidebar();
get_footer();
