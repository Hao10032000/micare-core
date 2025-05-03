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
								$data_description = get_post_meta($post->ID, 'description_doctor_value', true);
								$data_age = get_post_meta($post->ID, 'age_doctor_value', true);
								$data_email = get_post_meta($post->ID, 'email_doctor_value', true);
								$data_phone = get_post_meta($post->ID, 'phone_doctor_value', true);
								$data_location = get_post_meta($post->ID, 'location_doctor_value', true);
								$data_education = get_post_meta($post->ID, 'education_doctor_value', true);
								$data_experience = get_post_meta($post->ID, 'experience_doctor_value', true);
								$data_awards = get_post_meta($post->ID, 'awards_doctor_value', true);
								$data_yoex = get_post_meta($post->ID, 'yoex_doctor_value', true);
							?>

                            <div class="group-overlay-doctor">
                                <div class="overlay-doctor"></div>
                                <div class="single-information-author">
                                <div class="icon-close-doctor">
                                    <i class="icon-micare-close"></i>
                                </div>
                                    <div class="btn-switch"><i class="icon-micare-Megamenu"></i></div>
                                    <div class="featured-post"><?php the_post_thumbnail('themesflat-doctor-single'); ?>
                                    </div>
    
                                    <div class="content-author">
                                        <div class="category-doctor">
                                            <?php echo esc_attr ( the_terms( get_the_ID(), 'doctor_category', '', ', ', '' ) ); ?>
                                        </div>
                                        <h3 class="post-title"><?php the_title(); ?></h3>
                                        <?php if ( !empty($facebook_icon) || !empty($twitter_icon) || !empty($linkedin_icon) || !empty($youtube_icon) || !empty($custom1_icon) || !empty($custom2_icon )): ?>
                                        <ul class="list-social">
                                            <?php if ( !empty($facebook) ): ?>
                                            <li>
                                                <a href="<?php echo esc_url($facebook); ?>"><i
                                                        class="icon-micare2-<?php echo esc_attr($facebook_icon); ?>"></i></a>
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
                                        <p class="desc"><?php echo esc_html($data_description) ?></p>
                                        <?php if(!empty($data_age) || !empty($data_email) || !empty($data_phone) || !empty($data_location)): ?>
                                        <h4><?php esc_html_e( 'Infomation', 'themesflat' ) ?></h4>
                                        <ul class="group-infor">
                                            <?php if(!empty($data_age)): ?>
                                            <li class="inner">
                                                <span><?php esc_html_e( 'Age:', 'themesflat' ) ?></span>
                                                <h6><?php echo esc_html($data_age) ?></h6>
                                            </li>
                                            <?php endif; ?>
                                            <?php if(!empty($data_email)): ?>
                                            <li class="inner">
                                                <span><?php esc_html_e( 'Email:', 'themesflat' ) ?></span>
                                                <h6><?php echo esc_html($data_email) ?></h6>
                                            </li>
                                            <?php endif; ?>
                                            <?php if(!empty($data_phone)): ?>
                                            <li class="inner">
                                                <span><?php esc_html_e( 'Phone:', 'themesflat' ) ?></span>
                                                <h6><?php echo esc_html($data_phone) ?></h6>
                                            </li>
                                            <?php endif; ?>
                                            <?php if(!empty($data_location)): ?>
                                            <li class="inner">
                                                <span><?php esc_html_e( 'From:', 'themesflat' ) ?></span>
                                                <h6><?php echo esc_html($data_location) ?></h6>
                                            </li>
                                            <?php endif; ?>
                                        </ul>
                                        <?php endif; ?>
    
    
                                        <?php if(!empty($data_education) || !empty($data_experience) || !empty($data_awards) || !empty($data_yoex)): ?>
                                        <h4><?php esc_html_e( 'Experience', 'themesflat' ) ?></h4>
                                        <ul class="group-infor2">
                                            <?php if(!empty($data_education)): ?>
                                            <li class="inner">
                                                <span><?php esc_html_e( 'Education:', 'themesflat' ) ?></span>
                                                <h6><?php echo esc_html($data_education) ?></h6>
                                            </li>
                                            <?php endif; ?>
                                            <?php if(!empty($data_experience)): ?>
                                            <li class="inner">
                                                <span><?php esc_html_e( 'Professional Experience:', 'themesflat' ) ?></span>
                                                <h6><?php echo esc_html($data_experience) ?></h6>
                                            </li>
                                            <?php endif; ?>
                                            <?php if(!empty($data_awards)): ?>
                                            <li class="inner">
                                                <span><?php esc_html_e( 'Awards:', 'themesflat' ) ?></span>
                                                <h6><?php echo esc_html($data_awards) ?></h6>
                                            </li>
                                            <?php endif; ?>
                                            <?php if(!empty($data_yoex)): ?>
                                            <li class="inner">
                                                <span><?php esc_html_e( 'Years of Experience:', 'themesflat' ) ?></span>
                                                <h6><?php echo esc_html($data_yoex) ?></h6>
                                            </li>
                                            <?php endif; ?>
                                        </ul>
                                        <?php endif; ?>
    
    
                                    </div>
                                </div>
                            </div>
							<div class="col-md-12">
								<?php the_content(); ?>
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