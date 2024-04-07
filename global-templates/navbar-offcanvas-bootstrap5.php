<?php
/**
 * Header Navbar (bootstrap5)
 * /css/custom-css/navbar.css
 * @package Understrap
 */



// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<nav id="main-nav" class="navbar navbar-expand-md <?php echo is_front_page() ? 'custom-navbar' : 'custom-navbar-2' ?>" aria-labelledby="main-nav-label">

	<h2 id="main-nav-label" class="screen-reader-text custom-navbar">
		<?php esc_html_e( 'Main Navigation', 'understrap' ); ?> 
	</h2>


	<div class="<?php echo esc_attr( $container ); ?>">

		<!-- Your site title as branding in the menu -->
		<?php if ( ! has_custom_logo() ) { ?>

			<?php if ( is_front_page() && is_home() ) : ?>

				<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

			<?php else : ?>

				<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

			<?php endif; ?>

			<?php
		} else {
			if(is_front_page()) {
				the_custom_logo();
			}
			else { ?>
				<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">
					<img src="<?php echo get_theme_file_uri('/src/images/logo-gold.png') ?>" alt="<?php bloginfo( 'name' ); ?>">
				</a>
			<?php }
		}
		
		?>
		<!-- end custom logo -->
		<button class="navbar-toggler hamburger d-flex justify-content-center align-items-center p-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNavOffcanvas" aria-controls="navbarNavOffcanvas" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
			<span class="navbar-toggler-icon p-0 m-0 d-md-none"></span>
		</button>

		<div class="offcanvas offcanvas-end custom-dropdown" tabindex="-1" id="navbarNavOffcanvas">

			<div class="offcanvas-header justify-content-end">
				<button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			</div><!-- .offcancas-header -->

			<!-- The WordPress Menu goes here -->
			<?php

			if (is_front_page()) {
				wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'offcanvas-body col-12',
						'container_id'    => '',
						'menu_class'      => 'navbar-nav justify-content-end flex-grow-1 p-3 navbar-list fs-5 col-12',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				);
			}
			else {
				wp_nav_menu(
					array(
						'theme_location'  => 'header-menu-2',
						'container_class' => 'offcanvas-body col-12',
						'container_id'    => '',
						'menu_class'      => 'navbar-nav justify-content-end flex-grow-1 p-3 navbar-list fs-5 col-12',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				);
			}

			?>
		</div><!-- .offcanvas -->

	</div><!-- .container(-fluid) -->

</nav><!-- .site-navigation -->
