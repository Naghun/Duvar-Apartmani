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

		<div class="row d-flex justify-content-center align-items-center starter">

            <div class="page-banner col-12 m-0 p-0">
            <img src="<?php echo get_theme_file_uri('/src/images/blagaj-smjestaj-apartman-naslovna.jpg'); ?>" alt="Naslovna slika" class="col-12"></div>

        </div><!-- .row -->

        <!-- ======================================================== -->

		<div class="row d-flex justify-content-center align-items-center"><!-- .row -->
            <div class="front-page-reservation-container col-12 justify-content-center align-items-center">
                <form action="" class="d-flex col-12 justify-content-around align-items-center">
                    <h1 class="d-flex justify-content-center align-items-center">REZERVIŠITE SMJEŠTAJ U BLAGAJU</h1>
                    <input type="text" placeholder="Prijava" class="input-field">
                    <input type="text" placeholder="Odjava"  class="input-field">
                    <input type="submit" value="Traži" class="submit-button btn btn-dark">
                </form>
            </div>
        </div><!-- .row -->

        <!-- ======================================================== -->

        <div class="row d-flex justify-content-center align-items-center"><!-- .row -->
            <div class="reservation-overlay col-12 justify-content-center align-items-center">
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
                    <button class="btn btn-dark">Više informacija</button>
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
                    <button class="btn btn-dark">Više informacija</button>
                </div>
                <div class="data-image col-6 p-2">
                    <img src="<?php echo get_theme_file_uri('/src/images/kuca-slika-2.jpg'); ?>" alt="slika kuce">
                </div>
            </div>
        </div> <!-- .row -->

        <!-- ======================================================== -->

		<div class="row"> <!-- .row -->
            <div class="front-page-small-footer col-12">
                <h3 class="col-8 d-flex justify-content-center align-items-center">PRONAĐITE SVOJ MIR I SMJEŠTAJ U BLIZINI TEKIJE U BLAGAJU</h3>
                <button class="col-2 btn btn-dark">Rezervacija</button>
            </div>
        </div><!-- .row -->

        <!-- ======================================================== -->

        <div class="row front-page-data-2"> <!-- .row -->
            <div class="col-12 d-flex flex-column justify-content-center align-items-start p-0">
                <div class="data-images col-12 d-flex justify-content-between align-items-center">
                    <img src="<?php echo get_theme_file_uri('/src/images/blagaj-1.jpg'); ?>" alt="blagaj slika">
                    <img src="<?php echo get_theme_file_uri('/src/images/blagaj-2.jpg'); ?>" alt="blagaj slika">
                    <img src="<?php echo get_theme_file_uri('/src/images/blagaj-1.jpg'); ?>" alt="blagaj slika">
                </div>
                <div class="data-text col-12 p-2">
                    <p>Blagaj ili BLAGI GAJ 
                    - Etimologija imena ovog pitoresnog gradića na smaragdnoj rijeci Buni govori dovoljno sama za sebe. Blagaj je oaza svježine u hercegovačkom kršu u 
                    koji se dolazi zbog njegove ljepote, očaravajuće prirode i povijesti po kojoj hodate. 
                    Gradić koji se na bajkovit način isprepliću povijest i neponovljivi prirodni ambijent, 
                    magično je privlačan za turiste koji pored odmora i dobrog zalogaja uz šum i svježinu bistre rijeke žele upoznati kulturu i običaje koji ovdje čak sezu 5 hiljada godina prije 
                    Hrista. O tome svjedoči prahistorijsko naselje Zelena pećina koja se nalazi na visokoj klisuri iznad vrela Bune zbog čega je pristup ovog lokaliteta veoma težak.

                    Zelena pećina je otkrivena 1955. godine i u njoj je pronađeno keramičko posuđe inpreso stila tipično za razdoblje Neolita. Proglašena je palentološkim spomenikom 
                    prirode i arheološko područje Zelene pećine svrstana je u nacionalne spomenike BiH. Povijesno nasljeđe Blagaja je veoma bogato što dokazuje čak 11 zaštićenih 
                    kulturno povijesnih spomenika teško da se može negdje naći ovako mali gradić sa svega 3000 stanovnika s većom i raznovrsnijom riznicom. 
                    </p>
                </div>
            </div>
        </div> <!-- .row -->

    </div><!-- .container(-fluid) -->

</div><!-- #wrapper-footer -->

<?php
get_footer();

?>