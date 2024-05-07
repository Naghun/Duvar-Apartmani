<?php

/**
 * Template Name: Privacy Page Template
 * Template for displaying privacy page.
 *
 * @package Understrap
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$privacy_policy_id = 3;
$privacy_policy_content = get_post_field('post_content', $privacy_policy_id);
$privacy_policy_title = get_the_title($privacy_policy_id);

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="page-wrapper">
    <div class="<?php echo esc_attr( $container ); ?> m-auto">
        <div class="row location-start d-flex justify-content-center align-items-center privacy-starter">
            <?php
                echo '<div class="privacy-policy-content">';
                echo '<h1>' . esc_html($privacy_policy_title) . '</h1>';
                echo apply_filters('the_content', $privacy_policy_content);
                echo '</div>';
            ?>

        </div> <!-- .row -->
    </div><!-- .container(-fluid) -->
</div><!-- #wrapper-footer -->

<?php
get_footer();

?>