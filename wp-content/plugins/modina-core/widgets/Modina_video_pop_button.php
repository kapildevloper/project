<?php
namespace ModinaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Modina_video_pop_button extends Widget_Base {

    public function get_name() {
        return 'Modina_video_pop_button';
    }

    public function get_title() {
        return esc_html__( 'Video Pop Button', 'modina-core' );
    }

    public function get_icon() {
        return 'eicon-video-camera';
    }

    public function get_keywords() {
        return [ 'link', 'button', 'popup', 'video', 'youtube', 'modina'];
    }

    public function get_categories() {
        return [ 'modina-elements' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'button_section',
            [
                'label' => esc_html__( 'Video Button', 'modina-core' ),
            ]
        );

        $this->add_control(
            'btn_link',
            [
                'label' => esc_html__( 'Video Link', 'modina-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => __( 'https://www.youtube.com/watch?v=ll8896fkhfg', 'modina-core' ),
            ]
        );

        $this->add_responsive_control(
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

        $this->start_controls_section(
            'style_button_theme', [
                'label' => esc_html__( 'Button Style', 'modina-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_theme_button_typo',
                'selector' => '{{WRAPPER}} .play-video',
            ]
        );

        $this->add_control(
            'button_color_title', [
                'label' => esc_html__( 'Text Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .play-video' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color', [
                'label' => esc_html__( 'Button Background Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .play-video' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'selector' => '{{WRAPPER}} .play-video',
			]
		);

        $this->add_control(
			'border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'modina-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .play-video' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'button_padding',
			[
				'label' => esc_html__( 'Button Padding', 'modina-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .play-video' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

    }

    protected function render() {

    $settings = $this->get_settings();
    ?>

    <?php if(!empty($settings['btn_link']['url'])) : ?>
    <div class="video-popup-button-wrapper text-<?php echo esc_attr( $settings['text_align'] ); ?>">
        <div class="video-play-btn">
            <a href="<?php echo esc_url($settings['btn_link']['url']); ?>" class="popup-video play-video"><i class="fas fa-play"></i></a>                     
        </div>
    </div>
    <?php endif; ?>

    <?php
    }
}