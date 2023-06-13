<section class="hero-wrapper hero-1 text-center text-md-start">
    <div class="hero-slider-active slider-<?php echo $dynamic_id; ?>">
        <?php if (!empty($hero_slides)) { $i = 0;
        foreach ($hero_slides as $item) { $i++; ?>
        <div class="single-slide">
            <div class="slide-bg bg-cover wow zoomIn" style="background-image: url('<?php echo esc_url($item['hero_image']['url']); ?>');"></div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-xxl-8 col-lg-9 col-sm-10">
                        <div class="hero-contents pe-lg-3 text-white">
                            <h6 class="animated" data-animation-in="fadeInDown"><?php echo htmlspecialchars_decode(esc_html($item['hero_subtitle'])); ?></h6>
                            <h1 class="fs-lg animated" data-animation-in="fadeInRight" data-delay-in="0.3"><?php echo htmlspecialchars_decode(esc_html($item['hero_heading'])); ?></h1>
                            <p class="pe-lg-5 mb-4 animated" data-animation-in="fadeInRight" data-delay-in="0.6"><?php echo htmlspecialchars_decode(esc_html($item['hero_text_content'])); ?></p>

                            <?php if( !empty( $item['btn_link1']['url'] && $item['button_text1'] ) ) : ?>
                            <a href="<?php echo esc_url($item['btn_link1']['url']); ?>" <?php modina_is_external($item['btn_link1']); ?> <?php modina_is_nofollow($item['btn_link1']); ?> data-animation-in="fadeInRight" data-delay-in="0.9" class="theme-btn me-sm-4 mt-4 animated"><?php echo esc_html( $item['button_text1'] ); ?></a>
                            <?php endif; ?>

                            <?php if( !empty( $item['btn_link2']['url'] &&  $item['button_text2'] ) ) : ?>
                            <a href="<?php echo esc_url($item['btn_link2']['url']); ?>" <?php modina_is_external($item['btn_link2']); ?> <?php modina_is_nofollow($item['btn_link2']); ?> data-animation-in="fadeInRight" data-delay-in="1" class="theme-btn no-fil me-sm-4 mt-4 animated"><?php echo esc_html( $item['button_text2'] ); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }
    } ?>
    </div>
    
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 44" width="44px" height="44px" id="circle" fill="none" stroke="currentColor">
            <circle r="20" cy="22" cx="22" id="quantechcircle" />
        </symbol>
    </svg>
</section>
