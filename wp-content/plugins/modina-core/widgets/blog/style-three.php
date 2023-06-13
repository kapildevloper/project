<div class="row">
    <?php
        global $post;
        $args = array(
            'post_type'             => 'post',
            'post_status'           => 'publish',
            'ignore_sticky_posts'   => 1,
            'posts_per_page'        => !empty($settings['post_limit']) ? $settings['post_limit'] : 3,
        );
        $the_query = new \WP_Query($args);
        while ($the_query->have_posts()) : $the_query->the_post();
        
        $featured_img_url = get_the_post_thumbnail_url($post->ID,'full');
        $author_id = get_the_author_meta( 'ID' ); 
    ?>
    <div class="col-xl-4 col-md-6">
        <div class="single-news-box">
            <div class="featured-thumb bg-cover" style="background-image: url('<?php echo esc_url($featured_img_url); ?>')">
                <div class="post-cat">
                    <?php 
                        $categories = get_the_category();
                        if ( ! empty( $categories ) ) {
                            echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                        }
                    ?>
                </div>
            </div>
            <div class="content">
                <div class="meta d-flex">
                    <div class="author me-2">
                        <i class="fal fa-user"></i><?php the_author_link(); ?>
                    </div>
                    |
                    <div class="date ms-2">
                        <i class="fal fa-calendar-alt"></i>
                        <span><?php the_time(get_option('date_format')); ?></span>
                    </div>
                </div>
                <h3><a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_title() ); ?></a></h3>
                <?php if( 'yes' == $settings['show_read_more_btn']) : ?>
                <a href="<?php the_permalink(); ?>" class="read-btn"><?php echo esc_html( $settings['read_more_txt'] ); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
</div>