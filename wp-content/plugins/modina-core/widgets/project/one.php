<div class="project-showcase-carousel-active text-white id-<?php echo $dynamic_id; ?>">
    <?php
        global $post;
        $args = array(
            'post_type'             => 'project',
            'post_status'           => 'publish',
            'order'                 => !empty($settings['post_order']) ? $settings['post_order'] : 'DESC',
            'ignore_sticky_posts'   => 1,
            'posts_per_page'        => !empty($settings['post_limit']) ? $settings['post_limit'] : 8,
        );
        $the_query = new \WP_Query($args);
        while ($the_query->have_posts()) : $the_query->the_post();

        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
    ?>
        <div class="single-project-card bg-cover" style="background-image: url('<?php echo esc_url($featured_img_url); ?>')">
            <a href="<?php the_permalink(); ?>" class="plus-link"><i class="fal fa-plus"></i></a>
            <div class="content">
                <h3><?php echo esc_html( get_the_title() ); ?></h3>
                <?php 
                    $categories = get_the_terms( get_the_ID() , 'project_cat' );
                    if ( ! empty( $categories ) ) {
                        echo '<p>' . esc_html( $categories[0]->name ) . '</p>';
                    }
                ?>
            </div>
        </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
</div>

<script>
    (function ( $ ) {
        "use strict";
        $(document).ready( function() {
            $('.project-showcase-carousel-active.id-<?php echo $dynamic_id; ?>').slick({
                autoplay: <?php echo $autoplay; ?>,
                infinite: <?php echo $infinite; ?>,
                speed: <?php echo $autoplaytimeout; ?>,
                slidesToShow: <?php echo $slidestoshow; ?>,
                slidesToScroll: <?php echo $slidestoscroll; ?>,
                arrows: true,
                speed: 800,
                prevArrow: $('.project-carousel-nav-prev'),
                nextArrow: $('.project-carousel-nav-next'),
                responsive: [
                    {
                      breakpoint: 1600,
                      settings: {
                        slidesToShow: 3
                      }
                    },
                    {
                      breakpoint: 1191,
                      settings: {
                        slidesToShow: 2
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
                      breakpoint: 480,
                      settings: {
                        slidesToShow: 1
                      }
                    }
                ],
            });
        });
    }( jQuery ));
</script>