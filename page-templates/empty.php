<?php
/**
 * Template Name: Empty Page Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?><div class="container">
	<?php while ( have_posts() ) :
		the_post();
		get_template_part( 'loop-templates/content', 'empty' );
	endwhile; ?>
</div>
<?php get_footer();
