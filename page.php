<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Razia
 */

get_header(); while ( have_posts() ) : the_post(); 
?>

			<div class="col-lg-9">
				<div class="right-part">
					<div class="page-title">
						<h2><?php  the_title(); ?></h2>
					</div>
					<?php
						get_template_part( 'template-parts/content', 'page' );
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					 // End of the loop.
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php endwhile; get_footer();
