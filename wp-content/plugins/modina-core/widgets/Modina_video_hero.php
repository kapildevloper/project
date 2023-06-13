<?php
namespace ModinaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Modina_video_hero extends Widget_Base {

    public function get_name() {
        return 'modina_video_hero';
    }

    public function get_title() {
        return esc_html__( 'Hero 3 - Video Slide', 'modina-core' );
    }

    public function get_icon() {
        return 'eicon-post-slider';
    }

    public function get_keywords() {
        return [ 'trandsland', 'hero', 'slider', 'carousel', 'video', 'modina'];
    }

    public function get_categories() {
        return [ 'modina-elements' ];
    }

    protected function register_controls() {

        // -------------------  Title Section  -----------------------//


        $this->start_controls_section(
            'hero_section_heading',
            [
                'label' => esc_html__( 'Slider - Hero', 'modina-core' ),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'hero_image', [
                'label' => esc_html__( 'Slide Background Image', 'modina-core' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
            ]
        );

        $repeater->add_control(
            'hero_subtitle',
            [
                'label' => esc_html__( 'Sub Heading Text', 'modina-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'We Have 30 Years Of Experience In Green Energy',
            ]
        );

        $repeater->add_control(
            'hero_heading',
            [
                'label' => esc_html__( 'Heading Text', 'modina-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Best Solar <br> Energy in the world',
            ]
        );


        $repeater->add_control(
            'button_text1',
            [
                'label' => esc_html__( 'Button Title - Active', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Service we provide',                
            ]
        );

        $repeater->add_control(
            'btn_link1',
            [
                'label' => esc_html__( 'Button Link', 'modina-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => __( 'https://', 'modina-core' ),
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $repeater->add_control(
            'button_text2',
            [
                'label' => esc_html__( 'Button Text - Normal', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'learn more',
            ]
        );

        $repeater->add_control(
            'btn_link2',
            [
                'label' => esc_html__( 'Button Link', 'modina-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => __( 'https://', 'modina-core' ),
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $repeater->add_control(
            'video_popup_link',
            [
                'label' => esc_html__( 'Video Popup Link', 'modina-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => __( 'https://', 'modina-core' ),
                'default' => [
                    'url' => 'https://www.youtube.com/watch?v=NLO9w963Aj0',
                ],
            ]
        );

        $this->add_control(
            'hero_slides',
            [
                'label' => esc_html__( 'All Slides', 'modina-core' ),
                'type' =>Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'hero_heading'   => 'Best Energy Plant <br> service in the world',
                    ],
                ],
                'title_field' => '{{{hero_heading}}}'
            ]
        );

        $this->end_controls_section();

        // Slider Option
        $this->start_controls_section('slider_settings',
            [
                'label' => __('Slider Settings', 'modina-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'dots',
            [
                'label' => __( 'Show Dots?', 'modina-core' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'modina-core' ),
                'label_off' => __( 'Hide', 'modina-core' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label' => __( 'Auto Play?', 'modina-core' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'modina-core' ),
                'label_off' => __( 'Hide', 'modina-core' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'speed',
            [
                'label' => __( 'Autoplay Timeout', 'modina-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'label_block' => true,
                'default' => '2000',
                'options' => [
                    '1000'  => __( '1 Second', 'modina-core' ),
                    '2000'  => __( '2 Second', 'modina-core' ),
                    '3000'  => __( '3 Second', 'modina-core' ),
                    '4000'  => __( '4 Second', 'modina-core' ),
                    '5000'  => __( '5 Second', 'modina-core' ),
                    '6000'  => __( '6 Second', 'modina-core' ),
                    '7000'  => __( '7 Second', 'modina-core' ),
                    '8000'  => __( '8 Second', 'modina-core' ),
                    '9000'  => __( '9 Second', 'modina-core' ),
                    '10000' => __( '10 Second', 'modina-core' ),
                    '11000' => __( '11 Second', 'modina-core' ),
                    '12000' => __( '12 Second', 'modina-core' ),
                    '13000' => __( '13 Second', 'modina-core' ),
                    '14000' => __( '14 Second', 'modina-core' ),
                    '15000' => __( '15 Second', 'modina-core' ),
                ],
            ]
        );
        
        $this->end_controls_section();


        $this->start_controls_section(
            'slide_items_style', [
                'label' => esc_html__( 'Slide Style', 'modina-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'color_heading', [
                'label' => esc_html__( 'Heading Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-slide .slide-contents h1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_heading',
                'selector' => '{{WRAPPER}} .single-slide .slide-contents h1',
            ]
        );

        $this->add_control(
            'color_subheading', [
                'label' => esc_html__( 'Sub Heading Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-slide .slide-contents .sub-title h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_subheading',
                'selector' => '{{WRAPPER}} .single-slide .slide-contents .sub-title h4',
            ]
        );

        $this->add_control(
            'button_color1', [
                'label' => esc_html__( 'Button Text Color - Active', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-slide .slide-contents .theme-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color1', [
                'label' => esc_html__( 'Button Background Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-slide .slide-contents .theme-btn' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_color2', [
                'label' => esc_html__( 'Button Text Color - Normal', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-slide .slide-contents .theme-btn.no-fil' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color2', [
                'label' => esc_html__( 'Button Background Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-slide .slide-contents .theme-btn.no-fil' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Section Color 
        $this->start_controls_section(
            'hero_slide_bg_color',
            [
                'label' => esc_html__( 'Slide Background Color', 'modina-core' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'slide_bg_color', [
                'label'   => esc_html__( 'Background Color', 'modina-core' ),
                'type'    => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .hero-slider .single-slide' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'slide_padding_tab', [
                'label' => esc_html__( 'Slide Padding', 'modina-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'slide_wraper_padding', [
                'label' => esc_html__( 'Padding', 'modina-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .hero-slider .single-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'unit' => 'px',
                    'isLinked' => false,
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

    $settings = $this->get_settings();
    $hero_slides = $settings['hero_slides'];
    $dynamic_id = rand(123, 456);

    $dots = $settings['dots'] == 'yes' ? 'true' : 'false';
    $autoplay = $settings['autoplay'] == 'yes' ? 'true' : 'false';
    $autoplaytimeout =  !empty($settings['autoplaytimeout']) ? $settings['autoplaytimeout'] : '2000';  
    ?>

    <div class="hero-slide-wrapper hero-3">
        <div class="hero-slider-3 slider-<?php echo $dynamic_id; ?> transland-dots">
        <?php if (!empty($hero_slides)) { $i = 0;
            foreach ($hero_slides as $item) { $i++; ?>
            <div class="single-slide bg-cover" style="background-image: url('<?php echo esc_url($item['hero_image']['url']); ?>')">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-9 mt-5 mt-lg-0 order-2 order-lg-1 text-center text-lg-start">
                            <div class="hero-contents text-white">
                                <?php if( !empty($item['hero_subtitle'] ) ) : ?>
                                <p class="animated" data-animation-in="fadeInLeft" data-delay-in="0.04"><?php echo htmlspecialchars_decode(esc_html($item['hero_subtitle'])); ?></p>
                                <?php endif; ?>

                                <h1 class="animated" data-animation-in="fadeInLeft" data-delay-in="0.3"><?php echo htmlspecialchars_decode(esc_html($item['hero_heading'])); ?></h1>

                                <?php if( !empty( $item['btn_link1']['url'] && $item['button_text1'] ) ) : ?>
                                <a href="<?php echo esc_url($item['btn_link1']['url']); ?>" <?php modina_is_external($item['btn_link1']); ?> <?php modina_is_nofollow($item['btn_link1']); ?> class="theme-btn animated" data-animation-in="fadeInLeft" data-delay-in="0.9"><?php echo esc_html( $item['button_text1'] ); ?> <i class="fas fa-arrow-right"></i></a>
                                <?php endif; ?>

                                <?php if( !empty( $item['btn_link2']['url'] &&  $item['button_text2'] ) ) : ?>
                                <a href="<?php echo esc_url($item['btn_link2']['url']); ?>" <?php modina_is_external($item['btn_link2']); ?> <?php modina_is_nofollow($item['btn_link2']); ?> data-animation-in="fadeInLeft" data-delay-in="0.6" class="theme-btn minimal-btn animated"><?php echo esc_html( $item['button_text2'] ); ?> <i class="fas fa-arrow-right"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3 col-12 order-1 order-lg-2 text-center text-lg-end">
                            <?php if( !empty($item['video_popup_link']['url'] ) ) : ?>
                            <div class="video-play-btn animated" data-animation-in="fadeInUp" data-delay-in="0.8">
                                <a href="<?php echo esc_url( $item['video_popup_link']['url'] ); ?>" class="play-video popup-video"><i class="fas fa-play"></i></a>                     
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php }
         } ?>
        </div>
    </div>

    <script>
        (function ( $ ) {
            "use strict";
            $(document).ready( function() {
                if($('.hero-slider-3.slider-<?php echo $dynamic_id; ?>').length > 0) {
                    $('.hero-slider-3.slider-<?php echo $dynamic_id; ?>').slick({
                        autoplay: <?php echo $autoplay; ?>,
                        speed: <?php echo $autoplaytimeout; ?>,
                        lazyLoad: 'progressive',
                        arrows: false,
                        dots: <?php echo $dots; ?>,
                    }).slickAnimation();
                }
            });
        }( jQuery ));
    </script>

    <?php
    }
}