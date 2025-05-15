<?php

class TFCarouselBox_Widget extends \Elementor\Widget_Base {



	public function get_name() {

        return 'tf-carousel-box';

    }

    

    public function get_title() {

        return esc_html__( 'TF Carousel Box', 'themesflat-core' );

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

	                'label' => esc_html__('Testimonial Carousel', 'themesflat-core'),

	            ]

	        );



	        $this->add_control(

				'testimonial_style',

				[

					'label' => esc_html__( 'Layout Style', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SELECT,

					'default' => 'style-1',

					'options' => [

						'style-1'  => esc_html__( 'Style 1', 'themesflat-core' ),

						'style-2' => esc_html__( 'Style 2', 'themesflat-core' ),

						'style-3' => esc_html__( 'Style 3', 'themesflat-core' ),



					],

				]

			);	    


			$repeater = new \Elementor\Repeater();


          $repeater->add_control(
				'icon_quote',
				[
					'label' => esc_html__( 'Icon', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'icon-micare-Line-05',
						'library' => 'solid',
					],
				]
			);
			
			



			$repeater->add_control(

				'name',

				[

					'label' => esc_html__( 'Sale Off', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::TEXT,

					'default' => esc_html__( '40% OFF', 'themesflat-core' ),

				]

			);
			$repeater->add_control(

				'position',

				[

					'label' => esc_html__( 'Price', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::TEXT,

					'default' => esc_html__( 'Regular Price : $150', 'themesflat-core' ),

				]

			);
	
			$repeater->add_control(

				'title-sale',

				[

					'label' => esc_html__( 'Title', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::TEXT,

					'default' => esc_html__( 'MRI (Magnetic Resonance Imaging)', 'themesflat-core' ),

				]

			);	
			$repeater->add_control(

				'btn-link',

				[

					'label' => esc_html__( 'Button', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::TEXT,

					'default' => esc_html__( 'Booking For A Test', 'themesflat-core' ),

				]

			);
			$repeater->add_control(

				'link',

				[

					'label' => esc_html__( 'Link', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::TEXT,

					'default' => esc_html__( '#', 'themesflat-core' ),

				]

			);		




			$repeater->add_control(

				'description',

				[

					'label' => esc_html__( 'Description', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::WYSIWYG,

					'rows' => 10,

					'default' => esc_html__( 'Uses strong magnets & radio waves create detailed images.', 'themesflat-core' ),

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

								'position' => 'Designer manager',

								'description'=> 'Phasellus ultrices ut tortor at porta. Praesent maximus, lacus sed rutrum aliquet, lacus tellus tincidunt nisl, vitae molestie nisi sapien et dolor suspendisse mi est',

							],

							[ 

								'name' => 'Kelly Coleman',

								'position' => 'Designer manager',

								'description'=> 'Phasellus ultrices ut tortor at porta. Praesent maximus, lacus sed rutrum aliquet, lacus tellus tincidunt nisl, vitae molestie nisi sapien et dolor suspendisse mi est',

							],

							[ 

								'name' => 'Eugene Freeman',

								'position' => 'Designer manager',

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

					'label' => esc_html__( 'General', 'themesflat-core' ),

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

						'{{WRAPPER}} .tfc-carousel-box .item-box-carousel' => 'text-align: {{VALUE}}',

					],

				]

			);



			$this->add_group_control(

				\Elementor\Group_Control_Background::get_type(),

				[

					'name' => 'bg_image',

					'label' => esc_html__( 'Background', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .tfc-carousel-box .item-box-carousel',

				]

			);

			$this->add_group_control(

				\Elementor\Group_Control_Border::get_type(),

				[

					'name' => 'border',

					'label' => esc_html__( 'Border', 'plugin-domain' ),

					'selector' => '{{WRAPPER}} .tfc-carousel-box .item-box-carousel',

				]

			);

			$this->add_group_control(

				\Elementor\Group_Control_Box_Shadow::get_type(),

				[

					'name' => 'box_shadow',

					'label' => esc_html__( 'Box Shadow', 'plugin-domain' ),

					'selector' => '{{WRAPPER}} .tfc-carousel-box .item-box-carousel',

				]

			);

			// $this->add_control(

			// 	'background',

			// 	[

			// 		'label' => esc_html__( 'Background Color', 'themesflat-core' ),

			// 		'type' => \Elementor\Controls_Manager::COLOR,

			// 		'selectors' => [

			// 			'{{WRAPPER}} .tfc-carousel-box .item-box-carousel' => 'background-color: {{VALUE}}',

			// 		],

			// 	]

			// );

			$this->add_responsive_control(

				'padding',

				[

					'label' => esc_html__( 'Padding', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'size_units' => [ 'px', '%', 'em' ],

					'selectors' => [

						'{{WRAPPER}}  .tfc-carousel-box .item-box-carousel' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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

						'{{WRAPPER}} .tfc-carousel-box .item-box-carousel' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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

						'{{WRAPPER}} .tfc-carousel-box .item-box-carousel ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);


			$this->add_control(

				'content_tes',

				[

					'label' => esc_html__( 'Content', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

					'separator' => 'before',

				]

			);

			$this->add_responsive_control( 

				'content_border_radius',

				[

					'label' => esc_html__( 'Border Radius', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'size_units' => [ 'px', '%', 'em' ],

					'selectors' => [

						'{{WRAPPER}} .tfc-carousel-box .testimonial-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);

			$this->add_responsive_control(

				'content_margin',

				[

					'label' => esc_html__( 'Margin', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'size_units' => [ 'px', '%', 'em' ],

					'selectors' => [

						'{{WRAPPER}} .tfc-carousel-box .testimonial-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);

			$this->add_responsive_control(

				'content_padding',

				[

					'label' => esc_html__( 'Padding', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'size_units' => [ 'px', '%', 'em' ],

					'selectors' => [

						'{{WRAPPER}} .tfc-carousel-box .testimonial-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],


				]

			);

			$this->add_control(

				'content_bgcolor',

				[

					'label' => esc_html__( 'Background Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .tfc-carousel-box .testimonial-content' => 'background-color: {{VALUE}}',

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

					'selector' => '{{WRAPPER}} .tfc-carousel-box .item .name',

				]

			);

			$this->add_control(

				'name_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .tfc-carousel-box .item .name' => 'color: {{VALUE}}',

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

						'{{WRAPPER}} .tfc-carousel-box .item .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);



			$this->add_control(

				'h_position',

				[

					'label' => esc_html__( 'Position', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

					'separator' => 'before',

				]

			);

			$this->add_group_control(

				\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'position_typography',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .tfc-carousel-box .item .position',

				]

			);

			$this->add_control(

				'position_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .tfc-carousel-box .item .position' => 'color: {{VALUE}}',

					],

				]

			);

			$this->add_responsive_control(

				'position_margin',

				[

					'label' => esc_html__( 'Margin', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'size_units' => [ 'px', '%', 'em' ],

					'selectors' => [

						'{{WRAPPER}} .tfc-carousel-box .item .position' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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

					'selector' => '{{WRAPPER}} .tfc-carousel-box .item .description',

				]

			);

	

			$this->add_control(

				'description_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .tfc-carousel-box .item .description' => 'color: {{VALUE}}',

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

						'{{WRAPPER}} .tfc-carousel-box .item .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);



			



			$this->add_control(

				'title_tes',

				[

					'label' => esc_html__( 'Title Inner', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

					'separator' => 'before',


				]

			);

		

			$this->add_control(

				'title_tes_color',

				[

					'label' => esc_html__( 'Color Sale', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .tfc-carousel-box .sale' => 'color: {{VALUE}}',

					],


				]

			);



			$this->add_group_control(

				\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'name_typography_title',

					'label' => esc_html__( 'Typography Sale', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .tfc-carousel-box .sale',


				]

			);



			$this->add_responsive_control(

				'title_tes_margin',

				[

					'label' => esc_html__( 'Margin Sale ', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'size_units' => [ 'px', '%', 'em' ],

					'selectors' => [

						'{{WRAPPER}} .tfc-carousel-box .sale ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],


				]

			);
			$this->add_control(

				'border_bottom_color',

				[

					'label' => esc_html__( 'Color Border', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .tfc-carousel-box .testimonial-inner' => 'border-bottom: 1px solid {{VALUE}}',

					],


				]

			);
			$this->add_control(
				'h_rating',
				[
					'label' => esc_html__( 'Rating', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control(
				'rating_color',
				[
					'label' => esc_html__( 'Rating Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tfc-carousel-box .item .testimonial-star-rating' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_responsive_control(
				'rating_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tfc-carousel-box .rating ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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



	        $this->add_control( 

				'carousel_prev_icon', [

	                'label' => esc_html__( 'Prev Icon', 'themesflat-core' ),

	                'type' => \Elementor\Controls_Manager::ICON,

	                'default' => 'icon-micare-left',

	                'include' => [

						'fa fa-angle-double-left',

						'fa fa-angle-left',

						'fa fa-chevron-left',

						'fa fa-arrow-left',

						'icon-micare-left',

					],  

	                'condition' => [                	

	                    'carousel_arrow' => 'yes',

	                ]

	            ]

	        );



	    	$this->add_control( 

	    		'carousel_next_icon', [

	                'label' => esc_html__( 'Next Icon', 'themesflat-core' ),

	                'type' => \Elementor\Controls_Manager::ICON,

	                'default' => 'icon-micare-right',

	                'include' => [

						'fa fa-angle-double-right',

						'fa fa-angle-right',

						'fa fa-chevron-right',

						'fa fa-arrow-right',

						'icon-micare-right',

					], 

	                'condition' => [                	

	                    'carousel_arrow' => 'yes',

	                ]

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

						'{{WRAPPER}} .tfc-carousel-box .owl-nav .owl-prev, {{WRAPPER}} .tfc-carousel-box .owl-nav .owl-next' => 'font-size: {{SIZE}}{{UNIT}};',

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

						'{{WRAPPER}} .tfc-carousel-box .owl-nav .owl-prev, {{WRAPPER}} .tfc-carousel-box .owl-nav .owl-next' => 'width: {{SIZE}}{{UNIT}};',

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

						'{{WRAPPER}} .tfc-carousel-box .owl-nav .owl-prev, {{WRAPPER}} .tfc-carousel-box .owl-nav .owl-next' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',

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

						'{{WRAPPER}} .tfc-carousel-box .owl-nav .owl-prev' => 'left: {{SIZE}}{{UNIT}};',

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

						'{{WRAPPER}} .tfc-carousel-box .owl-nav .owl-next' => 'right: {{SIZE}}{{UNIT}};',

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

						'{{WRAPPER}} .tfc-carousel-box .owl-nav .owl-prev, {{WRAPPER}} .tfc-carousel-box .owl-nav .owl-next' => 'top: {{SIZE}}{{UNIT}};',

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

		                'default' => '#24283E',

		                'selectors' => [

							'{{WRAPPER}} .tfc-carousel-box .owl-nav .owl-prev, {{WRAPPER}} .tfc-carousel-box .owl-nav .owl-next' => 'color: {{VALUE}} !important',

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

							'{{WRAPPER}} .tfc-carousel-box .owl-nav .owl-prev, {{WRAPPER}} .tfc-carousel-box .owl-nav .owl-next' => 'background-color: {{VALUE}} !important;',

						],

						'condition' => [

		                    'carousel_arrow' => 'yes',

		                ]

		            ]

		        );	



		        $this->add_group_control( 

		        	\Elementor\Group_Control_Border::get_type(),

					[

						'name' => 'carousel_arrow_border',

						'label' => esc_html__( 'Border', 'themesflat-core' ),

						'selector' => '{{WRAPPER}} .tfc-carousel-box .owl-nav .owl-prev, {{WRAPPER}} .tfc-carousel-box .owl-nav .owl-next',

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

		                    '{{WRAPPER}} .tfc-carousel-box .owl-nav .owl-prev, {{WRAPPER}} .tfc-carousel-box .owl-nav .owl-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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

							'{{WRAPPER}} .tfc-carousel-box .owl-nav .owl-prev:hover, {{WRAPPER}} .tfc-carousel-box .owl-nav .owl-next:hover' => 'color: {{VALUE}} !important',

							'{{WRAPPER}} .tfc-carousel-box .owl-nav .owl-prev.disabled, {{WRAPPER}} .tfc-carousel-box .owl-nav .owl-next.disabled' => 'color: {{VALUE}} !important',

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

							'{{WRAPPER}} .tfc-carousel-box .owl-nav .owl-prev:hover, {{WRAPPER}} .tfc-carousel-box .owl-nav .owl-next:hover' => 'background-color: {{VALUE}} !important;',

							'{{WRAPPER}} .tfc-carousel-box .owl-nav .owl-prev.disabled, {{WRAPPER}} .tfc-carousel-box .owl-nav .owl-next.disabled' => 'background-color: {{VALUE}} !important;',

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

						'selector' => '{{WRAPPER}} .tfc-carousel-box .owl-nav .owl-prev:hover, {{WRAPPER}} .tfc-carousel-box .owl-nav .owl-next:hover, {{WRAPPER}} .tfc-carousel-box .owl-nav .owl-prev.disabled, {{WRAPPER}} .tfc-carousel-box .owl-nav .owl-next.disabled',

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

		                    '{{WRAPPER}} .tfc-carousel-box .owl-nav .owl-prev:hover, {{WRAPPER}} .tfc-carousel-box .owl-nav .owl-next:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

		                    '{{WRAPPER}} .tfc-carousel-box .owl-nav .owl-prev.disabled, {{WRAPPER}} .tfc-carousel-box .owl-nav .owl-next.disabled' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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

						'{{WRAPPER}} .tfc-carousel-box .owl-dots' => 'left: {{SIZE}}{{UNIT}};',

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

						'{{WRAPPER}} .tfc-carousel-box .owl-dots' => 'bottom: {{SIZE}}{{UNIT}};',

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

						'{{WRAPPER}} .tfc-carousel-box .owl-dots .owl-dot' => 'margin: 0 {{SIZE}}{{UNIT}};',

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

						'{{WRAPPER}} .tfc-carousel-box .owl-dots' => 'transform: rotate({{VALUE}}deg);',

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

								'size' => 7,

							],

							'selectors' => [

								'{{WRAPPER}} .tfc-carousel-box .owl-dots .owl-dot' => 'width: {{SIZE}}{{UNIT}};',

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

							'size' => 7,

						],

						'selectors' => [

							'{{WRAPPER}} .tfc-carousel-box .owl-dots .owl-dot' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',

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

		                'default' => '#0C171A',

		                'selectors' => [

							'{{WRAPPER}} .tfc-carousel-box .owl-dots .owl-dot' => 'background-color: {{VALUE}};',

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

						'selector' => '{{WRAPPER}} .tfc-carousel-box .owl-dots .owl-dot',						

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

		                    '{{WRAPPER}} .tfc-carousel-box .owl-dots .owl-dot, {{WRAPPER}} .tfc-carousel-box .owl-carousel .owl-dot.active::after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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

								'{{WRAPPER}} .tfc-carousel-box .owl-dots .owl-dot.active' => 'width: {{SIZE}}{{UNIT}};',

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

							'size' => 7,

						],

						'selectors' => [

							'{{WRAPPER}} .tfc-carousel-box .owl-dots .owl-dot.active' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',

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

								'{{WRAPPER}} .tfc-carousel-box .owl-carousel .owl-dot.active::after' => 'width: {{SIZE}}{{UNIT}};',

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

							'{{WRAPPER}} .tfc-carousel-box .owl-carousel .owl-dot.active::after' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',

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

							'{{WRAPPER}} .tfc-carousel-box .owl-dots .owl-dot.active span' => 'border-color: {{VALUE}} !important;',

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

							'{{WRAPPER}} .tfc-carousel-box .owl-dots .owl-dot.active, {{WRAPPER}} .tfc-carousel-box .owl-dots .owl-dot:hover' => 'transform: scale({{SIZE}});',

						],

					]

				);	



	        	$this->add_control( 

	        		'carousel_bullets_hover_bg_color',

		            [

		                'label' => esc_html__( 'Background Color', 'themesflat-core' ),

		                'type' => \Elementor\Controls_Manager::COLOR,

						'default' => '#317C6F',

		                'selectors' => [

							'{{WRAPPER}} .tfc-carousel-box .owl-dots .owl-dot:hover, {{WRAPPER}} .tfc-carousel-box .owl-dots .owl-dot.active' => 'background-color: {{VALUE}}',

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

						'selector' => '{{WRAPPER}} .tfc-carousel-box .owl-dots .owl-dot:hover, {{WRAPPER}} .tfc-carousel-box .owl-dots .owl-dot.active',

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

		                    '{{WRAPPER}} .tfc-carousel-box .owl-dots .owl-dot:hover, {{WRAPPER}} .tfc-carousel-box .owl-dots .owl-dot.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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

		$icon_quote = '';



		?>

<div class="tfc-carousel-box <?php echo esc_attr($settings['testimonial_style']) ?> <?php echo esc_attr($carousel_arrow); ?> <?php echo esc_attr($carousel_bullets); ?>"
    data-loop="<?php echo esc_attr($settings['carousel_loop']); ?>"
    data-auto="<?php echo esc_attr($settings['carousel_auto']); ?>"
    data-column="<?php echo esc_attr($settings['carousel_column_desk']); ?>"
    data-column2="<?php echo esc_attr($settings['carousel_column_tablet']); ?>"
    data-column3="<?php echo esc_attr($settings['carousel_column_mobile']); ?>"
    data-spacer="<?php echo esc_attr($settings['carousel_spacer']); ?>"
    data-prev_icon="<?php echo esc_attr($settings['carousel_prev_icon']) ?>"
    data-next_icon="<?php echo esc_attr($settings['carousel_next_icon']) ?>"
    data-arrow="<?php echo esc_attr($settings['carousel_arrow']) ?>"
    data-bullets="<?php echo esc_attr($settings['carousel_bullets']) ?>"
    data-index_active="<?php echo esc_attr($settings['index_active']) ?>">
    <div class="owl-carousel owl-theme">
        <?php foreach ($settings['carousel_list'] as $carousel): $icon_quote = \Elementor\Addon_Elementor_Icon_manager_micare::render_icon( $carousel['icon_quote'], [ 'aria-hidden' => 'true' ] ); ?>
        <?php

						$attr['settings'] = $settings; 
						$attr['carousel'] = $carousel; 
						$attr['icon_quote'] = $icon_quote; 

						tf_get_template_widget("box-carousel/{$settings['testimonial_style']}", $attr);

					?>

        <?php endforeach;?>
    </div>
</div>
<?php	

	}



}