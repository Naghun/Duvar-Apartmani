<?php

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?> m-auto">

		<div class="row d-flex justify-content-center align-items-center single-starter-blog">
            <div class="col-12 blog-container p-3 d-flex flex-column justify-content-center align-items-center">
                <?php
                while(have_posts()) {
                    the_post(); ?>
                    
                    <h2 class="col-12 text-center"><?php echo the_title(); ?></h2>

                    <div class="details col-12 d-flex justify-content-center align-items-center">
                        <div class="blog-img col-4">
                            <?php echo get_the_post_thumbnail(); ?>
                        </div>
                        <p class="blog-text col d-flex justify-content-center align-items-center text-justify"> 
                            <?php echo the_content(); ?> 
                        </p>
                    </div>   
                    <?php } ?>
            </div>
        </div> <!-- .row -->
    </div><!-- .container(-fluid) -->
</div><!-- #wrapper-footer -->

<?php
get_footer();

?>