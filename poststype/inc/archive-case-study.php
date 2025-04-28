<?php

/**

 * The template for displaying archive case study.

 *

 * Learn more: http://codex.wordpress.org/Template_Hierarchy

 *

 * @package micare

 */

 wp_enqueue_script( 'tf-case-study');
 wp_enqueue_script( 'jquery-isotope');

get_header(); ?>

<?php 

$case_study_number_post = themesflat_get_opt( 'case_study_number_post' ) ? themesflat_get_opt( 'case_study_number_post' ) : 9;

$columns = themesflat_get_opt('case_study_grid_columns');

$themesflat_paging_style = themesflat_get_opt('case_study_archive_pagination_style');

$style = isset($_GET['style_layout']) ? $_GET['style_layout'] : themesflat_get_opt('style_archive');

$orderby = themesflat_get_opt('case_study_order_by');


$order = themesflat_get_opt('case_study_order_direction');

$exclude = themesflat_get_opt('case_study_exclude');

$show_filter = themesflat_get_opt('case_study_show_filter');

$filter_category_order = themesflat_get_opt('case_study_filter_category_order');	

$terms_slug = wp_list_pluck( get_terms( 'case_study_category','hide_empty=0'), 'slug' );

$filters =      wp_list_pluck( get_terms( 'case_study_category','hide_empty=0'), 'name','slug' );

$show_filter_class = '';



$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;



$query_args = array(

    'post_type' => 'case-study',

    'orderby'   => $orderby,

    'order' => $order,    

    'paged' => $paged,    

    'posts_per_page' => $case_study_number_post,  

    'tax_query' => array(

        array(

            'taxonomy' => 'case_study_category',   

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



<div class="themesflat-case-study-taxonomy sv-page">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="wrap-content-area">

                    <div id="primary" class="content-area"> 

                        <main id="main" class="main-content" role="main"> 

                            <div class="wrap-case-study-post tf-case-study-wrap <?php echo esc_attr($style); ?>">

                                <?php 

                                     $show_filter_class = 'show-filter'; 
                                     $filters = wp_list_pluck( get_terms( 'case_study_category','hide_empty=1'), 'name','slug' );
                                     echo '<ul class="case-study-filter posttype-filter">';
                                         echo '<li class="active"><a data-filter="*" href="#">' . esc_html('Show All', 'themesflat-core') . '</a></li>'; 

                                             foreach ($filters as $key => $value) {
                                                 echo '<li><a data-filter=".' . esc_attr( strtolower($key)) . '" href="#" title="' . esc_attr( $value ) . '">' . esc_html( $value ) . '</a></li>'; 
                                             }
                                         
                      
                                     echo '</ul>';
                                     
                                     echo '<div class="container-filter ' . esc_attr($show_filter_class) . ' wrap-case-study-post row column-3">';


                                if( $query->have_posts() ) {

                                    while ( $query->have_posts() ) : $query->the_post();                	
                                    global $post;
                                    $id = $post->ID;
                                    $termsArray = get_the_terms( $id, 'case_study_category' );
                                    $termsString = "";
                            
                                    if ( $termsArray ) {
                                        foreach ( $termsArray as $term ) {
                                            $itemname = strtolower( $term->slug ); 
                                            $itemname = str_replace( ' ', '-', $itemname );
                                            $termsString .= $itemname.' ';
                                        }
                                    }
                                    	?>           

<div class="item <?php echo esc_attr( $termsString ); ?>">	
    
<?php if ( $style == 'style4' ): ?>                                

    <div class="case-study-post scale-hover">
                                    
                                    
        <div class="tf-button-container">
                                    
                <a href="<?php echo esc_url( get_permalink() ) ?>" class="tf-button">
                <i aria-hidden="true" class="icon-micare-arrowright2"></i>
                </a>
                                    
        </div>
                                    
                                    
        <div class="featured-post">

        <a href="<?php echo get_the_permalink(); ?>">

        <?php 

            if ( has_post_thumbnail() ) { 
            
                $themesflat_thumbnail = "themesflat-service-grid";                              
            
                the_post_thumbnail( $themesflat_thumbnail );
            
            }                                           
        
        ?>

        </a>

        </div>
            
        <div class="content"> 
        <h5 class="title border_eff">
            <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
        </h5>
        <div class="category-case-study"><?php echo esc_attr ( the_terms( get_the_ID(), 'case_study_category', '', ', ', '' ) ); ?></div>
        <p class="description"><?php echo wp_trim_words( get_the_content(),10, '' ); ?></p>
        </div>
            
    </div>

    <?php else: ?>

        <div class="case-post style6 scale-hover case-post-<?php the_ID(); ?>">
				                            <div class="featured-post">
				                            	<a href="<?php echo get_the_permalink(); ?>">
				                                <?php 
				                                    if ( has_post_thumbnail() ) { 
				                                        $themesflat_thumbnail = "themesflat-project-grid";                              
				                                        the_post_thumbnail( $themesflat_thumbnail );
				                                    }                                           
				                                ?>
				                                </a>
				                            </div>
				                            <div class="content">
				                                    <div class="post-meta">
			                                            <?php echo the_terms( get_the_ID(), 'case_study_category', '', ' , ', '' ); ?>
				                                    </div>
				                                    <h5 class="title border_eff">
				                                         <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
				                                    </h5>				                                
            										<p class="description"><?php echo wp_trim_words( get_the_content(),13, '' ); ?></p>
				                            </div>
				                        </div>

    <?php endif; ?>


</div>


                                        <?php 

                                    endwhile;

                                } else {

                                    get_template_part( 'template-parts/content', 'none' );

                                }

                                ?>            

                            </div>
                            </div>

                            <?php 

                                themesflat_pagination_posttype($query, 'loadmore');

                                wp_reset_postdata();

                            ?>  

                        </main><!-- #main -->

                    </div><!-- #primary -->


                </div>

            </div>

        </div>

    </div>

</div><!-- /.themesflat-case-study-taxonomy -->



<?php get_footer(); ?>