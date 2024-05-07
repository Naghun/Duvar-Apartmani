<?php
/**
 * Template Name: Blagaj Page Template
 *
 * Template for displaying a Blagaj page.
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
                <img src="<?php echo get_theme_file_uri('/src/images/blagaj-4.jpg'); ?>" alt="Naslovna slika" class="col-12">
            </div>
        </div>

        <div class="row"> <!-- .row -->
            <div class="front-page-small-footer col-12">
                <h3 class="col-8 d-flex justify-content-center align-items-center">PRONAĐITE MIR U ŠAPATIMA BUNE I DODRIMA PRIRODE</h3>
            </div>
        </div><!-- .row -->


		<div class="row">

            <div class="data col-12 d-flex justify-content-center align-items-center p-0 m-0">
        
                <div class="data-image col-3 d-flex justify-content-center align-items-center">
                    <img src="<?php echo get_theme_file_uri('/src/images/blagaj-tvrđava.jpg'); ?>" alt="slika kuce" class="col-12">
                </div>
                <div class="data-text col-9 p-2 d-flex flex-column justify-content-center align-items-center text-center">
                    <h3>Ponešto o Blagaju</h3>
                    <p class="col-12 text-justify">
                        Vrelo Bune se nalazi 12 kilometra od Mostara u mjestu Blagaj. 
                        Ovo područje je naseljeno od davnina zbog blizine važnih trgovačkih puteva. 
                        Pronađeni su ostaci iz prehistorijskog, ilirskog, rimskog, bizantskog i srednjovjekovnog perioda. 
                        I danas su vidljive zidine srednovjekovnog grada Stjepana Vukšića Kosače.
                    </p>
                    <p>
                        Izvor rijeke Bune ubraja se u jedan od najjačih krških vrela Europe, a iznad samog izvora moćno se nadvijaju stijene koje idu u visinu 240 metara. 
                        Sama rijeka Buna teče devet kilometara te se ulijeva u Neretvu u blizini sela Buna.
                    </p>
                    <p>
                        Već na prvi pogled je posve jasno zbog čega je ovo mjesto toliko popularno. 
                        Vrelo Bune prisijava se u raznim nijansama zelene i tirkizne boje, visoke stijene čuvaju ovu prirodu ljepotu, 
                        a blagajska Tekija pruža cijelom prostoru dozu mistike. Prizor kojeg nećeš tako lako zaboraviti.
                    </p>
                </div>
            </div>
        </div><!-- .row -->

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