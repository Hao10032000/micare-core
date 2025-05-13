<div class="item">

<div class="doctor-post hover-flash scale-hover">

        <h5 class="title border_eff">
             <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
        </h5>

        <p class="position"> <?php echo $position_doctor_value; ?> </p>




    <div class="featured-post">
        <?php 

                            $get_id_post_thumbnail = get_post_thumbnail_id();

                            echo sprintf('<img src="%s" class="lazyload" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings ));

                        ?>


    </div>


            <?php if ( $settings['show_button'] == 'yes' ): ?>
                <div class="tf-button-container">
                    <a href="<?php echo esc_url( get_permalink() ) ?>" class="tf-btn">
                        <span><?php echo esc_attr( $settings['button_text'] ); ?></span>
                        <i class="icon-micare-arrow-right"></i>
                    </a>
                </div>
            <?php endif; ?>



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


