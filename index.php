<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Razia 
 */
get_header(); ?>
<div class="col-lg-9">
    <div class="right-part" id="content">
<?php 

    $razia_args = new WP_Query(
        array(
            'posts_per_page' => -1,
            'post_type' => 'post',
            'ignore_sticky_posts' => 1
        )
    ); 

    $razia_project_categories = get_terms( 'category'); ?>
        

        <div class="row">
            <div class="col-lg-12"> 
                <ul class="razia-project-s-active razia-project-shorting text-center">
                    <li class="active" data-filter="*"><?php echo esc_html__( 'All', 'razia-photography' ); ?></li>

                    <?php if(!empty($razia_project_categories) && ! is_wp_error( $razia_project_categories )){
                        foreach ($razia_project_categories as $razia_category) {; ?>
                            <li data-filter=".<?php echo esc_attr($razia_category->slug); ?>"><?php echo esc_html( $razia_category->name ); ?></li><?php 
                        }
                    }; ?>

                </ul>   
            </div>
        </div>  
        <div class="row">
            <div class="col-lg-12">
                <div class="row project-list">
                    <?php 
        while($razia_args->have_posts()) : $razia_args->the_post();
        $razia_post_id = get_the_ID();
        
        $razia_project_category = get_the_terms( $razia_post_id, 'category' );
       
        if($razia_project_category && ! is_wp_error( $razia_project_category )){
            $razia_project_cat_list = array();
            foreach ($razia_project_category as $razia_cat) {
                $razia_project_cat_list[] = $razia_cat->slug;
            }
            $razia_project_assigned_cat = join( " ", $razia_project_cat_list );
        }else{
            $razia_project_assigned_cat = '';
        }; ?>
        
        
        <div class="col-lg-4 <?php echo esc_attr( $razia_project_assigned_cat ); ?>">
            <a href="<?php echo esc_url( get_permalink() ); ?>" class="single-work-box">
                <div class="work-box-bg" style="background-image:url(<?php if ( has_post_thumbnail () ):the_post_thumbnail_url(); else : echo esc_url (get_stylesheet_directory_uri() . '/assets/img/1.jpg' ); endif; ?>);"><i class="fa fa-link"></i></div>

            </a>
        </div> <?php 
        endwhile;
        wp_reset_query();   ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
