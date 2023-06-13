<?php

// Footer settings
Redux::setSection('quantech_opt', array(
	'title'     => esc_html__('Footer', 'quantech'),
	'id'        => 'quantech_footer',
	'icon'      => 'dashicons dashicons-table-row-before',
));


// ScrollUp settings
Redux::setSection('quantech_opt', array(
	'title'     => esc_html__('Scroll Up', 'quantech'),
	'id'        => 'quantech_scrollup',
	'icon'      => 'el el-arrow-up',
	'subsection'=> true,
	'fields'    => array(   

        array(
            'title'     => esc_html__('Scroll Up Icon Color', 'quantech'),
            'id'        => 'scroll_icon_color',
            'type'      => 'color',
            'output'    => '.scroll-up',
        ),

        array(
            'title'     => esc_html__('Scroll Up Background Color', 'quantech'),
            'id'        => 'scroll_bg_color',
            'type'      => 'color',
        ),
        
        array(
            'title'     => esc_html__('Scroll Up Hover Icon Color', 'quantech'),
            'id'        => 'scroll_hover_icon_color',
            'type'      => 'color',
            'output'    => '.scroll-up:hover',
        ),

        array(
            'title'     => esc_html__('Scroll Up Hover Background Color', 'quantech'),
            'id'        => 'scroll_hover_bg_color',
            'type'      => 'color',
        ),

	)
));

// Footer settings
Redux::setSection('quantech_opt', array(
	'title'     => esc_html__('Footer Top Settings', 'quantech'),
	'id'        => 'quantech_footer_widgets_opt',
	'icon'      => 'dashicons dashicons-editor-kitchensink',
	'subsection'=> true,
	'fields'    => array(

        array(
            'title'     => esc_html__( 'Footer Column', 'quantech' ),
            'id'        => 'footer_column',
            'type'      => 'select',
            'default'   => '3',
            'options'   => array(
                '6' => esc_html__( 'Two Column', 'quantech' ),
                '4' => esc_html__( 'Three Column', 'quantech' ),
                '3' => esc_html__( 'Four Column', 'quantech' ),
            )
        ),

        array(
            'id'     => 'divider_three',
            'type'   => 'divide',
        ),

        array(
            'title'     => esc_html__('Widget Title Color', 'quantech'),
            'id'        => 'widget_title_color',
            'type'      => 'color',
        ),

        array(
            'title'     => esc_html__('Footer Text Color', 'quantech'),
            'id'        => 'footer_text_color',
            'type'      => 'color',
            'output'    => 'footer .single-footer-wid ul li a, .widget .textwidget p, footer span, footer p',
        ),

        array(
            'id'     => 'divider_six',
            'type'   => 'divide',
        ),

        array(
            'title'     => esc_html__('Footer Background Color', 'quantech'),
            'id'        => 'footer_bg_color',
            'type'      => 'color',
        ),
        
        array(
            'title'    => esc_html__('Footer Background Image', 'quantech'),
            'id'       => 'footer_bg_img',
            'type'     => 'media',
            'compiler' => true,
        ),

	)
));

// Footer settings
Redux::setSection('quantech_opt', array(
	'title'     => esc_html__('Footer Bottom', 'quantech'),
	'id'        => 'quantech_footer_style_opt',
	'icon'      => 'dashicons dashicons-editor-kitchensink',
	'subsection'=> true,
	'fields'    => array(

        array(
			'title'     => esc_html__('Footer Copyright', 'quantech'),
			'desc'      => esc_html__('write down your own copyright info.', 'quantech'),
			'id'        => 'footer_copyright_content',
			'type'      => 'editor',
			'default'   => '<p>&copy; <b>Quantech</b> - 2023. All rights reserved.</p>'
		),

        array(
            'title'     => esc_html__('Footer Text Color', 'quantech'),
            'id'        => 'footer_text_color',
            'type'      => 'color',
            'output'    => 'footer .footer-bottom p',
        ),

        array(
            'title'     => esc_html__('Footer Link Color', 'quantech'),
            'id'        => 'footer_link_color',
            'type'      => 'color',
            'output'    => 'footer .footer-bottom a',
        ),

        array(
            'title'     => esc_html__('Footer Bottom Bar Background', 'quantech'),
            'id'        => 'footer_bottom_bg_color',
            'type'      => 'color',
        ),

	)
));
