<?php
namespace ModinaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use WP_Query;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Modina_portfolios extends Widget_Base {

    public function get_name() {
        return 'modina_portfolios';
    }

    public function get_title() {
        return esc_html__( 'Portfolio Isotope - Projects', 'modina-core' );
    }

    public function get_icon() {
        return 'eicon-posts-masonry';
    }

    public function get_keywords() {
        return [ 'it', 'project', 'case study', 'portfolio', 'masonry', 'filter', 'Isotope', 'modina'];
    }

    public function get_categories() {
        return [ 'modina-elements' ];
    }

    protected function register_controls() {

        // ---------------------------- Filtering ----------
        $this->start_controls_section(
            'portfolio_filter',
            [
                'label' => __('Portfolio Settings', 'modina-core'),
            ]
        );

        $this->add_control(
            'item_show',
            [
                'label' => esc_html__('How many item shows', 'modina-core'),
                'type' => Controls_Manager::NUMBER,
                'label_block' => true,
                'default' => '6'
            ]
        );

        $this->add_control(
            'item_order',
            [
                'label' => esc_html__('Select Your Order.', 'modina-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'ASC' => 'ASC',
                    'DESC' => 'DESC'
                ],
                'default' => 'ASC'
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'project_items_style', [
                'label' => esc_html__( 'Project / Case Study Style', 'modina-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'color_project_heading', [
                'label' => esc_html__( 'Project Title Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-project-card h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_project_heading',
                'selector' => '{{WRAPPER}} .single-project-card h3',
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

    $settings = $this->get_settings();

    $portfolios = new WP_Query(array(
        'post_type'     => 'project',
        'posts_per_page' => $settings['item_show'],
        'order'     => $settings['item_order']
    ));

    $project_cats = '';

    ?>
    
    <div class="row mb-20">
        <div class="col-12 col-lg-12 text-center">
            <div class="case-cat-filter">
                <button data-filter="*" class="active"><?php echo esc_html__('View All', 'modina-core'); ?></button>
                <?php
                $all_cats = get_terms('project_cat');
                if (!empty($all_cats) && !is_wp_error($all_cats)) {  $cats = $all_cats; }
                foreach ($cats as $cat) : ?>
                <button data-filter=".<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></button>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="row grid">
        <?php 
            while ($portfolios->have_posts()) : $portfolios->the_post();
            $project_cats = get_the_terms(get_the_ID(), 'project_cat');
            if ($project_cats && !is_wp_error($project_cats)) {
                $project_cat_list = array();
                foreach ($project_cats as $cat) {
                    $project_cat_list[] = $cat->slug;
                }
                $project_all_cats = join(" ", $project_cat_list);
            } else {
                $project_all_cats = '';
            }

            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
        ?>
        <div class="col-xl-4 col-md-6 grid-item <?php echo esc_attr( $project_all_cats ); ?>">
            <div class="single-project-card bg-cover" style="background-image: url('<?php echo esc_url($featured_img_url); ?>');">
                <a href="<?php the_permalink(); ?>" class="plus-link"><i class="fal fa-plus"></i></a>
                <div class="content">
                    <h3><a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_title() ); ?></a></h3>
                    <?php 
                        $categories = get_the_terms( get_the_ID() , 'project_cat' );
                        if ( ! empty( $categories ) ) {
                            echo '<p>' . esc_html( $categories[0]->name ) . '</p>';
                        }
                    ?>
                </div>
            </div>                  
        </div>
        <?php endwhile;
            wp_reset_postdata();
        ?>
    </div>

    <script>
        (function ( $ ) {
            "use strict";
            $(document).ready( function() {
               
                $('.container').imagesLoaded(function() {
                    $('.case-cat-filter').on('click', 'button', function() {
                        var filterValue = $(this).attr('data-filter');
                        $grid.isotope({ filter: filterValue });
                    });

                    var $grid = $('.grid').isotope({
                        itemSelector: '.grid-item',
                        percentPosition: true,
                    });
                });

                var catButton = '.case-cat-filter button';

                $(catButton).on('click', function(){
                    $(catButton).removeClass('active');
                    $(this).addClass('active');
                });
            });
        }( jQuery ));
    </script>
    <?php
    }
}