<?php
/**
 * Include this line in your theme functions.php file
 */


/**
 * Customizer Framework.
 */
require get_template_directory() . '/customizer/customizer-framework.php';

/* ---------------------------------------------------------------------------------------------------
    Optional - Drag and drop front page elements
--------------------------------------------------------------------------------------------------- */

/**
 * Add elements in the homepage (use 'do_action( 'homepage' );' in your homepage)
 * See customizer-example.php for examples and how each element can be customized
 */
add_action( 'homepage', 'front_page_section_1', 10 );
add_action( 'homepage', 'front_page_section_2', 11 );
add_action( 'homepage', 'front_page_section_3', 12 );

function front_page_section_1() {
	printf( '<p>%s</p>', esc_attr( get_theme_mod( 'front_page_text_1' ) ) );
}

function front_page_section_2() {
	printf( '<p>%s</p>', esc_attr( get_theme_mod( 'front_page_text_2' ) ) );
}

function front_page_section_3() {
	printf( '<p>%s</p>', esc_attr( get_theme_mod( 'front_page_text_3' ) ) );
}