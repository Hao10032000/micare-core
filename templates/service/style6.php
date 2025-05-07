<div class="item box-<?php echo esc_attr($count); ?>">				
    <div class="services-post hover-flash scale-hover">



        <div class="content"> 

            <div class="services-category"><?php echo esc_attr ( the_terms( get_the_ID(), 'services_category', '', ', ', '' ) ); ?></div>

            <h3 class="title">
                <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
            </h3>

            <?php if ( $settings['show_icon'] == 'yes' ): ?>
                <?php if(!empty($icon)): ?>
                    <div class="icon">
                        <?php echo $icon; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if ( $settings['show_exc'] == 'yes' ): ?>
                <p class="description"><?php echo wp_trim_words( get_the_content(), $settings['excerpt_lenght'], '' ); ?></p>
            <?php endif; ?>
        </div>

        <div class="featured-post">
            <a href="<?php echo get_the_permalink(); ?>">
                <?php 
                $get_id_post_thumbnail = get_post_thumbnail_id();
                echo sprintf('<img src="%s" class="lazyload" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings ));
                ?>
            </a>
            <?php if ( $settings['show_button'] == 'yes' ): ?>
                <div class="tf-button-container">
                    <a href="<?php echo esc_url( get_permalink() ) ?>" class="tf-button">
                        <i class="icon-micare-arrow-right"></i>
                    </a>
                </div>
            <?php endif; ?>
        </div>

    </div>
</div>

