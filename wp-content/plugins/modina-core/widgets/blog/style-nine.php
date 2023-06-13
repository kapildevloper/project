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
    ?>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="single-blog-nine">
                <?php if ( has_post_thumbnail() ) : ?>
                <div class="featured-img bg-cover" style="background-image: url('<?php echo esc_url($featured_img_url); ?>')"></div>
                <?php endif; ?>
                <div class="blog-details">
                    <div class="post-date-card text-white">
                        <div class="post-day">
                            <p><?php the_time( 'd' ); ?></p>
                            <span><?php the_time( 'M' ); ?></span>
                        </div>
                    </div>
                    <div class="post-meta d-flex">
                        <div class="post-cat-name">
                            <span><i class="fal fa-user-alt"></i> <?php the_author_link(); ?></span>
                        </div>
                        |
                        <div class="post-comment">
                            <span><i class="fal fa-comments"></i><?php comments_number( '0 comments', '1 Comment', '% Comments' ); ?></span>
                        </div>
                    </div>
                    <h3><a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_title() ); ?></a></h3>
                    <p><?php echo wp_trim_words(get_the_content(), $settings['content_length'], '') ?></p>
                    <?php if( 'yes' == $settings['show_read_more_btn']) : ?>
                    <a href="<?php the_permalink(); ?>" class="read-more-btn"><?php echo esc_html( $settings['read_more_txt'] ); ?></a>
                    <?php endif; ?>
                </div>                        
            </div>                    
        </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
</div>