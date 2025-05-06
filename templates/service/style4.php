<div class="item data-<?php echo esc_attr(get_the_ID()); ?>" >				

    <div class="services-post">


        <div class="content"> 


        <?php if ( $settings['show_icon'] == 'yes' ): ?>
                <?php if(!empty($icon)): ?>
                    <div class="icon">
                        <?php echo $icon; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <h5 class="title border_eff">

                <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>

            </h5>

            <div class="featured-post">

<a href="<?php echo get_the_permalink(); ?>">

<?php 

$get_id_post_thumbnail = get_post_thumbnail_id();

echo sprintf('<img src="%s" class="lazyload" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings ));

?>

</a>

</div>

            <?php if ( $settings['show_exc'] == 'yes' ): ?>

                <p class="description"><?php echo wp_trim_words( get_the_content(), $settings['excerpt_lenght'], '' ); ?></p>

            <?php endif; ?>



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