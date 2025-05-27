<?php 

if(!function_exists('flat_get_post_page_content')){

    function flat_get_post_page_content( $slug ) {

        $content_post = get_posts(array(

            'name' => $slug,

            'posts_per_page' => 1,

            'post_type' => 'elementor_library',

            'post_status' => 'publish'

        ));

        if (array_key_exists(0, $content_post) == true) {

            $id = $content_post[0]->ID;

            return $id;

        }

    }

}



if(!function_exists('tf_header_enabled')){

    function tf_header_enabled() {

        $header_id = ThemesFlat_Addon_For_Elementor_micare::get_settings( 'type_header', '' );

        $status    = false;



        if ( '' !== $header_id ) {

            $status = true;

        }



        return apply_filters( 'tf_header_enabled', $status );

    }

}



if(!function_exists('tf_footer_enabled')){

    function tf_footer_enabled() {

        $header_id = ThemesFlat_Addon_For_Elementor_micare::get_settings( 'type_footer', '' );

        $status    = false;



        if ( '' !== $header_id ) {

            $status = true;

        }



        return apply_filters( 'tf_footer_enabled', $status );

    }

}



if(!function_exists('get_header_content')){

    function get_header_content() {

        $tf_get_header_id = ThemesFlat_Addon_For_Elementor_micare::tf_get_header_id();

        echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($tf_get_header_id);

    }

}



if(!function_exists('tf_get_template_widget')){

    function tf_get_template_widget($template_name, $args = null, $return = false){

        $template_file = $template_name . '.php';

        $default_folder = plugin_dir_path(__FILE__) . 'templates/';

        $theme_folder = apply_filters('tf_templates_folder', dirname(plugin_basename(__FILE__)));

        $template = locate_template($theme_folder . '/' . $template_file);

        if (!$template) {

            $template = $default_folder . $template_file;

        }

        if ($args && is_array($args)) {

            extract($args);

        }

        if ($return) {

            ob_start();

        }

        if (file_exists($template)) {

            include $template;

        }

        if ($return) {

            return ob_get_clean();

        }

        return null;

    }

}



// Get post views

// function themesflat_set_post_views($postID) {

//     $count_key = 'themesflat_post_views_count';

//     $count = get_post_meta($postID, $count_key, true);

//     if($count==''){

//         $count = 0;

//         delete_post_meta($postID, $count_key);

//         add_post_meta($postID, $count_key, '0');

//     }else{

//         $count++;

//         update_post_meta($postID, $count_key, $count);

//     }

// }

// remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);



// function themesflat_track_post_views ($post_id) {

//     if ( !is_single() ) return;

//     if ( empty ( $post_id) ) {

//         global $post;

//         $post_id = $post->ID;    

//     }

//     themesflat_set_post_views($post_id);

// }

// add_action( 'wp_head', 'themesflat_track_post_views');



// function themesflat_get_post_views($postID){

//     $count_key = 'themesflat_post_views_count';

//     $count = get_post_meta($postID, $count_key, true);

//     if($count==''){

//         delete_post_meta($postID, $count_key);

//         add_post_meta($postID, $count_key, '0');

//         return "0 View";

//     }

//     return $count.' Views';

// }



// Hide render sidebar container css

remove_filter( 'render_block', 'wp_render_layout_support_flag', 10, 2 );

remove_filter( 'render_block', 'gutenberg_render_layout_support_flag', 10, 2 );

remove_filter( 'render_block', 'wp_render_layout_support_flag', 10, 2 );



add_filter( 'render_block', function( $block_content, $block ) {

    if ( $block['blockName'] === 'core/group' ) {

        return $block_content;

    }



    return wp_render_layout_support_flag( $block_content, $block );

}, 10, 2 );

    function themesflat_post_navigation_postype() {
    $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous ) {
        return;
    }
    ?>
    <nav class="navigation post-type" role="navigation">
        <h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'themesflat-core' ); ?></h2>
        <ul class="nav-links clearfix">
            <?php if ( is_attachment() ) :

                $prevPost = get_adjacent_post( false, '', true );
                if ( is_object( $prevPost ) ) {
                    $prev_title = get_the_title( $prevPost->ID );
                }
                $prev_label = esc_html__( 'Published In', 'themesflat-core' );

                echo '<li class="post-navigation previous-post">';
                    echo '<div class="content">';
                        previous_post_link( '<div class="prev-button">%link</div>', $prev_label );
                        previous_post_link( '<div class="title-post border_eff">%link</div>', $prev_title );
                    echo '</div>';
                echo '</li>';

            else :

                $prevPost = get_adjacent_post( false, '', true );
                if ( is_object( $prevPost ) ) {
                    $prev_title = get_the_title( $prevPost->ID );
                    $prev_link = get_permalink( $prevPost->ID );

                    echo '<li class="post-navigation previous-post">';
                        echo '<div class="content">';
                            echo '<a href="' . esc_url( $prev_link ) . '" class="post-button prev-button">';
                                echo '<i class="icon-micare-chevron-left"></i>';
                            echo '</a>';
                            previous_post_link( '<div class="title-post border_eff">%link</div>', $prev_title );
                        echo '</div>';
                    echo '</li>';
                }

                $nextPost = get_adjacent_post( false, '', false );
                if ( is_object( $nextPost ) ) {
                    $next_title = get_the_title( $nextPost->ID );
                    $next_link = get_permalink( $nextPost->ID );

                    echo '<li class="post-navigation next-post">';
                        echo '<div class="content">';
                            echo '<a href="' . esc_url( $next_link ) . '" class="post-button next-button">';
                                echo '<i class="icon-micare-chevron-right"></i>';
                            echo '</a>';
                            next_post_link( '<div class="title-post border_eff">%link</div>', $next_title );
                        echo '</div>';
                    echo '</li>';
                }

            endif; ?>
        </ul><!-- .nav-links -->
    </nav><!-- .navigation -->
    <?php
}

function display_post_tags_links( $post_id, $taxonomy = 'post_tag' ) {
    $terms = get_the_terms( $post_id, $taxonomy );
    if ( $terms && ! is_wp_error( $terms ) ) {
        $links = array();
        foreach ( $terms as $term ) {
            $links[] = '<a href="' . esc_url( get_term_link($term) ) . '">' . esc_html( $term->name ) . '</a>';
        }
        echo implode( ', ', $links );
    }
}

    function get_current_project_info_shortcode() {
        if (!is_singular('case-study')) {
            return 'This shortcode is only used on the Project detail page.';
        }
    
        $post_id = get_the_ID();
        
        if (!$post_id) {
            return 'The Case Study empty';
        }
    
        $data_desc = get_post_meta($post_id, 'desc_case_value', true);
        $data_client = get_post_meta($post_id, 'client_case_value', true);
        $data_date = get_post_meta($post_id, 'date_case_value', true);
        $data_duration = get_post_meta($post_id, 'duration_case_value', true);
        $data_location = get_post_meta($post_id, 'location_case_value', true);
    
        ob_start();
        ?>
        <div class="project-info">
            <h5><?php esc_html_e('Case Details','themesflat-core') ?></h5>
            <ul class="list-infor">
                <?php if ($data_client): ?>
                    <li><div class="label"><?php esc_html_e('Client:','themesflat-core') ?></div> <span><?php echo $data_client; ?></span> </li>
                <?php endif; ?>
                    <li><div class="label"><?php esc_html_e('Tag:','themesflat-core') ?></div> <span><?php echo esc_attr ( the_terms( get_the_ID(), 'case_study_category', '', ', ', '' ) ); ?></span> </li>
                <?php if ($data_date): ?>
                    <li><div class="label"><?php esc_html_e('Start Day:','themesflat-core') ?></div> <span><?php echo $data_date; ?></span> </li>
                <?php endif; ?>
                <?php if ($data_duration): ?>
                    <li><div class="label"><?php esc_html_e('Duration:','themesflat-core') ?></div> <span><?php echo $data_duration; ?></span> </li>
                <?php endif; ?>
            </ul>
        </div>
        <?php
        return ob_get_clean();
    }
    add_shortcode('project_info', 'get_current_project_info_shortcode');

function my_custom_nav_menu_item_fields( $item_id, $item, $depth, $args ) {
    $custom_html = get_post_meta( $item_id, '_menu_item_custom_html', true );
    ?>
    <p class="description description-wide">
        <label for="edit-menu-item-custom-html-<?php echo $item_id; ?>">
            <?php _e( 'Custom HTML', 'themesflat-core' ); ?><br>
            <textarea id="edit-menu-item-custom-html-<?php echo $item_id; ?>" class="widefat edit-menu-item-custom-html" name="menu-item-custom-html[<?php echo $item_id; ?>]"><?php echo esc_textarea( $custom_html ); ?></textarea>
        </label>
    </p>
    <?php
}
add_action( 'wp_nav_menu_item_custom_fields', 'my_custom_nav_menu_item_fields', 10, 4 );

function my_update_custom_nav_menu_item( $menu_id, $menu_item_db_id ) {
    if ( isset( $_POST['menu-item-custom-html'][ $menu_item_db_id ] ) ) {
        update_post_meta( $menu_item_db_id, '_menu_item_custom_html', wp_kses_post( $_POST['menu-item-custom-html'][ $menu_item_db_id ] ) );
    }
}
add_action( 'wp_update_nav_menu_item', 'my_update_custom_nav_menu_item', 10, 2 );


function my_custom_nav_menu_output( $item_output, $item, $depth, $args ) {
    if ( 'custom' === $item->type ) {
        $custom_html = get_post_meta( $item->ID, '_menu_item_custom_html', true );
        if ( ! empty( $custom_html ) ) {
            $item_output = $custom_html;
        }
    }
    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'my_custom_nav_menu_output', 10, 4 );

