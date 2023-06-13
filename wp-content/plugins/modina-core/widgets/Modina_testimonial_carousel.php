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


class Modina_testimonial_carousel extends Widget_Base
{

    public function get_name()
    {
        return 'modina_testimonial_carousel';
    }

    public function get_title()
    {
        return esc_html__('Testimonial Carousel', 'modina-core');
    }

    public function get_icon()
    {
        return 'eicon-carousel-loop';
    }

    public function get_keywords()
    {
        return ['testimonial', 'review', 'client', 'feedback', 'carousel', 'modina'];
    }

    public function get_categories() {
        return [ 'modina-elements' ];
    }

    protected function register_controls() {


         // -------------------  Title Section  -----------------------//
        $this->start_controls_section(
            'section_contents',
            [
                'label' => esc_html__( 'Testimonial - Carousel', 'modina-core' ),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'client_img', [
                'label' => esc_html__( 'Client Image', 'modina-core' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default' => [
                    'url' => plugin_dir_url( __DIR__ ).'assets/img/client1.jpg',
                ],
            ]
        );

        $repeater->add_control(
            'client_name',
            [
                'label' => esc_html__( 'Client Name', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'client_position',
            [
                'label' => esc_html__( 'Client Position - Level', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'client_feedback',
            [
                'label' => esc_html__( 'Client Feedback - Review', 'modina-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'rating',
            [
                'label' => __('Rating', 'modina-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => .5,
                    ],
                ],
                'default' => [
                    'size' => 5,
                ]
            ]
        );

        $this->add_control(
            'all_testimonial',
            [
                'label' => esc_html__( 'All Testimonial', 'modina-core' ),
                'type' =>Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'client_img' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/client1.jpg',
                        ],
                        'client_name'   => 'James R Lawrence',
                        'client_position'   => 'IT Manager, IT Solutions Ltd.',
                        'client_feedback'   => 'IT Solutions provides me day to day challenges and variety 
                        in my work that keeps me engaged and interested. There is a strong work ethic culture.',
                    ],
                ],
                'title_field' => '{{{client_name}}}'
            ]
        );

        $this->end_controls_section(); 

        // Slider Option
        $this->start_controls_section('slider_settings',
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
                'default' => '2',
                'options' => [
                    '1'  => __( '1', 'modina-core' ),
                    '2'  => __( '2', 'modina-core' ),
                    '3'  => __( '3', 'modina-core' ),
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
            'default' => 'yes',
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
            'default' => '1000',
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

    }

    protected function rating_render($value = '') {
        $ratefull = '<i class="fas fa-star"></i>';
        $ratehalf = '<i class="fas fa-star-half-alt"></i>';
        $rateO = '<i class="far fa-star"></i>';

        if ($value > 4.75) {
            return $ratefull . $ratefull . $ratefull . $ratefull . $ratefull;
        } elseif ($value <= 4.75 && $value > 4.25) {
            return $ratefull . $ratefull . $ratefull . $ratefull . $ratehalf;
        } elseif ($value <= 4.25 && $value > 3.75) {
            return $ratefull . $ratefull . $ratefull . $ratefull . $rateO;
        } elseif ($value <= 3.75 && $value > 3.25) {
            return $ratefull . $ratefull . $ratefull . $ratehalf . $rateO;
        } elseif ($value <= 3.25 && $value > 2.75) {
            return $ratefull . $ratefull . $ratefull . $rateO . $rateO;
        } elseif ($value <= 2.75 && $value > 2.25) {
            return $ratefull . $ratefull . $ratehalf . $rateO . $rateO;
        } elseif ($value <= 2.25 && $value > 1.75) {
            return $ratefull . $ratefull . $rateO . $rateO . $rateO;
        } elseif ($value <= 1.75 && $value > 1.25) {
            return $ratefull . $ratehalf . $rateO . $rateO . $rateO;
        } elseif ($value <= 1.25) {
            return $ratefull . $rateO . $rateO . $rateO . $rateO;
        }
    }

    protected function render() {

    $settings = $this->get_settings();
    $dynamic_id = rand(123, 456);

    $all_testimonial = $settings['all_testimonial'];

    $slidestoshow = !empty($settings['slidestoshow']) ? $settings['slidestoshow'] : '2';
    $slidestoscroll = !empty($settings['slidestoscroll']) ? $settings['slidestoscroll'] : '2';
    $infinite = $settings['infinite'] == 'yes' ? 'true' : 'false';
    $autoplay = $settings['autoplay'] == 'yes' ? 'true' : 'false';
    $autoplaytimeout =  !empty($settings['autoplaytimeout']) ? $settings['autoplaytimeout'] : '800';  
    ?>
    
    <?php if (!empty($all_testimonial)) : ?>
        <div class="testimonial-carousel-grid-active id-<?php echo $dynamic_id; ?>">
        <?php if (!empty($all_testimonial)) { $i = 0;
            foreach ($all_testimonial as $item) { $i++; ?>
            <div class="single-testimonial-card">
                <?php if( !empty($item['client_img']['url'] ) ) : ?>
                <div class="client-img bg-cover bg-center" style="background-image: url('<?php echo esc_url($item['client_img']['url']); ?>')"></div>
                <?php endif; ?>
                <div class="content">
                    <p><?php echo htmlspecialchars_decode(esc_html($item['client_feedback'])); ?></p>
                    <?php if (!empty($item['rating']['size'])) : ?>
                    <div class="client-rating mt-15">
                        <?php echo $this->rating_render($item['rating']['size']); ?>
                    </div>
                    <?php endif; ?>
                    <h4><?php echo htmlspecialchars_decode(esc_html($item['client_name'])); ?></h4>
                    <span><?php echo htmlspecialchars_decode(esc_html($item['client_position'])); ?></span>
                </div>
            </div>
            <?php }
        } ?>
        </div>

        <script>
            (function ( $ ) {
                "use strict";
                $(document).ready( function() {

                    if($('.testimonial-carousel-grid-active.id-<?php echo $dynamic_id; ?>').length > 0) {
                        $('.testimonial-carousel-grid-active.id-<?php echo $dynamic_id; ?>').slick({
                            autoplay: <?php echo $autoplay; ?>,
                            infinite: <?php echo $infinite; ?>,
                            speed: <?php echo $autoplaytimeout; ?>,
                            slidesToShow: <?php echo $slidestoshow; ?>,
                            slidesToScroll: <?php echo $slidestoscroll; ?>, 
                            arrows: false,
                            dots: true,
                            dotsClass: 'circle-dots',
                            responsive: [
                                {
                                breakpoint: 768,
                                    settings: {
                                        slidesToShow: 1,
                                        center: true,
                                    }
                                },
                                {
                                breakpoint: 480,
                                    settings: {
                                        slidesToShow: 1
                                    }
                                }
                            ],
                        });
                    }
                });
            }( jQuery ));
        </script>
    <?php endif; ?>
<?php
    }
}
