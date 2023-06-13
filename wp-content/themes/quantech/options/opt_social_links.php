<?php
Redux::setSection('quantech_opt', array(
    'title'     => esc_html__('Social Links', 'quantech'),
    'id'        => 'opt_social_links',
    'icon'      => 'dashicons dashicons-share',
    'fields'    => array(
        array(
            'id'    => 'facebook',
            'type'  => 'text',
            'title' => esc_html__('Facebook', 'quantech'),
            'default'	 => '#'
        ),
        array(
            'id'    => 'twitter',
            'type'  => 'text',
            'title' => esc_html__('Twitter', 'quantech'),
            'default'	  => '#'
        ),
        array(
            'id'    => 'skype',
            'type'  => 'text',
            'title' => esc_html__('Skype', 'quantech'),
            'default'	  => '#'
        ),
        array(
            'id'    => 'linkedin',
            'type'  => 'text',
            'title' => esc_html__('LinkedIn', 'quantech'),
            'default'	  => '#'
        ),
        array(
            'id'    => 'dribbble',
            'type'  => 'text',
            'title' => esc_html__('Dribbble', 'quantech'),
        ),
        array(
            'id'    => 'youtube',
            'type'  => 'text',
            'title' => esc_html__('Youtube', 'quantech'),
            'default' => '#'
        ),
        array(
            'id'    => 'instagram',
            'type'  => 'text',
            'title' => esc_html__('Instagram', 'quantech'),
        ),
    ),
));