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

        <div class="reservation-header-container row d-flex flex-column">
            <div class="reservation-header d-flex justify-content-center align-items-center">
                <h1>Apartman Blagaj</h1>
            </div>
        </div>

        <?php
        session_start();
        $start_date = isset($_SESSION['start_date']) ? $_SESSION['start_date'] : "";
        $end_date = isset($_SESSION['end_date']) ? $_SESSION['end_date'] : "";
        ?>

        
        <div class="row front-page-reservation-container justify-content-center align-items-center">
            <form class="d-flex col-12 justify-content-around align-items-center">
                <h1 class="d-flex justify-content-center align-items-center">REZERVIŠITE SMJEŠTAJ U BLAGAJU</h1>
                <input type="text" placeholder="Prijava" class="input-field input-field-sign" id="calendar-start" autocomplete="off" value="<?php echo htmlspecialchars($start_date); ?>">
                <input type="text" placeholder="Odjava"  class="input-field" id="calendar-end" autocomplete="off" value="<?php echo htmlspecialchars($end_date); ?>">
                <button class="submit-button btn btn-dark" id="reservation-submit-real">Traži</button>
                <input type="hidden" name="action" value="reservation_form_action" id="action-input">
                <?php wp_nonce_field( 'reservation_form_nonce', 'reservation_form_nonce', true, true); ?>
            </form>
        </div>

        <?php get_template_part('global-templates/calendar-template'); ?>

		<div class="row d-flex justify-content-center align-items-center">
            <div class="reservation-container col-12 d-flex">
                <hr class="col-5">
                <div class="details col-2 d-flex justify-content-center align-items-center">Detalji Rezervacije</div>
                <hr class="col-5">
            </div>
        </div><!-- .row -->

        <div id="calendar-avalibility" class="row d-none calendar-avalibility">
            <div class="col-12 d-flex flex-column justify-content-center align-items-center">
                <h3 class="col-6 text-center avalibility-header">Dostupnost datuma</h3>
                <div class="date-checker" id="date-checker"></div>
                <button class="btn close-btn col-5" id="close-avalibility">Zatvori</button>
            </div>
        </div>    

		<div class="row d-flex justify-content-start align-items-start reservation-container-data">
            <div class="avalible-apartment col-12 d-flex flex-column justify-content-start align-items-center py-1 my-0">
                <div class="apartment-list d-flex justify-content-center align-items-center col-12 p-2">
                    <div class="col-6 p-2 d-flex flex-column justify-content-center align-items-center">
                        <img src="<?php echo get_theme_file_uri('/src/images/placeholder-1.jpg'); ?>" alt="apartman placeholder slika" class="col-12 my-2 d-flex" id="reservation-img">
                        <div class="col-12 reservation-details d-none justify-content-center align-items-center my-5" id="reservation-details">
                            <div class="col-6 d-flex flex-column justify-content-start align-items-start details-div">
                                <h3 class="details-text text-start col-12">Detalji:</h3>
                                <h3 class="details-text-title col-12 text-start">Apartman-Blagaj</h3>
                                <h5 class="nights-costs col-12 text-start"><span id="num-of-nights" class="num-of-nights"></span> noći - <span id="price-per-stay" class="price-per-stay"></span>KM <i class="far fa-money-bill-alt"></i></h5>
                            </div>
                            <div class="col-6 details-div-2">
                                <img src="<?php echo get_theme_file_uri('/src/images/placeholder-1.jpg'); ?>" alt="apartman placeholder slika" class="col-12">
                            </div>
                        </div>
                    </div>
                    <div class="col-6 p-2 d-flex flex-column justify-content-center align-items-center">
                        <h3 id="reservation-fetch">Potvrdite datume za rezervaciju</h3>
                        <button class="btn btn-success d-none" id="open-form">Rezerviši</button>
                        <button class="btn btn-danger d-none" id="open-avalibility">Provjeri Dostupnost</button>
                    </div>
                </div>
                <hr class="col-12 py-0">
                <div class="col-12 forma d-none flex-column justify-content-center align-items-center" id="form-container">
                    <h1>Unesite podatke</h1>
                    <form action="" class="col-12 d-flex flex-column justify-content-center align-items-center p-2" id="form-reservation">
                        <input type="text" placeholder="Ime" autocomplete="off" id="form-name">
                        <input type="text" placeholder="Prezime" autocomplete="off" id="form-surname">
                        <input type="email" placeholder="Email" autocomplete="off" id="form-email">
                        <input type="number" placeholder="Broj Telefona" autocomplete="off" id="form-phone">
                        <input type="textarea" placeholder="Adresa" autocomplete="off" id="form-adress">
                        <input type="text" placeholder="Broj Pasoša" autocomplete="off" id="form-passport">
                        <input type="number" placeholder="Broj Gostiju" autocomplete="off" id="form-number">
                        <input value="Naprijed na Plaćanje" class="btn btn-success" id="form-submit">
                        <button class="btn btn-danger" id="form-closer">Poništi <i class="fas fa-xmark"></i></button>
                    </form>
                </div>
            </div>
        </div><!-- .row -->

        <div class="notification row d-none justify-content-center align-items-center my-3" id="notification">
            <button class="notification-header btn btn-success col-8" id="notification-header"></button>
        </div>


    </div><!-- .container(-fluid) -->

</div><!-- #wrapper-footer -->

<?php
get_footer();

?>
