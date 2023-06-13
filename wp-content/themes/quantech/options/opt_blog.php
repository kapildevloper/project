<?php

Redux::setSection('quantech_opt', array(
	'title'     => esc_html__('Blog Settings', 'quantech'),
	'id'        => 'blog_page',
	'icon'      => 'dashicons dashicons-admin-post',
));


Redux::setSection('quantech_opt', array(
	'title'     => esc_html__('Title-Bar', 'quantech'),
	'id'        => 'blog_titlebar_settings',
	'icon'      => 'dashicons dashicons-admin-post',
    'subsection' => true,
	'fields'    => array(
		array(
			'title'     => esc_html__('Blog Page Title', 'quantech'),
			'subtitle'  => esc_html__('Give here the blog page title', 'quantech'),
			'desc'      => esc_html__('This text will be show on blog page banner', 'quantech'),
			'id'        => 'blog_title',
			'type'      => 'text',
			'default'   => 'News'
		),
	)
));


Redux::setSection('quantech_opt', array(
    'title'     => esc_html__('Layout Style', 'quantech'),
    'id'        => 'blog_layout_settings',
    'icon'      => 'dashicons dashicons-align-left',
    'subsection' => true,
    'fields'    => array(
        array(
            'title'     => esc_html__('Select Blog Layout Style', 'quantech'),
            'id'        => 'blog_layout_style',
            'type'      => 'image_select',
            'default'   => '1',
            'options'   => array(
                '1' => array(
                    'alt' => esc_html__('Right Sidebar - Default', 'quantech'),
                    'img' => esc_url(QUANTECH_DIR_IMG.'/opt/right-sidebar.png')
                ),
                '2' => array(
                    'alt' => esc_html__('Left Sidebar', 'quantech'),
                    'img' => esc_url(QUANTECH_DIR_IMG.'/opt/left-sidebar.png')
                ),
            )
        ),

    )
));


Redux::setSection('quantech_opt', array(
	'title'     => esc_html__('Blog Single', 'quantech'),
	'id'        => 'blog_single_opt',
	'icon'      => 'dashicons dashicons-media-document',
	'subsection' => true,
	'fields'    => array(
        array(
			'title'     => esc_html__( 'Post Meta', 'quantech' ),
			'subtitle'  => esc_html__( 'Show/hide post meta on blog archive page', 'quantech' ),
			'id'        => 'is_post_meta',
			'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'quantech' ),
            'off'       => esc_html__( 'Hide', 'quantech' ),
            'default'   => '1',
		),
	)
));

// blog Share Options
Redux::setSection('quantech_opt', array(
    'title'     => esc_html__('Blog Social Share', 'quantech'),
    'id'        => 'blog_share_opt',
    'subsection'=> true,
    'icon'      => 'dashicons dashicons-share',
    'fields'    => array(

        array(
            'title'     => esc_html__( 'Social Share', 'quantech' ),
            'id'        => 'is_social_share',
            'type'      => 'switch',
            'on'        => esc_html__( 'Enabled', 'quantech' ),
            'off'       => esc_html__( 'Disabled', 'quantech' ),
            'default'   => '0'
        ),

        array(
            'id' => 'blog_share_start',
            'type' => 'section',
            'title' => __('Share Options', 'quantech'),
            'subtitle' => __('Enable/Disable social media share options as you want.', 'quantech'),
            'required' => array('is_social_share','=','1'),
            'indent' => true,
        ),

        array(
            'title'    => esc_html__('Title', 'quantech'),
            'id'       => 'share_heading',
            'type'     => 'text',
            'compiler' => true,
            'default'  => esc_html__('Share on', 'quantech'),
        ),

        array(
            'id'       => 'is_post_fb',
            'type'     => 'switch',
            'title'    => esc_html__('Facebook', 'quantech'),
            'default'  => true,
            'on'       => esc_html__('Show', 'quantech'),
            'off'      => esc_html__('Hide', 'quantech'),
        ),

        array(
            'id'       => 'is_post_twitter',
            'type'     => 'switch',
            'title'    => esc_html__('Twitter', 'quantech'),
            'default'  => true,
            'on'       => esc_html__('Show', 'quantech'),
            'off'      => esc_html__('Hide', 'quantech'),
        ),

        array(
            'id'       => 'is_post_linkedin',
            'type'     => 'switch',
            'title'    => esc_html__('Linkedin', 'quantech'),
            'on'       => esc_html__('Show', 'quantech'),
            'off'      => esc_html__('Hide', 'quantech'),
            'default'  => true,
        ),

        array(
            'id'       => 'is_post_pinterest',
            'type'     => 'switch',
            'title'    => esc_html__('Pinterest', 'quantech'),
            'default'  => true,
            'on'       => esc_html__('Show', 'quantech'),
            'off'      => esc_html__('Hide', 'quantech'),
        ),

        array(
            'id'     => 'post_share_end',
            'type'   => 'section',
            'indent' => false,
        ),
    )
));


