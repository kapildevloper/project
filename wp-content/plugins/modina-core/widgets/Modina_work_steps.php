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


class Modina_work_steps extends Widget_Base
{

    public function get_name()
    {
        return 'modina_work_steps';
    }

    public function get_title()
    {
        return esc_html__('Work Steps', 'modina-core');
    }

    public function get_icon()
    {
        return 'eicon-check-circle';
    }

    public function get_keywords()
    {
        return ['work', 'steps', 'process', 'how', 'modina'];
    }

    public function get_categories() {
        return [ 'modina-elements' ];
    }

    protected function register_controls() {


         // -------------------  Title Section  -----------------------//
        $this->start_controls_section(
            'section_contents',
            [
                'label' => esc_html__( 'How We Work', 'modina-core' ),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'icon',
            [
                'label'      => __( 'Flaticon - Icon', 'modina-core' ),
                'type'       => Controls_Manager::ICON,
                'options'    => modina_flaticons(),
                'include'    => modina_include_flaticons(),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'icons_color', [
                'label' => esc_html__( 'Icon Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $repeater->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_icon_style',
                'selector' => '{{WRAPPER}} .icon',
            ]
        );

        $repeater->add_control(
            'step_title',
            [
                'label' => esc_html__( 'Steps Title', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'non polluting',
            ]
        );

        $repeater->add_control(
            'text',
            [
                'label' => esc_html__( 'Text', 'modina-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'We serve non polluting energy for our better future for future generations.',
            ]
        );

        $this->add_control(
            'all_work_steps',
            [
                'label' => esc_html__( 'All Work Steps', 'modina-core' ),
                'type' =>Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'icon'   => 'flaticon-solar-panel-1',
                        'step_title'   => 'non polluting',
                    ],
                ],
                'title_field' => '{{{step_title}}}'
            ]
        );

        $this->end_controls_section(); 

    }

    protected function render() {

    $settings = $this->get_settings();
    $all_work_steps = $settings['all_work_steps'];
    ?>
    
    <?php if (!empty($all_work_steps)) : ?>
    <div class="work-steps-list">
        <div class="row">
        <?php if (!empty($all_work_steps)) { $i = 0;
            foreach ($all_work_steps as $item) { $i++; ?>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="single-work-steps">
                    <?php if( !empty($item['icon']) ) : ?>
                    <div class="icon">
                        <i class="<?php echo esc_attr( $item['icon'] ); ?>"></i>
                    </div>
                    <?php endif; ?>
                    <div class="content text-center">
                        <h4><?php echo htmlspecialchars_decode(esc_html($item['step_title'])); ?></h4>
                        <p><?php echo htmlspecialchars_decode(esc_html($item['text'])); ?></p>
                    </div>
                </div>
            </div>
            <?php }
        } ?>
        </div>
    </div>
    <?php endif; ?>
<?php
    }
}
