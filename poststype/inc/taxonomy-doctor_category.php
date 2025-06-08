<?php

get_header();

$term_slug = $wp_query->tax_query->queries[0]['terms'][0];

$doctor_number_post = safe_themesflat_get_opt( 'doctor_number_post' ) ? safe_themesflat_get_opt( 'doctor_number_post' ) : 9;

$columns = safe_themesflat_get_opt('doctor_grid_columns');

$paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;



$args = array(

    'post_type' => 'doctor',

    'paged'     => $paged,

    'posts_per_page' => $doctor_number_post,

);

$args['tax_query'] = array(

    array(

        'taxonomy' => 'doctor_category',

        'field'    => 'slug',

        'terms'    => $term_slug

    ),

);

$query = new WP_Query($args);

?>

<div class="themesflat-doctor-taxonomy pj-page">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="wrap-content-area">

                    <div id="primary" class="content-area"> 

                        <main id="main" class="main-content" role="main">

                            <div class="container-archive tf-doctor-wrap style2">

                                <?php 

                                if( $query->have_posts() ) {

                                    while ( $query->have_posts() ) : $query->the_post(); 

                                    global $post;

								$facebook = get_post_meta($post->ID, 'facebook_doctor_value', true);
								$twitter = get_post_meta($post->ID, 'twitter_doctor_value', true);
								$linkedin = get_post_meta($post->ID, 'linkedin_doctor_value', true);
								$youtube = get_post_meta($post->ID, 'youtube_doctor_value', true);
								$custom1 = get_post_meta($post->ID, 'custom1_doctor_value', true);
								$custom2 = get_post_meta($post->ID, 'custom2_doctor_value', true);
								$facebook_icon = get_post_meta($post->ID, 'facebook_icon_value', true);
								$twitter_icon = get_post_meta($post->ID, 'twitter_icon_value', true);
								$linkedin_icon = get_post_meta($post->ID, 'linkedin_icon_value', true);
								$youtube_icon = get_post_meta($post->ID, 'youtube_icon_value', true);
								$custom1_icon = get_post_meta($post->ID, 'custom1_icon_value', true);
								$custom2_icon = get_post_meta($post->ID, 'custom2_icon_value', true);
								$position_doctor_value = get_post_meta($post->ID, 'position_doctor_value', true);
								$description_doctor_value = get_post_meta($post->ID, 'description_doctor_value', true);

                                    ?>           

<div class="item">

<div class="doctor-post scale-hover">


    <div class="featured-post">
<a href="<?php echo get_the_permalink(); ?>">

<?php 

if ( has_post_thumbnail() ) { 

$themesflat_thumbnail = "full";                              

the_post_thumbnail( $themesflat_thumbnail );

}                                           

?>

</a>

                                <?php if ( !empty($facebook_icon) || !empty($twitter_icon) || !empty($linkedin_icon) || !empty($youtube_icon) || !empty($custom1_icon) || !empty($custom2_icon )): ?>

                    <ul class="list-social">

                        <li class="share-btn">
                                    
                            <a href="#"><i class="icon-micare-plus"></i></a>
                        
                        </li>

                        <?php if ( !empty($facebook) ): ?>
                        
                        <li>
                        
                            <a href="<?php echo esc_url($facebook); ?>"><i
                        
                                    class="icon-micare-<?php echo esc_attr($facebook_icon); ?>"></i></a>
                        
                        </li>
                        
                        <?php endif; ?>
                        
                        <?php if ( !empty($twitter) ): ?>
                        
                        <li>
                        
                            <a href="<?php echo esc_url($twitter) ?>"><i
                        
                                    class="icon-micare-<?php echo esc_attr($twitter_icon); ?>"></i></a>
                        
                        </li>
                        
                        <?php endif; ?>
                        
                        <?php if ( !empty($linkedin) ): ?>
                        
                        <li>
                        
                            <a href="<?php echo esc_url($linkedin) ?>"><i
                        
                                    class="icon-micare-<?php echo esc_attr($linkedin_icon); ?>"></i></a>
                        
                        </li>
                        
                        <?php endif; ?>
                        
                        <?php if ( !empty($youtube) ): ?>
                        
                        <li>
                        
                            <a href="<?php echo esc_url($youtube) ?>"><i
                        
                                    class="icon-micare-<?php echo esc_attr($youtube_icon); ?>"></i></a>
                        
                        </li>
                        
                        <?php endif; ?>
                        
                        <?php if ( !empty($custom1) ): ?>
                        
                        <li>
                        
                            <a href="<?php echo esc_url($custom1) ?>"><i
                        
                                    class="icon-micare-<?php echo esc_attr($custom1_icon); ?>"></i></a>
                        
                        </li>
                        
                        <?php endif; ?>
                        
                        <?php if ( !empty($custom2) ): ?>
                        
                        <li>
                        
                            <a href="<?php echo esc_url($custom2) ?>"><i
                        
                                    class="icon-micare-<?php echo esc_attr($custom2_icon); ?>"></i></a>
                        
                        </li>
                        
                        <?php endif; ?>
                        
                    </ul>


        <?php endif; ?>

                <div class="tf-button-container">
                    <a href="<?php echo esc_url( get_permalink() ) ?>" class="tf-btn">
                        <span><?php esc_html_e('Make Appointment','themesflat-core') ?></span>
                        <i class="icon-micare-arrow-right"></i>
                    </a>
                </div>


    </div>

    <div class="content">

                    <h5 class="title border_eff">
             <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
        </h5>

        <p class="position"> <?php echo $position_doctor_value; ?> </p>

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

                            <div class="text-center">

                                <?php 

                                themesflat_pagination_posttype($query, 'pages');

                                wp_reset_postdata();

                                ?> 



                            </div>

                        </main><!-- #main -->

                    </div><!-- #primary -->

                </div>

            </div>

        </div>

    </div>

</div><!-- /.themesflat-doctor-taxonomy -->

<?php get_footer(); ?>