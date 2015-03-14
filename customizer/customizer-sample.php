<?php
/**
 * WPshed Customizer
 */


/** The short name gives a unique element to each options id. */
$shortname = 'my_theme_';

// User access level
$capability = 'edit_theme_options';


/**
 * Here we will set the options we are going to have in the customizer.
 */
$options = array(); // If you delete this line, the sky will fall down! So you better don't.


/* ---------------------------------------------------------------------------------------------------
    Panels (optional - WP 4.0+ only)
--------------------------------------------------------------------------------------------------- */

$options[] = array( 'title'             => __( 'Example Panel', 'textdomain' ), // Panel name
                    'description'       => __( 'Panel description.', 'textdomain' ), // Panel description
                    'id'                => $shortname . 'panel_id', // unique ID
                    'priority'          => 10,
                    'theme_supports'    => '',
                    'type'              => 'panel' ); // type = panel

$options[] = array( 'title'             => __( 'Example Panel 2', 'textdomain' ), // Panel name
                    'description'       => __( 'Panel description.', 'textdomain' ), // Panel description
                    'id'                => $shortname . 'panel_2', // unique ID
                    'priority'          => 20,
                    'theme_supports'    => '',
                    'type'              => 'panel' ); // type = panel


/* ---------------------------------------------------------------------------------------------------
    Sections
--------------------------------------------------------------------------------------------------- */


$options[] = array( 'title'             => __( 'Example Section', 'textdomain' ), // Section name
                    'description'       => __( 'Section description', 'textdomain' ), // Section description
                    'panel'             => $shortname . 'panel_id', // panel
                    'id'                => $shortname . 'section_id', // unique ID
                    'priority'          => 10,
                    'theme_supports'    => '',
                    'type'              => 'section' ); // type = section

$options[] = array( 'title'             => __( 'Example Section 2', 'textdomain' ), // Section name
                    'description'       => __( 'Section description', 'textdomain' ), // Section description
                    'panel'             => $shortname . 'panel_2', // panel
                    'id'                => $shortname . 'section_2', // unique ID
                    'priority'          => 10,
                    'theme_supports'    => '',
                    'type'              => 'section' ); // type = section

$options[] = array( 'title'             => __( 'Example Section 3', 'textdomain' ), // Section name
                    'description'       => __( 'Section description', 'textdomain' ), // Section description
                    'panel'             => $shortname . 'panel_2', // panel
                    'id'                => $shortname . 'section_3', // unique ID
                    'priority'          => 10,
                    'theme_supports'    => '',
                    'type'              => 'section' ); // type = section

/* ---------------------------------------------------------------------------------------------------
    Controls
--------------------------------------------------------------------------------------------------- */

// URL field
$options[] = array( 'title'             => __( 'URL Field', 'textdomain' ), // Control label
                    'description'       => '', // Control description
                    'section'           => $shortname . 'section_id', // section
                    'id'                => $shortname . 'url', // unique ID
                    'default'           => '',
                    'option'            => 'url',
                    'type'              => 'control' ); // type = control

// Email field
$options[] = array( 'title'             => __( 'Email Field', 'textdomain' ), // Control label
                    'description'       => '', // Control description
                    'section'           => $shortname . 'section_id', // section
                    'id'                => $shortname . 'email', // unique ID
                    'default'           => '',
                    'option'            => 'email',
                    'type'              => 'control' ); // type = control

// Password field
$options[] = array( 'title'             => __( 'Password Field', 'textdomain' ), // Control label
                    'description'       => '', // Control description
                    'section'           => $shortname . 'section_id', // section
                    'id'                => $shortname . 'password', // unique ID
                    'default'           => '',
                    'option'            => 'password',
                    'type'              => 'control' ); // type = control

// Textarea field
$options[] = array( 'title'             => __( 'Textarea Field', 'textdomain' ), // Control label
                    'description'       => '', // Control description
                    'section'           => $shortname . 'section_id', // section
                    'id'                => $shortname . 'textarea', // unique ID
                    'default'           => '',
                    'option'            => 'textarea',
                    'type'              => 'control' ); // type = control

// Range field
$options[] = array( 'title'             => __( 'Range Field', 'textdomain' ), // Control label
                    'description'       => '', // Control description
                    'section'           => $shortname . 'section_id', // section
                    'id'                => $shortname . 'range', // unique ID
                    'default'           => 70,
                    'option'            => 'range',
                    'input_attrs'       => array(
                        'min'   => 0,
                        'max'   => 100,
                        'step'  => 1,
                        'class' => 'example-class',
                    ),
                    'type'              => 'control' ); // type = control

// Text field
$options[] = array( 'title'             => __( 'Text Field', 'textdomain' ), // Control label
                    'description'       => '', // Control description
                    'section'           => $shortname . 'section_id', // section
                    'id'                => $shortname . 'text', // unique ID
                    'default'           => 'Default value',
                    'option'            => 'text',
                    'type'              => 'control' ); // type = control

// Color Picker field
$options[] = array( 'title'             => __( 'Color Picker Field', 'textdomain' ), // Control label
                    'description'       => '', // Control description
                    'section'           => $shortname . 'section_id', // section
                    'id'                => $shortname . 'color', // unique ID
                    'default'           => '#BADA55', // HEX
                    'option'            => 'color',
                    'type'              => 'control' ); // type = control

// Radio field
$options[] = array( 'title'             => __( 'Radio Field', 'textdomain' ), // Control label
                    'description'       => '', // Control description
                    'section'           => $shortname . 'section_id', // section
                    'id'                => $shortname . 'radio', // unique ID
                    'default'           => 'value2',
                    'option'            => 'radio',
                    'choices'           => array(
                        'value1' => 'Choice 1',
                        'value2' => 'Choice 2',
                        'value3' => 'Choice 3',
                    ),
                    'type'              => 'control' ); // type = control

// Checkbox field
$options[] = array( 'title'             => __( 'Checkbox Field', 'textdomain' ), // Control label
                    'description'       => '', // Control description
                    'section'           => $shortname . 'section_id', // section
                    'id'                => $shortname . 'checkbox', // unique ID
                    'default'           => '', // 1 for checked
                    'option'            => 'checkbox',
                    'type'              => 'control' ); // type = control

// Select field
$options[] = array( 'title'             => __( 'Select Field', 'textdomain' ), // Control label
                    'description'       => '', // Control description
                    'section'           => $shortname . 'section_id', // section
                    'id'                => $shortname . 'select', // unique ID
                    'default'           => 'value2',
                    'option'            => 'select',
                    'choices'           => array(
                        'value1' => 'Choice 1',
                        'value2' => 'Choice 2',
                        'value3' => 'Choice 3',
                    ),
                    'type'              => 'control' ); // type = control

// Image Upload field
$options[] = array( 'title'             => __( 'Image Upload Field', 'textdomain' ), // Control label
                    'description'       => '', // Control description
                    'section'           => $shortname . 'section_id', // section
                    'id'                => $shortname . 'image', // unique ID
                    'default'           => '',
                    'option'            => 'image',
                    'type'              => 'control' ); // type = control

// File Upload field
$options[] = array( 'title'             => __( 'File Upload Field', 'textdomain' ), // Control label
                    'description'       => '', // Control description
                    'section'           => $shortname . 'section_id', // section
                    'id'                => $shortname . 'file', // unique ID
                    'default'           => '',
                    'option'            => 'file',
                    'type'              => 'control' ); // type = control

// Pages field
$options[] = array( 'title'             => __( 'Pages Field', 'textdomain' ), // Control label
                    'description'       => '', // Control description
                    'section'           => $shortname . 'section_id', // section
                    'id'                => $shortname . 'pages', // unique ID
                    'default'           => 0,
                    'option'            => 'pages',
                    'type'              => 'control' ); // type = control

// Categories field
$options[] = array( 'title'             => __( 'Categories Field', 'textdomain' ), // Control label
                    'description'       => '', // Control description
                    'section'           => $shortname . 'section_id', // section
                    'id'                => $shortname . 'categories', // unique ID
                    'default'           => 0,
                    'option'            => 'categories',
                    'type'              => 'control' ); // type = control


// Text field - panel 2
$options[] = array( 'title'             => __( 'Text Field', 'textdomain' ), // Control label
                    'description'       => '', // Control description
                    'section'           => $shortname . 'section_2', // section
                    'id'                => $shortname . 'text_2', // unique ID
                    'default'           => 'Default value',
                    'option'            => 'text',
                    'type'              => 'control' ); // type = control

// Textarea field - panel 2
$options[] = array( 'title'             => __( 'Textarea Field', 'textdomain' ), // Control label
                    'description'       => '', // Control description
                    'section'           => $shortname . 'section_2', // section
                    'id'                => $shortname . 'textarea_2', // unique ID
                    'default'           => '',
                    'option'            => 'textarea',
                    'type'              => 'control' ); // type = control

// Text field - panel 2
$options[] = array( 'title'             => __( 'Text Field', 'textdomain' ), // Control label
                    'description'       => '', // Control description
                    'section'           => $shortname . 'section_3', // section
                    'id'                => $shortname . 'text_3', // unique ID
                    'default'           => 'Default value',
                    'option'            => 'text',
                    'type'              => 'control' ); // type = control
                    
/* ---------------------------------------------------------------------------------------------------
    End Control Options
--------------------------------------------------------------------------------------------------- */

// Do not edit or delete below. This will include any child theme options.
if ( file_exists( get_stylesheet_directory() .'/customizer.php' ) ) {
    include get_stylesheet_directory() . '/customizer.php';
}
