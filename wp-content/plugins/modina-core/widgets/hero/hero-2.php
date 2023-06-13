<section class="hero-wrapper hero-2 text-center">
    <div class="hero-slider-active slider-<?php echo $dynamic_id; ?>">
    <?php if (!empty($hero_slides)) { $i = 0;
    foreach ($hero_slides as $item) { $i++; ?>
        <div class="single-slide">
            <div class="slide-bg bg-cover wow zoomIn" style="background-image: url('<?php echo esc_url($item['hero_image']['url']); ?>');"></div>
            <div class="layer1"></div>
            <div class="layer2"></div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-contents">
                            <h2 class="animated" data-animation-in="fadeInDown"><?php echo htmlspecialchars_decode( esc_html( $item['hero_subtitle'] ) ); ?></h6>
                            <h1 class="fs-lg animated" data-animation-in="fadeInRight" data-delay-in="0.3"><?php echo htmlspecialchars_decode(esc_html($item['hero_heading'])); ?></h1>
                            <p class="pe-lg-5 mb-4 animated" data-animation-in="fadeInRight" data-delay-in="0.6"><?php echo htmlspecialchars_decode(esc_html($item['hero_text_content'])); ?></p>
                            
                            <?php if( !empty( $item['btn_link1']['url'] && $item['button_text1'] ) ) : ?>
                            <a href="<?php echo esc_url($item['btn_link1']['url']); ?>" <?php modina_is_external($item['btn_link1']); ?> <?php modina_is_nofollow($item['btn_link1']); ?> class="theme-btn me-sm-4 mt-4 animated" data-animation-in="fadeInRight" data-delay-in="0.9"><?php echo esc_html( $item['button_text1'] ); ?></a>
                            <?php endif; ?>

                            <?php if( !empty( $item['btn_link2']['url'] &&  $item['button_text2'] ) ) : ?>
                            <div class="video-play-btn mt-4 mt-md-0 animated d-inline-block" data-animation-in="fadeInRight" data-delay-in="1" >
                                <a href="<?php echo esc_url($item['btn_link2']['url']); ?>" class="popup-video play-video"><i class="fas fa-play"></i></a> <span class="play-text"><?php echo esc_html( $item['button_text2'] ); ?></span>                    
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }
        } ?>
    </div>
</section>