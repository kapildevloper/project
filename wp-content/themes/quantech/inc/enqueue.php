<?php


/**
 * Enqueue scripts and styles.
 */ 
function quantech_scripts() {
    $opt = get_option('quantech_opt');
    global $post;

	$dynamic_css = '';

    wp_enqueue_style( 'quantech-google-fonts-montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,600&display=swap', false );

    wp_enqueue_style( 'quantech-google-fonts-poppins', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap', false );

    wp_enqueue_style( 'bootstrap',  QUANTECH_DIR_CSS.'/bootstrap.min.css' );

    wp_enqueue_style( 'animate',  QUANTECH_DIR_CSS.'/animate.css' );

    wp_enqueue_style( 'metismenu',  QUANTECH_DIR_CSS.'/metismenu.css' );

    wp_enqueue_style( 'magnific-popup',  QUANTECH_DIR_CSS.'/magnific-popup.css' );

    wp_enqueue_style( 'slick',  QUANTECH_DIR_CSS.'/slick.css' );

    wp_enqueue_style( 'font-awesome',  QUANTECH_DIR_CSS.'/font-awesome.css' );
    
    wp_enqueue_style( 'quantech-main-style',  QUANTECH_DIR_CSS . '/style.css', array(), filemtime( get_template_directory().'/assets/css/style.css' ) );

    $theme_version = wp_get_theme()->get( 'Version' );

    wp_enqueue_style( 'quantech-style', get_stylesheet_uri(), array(), filemtime( get_template_directory().'/style.css' ) );
	wp_style_add_data( 'quantech-style', 'rtl', 'replace' );
    
    if(function_exists('get_field')) {

        $banner_background_type = function_exists('get_field') ? get_field('banner_background_type') : '';

        $background_image = function_exists('get_field') ? get_field('banner_background_image') : '';

        $banner_overlay_color = function_exists('get_field') ? get_field('banner_overlay_color') : '';

        $background_color_left = function_exists('get_field') ? get_field('background_color_left') : '';

        $background_color_right = function_exists('get_field') ? get_field('background_color_right') : '';

        $banner_text_color = function_exists('get_field') ? get_field('banner_text_color') : '';


        if (!empty($background_color_right) && !empty($background_color_left) && $banner_background_type == 'color' ) {
            $dynamic_css .= "
            .page-banner-wrap {
                background-image: linear-gradient(-49deg, " . esc_attr(get_field('background_color_left')) . " 0%,  " . esc_attr(get_field('background_color_right')) . " 100%) !important;
            }
            ";
        }    

        if ( !empty( $background_image ) && !empty( $banner_overlay_color ) && $banner_background_type == 'image' ) {
            $dynamic_css .= "
            .page-banner-wrap {
                background-image: url(". esc_url($background_image) . ") !important;
            }
            .page-banner-wrap::before {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                content: '';
                background: ". esc_attr($banner_overlay_color) .";
                opacity: .7;
            }
            ";
        }

        if ( !empty($banner_text_color) ) {
            $dynamic_css .= "
           .page-banner-wrap h1 {
               color: ". esc_attr($banner_text_color) ." !important;
            }
            ";
        }

        $footer_custom_design_opt = function_exists( 'get_field'  ) ? get_field( 'footer_custom_design_opt'  ) : '';
        $footer_bottom_bar_background_color = function_exists( 'get_field'  ) ? get_field( 'footer_bottom_bar_background_color'  ) : '';
        $footer_bottom_bar_text_color = function_exists( 'get_field'  ) ? get_field( 'footer_bottom_bar_text_color'  ) : '';


        if ( !empty($footer_custom_design_opt) && $footer_custom_design_opt == '1' && !empty($footer_bottom_bar_text_color)  ) {
            $dynamic_css .= "
            .footer-wrap .footer-bottom p, .footer-wrap .footer-bottom a {
                color: {$footer_bottom_bar_text_color} !important;
            }
        ";
        }

        if ( !empty($footer_custom_design_opt) && $footer_custom_design_opt == '1' && !empty($footer_bottom_bar_background_color)  ) {
            $dynamic_css .= "
            .footer-wrap .footer-bottom {
                background-color: {$footer_bottom_bar_background_color} !important;
            }
        ";
        }

    }

    if ( class_exists('ReduxFrameworkPlugin') ) {

        $opt = get_option( 'quantech_opt' );

        $is_banner_img = isset( $opt['is_banner_img'] ) ? $opt['is_banner_img'] : '';        

        $header_banner_img = isset( $opt['header_banner_img'] ['url'] ) ? $opt['header_banner_img'] ['url'] : '';

        $banner_color = isset( $opt['banner_color'] ) ? $opt['banner_color']  : '';

        $banner_overlay_color = isset( $opt['banner_overlay_color'] ) ? $opt['banner_overlay_color']  : '';

        $banner_overlay_color_opacity = isset( $opt['banner_overlay_color_opacity'] ) ? $opt['banner_overlay_color_opacity']  : '';

        $scroll_bg_color = isset( $opt['scroll_bg_color'] ) ? $opt['scroll_bg_color'] : '';

        $logo_text_color = isset( $opt['logo_text_color'] ) ? $opt['logo_text_color'] : '';

        $menu_text_color = isset( $opt['menu_text_color'] ) ? $opt['menu_text_color'] : '';
        $menu_hover_text_color = isset( $opt['menu_hover_text_color'] ) ? $opt['menu_hover_text_color'] : '';
        $menu_active_text_color = isset( $opt['menu_active_text_color'] ) ? $opt['menu_active_text_color'] : '';
        $sub_menu_bg_color = isset( $opt['sub_menu_bg_color'] ) ? $opt['sub_menu_bg_color'] : '';
        $menu_item_margin_top = isset( $opt['menu_item_margin']['margin-top'] ) ? $opt['menu_item_margin']['margin-top'] : '';
        $menu_item_margin_left = isset( $opt['menu_item_margin']['margin-left'] ) ? $opt['menu_item_margin']['margin-left'] : '';
        $menu_item_margin_right = isset( $opt['menu_item_margin']['margin-right'] ) ? $opt['menu_item_margin']['margin-right'] : '';
        $menu_item_margin_bottom = isset( $opt['menu_item_margin']['margin-bottom'] ) ? $opt['menu_item_margin']['margin-bottom'] : '';

        $scroll_hover_bg_color = isset( $opt['scroll_hover_bg_color'] ) ? $opt['scroll_hover_bg_color'] : '';
        $preloader_bg = isset( $opt['preloader_bg']['background-color'] ) ? $opt['preloader_bg']['background-color'] : '';
        $menu_btn_size = isset( $opt['menu_btn_size'] ) ? $opt['menu_btn_size'] : '';
        
        $footer_bg_color = isset( $opt['footer_bg_color'] ) ? $opt['footer_bg_color'] : '';
        $widget_title_color = isset( $opt['widget_title_color'] ) ? $opt['widget_title_color'] : '';
        $footer_bg_img = isset( $opt['footer_bg_img']['url'] ) ? $opt['footer_bg_img']['url'] : '';
        $footer_bottom_bg_color = isset( $opt['footer_bottom_bg_color'] ) ? $opt['footer_bottom_bg_color'] : '';

        if ( !empty($preloader_bg ) ) {
            $dynamic_css .= "
            .preloader .loader .loader-section .bg {
                background-color: ". esc_attr($preloader_bg) .";
            }";
        }

        if ( !empty($footer_bg_color ) ) {
            $dynamic_css .= "
            footer .footer-widgets-wrapper {
                background-color: ". esc_attr($footer_bg_color) ." !important;
            }";
        } 

        if ( !empty( $footer_bg_img ) ) {
            $dynamic_css .= "
            footer .footer-widgets-wrapper {
                background-image: url(". esc_url($footer_bg_img) .");
            }";
        } 

        if ( !empty($widget_title_color ) ) {
            $dynamic_css .= "
            footer .single-footer-wid .wid-title h6 {
                color: ". esc_attr($widget_title_color) .";
            }";
        } 

        if ( !empty($menu_btn_size) ) {
            $dynamic_css .= "
            header a.theme-btn {
               font-size: ". esc_attr($menu_btn_size) ."px;
            }
            ";
        }

        if ( !empty($menu_text_color ) ) {
            $dynamic_css .= "
            header .main-menu ul li a {
                color: ". esc_attr($menu_text_color) ." !important;
            }";
        } 

        if ( !empty($menu_hover_text_color ) ) {
            $dynamic_css .= "
            header .main-menu ul li:hover a {
                color: ". esc_attr($menu_hover_text_color) ." !important;
            }";
        } 

        if ( !empty($menu_active_text_color ) ) {
            $dynamic_css .= "
            header .main-menu ul li.current-menu-item  a {
                color: ". esc_attr($menu_active_text_color) ." !important;
            }";
        } 

        if ( !empty($menu_item_margin_top ) || !empty($menu_item_margin_right ) ) {
            $dynamic_css .= "
            header .main-menu ul li {
                margin: ". esc_attr($menu_item_margin_top) ." ". esc_attr($menu_item_margin_right) ." ". esc_attr($menu_item_margin_bottom) ." ". esc_attr($menu_item_margin_left) ." !important;
            }";
        } 

        if ( !empty($sub_menu_bg_color ) ) {
            $dynamic_css .= "
            header .main-menu ul li ul {
                background: ". esc_attr($sub_menu_bg_color) ." !important;
            }";
        } 

        if ( !empty($footer_bottom_bg_color ) ) {
            $dynamic_css .= "
            footer .footer-bottom {
                background-color: ". esc_attr($footer_bottom_bg_color) ."  !important;
            }";
        } 

        if ( !empty($header_banner_img && $is_banner_img == '1' ) ) {
            $dynamic_css .= "
            .page-banner-wrap {
                background-image: url(". esc_url($header_banner_img) .");
            }";
        } 

        if ( !empty($banner_overlay_color) && $is_banner_img == '1' ) {
            $dynamic_css .= "
            .page-banner-wrap::before {
                background: ". esc_attr($banner_overlay_color) .";                
            }";
        } 

        if ( !empty($banner_overlay_color_opacity) && $is_banner_img == '1' ) {
            $dynamic_css .= "
            .page-banner-wrap::before {                
                opacity: ". esc_attr($banner_overlay_color_opacity) .";
            }";
        } 

        if ( !empty($banner_color && $is_banner_img == '0' ) ) {
            $dynamic_css .= "
            .page-banner-wrap {
                background: ". esc_attr($banner_color) ." !important;
            }";
        } 

        if ( !empty($logo_text_color ) ) {
            $dynamic_css .= "
            .logo h3 {
                color: ". esc_attr($logo_text_color) ." !important;
            }";
        } 

        if ( !empty($scroll_bg_color ) ) {
            $dynamic_css .= "
            .scroll-up {
                background-color: ". esc_attr($scroll_bg_color) .";
            }";
        } 

        if ( !empty($scroll_hover_bg_color ) ) {
            $dynamic_css .= "
            .scroll-up:hover {
                background-color: ". esc_attr($scroll_hover_bg_color) .";
            }";
        }
    }

    wp_add_inline_style( 'quantech-style', $dynamic_css );

    $dynamic_js = '';
    
    wp_enqueue_script( 'popper', QUANTECH_DIR_JS.'/popper.min.js', array('jquery'), '1.0', true );

    wp_enqueue_script( 'bootstrap-main', QUANTECH_DIR_JS.'/bootstrap.min.js', array('jquery'), '4.3.1', true );

    wp_enqueue_script( 'modernizr', QUANTECH_DIR_JS.'/modernizr.js', array('jquery'), '3.1', true );
    
    wp_enqueue_script('jquery-effects-core');

    wp_enqueue_script( 'easings', QUANTECH_DIR_JS.'/jquery.easing.js', array('jquery'), '1.3', true );

    wp_enqueue_script( 'imagesloaded' );

    wp_enqueue_script( 'isotope', QUANTECH_DIR_JS.'/isotope.pkgd.min.js', array('jquery'), '3.0.5', true );

    wp_enqueue_script( 'navigation', QUANTECH_DIR_JS.'/navigation.js', array('jquery'), '1.3', true );

    wp_enqueue_script( 'wow', QUANTECH_DIR_JS.'/wow.min.js', array('jquery'), '1.3', true );

    wp_enqueue_script( 'slick', QUANTECH_DIR_JS.'/slick.min.js', array('jquery'), '2.0', true );
    
    wp_enqueue_script( 'slick-animate', QUANTECH_DIR_JS.'/slick-animation.min.js', array('jquery'), '0.3', true );

    wp_enqueue_script( 'counterup', QUANTECH_DIR_JS.'/counterup.min.js', array('jquery'), '2.0', true );

    wp_enqueue_script( 'magnific-popup', QUANTECH_DIR_JS.'/magnific-popup.min.js', array('jquery'), '2.0', true );

    wp_enqueue_script( 'scrollup', QUANTECH_DIR_JS.'/scrollup.min.js', array('jquery'), '2.4', true );
    
    wp_enqueue_script( 'metismenu', QUANTECH_DIR_JS.'/metismenu.js', array('jquery'), '2.0', true );  

    wp_enqueue_script( 'quantech-active', QUANTECH_DIR_JS.'/active.js', array('jquery'), filemtime( get_template_directory().'/assets/js/active.js' ), true );


    if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
        $opt = get_option( 'quantech_opt' );
    }

    wp_localize_script( 'quantech-custom-wp', 'local_strings', array(
        'ajax_url' => admin_url( 'admin-ajax.php' )
    ));

    wp_add_inline_script('quantech-custom-wp', $dynamic_js);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}

add_action( 'wp_enqueue_scripts', 'quantech_scripts' );

add_action('admin_enqueue_scripts', function() {
    wp_enqueue_style('quantech-admin', QUANTECH_DIR_CSS.'/quantech-admin.css');
});

add_action('elementor/frontend/after_enqueue_styles', function() {
    wp_enqueue_style( 'font-awesome-admin',  QUANTECH_DIR_CSS.'/font-awesome.css' );
});

add_action('elementor/frontend/before_enqueue_styles', function() {
    wp_enqueue_style( 'font-awesome-elementor',  QUANTECH_DIR_CSS.'/font-awesome.css' );
});