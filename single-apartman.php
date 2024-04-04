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
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                        </header>

                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>
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