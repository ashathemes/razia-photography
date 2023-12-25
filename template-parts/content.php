<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Razia
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="cat-button">
		<?php echo razia_photography_category(); ?>
	</div>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-meta-top">
		<?php
		if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php 
					razia_posted_by();
					razia_posted_on(); 
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</div>

	<div class="post-thumbnail">
		<?php razia_post_thumbnail(); ?>
	</div>
	<div class="row">
		<div class="<?php if ( is_active_sidebar( 'sidebar-1' ) && is_single() ) : ?>col-lg-8<?php else: ?>col-lg-12<?php endif; ?>">
			<div class="post-content">
				<div class="entry-content">
					<?php

					if(is_single( )){
						the_content(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'razia' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								wp_kses_post( get_the_title() )
							)
						);
					}else{
						the_excerpt(); ?>
						<div class="blog-button">
				            <?php
				            echo'<a href="'.esc_url ( get_the_permalink( $post->ID ) ).'"><span>'.esc_html__('Read More','razia-photography').'</span></a>'; 
				            ?>
				        </div>
				      <?php 
					} 

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'razia-photography' ),
							'after'  => '</div>',
						)
					);
					?>
				</div><!-- .entry-content -->

				<?php if ( is_singular() ) : ?>
					<footer class="entry-footer">
						<?php razia_entry_footer(); ?>
					</footer><!-- .entry-footer -->
				<?php endif; ?>
			</div>
		</div>
		<?php if ( is_active_sidebar( 'sidebar-1' ) && is_single() ) : ?>
        <div class="col-lg-4">
            <?php get_sidebar(); ?>
        </div>
        <?php endif; ?>
	</div>
</article>