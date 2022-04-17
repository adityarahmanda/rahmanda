<?php
/**
 * Header Navbar
 *
 * @package Rahmanda
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$hide_navbar_brand = get_theme_mod( 'understrap_front_page_hide_navbar_brand' );
?>

<nav id="main-nav" class="navbar navbar-expand-md" aria-labelledby="main-nav-label">

	<h2 id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
	</h2>


	<div class="container">

		<!-- Your site title as branding in the menu -->
		<?php 
		if ( ! has_custom_logo() ) {
		
			$navbar_brand_style = '';

			// Default or static homepage	
			if ( is_front_page() && !is_home() && $hide_navbar_brand ) {

				$navbar_brand_style .= 'display: none;';				

			}
		?>

			<a class="navbar-brand" style="<?php echo $navbar_brand_style; ?>" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

		<?php
		} else {
			the_custom_logo();
		}
		?>
		<!-- end custom logo -->

		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
			<span class="navbar-toggler-icon"></span>
		</button>

		<!-- The WordPress Menu goes here -->
		<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'container_class' => 'collapse navbar-collapse',
				'container_id'    => 'navbarNavDropdown',
				'menu_class'      => 'navbar-nav ms-auto',
				'fallback_cb'     => '',
				'menu_id'         => 'main-menu',
				'depth'           => 2,
				'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
			)
		);
		?>

	</div><!-- .container(-fluid) -->

</nav><!-- .site-navigation -->
