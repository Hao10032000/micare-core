<?php

get_header();

$term_slug = $wp_query->tax_query->queries[0]['terms'][0];

$services_number_post = themesflat_get_opt( 'services_number_post' ) ? themesflat_get_opt( 'services_number_post' ) : 6;

$columns = themesflat_get_opt('services_grid_columns');

$paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;

$themesflat_paging_style = themesflat_get_opt('services_archive_pagination_style');

    

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
$icon = \Elementor\Addon_Elementor_Icon_manager_micare::render_icon( themesflat_get_opt_elementor('services_post_icon') );

?>

<div class="container themesflat-services-taxonomy sv-page">

    <div class="row">

        <div class="col-md-12">

            <div class="wrap-content-area">

                <div id="primary" class="content-area"> 

                    <main id="main" class="main-content" role="main">                            

                    <div class="tf-services-wrap style2">


<div class="wrap-services-post row column-4 ">

    <?php 

    

    if( $query->have_posts() ) {

        while ( $query->have_posts() ) : $query->the_post();                	

            ?>           

<div class="item">				

<div class="services-post">


    <div class="content"> 

        <?php if(!empty($icon)): ?>
            <div class="icon">
                <?php echo $icon; ?>
            </div>
        <?php endif; ?>

        

        <h5 class="title">

            <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>

        </h5>

            <p class="description"><?php echo wp_trim_words( get_the_content(), 15, '' ); ?></p>

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

<?php get_footer(); ?>