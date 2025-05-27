<?php

class TFStepCarousel_Widget extends \Elementor\Widget_Base {



	public function get_name() {

        return 'tf-step-carousel-core';

    }

    

    public function get_title() {

        return esc_html__( 'TF Step Core', 'themesflat-core' );

    }



    public function get_icon() {

        return 'eicon-slider-push';

    }

    

    public function get_categories() {

        return [ 'themesflat_addons_core' ];

    }



    public function get_style_depends() {

		return ['owl-carousel','tf-testimonial1'];

	}



	public function get_script_depends() {

		return ['owl-carousel','tf-testimonial1'];

	}



	protected function register_controls() {

        // Start Carousel Setting        

			$this->start_controls_section( 

				'section_carousel',

	            [

	                'label' => esc_html__('Step Carousel', 'themesflat-core'),

	            ]

	        );   

			$this->add_control( 

				'show_name',

				[

					'label' => esc_html__( 'Show Name', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SWITCHER,

					'label_on' => esc_html__( 'Show', 'themesflat-core' ),

					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),

					'return_value' => 'yes',

					'default' => 'yes',

				]

			);



			$this->add_control( 

				'show_year',

				[

					'label' => esc_html__( 'Show Year', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SWITCHER,

					'label_on' => esc_html__( 'Show', 'themesflat-core' ),

					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),

					'return_value' => 'yes',

					'default' => 'yes',

				]

			);
		
			$repeater = new \Elementor\Repeater();

		

			$repeater->add_control(

				'name',

				[

					'label' => esc_html__( 'Name', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::TEXT,

					'default' => esc_html__( 'Eugene Freeman', 'themesflat-core' ),

				]

			);
			$repeater->add_control(

				'year',

				[

					'label' => esc_html__( 'Year', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::TEXT,

					'default' => esc_html__( 'Tincidunt', 'themesflat-core' ),

				]

			);
		

			$repeater->add_control(

				'description',

				[

					'label' => esc_html__( 'Description', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::WYSIWYG,

					'rows' => 10,

					'default' => esc_html__( 'Phasellus ultrices ut tortor at porta. Praesent maximus, lacus sed rutrum aliquet, lacus tellus tincidunt nisl, vitae molestie nisi sapien et dolor suspendisse mi est ', 'themesflat-core' ),

				]

			);

			$repeater->add_control(

				'images',

				[

					'label' => esc_html__( 'Thumbnails', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::MEDIA,

					'default' => [

						'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/default-team.jpg",

					],

				]

			);
			
			$this->add_control( 

				'carousel_list',

					[					

						'type' => \Elementor\Controls_Manager::REPEATER,

						'fields' => $repeater->get_controls(),

						'default' => [

							[ 

								'name' => 'Alice Guzman',

								'year' => '(1994)',

								'description'=> 'Phasellus ultrices ut tortor at porta. Praesent maximus, lacus sed rutrum aliquet, lacus tellus tincidunt nisl, vitae molestie nisi sapien et dolor suspendisse mi est',

							],

							[ 

								'name' => 'Kelly Coleman',

								'year' => '(1995)',

								'description'=> 'Phasellus ultrices ut tortor at porta. Praesent maximus, lacus sed rutrum aliquet, lacus tellus tincidunt nisl, vitae molestie nisi sapien et dolor suspendisse mi est',

							],

							[ 

								'name' => 'Eugene Freeman',

								'year' => '(1996)',

								'description'=> 'Phasellus ultrices ut tortor at porta. Praesent maximus, lacus sed rutrum aliquet, lacus tellus tincidunt nisl, vitae molestie nisi sapien et dolor suspendisse mi est',

							],

						],					

					]

				);

				



			

			$this->end_controls_section();

        // /.End Carousel	



        // Start Style        

			$this->start_controls_section( 

				'section_style',

	            [

	                'label' => esc_html__('Style', 'themesflat-core'),

	            ]

	        );	



	        $this->add_control(

				'h_general',

				[

					'label' => esc_html__( 'Content', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

				]

			);



			$this->add_control(

				'layout_align',

				[

					'label' => esc_html__( 'Alignment', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::CHOOSE,

					'options' => [

						'left'    => [

							'title' => esc_html__( 'Left', 'themesflat-core' ),

							'icon' => 'eicon-text-align-left',

						],

						'center' => [

							'title' => esc_html__( 'Center', 'themesflat-core' ),

							'icon' => 'eicon-text-align-center',

						],

						'right' => [

							'title' => esc_html__( 'Right', 'themesflat-core' ),

							'icon' => 'eicon-text-align-right',

						],

					],

					'selectors' => [

						'{{WRAPPER}} .step-carousel .item-step' => 'text-align: {{VALUE}}',

					],

				]

			);

			$this->add_responsive_control(

				'padding',

				[

					'label' => esc_html__( 'Padding', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'size_units' => [ 'px', '%', 'em' ],

					'selectors' => [

						'{{WRAPPER}}  .step-carousel .item-step' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);

			$this->add_responsive_control(

				'margin',

				[

					'label' => esc_html__( 'Margin', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'size_units' => [ 'px', '%', 'em' ],

					'selectors' => [

						'{{WRAPPER}} .step-carousel .item-step' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);

			$this->add_responsive_control(

				'border_radius',

				[

					'label' => esc_html__( 'Border Radius', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'size_units' => [ 'px', '%', 'em' ],

					'selectors' => [

						'{{WRAPPER}} .step-carousel .item-step ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);

	        $this->add_control(

				'h_name',

				[

					'label' => esc_html__( 'Name', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

					'separator' => 'before',

				]

			);

			$this->add_group_control(

				\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'name_typography',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .step-carousel .item .name',

				]

			);

			$this->add_control(

				'name_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .step-carousel .item .name' => 'color: {{VALUE}}',

					],

				]

			);

			$this->add_responsive_control(

				'name_margin',

				[

					'label' => esc_html__( 'Margin', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'size_units' => [ 'px', '%', 'em' ],

					'selectors' => [

						'{{WRAPPER}} .step-carousel .item .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);



			$this->add_control(

				'h_position',

				[

					'label' => esc_html__( 'Year', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

					'separator' => 'before',

				]

			);

			$this->add_group_control(

				\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'date_typography',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .step-carousel .item .date',

				]

			);

			$this->add_control(

				'date_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .step-carousel .item .date' => 'color: {{VALUE}}',

					],

				]

			);

			$this->add_responsive_control(

				'date_margin',

				[

					'label' => esc_html__( 'Margin', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'size_units' => [ 'px', '%', 'em' ],

					'selectors' => [

						'{{WRAPPER}} .step-carousel .item .date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);



			$this->add_control(

				'h_description',

				[

					'label' => esc_html__( 'Description', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

					'separator' => 'before',

				]

			);

			$this->add_group_control(

				\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'description_typography',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .step-carousel .item .description p, {{WRAPPER}} .step-carousel .item .description ul li',

				]

			);

	

			$this->add_control(

				'description_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .step-carousel .item .description p, {{WRAPPER}} .step-carousel .item .description ul li' => 'color: {{VALUE}}',

					],

				]

			);



			$this->add_responsive_control(

				'description_margin',

				[

					'label' => esc_html__( 'Margin', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'size_units' => [ 'px', '%', 'em' ],

					'selectors' => [

						'{{WRAPPER}} .step-carousel .item .description p, {{WRAPPER}} .step-carousel .item .description ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);





	        $this->end_controls_section();

        // /.End Style



        // Start Setting        

			$this->start_controls_section( 

				'section_setting',

	            [

	                'label' => esc_html__('Setting', 'themesflat-core'),

	            ]

	        );	



			$this->add_control( 

				'carousel_loop',

				[

					'label' => esc_html__( 'Loop', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SWITCHER,

					'label_on' => esc_html__( 'On', 'themesflat-core' ),

					'label_off' => esc_html__( 'Off', 'themesflat-core' ),

					'return_value' => 'yes',

					'default' => 'yes',				

				]

			);



			$this->add_control( 

				'carousel_auto',

				[

					'label' => esc_html__( 'Auto Play', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SWITCHER,

					'label_on' => esc_html__( 'On', 'themesflat-core' ),

					'label_off' => esc_html__( 'Off', 'themesflat-core' ),

					'return_value' => 'yes',

					'default' => 'yes',				

				]

			);	



			$this->add_control(

				'carousel_spacer',

				[

					'label' => esc_html__( 'Spacer', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::NUMBER,

					'min' => 0,

					'max' => 100,

					'step' => 1,

					'default' => 30,				

				]

			);



			$this->add_control( 

	        	'carousel_column_desk',

				[

					'label' => esc_html__( 'Columns Desktop', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SELECT,

					'default' => '1',

					'options' => [

						'1' => esc_html__( '1', 'themesflat-core' ),

						'2' => esc_html__( '2', 'themesflat-core' ),

						'3' => esc_html__( '3', 'themesflat-core' ),

						'4' => esc_html__( '4', 'themesflat-core' ),

						'5' => esc_html__( '5', 'themesflat-core' ),

						'6' => esc_html__( '6', 'themesflat-core' ),

					],				

				]

			);



			$this->add_control( 

	        	'carousel_column_tablet',

				[

					'label' => esc_html__( 'Columns Tablet', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SELECT,

					'default' => '1',

					'options' => [

						'1' => esc_html__( '1', 'themesflat-core' ),

						'2' => esc_html__( '2', 'themesflat-core' ),

						'3' => esc_html__( '3', 'themesflat-core' ),

						'4' => esc_html__( '4', 'themesflat-core' ),

						'5' => esc_html__( '5', 'themesflat-core' ),

						'6' => esc_html__( '6', 'themesflat-core' ),

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

						'3' => esc_html__( '3', 'themesflat-core' ),

						'4' => esc_html__( '4', 'themesflat-core' ),

						'5' => esc_html__( '5', 'themesflat-core' ),

						'6' => esc_html__( '6', 'themesflat-core' ),

					],				

				]

			);



			$this->add_control( 

	        	'index_active',

				[

					'label' => esc_html__( 'Index Active', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SELECT,

					'default' => '0',

					'options' => [

						'0' => esc_html__( '1', 'themesflat-core' ),

						'1' => esc_html__( '2', 'themesflat-core' ),

						'2' => esc_html__( '3', 'themesflat-core' ),

						'3' => esc_html__( '4', 'themesflat-core' ),

						'4' => esc_html__( '5', 'themesflat-core' ),

						'5' => esc_html__( '6', 'themesflat-core' ),

					],				

				]

			);



	        $this->end_controls_section();

        // /.End Setting



        // Start Arrow        

			$this->start_controls_section( 

				'section_arrow',

	            [

	                'label' => esc_html__('Arrow', 'themesflat-core'),

	            ]

	        );



	        $this->add_control( 

				'carousel_arrow',

				[

					'label' => esc_html__( 'Arrow', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SWITCHER,

					'label_on' => esc_html__( 'Show', 'themesflat-core' ),

					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),

					'return_value' => 'yes',

					'default' => 'no',				

					'description'	=> 'Just show when you have two slide',

					'separator' => 'before',

				]

			);


	        $this->add_responsive_control( 

	        	'carousel_arrow_fontsize',

				[

					'label' => esc_html__( 'Font Size', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SLIDER,

					'size_units' => [ 'px' ],

					'range' => [

						'px' => [

							'min' => 0,

							'max' => 100,

							'step' => 1,

						]

					],

					'default' => [

						'unit' => 'px',

						'size' => 15,

					],

					'selectors' => [

						'{{WRAPPER}} .step-carousel .owl-nav .owl-prev, {{WRAPPER}} .step-carousel .owl-nav .owl-next' => 'font-size: {{SIZE}}{{UNIT}};',

					],

					'condition' => [					

	                    'carousel_arrow' => 'yes',

	                ]

				]

			);



			$this->add_responsive_control( 

				'w_size_carousel_arrow',

				[

					'label' => esc_html__( 'Width', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SLIDER,

					'size_units' => [ 'px' ],

					'range' => [

						'px' => [

							'min' => 0,

							'max' => 200,

							'step' => 1,

						]

					],

					'default' => [

						'unit' => 'px',

						'size' => 45,

					],

					'selectors' => [

						'{{WRAPPER}} .step-carousel .owl-nav .owl-prev, {{WRAPPER}} .step-carousel .owl-nav .owl-next' => 'width: {{SIZE}}{{UNIT}};',

					],

					'condition' => [					

	                    'carousel_arrow' => 'yes',

	                ]

				]

			);



			$this->add_responsive_control( 

				'h_size_carousel_arrow',

				[

					'label' => esc_html__( 'Height', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SLIDER,

					'size_units' => [ 'px' ],

					'range' => [

						'px' => [

							'min' => 0,

							'max' => 200,

							'step' => 1,

						]

					],

					'default' => [

						'unit' => 'px',

						'size' => 45,

					],

					'selectors' => [

						'{{WRAPPER}} .step-carousel .owl-nav .owl-prev, {{WRAPPER}} .step-carousel .owl-nav .owl-next' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',

					],

					'condition' => [					

	                    'carousel_arrow' => 'yes',

	                ]

				]

			);	



			$this->add_responsive_control( 

				'carousel_arrow_horizontal_position_prev',

				[

					'label' => esc_html__( 'Horizontal Position Previous', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SLIDER,

					'size_units' => [ 'px', '%' ],

					'range' => [

						'px' => [

							'min' => -2000,

							'max' => 2000,

							'step' => 1,

						],

						'%' => [

							'min' => -100,

							'max' => 100,

						],

					],

					'default' => [

						'unit' => '%',

						'size' => 91,

					],

					'selectors' => [

						'{{WRAPPER}} .step-carousel .owl-nav .owl-prev' => 'left: {{SIZE}}{{UNIT}};',

					],

					'condition' => [					

	                    'carousel_arrow' => 'yes',

	                ]

				]

			);



			$this->add_responsive_control( 

				'carousel_arrow_horizontal_position_next',

				[

					'label' => esc_html__( 'Horizontal Position Next', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SLIDER,

					'size_units' => [ 'px', '%' ],

					'range' => [

						'px' => [

							'min' => -2000,

							'max' => 2000,

							'step' => 1,

						],

						'%' => [

							'min' => -100,

							'max' => 100,

						],

					],

					'default' => [

						'unit' => 'px',

						'size' => 0,

					],

					'selectors' => [

						'{{WRAPPER}} .step-carousel .owl-nav .owl-next' => 'right: {{SIZE}}{{UNIT}};',

					],

					'condition' => [					

	                    'carousel_arrow' => 'yes',

	                ]

				]

			);



			$this->add_responsive_control( 

				'carousel_arrow_vertical_position',

				[

					'label' => esc_html__( 'Vertical Position', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SLIDER,

					'size_units' => [ 'px', '%' ],

					'range' => [

						'px' => [

							'min' => -1000,

							'max' => 1000,

							'step' => 1,

						],

						'%' => [

							'min' => -100,

							'max' => 100,

						],

					],

					'default' => [

						'unit' => '%',

						'size' => 0,

					],

					'selectors' => [

						'{{WRAPPER}} .step-carousel .owl-nav .owl-prev, {{WRAPPER}} .step-carousel .owl-nav .owl-next' => 'top: {{SIZE}}{{UNIT}};',

					],

					'condition' => [					

	                    'carousel_arrow' => 'yes',

	                ]

				]

			);



			$this->start_controls_tabs( 

				'carousel_arrow_tabs',

				[

					'condition' => [

		                'carousel_arrow' => 'yes',	                

		            ]

				] );



				$this->start_controls_tab( 

					'carousel_arrow_normal_tab',

					[

						'label' => esc_html__( 'Normal', 'themesflat-core' ),						

					]

				);



				$this->add_control( 

					'carousel_arrow_color',

		            [

		                'label' => esc_html__( 'Color', 'themesflat-core' ),

		                'type' => \Elementor\Controls_Manager::COLOR,

		                'selectors' => [

							'{{WRAPPER}} .step-carousel .owl-nav .owl-prev, {{WRAPPER}} .step-carousel .owl-nav .owl-next' => 'color: {{VALUE}}',

						],

						'condition' => [

		                    'carousel_arrow' => 'yes',

		                ]

		            ]

		        );



		        $this->add_control( 

		        	'carousel_arrow_bg_color',

		            [

		                'label' => esc_html__( 'Background Color', 'themesflat-core' ),

		                'type' => \Elementor\Controls_Manager::COLOR,

		                'selectors' => [

							'{{WRAPPER}} .step-carousel .owl-nav .owl-prev, {{WRAPPER}} .step-carousel .owl-nav .owl-next' => 'background-color: {{VALUE}};',

						],

						'condition' => [

		                    'carousel_arrow' => 'yes',

		                ]

		            ]

		        );	



				$this->add_responsive_control( 

					'carousel_arrow_border_radius',

		            [

		                'label' => esc_html__( 'Border Radius', 'themesflat-core' ),

		                'type' => \Elementor\Controls_Manager::DIMENSIONS,

		                'size_units' => [ 'px', '%', 'em' ],

			            'default' => [

							'top' => "50",

							'right' => "50",

							'bottom' => "50",

							'left' => "50",

							'unit' => '%',

							'isLinked' => true,

						],

		                'selectors' => [

		                    '{{WRAPPER}} .step-carousel .owl-nav .owl-prev, {{WRAPPER}} .step-carousel .owl-nav .owl-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

		                ],

		                'condition' => [

		                    'carousel_arrow' => 'yes',

		                ]

		            ]

		        );



		        $this->end_controls_tab();



		        $this->start_controls_tab( 

			    	'carousel_arrow_hover_tab',

					[

						'label' => esc_html__( 'Hover', 'themesflat-core' ),

					]

				);



		    	$this->add_control( 

		    		'carousel_arrow_color_hover',

		            [

		                'label' => esc_html__( 'Color', 'themesflat-core' ),

		                'type' => \Elementor\Controls_Manager::COLOR,

		                'selectors' => [

							'{{WRAPPER}} .step-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .step-carousel .owl-nav .owl-next:hover' => 'color: {{VALUE}}',

							'{{WRAPPER}} .step-carousel .owl-nav .owl-prev.disabled, {{WRAPPER}} .step-carousel .owl-nav .owl-next.disabled' => 'color: {{VALUE}}',

						],

						'condition' => [

		                    'carousel_arrow' => 'yes',

		                ]

		            ]

		        );



		        $this->add_control( 

		        	'carousel_arrow_hover_bg_color',

		            [

		                'label' => esc_html__( 'Background Color', 'themesflat-core' ),

		                'type' => \Elementor\Controls_Manager::COLOR,

		                'default' => '',

		                'selectors' => [

							'{{WRAPPER}} .step-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .step-carousel .owl-nav .owl-next:hover' => 'background-color: {{VALUE}};',

							'{{WRAPPER}} .step-carousel .owl-nav .owl-prev.disabled, {{WRAPPER}} .step-carousel .owl-nav .owl-next.disabled' => 'background-color: {{VALUE}};',

						],

						'condition' => [

		                    'carousel_arrow' => 'yes',

		                ]

		            ]

		        );



		        $this->add_group_control( 

		        	\Elementor\Group_Control_Border::get_type(),

					[

						'name' => 'carousel_arrow_border_hover',

						'label' => esc_html__( 'Border', 'themesflat-core' ),

						'selector' => '{{WRAPPER}} .step-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .step-carousel .owl-nav .owl-next:hover, {{WRAPPER}} .step-carousel .owl-nav .owl-prev.disabled, {{WRAPPER}} .step-carousel .owl-nav .owl-next.disabled',

						'condition' => [

		                    'carousel_arrow' => 'yes',

		                ]

					]

				);



				$this->add_responsive_control( 

					'carousel_arrow_border_radius_hover',

		            [

		                'label' => esc_html__( 'Border Radius', 'themesflat-core' ),

		                'type' => \Elementor\Controls_Manager::DIMENSIONS,

		                'size_units' => [ 'px', '%', 'em' ],

		                'selectors' => [

		                    '{{WRAPPER}} .step-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .step-carousel .owl-nav .owl-next:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

		                    '{{WRAPPER}} .step-carousel .owl-nav .owl-prev.disabled, {{WRAPPER}} .step-carousel .owl-nav .owl-next.disabled' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

		                ],

		                'condition' => [

		                    'carousel_arrow' => 'yes',

		                ]

		            ]

		        );



	       		$this->end_controls_tab();



	        $this->end_controls_tabs();



	        $this->end_controls_section();

        // /.End Arrow



        // Start Bullets        

			$this->start_controls_section( 

				'section_bullets',

	            [

	                'label' => esc_html__('Bullets', 'themesflat-core'),

	            ]

	        );



			$this->add_control( 

				'carousel_bullets',

	            [

	                'label'         => esc_html__( 'Bullets', 'themesflat-core' ),

	                'type'          => \Elementor\Controls_Manager::SWITCHER,

	                'label_on'      => esc_html__( 'Show', 'themesflat-core' ),

	                'label_off'     => esc_html__( 'Hide', 'themesflat-core' ),

	                'return_value'  => 'yes',

	                'default'       => 'no',

	                'separator' => 'before',

	            ]

	        );        



			$this->add_responsive_control( 

				'carousel_bullets_horizontal_position',

				[

					'label' => esc_html__( 'Horizonta Offset', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SLIDER,

					'size_units' => [ 'px', '%' ],

					'range' => [

						'px' => [

							'min' => 0,

							'max' => 2000,

							'step' => 1,

						],

						'%' => [

							'min' => 0,

							'max' => 100,

						],

					],

					'default' => [

						'unit' => '%',

						'size' => 50,

					],

					'selectors' => [

						'{{WRAPPER}} .step-carousel .owl-dots' => 'left: {{SIZE}}{{UNIT}};',

					],

					'condition' => [					

	                    'carousel_bullets' => 'yes',

	                ]

				]

			);



			$this->add_responsive_control( 

				'carousel_bullets_vertical_position',

				[

					'label' => esc_html__( 'Vertical Offset', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SLIDER,

					'size_units' => [ 'px', '%' ],

					'range' => [

						'px' => [

							'min' => -200,

							'max' => 1000,

							'step' => 1,

						],

						'%' => [

							'min' => 0,

							'max' => 100,

						],

					],

					'default' => [

						'unit' => 'px',

						'size' => -20,

					],

					'selectors' => [

						'{{WRAPPER}} .step-carousel .owl-dots' => 'bottom: {{SIZE}}{{UNIT}};',

					],

					'condition' => [					

	                    'carousel_bullets' => 'yes',

	                ]

				]

			);



			$this->add_responsive_control( 

				'carousel_bullets_margin',

				[

					'label' => esc_html__( 'Spacing', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SLIDER,

					'size_units' => [ 'px' ],

					'range' => [

						'px' => [

							'min' => 0,

							'max' => 50,

							'step' => 1,

						],

					],

					'default' => [

						'unit' => 'px',

						'size' => 6,

					],

					'selectors' => [

						'{{WRAPPER}} .step-carousel .owl-dots .owl-dot' => 'margin: 0 {{SIZE}}{{UNIT}};',

					],

					'condition' => [

	                    'carousel_bullets' => 'yes',

	                ]

				]

			);



			$this->add_control( 

	        	'carousel_bullets_position',

				[

					'label' => esc_html__( 'Carousel Bullet Position', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SELECT,

					'default' => '0',

					'options' => [

						'0' => esc_html__( 'Horizon', 'themesflat-core' ),

						'90' => esc_html__( 'Vertical', 'themesflat-core' ),

					],	

					'selectors' => [

						'{{WRAPPER}} .step-carousel .owl-dots' => 'transform: rotate({{VALUE}}deg);',

					],			

				]

			);





			$this->start_controls_tabs( 

				'carousel_bullets_tabs',

					[

						'condition' => [						

		                    'carousel_bullets' => 'yes',

		                ]

					] );

				$this->start_controls_tab( 

					'carousel_bullets_normal_tab',

					[

						'label' => esc_html__( 'Normal', 'themesflat-core' ),						

					]

				);



				$this->add_responsive_control( 

		        	'w_size_carousel_bullets',

						[

							'label' => esc_html__( 'Width', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::SLIDER,

							'size_units' => [ 'px' ],

							'range' => [

								'px' => [

									'min' => 0,

									'max' => 100,

									'step' => 1,

								]

							],

							'default' => [

								'unit' => 'px',

								'size' => 8,

							],

							'selectors' => [

								'{{WRAPPER}} .step-carousel .owl-dots .owl-dot' => 'width: {{SIZE}}{{UNIT}};',

							],

							'condition' => [						

			                    'carousel_bullets' => 'yes',

			                ]

						]

				);			



				$this->add_responsive_control( 

					'h_size_carousel_bullets',

					[

						'label' => esc_html__( 'Height', 'themesflat-core' ),

						'type' => \Elementor\Controls_Manager::SLIDER,

						'size_units' => [ 'px' ],

						'range' => [

							'px' => [

								'min' => 0,

								'max' => 100,

								'step' => 1,

							]

						],

						'default' => [

							'unit' => 'px',

							'size' => 8,

						],

						'selectors' => [

							'{{WRAPPER}} .step-carousel .owl-dots .owl-dot' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',

						],

						'condition' => [					

		                    'carousel_bullets' => 'yes',

		                ]

					]

				);



				$this->add_control( 

					'carousel_bullets_bg_color',

		            [

		                'label' => esc_html__( 'Background Color', 'themesflat-core' ),

		                'type' => \Elementor\Controls_Manager::COLOR,

		                'selectors' => [

							'{{WRAPPER}} .step-carousel .owl-dots .owl-dot' => 'background-color: {{VALUE}};',

						],

						'condition' => [

		                    'carousel_bullets' => 'yes',

		                ]

		            ]

		        );



		        $this->add_group_control( 

		        	\Elementor\Group_Control_Border::get_type(),

					[

						'name' => 'carousel_bullets_border',

						'label' => esc_html__( 'Border', 'themesflat-core' ),

						'selector' => '{{WRAPPER}} .step-carousel .owl-dots .owl-dot',						

						'condition' => [

		                    'carousel_bullets' => 'yes',

		                ]

					]

				);



				$this->add_responsive_control( 

					'carousel_bullets_border_radius',

		            [

		                'label' => esc_html__( 'Border Radius', 'themesflat-core' ),

		                'type' => \Elementor\Controls_Manager::DIMENSIONS,

		                'size_units' => [ 'px', '%', 'em' ],

		                'default' => [

							'top' => '99',

							'right' => '99',

							'bottom' => '99',

							'left' => '99',

							'unit' => 'px',

							'isLinked' => true,

						],

		                'selectors' => [

		                    '{{WRAPPER}} .step-carousel .owl-dots .owl-dot, {{WRAPPER}} .step-carousel .owl-carousel .owl-dot.active::after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

		                ],

		                'condition' => [

		                    'carousel_bullets' => 'yes',

		                ]

		            ]

		        );



			    $this->end_controls_tab();



		        $this->start_controls_tab( 

		        	'carousel_bullets_hover_tab',

					[

						'label' => esc_html__( 'Active', 'themesflat-core' ),

					]

				);



				$this->add_responsive_control( 

		        	'w_size_carousel_bullets_active',

						[

							'label' => esc_html__( 'Width', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::SLIDER,

							'size_units' => [ 'px' ],

							'range' => [

								'px' => [

									'min' => 0,

									'max' => 100,

									'step' => 1,

								]

							],

							'default' => [

								'unit' => 'px',

								'size' => 7,

							],

							'selectors' => [

								'{{WRAPPER}} .step-carousel .owl-dots .owl-dot.active' => 'width: {{SIZE}}{{UNIT}};',

							],

							'condition' => [						

			                    'carousel_bullets' => 'yes',

			                ]

						]

				);



				$this->add_responsive_control( 

					'h_size_carousel_bullets_active',

					[

						'label' => esc_html__( 'Height', 'themesflat-core' ),

						'type' => \Elementor\Controls_Manager::SLIDER,

						'size_units' => [ 'px' ],

						'range' => [

							'px' => [

								'min' => 0,

								'max' => 100,

								'step' => 1,

							]

						],

						'default' => [

							'unit' => 'px',

							'size' => 8,

						],

						'selectors' => [

							'{{WRAPPER}} .step-carousel .owl-dots .owl-dot.active' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',

						],

						'condition' => [					

		                    'carousel_bullets' => 'yes',

		                ]

					]

				);



				$this->add_responsive_control( 

		        	'w_size_carousel_bullets_after',

						[

							'label' => esc_html__( 'Width Border', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::SLIDER,

							'size_units' => [ 'px' ],

							'range' => [

								'px' => [

									'min' => 0,

									'max' => 100,

									'step' => 1,

								]

							],

							'default' => [

								'unit' => 'px',

								'size' => 15,

							],

							'selectors' => [

								'{{WRAPPER}} .step-carousel .owl-carousel .owl-dot.active::after' => 'width: {{SIZE}}{{UNIT}};',

							],

							'condition' => [						

			                    'carousel_bullets' => 'yes',

			                ]

						]

				);			



				$this->add_responsive_control( 

					'h_size_carousel_bullets_after',

					[

						'label' => esc_html__( 'Height Border', 'themesflat-core' ),

						'type' => \Elementor\Controls_Manager::SLIDER,

						'size_units' => [ 'px' ],

						'range' => [

							'px' => [

								'min' => 0,

								'max' => 100,

								'step' => 1,

							]

						],

						'default' => [

							'unit' => 'px',

							'size' => 15,

						],

						'selectors' => [

							'{{WRAPPER}} .step-carousel .owl-carousel .owl-dot.active::after' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',

						],

						'condition' => [					

		                    'carousel_bullets' => 'yes',

		                ]

					]

				);



				$this->add_control( 

					'carousel_bullets_bg_color2',

		            [

		                'label' => esc_html__( 'Background Color Border', 'themesflat-core' ),

		                'type' => \Elementor\Controls_Manager::COLOR,

		                'selectors' => [

							'{{WRAPPER}} .step-carousel .owl-carousel .owl-dot.active::after' => 'border-color: {{VALUE}};',

						],

						'condition' => [

		                    'carousel_bullets' => 'yes',

		                ]

		            ]

		        );



				$this->add_control( 

					'size_carousel_bullets_active_scale_hover',

					[

						'label' => esc_html__( 'Scale', 'themesflat-core' ),

						'type' => \Elementor\Controls_Manager::SLIDER,

						'size_units' => [ 'px' ],

						'range' => [

							'px' => [

								'min' => 1,

								'max' => 2,

								'step' => 0.1,

							],

						],

						'default' => [

							'unit' => 'px',

							'size' => 1,

						],

						'selectors' => [

							'{{WRAPPER}} .step-carousel .owl-dots .owl-dot.active, {{WRAPPER}} .step-carousel .owl-dots .owl-dot:hover' => 'transform: scale({{SIZE}});',

						],

					]

				);	



	        	$this->add_control( 

	        		'carousel_bullets_hover_bg_color',

		            [

		                'label' => esc_html__( 'Background Color', 'themesflat-core' ),

		                'type' => \Elementor\Controls_Manager::COLOR,

		                'selectors' => [

							'{{WRAPPER}} .step-carousel .owl-dots .owl-dot:hover, {{WRAPPER}} .step-carousel .owl-dots .owl-dot.active' => 'background-color: {{VALUE}}',

						],

						'condition' => [

		                    'carousel_bullets' => 'yes',

		                ]

		            ]

		        );



	        	$this->add_group_control( 

	        		\Elementor\Group_Control_Border::get_type(),

					[

						'name' => 'carousel_bullets_border_hover',

						'label' => esc_html__( 'Border', 'themesflat-core' ),

						'selector' => '{{WRAPPER}} .step-carousel .owl-dots .owl-dot:hover, {{WRAPPER}} .step-carousel .owl-dots .owl-dot.active',

						'condition' => [

		                    'carousel_bullets' => 'yes',

		                ]

					]

				);



				$this->add_responsive_control( 

					'carousel_bullets_border_radius_hover',

		            [

		                'label' => esc_html__( 'Border Radius', 'themesflat-core' ),

		                'type' => \Elementor\Controls_Manager::DIMENSIONS,

		                'size_units' => [ 'px', '%', 'em' ],

		                'selectors' => [

		                    '{{WRAPPER}} .step-carousel .owl-dots .owl-dot:hover, {{WRAPPER}} .step-carousel .owl-dots .owl-dot.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

		                ],

		                'condition' => [

		                    'carousel_bullets' => 'yes',

		                ]

		            ]

		        );



				$this->end_controls_tab();



		    $this->end_controls_tabs();	



	        $this->end_controls_section();

        // /.End Bullets    

	    

	}



	protected function render($instance = []) {

		$settings = $this->get_settings_for_display();

		

		$carousel_arrow = 'no-arrow';

		if ( $settings['carousel_arrow'] == 'yes' ) {

			$carousel_arrow = 'has-arrow';

		}



		$carousel_bullets = 'no-bullets';

		if ( $settings['carousel_bullets'] == 'yes' ) {

			$carousel_bullets = 'has-bullets';

		}



		// $icon_quote = '';



		?>

<div class="tfc-testimonial-carousel  step-carousel <?php echo esc_attr($carousel_arrow); ?> <?php echo esc_attr($carousel_bullets); ?>"
    data-loop="<?php echo esc_attr($settings['carousel_loop']); ?>"
    data-auto="<?php echo esc_attr($settings['carousel_auto']); ?>"
    data-column="<?php echo esc_attr($settings['carousel_column_desk']); ?>"
    data-column2="<?php echo esc_attr($settings['carousel_column_tablet']); ?>"
    data-column3="<?php echo esc_attr($settings['carousel_column_mobile']); ?>"
    data-spacer="<?php echo esc_attr($settings['carousel_spacer']); ?>"
    data-prev_icon="icon-micare-left"
    data-next_icon="icon-micare-chev-righ"
    data-arrow="<?php echo esc_attr($settings['carousel_arrow']) ?>"
    data-bullets="<?php echo esc_attr($settings['carousel_bullets']) ?>"
    data-index_active="<?php echo esc_attr($settings['index_active']) ?>">

    <div class="owl-carousel owl-theme">

        <?php foreach ($settings['carousel_list'] as $carousel): ?>

        <div class="item">

			<div class="header-step">

			    <?php if ( $settings['show_year'] == 'yes' ): ?>

                	<div class="date"><?php echo esc_attr($carousel['year']); ?></div>

                <?php endif; ?>

				<?php if ( $settings['show_name'] == 'yes' ): ?>
                	<div class="name"><?php echo esc_attr($carousel['name']); ?></div>
                <?php endif; ?>
			</div>

			<div class="spacing">
				<div class="icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
					<circle cx="20" cy="20" r="20" fill="var(--theme-secondary-color)"/>
					<path d="M25.5938 15.625C25.75 15.4688 26 15.4688 26.125 15.625L27.0312 16.5C27.1562 16.6562 27.1562 16.9062 27.0312 17.0312L17.6562 26.4062C17.5 26.5625 17.2812 26.5625 17.125 26.4062L12.9375 22.25C12.8125 22.0938 12.8125 21.8438 12.9375 21.7188L13.8438 20.8125C13.9688 20.6875 14.2188 20.6875 14.375 20.8125L17.375 23.8438L25.5938 15.625Z" fill="white"/>
					</svg>
				</div>
			</div>

            <div class="item-step">


                	<div class="description"><?php echo sprintf( '%1$s', $carousel['description'] ); ?></div>


                <?php if ( !empty($carousel['images']) ): ?>
					<div class="features-post">
						<img src="<?php echo esc_attr($carousel['images']['url']); ?>" alt="image">
					</div>
                <?php endif; ?>

            </div>



        </div>

        <?php endforeach;?>

    </div>

</div>

<?php	

	}



}