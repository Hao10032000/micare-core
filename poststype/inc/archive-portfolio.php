<?php

/**

 * The template for displaying archive case study.

 *

 * Learn more: http://codex.wordpress.org/Template_Hierarchy

 *

 * @package micare

 */

 wp_enqueue_script( 'tf-portfolio');
 wp_enqueue_script( 'jquery-isotope');

get_header(); ?>

<?php 

$portfolio_number_post = safe_themesflat_get_opt( 'portfolio_number_post' ) ? safe_themesflat_get_opt( 'portfolio_number_post' ) : 9;

$columns = safe_themesflat_get_opt('portfolio_grid_columns');

$themesflat_paging_style = safe_themesflat_get_opt('portfolio_archive_pagination_style');

$style = isset($_GET['style_layout']) ? $_GET['style_layout'] : safe_themesflat_get_opt('style_archive');

$orderby = safe_themesflat_get_opt('portfolio_order_by');


$order = safe_themesflat_get_opt('portfolio_order_direction');

$exclude = safe_themesflat_get_opt('portfolio_exclude');

$show_filter = safe_themesflat_get_opt('portfolio_show_filter');

$filter_category_order = safe_themesflat_get_opt('portfolio_filter_category_order');	

$terms_slug = wp_list_pluck( get_terms( 'portfolio_category','hide_empty=0'), 'slug' );

$filters =      wp_list_pluck( get_terms( 'portfolio_category','hide_empty=0'), 'name','slug' );

$show_filter_class = '';



$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;



$query_args = array(

    'post_type' => 'portfolio',

    'orderby'   => $orderby,

    'order' => $order,    

    'paged' => $paged,    

    'posts_per_page' => $portfolio_number_post,  

    'tax_query' => array(

        array(

            'taxonomy' => 'portfolio_category',   

            'field'    => 'slug',                   

        	'terms'    => $terms_slug,

        ),

    ),

);	



if ( ! empty( $exclude ) ) {				

	if ( ! is_array( $exclude ) )

		$exclude = explode( ',', $exclude );



	$query_args['post__not_in'] = $exclude;

}

$query = new WP_Query( $query_args );

?>



<div class="themesflat-portfolio-taxonomy sv-page">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="wrap-content-area">

                    <div id="primary" class="content-area"> 

                        <main id="main" class="main-content" role="main"> 

                        <div class="tf-portfolio-wrap style2">


                            <div class="wrap-portfolio-post">

                                <?php 

                                

                                if( $query->have_posts() ) {

                                    while ( $query->have_posts() ) : $query->the_post();                	

                                    	?>           

                                            <div class="item">				

                                                <div class="portfolio-post scale-hover">

                                                                <a href="<?php echo esc_url( get_permalink() ) ?>" class="tf-button">
                                                                    <i class="icon-micare-arrow-right"></i>
                                                                </a>
                                                            
                                                <div class="featured-post">
                                                            
				                            	    <a href="<?php echo get_the_permalink(); ?>">
				                                        <?php 
				                                            if ( has_post_thumbnail() ) { 
				                                                $themesflat_thumbnail = "themesflat-portfolio-archive2";                              
				                                                the_post_thumbnail( $themesflat_thumbnail );
				                                            }                                           
				                                        ?>
				                                    </a>
                                                            
                                                </div>
                                                            
                                                    <div class="content"> 
                                                            
                                                        <div class="category-portfolio"><?php echo esc_attr ( the_terms( get_the_ID(), 'portfolio_category', '', ', ', '' ) ); ?></div>
                                                            
                                                        <h5 class="title border_eff">
                                                            <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                                        </h5>
                                                            
                                                    </div>
                                                            
                                                </div>
                                                            
                                            </div>     

                                        <?php 

                                    endwhile;

                                } else {

                                    get_template_part( 'template-parts/content', 'none' );

                                }

                                ?>            

                            </div>


                            <?php 

                                themesflat_pagination_posttype($query);

                                wp_reset_postdata();

                            ?>  
                        </div>

                        </main><!-- #main -->

                    </div><!-- #primary -->


                </div>

            </div>

        </div>

    </div>

</div><!-- /.themesflat-portfolio-taxonomy -->



<?php get_footer(); ?>