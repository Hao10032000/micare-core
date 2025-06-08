<?php
/**
 * Tạo widget Slider với Swiper cho Elementor
 */
class Custom_Swiper_Slider_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'custom_swiper_slider';
    }

    public function get_title() {
        return __('Widget Slider', 'themesflat-core');
    }

    public function get_icon() {
        return 'eicon-slides';
    }

    public function get_categories() {

        return [ 'themesflat_addons' ];

    }

	public function get_style_depends(){
	    return ['tfc-swiper','tf-flex-slidercore'];
	}

    public function get_script_depends() {
    	return ['tfc-swiper', 'tf-flex-slidercore'];
  	}

    protected function _register_controls() {
        // Section Content
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Slider Content', 'themesflat-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        // Background Image
        $repeater->add_control(
            'background_image',
            [
                'label' => __('Background Image', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [

						'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/default-road-map.jpg",

					],
            ]
        );

        // Subtitle
        $repeater->add_control(
            'subtitle',
            [
                'label' => __('Subtitle', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Slider Subtitle', 'themesflat-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'icon_subtitle',
            [
                'label' => __('Icon Subtitle', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        // Title
        $repeater->add_control(
            'title',
            [
                'label' => __('Title', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Slider Title', 'themesflat-core'),
                'label_block' => true,
            ]
        );

        // Button 1
        $repeater->add_control(
            'button_1_text',
            [
                'label' => __('Button 1 Text', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Button 1', 'themesflat-core'),
            ]
        );

        $repeater->add_control(
            'button_1_link',
            [
                'label' => __('Button 1 Link', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'themesflat-core'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        // Button 2
        $repeater->add_control(
            'button_2_text',
            [
                'label' => __('Button 2 Text', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Button 2', 'themesflat-core'),
            ]
        );

        $repeater->add_control(
            'button_2_link',
            [
                'label' => __('Button 2 Link', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'themesflat-core'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        // Slides
        $this->add_control(
            'slides',
            [
                'label' => __('Slides', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => __('Slide 1 Title', 'themesflat-core'),
                        'subtitle' => __('Slide 1 Subtitle', 'themesflat-core'),
                    ],
                    [
                        'title' => __('Slide 2 Title', 'themesflat-core'),
                        'subtitle' => __('Slide 2 Subtitle', 'themesflat-core'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();

        // Section Settings
        $this->start_controls_section(
            'settings_section',
            [
                'label' => __('Slider Settings', 'themesflat-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Autoplay
        $this->add_control(
            'autoplay',
            [
                'label' => __('Autoplay', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'themesflat-core'),
                'label_off' => __('No', 'themesflat-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        // Autoplay Delay
        $this->add_control(
            'autoplay_delay',
            [
                'label' => __('Autoplay Delay (ms)', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 5000,
                'condition' => [
                    'autoplay' => 'yes',
                ],
            ]
        );

        // Loop
        $this->add_control(
            'loop',
            [
                'label' => __('Loop', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'themesflat-core'),
                'label_off' => __('No', 'themesflat-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        // Effect
        $this->add_control(
            'effect',
            [
                'label' => __('Effect', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'slide',
                'options' => [
                    'slide' => __('Slide', 'themesflat-core'),
                    'fade' => __('Fade', 'themesflat-core'),
                    'cube' => __('Cube', 'themesflat-core'),
                    'coverflow' => __('Coverflow', 'themesflat-core'),
                    'flip' => __('Flip', 'themesflat-core'),
                ],
            ]
        );

        // Show Navigation Arrows
        $this->add_control(
            'show_arrows',
            [
                'label' => __('Show Navigation Arrows', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'themesflat-core'),
                'label_off' => __('Hide', 'themesflat-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        // Show Bullets
        $this->add_control(
            'show_bullets',
            [
                'label' => __('Show Bullets', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'themesflat-core'),
                'label_off' => __('Hide', 'themesflat-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

        // Style Section
        $this->start_controls_section(
            'style_section',
            [
                'label' => __('Style', 'themesflat-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Slide Height
        $this->add_responsive_control(
            'slide_height',
            [
                'label' => __('Slide Height', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1000,
                    ],
                    'vh' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'size' => 500,
                    'unit' => 'px',
                ],
                'size_units' => ['px', 'vh'],
                'selectors' => [
                    '{{WRAPPER}} .swiper-slide' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Title Style
        $this->add_control(
            'title_style',
            [
                'label' => __('Title', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Color', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swiper-slide-content .slide-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .swiper-slide-content .slide-title',
            ]
        );

        // Subtitle Style
        $this->add_control(
            'subtitle_style',
            [
                'label' => __('Subtitle', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __('Color', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swiper-slide-content .slide-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'selector' => '{{WRAPPER}} .swiper-slide-content .slide-subtitle',
            ]
        );

        // Buttons Style
        $this->add_control(
            'buttons_style',
            [
                'label' => __('Buttons', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .swiper-slide-content .slide-button',
            ]
        );

        $this->start_controls_tabs('button_tabs');

        // Normal State
        $this->start_controls_tab(
            'button_normal',
            [
                'label' => __('Normal', 'themesflat-core'),
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => __('Text Color', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swiper-slide-content .slide-button' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_background_color',
            [
                'label' => __('Background Color', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swiper-slide-content .slide-button' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .swiper-slide-content .slide-button',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __('Border Radius', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .swiper-slide-content .slide-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        // Hover State
        $this->start_controls_tab(
            'button_hover',
            [
                'label' => __('Hover', 'themesflat-core'),
            ]
        );

        $this->add_control(
            'button_text_color_hover',
            [
                'label' => __('Text Color', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swiper-slide-content .slide-button:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_background_color_hover',
            [
                'label' => __('Background Color', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swiper-slide-content .slide-button:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_border_color_hover',
            [
                'label' => __('Border Color', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swiper-slide-content .slide-button:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        // Navigation Style
        $this->add_control(
            'navigation_style',
            [
                'label' => __('Navigation', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // Arrows Style
        $this->add_control(
            'arrows_style',
            [
                'label' => __('Arrows', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'arrows_color',
            [
                'label' => __('Color', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swiper-button-next, {{WRAPPER}} .swiper-button-prev' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'show_arrows' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'arrows_size',
            [
                'label' => __('Size', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 60,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .swiper-button-next, {{WRAPPER}} .swiper-button-prev' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'show_arrows' => 'yes',
                ],
            ]
        );

        // Bullets Style
        $this->add_control(
            'bullets_style',
            [
                'label' => __('Bullets', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'bullets_color',
            [
                'label' => __('Color', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination-bullet' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'show_bullets' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'bullets_active_color',
            [
                'label' => __('Active Color', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination-bullet-active' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'show_bullets' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'bullets_size',
            [
                'label' => __('Size', 'themesflat-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 20,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'show_bullets' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Swiper options
        $swiper_options = [
            'slidesPerView' => 1,
            'loop' => ('yes' === $settings['loop']),
            'speed' => 800,
            'effect' => $settings['effect'],
            'autoplay' => ('yes' === $settings['autoplay']) ? [
                'delay' => $settings['autoplay_delay'],
                'disableOnInteraction' => false,
            ] : false,
            'pagination' => ('yes' === $settings['show_bullets']) ? [
                'el' => '.swiper-pagination',
                'clickable' => true,
            ] : false,
            'navigation' => ('yes' === $settings['show_arrows']) ? [
                'nextEl' => '.swiper-button-next',
                'prevEl' => '.swiper-button-prev',
            ] : false,
        ];

        // Content alignment class
        $content_alignment = 'text-left';

        ?>
        <div class="custom-swiper-slider">
            <div class="swiper-container" data-swiper-options='<?php echo wp_json_encode($swiper_options); ?>'>
                <div class="swiper-wrapper">
                    <?php foreach ($settings['slides'] as $slide) : ?>
                        <div class="swiper-slide">
                            <div class="swiper-slide-bg" style="background-image: url('<?php echo esc_url($slide['background_image']['url']); ?>')"></div>
                            <div class="swiper-slide-content <?php echo esc_attr($content_alignment); ?>">
                                <?php if ($slide['subtitle']) : ?>
                                    <div class="slide-subtitle fade-item fade-item-1">
                                        <?php if ($slide['icon_subtitle']['url']) : ?>
                                            <span><img src="<?php echo esc_url($slide['icon_subtitle']['url']); ?>" alt="logo"></span>
                                        <?php endif; ?>
                                        <?php echo esc_html($slide['subtitle']); ?>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ($slide['title']) {
                                    echo sprintf('<h2 class="slide-title fade-item fade-item-2">%s</h2>', $slide['title']);
                                } ?>

                                <div class="slide-buttons fade-item fade-item-3">
                                    <?php if ($slide['button_1_text']) : ?>
                                        <a href="<?php echo esc_url($slide['button_1_link']['url']); ?>" 
                                           class="slide-button button-1 tf-btn"
                                           <?php echo $slide['button_1_link']['is_external'] ? 'target="_blank"' : ''; ?>
                                           <?php echo $slide['button_1_link']['nofollow'] ? 'rel="nofollow"' : ''; ?>>
                                            <?php echo esc_html($slide['button_1_text']); ?> <i aria-hidden="true" class="icon-micare-arrow-right"></i>
                                        </a>
                                    <?php endif; ?>
                                    
                                    <?php if ($slide['button_2_text']) : ?>
                                        <a href="<?php echo esc_url($slide['button_2_link']['url']); ?>" 
                                           class="slide-button button-2 tf-btn white"
                                           <?php echo $slide['button_2_link']['is_external'] ? 'target="_blank"' : ''; ?>
                                           <?php echo $slide['button_2_link']['nofollow'] ? 'rel="nofollow"' : ''; ?>>
                                            <?php echo esc_html($slide['button_2_text']); ?> <i aria-hidden="true" class="icon-micare-arrow-right"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                
                <?php if ('yes' === $settings['show_bullets']) : ?>
                    <div class="wrap-bullet">
                        <div class="swiper-pagination"></div>
                    </div>
                <?php endif; ?>
                
                <?php if ('yes' === $settings['show_arrows']) : ?>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }

}