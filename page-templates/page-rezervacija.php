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


		<div class="row d-flex justify-content-start align-items-start m-0 p-0 reservation-container-data">
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
            <div class="avalible-apartment col-9 d-flex flex-column justify-content-start align-items-center py-1 my-0">
                <div class="apartment-list d-flex justify-content-center align-items-center col-12 p-2">
                    <div class="col-6 p-2 d-flex flex-column justify-content-center align-items-center">
                        <img src="<?php echo get_theme_file_uri('/src/images/placeholder-1.jpg'); ?>" alt="apartman placeholder slika" class="col-12 my-2">
                    </div>
                    <div class="col-6 p-2 d-flex flex-column justify-content-center align-items-center">
                        <h3>Odabrani Datumi su dostupni</h3>
                        <button class="btn btn-success" id="open-form">Rezerviši</button>
                    </div>
                </div>
                <hr class="col-12 py-0">
                <div class="col-12 forma d-none flex-column justify-content-center align-items-center" id="form-container">
                    <h1>Unesite svoje podatke</h1>
                    <form action="" class="col-12 d-flex flex-column justify-content-center align-items-center p-2">
                        <input type="text" placeholder="Ime i Prezime" autocomplete="off">
                        <input type="email" placeholder="Email" autocomplete="off">
                        <input type="textarea" placeholder="Adresa" autocomplete="off">
                        <input type="text" placeholder="Broj Pasoša" autocomplete="off">
                        <input type="submit" value="Naprijed na Plaćanje" class="btn btn-success" id="form-submit">
                        <button class="btn btn-danger" id="form-closer">Poništi <i class="fas fa-xmark"></i></button>
                    </form>
                </div>
            </div>
        </div><!-- .row -->




    </div><!-- .container(-fluid) -->

</div><!-- #wrapper-footer -->

<?php
get_footer();

?>
