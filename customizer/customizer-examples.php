<?php
/**
 * Customizer Controls.
 *
 * @package WPshed Customizer Framework
 */

// User access level
$capability = 'edit_theme_options';

// Option type
$type = 'theme_mod'; // option / theme_mod

/* ---------------------------------------------------------------------------------------------------
    Panels
--------------------------------------------------------------------------------------------------- */

// Panel
$options[] = array( 'title'             => __( 'Theme Options', 'text-domain' ),
                    'description'       => '',
                    'id'                => 'slug_theme_options',
                    'priority'          => 10,
                    'theme_supports'    => '',
                    'type'              => 'panel' );

/* ---------------------------------------------------------------------------------------------------
    Sections
--------------------------------------------------------------------------------------------------- */

// Section
$options[] = array( 'title'             => __( 'Test Section', 'text-domain' ),
                    'description'       => __( 'Section description', 'text-domain' ),
                    'panel'             => 'slug_theme_options',
                    'id'                => 'slug_section_id',
                    'priority'          => 10,
                    'theme_supports'    => '',
                    'type'              => 'section' );

/* ---------------------------------------------------------------------------------------------------
    Controls
--------------------------------------------------------------------------------------------------- */

// Text
$options[] = array( 'title'             => __( 'Text Field', 'text-domain' ),
                    'description'       => '',
                    'section'           => 'slug_section_id',
                    'id'                => 'slug_text',
                    'default'           => 'Default value',
                    'option'            => 'text',
                    'sanitize_callback' => 'sanitize_text_field',
                    'type'              => 'control' );

// Textarea
$options[] = array( 'title'             => __( 'Textarea Field', 'text-domain' ),
                    'description'       => '',
                    'section'           => 'slug_section_id',
                    'id'                => 'slug_textarea',
                    'default'           => '',
                    'option'            => 'textarea',
                    'sanitize_callback' => 'esc_textarea',
                    'type'              => 'control' );

// Color
$options[] = array( 'title'             => __( 'Color Picker Field', 'text-domain' ),
                    'description'       => '',
                    'section'           => 'slug_section_id',
                    'id'                => 'slug_color',
                    'default'           => '#BADA55',
                    'option'            => 'color',
                    'sanitize_callback' => '',
                    'type'              => 'control' );

// Radio
$options[] = array( 'title'             => __( 'Radio Field', 'text-domain' ),
                    'description'       => '',
                    'section'           => 'slug_section_id',
                    'id'                => 'slug_radio',
                    'default'           => 'value2',
                    'option'            => 'radio',
                    'sanitize_callback' => '',
                    'choices'           => array(
                        'value1' => __( 'Choice 1', 'text-domain' ),
                        'value2' => __( 'Choice 2', 'text-domain' ),
                        'value3' => __( 'Choice 3', 'text-domain' ),
                    ),
                    'type'              => 'control' );

// Checkbox
$options[] = array( 'title'             => __( 'Checkbox Field', 'text-domain' ),
                    'description'       => '',
                    'section'           => 'slug_section_id',
                    'id'                => 'slug_checkbox',
                    'default'           => '', // 1 for checked
                    'option'            => 'checkbox',
                    'sanitize_callback' => '',
                    'type'              => 'control' );

// Select
$options[] = array( 'title'             => __( 'Select Field', 'text-domain' ),
                    'description'       => '',
                    'section'           => 'slug_section_id',
                    'id'                => 'slug_select',
                    'default'           => 'value2',
                    'option'            => 'select',
                    'sanitize_callback' => '',
                    'choices'           => array(
                        'value1' => __( 'Choice 1', 'text-domain' ),
                        'value2' => __( 'Choice 2', 'text-domain' ),
                        'value3' => __( 'Choice 3', 'text-domain' ),
                    ),
                    'type'              => 'control' );

// Image Upload
$options[] = array( 'title'             => __( 'Image Upload Field', 'text-domain' ),
                    'description'       => '',
                    'section'           => 'slug_section_id',
                    'id'                => 'slug_image',
                    'default'           => '',
                    'option'            => 'image',
                    'sanitize_callback' => 'esc_url',
                    'type'              => 'control' );

// File Upload
$options[] = array( 'title'             => __( 'File Upload Field', 'text-domain' ),
                    'description'       => '',
                    'section'           => 'slug_section_id',
                    'id'                => 'slug_file',
                    'default'           => '',
                    'option'            => 'file',
                    'sanitize_callback' => '',
                    'type'              => 'control' );

// URL
$options[] = array( 'title'             => __( 'URL Field', 'text-domain' ),
                    'description'       => '',
                    'section'           => 'slug_section_id',
                    'id'                => 'slug_url',
                    'default'           => '',
                    'option'            => 'url',
                    'sanitize_callback' => 'esc_url',
                    'type'              => 'control' );

// Email
$options[] = array( 'title'             => __( 'Email Field', 'text-domain' ),
                    'description'       => '',
                    'section'           => 'slug_section_id',
                    'id'                => 'slug_email',
                    'default'           => '',
                    'option'            => 'email',
                    'sanitize_callback' => 'sanitize_email',
                    'type'              => 'control' );

// Password
$options[] = array( 'title'             => __( 'Password Field', 'text-domain' ),
                    'description'       => '',
                    'section'           => 'slug_section_id',
                    'id'                => 'slug_password',
                    'default'           => '',
                    'option'            => 'password',
                    'sanitize_callback' => 'sanitize_text_field',
                    'type'              => 'control' );

// number
$options[] = array( 'title'             => __( 'number Field (px)', 'text-domain' ),
                    'description'       => '',
                    'section'           => 'slug_section_id',
                    'id'                => 'slug_number',
                    'default'           => 70,
                    'option'            => 'number',
                    'sanitize_callback' => '',
                    'input_attrs'       => array(
                        'min'   => 0,
                        'max'   => 100,
                        'step'  => 1,
                        'class' => 'example-class',
                    ),
                    'type'              => 'control' );

// Pages
$options[] = array( 'title'             => __( 'Pages Field', 'text-domain' ),
                    'description'       => '',
                    'section'           => 'slug_section_id',
                    'id'                => 'slug_pages',
                    'default'           => 0,
                    'option'            => 'pages',
                    'sanitize_callback' => '',
                    'type'              => 'control' );

// Categories
$options[] = array( 'title'             => __( 'Categories Field', 'text-domain' ),
                    'description'       => '',
                    'section'           => 'slug_section_id',
                    'id'                => 'slug_categories',
                    'default'           => 0,
                    'option'            => 'categories',
                    'sanitize_callback' => '',
                    'type'              => 'control' );

// Tags
$options[] = array( 'title'             => __( 'Tags Field', 'text-domain' ),
                    'description'       => '',
                    'section'           => 'slug_section_id',
                    'id'                => 'slug_tags',
                    'default'           => '',
                    'option'            => 'tags',
                    'sanitize_callback' => '',
                    'type'              => 'control' );

// Post Types
$options[] = array( 'title'             => __( 'Post Types Field', 'text-domain' ),
                    'description'       => '',
                    'section'           => 'slug_section_id',
                    'id'                => 'slug_post_types',
                    'default'           => '',
                    'option'            => 'post_types',
                    'sanitize_callback' => '',
                    'type'              => 'control' );

// Posts
$options[] = array( 'title'             => __( 'Posts Field', 'text-domain' ),
                    'description'       => '',
                    'section'           => 'slug_section_id',
                    'id'                => 'slug_posts',
                    'default'           => '',
                    'option'            => 'posts',
                    'sanitize_callback' => '',
                    'type'              => 'control' );

// Users
$options[] = array( 'title'             => __( 'Users Field', 'text-domain' ),
                    'description'       => '',
                    'section'           => 'slug_section_id',
                    'id'                => 'slug_users',
                    'default'           => '',
                    'option'            => 'users',
                    'sanitize_callback' => '',
                    'type'              => 'control' );

// Menus
$options[] = array( 'title'             => __( 'Menus Field', 'text-domain' ),
                    'description'       => '',
                    'section'           => 'slug_section_id',
                    'id'                => 'slug_menus',
                    'default'           => '',
                    'option'            => 'menus',
                    'sanitize_callback' => '',
                    'type'              => 'control' );



/* ---------------------------------------------------------------------------------------------------
    Panels
--------------------------------------------------------------------------------------------------- */

// Panel
$options[] = array( 'title'             => __( 'Front Page Options', 'text-domain' ),
                    'description'       => '',
                    'id'                => 'slug_front_page_options',
                    'priority'          => 10,
                    'theme_supports'    => '',
                    'type'              => 'panel' );

/* ---------------------------------------------------------------------------------------------------
    Sections
--------------------------------------------------------------------------------------------------- */

$options[] = array( 'title'             => __( 'Front Page Sortable', 'text-domain' ),
                    'description'       => '',
                    'panel'             => 'slug_front_page_options',
                    'id'                => 'slug_section_front_page_sortable',
                    'priority'          => 10,
                    'theme_supports'    => '',
                    'type'              => 'section' );

// Front Page Sections
for ( $i = 1; $i < 4; $i++ ) { 
     $options[] = array( 'title'             => __( 'Front Page Section', 'text-domain' ) . ' ' . $i,
                         'description'       => __( 'Section description', 'text-domain' ),
                         'panel'             => 'slug_front_page_options',
                         'id'                => 'slug_section_front_page_' . $i,
                         'priority'          => 10,
                         'theme_supports'    => '',
                         'type'              => 'section' );
}

/* ---------------------------------------------------------------------------------------------------
    Controls
--------------------------------------------------------------------------------------------------- */

// Front Page Elements
$options[] = array( 'title'             => __( 'Front Page Elements', 'text-domain' ),
                    'description'       => __( 'Sort / enable / disable elements', 'text-domain' ),
                    'section'           => 'slug_section_front_page_sortable',
                    'id'                => 'homepage_control',
                    'option'            => 'homepage',
                    'type'              => 'control' );

// Front Page Controls
for ( $i = 1; $i < 4; $i++ ) { 
     $options[] = array( 'title'             => __( 'Text Field', 'text-domain' ),
                         'description'       => '',
                         'section'           => 'slug_section_front_page_' . $i,
                         'id'                => 'front_page_text_' . $i,
                         'default'           => 'Default value ' . $i,
                         'option'            => 'text',
                         'sanitize_callback' => 'sanitize_text_field',
                         'type'              => 'control' );
}

