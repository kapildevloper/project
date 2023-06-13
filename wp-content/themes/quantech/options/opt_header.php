<?php
// Header Section
Redux::setSection('quantech_opt', array(
    'title'            => esc_html__( 'Header Settings', 'quantech' ),
    'id'               => 'header_sec',
    'customizer_width' => '400px',
    'icon'             => 'el el-home',
    'fields'           => array(

        array (
            'title'     => esc_html__( 'Header Style', 'quantech' ),
            'subtitle'  => esc_html__( 'Select your header style from this three design.', 'quantech' ),
            'id'        => 'header_style',
            'type'      => 'image_select',
            'default'   => '1',
            'options'   => array (
                '1' => array (
                    'alt' => esc_html__( 'Header One', 'quantech' ),
                    'img' => esc_url( QUANTECH_DIR_IMG.'/opt/header1.png' ),
                ),
                '2' => array (
                    'alt' => esc_html__( 'Header Two', 'quantech' ),
                    'img' => esc_url( QUANTECH_DIR_IMG.'/opt/header2.png' ),
                ),
                '3' => array (
                    'alt' => esc_html__( 'Header Three', 'quantech' ),
                    'img' => esc_url( QUANTECH_DIR_IMG.'/opt/header3.png' ),
                ),
            )
        ),

        array(
            'title'     => esc_html__('Top Header Bar', 'quantech'),
            'subtitle'  => esc_html__( 'are you want show top bar ?', 'quantech' ),
            'id'        => 'top_header_opt',
            'type'      => 'switch',
            'default'  => false,
            'on'       => esc_html__('Show', 'quantech'),
            'off'      => esc_html__('Hide', 'quantech'),
        ),
        array(
            'id'      => 'top_divider_1',
            'type'    => 'divide',
            'required'    => array('top_header_opt', '!=', 'false' ),
        ),

        array(
            'title'     => esc_html__('Phone Number', 'quantech'),
            'subtitle'  => esc_html__( 'Type phone number.', 'quantech' ),
            'id'        => 'phone_number',
            'type'      => 'text',
            'required'    => array('top_header_opt', '!=', 'false' ),
            'default'   => '987-0980-9809',
        ),

        array(
            'title'     => esc_html__('Email Address', 'quantech'),
            'subtitle'  => esc_html__( 'Type email address.', 'quantech' ),
            'id'        => 'email_address',
            'type'      => 'text',
            'required'    => array('top_header_opt', '!=', 'false' ),
            'default'   => 'info@example.com',
        ),

        array(
            'title'     => esc_html__('Office Address - Location', 'quantech'),
            'subtitle'  => esc_html__( 'Type phone number.', 'quantech' ),
            'id'        => 'office_address',
            'type'      => 'text',
            'required'    => array('top_header_opt', '!=', 'false' ),
            'default'   => 'Quantech IT Lab, LD 304, USA',
        ),

        array(
            'title'     => esc_html__('Office Time Hours', 'quantech'),
            'subtitle'  => esc_html__( 'Enter Days & Time.', 'quantech' ),
            'id'        => 'office_hours',
            'type'      => 'text',
            'required'    => array('top_header_opt', '!=', 'false' ),
            'default'   => 'Mon-Fri 8am-5pm',
        ),

        array(
            'title'     => esc_html__('Welcome Text', 'quantech'),
            'subtitle'  => esc_html__( 'Type your top bar welcome heading.', 'quantech' ),
            'id'        => 'welcome_text',
            'type'      => 'textarea',
            'required'    => array('top_header_opt', '!=', 'false' ),
            'default'   => 'Welcome to quantech IT Solutions & Technology Company',
            'args'   => array(
                'teeny'            => true,
                'textarea_rows'    => 10
            ),
        ),

        array(
            'id'      => 'top_divider_3',
            'type'    => 'divide',
        ),

    )
) );

// Logo
Redux::setSection('quantech_opt', array(
    'title'            => esc_html__( 'Logo', 'quantech' ),
    'id'               => 'logo_setting',
    'subsection'       => true,
    'icon'             => 'el el-upload',
    'fields'           => array(

        array(
            'title'     => esc_html__('Select Your Logo Type', 'quantech'),
            'subtitle'  => esc_html__( 'which type logo you want for your site ?', 'quantech' ),
            'id'        => 'logo_select',
            'type'      => 'select',
            'options'  => array(
                '1' => 'Text',
                '2' => 'Image',
            ),
            'default'  => '2',
        ),

        array(
            'title'     => esc_html__('Text Logo', 'quantech'),
            'subtitle'  => esc_html__( 'Type your logo text , it is a text logo.', 'quantech' ),
            'id'        => 'main_text_logo',
            'type'      => 'text',
            'default'   => 'quantech',
            'required'  => array( 
                array('logo_select','equals','1')
            ),
        ),

        array(
            'title'     => esc_html__('Logo Text Color', 'quantech'),
            'subtitle'  => esc_html__('Select Logo color', 'quantech'),
            'id'        => 'logo_text_color',
            'type'      => 'color',
            'required'  => array( 
                array('logo_select','equals','1')
            ),
        ),

        array(
            'title'     => esc_html__('Main Logo Upload', 'quantech'),
            'subtitle'  => esc_html__( 'Upload here a image file for your logo', 'quantech' ),
            'id'        => 'main_logo',
            'type'      => 'media',
            'compiler'  => true,
            'required'  => array( 
                array('logo_select','equals','2')
            ),
            'default'   => array(
                'url'   => QUANTECH_DIR_IMG.'/logo.svg'
            ),
        ),

        array(
            'title'     => esc_html__( 'Logo dimensions', 'quantech' ),
            'subtitle'  => esc_html__( 'Set a custom height width for your upload logo.', 'quantech' ),
            'id'        => 'logo_dimensions',
            'required'  => array( 
                array('logo_select','equals','2')
            ),            
            'type'      => 'dimensions',
            'units'     => array( 'em','px','%' ),
            'output'    => '.logo > img'
        ),

    )
) );

// banner Section
Redux::setSection('quantech_opt', array(
    'title'            => esc_html__( 'Banner', 'quantech' ),
    'id'               => 'banner_sec',
    'subsection'       => true,
    'icon'             => 'el el-picture',
    'fields'           => array(

        array(
            'id'      => 'is_breadcrumb',
            'type'    => 'switch',
            'title'   => esc_html__( 'Breadcrumb Option', 'quantech' ),
            'on'      => esc_html__('Show', 'quantech'),
            'off'     => esc_html__('Hide', 'quantech'),
            'default' => false,
        ),

        array(
            'title'     => esc_html__( 'Banner Image Type', 'quantech' ),
            'id'        => 'is_banner_img',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'quantech' ),
            'off'       => esc_html__( 'Hide', 'quantech' ),
            'default'   => '1'
        ),

        array(
            'id' => 'banner_opt_start',
            'type' => 'section',
            'title' => __('Banner Options', 'quantech'),
            'subtitle' => __('Enable/Disable Header Banner Options as you want.', 'quantech'),
            'required' => array('is_banner_img','=','1'),
            'indent' => true,
        ),

        array(
            'title'     => esc_html__('Header Banner Image Upload', 'quantech'),
            'subtitle'  => esc_html__( 'Upload here a jpg/png file for header background image.', 'quantech' ),
            'id'        => 'header_banner_img',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => array(
                'url'   => QUANTECH_DIR_IMG.'/page-banner.jpg'
            ),
        ),

        array(
            'title'     => esc_html__('Banner Overlay Color', 'quantech'),
            'id'        => 'banner_overlay_color',
            'type'      => 'color',
        ),

        array(
            'id' => 'banner_overlay_color_opacity',
            'type' => 'slider',
            'title' => esc_html__('Banner Overlay Color Opacity', 'quantech'),
            "min" => 0,
            "step" => .1,
            "max" => 1,
            'resolution' => 0.1,
            'display_value' => 'label'
        ),

        array(
            'id'     => 'banner_opt_end',
            'type'   => 'section',
            'indent' => false,
        ),

        array(
            'id' => 'banner_opt_color_start',
            'type' => 'section',
            'title' => __('Banner Color', 'quantech'),
            'required' => array('is_banner_img','=','0'),
            'indent' => true,
        ),

        array(
            'title'     => esc_html__('Banner Color', 'quantech'),
            'subtitle'  => esc_html__( 'Choice your solid banner color', 'quantech' ),
            'id'        => 'banner_color',
            'type'      => 'color'
        ),

        array(
            'id'     => 'banner_opt_color_end',
            'type'   => 'section',
            'indent' => false,
        ),

    )
) );

// Navbar styling
Redux::setSection('quantech_opt', array(
    'title'            => esc_html__( 'Navbar', 'quantech' ),
    'id'               => 'navbar_styling',
    'subsection'       => true,
    'icon'             => 'el el-lines',
    'fields'           => array(

        array(
            'title'     => esc_html__('Menu Item Color', 'quantech'),
            'subtitle'  => esc_html__('Menu item Text color', 'quantech'),
            'id'        => 'menu_text_color',
            'type'      => 'color',
        ),

        array(
            'title'     => esc_html__('Menu Item Hover Color', 'quantech'),
            'subtitle'  => esc_html__('Menu item Text color', 'quantech'),
            'id'        => 'menu_hover_text_color',
            'type'      => 'color',
        ),

        array(
            'title'     => esc_html__('Menu Active Color', 'quantech'),
            'subtitle'  => esc_html__('Menu item active and hover text color', 'quantech'),
            'id'        => 'menu_active_text_color',
            'type'      => 'color',
        ),

        array(
            'title'     => esc_html__('Sub Menu Background Color', 'quantech'),
            'id'        => 'sub_menu_bg_color',
            'type'      => 'color',
        ),

        array(
            'title'     => esc_html__('Menu Item Margin', 'quantech'),
            'subtitle'  => esc_html__('Margin around menu item (li).', 'quantech'),
            'id'        => 'menu_item_margin',
            'type'      => 'spacing',
            'mode'      => 'margin',
            'units'     => array( 'em', 'px' ),
        ),

    )
));

// Menu action button
Redux::setSection('quantech_opt', array(
    'title'            => esc_html__( 'Action Button', 'quantech' ),
    'id'               => 'cta_btn_opt',
    'subsection'       => true,
    'icon'             => 'el el-link',
    'fields'           => array(
        
        array(
            'title'     => esc_html__('Button Visibility', 'quantech'),
            'id'        => 'is_menu_btn',
            'type'      => 'switch',
            'on'        => esc_html__('Show', 'quantech'),
            'off'       => esc_html__('Hide', 'quantech'),
        ),

        array(
            'title'     => esc_html__('Button Label', 'quantech'),
            'subtitle'  => esc_html__('Leave the button label field empty to hide the button.', 'quantech'),
            'id'        => 'menu_btn_label',
            'type'      => 'text',
            'default'   => esc_html__('Get A Quote', 'quantech'),
            'required'  => array('is_menu_btn', '=', '1')
        ),

        array(
            'title'     => esc_html__('Button URL', 'quantech'),
            'id'        => 'menu_btn_url',
            'type'      => 'text',
            'default'   => '#',
            'required'  => array('is_menu_btn', '=', '1')
        ),

        array(
            'title'     => esc_html__('Button Colors', 'quantech'),
            'subtitle'  => esc_html__('Button style attributes on normal', 'quantech'),
            'id'        => 'button_colors',
            'type'      => 'section',
            'indent'    => true,
            'required'  => array('is_menu_btn', '=', '1')
        ),

        array(
            'title'     => esc_html__('Text color', 'quantech'),
            'id'        => 'menu_btn_font_color',
            'type'      => 'color',
            'output'    => array('header .header-promo-btn a, header.header-1 .top-bar .d-btn'),
            'required'  => array('is_menu_btn', '=', '1')
        ),
            
        array(
            'title'     => esc_html__('Background Color', 'quantech'),
            'id'        => 'menu_btn_bg_color',
            'type'      => 'color',
            'mode'      => 'background',
            'output'    => array('header .header-promo-btn a, header.header-1 .top-bar .d-btn'),
            'required'  => array('is_menu_btn', '=', '1')
        ),

        // Button color on hover stats
        array(
            'title'     => esc_html__('Hover Text Color', 'quantech'),
            'subtitle'  => esc_html__('Text color on hover stats.', 'quantech'),
            'id'        => 'menu_btn_hover_font_color',
            'type'      => 'color',
            'output'    => array('header .header-promo-btn a:hover, header.header-1 .top-bar .d-btn:hover'),
            'required'  => array('is_menu_btn', '=', '1')
        ),

        array(
            'title'     => esc_html__('Hover Background Color', 'quantech'),
            'subtitle'  => esc_html__('Background color on hover stats.', 'quantech'),
            'id'        => 'menu_btn_hover_bg_color',
            'type'      => 'color',
            'output'    => array(
                'background' => 'header.header-1 .top-bar .d-btn:hover, header .header-promo-btn a:hover',
            ),
            'required'  => array('is_menu_btn', '=', '1')
        ),

        array(
            'id'     => 'button_colors-end',
            'type'   => 'section',
            'indent' => false,
        ),

        array(
            'title'     => esc_html__('Button Padding', 'quantech'),
            'subtitle'  => esc_html__('Padding around the menu donate button.', 'quantech'),
            'id'        => 'menu_btn_padding',
            'type'      => 'spacing',
            'output'    => array( 'header .header-promo-btn a, header.header-1 .top-bar .d-btn' ),
            'mode'      => 'padding',
            'units'     => array( 'em', 'px', '%' ), 
            'units_extended' => 'true',
            'required'  => array('is_menu_btn', '=', '1')
        ),
    )
));