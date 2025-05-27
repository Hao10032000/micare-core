            <div class="item-box-carousel">
                <div class="name"><?php echo esc_attr($carousel['name']); ?></div>
                 <div class="box-carousel-top">
                    <?php if ($icon_quote): ?>
                    <div class="icon-quote"><?php echo sprintf($icon_quote); ?></div>
                    <?php endif; ?>
                    <div class="sale"><?php echo esc_attr($carousel['title-sale']); ?></div>
                    <div class="description"><?php echo sprintf( '%1$s', $carousel['description'] ); ?></div>
                </div>
                <div class="box-carousel-bottom">
                     <div class="position"><?php echo wp_kses_post($carousel['position']); ?></div>                                                    
                     <a href="<?php echo wp_kses_post($carousel['link']); ?>" class="tf-btn"><?php echo wp_kses_post($carousel['btn-link']); ?></a>
                </div>         
            </div>