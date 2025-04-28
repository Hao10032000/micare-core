<?php
class TFGroupFeatures_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-group-features';
    }
    
    public function get_title() {
        return esc_html__( 'TF Group Plugin Preview', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-slider-push';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons_core' ];
    }

	// public function get_script_depends() {
	// 	return ['tf-group-features'];
	// }

	protected function register_controls() {
        // Start Carousel Setting        
			$this->start_controls_section( 
				'section_carousel',
	            [
	                'label' => esc_html__('Group Plugin Preview', 'themesflat-core'),
	            ]
	        );

            $this->add_control(
				'image_main',
				[
					'label' => esc_html__( 'Main Logo', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => THEMESFLAT_URL."assets/img/placeholder.jpg",
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Image_Size::get_type(),
				[
					'name' => 'thumbnail',
					'include' => [],
					'default' => 'full',
				]
			);
			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'avatar',
				[
					'label' => esc_html__( 'Choose Logo', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/placeholder.jpg",
					],
				]
			);
			

			$repeater->add_control(
				'name',
				[
					'label' => esc_html__( 'Name Popup Tooltip', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Themesflat Plugin', 'themesflat-core' ),
				]
			);	

			$repeater->add_control(
				'link_name',
				[
					'label' => esc_html__( 'Link', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::URL,
					'placeholder' => esc_html__( 'https://your-link.com', 'themesflat-core' ),
				]
			);

			$this->add_control( 
				'carousel_list',
					[					
						'type' => \Elementor\Controls_Manager::REPEATER,
						'fields' => $repeater->get_controls(),
						'default' => [
							[ 
								'name' => 'Themesflat Team',
							],
							[ 
								'name' => 'Themesflat Team',
							],
							[ 
								'name' => 'Themesflat Team',
							],
						],					
					]
				);
				

			
			$this->end_controls_section();
        // /.End Carousel	

        // Start Setting        
			$this->start_controls_section( 
				'section_setting',
	            [
	                'label' => esc_html__('Setting', 'themesflat-core'),
	            ]
	        );	

			$this->add_control( 
	        	'carousel_column_desk',
				[
					'label' => esc_html__( 'Columns Desktop', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => '2',
					'options' => [
						'1' => esc_html__( '1', 'themesflat-core' ),
						'2' => esc_html__( '2', 'themesflat-core' ),
						'3' => esc_html__( '3', 'themesflat-core' ),
						'4' => esc_html__( '4', 'themesflat-core' ),
					],				
				]
			);

			$this->add_control( 
	        	'carousel_column_tablet',
				[
					'label' => esc_html__( 'Columns Tablet', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => '2',
					'options' => [
						'1' => esc_html__( '1', 'themesflat-core' ),
						'2' => esc_html__( '2', 'themesflat-core' ),
						'3' => esc_html__( '3', 'themesflat-core' ),
					],				
				]
			);

			$this->add_control( 
	        	'carousel_column_mobile',
				[
					'label' => esc_html__( 'Columns Mobile', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => '1',
					'options' => [
						'1' => esc_html__( '1', 'themesflat-core' ),
						'2' => esc_html__( '2', 'themesflat-core' ),
					],				
				]
			);

			$this->add_control(
				'spacing_item_carousel',
				[
					'label' => esc_html__( 'Spacing', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'min' => 0,
					'max' => 100,
					'step' => 1,
					'default' => 30,
				]
			);

	        $this->end_controls_section();
        // /.End Setting

	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();
        $image_main =  \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail','image_main' );
		?>
<div class="tf-group-features">
    <div class="image-main">
        <div class="inner">
            <a href="https://themeforest.net/user/themesflat/portfolio" target="__blank"
                aria-label="Themesflat Portfolio">
                <?php echo sprintf( '%1$s', $image_main ); ?>
            </a>
        </div>
    </div>
    <?php $count = 1; foreach ($settings['carousel_list'] as $carousel): 
		            $image =  \Elementor\Group_Control_Image_Size::get_attachment_image_html( $carousel, 'thumbnail','avatar' );
	            ?>

    <div class="item-plugin item<?php echo esc_attr($count); ?>">
        <a href="<?php echo esc_attr($carousel['link_name']['url']); ?>" class="inner">
            <?php echo sprintf( '%1$s', $image ); ?>
            <div class="tooltip"><?php echo esc_attr($carousel['name']); ?></div>
        </a>
    </div>
    <?php $count++; endforeach;?>

</div>
<?php	
	}

}