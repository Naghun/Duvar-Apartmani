<?php
/*
 * Template Name: Single Apartman
 * Template for displaying a single apartment.
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

        <?php

            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <h1 class="entry-title d-flex justify-content-center align-items-center">Slike za <?php the_title(); ?></h1>
                        </header>
                        <section aria-label="photos d-flex justify-content-center align-items-center row p-2">
                            <div class="carousel position-relative d-flex justify-content-center align-items-center m-auto" data-carousel>
                                <button class="carousel-button prev" data-carousel-button = "prev"><i class="fas fa-chevron-left"></i></button>
                                <button class="carousel-button next" data-carousel-button = "next"><i class="fas fa-chevron-right"></i></button>
                                <ul class="col-12 d-flex img-slider" data-slides>
                                    <li class="slide" data-active>
                                        <img src="<?php echo get_theme_file_uri('/src/images/blagaj-1.jpg'); ?>" alt="blagaj slika">
                                    </li>
                                    <li class="slide">
                                        <img src="<?php echo get_theme_file_uri('/src/images/blagaj-2.jpg'); ?>" alt="blagaj slika">
                                    </li>
                                    <li class="slide">
                                        <img src="<?php echo get_theme_file_uri('/src/images/blagaj-3.jpg'); ?>" alt="blagaj slika">
                                    </li>
                                </ul>
                            </div>
                            
                        </section>
                    </article>

                    <?php
                }
            } else {
                get_template_part( 'loop-templates/content', 'none' );
            }
            

        ?>

        </div> <!-- .row -->

    </div><!-- .container(-fluid) -->
    
</div><!-- #wrapper-footer -->
    
<?php
get_footer();

?>