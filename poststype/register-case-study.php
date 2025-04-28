<?php

add_action('init', 'themesflat_register_case_study_post_type');

/**

  * Register project post type

*/

function themesflat_register_case_study_post_type() {

    $case_study_slug = themesflat_get_opt('case_study_slug', 'case-study');

    $labels = array(

        'name'                  => esc_html__( 'Case Study', 'themesflat' ),

        'singular_name'         => esc_html__( 'Case Study', 'themesflat' ),

        'menu_name'             => esc_html__( 'Case Study', 'themesflat' ),

        'add_new'               => esc_html__( 'New Case Study', 'themesflat' ),

        'add_new_item'          => esc_html__( 'Add New Case Study', 'themesflat' ),

        'new_item'              => esc_html__( 'New Case Study Item', 'themesflat' ),

        'edit_item'             => esc_html__( 'Edit Case Study Item', 'themesflat' ),

        'view_item'             => esc_html__( 'View Case Study', 'themesflat' ),

        'all_items'             => esc_html__( 'All Case Study', 'themesflat' ),

        'search_items'          => esc_html__( 'Search Case Study', 'themesflat' ),

        'not_found'             => esc_html__( 'No Case Study Items Found', 'themesflat' ),

        'not_found_in_trash'    => esc_html__( 'No Case Study Items Found In Trash', 'themesflat' ),

        'parent_item_colon'     => esc_html__( 'Parent Case Study:', 'themesflat' ),

        'not_found'             => esc_html__( 'No Case Study found', 'themesflat' ),

        'not_found_in_trash'    => esc_html__( 'No Case Study found in Trash', 'themesflat' )



    );

    $args = array(

        'labels'      => $labels,

        'supports'    => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'elementor'  ),

        'rewrite'       => array( 'slug' => $case_study_slug ),

        'public'      => true,   

        'show_in_rest' => true,  

        'has_archive' => true 

    );

    register_post_type( 'case-study', $args );

    flush_rewrite_rules();

}



add_filter( 'post_updated_messages', 'themesflat_case_study_updated_messages' );

/**

  * Case Study update messages.

*/

function themesflat_case_study_updated_messages ( $messages ) {

    Global $post, $post_ID;

    $messages[esc_html__( 'case-study' )] = array(

        0  => '',

        1  => sprintf( esc_html__( 'Case Study Updated. <a href="%s">View Case Study</a>', 'themesflat' ), esc_url( get_permalink( $post_ID ) ) ),

        2  => esc_html__( 'Custom Field Updated.', 'themesflat' ),

        3  => esc_html__( 'Custom Field Deleted.', 'themesflat' ),

        4  => esc_html__( 'Case Study Updated.', 'themesflat' ),

        5  => isset( $_GET['revision']) ? sprintf( esc_html__( 'Case Study Restored To Revision From %s', 'themesflat' ), wp_post_revision_title((int)$_GET['revision'], false)) : false,

        6  => sprintf( esc_html__( 'Case Study Published. <a href="%s">View Case Study</a>', 'themesflat' ), esc_url( get_permalink( $post_ID ) ) ),

        7  => esc_html__( 'Case Study Saved.', 'themesflat' ),

        8  => sprintf( esc_html__('Case Study Submitted. <a target="_blank" href="%s">Preview Case Study</a>', 'themesflat' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),

        9  => sprintf( esc_html__( 'Case Study Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Case Study</a>', 'themesflat' ),date_i18n( esc_html__( 'M j, Y @ G:i', 'themesflat' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),

        10 => sprintf( esc_html__( 'Case Study Draft Updated. <a target="_blank" href="%s">Preview Case Study</a>', 'themesflat' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),

    );

    return $messages;

}



add_action( 'init', 'themesflat_register_case_study_taxonomy' );

/**

  * Register project taxonomy

*/

function themesflat_register_case_study_taxonomy() {

    /*Case Study Categories*/    

    $case_study_cat_slug = 'case_study_category'; 

    $labels = array(

        'name'                       => esc_html__( 'Case Study Categories', 'themesflat' ),

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

        'rewrite'       => array('slug'=>$case_study_cat_slug),

        'hierarchical'  => true,

        'show_in_rest'  => true,

    );

    register_taxonomy( 'case_study_category', 'case-study', $args );

    flush_rewrite_rules();

}


function case_custom_meta() {

    add_meta_box(

		'case_custom_field',       

		'Information Case Study',                  

		'case_custom_metabox',  

		'case-study',                 

		'normal',                

		'high'                     

	);

}

add_action('add_meta_boxes', 'case_custom_meta');



function case_custom_metabox() {

    global $post;


	$data_desc = get_post_meta($post->ID, 'desc_case_value', true);
	$data_client = get_post_meta($post->ID, 'client_case_value', true);
	$data_date = get_post_meta($post->ID, 'date_case_value', true);
	$data_duration = get_post_meta($post->ID, 'duration_case_value', true);
	$data_location = get_post_meta($post->ID, 'location_case_value', true);

    // Use nonce for verification to secure data sending

    wp_nonce_field( basename( __FILE__ ), 'case_nonce' );



    ?>



    <div class="inner-full" style="margin-bottom: 30px;">
        <label for="desc_case" style="    display: block;font-size: 18px;font-weight: 600;color: #3C210E;text-transform: capitalize;    margin-bottom: 20px;"><?php esc_html_e( 'Description', 'themesflat' ) ?></label>
        <input type="text" id="desc_case" name="desc_case_value"  value="<?php echo (isset($data_desc)) ? $data_desc : ''; ?>" style="    border: 1px solid #E4E4E4; background-color: #f6f6f6; padding: 16px 20px 16px 20px;">
    </div>

    <div class="inner-full" style="margin-bottom: 30px;">
        <label for="client_case" style="    display: block;font-size: 18px;font-weight: 600;color: #3C210E;text-transform: capitalize;    margin-bottom: 20px;"><?php esc_html_e( 'Client Project', 'themesflat' ) ?></label>
        <input type="text" id="client_case" name="client_case_value"  value="<?php echo (isset($data_client)) ? $data_client : ''; ?>" style="    border: 1px solid #E4E4E4; background-color: #f6f6f6; padding: 16px 20px 16px 20px;">
    </div>

    <div class="inner-full" style="margin-bottom: 30px;">
        <label for="date_case" style="    display: block;font-size: 18px;font-weight: 600;color: #3C210E;text-transform: capitalize;    margin-bottom: 20px;"><?php esc_html_e( 'Start Date', 'themesflat' ) ?></label>
        <input type="text" id="date_case" name="date_case_value"  value="<?php echo (isset($data_date)) ? $data_date : ''; ?>" style="    border: 1px solid #E4E4E4; background-color: #f6f6f6; padding: 16px 20px 16px 20px;">
    </div>

    <div class="inner-full" style="margin-bottom: 30px;">
        <label for="duration_case" style="    display: block;font-size: 18px;font-weight: 600;color: #3C210E;text-transform: capitalize;    margin-bottom: 20px;"><?php esc_html_e( 'Duration', 'themesflat' ) ?></label>
        <input type="text" id="duration_case" name="duration_case_value"  value="<?php echo (isset($data_duration)) ? $data_duration : ''; ?>" style="    border: 1px solid #E4E4E4; background-color: #f6f6f6; padding: 16px 20px 16px 20px;">
    </div>

    <div class="inner-full" style="margin-bottom: 30px;">
        <label for="location_case" style="    display: block;font-size: 18px;font-weight: 600;color: #3C210E;text-transform: capitalize;    margin-bottom: 20px;"><?php esc_html_e( 'Location', 'themesflat' ) ?></label>
        <input type="text" id="location_case" name="location_case_value"  value="<?php echo (isset($data_location)) ? $data_location : ''; ?>" style="    border: 1px solid #E4E4E4; background-color: #f6f6f6; padding: 16px 20px 16px 20px;">
    </div>


    <?php

}


function case_save_meta_fields( $post_id ) {



	// verify nonce

	if (!isset($_POST['case_nonce']) || !wp_verify_nonce($_POST['case_nonce'], basename(__FILE__)))

		return 'nonce not verified';

  

	// check autosave

	if ( wp_is_post_autosave( $post_id ) )

		return 'autosave';

  

	//check post revision

	if ( wp_is_post_revision( $post_id ) )

		return 'revision';

  

	// check permissions

	if ( 'case-study' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) )

			return 'cannot edit page';

		} elseif ( ! current_user_can( 'edit_post', $post_id ) ) {

			return 'cannot edit post';

	}

  

    if (array_key_exists('wporg_field', $_POST)) {

        update_post_meta(

            $post_id,

            '_wporg_meta_key',

            $_POST['wporg_field']

        );

    }



    // information

	update_post_meta( $post_id, 'desc_case_value', wp_kses_post($_POST[ 'desc_case_value' ]) );
	update_post_meta( $post_id, 'client_case_value', wp_kses_post($_POST[ 'client_case_value' ]) );
	update_post_meta( $post_id, 'date_case_value', wp_kses_post($_POST[ 'date_case_value' ]) );
	update_post_meta( $post_id, 'duration_case_value', wp_kses_post($_POST[ 'duration_case_value' ]) );
	update_post_meta( $post_id, 'location_case_value', wp_kses_post($_POST[ 'location_case_value' ]) );



}



add_action( 'save_post', 'case_save_meta_fields' );


