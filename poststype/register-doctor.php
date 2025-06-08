<?php

add_action('init', 'themesflat_register_doctor_post_type');

/**

  * Register project post type

*/

function themesflat_register_doctor_post_type() {

    /*doctor*/

    $doctor_slug = safe_themesflat_get_opt('doctor_slug', 'doctor');

    $labels = array(

        'name'                  => esc_html__( 'Doctor', 'themesflat' ),

        'singular_name'         => esc_html__( 'Doctor', 'themesflat' ),

        'menu_name'             => esc_html__( 'Doctor', 'themesflat' ),

        'add_new'               => esc_html__( 'New Doctor', 'themesflat' ),

        'add_new_item'          => esc_html__( 'Add New Doctor', 'themesflat' ),

        'new_item'              => esc_html__( 'New Doctor Item', 'themesflat' ),

        'edit_item'             => esc_html__( 'Edit Doctor Item', 'themesflat' ),

        'view_item'             => esc_html__( 'View Doctor', 'themesflat' ),

        'all_items'             => esc_html__( 'All Doctor', 'themesflat' ),

        'search_items'          => esc_html__( 'Search Doctor', 'themesflat' ),

        'not_found'             => esc_html__( 'No Doctor Items Found', 'themesflat' ),

        'not_found_in_trash'    => esc_html__( 'No Doctor Items Found In Trash', 'themesflat' ),

        'parent_item_colon'     => esc_html__( 'Parent Doctor:', 'themesflat' )



    );

    $args = array(

        'labels'        => $labels,

        'rewrite'       => array( 'slug' => $doctor_slug ),        

        'supports'    => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'elementor' ),

        'public'        => true,

        'show_in_rest' => true,

        'has_archive' => true

    );

    register_post_type( 'doctor', $args );

    flush_rewrite_rules();

}



add_filter( 'post_updated_messages', 'themesflat_doctor_updated_messages' );

/**

  * doctor update messages.

*/

function themesflat_doctor_updated_messages ( $messages ) {

    Global $post, $post_ID;

    $messages[esc_html__( 'doctor' )] = array(

        0  => '',

        1  => sprintf( esc_html__( 'doctor Updated. <a href="%s">View doctor</a>', 'themesflat' ), esc_url( get_permalink( $post_ID ) ) ),

        2  => esc_html__( 'Custom Field Updated.', 'themesflat' ),

        3  => esc_html__( 'Custom Field Deleted.', 'themesflat' ),

        4  => esc_html__( 'doctor Updated.', 'themesflat' ),

        5  => isset( $_GET['revision']) ? sprintf( esc_html__( 'doctor Restored To Revision From %s', 'themesflat' ), wp_post_revision_title((int)$_GET['revision'], false)) : false,

        6  => sprintf( esc_html__( 'doctor Published. <a href="%s">View doctor</a>', 'themesflat' ), esc_url( get_permalink( $post_ID ) ) ),

        7  => esc_html__( 'doctor Saved.', 'themesflat' ),

        8  => sprintf( esc_html__('doctor Submitted. <a target="_blank" href="%s">Preview doctor</a>', 'themesflat' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),

        9  => sprintf( esc_html__( 'doctor Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview doctor</a>', 'themesflat' ),date_i18n( esc_html__( 'M j, Y @ G:i', 'themesflat' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),

        10 => sprintf( esc_html__( 'doctor Draft Updated. <a target="_blank" href="%s">Preview doctor</a>', 'themesflat' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),

    );

    return $messages;

}



add_action( 'init', 'themesflat_register_doctor_taxonomy' );

/**

  * Register doctor taxonomy

*/

function themesflat_register_doctor_taxonomy() {

    /*doctor Categories*/

    $doctor_cat_slug = 'doctor_category';    

    $labels = array(

        'name'                       => esc_html__( 'Doctor Categories', 'themesflat' ),

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

        'rewrite'       => array('slug'=>$doctor_cat_slug),

        'hierarchical'  => true,

        'show_in_rest'  => true,

    );

    register_taxonomy( 'doctor_category', 'doctor', $args );

    flush_rewrite_rules();

}



add_action( 'init', 'themesflat_register_doctor_tag' );

/**

 * Register tag taxonomy

 */

function themesflat_register_doctor_tag() {

    $doctor_tag_slug = 'doctor_tag';



    $labels = array(

        'name'                       => esc_html__( 'Doctor Tags', 'themesflat' ),

        'singular_name'              => esc_html__( 'Doctor Tags', 'themesflat' ),

        'search_items'               => esc_html__( 'Search Tags', 'themesflat' ),        

        'all_items'                  => esc_html__( 'All Tags', 'themesflat' ),

        'new_item_name'              => esc_html__( 'Add New Tag', 'themesflat' ),

        'add_new_item'               => esc_html__( 'New Tag Name', 'themesflat' ),

        'edit_item'                  => esc_html__( 'Edit Tag', 'themesflat' ),

        'update_item'                => esc_html__( 'Update Tag', 'themesflat' ),

        'menu_name'                  => esc_html__( 'Tags' ),

    );

    $args = array(

        'labels'       => $labels,

        'rewrite'       => array('slug'=>$doctor_tag_slug),

        'hierarchical' => true,

        'show_in_rest'  => true,

    );

    register_taxonomy( 'doctor_tag', 'doctor', $args );

    flush_rewrite_rules();

}



function social_doctor_meta() {



    add_meta_box(

		'doctor_custom_field',       

		'Information doctor',                  

		'doctor_custom_metabox',  

		'doctor',                 

		'normal',                

		'high'                     

	);



	add_meta_box(

		'facebook_social_name',       

		'Social Select Field 1',                  

		'facebook_doctor_metabox',  

		'doctor',                 

		'normal',                

		'high'                     

	);



    add_meta_box(

		'twitter_social_name',       

		'Social Select Field 2',                  

		'twitter_doctor_metabox',  

		'doctor',                 

		'normal',                

		'high'                     

	);



    add_meta_box(

		'linkedin_social_name',       

		'Social Select Field 3',                  

		'linkedin_doctor_metabox',  

		'doctor',                 

		'normal',                

		'high'                     

	);



    add_meta_box(

		'youtube_social_name',       

		'Social Select Field 4',                  

		'youtube_doctor_metabox',  

		'doctor',                 

		'normal',                

		'high'                     

	);



    add_meta_box(

		'custom1_doctor_metabox',       

		'Social Select Field 5',                  

		'custom1_doctor_metabox',  

		'doctor',                 

		'normal',                

		'high'                     

	);



    add_meta_box(

		'custom2_doctor_metabox',       

		'Social Select Field 6',                  

		'custom2_doctor_metabox',  

		'doctor',                 

		'normal',                

		'high'                     

	);

}

add_action('add_meta_boxes', 'social_doctor_meta');



function doctor_custom_metabox() {

    global $post;


    $data_description = get_post_meta($post->ID, 'description_doctor_value', true);
	$data_position = get_post_meta($post->ID, 'position_doctor_value', true);

    // Use nonce for verification to secure data sending

    wp_nonce_field( basename( __FILE__ ), 'doctor_nonce' );



    ?>



<div class="inner-full" style="margin-bottom: 30px;">
        <label for="description_doctor" style="    display: block;font-size: 18px;font-weight: 600;color: #3C210E;text-transform: capitalize;    margin-bottom: 20px;"><?php esc_html_e( 'Description', 'themesflat' ) ?></label>
        <textarea name="description_doctor_value" id="description_doctor" style="    border: 1px solid #E4E4E4; background-color: #f6f6f6; padding: 16px 20px 16px 20px;">
            <?php echo (isset($data_description)) ? $data_description : ''; ?>
        </textarea>
    </div>

    <div class="inner-full" style="margin-bottom: 30px;">
<label for="position_doctor" style="    display: block;font-size: 18px;font-weight: 600;color: #3C210E;text-transform: capitalize;    margin-bottom: 20px;"><?php esc_html_e( 'Position', 'themesflat' ) ?></label>
            <input type="text" id="position_doctor" name="position_doctor_value"  value="<?php echo (isset($data_position)) ? $data_position : ''; ?>" style="    border: 1px solid #E4E4E4; background-color: #f6f6f6; padding: 16px 20px 16px 20px;">
    </div>

    <?php

}



function facebook_doctor_metabox() {

    global $post;

	$data = get_post_meta($post->ID, 'facebook_doctor_value', true);

	$icon = get_post_meta($post->ID, 'facebook_icon_value', true);

    // Use nonce for verification to secure data sending

    wp_nonce_field( basename( __FILE__ ), 'doctor_nonce' );



    ?>



    <div class="group-form-select-social" style="display: flex;

    align-items: center;

    gap: 20px;">

        <select style="font-family: 'micare';     border-radius: 999px;

    padding: 4px 10px;

    margin-bottom: 15px;" name="facebook_icon_value" class="select-icon">

            <option value="">Select Icon</option>

            <option value="facebook" <?php selected($icon, 'facebook'); ?>>&#xe989; Facebook</option>

            <option value="instagram" <?php selected($icon, 'instagram'); ?>>&#xe9cf; Instagram</option>

            <option value="linkedin" <?php selected($icon, 'linkedin'); ?>>&#xe9d1; Linkedin</option>

            <option value="twitter" <?php selected($icon, 'twitter'); ?>>&#xe900; Twitter</option>

            <option value="google-plus" <?php selected($icon, 'google-plus'); ?>>&#xe9f6; Google / Gmail</option>

            <option value="youtube" <?php selected($icon, 'youtube'); ?>>&#xe9ef; Youtube</option>

            <option value="skype" <?php selected($icon, 'skype'); ?>>&#xe9ee; Skype</option>

        </select>

        <input type="text" name="facebook_doctor_value" placeholder="www.facebook.com" value="<?php echo (isset($data)) ? $data : ''; ?>" style="    border: 1px solid #E4E4E4; background-color: #f6f6f6; padding: 16px 20px 16px 20px;">

    </div>



    <?php

}



function twitter_doctor_metabox() {

    global $post;

	$data = get_post_meta($post->ID, 'twitter_doctor_value', true);

	$icon = get_post_meta($post->ID, 'twitter_icon_value', true);

    // Use nonce for verification to secure data sending

    wp_nonce_field( basename( __FILE__ ), 'doctor_nonce' );



    ?>

    <div class="group-form-select-social" style="display: flex;

    align-items: center;

    gap: 20px;">

        <select style="font-family: 'micare';     border-radius: 999px;

    padding: 4px 10px;

    margin-bottom: 15px;" name="twitter_icon_value" class="select-icon">

<option value="">Select Icon</option>

<option value="facebook" <?php selected($icon, 'facebook'); ?>>&#xe989; Facebook</option>

<option value="instagram" <?php selected($icon, 'instagram'); ?>>&#xe9cf; Instagram</option>

<option value="linkedin" <?php selected($icon, 'linkedin'); ?>>&#xe9d1; Linkedin</option>

<option value="twitter" <?php selected($icon, 'twitter'); ?>>&#xe900; Twitter</option>

<option value="google-plus" <?php selected($icon, 'google-plus'); ?>>&#xe9f6; Google / Gmail</option>

<option value="youtube" <?php selected($icon, 'youtube'); ?>>&#xe9ef; Youtube</option>

<option value="skype" <?php selected($icon, 'skype'); ?>>&#xe9ee; Skype</option>

        </select>

    <input type="text" name="twitter_doctor_value" placeholder="twitter.com" value="<?php echo (isset($data)) ? $data : ''; ?>" style="    border: 1px solid #E4E4E4; background-color: #f6f6f6; padding: 16px 20px 16px 20px;">

    </div>

    <?php

}



function linkedin_doctor_metabox() {

    global $post;

	$data = get_post_meta($post->ID, 'linkedin_doctor_value', true);

	$icon = get_post_meta($post->ID, 'linkedin_icon_value', true);

    // Use nonce for verification to secure data sending

    wp_nonce_field( basename( __FILE__ ), 'doctor_nonce' );



    ?>



    <div class="group-form-select-social" style="display: flex;

    align-items: center;

    gap: 20px;">

        <select style="font-family: 'micare';     border-radius: 999px;

    padding: 4px 10px;

    margin-bottom: 15px;" name="linkedin_icon_value" class="select-icon">

<option value="">Select Icon</option>

<option value="facebook" <?php selected($icon, 'facebook'); ?>>&#xe989; Facebook</option>

<option value="instagram" <?php selected($icon, 'instagram'); ?>>&#xe9cf; Instagram</option>

<option value="linkedin" <?php selected($icon, 'linkedin'); ?>>&#xe9d1; Linkedin</option>

<option value="twitter" <?php selected($icon, 'twitter'); ?>>&#xe900; Twitter</option>

<option value="google-plus" <?php selected($icon, 'google-plus'); ?>>&#xe9f6; Google / Gmail</option>

<option value="youtube" <?php selected($icon, 'youtube'); ?>>&#xe9ef; Youtube</option>

<option value="skype" <?php selected($icon, 'skype'); ?>>&#xe9ee; Skype</option>

        </select>

    <input type="text" name="linkedin_doctor_value" placeholder="linkedin.com" value="<?php echo (isset($data)) ? $data : ''; ?>" style="    border: 1px solid #E4E4E4; background-color: #f6f6f6; padding: 16px 20px 16px 20px;">

    </div>



    <?php

}



function youtube_doctor_metabox() {

    global $post;

	$data = get_post_meta($post->ID, 'youtube_doctor_value', true);

	$icon = get_post_meta($post->ID, 'youtube_icon_value', true);

    // Use nonce for verification to secure data sending

    wp_nonce_field( basename( __FILE__ ), 'doctor_nonce' );



    ?>



<div class="group-form-select-social" style="display: flex;

    align-items: center;

    gap: 20px;">

        <select style="font-family: 'micare';     border-radius: 999px;

    padding: 4px 10px;

    margin-bottom: 15px;" name="youtube_icon_value" class="select-icon">

<option value="">Select Icon</option>

<option value="facebook" <?php selected($icon, 'facebook'); ?>>&#xe989; Facebook</option>

<option value="instagram" <?php selected($icon, 'instagram'); ?>>&#xe9cf; Instagram</option>

<option value="linkedin" <?php selected($icon, 'linkedin'); ?>>&#xe9d1; Linkedin</option>

<option value="twitter" <?php selected($icon, 'twitter'); ?>>&#xe900; Twitter</option>

<option value="google-plus" <?php selected($icon, 'google-plus'); ?>>&#xe9f6; Google / Gmail</option>

<option value="youtube" <?php selected($icon, 'youtube'); ?>>&#xe9ef; Youtube</option>

<option value="skype" <?php selected($icon, 'skype'); ?>>&#xe9ee; Skype</option>

        </select>

    <input type="text" name="youtube_doctor_value" placeholder="youtube.com" value="<?php echo (isset($data)) ? $data : ''; ?>" style="    border: 1px solid #E4E4E4; background-color: #f6f6f6; padding: 16px 20px 16px 20px;">

    </div>



    <?php

}



function custom1_doctor_metabox() {

    global $post;

	$data = get_post_meta($post->ID, 'custom1_doctor_value', true);

	$icon = get_post_meta($post->ID, 'custom1_icon_value', true);

    // Use nonce for verification to secure data sending

    wp_nonce_field( basename( __FILE__ ), 'doctor_nonce' );



    ?>



<div class="group-form-select-social" style="display: flex;

    align-items: center;

    gap: 20px;">

        <select style="font-family: 'micare';     border-radius: 999px;

    padding: 4px 10px;

    margin-bottom: 15px;" name="custom1_icon_value" class="select-icon">

<option value="">Select Icon</option>

<option value="facebook" <?php selected($icon, 'facebook'); ?>>&#xe989; Facebook</option>

<option value="instagram" <?php selected($icon, 'instagram'); ?>>&#xe9cf; Instagram</option>

<option value="linkedin" <?php selected($icon, 'linkedin'); ?>>&#xe9d1; Linkedin</option>

<option value="twitter" <?php selected($icon, 'twitter'); ?>>&#xe900; Twitter</option>

<option value="google-plus" <?php selected($icon, 'google-plus'); ?>>&#xe9f6; Google / Gmail</option>

<option value="youtube" <?php selected($icon, 'youtube'); ?>>&#xe9ef; Youtube</option>

<option value="skype" <?php selected($icon, 'skype'); ?>>&#xe9ee; Skype</option>

        </select>

    <input type="text" name="custom1_doctor_value" placeholder="Link" value="<?php echo (isset($data)) ? $data : ''; ?>" style="    border: 1px solid #E4E4E4; background-color: #f6f6f6; padding: 16px 20px 16px 20px;">

    </div>



    <?php

}



function custom2_doctor_metabox() {

    global $post;

	$data = get_post_meta($post->ID, 'custom2_doctor_value', true);

	$icon = get_post_meta($post->ID, 'custom2_icon_value', true);

    // Use nonce for verification to secure data sending

    wp_nonce_field( basename( __FILE__ ), 'doctor_nonce' );



    ?>



<div class="group-form-select-social" style="display: flex;

    align-items: center;

    gap: 20px;">

        <select style="font-family: 'micare';     border-radius: 999px;

    padding: 4px 10px;

    margin-bottom: 15px;" name="custom2_icon_value" class="select-icon">

<option value="">Select Icon</option>

<option value="facebook" <?php selected($icon, 'facebook'); ?>>&#xe989; Facebook</option>

<option value="instagram" <?php selected($icon, 'instagram'); ?>>&#xe9cf; Instagram</option>

<option value="linkedin" <?php selected($icon, 'linkedin'); ?>>&#xe9d1; Linkedin</option>

<option value="twitter" <?php selected($icon, 'twitter'); ?>>&#xe900; Twitter</option>

<option value="google-plus" <?php selected($icon, 'google-plus'); ?>>&#xe9f6; Google / Gmail</option>

<option value="youtube" <?php selected($icon, 'youtube'); ?>>&#xe9ef; Youtube</option>

<option value="skype" <?php selected($icon, 'skype'); ?>>&#xe9ee; Skype</option>

        </select>

    <input type="text" name="custom2_doctor_value" placeholder="Link" value="<?php echo (isset($data)) ? $data : ''; ?>" style="    border: 1px solid #E4E4E4; background-color: #f6f6f6; padding: 16px 20px 16px 20px;">

    </div>



    <?php

}



function social_save_meta_fields( $post_id ) {



	// verify nonce

	if (!isset($_POST['doctor_nonce']) || !wp_verify_nonce($_POST['doctor_nonce'], basename(__FILE__)))

		return 'nonce not verified';

  

	// check autosave

	if ( wp_is_post_autosave( $post_id ) )

		return 'autosave';

  

	//check post revision

	if ( wp_is_post_revision( $post_id ) )

		return 'revision';

  

	// check permissions

	if ( 'doctor' == $_POST['post_type'] ) {

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
	update_post_meta( $post_id, 'description_doctor_value', wp_kses_post($_POST[ 'description_doctor_value' ]) );
	update_post_meta( $post_id, 'position_doctor_value', wp_kses_post($_POST[ 'position_doctor_value' ]) );


    // social

	update_post_meta( $post_id, 'facebook_icon_value', wp_kses_post($_POST[ 'facebook_icon_value' ]) );

	update_post_meta( $post_id, 'facebook_doctor_value', wp_kses_post($_POST[ 'facebook_doctor_value' ]) );

	update_post_meta( $post_id, 'twitter_icon_value', wp_kses_post($_POST[ 'twitter_icon_value' ]) );

	update_post_meta( $post_id, 'twitter_doctor_value', wp_kses_post($_POST[ 'twitter_doctor_value' ]) );

	update_post_meta( $post_id, 'linkedin_icon_value', wp_kses_post($_POST[ 'linkedin_icon_value' ]) );

	update_post_meta( $post_id, 'linkedin_doctor_value', wp_kses_post($_POST[ 'linkedin_doctor_value' ]) );

	update_post_meta( $post_id, 'youtube_icon_value', wp_kses_post($_POST[ 'youtube_icon_value' ]) );

	update_post_meta( $post_id, 'youtube_doctor_value', wp_kses_post($_POST[ 'youtube_doctor_value' ]) );

    update_post_meta( $post_id, 'custom1_icon_value', wp_kses_post($_POST[ 'custom1_icon_value' ]) );

	update_post_meta( $post_id, 'custom1_doctor_value', wp_kses_post($_POST[ 'custom1_doctor_value' ]) );

    update_post_meta( $post_id, 'custom2_icon_value', wp_kses_post($_POST[ 'custom2_icon_value' ]) );

	update_post_meta( $post_id, 'custom2_doctor_value', wp_kses_post($_POST[ 'custom2_doctor_value' ]) );


}



add_action( 'save_post', 'social_save_meta_fields' );