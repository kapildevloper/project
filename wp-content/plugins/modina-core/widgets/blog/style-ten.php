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
        <div class="col-xl-4 col-md-6 col-12">
            <div class="latest-news-card">
                <div class="post-thumb bg-cover" style="background-image: url('<?php echo esc_url($featured_img_url); ?>')"></div>
                <div class="content">
                    <div class="post-cat">
                        <i class="fal fa-folder-open"></i> 
                        <?php 
                        $categories = get_the_category();
                        if ( ! empty( $categories ) ) {
                            echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                        }
                        ?>
                    </div>
                    <h3><a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_title() ); ?></a></h3>
                    <div class="post-meta d-flex mt-10 align-items-center">
                        <div class="post-date me-4">
                            <i class="fal fa-calendar-alt"></i> <?php the_time(get_option('date_format')); ?>
                        </div>
                        <div class="post-comment">
                            <i class="fal fa-comment-alt-dots"></i> <?php get_comments_number(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
</div>