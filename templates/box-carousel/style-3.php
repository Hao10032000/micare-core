          <div class="item-box-carousel">
                <div class="position"><?php echo wp_kses_post($carousel['position']); ?></div> 
                <div class="inner-content">
                    <div class="sale"><?php echo esc_attr($carousel['title-sale']); ?></div> 
                    <div class="description"><?php echo sprintf( '%1$s', $carousel['description'] ); ?></div>
                </div>    
            </div>