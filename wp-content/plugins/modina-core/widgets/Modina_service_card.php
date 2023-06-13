<?php
namespace ModinaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Modina_service_card extends Widget_Base {

    public function get_name() {
        return 'modina_service_card';
    }

    public function get_title() {
        return esc_html__( 'Service Box Card', 'modina-core' );
    }

    public function get_icon() {
        return 'eicon-info-box';
    }

    public function get_keywords() {
        return [ 'service', 'web', 'agency', 'card', 'info', 'code', 'modina'];
    }

    public function get_categories() {
        return [ 'modina-elements' ];
    }

    protected function register_controls() {

        // ----- service Item Box ---------//
        $this->start_controls_section(
            'services_section',
            [
                'label' => esc_html__( 'Our Services', 'modina-core' ),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'service_icon',
            [
                'label' => esc_html__( 'Image', 'modina-core' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],             
            ]
        );


        $repeater->add_control(
            'service_title',
            [
                'label' => esc_html__( 'Service Title', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'service_info',
            [
                'label' => esc_html__( 'Service Info', 'modina-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Sale and buy are the central strategies of trade.',
            ]
        );

        $repeater->add_control(
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
            'service_items',
            [
                'label' => esc_html__( 'All Services', 'modina-core' ),
                'type' =>Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'service_title'   => 'It Solutions',
                    ],
                ],
                'title_field' => '{{{service_title}}}'
            ]
        );

        $this->end_controls_section();        

        $this->start_controls_section(
            'style_service_item', [
                'label' => esc_html__( 'Service Item Style', 'modina-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            's_color_title', [
                'label' => esc_html__( 'Service Title Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service-box h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_service_title',
                'selector' => '{{WRAPPER}} .single-service-box h4',
            ]
        );


        $this->add_control(
            'service_short_color', [
                'label' => esc_html__( 'Service Short Text Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service-box p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_service_short_text',
                'selector' => '{{WRAPPER}} .single-service-box p',
            ]
        );

        $this->add_control(
            'service_read_btn_color', [
                'label' => esc_html__( 'Read Button Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service-box .read-more-link' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'box_bg_color', [
                'label' => esc_html__( 'Service Box BG Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service-box' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
        
    }

    protected function render() {

    $settings = $this->get_settings();
    $service_items = $settings['service_items'];
    ?>

    <div class="row text-center ps-xl-5 pe-xl-5">
    <?php
    if (!empty($service_items)) { $i = 0;
        foreach ($service_items as $item) { $i++; ?> 
        <div class="col-xl-3 col-md-6 col-12">
            <div class="single-service-box">
                <div class="icon">
                    <img src="<?php echo esc_url($item['service_icon']['url']); ?>" alt="it solution">
                </div>
                <?php if(!empty($item['service_title'])) : ?>
                <h4><a href="<?php echo esc_url($item['btn_link']['url']); ?> <?php modina_is_external($item['btn_link']); ?> <?php modina_is_nofollow($item['btn_link']); ?>"><?php echo esc_html($item['service_title']) ?></a></h4>
                <?php endif; ?>
                <?php if(!empty($item['service_info'])) : ?>
                <p><?php echo esc_html($item['service_info']) ?></p>
                <?php endif; ?>
                <a href="<?php echo esc_url($item['btn_link']['url']); ?>" class="read-more-link"><?php echo esc_html__('Read More', 'modina-core'); ?></a>
            </div>
        </div>
        <?php } 
    } ?>
    </div>

    <?php
    }
}