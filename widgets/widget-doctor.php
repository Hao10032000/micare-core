<?php

class TFDoctor_Widget extends \Elementor\Widget_Base {



	public function get_name() {

        return 'tf-doctor';

    }

    

    public function get_title() {

        return esc_html__( 'TF Doctor', 'themesflat-core' );

    }



    public function get_icon() {

        return 'eicon-posts-grid';

    }

    

    public function get_categories() {

        return [ 'themesflat_addons' ];

    }



	public function get_style_depends(){

		return ['owl-carousel'];

	}

		public function get_script_depends(){

		return ['owl-carousel','tf-doctor'];

	}



	protected function register_controls() {

        // Start Posts Query        

			$this->start_controls_section( 

				'section_posts_query',

	            [

	                'label' => esc_html__('Query', 'themesflat-core'),

	            ]

	        );



	        $this->add_control( 

					'posts_per_page',

		            [

		                'label' => esc_html__( 'Posts Per Page', 'themesflat-core' ),

		                'type' => \Elementor\Controls_Manager::NUMBER,

		                'default' => '4',

		            ]

		        );



		        $this->add_control( 

		        	'order_by',

					[

						'label' => esc_html__( 'Order By', 'themesflat-core' ),

						'type' => \Elementor\Controls_Manager::SELECT,

						'default' => 'date',

						'options' => [						

				            'date' => 'Date',

				            'ID' => 'Post ID',			            

				            'title' => 'Title',

						],

					]

				);



				$this->add_control( 

					'order',

					[

						'label' => esc_html__( 'Order', 'themesflat-core' ),

						'type' => \Elementor\Controls_Manager::SELECT,

						'default' => 'desc',

						'options' => [						

				            'desc' => 'Descending',

				            'asc' => 'Ascending',	

						],

					]

				);



				$this->add_control( 

					'posts_categories',

					[

						'label' => esc_html__( 'Categories', 'themesflat-core' ),

						'type' => \Elementor\Controls_Manager::SELECT2,

						'options' => ThemesFlat_Addon_For_Elementor_micare::tf_get_taxonomies('doctor_category'),

						'label_block' => true,

		                'multiple' => true,

					]

				);



				$this->add_control( 

					'exclude',

					[

						'label' => esc_html__( 'Exclude', 'themesflat-core' ),

						'type'	=> \Elementor\Controls_Manager::TEXT,	

						'description' => esc_html__( 'Post Ids Will Be Inorged. Ex: 1,2,3', 'themesflat-core' ),

						'default' => '',

						'label_block' => true,				

					]

				);



				$this->add_control( 

					'sort_by_id',

					[

						'label' => esc_html__( 'Sort By ID', 'themesflat-core' ),

						'type'	=> \Elementor\Controls_Manager::TEXT,	

						'description' => esc_html__( 'Post Ids Will Be Sort. Ex: 1,2,3', 'themesflat-core' ),

						'default' => '',

						'label_block' => true,				

					]

				);



				$this->add_group_control( 

					\Elementor\Group_Control_Image_Size::get_type(),

					[

						'name' => 'thumbnail',

						'default' => 'full',

					]

				);

				$this->add_control( 

		        	'style',

					[

						'label' => esc_html__( 'Styles', 'themesflat-core' ),

						'type' => \Elementor\Controls_Manager::SELECT,

						'default' => 'style1',

						'options' => [

							'style1' => esc_html__( 'Style 1', 'themesflat-core' ),

							'style2' => esc_html__( 'Style 2', 'themesflat-core' ),

							'style3' => esc_html__( 'Style 3', 'themesflat-core' ),

						],

					]

				);


				$this->add_control( 

					'show_button',

					[

						'label' => esc_html__( 'Show Button', 'themesflat-core' ),

						'type' => \Elementor\Controls_Manager::SWITCHER,

						'label_on' => esc_html__( 'Show', 'themesflat-core' ),

						'label_off' => esc_html__( 'Hide', 'themesflat-core' ),

						'return_value' => 'yes',

						'default' => 'yes',

					]

				);



				$this->add_control( 

					'button_text',

					[

						'label' => esc_html__( 'Button Text', 'themesflat-core' ),

						'type' => \Elementor\Controls_Manager::TEXT,

						'default' => esc_html__( 'Lets Talk', 'themesflat-core' ),

						'condition' => [

							'show_button'	=> 'yes',

						],

					]

				);	


				$this->add_control( 

		        	'layout',

					[

						'label' => esc_html__( 'Columns', 'themesflat-core' ),

						'type' => \Elementor\Controls_Manager::SELECT,

						'default' => 'column-4',

						'options' => [

							'column-1' => esc_html__( '1', 'themesflat-core' ),

							'column-2' => esc_html__( '2', 'themesflat-core' ),

							'column-3' => esc_html__( '3', 'themesflat-core' ),

							'column-4' => esc_html__( '4', 'themesflat-core' ),

						],

					]

				);	

			

			$this->end_controls_section();

        // /.End Posts Query

		// Start Carousel        

$this->start_controls_section( 

	'section_posts_carousel',

	[

		'label' => esc_html__('Carousel', 'themesflat-core'),
	]

);	



$this->add_control( 

	'carousel',

	[

		'label' => esc_html__( 'Carousel', 'themesflat-core' ),

		'type' => \Elementor\Controls_Manager::SWITCHER,

		'label_on' => esc_html__( 'On', 'themesflat-core' ),

		'label_off' => esc_html__( 'Off', 'themesflat-core' ),

		'return_value' => 'yes',

		'default' => 'no',

	]

);

$this->add_control( 

	'carousel_column_desk',

	[

		'label' => esc_html__( 'Columns Desktop', 'themesflat-core' ),

		'type' => \Elementor\Controls_Manager::SELECT,

		'default' => '3',

		'options' => [

			'1' => esc_html__( '1', 'themesflat-core' ),

			'2' => esc_html__( '2', 'themesflat-core' ),

			'3' => esc_html__( '3', 'themesflat-core' ),

			'4' => esc_html__( '4', 'themesflat-core' ),

			'5' => esc_html__( '5', 'themesflat-core' ),

			'6' => esc_html__( '6', 'themesflat-core' ),

		],

		'condition' => [

			'carousel' => 'yes',

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

		],

		'condition' => [

			'carousel' => 'yes',

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

		'condition' => [

			'carousel' => 'yes',

		],

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

	'carousel_arrow',

	[

		'label' => esc_html__( 'Arrow', 'themesflat-core' ),

		'type' => \Elementor\Controls_Manager::SWITCHER,

		'label_on' => esc_html__( 'Show', 'themesflat-core' ),

		'label_off' => esc_html__( 'Hide', 'themesflat-core' ),

		'return_value' => 'yes',

		'default' => 'no',

		'condition' => [

			'carousel' => 'yes',

		],

		'description'	=> 'Just show when you have two slide',

		'separator' => 'before',

	]

);

$this->add_control( 

	'arrow_direction',

	[

		'label' => esc_html__( 'Arrow Direction', 'themesflat-core' ),

		'type' => \Elementor\Controls_Manager::SELECT,

		'default' => '',

		'options' => [

			'' => esc_html__( 'Flex', 'themesflat-core' ),

			'flex-row' => esc_html__( 'Row', 'themesflat-core' ),

		],

		'condition' => [

			'carousel_arrow' => 'yes',

		],

	]

);	


$this->add_responsive_control(
	'nav_position_top',
	[
		'label' => esc_html__( 'Arrow Vertical Position', 'themesflat-core' ),
		'type' => \Elementor\Controls_Manager::SLIDER,

		'size_units' => [ 'px', '%' ],

		'range' => [

			'px' => [

				'min' => -2000,

				'max' => 2000,

				'step' => 1,

			],
			'%' => [

				'min' => -1000,

				'max' => 1000,

				'step' => 1,

			],

		],
		'selectors' => [
			'{{WRAPPER}}  .tf-doctor-wrap .owl-nav' => 'top: {{SIZE}}{{UNIT}};',
		],
		'condition' => [

			'carousel_arrow' => 'yes',

		],
	]
);

$this->add_responsive_control(
	'arrow_right',
	[
		'label' => esc_html__( 'Arrow Horizontal Position', 'themesflat-core' ),
		'type' => \Elementor\Controls_Manager::SLIDER,

		'size_units' => [ 'px', '%' ],

		'range' => [

			'px' => [

				'min' => -2000,

				'max' => 2000,

				'step' => 1,

			],
			'%' => [

				'min' => -1000,

				'max' => 1000,

				'step' => 1,

			],

		],
		'selectors' => [
			'{{WRAPPER}}  .tf-doctor-wrap .owl-nav ' => 'right: {{SIZE}}{{UNIT}};',
		],
		'condition' => [

			'carousel_arrow' => 'yes',

		],
	]
);

$this->start_controls_tabs( 

	'carousel_arrow_tabs',

	[

		'condition' => [

			'carousel_arrow' => 'yes',

			'carousel' => 'yes',

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

				'{{WRAPPER}} .tf-doctor-wrap .owl-carousel .owl-nav button, {{WRAPPER}} .tf-doctor-wrap .owl-nav .owl-prev, {{WRAPPER}} .tf-doctor-wrap .owl-nav .owl-next' => 'color: {{VALUE}}',

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

				'{{WRAPPER}} .tf-doctor-wrap .owl-carousel .owl-nav button, {{WRAPPER}} .tf-doctor-wrap .owl-nav .owl-prev, {{WRAPPER}} .tf-doctor-wrap .owl-nav .owl-next' => 'background-color: {{VALUE}};',

			],

			'condition' => [

				'carousel_arrow' => 'yes',

			]

		]

	);	
	
	
	$this->add_control( 

		'carousel_border_arrow_color',

		[

			'label' => esc_html__( 'Border Color', 'themesflat-core' ),

			'type' => \Elementor\Controls_Manager::COLOR,

			'selectors' => [

				'{{WRAPPER}} .tf-doctor-wrap .owl-carousel .owl-nav button, {{WRAPPER}} .tf-doctor-wrap .owl-nav .owl-prev, {{WRAPPER}} .tf-doctor-wrap .owl-nav .owl-next' => 'border-color: {{VALUE}}',

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

				'{{WRAPPER}} .tf-doctor-wrap .owl-carousel .owl-nav button.active,
				 {{WRAPPER}} .tf-doctor-wrap .owl-carousel .owl-nav button:hover,
				  {{WRAPPER}} .tf-doctor-wrap .owl-nav .owl-prev.active,
				   {{WRAPPER}} .tf-doctor-wrap .owl-nav .owl-next:hover,
				    {{WRAPPER}} .tf-doctor-wrap .owl-nav .owl-prev.active,
					 {{WRAPPER}} .tf-doctor-wrap .owl-nav .owl-next:hover' => 'color: {{VALUE}}',

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

			'selectors' => [

				'{{WRAPPER}} .tf-doctor-wrap .owl-carousel .owl-nav button.active,
				 {{WRAPPER}} .tf-doctor-wrap .owl-carousel .owl-nav button:hover,
				  {{WRAPPER}} .tf-doctor-wrap .owl-nav .owl-prev.active,
				   {{WRAPPER}} .tf-doctor-wrap .owl-nav .owl-next:hover,
				    {{WRAPPER}} .tf-doctor-wrap .owl-nav .owl-prev.active,
					 {{WRAPPER}} .tf-doctor-wrap .owl-nav .owl-next:hover' => 'background-color: {{VALUE}}; border-color: {{VALUE}};',

			],

			'condition' => [

				'carousel_arrow' => 'yes',

			]

		]

	);


   $this->end_controls_tab();

$this->end_controls_tabs();


$this->add_control( 

	'carousel_bullets',

	[

		'label'         => esc_html__( 'Bullets', 'themesflat-core' ),

		'type'          => \Elementor\Controls_Manager::SWITCHER,

		'label_on'      => esc_html__( 'Show', 'themesflat-core' ),

		'label_off'     => esc_html__( 'Hide', 'themesflat-core' ),

		'return_value'  => 'yes',

		'default'       => 'no',

		'condition' => [

			'carousel' => 'yes',

		],

		'separator' => 'before',

	]

);	

$this->end_controls_section();

// /.End Carousel

		// Start General Style 

			$this->start_controls_section( 

				'section_style_general',

				[

					'label' => esc_html__( 'General', 'themesflat-core' ),

					'tab' => \Elementor\Controls_Manager::TAB_STYLE,

				]

			);



			$this->add_responsive_control( 

				'padding',

				[

					'label' => esc_html__( 'Padding Spacing', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'default' => [

						'top' => '15',

						'right' => '15',

						'bottom' => '15',

						'left' => '15',

						'unit' => 'px',

						'isLinked' => true,

					],

					'selectors' => [

						'{{WRAPPER}} .wrap-doctor-post .item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],					

				]

			);	



			$this->add_responsive_control( 

				'margin',

				[

					'label' => esc_html__( 'Margin Spacing', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'allowed_dimensions' => [ 'right', 'left' ],

					'default' => [

						'right' => '',

						'left' => '',

						'unit' => 'px',

						'isLinked' => true,

					],

					'selectors' => [

						'{{WRAPPER}} .wrap-doctor-post .item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			); 
				$this->add_group_control( 

				\Elementor\Group_Control_Border::get_type(),

				[

					'name' => 'border',

					'label' => esc_html__( 'Border', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .wrap-doctor-post .item .doctor-post',

				]

			);
			$this->add_responsive_control( 

				'border_radius',

				[

					'label' => esc_html__( 'Border Radius', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'size_units' => [ 'px' , '%' ],

					'selectors' => [

						'{{WRAPPER}}  .wrap-doctor-post .item .doctor-post' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};overflow: hidden;',

					],

				]

			);
		


			$this->end_controls_section();    

		// /.End General Style



		// Start Post Icon Style 

		$this->start_controls_section( 

			'content-doctor',

			[

				'label' => esc_html__( 'Content', 'themesflat-core' ),

				'tab' => \Elementor\Controls_Manager::TAB_STYLE,

			]

		);
		$this->add_responsive_control( 

			'padding_inner_content',

			[

				'label' => esc_html__( 'Padding', 'themesflat-core' ),

				'type' => \Elementor\Controls_Manager::DIMENSIONS,

				'selectors' => [

					'{{WRAPPER}} .tf-doctor-wrap .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],					

			]

		);	


		$this->end_controls_section(); 






		// Start Title Style 

			$this->start_controls_section( 

				'section_style_title',

				[

					'label' => esc_html__( 'Title', 'themesflat-core' ),

					'tab' => \Elementor\Controls_Manager::TAB_STYLE,

				]

			);



			$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'typography',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .wrap-doctor-post .doctor-post .title ',

				]

			); 



			$this->add_responsive_control( 

				'margin_title',

				[

					'label' => esc_html__( 'Margin', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'selectors' => [

						'{{WRAPPER}} .wrap-doctor-post .doctor-post .title ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);  	



			$this->start_controls_tabs( 

				'background_title_tabs',

				);

				$this->start_controls_tab( 

					'title_style_normal_tab',

					[

						'label' => esc_html__( 'Normal', 'themesflat-core' ),

					] ); 

					$this->add_control( 

						'title_color',

						[

							'label' => esc_html__( 'Color', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '',

							'selectors' => [

								'{{WRAPPER}} .wrap-doctor-post .doctor-post .title a' => 'color: {{VALUE}}',

							],

							

							

						]

					);  



				$this->end_controls_tab();



				$this->start_controls_tab( 

					'title_style_hover_tab',

					[

						'label' => esc_html__( 'Hover', 'themesflat-core' ),

					] );



					$this->add_control( 

						'title_color_hover',

						[

							'label' => esc_html__( 'Color Hover', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '',

							'selectors' => [

								'{{WRAPPER}} .wrap-doctor-post  .doctor-post  .title a:hover' => 'color: {{VALUE}}',

							],

						]

					);   



					

				$this->end_controls_tab();

			$this->end_controls_tabs(); 

			

			$this->end_controls_section();    

		// /.End Title Style



		// Start Description Style 

			$this->start_controls_section( 

				'section_style_desc',

				[

					'label' => esc_html__( 'Position', 'themesflat-core' ),

					'tab' => \Elementor\Controls_Manager::TAB_STYLE,

				]

			);	



			$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'typography_desc',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .wrap-doctor-post .doctor-post .position',

				]

			);



			$this->add_control( 

				'desc_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'default' => '',

					'selectors' => [

						'{{WRAPPER}} .wrap-doctor-post .doctor-post .position' => 'color: {{VALUE}}',

					],

					

				]

			); 



			$this->add_responsive_control( 

				'margin_desc',

				[

					'label' => esc_html__( 'Margin', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'selectors' => [

						'{{WRAPPER}} .wrap-doctor-post .doctor-post .position' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);  



		

			

			$this->end_controls_section();    

		// /.End Description Style



		// Start Description Style 

		$this->start_controls_section( 

			'section_style_icon',

			[

				'label' => esc_html__( 'Icon Social', 'themesflat-core' ),

				'tab' => \Elementor\Controls_Manager::TAB_STYLE,

			]

		);	


		$this->add_responsive_control( 

			'icon_border_radius',

			[

				'label' => esc_html__( 'Border Radius', 'themesflat-core' ),

				'type' => \Elementor\Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px' , '%' ],

				'selectors' => [

					'{{WRAPPER}} .doctor-post .list-social a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',

				],

			]

		);


		$this->add_control( 

			'icon_color',

			[

				'label' => esc_html__( 'Icon Color', 'themesflat-core' ),

				'type' => \Elementor\Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .doctor-post .list-social a' => 'color: {{VALUE}}',

				],

				

			]

		);

		$this->add_control( 

			'icon_color_hover',

			[

				'label' => esc_html__( 'Icon Color Hover', 'themesflat-core' ),

				'type' => \Elementor\Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .doctor-post .list-social a:hover' => 'color: {{VALUE}}',

				],

				

			]

		);

		$this->add_control( 

			'bg_icon_color',

			[

				'label' => esc_html__( 'Background Icon Color', 'themesflat-core' ),

				'type' => \Elementor\Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .doctor-post .list-social a' => 'background-color: {{VALUE}}',

				],

				

			]

		);

		$this->add_control( 

			'bg_icon_color_hover',

			[

				'label' => esc_html__( 'Background Icon Color Hover', 'themesflat-core' ),

				'type' => \Elementor\Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .doctor-post .list-social a:hover' => 'background-color: {{VALUE}}',

				],

				

			]

		);

		$this->add_group_control( 

			\Elementor\Group_Control_Border::get_type(),

			[

				'name' => 'icon_border',

				'label' => esc_html__( 'Border', 'themesflat-core' ),

				'selector' => '{{WRAPPER}} .doctor-post .list-social a',

			]

		);

		$this->add_control( 

			'icon_border_hover',

			[

				'label' => esc_html__( 'Border Hover', 'themesflat-core' ),

				'type' => \Elementor\Controls_Manager::COLOR,


				'selectors' => [

					'{{WRAPPER}} .doctor-post .list-social a:hover' => 'border-color: {{VALUE}}',

				],

				

			]

		);



	

		

		$this->end_controls_section();    

	// /.End Description Style

	// Start Button Style 

			$this->start_controls_section( 

				'section_style_btn',

				[

					'label' => esc_html__( 'Button', 'themesflat-core' ),

					'tab' => \Elementor\Controls_Manager::TAB_STYLE,

				]

			);	



			$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'typography_button',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .wrap-doctor-post .doctor-post .tf-button-container a ',

				]

			);



			$this->start_controls_tabs( 

				'background_button_tabs',

				);

				$this->start_controls_tab( 

					'button_style_normal_tab',

					[

						'label' => esc_html__( 'Normal', 'themesflat-core' ),

					] ); 

					$this->add_control( 

						'button_color_a',

						[

							'label' => esc_html__( 'Color', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '',

							'selectors' => [

								'{{WRAPPER}} .wrap-doctor-post .doctor-post .tf-button-container a' => 'color: {{VALUE}}',

							],

							

						]

					);  

					$this->add_control( 

						'button_bgcolor_a',

						[

							'label' => esc_html__( 'Background', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '',

							'selectors' => [

								'{{WRAPPER}} .wrap-doctor-post .doctor-post .tf-button-container a' => 'background: {{VALUE}}',

							],

							

						]

					);  


				$this->end_controls_tab();



				$this->start_controls_tab( 

					'social_style_hover_tab',

					[

						'label' => esc_html__( 'Hover', 'themesflat-core' ),

					] );





					$this->add_control( 

						'button_color_hover',

						[

							'label' => esc_html__( 'Color Hover', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '',

							'selectors' => [

								'{{WRAPPER}} .wrap-doctor-post .doctor-post .tf-button-container a:hover,
								 {{WRAPPER}} .wrap-doctor-post .doctor-post .tf-btn:hover span' => 'color: {{VALUE}} !important',
							],

							

						]

					);  

					$this->add_control( 

						'button_bgcolor_hover',

						[

							'label' => esc_html__( 'Background Color Hover', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'selectors' => [

								'{{WRAPPER}} .wrap-doctor-post .doctor-post .tf-button-container a:hover' => 'background: {{VALUE}}; border-color: {{VALUE}}; ',
							],

							

						]

					);  



				$this->end_controls_tab();

			$this->end_controls_tabs(); 

			



			

			$this->end_controls_section();    

		// /.End Button Style


	}



	protected function render($instance = []) {

		$settings = $this->get_settings_for_display();


		$has_carousel = 'no-carousel';

		if ( $settings['carousel'] == 'yes' ) {

			$has_carousel = 'has-carousel';

		}


		$this->add_render_attribute( 'tf_doctor_wrap', ['class' => ['tf-doctor-wrap', 'themesflat-doctor-taxonomy', $settings['style'], $has_carousel ], 'data-tabid' => $this->get_id()] );





		if ( get_query_var('paged') ) {

           $paged = get_query_var('paged');

        } elseif ( get_query_var('page') ) {

           $paged = get_query_var('page');

        } else {

           $paged = 1;

        }

		$query_args = array(

            'post_type' => 'doctor',

            'posts_per_page' => $settings['posts_per_page'],

            'paged'     => $paged

        );



        if (! empty( $settings['posts_categories'] )) {        	

        	$query_args['tax_query'] = array(

							        array(

							            'taxonomy' => 'doctor_category',

							            'field'    => 'slug',

							            'terms'    => $settings['posts_categories']

							        ),

							    );

        }        

        if ( ! empty( $settings['exclude'] ) ) {				

			if ( ! is_array( $settings['exclude'] ) )

				$exclude = explode( ',', $settings['exclude'] );



			$query_args['post__not_in'] = $exclude;

		}



		$query_args['orderby'] = $settings['order_by'];

		$query_args['order'] = $settings['order'];



		if ( $settings['sort_by_id'] != '' ) {	

			$sort_by_id = array_map( 'trim', explode( ',', $settings['sort_by_id'] ) );

			$query_args['post__in'] = $sort_by_id;

			$query_args['orderby'] = 'post__in';

		}



		$query = new WP_Query( $query_args );

		if ( $query->have_posts() ) : ?>

<div <?php echo $this->get_render_attribute_string('tf_doctor_wrap'); ?>>



    <div class="wrap-doctor-post row <?php echo esc_attr($settings['layout']); ?> <?php echo esc_attr($settings['arrow_direction']);  ?>">

       <?php if ( $settings['carousel'] == 'yes' ): ?>
        <div class="owl-carousel"	    data-loop="false"

    data-auto=""

    data-column="<?php echo esc_attr($settings['carousel_column_desk']); ?>"

    data-column2="<?php echo esc_attr($settings['carousel_column_tablet']); ?>"

    data-column3="<?php echo esc_attr($settings['carousel_column_mobile']); ?>"

    data-prev_icon="icon-micare-left"

    data-next_icon="icon-micare-right"

    data-arrow="<?php echo esc_attr($settings['carousel_arrow']) ?>"

    data-bullets="<?php echo esc_attr($settings['carousel_bullets']) ?>">
            <?php endif; ?>

        <?php while ( $query->have_posts() ) : $query->the_post(); 

                            global $post;

								$facebook = get_post_meta($post->ID, 'facebook_doctor_value', true);
								$twitter = get_post_meta($post->ID, 'twitter_doctor_value', true);
								$linkedin = get_post_meta($post->ID, 'linkedin_doctor_value', true);
								$youtube = get_post_meta($post->ID, 'youtube_doctor_value', true);
								$custom1 = get_post_meta($post->ID, 'custom1_doctor_value', true);
								$custom2 = get_post_meta($post->ID, 'custom2_doctor_value', true);
								$facebook_icon = get_post_meta($post->ID, 'facebook_icon_value', true);
								$twitter_icon = get_post_meta($post->ID, 'twitter_icon_value', true);
								$linkedin_icon = get_post_meta($post->ID, 'linkedin_icon_value', true);
								$youtube_icon = get_post_meta($post->ID, 'youtube_icon_value', true);
								$custom1_icon = get_post_meta($post->ID, 'custom1_icon_value', true);
								$custom2_icon = get_post_meta($post->ID, 'custom2_icon_value', true);
								$position_doctor_value = get_post_meta($post->ID, 'position_doctor_value', true);

                ?>

        <?php 

					$attr['settings'] = $settings; 
					$attr['facebook'] = $facebook; 
					$attr['twitter'] = $twitter; 
					$attr['linkedin'] = $linkedin; 
					$attr['youtube'] = $youtube; 
					$attr['custom1'] = $custom1; 
					$attr['custom2'] = $custom2; 
					$attr['facebook_icon'] = $facebook_icon; 
					$attr['twitter_icon'] = $twitter_icon; 
					$attr['linkedin_icon'] = $linkedin_icon; 
					$attr['youtube_icon'] = $youtube_icon; 
					$attr['custom1_icon'] = $custom1_icon; 
					$attr['custom2_icon'] = $custom2_icon; 
					$attr['position_doctor_value'] = $position_doctor_value; 
							
					tf_get_template_widget("doctor/{$settings['style']}", $attr); 

					?>

        <?php endwhile; ?>

            <?php if ( $settings['carousel'] == 'yes' ): ?>

        </div>

        <?php endif; ?>

        <?php wp_reset_postdata(); ?>

    </div>

</div>

<?php

		else:

			esc_html_e('No posts found', 'themesflat-core');

		endif;

			

	}	



}