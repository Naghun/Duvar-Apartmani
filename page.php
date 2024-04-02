<?php

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?> m-auto">

		<div class="row d-flex justify-content-center align-items-center">

            <?php

            while(have_posts()) {
                the_post(); ?>
                
                <h2> <?php echo the_title()   ?> </h2>
                <p> <?php echo the_content()   ?> </p>

                <?php } ?>

        </div><!-- .row -->

    </div><!-- .container(-fluid) -->

</div><!-- #wrapper-footer -->

<?php
get_footer();

?>