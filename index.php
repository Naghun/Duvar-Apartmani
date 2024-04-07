<?php

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?> m-auto">

		<div class="row d-flex justify-content-center align-items-center starter-index">

            <div class="col-12 blogs-container">

                <h1 class="blog-header p-3 text-center">Blagaj Atrakcije</h1>
                <div class="grid-container col-12 d-flex flex-wrap p-1 m-0">
                    <?php 
                    $blog_posts = new WP_Query(array(
                        'posts_per_page' => 9,
                    ));
                    
                    while ( $blog_posts -> have_posts() ) :
                    $blog_posts -> the_post();
                    ?>
                        <a href="<?php the_permalink(); ?>" class="col-4 d-flex flex-column justify-content-center align-items-center p-3">
                            <?php
                            if(has_post_thumbnail()) {
                                echo get_the_post_thumbnail(null, 'medium');
                            } else { ?>
                                <img src="<?php echo get_theme_file_uri('/src/images/blagaj-1.jpg'); ?>" alt="blagaj slika">
                            <?php }

                            ?>
                            <h3 class="col-12 d-flex justify-content-start p-2 inside-header"><?php echo the_title(); ?></h3>
                        </a>
                    <?php
                    endwhile;
                    wp_reset_postdata(); ?>

                </div>
            </div>

        </div> <!-- .row -->
        <?php get_template_part( 'global-templates/page-break-template' ); ?>
        
        <div class="row d-flex justify-content-center align-items-center">
            <?php get_template_part( 'global-templates/page-banner' ); ?>
        </div>
        
        <?php get_template_part( 'global-templates/text-template' ); ?>

    </div><!-- .container(-fluid) -->

</div><!-- #wrapper-footer -->

<?php
get_footer();

?>