<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Travel_Blog
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'travel-blog' ); ?></a>

	<?php if ( get_theme_mod( 'travel_blog_bg' ) && is_front_page() ) : ?>
<div class="homePageBG"  style="
			background-image: url('<?php  echo esc_url( get_theme_mod( 'travel_blog_bg' ) ); ?>');
			background-repeat: no-repeat;
			background-size: cover;
			background-position: top center;
			height: 680px;">
	<?php else : ?>
	<div class="homePageBG">
	<?php endif; ?>
	<header id="masthead" class="site-header" role="banner">
		<?php if ( get_header_image() ) : ?>
			<div class="header-image" style="background-image:url(<?php header_image(); ?>);">
		
		<div class="site-branding text-center">
			<?php if ( get_theme_mod( 'travel_blog_logo' ) ) : ?>
				<div class='site-logo'>
					<a href='<?php echo esc_url( home_url( '/' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'travel_blog_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
				</div>
			<?php elseif ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php
			endif; ?>

		</div><!-- .site-branding -->
		</div><!-- .header-image -->
		
		<?php else : ?>

		<div class="header-colorBG">
			
		<div class="site-branding text-center">
			<?php if ( get_theme_mod( 'travel_blog_logo' ) ) : ?>
				<div class='site-logo'>
					<a href='<?php echo esc_url( home_url( '/' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'travel_blog_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
				</div>
			<?php else : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php
			endif; ?>
		</div><!-- .site-branding -->
		</div><!-- .header-colorBG -->
		<?php endif; //end header image check. ?>
	<!--<div data-sticky-container>
		<div data-sticky data-options="marginTop:0;" style="width:100%" data-top-anchor="masthead:bottom" data-btm-anchor="content:bottom">-->
			<nav id="site-navigation" class="main-navigation menu-centered top-bar no-js" role="navigation">
				<span id="mobilMenu" data-responsive-toggle="primary-menu" data-hide-for="medium">
					<button class="menu-icon dark" type="button" data-toggle></button>
				</span>
				
				<?php wp_nav_menu( array( 
					'container' => true,
					'theme_location' => 'menu-1', 
					'menu_id' => 'primary-menu',
					'menu_class' => 'dropdown menu',
					'items_wrap'      => '<ul id="%1$s" class="%2$s" data-dropdown-menu>%3$s</ul>',
            //Recommend setting this to false, but if you need a fallback...
					// 'fallback_cb' => 'f6_topbar_menu_fallback',
					'walker' => new F6_TOPBAR_MENU_WALKER()
				) ); 
				?>
				
			</nav><!-- #site-navigation -->
			<!--</div>
	</div>-->
	</header><!-- #masthead -->

	</div>

	<div id="content" class="site-content">
