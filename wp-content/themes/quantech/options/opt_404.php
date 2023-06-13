<?php

Redux::setSection('quantech_opt', array(
    'title'     => esc_html__('404 Page Settings', 'quantech'),
    'id'        => '404_0pt',
    'icon'      => 'dashicons dashicons-megaphone',
    'fields'    => array(

        array(
            'title'    => esc_html__('404 Banner Image', 'quantech'),
            'id'       => 'error_img_banner',
            'type'     => 'media',
            'compiler' => true,
            'default'  => array(
                'url'  => QUANTECH_DIR_IMG.'/opt/404.png'
            ),
        ),

        array(
            'title'     => esc_html__('Heading', 'quantech'),
            'id'        => 'error_title',
            'type'      => 'text',
            'default'   => esc_html__("Oops! this page is not found.", 'quantech'),
        ),

        array(
            'title'     => esc_html__('Sub Heading', 'quantech'),
            'id'        => 'error_subtitle',
            'type'      => 'textarea',
            'default'   => esc_html__('Sorry! The page you are looking doesn’t exist or broken. ', 'quantech'),
        ),

        array(
            'title'     => esc_html__('Button Text', 'quantech'),
            'id'        => 'error_btn_label',
            'type'      => 'text',
            'default'   => esc_html__('Back To Home', 'quantech'),
        ),

        array(
            'id'          => 'btn_font_color',
            'type'        => 'color',
            'title'       => esc_html__( 'Button Text Color', 'quantech' ),
            'output'      => array(
                'color' => '.content-not-found .theme-btn',
            ),
        ),

        array(
            'id'          => 'btn_bg_color',
            'type'        => 'color',
            'title'       => esc_html__( 'Button Background Color', 'quantech' ),
            'output'      => array(
                'background' => '.content-not-found .theme-btn',
            ),
        ),

        array(
            'id'          => 'btn_border_color',
            'type'        => 'color',
            'title'       => esc_html__( 'Button Border Color', 'quantech' ),
            'output'      => array(
                'border-color' => '.content-not-found .theme-btn',
            ),
        ),

        array(
            'id'          => 'btn_font_color_hover',
            'type'        => 'color',
            'title'       => esc_html__( 'Button Text Hover Color', 'quantech' ),
            'output'      => array(
                'color' => '.content-not-found .theme-btn:hover',
            ),
        ),

        array(
            'id'          => 'btn_bg_hover',
            'type'        => 'color',
            'title'       => esc_html__( 'Button Background Hover Color', 'quantech' ),
            'output'      => array(
                'background' => '.content-not-found .theme-btn:hover',
            ),
        ),

        array(
            'id'          => 'btn_border_hover',
            'type'        => 'color',
            'title'       => esc_html__( 'Button Border Hover Color', 'quantech' ),
            'output'      => array(
                'border-color' => '.content-not-found .theme-btn:hover',
            ),
        ),
    )
));
