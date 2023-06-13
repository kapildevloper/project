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
        <div class="single-blog-item">
            <div class="post-featured-thumb bg-cover" style="background-image: url('<?php echo esc_url($featured_img_url); ?>')">
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
                <h3><a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_title() ); ?></a></h3>
                <p><?php echo wp_trim_words(get_the_content(), $settings['content_length'], '') ?></p>

                <div class="post-meta d-flex align-items-center">
                    <div class="post-date">
                        <i class="fal fa-calendar-alt"></i><?php the_time(get_option('date_format')); ?>
                    </div>
                    <div class="post-author">
                        <i class="fal fa-user-alt"></i> <?php echo esc_html__( 'by', 'modina-core' ); ?> <?php the_author_link(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
</div>