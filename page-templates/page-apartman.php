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
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('rezervacija'))); ?>" class="col-2 btn btn-dark">Rezervacija</a>
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
                    <div class="apartman col-12 d-flex justify-content-start align-items-start p-2">
                        <div class="apartman-image col-5 d-flex justify-content-start align-items-start">
                            <img src="<?php echo get_theme_file_uri('/src/images/kuca-slika-2.jpg'); ?>" alt="apartman placeholder slika" class="col-12">
                        </div>
                        <div class="apartman-data col-7 d-flex flex-column justify-content-between align-items-between">
                            <div class="apartman-data-header col-12 d-flex justify-content-center align-items-center py-3   ">
                                <h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?> - Galerija</a></h2>
                                <div class="rating d-flex justify-content-center align-self-center fs-5"><span>9.0</span> <i class="fas fa-thumbs-up align-self-center"></i></div>
                            </div>
                            <hr class="col-12 p-0 m-0">
                            <div class="apartman-data-body d-flex col-12">
                                <div class="body-left col-10 d-flex flex-column justify-content-start align-items-start g-2 py-2">
                                    <p class="text-center">Kvadratura: <?php echo get_field('kvadratura'); ?></p>
                                    <p class="text-center">Dodatna Oprema: <?php echo get_field('dodatna_oprema'); ?></p>
                                </div>
                                <div class="body-right col-2 d-flex flex-column align-items-end justify-content-end">
                                    <p class="text-center align-self-bottom px-2">Cijena: <?php echo get_field('cijena'); ?>KM</p>
                                </div>
                            
                            </div>
                            <hr class="col-12 p-0 m-0 my-3">
                            <div class="apartman-data-footer col-12 d-flex justify-content-end align-items-center  py-3 px-2">
                                <a href="<?php echo esc_url(get_permalink(get_page_by_path('rezervacija'))); ?>" class="btn btn-dark p-2 fs-4">Pogledaj Dostupnost</a>
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