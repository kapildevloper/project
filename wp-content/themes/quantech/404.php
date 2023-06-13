<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package quantech
 */

get_header();

$opt = get_option('quantech_opt');

$error_title = !empty($opt['error_title']) ? $opt['error_title'] : 'Page Not Found';

$error_subtitle = !empty($opt['error_subtitle']) ? $opt['error_subtitle'] : 'Sorry! The page you are looking doesn’t exist or broken. Go to Homepage from the below button';
$error_btn_label  =!empty($opt['error_btn_label']) ?  $opt['error_btn_label'] : 'Back To Home';

$error_img_banner = isset($opt['error_img_banner'] ['url']) ? $opt['error_img_banner'] ['url'] : QUANTECH_DIR_IMG.'/opt/404.png';

?>
    <section class="blog-wrapper section-padding ">
        <div class="container">
            <div class="content-not-found text-center">
                <img src="<?php echo esc_url($error_img_banner) ?>" alt="<?php echo esc_attr($error_title) ?>"/>
                <h2 class="mt-4 mb-2"><?php echo esc_html($error_title); ?></h2>
                <p><?php echo esc_html($error_subtitle); ?></p>
                <a class="theme-btn mt-4" href="<?php echo esc_url( home_url('/') ); ?>"><i class="fal fa-long-arrow-left me-1"></i> <?php echo esc_html($error_btn_label) ?></a>
            </div>   
        </div>
    </section>
<?php
get_footer();
