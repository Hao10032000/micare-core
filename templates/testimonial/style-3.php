            <div class="item-testimonial">
                <div class="testimonial-top">
                    <?php if ( $settings['show_rating'] == 'yes' ): ?>
                    <div class="rating">
                        <span class="testimonial-star-rating"><span
                                style="width:<?php echo esc_attr($carousel['rating']); ?>%"></span></span>
                    </div>
                    <?php endif; ?>
                    <?php if ( $settings['show_sale'] == 'yes' ): ?>
                    <div class="sale"><?php echo esc_attr($carousel['title-sale']); ?></div>
                    <?php endif; ?>
                </div>

                <div class="testimonial-content">
                     <?php if ( $settings['show_avt'] == 'yes' ): ?>
                        <div class="avatar"><img src="<?php echo esc_attr($carousel['avatar']['url']); ?>" alt="image">
                        </div>
                        <?php endif; ?>
                     <div class="content-inner">                     
                        <?php if ( $settings['show_name'] == 'yes' ): ?>
                        <div class="name"><?php echo esc_attr($carousel['name']); ?></div>
                        <?php endif; ?>
                        <?php if ( $settings['show_position'] == 'yes' ): ?>
                        <div class="position"><?php echo esc_attr($carousel['position']); ?></div>
                        <?php endif; ?>
                    </div>

                </div>
                <div class="testimonial-bottom">
                    <?php if ( $settings['show_icon'] == 'yes' ): ?>
                    <?php if ($icon_quote): ?>
                    <div class="icon-quote"><?php echo sprintf($icon_quote); ?></div>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php if ( $settings['show_content'] == 'yes' ): ?>
                    <div class="description"><?php echo sprintf( '%1$s', $carousel['description'] ); ?></div>
                    <?php endif; ?>                
                </div>
            </div>