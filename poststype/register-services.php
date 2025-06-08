<?php

add_action('init', 'themesflat_register_services_post_type');

/**

  * Register project post type

*/

function themesflat_register_services_post_type() {

    $services_slug = safe_themesflat_get_opt('services_slug', 'services');

    $labels = array(

        'name'                  => esc_html__( 'Services', 'themesflat' ),

        'singular_name'         => esc_html__( 'Services', 'themesflat' ),

        'menu_name'             => esc_html__( 'Services', 'themesflat' ),

        'add_new'               => esc_html__( 'New Services', 'themesflat' ),

        'add_new_item'          => esc_html__( 'Add New Services', 'themesflat' ),

        'new_item'              => esc_html__( 'New Services Item', 'themesflat' ),

        'edit_item'             => esc_html__( 'Edit Services Item', 'themesflat' ),

        'view_item'             => esc_html__( 'View Services', 'themesflat' ),

        'all_items'             => esc_html__( 'All Services', 'themesflat' ),

        'search_items'          => esc_html__( 'Search Services', 'themesflat' ),

        'not_found'             => esc_html__( 'No Services Items Found', 'themesflat' ),

        'not_found_in_trash'    => esc_html__( 'No Services Items Found In Trash', 'themesflat' ),

        'parent_item_colon'     => esc_html__( 'Parent Services:', 'themesflat' ),

        'not_found'             => esc_html__( 'No Services found', 'themesflat' ),

        'not_found_in_trash'    => esc_html__( 'No Services found in Trash', 'themesflat' )



    );

    $args = array(

        'labels'      => $labels,

        'supports'    => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'elementor'  ),

        'rewrite'       => array( 'slug' => $services_slug ),

        'public'      => true,   

        'show_in_rest' => true,  

        'has_archive' => true 

    );

    register_post_type( 'services', $args );

    flush_rewrite_rules();

}



add_filter( 'post_updated_messages', 'themesflat_services_updated_messages' );

/**

  * Services update messages.

*/

function themesflat_services_updated_messages ( $messages ) {

    Global $post, $post_ID;

    $messages[esc_html__( 'services' )] = array(

        0  => '',

        1  => sprintf( esc_html__( 'Services Updated. <a href="%s">View services</a>', 'themesflat' ), esc_url( get_permalink( $post_ID ) ) ),

        2  => esc_html__( 'Custom Field Updated.', 'themesflat' ),

        3  => esc_html__( 'Custom Field Deleted.', 'themesflat' ),

        4  => esc_html__( 'Services Updated.', 'themesflat' ),

        5  => isset( $_GET['revision']) ? sprintf( esc_html__( 'Services Restored To Revision From %s', 'themesflat' ), wp_post_revision_title((int)$_GET['revision'], false)) : false,

        6  => sprintf( esc_html__( 'Services Published. <a href="%s">View Services</a>', 'themesflat' ), esc_url( get_permalink( $post_ID ) ) ),

        7  => esc_html__( 'Services Saved.', 'themesflat' ),

        8  => sprintf( esc_html__('Services Submitted. <a target="_blank" href="%s">Preview Services</a>', 'themesflat' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),

        9  => sprintf( esc_html__( 'Services Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Services</a>', 'themesflat' ),date_i18n( esc_html__( 'M j, Y @ G:i', 'themesflat' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),

        10 => sprintf( esc_html__( 'Services Draft Updated. <a target="_blank" href="%s">Preview Services</a>', 'themesflat' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),

    );

    return $messages;

}



add_action( 'init', 'themesflat_register_services_taxonomy' );

/**

  * Register project taxonomy

*/

function themesflat_register_services_taxonomy() {

    /*Services Categories*/    

    $services_cat_slug = 'services_category'; 

    $labels = array(

        'name'                       => esc_html__( 'Services Categories', 'themesflat' ),

        'singular_name'              => esc_html__( 'Categories', 'themesflat' ),

        'search_items'               => esc_html__( 'Search Categories', 'themesflat' ),

        'menu_name'                  => esc_html__( 'Categories', 'themesflat' ),

        'all_items'                  => esc_html__( 'All Categories', 'themesflat' ),

        'parent_item'                => esc_html__( 'Parent Categories', 'themesflat' ),

        'parent_item_colon'          => esc_html__( 'Parent Categories:', 'themesflat' ),

        'new_item_name'              => esc_html__( 'New Categories Name', 'themesflat' ),

        'add_new_item'               => esc_html__( 'Add New Categories', 'themesflat' ),

        'edit_item'                  => esc_html__( 'Edit Categories', 'themesflat' ),

        'update_item'                => esc_html__( 'Update Categories', 'themesflat' ),

        'add_or_remove_items'        => esc_html__( 'Add or remove Categories', 'themesflat' ),

        'choose_from_most_used'      => esc_html__( 'Choose from the most used Categories', 'themesflat' ),

        'not_found'                  => esc_html__( 'No Categories found.' ),

        'menu_name'                  => esc_html__( 'Categories' ),

    );

    $args = array(

        'labels'        => $labels,

        'rewrite'       => array('slug'=>$services_cat_slug),

        'hierarchical'  => true,

        'show_in_rest'  => true,

    );

    register_taxonomy( 'services_category', 'services', $args );

    flush_rewrite_rules();

}

function register_services_metabox() {
    add_meta_box(
        'services_custom_field',       // ID của metabox
        'Information Services',        // Tiêu đề metabox
        'render_services_metabox',     // Callback hiển thị nội dung metabox
        'services',                     // Post type áp dụng
        'normal',                       // Vị trí
        'high'                          // Độ ưu tiên
    );
}
add_action('add_meta_boxes', 'register_services_metabox');

function render_services_metabox($post) {
    // Lấy dữ liệu đã lưu (nếu có)
    $features = get_post_meta($post->ID, 'features_services_value', true);

    // Nonce để xác minh bảo mật
    wp_nonce_field(basename(__FILE__), 'services_nonce');

    ?>
    <div class="inner-full" style="margin-bottom: 30px;">
        <label for="features_services" style="display: block; font-size: 18px; font-weight: 600; color: #3C210E; text-transform: capitalize; margin-bottom: 20px;">
            <?php esc_html_e('Features', 'themesflat'); ?>
        </label>
        <textarea id="features_services" name="features_services_value" style="width: 100%; height: 150px; border: 1px solid #E4E4E4; background-color: #f6f6f6; padding: 16px 20px;">
            <?php echo esc_textarea($features); ?>
        </textarea>
    </div>
    <?php
}

function save_services_metabox($post_id) {
    // Kiểm tra nonce
    if (!isset($_POST['services_nonce']) || !wp_verify_nonce($_POST['services_nonce'], basename(__FILE__))) {
        return;
    }

    // Kiểm tra autosave
    if (wp_is_post_autosave($post_id)) {
        return;
    }

    // Kiểm tra revision
    if (wp_is_post_revision($post_id)) {
        return;
    }

    // Kiểm tra quyền sửa bài viết
    if (isset($_POST['post_type']) && 'services' === $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Lưu dữ liệu
    if (isset($_POST['features_services_value'])) {
        update_post_meta(
            $post_id,
            'features_services_value',
            wp_kses_post($_POST['features_services_value'])
        );
    }
}
add_action('save_post', 'save_services_metabox');

