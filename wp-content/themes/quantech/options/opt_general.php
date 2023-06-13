<?php
Redux::setSection('quantech_opt', array(
    'title'            => esc_html__( 'Preloader Settings', 'quantech' ),
    'id'               => 'preloader_opt',
    'icon'             => 'dashicons dashicons-sos',
    'fields'           => array(

        array(
            'id'      => 'is_preloader',
            'type'    => 'switch',
            'title'   => esc_html__( 'Pre-loader', 'quantech' ),
            'on'      => esc_html__('Enable', 'quantech'),
            'off'     => esc_html__('Disable', 'quantech'),
            'default'   => '0',
        ),

        array(
            'title'     => esc_html__('Pre-Loader Title Text', 'quantech'),
            'desc'  => esc_html__('change preloader title with your own.', 'quantech'),
            'id'        => 'preloader_title',
            'type'      => 'text',
            'default'  => get_bloginfo('name'),
            'required' => array('is_preloader', '=', '1'),
        ),

        array(
            'required' => array('is_preloader', '=', '1'),
            'id'       => 'loading_text',
            'type'     => 'text',
            'title'    => esc_html__( 'Loading Text', 'quantech' ),
            'default'  => esc_html__('Loading', 'quantech'),
        ),

        array(
            'title'     => esc_html__('Preloader Title Color', 'quantech'),
            'subtitle'  => esc_html__( 'Choice solid color for preloader title (Big Heading) color.', 'quantech' ),
            'id'        => 'preloader_title_color',
            'type'      => 'color',
            'output'      => array(
                'color' => '.preloader .animation-preloader .txt-loading .letters-loading, .preloader .animation-preloader .txt-loading .letters-loading::before',
            ),
            'required' => array('is_preloader', '=', '1'),
        ),

        array(
            'title'     => esc_html__('Preloader Loading Text Color', 'quantech'),
            'subtitle'  => esc_html__( 'Choice color for preloader loading text (p) color.', 'quantech' ),
            'id'        => 'preloader_text_color',
            'type'      => 'color',
            'output'      => array(
                'color' => '.preloader .animation-preloader p',
            ),
            'required' => array('is_preloader', '=', '1'),
        ),

        array(
            'title'     => esc_html__('Preloader Spinner (moving) Color', 'quantech'),
            'subtitle'  => esc_html__( 'Choice your solid color for border top Spinner (moving) color.', 'quantech' ),
            'id'        => 'preloader_spinner_color',
            'type'      => 'color',
            'output'      => array(
                'border-top-color' => '.preloader .animation-preloader .spinner',
            ),
            'required' => array('is_preloader', '=', '1'),
        ),

        array(
            'required' => array('is_preloader', '=', '1'),
            'title'     => esc_html__('Preloader Background', 'quantech'),
            'id'        => 'preloader_bg',
            'type'      => 'background',
        ),

    )
));