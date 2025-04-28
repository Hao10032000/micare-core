<?php 

add_filter( 'elementor/icons_manager/additional_tabs', 'themesflat_iconpicker_register' );



function themesflat_iconpicker_register( $icons = array() ) {

	

	$icons['theme_icon_extend'] = array(

		'name'          => 'theme_icon_extend',

		'label'         => esc_html__( 'micare Icon Extends', 'themesflat-elementor' ),

		'labelIcon'     => 'icon-micare-security',

		'prefix'        => '',

		'displayPrefix' => '',

		'url'           => THEMESFLAT_LINK_PLUGIN . 'css/icon-micare.css',

		'fetchJson'     => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME . 'assets/css/micare_fonts.json',

		'ver'           => '1.0.0',

	);

	$icons['theme_icon_extend_2'] = array(

		'name'          => 'theme_icon_extend_2',

		'label'         => esc_html__( 'micare Icon Extends 2', 'themesflat-elementor' ),

		'labelIcon'     => 'icon-micare2-cashbook2',

		'prefix'        => '',

		'displayPrefix' => '',

		'url'           => THEMESFLAT_LINK_PLUGIN . 'css/icon-micare1.css',

		'fetchJson'     => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME . 'assets/css/micare_fonts1.json',

		'ver'           => '1.0.0',

	);



	return $icons;

}
