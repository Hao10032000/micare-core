<div class="item">				

    <div class="portfolio-post scale-hover">

    <div class="featured-post">

        <a href="<?php echo get_the_permalink(); ?>">

            <?php 

            $get_id_post_thumbnail = get_post_thumbnail_id();

            echo sprintf('<img src="%s" class="lazyload" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings ));

            ?>

        </a>

    </div>

        <div class="content"> 

            <div class="category-portfolio"><?php echo esc_attr ( the_terms( get_the_ID(), 'portfolio_category', '', ', ', '' ) ); ?></div>

            <h5 class="title border_eff">
                <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
            </h5>

            <p class="description"><?php echo wp_trim_words( get_the_content(), $settings['excerpt_lenght'], '' ); ?></p>

            <?php if ( $settings['show_button'] == 'yes' ): ?>
                <div class="tf-button-container">
                    <a href="<?php echo esc_url( get_permalink() ) ?>" class="tf-btn">
                        <span><?php echo esc_attr( $settings['button_text'] ); ?></span>
                        <i class="icon-micare-arrow-right"></i>
                    </a>
                </div>
            <?php endif; ?>

        </div>

    </div>

</div>