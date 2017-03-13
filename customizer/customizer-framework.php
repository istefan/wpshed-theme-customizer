<?php
/**
 * Customizer Framework.
 * Version: 1.2
 *
 * @link https://wpshed.com/wordpress/wordpress-theme-customizer-framework/
 *
 * @package WPshed Customizer Framework
 */


/**
 * Define constants
 */
define( 'WPSHED_CF_DIR', trailingslashit( get_template_directory() ) . basename( dirname( __FILE__ ) ) );
define( 'WPSHED_CF_THEME_OPTIONS', trailingslashit( WPSHED_CF_DIR ) . 'theme-options.php' );
define( 'WPSHED_CF_THEME_SAMPLE_OPTIONS', trailingslashit( WPSHED_CF_DIR ) . 'customizer-examples.php' );


/**
 * Locate settings file
 */
function wpshed_cf_options_file() {
    if ( file_exists( WPSHED_CF_THEME_OPTIONS ) ) {
        $customizer_options = WPSHED_CF_THEME_OPTIONS;
    } else {
        $customizer_options = WPSHED_CF_THEME_SAMPLE_OPTIONS;
    }
    return $customizer_options;
}


/**
 * Register Settings
 */
function wpshed_cf_register_settings() {
    $options = array();
    require_once wpshed_cf_options_file();

    foreach ( $options as $option ) {
        if ( $option['type'] != 'panel' && $option['type'] != 'section' ) {
            if ( ! get_option( $option['id'] ) ) {
                update_option( $option['id'], $option['default'] );
            }
        }
    }
}
add_action( 'after_switch_theme', 'wpshed_cf_register_settings' );


/**
 * Register Customizer
 */
function wpshed_cf_customizer_register( $wp_customize ) {

    // User access level
    $capability = 'edit_theme_options';

    // Option type
    $type = 'theme_mod'; // option / theme_mod

    $options = array();

    // Require customizer options file
    require_once wpshed_cf_options_file();

    $i = 0;
    foreach ( $options as $option ) {

        // Add panel
        if ( $option['type'] == 'panel' ) {

            $priority       = ( isset( $option['priority'] ) ) ? $option['priority'] : $i + 10;
            $theme_supports = ( isset( $option['theme_supports'] ) ) ? $option['theme_supports'] : '';
            $title          = ( isset( $option['title'] ) ) ? esc_attr( $option['title'] ) : __( 'Untitled Panel', 'text-domain' );
            $description    = ( isset( $option['description'] ) ) ? esc_attr( $option['description'] ) : '';

            $wp_customize->add_panel( $option['id'], array(
                'priority'          => $priority,
                'capability'        => $capability,
                'theme_supports'    => $theme_supports,
                'title'             => $title,
                'description'       => $description,
            ) );

        }

        // Add sections
        if ( $option['type'] == 'section'  ) {

            $priority       = ( isset( $option['priority'] ) ) ? $option['priority'] : $i + 10;
            $theme_supports = ( isset( $option['theme_supports'] ) ) ? $option['theme_supports'] : '';
            $title          = ( isset( $option['title'] ) ) ? esc_attr( $option['title'] ) : __( 'Untitled Section', 'text-domain' );
            $description    = ( isset( $option['description'] ) ) ? esc_attr( $option['description'] ) : '';
            $panel          = ( isset( $option['panel'] ) ) ? esc_attr( $option['panel'] ) : '';

            $wp_customize->add_section( esc_attr( $option['id'] ), array(
                'priority'          => $priority,
                'capability'        => $capability,
                'theme_supports'    => $theme_supports,
                'title'             => $title,
                'description'       => $description,
                'panel'             => $panel,
            ) );

        }

        // Add controls
        if ( $option['type'] == 'control'  ) {

            $priority       = ( isset( $option['priority'] ) ) ? $option['priority'] : $i + 10;
            $section        = ( isset( $option['section'] ) ) ? esc_attr( $option['section'] ) : '';
            $default        = ( isset( $option['default'] ) ) ? $option['default'] : '';
            $transport      = ( isset( $option['transport'] ) ) ? esc_attr( $option['transport'] ) : 'refresh';
            $title          = ( isset( $option['title'] ) ) ? esc_attr( $option['title'] ) : __( 'Untitled Section', 'text-domain' );
            $description    = ( isset( $option['description'] ) ) ? esc_attr( $option['description'] ) : '';
            $form_field     = ( isset( $option['option'] ) ) ? esc_attr( $option['option'] ) : 'option';
            $sanitize_callback = ( isset( $option['sanitize_callback'] ) ) ? esc_attr( $option['sanitize_callback'] ) : '';
            $width          = ( isset( $option['width'] ) ) ? $option['width'] : '';
            $height         = ( isset( $option['height'] ) ) ? $option['height'] : '';
            $flex_width     = ( isset( $option['flex_width'] ) ) ? $option['flex_width'] : '';
            $flex_height    = ( isset( $option['flex_height'] ) ) ? $option['flex_height'] : '';
            $placeholder    = ( isset( $option['placeholder'] ) ) ? $option['placeholder'] : __( 'No file selected', 'text-domain' );
            $frame_title    = ( isset( $option['frame_title'] ) ) ? $option['frame_title'] : __( 'Select File', 'text-domain' );
            $frame_button   = ( isset( $option['frame_button'] ) ) ? $option['frame_button'] : __( 'Choose File', 'text-domain' );

            // Add control settings
            $wp_customize->add_setting( esc_attr( $option['id'] ), array(
                'default'           => $default,
                'type'              => $type,
                'capability'        => $capability,
                'transport'         => $transport,
                'sanitize_callback' => $sanitize_callback,
            ) );

            // Add form field
            switch ( $form_field ) {

                // URL Field
                case 'url':
                    $wp_customize->add_control( esc_attr( $option['id'] ), array(
                        'type'              => 'url',
                        'priority'          => $priority,
                        'section'           => $section,
                        'label'             => $title,
                        'description'       => $description,
                    ) );
                break;

                // URL Field
                case 'email':
                    $wp_customize->add_control( esc_attr( $option['id'] ), array(
                        'type'              => 'email',
                        'priority'          => $priority,
                        'section'           => $section,
                        'label'             => $title,
                        'description'       => $description,
                    ) );
                break;

                // Password Field
                case 'password':
                    $wp_customize->add_control( esc_attr( $option['id'] ), array(
                        'type'              => 'password',
                        'priority'          => $priority,
                        'section'           => $section,
                        'label'             => $title,
                        'description'       => $description,
                    ) );
                break;

                // Range Field
                case 'range':
                    $input_attrs  = ( isset( $option['input_attrs'] ) ) ? $option['input_attrs'] : array();

                    $wp_customize->add_control( esc_attr( $option['id'] ), array(
                        'type'              => 'range',
                        'priority'          => $priority,
                        'section'           => $section,
                        'label'             => $title,
                        'description'       => $description,
                        'input_attrs'       => $input_attrs,
                    ) );
                break;

                // Number Field
                case 'number':
                    $input_attrs  = ( isset( $option['input_attrs'] ) ) ? $option['input_attrs'] : array();

                    $wp_customize->add_control( esc_attr( $option['id'] ), array(
                        'type'              => 'number',
                        'priority'          => $priority,
                        'section'           => $section,
                        'label'             => $title,
                        'description'       => $description,
                        'input_attrs'       => $input_attrs,
                    ) );
                break;

                // Text Field
                case 'text':
                    $wp_customize->add_control( esc_attr( $option['id'] ), array(
                        'type'              => 'text',
                        'priority'          => $priority,
                        'section'           => $section,
                        'label'             => $title,
                        'description'       => $description,
                    ) );
                break;

                // Radio Field
                case 'radio':
                    $choices  = ( isset( $option['choices'] ) ) ? $option['choices'] : array();

                    $wp_customize->add_control( esc_attr( $option['id'] ), array(
                        'type'              => 'radio',
                        'priority'          => $priority,
                        'section'           => $section,
                        'label'             => $title,
                        'description'       => $description,
                        'choices'           => $choices,
                    ) );
                break;

                // Checkbox Field
                case 'checkbox':
                    $wp_customize->add_control( esc_attr( $option['id'] ), array(
                        'type'              => 'checkbox',
                        'priority'          => $priority,
                        'section'           => $section,
                        'label'             => $title,
                        'description'       => $description,
                    ) );
                break;

                // Radio Field
                case 'select':
                    $choices  = ( isset( $option['choices'] ) ) ? $option['choices'] : array();

                    $wp_customize->add_control( esc_attr( $option['id'] ), array(
                        'type'              => 'select',
                        'priority'          => $priority,
                        'section'           => $section,
                        'label'             => $title,
                        'description'       => $description,
                        'choices'           => $choices,
                    ) );
                break;

                // Pages Field
                case 'pages':
                    $wp_customize->add_control( esc_attr( $option['id'] ), array(
                        'type'              => 'dropdown-pages',
                        'priority'          => $priority,
                        'section'           => $section,
                        'label'             => $title,
                        'description'       => $description,
                    ) );
                break;

                // Categories Field
                case 'categories':
                    $wp_customize->add_control( new WPshed_Customize_Categories_Control( $wp_customize, esc_attr( $option['id'] ), array(
                        'priority'          => $priority,
                        'section'           => $section,
                        'label'             => $title,
                        'description'       => $description,
                    )));
                break;

                // Textarea Field
                case 'textarea':
                    $wp_customize->add_control( new WPshed_Customize_Textarea_Control( $wp_customize, esc_attr( $option['id'] ), array(
                        'priority'          => $priority,
                        'section'           => $section,
                        'label'             => $title,
                        'description'       => $description,
                    )));
                break;

                // Menus Field
                case 'menus':
                    $wp_customize->add_control( new WPshed_Customize_Menus_Control( $wp_customize, esc_attr( $option['id'] ), array(
                        'priority'          => $priority,
                        'section'           => $section,
                        'label'             => $title,
                        'description'       => $description,
                    )));
                break;

                // Users Field
                case 'users':
                    $wp_customize->add_control( new WPshed_Customize_Users_Control( $wp_customize, esc_attr( $option['id'] ), array(
                        'priority'          => $priority,
                        'section'           => $section,
                        'label'             => $title,
                        'description'       => $description,
                    )));
                break;

                // Posts Field
                case 'posts':
                    $wp_customize->add_control( new WPshed_Customize_Posts_Control( $wp_customize, esc_attr( $option['id'] ), array(
                        'priority'          => $priority,
                        'section'           => $section,
                        'label'             => $title,
                        'description'       => $description,
                    )));
                break;

                // Post Types Field
                case 'post_types':
                    $wp_customize->add_control( new WPshed_Customize_Post_Type_Control( $wp_customize, esc_attr( $option['id'] ), array(
                        'priority'          => $priority,
                        'section'           => $section,
                        'label'             => $title,
                        'description'       => $description,
                    )));
                break;

                // Tags Field
                case 'tags':
                    $wp_customize->add_control( new WPshed_Customize_Tags_Control( $wp_customize, esc_attr( $option['id'] ), array(
                        'priority'          => $priority,
                        'section'           => $section,
                        'label'             => $title,
                        'description'       => $description,
                    )));
                break;

                // Image Upload Field
                case 'image':
                    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, esc_attr( $option['id'] ), array(
                        'priority'          => $priority,
                        'section'           => $section,
                        'label'             => $title,
                        'description'       => $description,
                    )));
                break;

                // File Upload Field
                case 'file':
                    $wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, esc_attr( $option['id'] ), array(
                        'priority'          => $priority,
                        'section'           => $section,
                        'label'             => $title,
                        'description'       => $description,
                    )));
                break;

                // Color Picker Field
                case 'color':
                    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, esc_attr( $option['id'] ), array(
                        'priority'          => $priority,
                        'section'           => $section,
                        'label'             => $title,
                        'description'       => $description,
                    )));
                break;

            }



        }

    }

}
add_action( 'customize_register', 'wpshed_cf_customizer_register' );


/**
 * Customizer custom control classes
 */
if( ! class_exists( 'WP_Customize_Control' ) )
     return;


/**
 * Add Textarea control
 */
class WPshed_Customize_Textarea_Control extends WP_Customize_Control {
    
    public $type = 'textarea';

    // Render the content
    public function render_content() {
        ?>
        <label>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <?php if ( ! empty( $this->description ) ) : ?>
            <span class="description customize-control-description"><?php echo $this->description; ?></span>
            <?php endif; ?>
            <textarea class="large-text" cols="20" rows="5" <?php $this->link(); ?>>
                <?php echo esc_textarea( $this->value() ); ?>
            </textarea>
        </label>
        <?php
    }

}


/**
 * Add Categories control
 */
class WPshed_Customize_Categories_Control extends WP_Customize_Control {

    public $type = 'categories';
 
    // Render the content
    public function render_content() {

        $dropdown = wp_dropdown_categories(
            array(
                'name'              => '_customize-dropdown-categories-' . $this->id,
                'echo'              => 0,
                'show_option_none'  => __( '&mdash; Select &mdash;', 'text-domain' ),
                'option_none_value' => '0',
                'hierarchical'      => 1, 
                'selected'          => $this->value(),
            )
        );

        // Hackily add in the data link parameter.
        $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

        printf(
            '<label class="customize-control-select"><span class="customize-control-title">%s</span><span class="description customize-control-description">%s</span> %s</label>',
            $this->label,
            esc_html( $this->description ),
            $dropdown
        );

    }
}


/**
 * Add Menus control
 */
class WPshed_Customize_Menus_Control extends WP_Customize_Control {

    public $type = 'menus';
    private $menus = false;

    public function __construct( $manager, $id, $args = array(), $options = array() ) {
        
        $this->menus = wp_get_nav_menus( $options );
        parent::__construct( $manager, $id, $args );

    }

    // Render the content
    public function render_content() {

        if( empty( $this->menus ) )
            return;
            ?>

            <label class="customize-control-select">
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php if ( ! empty( $this->description ) ) : ?>
                <span class="description customize-control-description"><?php echo $this->description; ?></span>
                <?php endif; ?>
                <select <?php $this->link(); ?>>
                <option value=""><?php _e( '&mdash; Select &mdash;', 'text-domain' ); ?></option>
                <?php 
                    foreach ( $this->menus as $menu ) {
                        printf( '<option value="%s" %s>%s</option>', 
                            $menu->term_id,
                            selected( $this->value(), $menu->term_id, false ),
                            $menu->name
                        );
                    }
                ?>
                </select>
            </label>
        <?php
    }
}


/**
 * Add Users control
 */
class WPshed_Customize_Users_Control extends WP_Customize_Control {

    public $type = 'users';
    private $users = false;

    public function __construct( $manager, $id, $args = array(), $options = array() ) {
        
        $this->users = get_users( $options );
        parent::__construct( $manager, $id, $args );

    }

    // Render the content
    public function render_content() {

        if( empty( $this->users) )
            return;
            ?>

            <label class="customize-control-select">
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php if ( ! empty( $this->description ) ) : ?>
                <span class="description customize-control-description"><?php echo $this->description; ?></span>
                <?php endif; ?>
                <select <?php $this->link(); ?>>
                <option value=""><?php _e( '&mdash; Select &mdash;', 'text-domain' ); ?></option>
                <?php 
                    foreach( $this->users as $user ) {
                        printf( '<option value="%s" %s>%s</option>',
                            $user->data->ID,
                            selected( $this->value(), $user->data->ID, false ),
                            $user->data->display_name
                        );
                    } 
                ?>
                </select>
            </label>
        <?php
    }
}


/**
 * Add Posts control
 */
class WPshed_Customize_Posts_Control extends WP_Customize_Control {

    public $type = 'posts';
    private $posts = false;

    public function __construct( $manager, $id, $args = array(), $options = array() ) {

        $postargs = wp_parse_args( $options, array( 'numberposts' => '-1' ) );
        $this->posts = get_posts( $postargs );
        parent::__construct( $manager, $id, $args );
    }

    // Render the content
    public function render_content() {

        if( empty( $this->posts) )
            return;
            ?>
            <label class="customize-control-select">
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php if ( ! empty( $this->description ) ) : ?>
                <span class="description customize-control-description"><?php echo $this->description; ?></span>
                <?php endif; ?>
                <select <?php $this->link(); ?>>
                <option value=""><?php _e( '&mdash; Select &mdash;', 'text-domain' ); ?></option>
                <?php
                    foreach ( $this->posts as $post ) {
                        printf( '<option value="%s" %s>%s</option>', 
                            $post->ID,
                            selected( $this->value(), $post->ID, false ),
                            $post->post_title
                        );
                    }
                ?>
                </select>
            </label>
        <?php
    }
}


/**
 * Add Post Types control
 */
class WPshed_Customize_Post_Type_Control extends WP_Customize_Control {
    
    public $type = 'post_types';
    private $post_types = false;

    public function __construct( $manager, $id, $args = array(), $options = array() ) {

        $postargs = wp_parse_args( $options, array( 'public' => true ) );
        $this->post_types = get_post_types( $postargs, 'object' );
        parent::__construct( $manager, $id, $args );

    }

    // Render the content
    public function render_content() {

        if( empty( $this->post_types ) )
            return;
            ?>
            <label class="customize-control-select">
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php if ( ! empty( $this->description ) ) : ?>
                <span class="description customize-control-description"><?php echo $this->description; ?></span>
                <?php endif; ?>
                <select <?php $this->link(); ?>>
                <option value=""><?php _e( '&mdash; Select &mdash;', 'text-domain' ); ?></option>
                <?php
                    foreach ( $this->post_types as $k => $post_type ) {
                        printf('<option value="%s" %s>%s</option>', 
                            $k,
                            selected( $this->value(), $k, false ),
                            $post_type->labels->name
                        );
                    }
                ?>
                </select>
            </label>
        <?php
    }
}


/**
 * Add Tags control
 */
class WPshed_Customize_Tags_Control extends WP_Customize_Control {

    public $type = 'tags';
    private $tags = false;

    public function __construct( $manager, $id, $args = array(), $options = array() ) {

        $this->tags = get_tags( $options );
        parent::__construct( $manager, $id, $args );

    }

    // Render the content
    public function render_content() {
        if( empty( $this->tags ) )
            return;
        ?>
            <label class="customize-control-select">
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php if ( ! empty( $this->description ) ) : ?>
                <span class="description customize-control-description"><?php echo $this->description; ?></span>
                <?php endif; ?>
                <select <?php $this->link(); ?>>
                <option value=""><?php _e( '&mdash; Select &mdash;', 'text-domain' ); ?></option>
                <?php foreach ( $this->tags as $tag ) {
                        printf( '<option value="%s" %s>%s</option>',
                            $tag->term_id,
                            selected( $this->value(), $tag->term_id, false ),
                            $tag->name
                        );
                    }
                ?>
                </select>
            </label>
        <?php
    }
}
