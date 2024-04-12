<?php
/**
 * Template Name: Home Page Template
 *
 * Template for displaying a landing page.
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

    <div class="row starter-front d-flex justify-content-center align-items-center">
        <div class="page-banner col-12 m-0 p-0">
            <img src="<?php echo get_theme_file_uri('/src/images/blagaj-smjestaj-apartman-naslovna.jpg'); ?>" alt="Naslovna slika" class="col-12">
        </div>
    </div>

        

        <!-- ======================================================== -->

		<div class="row d-flex justify-content-center align-items-center"><!-- .row -->
            <div class="front-page-reservation-container col-12 justify-content-center align-items-center">
                <form action="" class="d-flex col-12 justify-content-around align-items-center">
                    <h1 class="d-flex justify-content-center align-items-center">REZERVIŠITE SMJEŠTAJ U BLAGAJU</h1>
                    <input type="text" placeholder="Prijava" class="input-field input-field-sign" id="calendar-start" autocomplete="off">
                    <input type="text" placeholder="Odjava"  class="input-field" id="calendar-end" autocomplete="off">
                    <a class="submit-button btn btn-dark p-2 m-0" href="<?php echo esc_url(get_permalink(get_page_by_path('rezervacija'))); ?>">Traži</a>
                </form>
            </div>
        </div><!-- .row -->

        <!-- ======================================================== -->

        <!-- Calendar-container -->

        <div class="row d-flex justify-content-center align-items-center calendar-container"><!-- .row -->
            <div class="reservation-overlay d-none col-7 d-flex flex-column justify-content-center align-items-center" id="calendar-container">
                <div class="calendars d-flex">
                    <div class="calendar1 d-flex flex-column justify-content-center align-items-center">
                        <div class="header-calendar d-flex align-items-center justify-content-between">
                            <!-- header -->
                            <button class="prev">Prev</button>
                            <select class="month-input">
                                <option>Januar</option>
                                <option>Februar</option>
                                <option>Mart</option>
                                <option>April</option>
                                <option>Maj</option>
                                <option>Juni</option>
                                <option>Juli</option>
                                <option>August</option>
                                <option>Septembar</option>
                                <option>Oktobar</option>
                                <option>Novembar</option>
                                <option>Decembar</option>
                            </select>
                            <input type="number" class="year-input">
                            <button class="next">Next</button>
                        </div>
                        <div class="days p-3">
                            <span>Mon</span>
                            <span>Tue</span>
                            <span>Wed</span>
                            <span>Thu</span>
                            <span>Fri</span>
                            <span>Sat</span>
                            <span>Sun</span>
                        </div>
                            <!-- header -->
                        <div class="dates"></div>
                    </div>

                    <!-- drugi -->

                    <div class="calendar2 d-flex flex-column justify-content-center align-items-center">
                        <div class="header-calendar2 d-flex align-items-center justify-content-between">
                            <!-- header -->
                            <button class="prev2">Prev</button>
                            <select class="month-input2">
                                <option>Januar</option>
                                <option>Februar</option>
                                <option>Mart</option>
                                <option>April</option>
                                <option>Maj</option>
                                <option>Juni</option>
                                <option>Juli</option>
                                <option>August</option>
                                <option>Septembar</option>
                                <option>Oktobar</option>
                                <option>Novembar</option>
                                <option>Decembar</option>
                            </select>
                            <input type="number" class="year-input2">
                            <button class="next2">Next</button>
                        </div>
                        <div class="days2 p-3">
                            <span>Mon</span>
                            <span>Tue</span>
                            <span>Wed</span>
                            <span>Thu</span>
                            <span>Fri</span>
                            <span>Sat</span>
                            <span>Sun</span>
                        </div>
                            <!-- header -->
                        <div class="dates2"></div>
                    </div>
                </div>
                <div class="footer-calendar">
                    <button class="cancel" id="close-calendar">Otkaži</button>
                    <button class="apply" id="apply-calendar">Potvrdi</button>
                </div>
            </div>
        </div><!-- .row -->

        <!-- ======================================================== -->

		<div class="row front-page-data">

            <div class="data-1 col-12 d-flex justify-content-center align-items-start">
        
                <div class="data-image col-6 p-2">
                    <img src="<?php echo get_theme_file_uri('/src/images/kuca-slika-1.png'); ?>" alt="slika kuce">
                </div>
                <div class="data-text col-6 p-2">
                    <h3 class="h3-back">Apartman u blagaju</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Aut ipsum reiciendis quaerat eos ducimus, 
                        iure in exercitationem architecto praesentium beatae voluptatum laboriosam minima mollitia corporis corrupti tempore molestiae esse. 
                        Eveniet eligendi voluptatum temporibus, eum a mollitia odit molestias necessitatibus dicta! 
                        Placeat ducimus adipisci, 
                        quaerat magnam dolores perferendis! Amet, consectetur. Quam.
                    </p>
                    <a class="btn btn-dark data-text-button" href="<?php echo esc_url(get_permalink(get_page_by_path('apartman'))); ?>">Više Informacija</a>
                    
                </div>
            </div>
        </div><!-- .row -->

        <!-- ======================================================== -->

        <div class="row front-page-data"> <!-- .row -->
            <div class="data-2 col-12 d-flex justify-content-center align-items-start">
                <div class="data-text col-6 p-2">
                    <h3>Lokacija</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Aut ipsum reiciendis quaerat eos ducimus, 
                        iure in exercitationem architecto praesentium beatae voluptatum laboriosam minima mollitia corporis corrupti tempore molestiae esse. 
                        Eveniet eligendi voluptatum temporibus, eum a mollitia odit molestias necessitatibus dicta! 
                        Placeat ducimus adipisci, 
                        quaerat magnam dolores perferendis! Amet, consectetur. Quam.</p>
                    <a class="btn btn-dark data-text-button" href="<?php echo esc_url(get_permalink(get_page_by_path('lokacija'))); ?>">Više Informacija</a>
                </div>
                <div class="data-image col-6 p-2">
                    <img src="<?php echo get_theme_file_uri('/src/images/kuca-slika-2.jpg'); ?>" alt="slika kuce">
                </div>
            </div>
        </div> <!-- .row -->

        <!-- ======================================================== -->

		<?php get_template_part('global-templates/page-break-template'); ?>

        <!-- ======================================================== -->

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