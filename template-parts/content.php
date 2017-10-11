<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Travel_Blog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
<?php if ( is_single() ) { ?>
	<div class="large-12 columns">
		<?php the_post_thumbnail('single-image'); ?>
	</div>
<?php }else{ ?>
	<div class="large-6 columns">
		<?php the_post_thumbnail('entry'); ?>
	</div>
<?php } ?>


<div class="<?php echo is_single() ? 'large-12' : 'large-6' ?> columns">
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php travel_blog_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content text-left">
		<?php
			if ( is_single() ) {
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'travel-blog' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			} else {
				the_excerpt();
				echo '<a class="button" href=' . get_the_permalink() . '>Read More</a>';
			}

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'travel-blog' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</div>
</article><!-- #post-## -->
