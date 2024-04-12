<?php

/**
 * Template Name: Location Page Template
 * /css/custom-css/location.css
 * Template for displaying contact page.
 *
 * @package Understrap
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?> m-auto">

		<div class="row location-start d-flex justify-content-center align-items-center">
            <iframe class="open-street-map col-12"
                src="https://www.openstreetmap.org/export/embed.html?bbox=17.897989153862003%2C43.25460757492684%2C17.90334284305573%2C43.25690874900935&amp;layer=mapnik&amp;marker=43.255758172838036%2C17.900665998458862"
                loading="lazy">
            </iframe>
            <small><a href="https://www.openstreetmap.org/?mlat=43.25576&amp;mlon=17.90067#map=18/43.25576/17.90067">
                Otvori veću kartu</a>
            </small>
		</div><!-- .row -->

        <div class="row d-flex justify-content-center align-items-center"><!-- .row -->
            <div class="front-page-reservation-container col-12 d-flex justify-content-center align-items-center">
                <h1>U slučaju potrebe slobodno da nas kontaktirate</h1>
            </div>
        </div><!-- .row -->

        <div class="row d-flex justify-content-center align-items-center"><!-- .row -->
            <div class="front-page-reservation-container col-12 justify-content-center align-items-center">
                <form action="" class="d-flex col-12 justify-content-around align-items-center">
                    <h1 class="d-flex justify-content-center align-items-center">REZERVIŠITE SMJEŠTAJ U BLAGAJU</h1>
                    <input type="text" placeholder="Prijava" class="input-field input-field-sign" id="calendar-start" autocomplete="off">
                    <input type="text" placeholder="Odjava"  class="input-field" id="calendar-end" autocomplete="off">
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('rezervacija'))); ?>" class="submit-button btn btn-dark">Traži</a>
                </form>
            </div>
        </div><!-- .row -->

        <?php get_template_part('global-templates/calendar-template'); ?>

        <div class="row front-page-data-2"> <!-- .row -->
            <div class="col-12 d-flex flex-column justify-content-center align-items-start p-0">
                <div class="data-images col-12 d-flex justify-content-between align-items-center">
                    <img src="<?php echo get_theme_file_uri('/src/images/blagaj-1.jpg'); ?>" alt="blagaj slika">
                    <img src="<?php echo get_theme_file_uri('/src/images/blagaj-2.jpg'); ?>" alt="blagaj slika">
                    <img src="<?php echo get_theme_file_uri('/src/images/blagaj-1.jpg'); ?>" alt="blagaj slika">
                </div>
                <div class="data-text col-12 p-2">
                    <?php get_template_part('global-templates/text-template'); ?>
                </div>
            </div>
        </div> <!-- .row -->

	</div><!-- .container(-fluid) -->
</div><!-- #wrapper-footer -->

<?php
get_footer();

?>