<?php
/*
 * Template Name: Apartman
 * /css/custom-css/apartman.css
 * Template for displaying apartman page.
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?> m-auto">

		<div class="row d-flex justify-content-center align-items-center starter"> <!-- .row -->

            <div class="page-banner col-12 m-0 p-0">
                <img src="<?php echo get_theme_file_uri('/src/images/apartman-naslovna.jpg'); ?>" alt="Naslovna slika" class="col-12">
            </div>

        </div> <!-- .row -->

        <div class="row"> <!-- .row -->
            <div class="front-page-small-footer col-12">
                <h3 class="col-8 d-flex justify-content-center align-items-center">PRONAĐITE SVOJ MIR I SMJEŠTAJ U BLIZINI TEKIJE U BLAGAJU</h3>
                <button class="col-2 btn btn-dark">Rezervacija</button>
            </div>
        </div><!-- .row -->

        
        <div class="row">
            <?php
            $apartman_posts = new WP_Query(array(
                'post_type' => 'apartman',
                'posts_per_page' => -1,
            ));
            if ($apartman_posts->have_posts()) :
                while ($apartman_posts->have_posts()) : $apartman_posts->the_post();
            ?>
                    <div class="apartman col-12 d-flex justify-content-start align-items-center">
                        <div class="apartman-image col-4 d-flex justify-content-start align-items-start">
                            <img src="<?php echo get_theme_file_uri('/src/images/placeholder-1.jpg'); ?>" alt="apartman placeholder slika" class="col-12">
                        </div>
                        <div class="apartman-data col-8 d-flex flex-column justify-content-start align-items-start">
                            <div class="apartman-data-header col-12 d-flex justify-content-center align-items-center">
                                <h2 class=""><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <div class="rating d-flex justify-content-center align-self-center fs-5"><span>9.0</span> <i class="fas fa-thumbs-up align-self-center"></i></div>
                            </div>
                            <hr class="col-12">
                            <div class="apartman-data-body d-flex col-12">
                                <div class="body-left col-10 d-flex flex-column justify-content-start align-items-start g-2">
                                    <p class="text-center">Kvadratura: <?php echo get_field('kvadratura'); ?></p>
                                    <p class="text-center">Dodatna Oprema: <?php echo get_field('dodatna_oprema'); ?></p>
                                </div>
                                <div class="body-right col-2 d-flex flex-column align-items-end justify-content-end">
                                    <p class="calculation">2 Nights</p>
                                    <p class="text-center align-self-bottom">Cijena: <?php echo get_field('cijena'); ?>KM</p>
                                </div>

                            </div>
                            <div class="apartman-data-footer col-12 d-flex justify-content-end align-items-center">
                                <button class="btn btn-dark p-2 fs-4">Pogledaj Dostupnost</button>
                            </div>

                            
                        </div>

                    </div>
            <?php
                endwhile;
            endif;
            wp_reset_postdata(); // Resetujemo query kako ne bi uticao na ostatak stranice
            ?>
        </div>

    </div><!-- .container(-fluid) -->

</div><!-- #wrapper-footer -->

<?php
get_footer();

?>