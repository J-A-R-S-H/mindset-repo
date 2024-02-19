<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FWD_Starter_Theme
 */

?>

<footer id="colophon" class="site-footer">
	<div class="footer-contact">
		<?php
		if (!is_page(6)) {
			if (function_exists('get_field')) {

				if (get_field('contact_address', 6)) {
					echo "<div class='footer-contact-left'>";
					get_template_part("images/map");
					echo '<p>' . esc_html(get_field('contact_address', 6)) . '</p>';
					echo "</div>";
				}


				if (get_field('contact_email', 6)) {
					echo "<div class='footer-contact-right'>";

					get_template_part("images/email");

					echo '<p>' . esc_html(get_field('contact_email', 6)) . '</p>';

					echo "</div>";
				}
			}
		}
		?>

	</div><!-- .footer-contact -->
	<div class="footer-menus">

		<nav class="footer-navigation">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer-left',
				)
			);
			?>
		</nav>
		<nav class="social-navigation">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer-right',
				)
			);
			?>
		</nav>



	</div><!-- .footer-menus -->
	<div class="site-info">
		<?php
		the_privacy_policy_link()
		?>
		<br>
		<?php esc_html_e('Created by ', 'fwd'); ?><a href="<?php echo esc_url(__('https://wp.bcitwebdeveloper.ca/', 'fwd')); ?>"><?php esc_html_e('Johnathon S', 'fwd'); ?></a>

	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>