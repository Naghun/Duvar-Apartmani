<?php
/**
 * The template for displaying the footer
 * /css/custom-css/footer.css
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?> m-auto">

		<div class="row d-flex justify-content-center align-items-center">

			<div class="col-md-12 row d-flex justify-content-center align-items-center">

				<footer class="col-12 d-flex justify-content-center align-items-center colophon" id="colophon">

					<div class="socials col-3">
						<img src="<?php echo get_stylesheet_directory_uri() . '/src/images/facebook.svg'; ?>" alt="facebook ikona">
						<img src="<?php echo get_stylesheet_directory_uri() . '/src/images/instagram.svg'; ?>" alt="instagram ikona">
						<img src="<?php echo get_stylesheet_directory_uri() . '/src/images/airbnb.svg'; ?>" alt="airbnb ikona">
						<img src="<?php echo get_stylesheet_directory_uri() . '/src/images/booking.svg'; ?>" alt="booking ikona">
					</div>
					
					<div class="line-break"></div>

					<div class="footer-nav-container col-6 m-2">

						<?php
						if (has_nav_menu('footer-menu')) {
							wp_nav_menu(array(
								'theme_location' => 'footer-menu',
								'menu_class' => 'footer-menu col-12 m-0 p-0',
								'container' => false,
							));
						} else {
						}
						?>

					</div>

					<div class="line-break"></div>

					<p class="dizajn col-3 p-2 m-auto"><span>Dizajn i programiranje: </span><a href="https://indat.ba/">Indat.ba</a></p>

				</footer><!-- #colophon -->

			</div><!-- col -->

		</div><!-- .row -->

	</div><!-- .container(-fluid) -->

</div><!-- #wrapper-footer -->

<?php // Closing div#page from header.php. ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>

