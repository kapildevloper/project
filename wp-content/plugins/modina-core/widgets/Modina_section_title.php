<?php
namespace ModinaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Modina_section_title extends Widget_Base {

    public function get_name() {
        return 'modina_section_title';
    }

    public function get_title() {
        return esc_html__( 'Section Title', 'modina-core' );
    }

    public function get_icon() {
        return 'eicon-t-letter';
    }

    public function get_keywords() {
        return [ 'title', 'section', 'text', 'heading', 'modina'];
    }

    public function get_categories() {
        return [ 'modina-elements' ];
    }

    protected function register_controls() {

        // -------------------  Title Section  -----------------------//
        $this->start_controls_section(
            'section_heading',
            [
                'label' => esc_html__( 'Section Title', 'modina-core' ),
            ]
        );

        $this->add_control(
            'heading',
            [
                'label' => esc_html__( 'Heading Text', 'modina-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'We Help you Build and Grow Business',
            ]
        );

        $this->add_control(
            'color_heading', [
                'label' => esc_html__( 'Heading Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_heading',
                'selector' => '{{WRAPPER}} .section-title h2',
            ]
        );

        $this->end_controls_section(); 

        // ------------------- Sub Title Section  -----------------------//
        $this->start_controls_section(
            'section_sub_heading',
            [
                'label' => esc_html__( 'Section Sub Heading', 'modina-core' ),
            ]
        );

        $this->add_control(
            'sub_heading',
            [
                'label' => esc_html__( 'Sub Heading', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Our Feature',
            ]
        );

        $this->add_control(
            'color_sub_heading', [
                'label' => esc_html__( 'Sub Heading Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'color_line_sub_heading', [
                'label' => esc_html__( 'Line Background Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title > span::before ' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_sub_heading',
                'selector' => '{{WRAPPER}} .section-title > span',
            ]
        );

        $this->end_controls_section(); 

        $this->start_controls_section(
            'section_text_tab',
            [
                'label' => esc_html__( 'Section Text Content', 'modina-core' ),
            ]
        );

        $this->add_control(
            'section_text',
            [
                'label' => esc_html__( 'Text', 'modina-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'color_section_text', [
                'label' => esc_html__( 'Text Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_sec_text',
                'selector' => '{{WRAPPER}} p',
            ]
        );

        $this->end_controls_section(); 


        $this->start_controls_section(
            'style_section',
            [
                'label' => __('Section Alignment', 'modina-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
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
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'modina-core' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'end' => [
                        'title' => __( 'Right', 'modina-core' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
            ]
        );

        $this->end_controls_section(); 

    }

    protected function render() {
    $settings = $this->get_settings();
    ?>

    <?php if (!empty($settings['heading'])) : ?>
    <div class="section-title text-<?php echo esc_attr( $settings['text_align'] ); ?>">
        <span><?php echo htmlspecialchars_decode(esc_html($settings['sub_heading'])); ?></span>
        <h2><?php echo htmlspecialchars_decode(esc_html($settings['heading'])); ?></h2>
        <?php if (!empty($settings['section_text'])) : ?>
        <p><?php echo htmlspecialchars_decode(esc_html($settings['section_text'])); ?></p>
        <?php endif; ?>
    </div>
    <?php endif; ?>

    <?php
    }
}