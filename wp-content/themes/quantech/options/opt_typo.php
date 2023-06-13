<?php

Redux::setSection( 'quantech_opt', array(
    'title'            => esc_html__( 'Typography', 'quantech' ),
    'id'               => 'quantech_typo_opt',
    'icon'             => 'dashicons dashicons-editor-textcolor',
    'fields'           => array(
        array(
            'id'        => 'body_font',
            'type'      => 'typography',
            'google'      => true, 
            'title'     => esc_html__( 'Body Typography', 'quantech' ),
            'subtitle'  => esc_html__( 'These settings control the typography for the body text globally.', 'quantech' ),
        ),
    )
));


Redux::setSection( 'quantech_opt', array(
    'title'            => esc_html__( 'Headers Typography', 'quantech' ),
    'id'               => 'headers_font_opt',
    'icon'             => 'dashicons dashicons-editor-spellcheck',
    'subsection'       => true,
    'fields'           => array(

        array(
            'id'        => 'header_typo',
            'type'      => 'typography',
            'google'      => true, 
            'title'     => esc_html__( 'All Heading Typography', 'quantech' ),
            'subtitle'  => esc_html__( 'These settings control the typography for all Headers.', 'quantech' ),
        ),
    )
));