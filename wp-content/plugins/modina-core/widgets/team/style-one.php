<div class="row">
    <?php if (!empty($all_members)) {
    foreach ($all_members as $item) { ?> 
    <div class="col-md-6 col-xl-3">
        <div class="single-team-member text-white bg-cover <?php if( !empty( $item['member_active'] ) && $item['member_active'] == 'yes' ) : ?> active <?php endif; ?>" style="background-image: url('<?php echo esc_url($item['member_img']['url']); ?>')">
            <div class="member-info">
                <h4><?php echo esc_html($item['member_name']) ?></h4>
                <p><?php echo esc_html($item['member_post']) ?></p>
                <div class="social-link">
                    <?php if (!empty($item['fb_link'])) : ?>
                    <a href="<?php echo esc_url($item['fb_link']); ?>"><i class="fab fa-facebook-f"></i></a>
                    <?php endif; ?> 
                    <?php if (!empty($item['tw_link'])) : ?>
                    <a href="<?php echo esc_url($item['tw_link']); ?>"><i class="fab fa-twitter"></i></a>
                    <?php endif; ?> 
                    <?php if (!empty($item['insta_link'])) : ?>
                    <a href="<?php echo esc_url($item['insta_link']); ?>"><i class="fab fa-instagram"></i></a>
                    <?php endif; ?> 
                    <?php if (!empty($item['youtube_link'])) : ?>
                    <a href="<?php echo esc_url($item['youtube_link']); ?>"><i class="fab fa-youtube"></i></a>
                    <?php endif; ?> 
                    <?php if (!empty($item['linkedin_link'])) : ?>
                    <a href="<?php echo esc_url($item['linkedin_link']); ?>"><i class="fab fa-linkedin-in"></i></a>
                    <?php endif; ?> 
                    <?php if (!empty($item['skype_link'])) : ?>
                    <a href="<?php echo esc_url($item['skype_link']); ?>"><i class="fab fa-skype"></i></a>
                    <?php endif; ?>    
                    <?php if (!empty($item['whatsapp_link'])) : ?>
                    <a href="<?php echo esc_url($item['whatsapp_link']); ?>"><i class="fab fa-whatsapp"></i></a>
                    <?php endif; ?>    
                </div>
            </div>
        </div>
    </div>
    <?php } 
    } ?>
</div>