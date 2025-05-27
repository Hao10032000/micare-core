<?php
class TFTextScroll_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-text-scroll';
    }
    
    public function get_title() {
        return esc_html__( 'TF Text Scroll', 'themesflat-addons' );
    }

    public function get_icon() {
		return 'eicon-slider-push';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

	public function get_script_depends() {
		return ['gsap', 'scrolltrigger', 'tf-text-scroll'];
	}


	protected function register_controls() {
		// Start List Setting        
			$this->start_controls_section( 'section_setting',
	            [
	                'label' => esc_html__('Setting', 'themesflat-addons'),
	            ]
	        );

            $this->add_control(
				'heading',
				[
					'label' => esc_html__( 'Content Text Scroll', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::TEXT,					
					'default' => esc_html__( 'Innovation in business stems from the generation and implementation of new ideas that create value. These ideas can range from incremental improvements to existing products, services, or processes, to radical breakthroughs that disrupt entire industries.', 'themesflat-addons' ),
					'label_block' => true,
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'section_text_typography',
					'selector' => '{{WRAPPER}} .tf-text-scroll .fade-text',
				]
			);

			$this->add_control( 

				'content_background_color',
	
				[
	
					'label' => esc_html__( 'Text Color', 'themesflat-addons' ),
	
					'type' => \Elementor\Controls_Manager::COLOR,
	
	
					'selectors' => [
	
						'{{WRAPPER}} .tf-text-scroll .fade-text' => 'color: {{VALUE}}',
	
					],
	
				]
	
			); 

			$this->end_controls_section();
        // /.End List Setting              

	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();
        ?>
            <div class="tf-text-scroll">
                <p class="fade-text">
                    <?php echo $settings['heading']; ?>
                </p>
            </div>
		
	<?php  } 

}