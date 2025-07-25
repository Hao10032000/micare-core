<?php 
if ( get_query_var('paged') ) {
    $paged = get_query_var('paged');
} elseif ( get_query_var('page') ) {
    $paged = get_query_var('page');
} else {
    $paged = 1;
}

$query_args = array(
    'post_type' => 'post',
    'posts_per_page' => $settings['posts_per_page'],
    'paged'     => $paged
);

if (! empty( $settings['posts_categories'] )) {
    $query_args['category_name'] = implode(',', $settings['posts_categories']);
}        

if ( ! empty( $settings['exclude'] ) ) {				
    if ( ! is_array( $settings['exclude'] ) )
        $exclude = explode( ',', $settings['exclude'] );

    $query_args['post__not_in'] = $exclude;
}

$query_args['orderby'] = $settings['order_by'];
$query_args['order'] = $settings['order'];	
$query = new WP_Query( $query_args );
?>

<?php 
$count = 0; 
while ( $query->have_posts() ) : $query->the_post();
    $count++;
    $get_id_post_thumbnail = get_post_thumbnail_id();
    $featured_image = sprintf('<img src="%s" class="lazyload" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings ));  
    $featured_image2 = sprintf(
        '<img src="%s" class="lazyload" alt="image">', 
        wp_get_attachment_image_src($get_id_post_thumbnail, 'themesflat-blog-feature')[0]
    );
    $archive_year  = get_the_time('Y'); 
    $archive_month = get_the_time('m'); 
    $archive_day   = get_the_time('d');
    
    if ( $count == 1 ): ?>
        <div class="content-left">
            <div class="featured-post">
                <a href="<?php echo esc_url( get_permalink() ) ?>">
                    <?php echo sprintf('%s',$featured_image2); ?>
                </a>
            </div>

            <div class="content">
                <?php if ( $settings['show_title'] == 'yes' ): ?>
                <h5 class="title"><a href="<?php echo esc_url( get_the_permalink() ); ?>"
                        title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo get_the_title(); ?></a></h5>
                <?php endif; ?>
                <?php if ( $settings['show_meta_category'] == 'yes' ): ?>
                <div class="post-category">
                    <?php if ( $settings['show_meta_user'] == 'yes' ): ?>
                    <div class="post-meta-author post-meta">
                        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
                            <?php echo esc_html__(' ', 'themesflat-core').'<span>'.get_the_author().'</span>'; ?></a>
                    </div>
                    <?php endif; ?>
                    <div class="post-meta-category post-meta">
                        <?php the_category( ', ' ); ?>
                    </div>
                    <?php if ( $settings['show_meta_date'] == 'yes' ): ?>
                    <div class="post-date-item post-meta">
                    <a href="<?php echo get_day_link($archive_year, $archive_month, $archive_day); ?>"><?php echo get_the_date('d F Y'); ?></a>
                    </div>
                    <?php endif; ?>

                    <?php if ( $settings['show_meta_comment'] == 'yes' ): ?>
                    <div class="post-meta-comment post-meta">
                        <?php echo comments_popup_link( esc_html__( '0 Comments ', 'tf-addon-for-elementer' ), esc_html__(  '1 Comment', 'tf-addon-for-elementer' ), esc_html__( '% Comments', 'tf-addon-for-elementer' ) ); ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <?php if ( $settings['show_excerpt'] == 'yes' ): ?>
                <div class="description"><?php echo wp_trim_words( get_the_content(), $settings['excerpt_lenght'], '' ); ?></div>
                <?php endif; ?>

                <?php if ( $settings['show_button'] == 'yes' && $settings['button_text'] != '' ): ?>
                <div class="tf-button-container">
                    <a href="<?php echo esc_url( get_permalink() ) ?>" class="tf-button tf-btn-blog">
                        <span><?php echo esc_attr( $settings['button_text'] ); ?></span>
                        <?php echo \Elementor\Addon_Elementor_Icon_manager_micare::render_icon( $settings['post_icon_readmore'], [ 'aria-hidden' => 'true' ] );?>
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="wrap-blog">
        <?php 
        continue; 
    endif;
    ?>

    <div class="entry blog-post">
        <?php if ( $settings['show_image'] == 'yes' ): ?>
        <div class="featured-post">
            <a href="<?php echo esc_url( get_permalink() ) ?>">
                <?php echo sprintf('%s',$featured_image); ?>
            </a>
        </div>
        <?php endif; ?>

        <div class="content">
            <?php if ( $settings['show_title'] == 'yes' ): ?>
            <h5 class="title"><a href="<?php echo esc_url( get_the_permalink() ); ?>"
                    title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo get_the_title(); ?></a></h5>
            <?php endif; ?>

            <?php if ( $settings['show_meta'] == 'yes' ): ?>
            <div class="post-category">
                <?php if ( $settings['show_meta_date'] == 'yes' ): ?>
                <div class="post-date-item post-meta">
                    <a href="<?php echo get_day_link($archive_year, $archive_month, $archive_day); ?>"><?php echo get_the_date(' d M Y'); ?></a>
                </div>
                <?php endif; ?>
                <?php if ( $settings['show_meta_category'] == 'yes' ): ?>
                <div class="post-meta-category post-meta">
                    <?php the_category( ', ' ); ?>
                </div>
                <?php endif; ?>
                <?php if ( $settings['show_meta_user'] == 'yes' ): ?>
                <div class="post-meta-author post-meta">
                    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
                        <?php echo esc_html__(' ', 'themesflat-core').'<span>'.get_the_author().'</span>'; ?></a>
                </div>
                <?php endif; ?>
                <?php if ( $settings['show_meta_comment'] == 'yes' ): ?>
                <div class="post-meta-comment post-meta">
                    <?php echo comments_popup_link( esc_html__( '0 Comments ', 'tf-addon-for-elementer' ), esc_html__(  '1 Comment', 'tf-addon-for-elementer' ), esc_html__( '% Comments', 'tf-addon-for-elementer' ) ); ?>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <?php if ( $settings['show_excerpt'] == 'yes' ): ?>
            <div class="description"><?php echo wp_trim_words( get_the_content(), $settings['excerpt_lenght'], '' ); ?></div>
            <?php endif; ?>

            <?php if ( $settings['show_button'] == 'yes' && $settings['button_text'] != '' ): ?>
            <div class="tf-button-container">
                <a href="<?php echo esc_url( get_permalink() ) ?>" class="tf-button tf-btn-blog">
                    <span><?php echo esc_attr( $settings['button_text'] ); ?></span>
                    <?php echo \Elementor\Addon_Elementor_Icon_manager_micare::render_icon( $settings['post_icon_readmore'], [ 'aria-hidden' => 'true' ] );?>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>

<?php endwhile; ?>
</div> 