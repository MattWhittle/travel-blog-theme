<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Travel_Blog
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<div class="row">
				<div class="medium-6 columns">
					<?php wp_nav_menu(array(
						'theme_location' => 'footer-menu',
						'menu_id' => 'footer-menu',
						'items_wrap' => '<ul id="%1$s" class="%2$s vertical medium-horizontal menu text-center">%3$s</ul>',
					));?>
				</div>
				<div class="medium-6 columns">
					<?php wp_nav_menu(array(
						'theme_location' => 'social-menu',
						'container' => 'div',
						'container_id' => 'menu-social',
						'container_class' => 'menu',
						'menu_id' => 'social-menu',
						'depth' => 1,
						'link_before' => '<span class="screen-reader-text">',
						'link_after' => '</span>',
						'fallback_cb' => '', 
						'items_wrap' => '<ul id="%1$s" class="%2$s menu float-right">%3$s</ul>',
					));?>
				</div>
			</div>
			<div class="row text-center">
				&copy; 2017 Danielle D Whittle
				<span class="sep"> | </span>
				<?php printf( esc_html__( 'Theme by %2$s.' ), 'travel-blog', '<a href="https://automattic.com/" rel="designer">Matt Whittle</a>' ); ?>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
