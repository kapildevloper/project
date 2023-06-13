<?php
namespace ModinaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Modina_banner_hero extends Widget_Base {

    public function get_name() {
        return 'modina_banner_hero';
    }

    public function get_title() {
        return esc_html__( 'Banner Hero - Static', 'modina-core' );
    }

    public function get_icon() {
        return 'eicon-slider-full-screen';
    }

    public function get_keywords() {
        return [ 'service', 'video', 'slider', 'hero', 'banner', 'static', 'modina'];
    }

    public function get_categories() {
        return [ 'modina-elements' ];
    }

    protected function register_controls() {

        // ----- service Item Box ---------//
        $this->start_controls_section(
            'services_section',
            [
                'label' => esc_html__( 'Banner Hero', 'modina-core' ),
            ]
        );

        $this->add_control(
            'banner_image',
            [
                'label' => esc_html__( 'Banner Image', 'modina-core' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],             
            ]
        );

        $this->add_control(
            'banner_title',
            [
                'label' => esc_html__( 'Banner Title', 'modina-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'We’re <span>Digital</span> IT Service Agency',
            ]
        );

        $this->add_control(
            'banner_subtitle',
            [
                'label' => esc_html__( 'Service Info', 'modina-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Quan Tech IT Systems ',
            ]
        );

        $this->add_control(
            'btn_link',
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

        $this->add_control(
            'video_link',
            [
                'label' => esc_html__( 'Video Link', 'modina-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => __( 'https://', 'modina-core' ),
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->end_controls_section();        

        $this->start_controls_section(
            'style_banner_item', [
                'label' => esc_html__( 'Banner Hero Style', 'modina-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'b_color_title', [
                'label' => esc_html__( 'Banner Title Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-3 .single-slide .hero-contents h1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_banner_title',
                'selector' => '{{WRAPPER}} .hero-3 .single-slide .hero-contents h1',
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

    $settings = $this->get_settings();
    ?>

    <?php if ( !empty( $settings['banner_title'] ) ) : ?> 
    <section class="hero-wrapper hero-3">
        <div class="hero-slider-wrapper">
            <div class="single-slide">
                <div class="container">
                    <div class="row align-center text-center text-lg-start">
                        <div class="col-lg-7">
                            <div class="hero-contents">
                                <p class="wow fadeInUp"><?php echo htmlspecialchars_decode( esc_html( $settings['banner_subtitle'] ) ); ?></p>
                                <h1 class="wow fadeInUp" data-wow-delay=".3s"><?php echo htmlspecialchars_decode( esc_html( $settings['banner_title'] ) ); ?></h1>
                                <a href="<?php echo esc_url($settings['btn_link']['url']); ?> <?php modina_is_external($settings['btn_link']); ?> <?php modina_is_nofollow($settings['btn_link']); ?>" data-wow-delay=".7s" class="wow fadeInUp theme-btn btn-radius me-sm-4 mt-4"><?php echo esc_html__( 'Get Consultant', 'modina-core' ); ?></a>
                                <div data-wow-delay=".95s" class="video-play-btn small-circle mt-4 mt-md-0 d-inline-block wow fadeInUp">
                                    <a href="<?php echo esc_url($settings['video_link']['url']); ?>" class="popup-video play-video"><i class="fas fa-play"></i></a>    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 mt-5 mt-lg-0">
                            <div class="hero-img">
                                <img src="<?php echo esc_url($settings['banner_image']['url']); ?>" alt="qunatch">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php
    }
}