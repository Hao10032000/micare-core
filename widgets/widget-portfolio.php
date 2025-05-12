<?php

class TFPortfolio_Widget extends \Elementor\Widget_Base {



	public function get_name() {

        return 'tf-portfolio';

    }

    

    public function get_title() {

        return esc_html__( 'TF Portfolio', 'themesflat-core' );

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



	public function get_script_depends() {

		return ['owl-carousel', 'jquery-isotope','tf-portfolio'];

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

						'options' => ThemesFlat_Addon_For_Elementor_micare::tf_get_taxonomies('portfolio_category'),

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



				$this->add_control( 

					'show_exc',

					[

						'label' => esc_html__( 'Show Description', 'themesflat-core' ),

						'type' => \Elementor\Controls_Manager::SWITCHER,

						'label_on' => esc_html__( 'Show', 'themesflat-core' ),

						'label_off' => esc_html__( 'Hide', 'themesflat-core' ),

						'return_value' => 'yes',

						'default' => 'yes',


					]

				);

				

				$this->add_control( 

					'excerpt_lenght',

					[

						'label' => esc_html__( 'Excerpt Length', 'micare' ),

						'type' => \Elementor\Controls_Manager::NUMBER,

						'min' => 0,

						'max' => 500,

						'step' => 1,

						'default' => 15,

						'condition' => [

							'show_exc'	=> 'yes',

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

						'default' => esc_html__( 'Read more', 'themesflat-core' ),

						'condition' => [

							'show_button'	=> 'yes',

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
		'condition' => [
			'show_filter!' => 'yes',
		],	

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

	'carousel_loop',

	[

		'label' => esc_html__( 'Loop', 'themesflat-core' ),

		'type' => \Elementor\Controls_Manager::SWITCHER,

		'label_on' => esc_html__( 'Yes', 'themesflat-core' ),

		'label_off' => esc_html__( 'No', 'themesflat-core' ),

		'return_value' => 'yes',

		'default' => 'no',

		'condition' => [

			'carousel' => 'yes',

		],

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

						'{{WRAPPER}} .wrap-portfolio-post .item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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

						'{{WRAPPER}} .wrap-portfolio-post .item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);  



			$this->add_responsive_control( 

				'padding_inner',

				[

					'label' => esc_html__( 'Padding Inner', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'selectors' => [

						'{{WRAPPER}} .wrap-portfolio-post .item .portfolio-post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],					

				]

			);	



			$this->add_responsive_control( 

				'margin_inner',

				[

					'label' => esc_html__( 'Margin Inner', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'selectors' => [

						'{{WRAPPER}} .wrap-portfolio-post .item .portfolio-post' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);



			$this->end_controls_section();    

		// /.End General Style



		// Start Post Icon Style 

		$this->start_controls_section( 

			'image_hei',

			[

				'label' => esc_html__( 'Image', 'themesflat-core' ),

				'tab' => \Elementor\Controls_Manager::TAB_STYLE,

			]

		);


					$this->add_responsive_control( 

				'image_height',

				[

					'label' => esc_html__( 'Height', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SLIDER,

					'size_units' => [ 'px' ],

					'range' => [

						'px' => [

							'min' => 0,

							'max' => 1000,

							'step' => 1,

						]

					],


					'selectors' => [

						'{{WRAPPER}} .tf-portfolio-wrap .portfolio-post .featured-post img' => 'height: {{SIZE}}{{UNIT}};',

					],


				]

			);	
		

	

		$this->add_responsive_control( 

			'image_border_radius',

			[

				'label' => esc_html__( 'Border Radius', 'themesflat-core' ),

				'type' => \Elementor\Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px' , '%' ],

				'selectors' => [

					'{{WRAPPER}} .tf-portfolio-wrap .portfolio-post' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

			]

		);



		$this->end_controls_section(); 


		// Start Content Style 

		$this->start_controls_section( 

			'section_style_content',

			[

				'label' => esc_html__( 'Content', 'themesflat-core' ),

				'tab' => \Elementor\Controls_Manager::TAB_STYLE,

			]

		);

		$this->add_responsive_control( 

			'padding_content',

			[

				'label' => esc_html__( 'Padding', 'themesflat-core' ),

				'type' => \Elementor\Controls_Manager::DIMENSIONS,

				'selectors' => [

					'{{WRAPPER}} .wrap-portfolio-post .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],					

			]

		);	



		$this->add_responsive_control( 

			'margin_content',

			[

				'label' => esc_html__( 'Margin', 'themesflat-core' ),

				'type' => \Elementor\Controls_Manager::DIMENSIONS,

				'selectors' => [

					'{{WRAPPER}} .wrap-portfolio-post .content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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

					'selector' => '{{WRAPPER}} .wrap-portfolio-post .portfolio-post .title ',

				]

			); 



			$this->add_responsive_control( 

				'margin_title',

				[

					'label' => esc_html__( 'Margin', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'selectors' => [

						'{{WRAPPER}} .wrap-portfolio-post .portfolio-post .title ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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

								'{{WRAPPER}} .wrap-portfolio-post .portfolio-post .title a' => 'color: {{VALUE}}',

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

								'{{WRAPPER}} .wrap-portfolio-post  .portfolio-post  .title a:hover' => 'color: {{VALUE}}',

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

					'label' => esc_html__( 'Description', 'themesflat-core' ),

					'tab' => \Elementor\Controls_Manager::TAB_STYLE,

				]

			);	



			$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'typography_desc',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .wrap-portfolio-post  .portfolio-post .description',

				]

			);



			$this->add_control( 

				'desc_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'default' => '',

					'selectors' => [

						'{{WRAPPER}} .wrap-portfolio-post  .portfolio-post .description' => 'color: {{VALUE}}',

					],

				]

			); 



			$this->add_responsive_control( 

				'margin_desc',

				[

					'label' => esc_html__( 'Margin', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'selectors' => [

						'{{WRAPPER}} .wrap-portfolio-post  .portfolio-post .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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

					'selector' => '{{WRAPPER}} .wrap-portfolio-post .portfolio-post .tf-button-container a ',

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

								'{{WRAPPER}} .wrap-portfolio-post .portfolio-post .tf-button-container a,{{WRAPPER}} .wrap-portfolio-post .portfolio-post .tf-button-container a i ,{{WRAPPER}} .wrap-portfolio-post .portfolio-post .tf-button-container a .read' => 'color: {{VALUE}}',

							],

							

						]

					);
					$this->add_control( 

						'button_bg_color_a',

						[

							'label' => esc_html__( 'Background Color', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '',

							'selectors' => [

								'{{WRAPPER}} .wrap-portfolio-post .portfolio-post .tf-button-container a' => 'background-color: {{VALUE}}',

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

							'label' => esc_html__( 'Color', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '',

							'selectors' => [

								'{{WRAPPER}} .wrap-portfolio-post .portfolio-post .tf-button-container a:hover ,{{WRAPPER}} .wrap-portfolio-post .portfolio-post .tf-button-container a:hover span' => 'color: {{VALUE}}',

							],

							

						]

					); 
					$this->add_control( 

						'button_bg_color_hover_a',

						[

							'label' => esc_html__( 'Background Color Hover', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '',

							'selectors' => [

								'{{WRAPPER}} .wrap-portfolio-post .portfolio-post .tf-button-container a:hover::after,{{WRAPPER}} .wrap-portfolio-post .portfolio-post .tf-button-container a:hover' => 'background-color: {{VALUE}}',

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



		$this->add_render_attribute( 'tf_portfolio_wrap', ['class' => ['tf-portfolio-wrap style1', 'themesflat-portfolio-taxonomy', $has_carousel ], 'data-tabid' => $this->get_id()] );





		if ( get_query_var('paged') ) {

           $paged = get_query_var('paged');

        } elseif ( get_query_var('page') ) {

           $paged = get_query_var('page');

        } else {

           $paged = 1;

        }

		$query_args = array(

            'post_type' => 'portfolio',

            'posts_per_page' => $settings['posts_per_page'],

            'paged'     => $paged

        );



        if (! empty( $settings['posts_categories'] )) {        	

        	$query_args['tax_query'] = array(

							        array(

							            'taxonomy' => 'portfolio_category',

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

		?>

<?php $query = new WP_Query( $query_args );
		if ( $query->have_posts() ) : ?>



<div <?php echo $this->get_render_attribute_string('tf_portfolio_wrap'); ?>
    data-column="<?php echo esc_attr($settings['carousel_column_desk']); ?>"
    data-column2="<?php echo esc_attr($settings['carousel_column_tablet']); ?>"
    data-column3="<?php echo esc_attr($settings['carousel_column_mobile']); ?>"
    data-spacer="<?php echo esc_attr($settings['carousel_spacer']); ?>"
    data-centered="false" data-prev_icon="icon-micare-chevron-left"
    data-next_icon="icon-micare-chevron-right" data-loop="<?php echo esc_attr($settings['carousel_loop']) ?>"
    data-arrow="false" data-bullets="<?php echo esc_attr($settings['carousel_bullets']) ?>">


    <div class="wrap-portfolio-post row <?php echo esc_attr($settings['layout']); ?> ">

        <?php if ( $settings['carousel'] == 'yes' ): ?>
        <div class="owl-carousel">
            <?php endif; ?>

            <?php $count=1;  while ( $query->have_posts() ) : $query->the_post(); ?>


            <?php 

						$attr['settings'] = $settings; 
						$attr['count'] = $count; 

						tf_get_template_widget("portfolio/style1", $attr); 

						?>


            <?php $count++; endwhile; ?>
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