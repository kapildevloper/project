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
    <div class="col-lg-4 col-md-6 col-12">
        <div class="single-news-card">
            <div class="thumb bg-cover" style="background-image: url('<?php echo esc_url($featured_img_url); ?>')"></div>
            <div class="contents">
                <div class="post-cat">
                    <?php 
                        $categories = get_the_category();
                        if ( ! empty( $categories ) ) {
                            echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                        }
                    ?>
                </div>

                <h3><a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_title() ); ?></a></h3>
                <p><?php echo wp_trim_words(get_the_content(), $settings['content_length'], '') ?></p>
            </div>
            <div class="content-bottom">
                <div class="post-date-author row text-center">
                    <div class="post-date col-6">
                        <?php the_time(get_option('date_format')); ?>
                    </div>
                    <div class="post-author-name col-6">
                        <?php echo get_the_author_meta( 'display_name', $author_id ); ?>
                    </div>
                </div>
                <?php if( 'yes' == $settings['show_read_more_btn']) : ?>
                <div class="read-more-btn">
                    <a href="<?php the_permalink(); ?>"><?php echo esc_html( $settings['read_more_txt'] ); ?> <i class="fal fa-long-arrow-right"></i></a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
</div>