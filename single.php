<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Razia
 */
get_header();
?>
			<div class="col-lg-9">
				<div class="right-part">
					<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', get_post_type() );
							the_post_navigation(); 
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
					?>
				</div>
			</div>
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	        <div class="col-lg-4">
	            <?php get_sidebar(); ?>
	        </div>
	        <?php endif; ?>
		</div>
	</div>
</div>
<?php
get_footer();
