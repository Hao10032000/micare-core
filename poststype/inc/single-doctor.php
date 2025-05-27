<?php
get_header(); 
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="wrap-content-area">
                <div id="primary" class="content-area">
                    <main id="main" class="main-content" role="main">
                        <div class="entry-content">
                            <?php while ( have_posts() ) : the_post(); 
								global $post;
								// information
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

                            <div class="doctor-single-container">
                                <div class="content-left">
                                    <div class="featured-single"><?php the_post_thumbnail(); ?></div>
                                    <div class="content">
										<h3 class="post-title"><?php the_title(); ?></h3>
                                         <p class="position"><?php echo $position_doctor_value; ?></p>   
                                        <p class="desc"><?php echo $description_doctor_value; ?></p>
                                        <h4><?php esc_html_e('Follow Me', 'themesflat-core') ?></h4>
                                                <?php if ( !empty($facebook_icon) || !empty($twitter_icon) || !empty($linkedin_icon) || !empty($youtube_icon) || !empty($custom1_icon) || !empty($custom2_icon )): ?>

                    <ul class="list-social">

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
                                    </div>
                                </div>
                                <div class="content-right">

                                    <?php the_content(); ?>

                                </div>
                            </div>

                            <?php endwhile; // end of the loop. ?>
                            <?php wp_reset_postdata(); ?>

                        </div><!-- ./entry-content -->
                    </main><!-- #main -->
                </div><!-- #primary -->
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>