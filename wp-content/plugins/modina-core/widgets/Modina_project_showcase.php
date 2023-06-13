<?php

namespace ModinaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use WP_Query;

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


class Modina_project_showcase extends Widget_Base
{

    public function get_name()
    {
        return 'modina_project_showcase';
    }

    public function get_title()
    {
        return esc_html__('Project Showcase', 'modina-core');
    }

    public function get_icon()
    {
        return 'eicon-posts-carousel';
    }

    public function get_keywords()
    {
        return ['project', 'portfolio', 'showcase', 'post', 'work', 'modina'];
    }

    public function get_categories() {
        return [ 'modina-elements' ];
    }

    protected function register_controls() {

         // ------------------- layout select  -----------------------//

        $this->start_controls_section(
            'project_style_select', [
                'label' => __( 'Project Layout - Choice', 'modina-core' ),
            ]
        );

        $this->add_control(
            'style', [
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => [
                    'style_1' => esc_html__( 'Style One', 'modina-core' ),
                    'style_2' => esc_html__( 'Style Two', 'modina-core' ),
                ],
                'default' => 'style_1'
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'project_content_option',
            [
                'label' => __('Project Post Options', 'modina-core'),
            ]
        );

        $this->add_control(
            'post_limit',
            [
                'label' => __('How many posts want to show?', 'modina-core'),
                'type' => Controls_Manager::NUMBER,
                'label_block' => true,
                'default' => 8,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'post_order',
            [
                'label' => __('Project - Post Order?', 'modina-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'label_block' => true,
                'default' => 'DESC',
                'options' => [
                    'DESC'  => __( 'DESC', 'modina-core' ),
                    'ASC'  => __( 'ASC', 'modina-core' ),
                ],
            ]
        );

        $this->end_controls_section();

        // Slider Option
        $this->start_controls_section(
            'slider_settings',
            [
                'label' => __('Carousel Settings', 'modina-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style' => 'style_1',
                ]
            ]
        );

        $this->add_control(
            'slidestoshow',
            [
                'label' => __( 'Slides To Show', 'modina-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'label_block' => true,
                'default' => '3',
                'options' => [
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
                'default' => '800',
                'options' => [
                    '800'  => __( '800 MS', 'modina-core' ),
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

    protected function render() {

    $settings = $this->get_settings();
    $dynamic_id = rand(123, 456);

    $slidestoshow = $settings['slidestoshow'];
    $slidestoscroll = $settings['slidestoscroll'];
    $infinite = $settings['infinite'] == 'yes' ? 'true' : 'false';
    $autoplay = $settings['autoplay'] == 'yes' ? 'true' : 'false';
    $autoplaytimeout =  !empty($settings['autoplaytimeout']) ? $settings['autoplaytimeout'] : '4000'; 

    if ( $settings['style'] == 'style_1' ) {
        include 'project/one.php';
    }

    if ( $settings['style'] == 'style_2' ) {
        include 'project/two.php';
    }

    }
}
