<?php

class TFIconPopup_Widget extends \Elementor\Widget_Base {



	public function get_name() {

        return 'tf-icon-popup';

    }

    

    public function get_title() {

        return esc_html__( 'TF Icon Popup', 'themesflat-core' );

    }



    public function get_icon() {

        return 'eicon-icon-box';

    }

    

    public function get_categories() {

        return [ 'themesflat_addons' ];

    }



    public function get_style_depends() {

		return ['tf-step'];

	}



	protected function register_controls() {

		// Start List Setting        

			$this->start_controls_section( 'section_setting',

	            [

	                'label' => esc_html__('Setting', 'themesflat-core'),

	            ]

	        );



			$this->add_control(

				'icon_style',

				[

					'label' => esc_html__( 'Icon Style', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::CHOOSE,

					'options' => [

						'icon' => [

							'title' => esc_html__( 'Icon', 'themesflat-core' ),

							'icon' => 'fa fa-paint-brush',

						],

						'image' => [

							'title' => esc_html__( 'Image', 'themesflat-core' ),

							'icon' => 'eicon-image',

						],

					],

					'default' => 'icon',

					'toggle' => false,

				]

			);



			$this->add_control(

				'set_active',

				[

					'label' => esc_html__( 'Set Active', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SWITCHER,

					'label_on' => esc_html__( 'Inactive', 'themesflat-core' ),

					'label_off' => esc_html__( 'Active', 'themesflat-core' ),

					'return_value' => 'active',

					'default' => 'inactive',

				]

			);



            $this->add_control(

				'icon',

				[

					'label' => esc_html__( 'Icon', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::ICONS,

					'default' => [

						'value' => 'icon-micare-ona-61',

						'library' => 'micare_icon',

					],

					'condition' => [

						'icon_style' => 'icon',

					],

				]

			);



			$this->add_control(

				'image',

				[

					'label' => esc_html__( 'Choose Image', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::MEDIA,

					'default' => [

						'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/placeholder.jpg",

					],

					'condition' => [

						'icon_style' => 'image',

					],

				]

			);



			$this->add_group_control(

				\Elementor\Group_Control_Image_Size::get_type(),

				[

					'name' => 'thumbnail',

					'include' => [],

					'default' => 'large',

				]

			);



            $repeater = new \Elementor\Repeater();



			$repeater->add_control(

				'icon_content',

				[

					'label' => esc_html__( 'Icon', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::ICONS,

                    'default' => [

						'value' => 'icon-micare-ona-51',

						'library' => 'micare_icon',

					],

				]

			);



            $repeater->add_control(

				'name',

				[

					'label' => esc_html__( 'Content', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::TEXT,

					'default' => esc_html__( 'Klara Södra 1, 111 52 Stockholm', 'themesflat-core' ),

					'label_block' => true,

				]

			);

	        

            $this->add_control(

				'list',

				[

					'label' => esc_html__( 'List', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::REPEATER,

					'fields' => $repeater->get_controls(),

					'default' => [

						[

							'name' => esc_html__( 'Klara Södra 1, 111 52 Stockholm', 'tf-addon-for-elementer' ),

						],

					],

				]

			);



			$this->end_controls_section();

        // /.End List Setting  



	    // Start Style Style

			$this->start_controls_section(

				'section_style',

				[

					'label' => esc_html__( 'Style', 'themesflat-core' ),

					'tab'   => \Elementor\Controls_Manager::TAB_STYLE,

				]

			);

			$this->add_control(

				'h_general',

				[

					'label' => esc_html__( 'Icon & Images', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

					'separator' => 'before',

				]

			);



			$this->add_control( 

	        	'image_size',

				[

					'label' => esc_html__( 'Image Size', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SLIDER,

					'size_units' => [ 'px' ],

					'range' => [

						'px' => [

							'min' => 0,

							'max' => 300,

							'step' => 1,

						],

					],

					'selectors' => [

						'{{WRAPPER}} .icon-popup-inner .icon img ' => 'width: {{SIZE}}{{UNIT}};',

					],

					'condition' => [

						'icon_style' => 'image',

					]

				]

			);



			$this->add_control( 

	        	'icon_size',

				[

					'label' => esc_html__( 'Icon Size', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SLIDER,

					'size_units' => [ 'px' ],

					'range' => [

						'px' => [

							'min' => 0,

							'max' => 300,

							'step' => 1,

						],

					],

					'selectors' => [

						'{{WRAPPER}} .icon-popup-inner .icon i ' => 'font-size: {{SIZE}}{{UNIT}};',

					],

					'condition' => [

						'icon_style' => 'icon',

					]

				]

			);



			$this->add_control( 

				'icon_color',

				[

					'label' => esc_html__( 'Icon Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .icon-popup-inner .icon i' => 'color: {{VALUE}}',

					],

				]

			);

			

			$this->add_control(

				'h_content',

				[

					'label' => esc_html__( 'Content', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

					'separator' => 'before',

				]

			);



			$this->add_control( 

				'content_bgcolor',

				[

					'label' => esc_html__( 'Background Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .icon-popup-inner .content, {{WRAPPER}} .icon-popup-inner .content::after' => 'background: {{VALUE}}',

					],

				]

			);



			$this->add_group_control( 

				\Elementor\Group_Control_Box_Shadow::get_type(),

				[

					'name' => 'content_box_shadow',

					'label' => esc_html__( 'Box Shadow', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .icon-popup-inner .content',

				]

			);



			$this->add_responsive_control( 

				'content_padding',

				[

					'label' => esc_html__( 'Padding', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'size_units' => [ 'px', 'em' ],

					'selectors' => [

						'{{WRAPPER}} .icon-popup-inner .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);



			$this->add_responsive_control( 

				'content_margin',

				[

					'label' => esc_html__( 'Margin', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'size_units' => [ 'px', 'em' ],

					'selectors' => [

						'{{WRAPPER}} .icon-popup-inner .content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);



			$this->add_control(

				'h_inner_content',

				[

					'label' => esc_html__( 'List icon', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

					'separator' => 'before',

				]

			);



			$this->add_control( 

	        	'icon_size2',

				[

					'label' => esc_html__( 'Icon Size', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SLIDER,

					'size_units' => [ 'px' ],

					'range' => [

						'px' => [

							'min' => 0,

							'max' => 300,

							'step' => 1,

						],

					],

					'selectors' => [

						'{{WRAPPER}} .icon-popup-inner .content ul li i ' => 'font-size: {{SIZE}}{{UNIT}};',

					],

				]

			);



			$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'inner_typography',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					

					'selector' => '{{WRAPPER}} .icon-popup-inner .content ul li',

				]

			);



			$this->add_control( 

				'icon_bgcolor',

				[

					'label' => esc_html__( 'Icon Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .icon-popup-inner .content ul li i' => 'color: {{VALUE}}',

					],

				]

			);



			$this->add_control( 

				'heading_bgcolor',

				[

					'label' => esc_html__( 'Text Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .icon-popup-inner .content ul li' => 'color: {{VALUE}}',

					],

				]

			);



			$this->end_controls_section();

		// /.End Style 

	}	



	protected function render($instance = []) {





		$this->add_render_attribute( 'tf_icon_popup', ['id' => "tf-icon-popup-{$this->get_id()}", 'class' => ['tf-icon-popup'], 'data-tabid' => $this->get_id() ] );

		$settings = $this->get_settings_for_display();	

		$icon = \Elementor\Addon_Elementor_Icon_manager_micare::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] );

		if ($settings['image'] != '') {

			$url = esc_attr($settings['image']['url']);

			$image = sprintf( '<img src="%1s" class="lazyload" alt="image">',$url);

		}



		if ($settings['icon_style'] == 'icon') {

			$icon_render = sprintf('<div class="icon">%1$s</div>',$icon);

		} elseif($settings['icon_style'] == 'image') {

			$icon_render = sprintf('<div class="icon">%1$s</div>', $image );

		}

        ?>

        <div <?php echo $this->get_render_attribute_string('tf_icon_popup') ?>>

				<div class="icon-popup-inner <?php echo $settings['set_active']; ?>">

					<?php echo $icon_render; ?>

					<div class="content">

						<ul>

							<?php foreach ( $settings['list'] as $key => $item ):  ?>

								<?php

									 $icon2 = \Elementor\Addon_Elementor_Icon_manager_micare::render_icon( $item['icon_content'], [ 'aria-hidden' => 'true' ] ); 

									 $icon2_render = ( $icon2 != '' ) ? $icon2 : '';

									 $name_render = ( $item['name'] != '' ) ? '<span>'.$item['name'].'</span>' : '';

								?>

								<li> <?php echo $icon2_render ?> <span><?php echo $name_render ?></span>  </li>

							<?php endforeach; ?>

						</ul>



					</div>

				</div>

	    </div>

        <?php 		

	}



}