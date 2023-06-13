<?php

namespace ModinaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


class Modina_features_carousel extends Widget_Base
{

    public function get_name()
    {
        return 'modina_features_carousel';
    }

    public function get_title()
    {
        return esc_html__('Features Box Carousel', 'modina-core');
    }

    public function get_icon()
    {
        return 'eicon-carousel';
    }

    public function get_keywords()
    {
        return ['features', 'core', 'box', 'why', 'carousel', 'modina'];
    }

    public function get_categories() {
        return [ 'modina-elements' ];
    }

    protected function register_controls() {

         // -------------------  Title Section  -----------------------//
        $this->start_controls_section(
            'section_contents',
            [
                'label' => esc_html__( 'Core Features', 'modina-core' ),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'flaticon',
            [
                'label'      => __( 'Flaticon', 'modina-core' ),
                'type'       => Controls_Manager::ICON,
                'options'    => modina_flaticons(),
                'include'    => modina_include_flaticons(),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'feature_title',
            [
                'label' => esc_html__( 'Feature Title', 'modina-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'feature_text',
            [
                'label' => esc_html__( 'Feature Text', 'modina-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'all_features',
            [
                'label' => esc_html__( 'All Features', 'modina-core' ),
                'type' =>Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'feature_title'   => 'Fast & Efficient Delivery',
                        'feature_text'   => 'We enhance our operations by relieving you of the worries.',
                    ],
                ],
                'title_field' => '{{{feature_title}}}'
            ]
        );

        $this->end_controls_section(); 

        // Slider Option
        $this->start_controls_section(
            'slider_settings',
            [
                'label' => __('Carousel Settings', 'modina-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'slidestoshow',
            [
                'label' => __( 'Slides To Show', 'modina-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'label_block' => true,
                'default' => '4',
                'options' => [
                    '2'  => __( '2', 'modina-core' ),
                    '3'  => __( '3', 'modina-core' ),
                    '4'  => __( '4', 'modina-core' ),
                    '5'  => __( '5', 'modina-core' ),
                    '6'  => __( '6', 'modina-core' ),
                ],
            ]
        );

        $this->add_control(
            'slidestoscroll',
            [
                'label' => __( 'Slides To Scroll', 'modina-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'label_block' => true,
                'default' => '2',
                'options' => [
                    '1'  => __( '1', 'modina-core' ),
                    '2'  => __( '2', 'modina-core' ),
                    '3'  => __( '3', 'modina-core' ),
                    '4'  => __( '4', 'modina-core' ),
                ],
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
                'default' => 'false',
            ]
        );

        $this->add_control(
            'infinite',
            [
                'label' => __( 'Infinite Loop', 'modina-core' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'modina-core' ),
                'label_off' => __( 'Hide', 'modina-core' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'autoplaytimeout',
            [
                'label' => __( 'Autoplay Timeout', 'modina-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'label_block' => true,
                'default' => '5000',
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
            'style_wrapper',
            [
                'label' => __('Features Style', 'modina-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icons_color', [
                'label' => esc_html__( 'Icon Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_icon_style',
                'selector' => '{{WRAPPER}} .icon i',
            ]
        );

        $this->add_control(
            'color_heading_span', [
                'label' => esc_html__( 'Title Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-features-item h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_heading',
                'selector' => '{{WRAPPER}} .single-features-item h4',
            ]
        );
        
        $this->add_control(
            'color_item_text', [
                'label' => esc_html__( 'Text Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-features-item p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_sec_text',
                'selector' => '{{WRAPPER}} .single-features-item p',
            ]
        );
        
        $this->add_control(
            'text_align',
            [
                'label' => __( 'Alignment', 'modina-core' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => __( 'Left', 'modina-core' ),
                        'icon' => 'fas fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'modina-core' ),
                        'icon' => 'fas fa-align-center',
                    ],
                    'end' => [
                        'title' => __( 'Right', 'modina-core' ),
                        'icon' => 'fas fa-align-right',
                    ],
                ],
                'default' => 'start',
                'toggle' => true,
            ]
        );

        $this->end_controls_section();

    }


    protected function render() {

    $settings = $this->get_settings();
    $dynamic_id = rand(123, 456);

    $all_features = $settings['all_features'];

    $slidestoshow = !empty($settings['slidestoshow']) ? $settings['slidestoshow'] : '4';
    $slidestoscroll = !empty($settings['slidestoscroll']) ? $settings['slidestoscroll'] : '2';
    $infinite = $settings['infinite'] == 'yes' ? 'true' : 'false';
    $autoplay = $settings['autoplay'] == 'yes' ? 'true' : 'false';
    $autoplaytimeout =  !empty($settings['autoplaytimeout']) ? $settings['autoplaytimeout'] : '5000';  

    ?>
    
    <?php if (!empty($all_features)) : ?>
        <div class="core-features-carousel id-<?php echo $dynamic_id; ?> text-<?php echo esc_attr( $settings['text_align'] ); ?>">
        <?php if (!empty($all_features)) { $i = 0;
            foreach ($all_features as $item) { $i++; ?>
            <div class="single-features-item">
                <?php if( !empty($item['flaticon'] ) ) : ?>
                <div class="icon">
                    <i class="<?php echo esc_attr( $item['flaticon'] ); ?>"></i>
                </div>
                <?php endif; ?>
                <div class="contents">
                    <h4><?php echo esc_html( $item['feature_title'] ); ?></h4>
                    <p><?php echo esc_html( $item['feature_text'] ); ?></p>
                </div>
            </div>
            <?php }
        } ?>
        </div>

        <script>
            (function ( $ ) {
                "use strict";
                $(document).ready( function() {
                    $('.core-features-carousel.id-<?php echo $dynamic_id; ?>').slick({
                        autoplay: <?php echo $autoplay; ?>,
                        infinite: <?php echo $infinite; ?>,
                        speed: <?php echo $autoplaytimeout; ?>,
                        slidesToShow: <?php echo $slidestoshow; ?>,
                        slidesToScroll: <?php echo $slidestoscroll; ?>, 
                        arrows: true,
                        prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fal fa-arrow-left' aria-hidden='true'></i></button>",
                        nextArrow:"<button type='button' class='slick-next pull-right'><i class='fal fa-arrow-right' aria-hidden='true'></i></button>",
                        dots: false,
                        responsive: [
                            {
                                breakpoint: 1191,
                                settings: {
                                    slidesToShow: 3,
                                    center: true,
                                }
                            },
                            {
                                breakpoint: 991,
                                settings: {
                                    slidesToShow: 2,
                                    center: true,
                                }
                            },
                            {
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 1,
                                    center: true,
                                }
                            },
                            {
                                breakpoint: 580,
                                settings: {
                                    slidesToShow: 1
                                }
                            },
                        ],
                    });
                });
            }( jQuery ));
        </script>
    <?php endif; ?>
<?php
    }
}
