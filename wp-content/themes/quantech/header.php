<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package quantech  
 */
    $opt = get_option('quantech_opt');

    $is_preloader = isset($opt['is_preloader']) ? $opt['is_preloader'] : '';

    $header_style = isset( $opt['header_style'] ) ? $opt['header_style'] : '1';
    $top_header_opt = isset( $opt['top_header_opt'] ) ? $opt['top_header_opt'] : false;

    $is_menu_btn = !empty($opt['is_menu_btn']) ? $opt['is_menu_btn'] : '0';
    $menu_btn_title = !empty($opt['menu_btn_label']) ? $opt['menu_btn_label'] : 'Get A Quote';
    $menu_btn_url = !empty($opt['menu_btn_url']) ? $opt['menu_btn_url'] : '#';
    
    $phone_number = !empty($opt['phone_number']) ? $opt['phone_number'] : '';
    $email_address = !empty($opt['email_address']) ? $opt['email_address'] : '';
    $office_address = !empty($opt['office_address']) ? $opt['office_address'] : '';
    $office_hours = !empty($opt['office_hours']) ? $opt['office_hours'] : '';

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    } else {
        do_action( 'wp_body_open' );
    } 

    if ( !empty($is_preloader) && $is_preloader == '1' ) {
        if ( defined( 'ELEMENTOR_VERSION' ) ) {
            if ( \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
                echo '';
            } else {
                get_template_part( 'template-parts/header/preloader' );
            }
        }
        else {
            get_template_part( 'template-parts/header/preloader' );
        }
    }
    ?>

    <?php 
    
        $select_header_style = function_exists('get_field') ? get_field('select_header_style') : '';

        if(!empty($select_header_style) && $select_header_style != 'default') {
            $header_style = $select_header_style;
        } else {
            $header_style = !empty($opt['header_style']) ? $opt['header_style'] : '1';
        }
    ?>


    <?php if( class_exists('ReduxFrameworkPlugin') && $top_header_opt == true && $header_style == '1' ||  $header_style == '2') : ?>
    <div class="top-bar-wrapper d-none d-sm-block">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="top-left">
                <a href="tel:<?php echo esc_attr( $phone_number ); ?>"><i class="fal fa-phone-volume"></i><?php echo esc_html( $phone_number ); ?></a>
                <a href="mailto:<?php echo esc_attr( $email_address ); ?>"><i class="fal fa-envelope"></i><?php echo esc_html( $email_address ); ?></a>
                <a href="<?php echo esc_attr( $office_address ); ?>"><i class="fal fa-map-marker-alt"></i><?php echo esc_html( $office_address ); ?></a>
            </div>
            <div class="top-right d-none d-md-block">
                <div class="social-pages">
                    <?php quantech_social_links(); ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if( !empty ( $header_style ) && $header_style == '1' ) : ?>
    <header class="header-1">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-3 col-sm-5 col-md-4 col-6 pr-lg-5">
                    <div class="logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <?php quantech_logo(); ?>
                        </a>
                    </div>
                </div>
                <div class="col-lg-9 text-end p-lg-0 d-none d-lg-flex align-items-center <?php echo esc_attr(($is_menu_btn == '1') ? 'justify-content-between' : 'justify-content-end'); ?>">
                    <div class="menu-wrap">
                        <div class="main-menu">
                            <?php
                                if( has_nav_menu('main_menu') ) {
                                    wp_nav_menu( array (
                                        'menu' => 'main_menu',
                                        'theme_location'    => 'main_menu',
                                        'depth'             => 4,
                                        'container'         => 'ul',
                                        'walker'            => new Quantech_Nav_Walker(),
                                    ));
                                }
                            ?>
                        </div>
                    </div>
                    <?php if(!empty($menu_btn_title) & $is_menu_btn == '1') :  ?> 
                    <div class="header-right-element">
                        <a href="<?php echo esc_url($menu_btn_url); ?>" class="theme-btn">
                        <?php echo esc_html($menu_btn_title); ?>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="d-block d-lg-none col-sm-1 col-md-8 col-6">
                    <div class="mobile-nav-wrap">
                        <div id="hamburger"> <i class="fal fa-bars"></i> </div>
                        <!-- mobile menu - responsive menu  -->
                        <div class="mobile-nav">
                            <button type="button" class="close-nav"> <i class="fal fa-times-circle"></i> </button>
                            <nav class="sidebar-nav">
                                <?php
                                    wp_nav_menu( array (
                                        'theme_location'    => 'main_menu',
                                        'depth'             => 4,
                                        'container'         => 'ul',
                                        'menu_class'        => 'metismenu',
                                        'menu_id'           => 'mobile-menu',
                                        'walker'            => new Quantech_Nav_Walker(),
                                    ));
                                ?>
                            </nav>

                            <?php if( class_exists('ReduxFrameworkPlugin') && $top_header_opt == true ) : ?>
                            <div class="action-bar mt-5 text-white">
                                <?php if( !empty ( $office_address ) ) : ?>
                                <div class="single-info-element">
                                    <div class="icon">
                                        <i class="fal fa-map-marked-alt"></i>
                                    </div>
                                    <div class="text">
                                        <h5><?php echo esc_html__( 'visit our location:', 'quantech' ); ?></h5>
                                        <span><?php echo esc_html( $office_address ); ?></span>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if( !empty ( $office_hours ) ) : ?>
                                <div class="single-info-element">
                                    <div class="icon">
                                        <i class="fal fa-clock"></i>
                                    </div>
                                    <div class="text">
                                        <h5><?php echo esc_html__( 'Opening Hours:', 'quantech' ); ?></h5>
                                        <span><?php echo esc_html( $office_hours ); ?></span>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if( !empty ( $email_address ) ) : ?>
                                <div class="single-info-element">
                                    <div class="icon">
                                        <i class="fal fa-envelope"></i>
                                    </div>
                                    <div class="text">
                                        <h5><?php echo esc_html__( 'Send us mail', 'quantech' ); ?></h5>
                                        <span><?php echo esc_html( $email_address ); ?></span>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if( !empty ( $phone_number ) ) : ?>
                                <div class="call-us">
                                    <div class="icon text-white">
                                        <i class="fal fa-phone-volume"></i>
                                    </div>
                                    <div class="text">
                                        <h5><?php echo esc_html__( 'Phone Number', 'quantech' ); ?></h5>
                                        <span><?php echo esc_html( $phone_number ); ?></span>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if(!empty($menu_btn_title) & $is_menu_btn == '1') :  ?>
                                    <a href="<?php echo esc_url($menu_btn_url); ?>" class="theme-btn d-block text-center mt-4">
                                        <?php echo esc_html($menu_btn_title); ?>
                                    </a>
                                <?php endif; ?>

                                <div class="social-icons mt-4">
                                    <?php quantech_social_links(); ?>
                                </div>
                            </div>
                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="overlay"></div>
                </div>
            </div>
        </div>
    </header>
    <?php endif; ?>

    <?php if( class_exists('ReduxFrameworkPlugin') && !empty ( $header_style ) && $header_style == '2' ) : ?>
    <header class="header-1 transparent-menu">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-3 col-sm-5 col-md-4 col-6 pr-lg-5">
                    <div class="logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <?php quantech_logo(); ?>
                        </a>
                    </div>
                </div>
                <div class="col-lg-9 text-end p-lg-0 d-none d-lg-flex align-items-center <?php echo esc_attr(($is_menu_btn == '1') ? 'justify-content-between' : 'justify-content-end'); ?>">
                    <div class="menu-wrap">
                        <div class="main-menu">
                            <?php
                                if( has_nav_menu('main_menu') ) {
                                    wp_nav_menu( array (
                                        'menu' => 'main_menu',
                                        'theme_location'    => 'main_menu',
                                        'depth'             => 4,
                                        'container'         => 'ul',
                                        'walker'            => new Quantech_Nav_Walker(),
                                    ));
                                }
                            ?>
                        </div>
                    </div>
                    <?php if(!empty($menu_btn_title) & $is_menu_btn == '1') :  ?> 
                    <div class="header-right-element">
                        <a href="<?php echo esc_url($menu_btn_url); ?>" class="theme-btn">
                        <?php echo esc_html($menu_btn_title); ?>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="d-block d-lg-none col-sm-1 col-md-8 col-6">
                    <div class="mobile-nav-wrap">
                        <div id="hamburger"> <i class="fal fa-bars"></i> </div>
                        <!-- mobile menu - responsive menu  -->
                        <div class="mobile-nav">
                            <button type="button" class="close-nav"> <i class="fal fa-times-circle"></i> </button>
                            <nav class="sidebar-nav">
                                <?php
                                    wp_nav_menu( array (
                                        'theme_location'    => 'main_menu',
                                        'depth'             => 4,
                                        'container'         => 'ul',
                                        'menu_class'        => 'metismenu',
                                        'menu_id'           => 'mobile-menu',
                                        'walker'            => new Quantech_Nav_Walker(),
                                    ));
                                ?>
                            </nav>

                            <?php if( class_exists('ReduxFrameworkPlugin') && $top_header_opt == true ) : ?>
                            <div class="action-bar mt-5 text-white">
                                <?php if( !empty ( $office_address ) ) : ?>
                                <div class="single-info-element">
                                    <div class="icon">
                                        <i class="fal fa-map-marked-alt"></i>
                                    </div>
                                    <div class="text">
                                        <h5><?php echo esc_html__( 'visit our location:', 'quantech' ); ?></h5>
                                        <span><?php echo esc_html( $office_address ); ?></span>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if( !empty ( $office_hours ) ) : ?>
                                <div class="single-info-element">
                                    <div class="icon">
                                        <i class="fal fa-clock"></i>
                                    </div>
                                    <div class="text">
                                        <h5><?php echo esc_html__( 'Opening Hours:', 'quantech' ); ?></h5>
                                        <span><?php echo esc_html( $office_hours ); ?></span>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if( !empty ( $email_address ) ) : ?>
                                <div class="single-info-element">
                                    <div class="icon">
                                        <i class="fal fa-envelope"></i>
                                    </div>
                                    <div class="text">
                                        <h5><?php echo esc_html__( 'Send us mail', 'quantech' ); ?></h5>
                                        <span><?php echo esc_html( $email_address ); ?></span>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if( !empty ( $phone_number ) ) : ?>
                                <div class="call-us">
                                    <div class="icon text-white">
                                        <i class="fal fa-phone-volume"></i>
                                    </div>
                                    <div class="text">
                                        <h5><?php echo esc_html__( 'Phone Number', 'quantech' ); ?></h5>
                                        <span><?php echo esc_html( $phone_number ); ?></span>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if(!empty($menu_btn_title) & $is_menu_btn == '1') :  ?>
                                    <a href="<?php echo esc_url($menu_btn_url); ?>" class="theme-btn d-block text-center mt-4">
                                        <?php echo esc_html($menu_btn_title); ?>
                                    </a>
                                <?php endif; ?>

                                <div class="social-icons mt-4">
                                    <?php quantech_social_links(); ?>
                                </div>
                            </div>
                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="overlay"></div>
                </div>
            </div>
        </div>
    </header>
    <?php endif; ?>


    <?php if( class_exists('ReduxFrameworkPlugin') && !empty ( $header_style ) && $header_style == '3' ) : ?>
    <header class="header-3">
        <div class="top-bar-3 d-none d-sm-block">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <div class="top-left">
                    <a href="tel:<?php echo esc_attr( $phone_number ); ?>"><i class="fal fa-phone-volume"></i><?php echo esc_html( $phone_number ); ?></a>
                    <a href="mailto:<?php echo esc_attr( $email_address ); ?>"><i class="fal fa-envelope"></i><?php echo esc_html( $email_address ); ?></a>
                    <a href="<?php echo esc_attr( $office_address ); ?>"><i class="fal fa-map-marker-alt"></i><?php echo esc_html( $office_address ); ?></a>
                </div>
                <div class="top-right d-none d-md-block">
                    <div class="social-pages">
                        <?php quantech_social_links(); ?> 
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row align-items-center justify-content-between">
                 <div class="col-lg-2 col-sm-5 col-md-4 col-6 pr-lg-5">
                    <div class="logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <?php quantech_logo(); ?>
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 text-end p-lg-0 d-none d-lg-flex justify-content-between align-items-center">
                    <div class="menu-wrap">
                        <div class="main-menu">
                            <?php
                                if( has_nav_menu('main_menu') ) {
                                    wp_nav_menu( array (
                                        'menu' => 'main_menu',
                                        'theme_location'    => 'main_menu',
                                        'depth'             => 4,
                                        'container'         => 'ul',
                                        'walker'            => new Quantech_Nav_Walker(),
                                    ));
                                }
                            ?>
                        </div>
                    </div>
                    <?php if(!empty($menu_btn_title) & $is_menu_btn == '1') :  ?> 
                    <div class="header-right-element">
                        <a href="<?php echo esc_url($menu_btn_url); ?>" class="theme-btn">
                        <?php echo esc_html($menu_btn_title); ?>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="d-block d-lg-none col-sm-1 col-md-8 col-6">
                    <div class="mobile-nav-wrap">
                        <div id="hamburger"> <i class="fal fa-bars"></i> </div>
                        <!-- mobile menu - responsive menu  -->
                        <div class="mobile-nav">
                            <button type="button" class="close-nav"> <i class="fal fa-times-circle"></i> </button>
                            <nav class="sidebar-nav">
                                <?php
                                    wp_nav_menu( array (
                                        'theme_location'    => 'main_menu',
                                        'depth'             => 4,
                                        'container'         => 'ul',
                                        'menu_class'        => 'metismenu',
                                        'menu_id'           => 'mobile-menu',
                                        'walker'            => new Quantech_Nav_Walker(),
                                    ));
                                ?>
                            </nav>

                            <?php if( class_exists('ReduxFrameworkPlugin') && $top_header_opt == true ) : ?>
                            <div class="action-bar mt-5 text-white">
                                <?php if( !empty ( $office_address ) ) : ?>
                                <div class="single-info-element">
                                    <div class="icon">
                                        <i class="fal fa-map-marked-alt"></i>
                                    </div>
                                    <div class="text">
                                        <h5><?php echo esc_html__( 'visit our location:', 'quantech' ); ?></h5>
                                        <span><?php echo esc_html( $office_address ); ?></span>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if( !empty ( $office_hours ) ) : ?>
                                <div class="single-info-element">
                                    <div class="icon">
                                        <i class="fal fa-clock"></i>
                                    </div>
                                    <div class="text">
                                        <h5><?php echo esc_html__( 'Opening Hours:', 'quantech' ); ?></h5>
                                        <span><?php echo esc_html( $office_hours ); ?></span>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if( !empty ( $email_address ) ) : ?>
                                <div class="single-info-element">
                                    <div class="icon">
                                        <i class="fal fa-envelope"></i>
                                    </div>
                                    <div class="text">
                                        <h5><?php echo esc_html__( 'Send us mail', 'quantech' ); ?></h5>
                                        <span><?php echo esc_html( $email_address ); ?></span>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if( !empty ( $phone_number ) ) : ?>
                                <div class="call-us">
                                    <div class="icon text-white">
                                        <i class="fal fa-phone-volume"></i>
                                    </div>
                                    <div class="text">
                                        <h5><?php echo esc_html__( 'Phone Number', 'quantech' ); ?></h5>
                                        <span><?php echo esc_html( $phone_number ); ?></span>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if(!empty($menu_btn_title) & $is_menu_btn == '1') :  ?>
                                    <a href="<?php echo esc_url($menu_btn_url); ?>" class="theme-btn d-block text-center mt-4">
                                        <?php echo esc_html($menu_btn_title); ?>
                                    </a>
                                <?php endif; ?>

                                <div class="social-icons mt-4">
                                    <?php quantech_social_links(); ?>
                                </div>
                            </div>
                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="overlay"></div>
                </div>
            </div>
        </div>
    </header>
    <?php endif; ?>


    <?php
        $is_banner = '1';

        if ( is_page_template('elementor_canvas')) {
            $is_banner = '';
        }

        if ( is_home() ) {
            $is_banner = '1';
        }

        if ( is_page() ) {
            $is_banner = function_exists('get_field') ? get_field('is_banner') : '1';
            $is_banner = isset($is_banner) ? $is_banner : '1';
        }

        if( $is_banner == '1' ) {
            get_template_part('template-parts/header/banner');
        }
    ?>