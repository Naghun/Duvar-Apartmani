<?php

/**
 * Template Name: Reservation Page Template
 * /css/custom-css/reservation.css
 * Template for displaying reservation page.
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


		<div class="row d-flex justify-content-center align-items-center m-0 p-0">
            <div class="reservation-container col-12 d-flex">
                <hr class="col-5">
                <div class="details col-2 d-flex justify-content-center align-items-center">Detalji Rezervacije</div>
                <hr class="col-5">
            </div>
        </div><!-- .row -->


		<div class="row d-flex justify-content-start align-items-start m-0 p-0">
            <div class="reservation-details col-3 d-flex flex-column justify-content-start align-items-start">
                <h3 class="col-12 d-flex justify-content-center p-3">Apartman Blagaj</h3>
                <div class="reservation-check-in p-2 m-o col-12">
                    <p>Prijava</p>
                    <p class="date col-12 d-flex justify-content-center align-items-center"><span class="col-4"><i class="far fa-calendar fs-5"></i> Saturday</span><span class="col-7">10.4.2024</span><i class="fas fa-caret-down col-1 fs-4"></i></p>
                </div>
                <div class="reservation-check-out p-2 m-o col-12">
                    <p>Odjava</p>
                    <p class="date col-12 d-flex justify-content-center align-items-center"><span class="col-4"><i class="far fa-calendar fs-5"></i> Saturday</span><span class="col-7">10.4.2024</span><i class="fas fa-caret-down col-1 fs-4"></i></p>
                </div>
                <div class="p-2">
                    <button class="btn btn-dark">Izmjeni Datum</button>
                </div>
                
            </div>
            <div class="avalible-apartment col-9 d-flex flex-column justify-content-start align-items-center">
                <h3 class="col-12 p-2 text-center">Dostupni Apartmani</h3>
                <div class="apartment-list d-flex justify-content-center align-items-center col-12 p-2">
                    <div class="col-6 p-2 d-flex flex-column justify-content-center align-items-center">
                        <img src="<?php echo get_theme_file_uri('/src/images/placeholder-1.jpg'); ?>" alt="apartman placeholder slika" class="col-12 my-2">
                        <button class="btn btn-dark col-4">Rezerviši</button>
                    </div>
                    <div class="col-6 p-2 d-flex flex-column justify-content-center align-items-center">
                        <img src="<?php echo get_theme_file_uri('/src/images/placeholder-1.jpg'); ?>" alt="apartman placeholder slika" class="col-12 my-2">
                        <button class="btn btn-dark col-6">Rezerviši</button>
                    </div>
                </div>
                <div>ovdje jos</div>
            </div>
        </div><!-- .row -->



    </div><!-- .container(-fluid) -->

</div><!-- #wrapper-footer -->

<?php
get_footer();

?>
