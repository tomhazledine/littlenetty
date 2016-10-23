<?php
/**
 * The header for our theme.
 *
 * @package Little_Netty
 */

?>

<?php include( 'head.php' ); ?>

<div id="page" class="site">
	<!-- <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'littlenetty' ); ?></a> -->

	<header id="masthead" class="globalHeader clearfix" role="banner">
		
		<div class="site-branding">
			<?php if ( is_front_page() ) : ?>
				<h1 class="siteTitleLarge">
					<svg class="homepageLogo">
						<use xlink:href="#header" />
					</svg>
					<span class="visuallyhidden"><?php bloginfo( 'name' ); ?></span>
				</h1>

				<!-- <nav class="headerMenuHome" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				</nav> -->
			<?php else : ?>
				<div class="normalHeader clearfix">
					<nav class="headerMenuSmall headerMenuLeft" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'header_left', 'menu_id' => 'headerLeft' ) ); ?>
					</nav>

					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="siteTitleSmall">
						<svg class="homepageLogoSmall">
							<use xlink:href="#netty_logo" />
						</svg>
						<span class="visuallyhidden"><?php bloginfo( 'name' ); ?></span>
					</a>

					<nav class="headerMenuSmall headerMenuRight" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'header_right', 'menu_id' => 'headerRight' ) ); ?>
					</nav>
				</div>
			<?php endif; ?>
		</div>

		<nav id="site-navigation" class="mobileMenu" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'littlenetty' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav>
	</header>

	<div id="content" class="site-content">
