<?php
namespace ModinaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Modina_services extends Widget_Base {

    public function get_name() {
        return 'modina_services';
    }

    public function get_title() {
        return esc_html__( 'Our Services Grid', 'modina-core' );
    }

    public function get_icon() {
        return 'eicon-icon-box';
    }

    public function get_keywords() {
        return [ 'service', 'web', 'design', 'development', 'code', 'network', 'modina'];
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
            'service_bg',
            [
                'label' => esc_html__( 'Image', 'modina-core' ),
                'type' =>Controls_Manager::MEDIA,
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
                'default' => 'Web Development',
            ]
        );

        $repeater->add_control(
            'service_info',
            [
                'label' => esc_html__( 'Service Info', 'modina-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'We carry more than just good coding skills. Our experience makes us stand out from other web development.',
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

        $repeater->add_control(
            'box_style',
            [
                'label' => esc_html__('Want Box Style 2?', 'modina-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'label_block' => true,
                'default' => 'no',
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
                        'service_title'   => 'Web Development',
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
            'service_color_title', [
                'label' => esc_html__( 'Service Title Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service-top-icon h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_service_title',
                'selector' => '{{WRAPPER}} .single-service-top-icon h4',
            ]
        );

        $this->add_control(
            'service_color_text', [
                'label' => esc_html__( 'Service Text Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service-top-icon p' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_service_text',
                'selector' => '{{WRAPPER}} .single-service-top-icon p',
            ]
        );

        $this->add_control(
            'box_bg_color', [
                'label' => esc_html__( 'Service Box BG Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service-top-icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

    $settings = $this->get_settings();
    $service_items = $settings['service_items'];
    ?>
        <div class="row">
        <?php
            if (!empty($service_items)) { $i = 2;
            foreach ($service_items as $item) {
            $i++; ?> 
            <div class="col-xl-4 col-md-6 col-12">
                <div class="single-service-top-icon <?php if( !empty( $item['box_style'] ) && $item['box_style'] == 'yes' ) : ?> style-2 <?php endif; ?> wow fadeInUp" data-wow-delay=".<?php echo $i; ?>s">
                    <div class="icon">
                        <img src="<?php echo esc_url($item['service_bg']['url']); ?>" alt="">
                    </div>
                    <div class="content">
                        <h4><a href="<?php echo esc_url($item['btn_link']['url']); ?> <?php modina_is_external($item['btn_link']); ?> <?php modina_is_nofollow($item['btn_link']); ?>"><?php echo esc_html($item['service_title']); ?></a></h4>
                        <p><?php echo esc_html($item['service_info']); ?></p>
                    </div>
                </div>
            </div>
            <?php } 
        } ?>
        </div>
    <?php
    }
}