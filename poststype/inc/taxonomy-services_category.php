<?php

get_header();

$term_slug = $wp_query->tax_query->queries[0]['terms'][0];

$services_number_post = safe_themesflat_get_opt( 'services_number_post' ) ? safe_themesflat_get_opt( 'services_number_post' ) : 6;

$columns = safe_themesflat_get_opt('services_grid_columns');

$paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;

$themesflat_paging_style = safe_themesflat_get_opt('services_archive_pagination_style');

    

$args = array(

    'post_type' => 'services',

    'paged'     => $paged,

    'posts_per_page' => $services_number_post,

);

$args['tax_query'] = array(

    array(

        'taxonomy' => 'services_category',

        'field'    => 'slug',

        'terms'    => $term_slug

    ),

); 

$query = new WP_Query($args);
$icon = \Elementor\Addon_Elementor_Icon_manager_micare::render_icon( safe_themesflat_get_opt_elementor('services_post_icon') );

?>

<div class="container themesflat-services-taxonomy sv-page">

    <div class="row">

        <div class="col-md-12">

            <div class="wrap-content-area">

                <div id="primary" class="content-area"> 

                    <main id="main" class="main-content" role="main">                            

                    <div class="tf-services-wrap style2">


<div class="wrap-services-post row column-2 ">

    <?php 

    

    if( $query->have_posts() ) {

        while ( $query->have_posts() ) : $query->the_post();                	

            ?>           

                    <div class="item">				
                                            <div class="services-post scale-hover">
                                                <div class="featured-post">
				                            	    <a href="<?php echo get_the_permalink(); ?>">
				                                        <?php 
				                                            if ( has_post_thumbnail() ) { 
				                                                $themesflat_thumbnail = "full";                              
				                                                the_post_thumbnail( $themesflat_thumbnail );
				                                            }                                           
				                                        ?>
				                                    </a>
                                                </div>
                                                <div class="content"> 
                                                        <?php if(!empty($icon)): ?>
                                                            <div class="icon st-<?php echo esc_attr($count); ?>">
                                                                <?php echo $icon; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <h3 class="title border_eff">
                                                            <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                                        </h3>
                                                        <p class="description"><?php echo wp_trim_words( get_the_content(), 10, '' ); ?></p>
                                                        <div class="tf-button-container">
                                                            <a href="<?php echo esc_url( get_permalink() ) ?>" class="tf-btn">
                                                                <span><?php esc_html_e( 'Read more', 'micare' ); ?></span>
                                                                <i class="icon-micare-arrow-right"></i>
                                                            </a>
                                                        </div>
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

                <?php 
					get_sidebar();
				?>

            </div>

        </div>

    </div>

</div>

<?php get_footer(); ?>