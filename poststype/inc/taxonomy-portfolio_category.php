<?php

wp_enqueue_script( 'tf-portfolio');
wp_enqueue_script( 'jquery-isotope');

get_header();

$term_slug = $wp_query->tax_query->queries[0]['terms'][0];

$portfolio_number_post = themesflat_get_opt( 'portfolio_number_post' ) ? themesflat_get_opt( 'portfolio_number_post' ) : 9;

$columns = themesflat_get_opt('portfolio_grid_columns');

$style = isset($_GET['style_layout']) ? $_GET['style_layout'] : themesflat_get_opt('style_archive');

$paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;

$themesflat_paging_style = themesflat_get_opt('portfolio_archive_pagination_style');

    

$args = array(

    'post_type' => 'portfolio',

    'paged'     => $paged,

    'posts_per_page' => $portfolio_number_post,

);

$args['tax_query'] = array(

    array(

        'taxonomy' => 'portfolio_category',

        'field'    => 'slug',

        'terms'    => $term_slug

    ),

); 

$query = new WP_Query($args);

?>

<div class="themesflat-portfolio-taxonomy sv-page">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="wrap-content-area">

                    <div id="primary" class="content-area"> 

                        <main id="main" class="main-content" role="main"> 

                            <div class="wrap-portfolio-post tf-portfolio-wrap <?php echo esc_attr($style); ?>">

                                <?php 

                                     $show_filter_class = 'show-filter'; 
                                     $filters = wp_list_pluck( get_terms( 'portfolio_category','hide_empty=1'), 'name','slug' );
                                     echo '<ul class="portfolio-filter posttype-filter">';
                                         echo '<li class="active"><a data-filter="*" href="#">' . esc_html('Show All', 'themesflat-core') . '</a></li>'; 

                                             foreach ($filters as $key => $value) {
                                                 echo '<li><a data-filter=".' . esc_attr( strtolower($key)) . '" href="#" title="' . esc_attr( $value ) . '">' . esc_html( $value ) . '</a></li>'; 
                                             }
                                         
                      
                                     echo '</ul>';
                                     
                                     echo '<div class="container-filter ' . esc_attr($show_filter_class) . ' wrap-portfolio-post row column-3">';


                                if( $query->have_posts() ) {

                                    while ( $query->have_posts() ) : $query->the_post();                	
                                    global $post;
                                    $id = $post->ID;
                                    $termsArray = get_the_terms( $id, 'portfolio_category' );
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

    <div class="portfolio-post scale-hover">
                                    
                                    
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
        <div class="category-portfolio"><?php echo esc_attr ( the_terms( get_the_ID(), 'portfolio_category', '', ', ', '' ) ); ?></div>
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
			                                            <?php echo the_terms( get_the_ID(), 'portfolio_category', '', ' , ', '' ); ?>
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

</div><!-- /.themesflat-portfolio-taxonomy -->



<?php get_footer(); ?>