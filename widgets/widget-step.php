<?php
class TFStep_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-step';
    }
    
    public function get_title() {
        return esc_html__( 'TF Step', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-form-vertical';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['tf-step'];
	}

	public function get_script_depends() {

		return ['tf-step'];

	}

	protected function _register_controls() {
		// Start List Setting        
			$this->start_controls_section( 'section_setting',
	            [
	                'label' => esc_html__('Setting', 'themesflat-core'),
	            ]
	        );

	        $this->add_control(
				'styles',
				[
					'label' => esc_html__( 'Style', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'label_block' => true,
					'default' => 'style1',
					'options' => [
						'style1' => esc_html__( 'Style 1', 'themesflat-core' ),
						'style2' => esc_html__( 'Style 2', 'themesflat-core' ),
						'style3' => esc_html__( 'Style 3', 'themesflat-core' ),
					],
				]
			);

	        $repeater = new \Elementor\Repeater();

	        $repeater->add_control(
				'image',
				[
					'label' => esc_html__( 'Choose Image', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/placeholder-2.jpg",
					],
				]
			);
			$repeater->add_group_control(
				\Elementor\Group_Control_Image_Size::get_type(),
				[
					'name' => 'thumbnail',
					'include' => [],
					'default' => 'medium',
				]
			);
	        $repeater->add_control(
				'heading',
				[
					'label' => esc_html__( 'Heading', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,					
					'default' => esc_html__( 'Set Design Planning', 'themesflat-core' ),
					'label_block' => true,
				]
			);
			$repeater->add_control(
				'sub_heading',
				[
					'label' => esc_html__( 'Sub Heading', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,					
					'default' => esc_html__( 'Driven by ', 'themesflat-core' ),
					'label_block' => true,
				]
			);
			$repeater->add_control(
				'text',
				[
					'label' => esc_html__( 'Text', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::WYSIWYG,
					'default' => esc_html__( 'Amet consectetur adipiscineli sed do eiusmod tempor incididunt ut labore et dolore magna', 'themesflat-core' ),
					'label_block' => true,
				]
			);
			$repeater->add_control(
				'text_list',
				[
					'label' => esc_html__( 'Text List', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::WYSIWYG,
					'default' => esc_html__( 'Stakeholder Interviews & Data Gathering', 'themesflat-core' ),
					'label_block' => true,
					// 'condition' => [
	                //     'styles'	=> 'style1',
	                // ],
				]
			);
	      
			$this->add_control(
				'list_step',
				[
					'label' => esc_html__( 'List Step', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'show_label' => true,
					'fields' => $repeater->get_controls(),
					'default' => [
						[								
							'heading' => esc_html__( 'Identify the problem', 'themesflat-core' ),
							'text' => esc_html__( 'Etiam porttitor, massa id aliquam sollicitudin nisi, sit amet tincidunt felis felis non eros aliquam', 'themesflat-core' ),
						],
						[								
							'heading' => esc_html__( 'Analysis', 'themesflat-core' ),
							'text' => esc_html__( 'Etiam porttitor, massa id aliquam sollicitudin nisi, sit amet tincidunt felis felis non eros aliquam', 'themesflat-core' ),
						],
						[								
							'heading' => esc_html__( 'Make a plan', 'themesflat-core' ),
							'text' => esc_html__( 'Etiam porttitor, massa id aliquam sollicitudin nisi, sit amet tincidunt felis felis non eros aliquam', 'themesflat-core' ),
						],
						[								
							'heading' => esc_html__( 'Summary of results', 'themesflat-core' ),
							'text' => esc_html__( 'Etiam porttitor, massa id aliquam sollicitudin nisi, sit amet tincidunt felis felis non eros aliquam', 'themesflat-core' ),
						],
					],
					'title_field' => '{{{ heading }}}',
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

				'active_background_color',
	
				[
	
					'label' => esc_html__( 'Background Color Active', 'themesflat-core' ),
	
					'type' => \Elementor\Controls_Manager::COLOR,
	
	
					'selectors' => [
	
						'{{WRAPPER}} .tf-step .item-step.active' => 'background: {{VALUE}}',
	
					],
					'condition' => [

								'styles' => 'style1'
		
					]
	
				]
	
			);
			$this->add_control(
				'h_general',
				[
					'label' => esc_html__( 'General', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [

	                    'style'	=> ['style1','style3'],
						
	                    ],
				]
			);
			$this->add_responsive_control( 'padding',
	            [
	                'label' => esc_html__( 'Padding', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => ['px', 'em', '%'],
	                'selectors' => [
	                    '{{WRAPPER}} .tf-step .item-step' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
					'condition' => [

	                    'style'	=> ['style1','style3'],
						
	                    ],
	            ]
	        );			
			$this->add_control(
				'background_color',
				[
					'label' => esc_html__( 'Background Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-step .step .item-step' => 'background-color: {{VALUE}}',
					],
					'condition' => [

	                    'style'	=> ['style1','style3'],
						
	                    ],
				]
			);

			$this->add_control(
				'h_image',
				[
					'label' => esc_html__( 'Image', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
	                    'styles'	=> 'style1',
	                ],
				]
			);
			$this->add_control( 
	        	'image_over',
				[
					'label' => esc_html__( 'Over Image Height & With', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tf-step .inner .image' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
	                    'styles'	=> 'style1',
	                ],
				]
			);

			$this->add_responsive_control( 'border_radius_s1',
	            [
	                'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => ['px', 'em', '%'],
	                'selectors' => [
	                    '{{WRAPPER}} .tf-step .inner .image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
					'condition' => [
	                    'styles'	=> 'style1',
	                ],
	            ]
	        );

			$this->add_responsive_control( 'image_padding',
	            [
	                'label' => esc_html__( 'Padding', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => ['px', 'em', '%'],
	                'selectors' => [
	                    '{{WRAPPER}} .tf-step .inner .image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
					'condition' => [
	                    'styles'	=> 'style1',
	                ],
	            ]
	        );
			$this->add_responsive_control( 'image_margin',
	            [
	                'label' => esc_html__( 'Margin', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => ['px', 'em', '%'],
	                'selectors' => [
	                    '{{WRAPPER}} .tf-step .inner .image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
					'condition' => [
	                    'styles'	=> 'style1',
	                ],
	            ]
	        );	

	

	        $this->add_control(
				'h_number',
				[
					'label' => esc_html__( 'Number', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_control(
				'number_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-step .number' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_control(
				'number_color_bg',
				[
					'label' => esc_html__( 'Background Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-step  .number' => 'background-color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control( 
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'inner_step_border',
					'label' => esc_html__( 'Border', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-step  .number',
				] 
				);
				$this->add_responsive_control( 
					'step_border_radius',		
					[	
						'label' => esc_html__( 'Border Radius', 'themesflat-core' ),	
						'type' => \Elementor\Controls_Manager::DIMENSIONS,	
						'size_units' => [ 'px' , '%' ],	
						'selectors' => [		
							'{{WRAPPER}} .tf-step  .number' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
		
					]
		
				);
			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'number_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-step  .number',
				]
			);
			$this->add_responsive_control( 'number_padding',
	            [
	                'label' => esc_html__( 'Padding', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => ['px', 'em', '%'],
	                'selectors' => [
	                    '{{WRAPPER}} .tf-step  .number' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
					'condition' => [
	                          'styles'	=> ['style1','style3'],
	                ],
	            ]
	        );

			$this->add_control(
				'h_heading',
				[
					'label' => esc_html__( 'Heading', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_control(
				'heading_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-step .heading' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'heading_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-step  .heading',
				]
			);

			$this->add_responsive_control( 'heading_padding',
	            [
	                'label' => esc_html__( 'Padding', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => ['px', 'em', '%'],
	                'selectors' => [
	                    '{{WRAPPER}} .tf-step .heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );	

	        $this->add_responsive_control( 'heading_margin',
	            [
	                'label' => esc_html__( 'Margin', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => ['px', 'em', '%'],
	                'selectors' => [
	                    '{{WRAPPER}} .tf-step .heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );
			$this->add_control(
				'h_sub_heading',
				[
					'label' => esc_html__( 'Sub Heading', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
	                    'styles'	=> 'style2',
	                ],
				]
			);
			$this->add_control(
				'heading_sub_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-step .sub_heading' => 'color: {{VALUE}}',
					],
					'condition' => [
	                    'styles'	=> 'style2',
	                ],
				]
			);
			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'heading_sub_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-step  .sub_heading',
					'condition' => [
	                    'styles'	=> 'style2',
	                ],
				]
			);

			$this->add_responsive_control( 'heading_sub_padding',
	            [
	                'label' => esc_html__( 'Padding', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => ['px', 'em', '%'],
	                'selectors' => [
	                    '{{WRAPPER}} .tf-step .sub_heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
					'condition' => [
	                    'styles'	=> 'style2',
	                ],
	            ]
	        );	

	        $this->add_responsive_control( 'heading_sub_margin',
	            [
	                'label' => esc_html__( 'Margin', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => ['px', 'em', '%'],
	                'selectors' => [
	                    '{{WRAPPER}} .tf-step .sub_heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
					'condition' => [
	                    'styles'	=> 'style2',
	                ],
	            ]
	        );

			$this->add_control(
				'h_text',
				[
					'label' => esc_html__( 'Text', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_control(
				'text_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-step .text' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'text_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-step .text',
				]
			);

			$this->add_responsive_control( 'text_padding',
	            [
	                'label' => esc_html__( 'Padding', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => ['px', 'em', '%'],
	                'selectors' => [
	                    '{{WRAPPER}} .tf-step .text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );	

	        $this->add_responsive_control( 'text_margin',
	            [
	                'label' => esc_html__( 'Margin', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => ['px', 'em', '%'],
	                'selectors' => [
	                    '{{WRAPPER}} .tf-step .text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );


			$this->add_control(
				'h_text_list',
				[
					'label' => esc_html__( 'Text List', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
	                    'styles'	=> 'style1',
	                ],
				]
			);
			$this->add_control(
				'text_list_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-step .inner .text_list p' => 'color: {{VALUE}}',
					],
					'condition' => [
	                    'styles'	=> 'style1',
	                ],
				]
			);
			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'text_list_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-step .inner .text_list p ',
					'condition' => [
	                    'styles'	=> 'style1',
	                ],
				]
			);

			$this->add_responsive_control( 'text_list_padding',
	            [
	                'label' => esc_html__( 'Padding', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => ['px', 'em', '%'],
	                'selectors' => [
	                    '{{WRAPPER}} .tf-step .inner .text_list p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
					'condition' => [
	                    'styles'	=> 'style1',
	                ],
	            ]
	        );	

	        $this->add_responsive_control( 'text_list_margin',
	            [
	                'label' => esc_html__( 'Margin', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => ['px', 'em', '%'],
	                'selectors' => [
	                    '{{WRAPPER}} .tf-step .inner .text_list p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
					'condition' => [
	                    'styles'	=> 'style1',
	                ],
	            ]
	        );

			$this->end_controls_section();
		// /.End Style 
	}	

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();		

		$this->add_render_attribute( 'tf_step', ['id' => "tf-step-{$this->get_id()}", 'class' => ['tf-step', $settings['styles']], 'data-tabid' => $this->get_id() ] );
		
        ?>
<div <?php echo $this->get_render_attribute_string('tf_step') ?>>
    <div class="step">
        <?php foreach ( $settings['list_step'] as $key => $step ): ++$key; ?>
        <?php 
	       				if($key > 4){ 
	       					break; 
	       				}elseif ($settings['styles'] == "style1" && $key > 4) {
	       					break;
	       				}elseif ($settings['styles'] == "style2" && $key > 4) {
	       					break;
	       				} 
	       		?>
        <div
            class="elementor-repeater-item-<?php echo esc_attr($step['_id']); ?> item-step item-step-<?php echo esc_attr($key) ?>">
            <?php if ($settings['styles'] == "style1"): ?>
            <div class="inner">
                <div class="step-header">
                    <span class="number"><?php echo 'step 0'.esc_attr($key); ?></span>
                    <h2 class="heading"><?php echo esc_attr($step['heading']); ?></h2>
                </div>
                <div class="step-body">
                    <h2 class="heading"><?php echo esc_attr($step['heading']); ?></h2>
                    <div class="text"><?php printf($step['text']); ?></div>
                    <div class="text_list"><?php printf($step['text_list']); ?></div>
                </div>
                <div class="image">
                    <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $step, 'thumbnail', 'image'); ?>
                </div>

            </div>
            <?php elseif ($settings['styles'] == "style2"): ?>
            <div class="number"><?php echo '0'.esc_attr($key); ?></div>
            <div class="content">
                <h4 class="heading"><?php echo esc_attr($step['heading']); ?></h4>
                <span class="sub_heading"><?php echo esc_attr($step['sub_heading']); ?></span>
                <div class="text"><?php printf($step['text']); ?></div>
            </div>
            <?php elseif ($settings['styles'] == "style3"): ?>

            <div class="content">
                <span class="number"><?php echo 'step 0'.esc_attr($key); ?></span>
                <h2 class="heading"><?php echo esc_attr($step['heading']); ?></h2>
            </div>
            <div class="text"><?php printf($step['text']); ?></div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php 		
	}

}