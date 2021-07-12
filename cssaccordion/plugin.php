<?php

//Class Plugin
class Plugin {

    //Instance
    private static $_instance = null;

    /**
     * Instance
     * Ensures only one instance of the class is loaded or can be loaded.
     */
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    //widget_scripts
    public function widget_scripts() {
        //wp_register_script( 'elementor-hello-world', plugins_url( '/assets/js/hello-world.js', __FILE__ ), ['jquery'], false, true );
    }
    //widget_style
    public function widget_styles() {
        wp_register_style( 'css-accordion', plugins_url( '/assets/css/twmcss.css', __FILE__ ) );
        wp_register_style( 'login-css', plugins_url( '/assets/css/login.css', __FILE__ ) );
    }
    public function widget_category( $elements_manager ) {
        /* $elements_manager->add_category(
    'test-category',
    [
    'title' => __( 'Test Categories', 'textdomain' ),
    'icon'  => 'fa fa-plug',
    ]
    ); */
    }

    /**
     * Include Widgets files
     * Load widgets files
     */
    private function include_widgets_files() {
        require_once __DIR__ . '/widgets/css-accordion.php';
        require_once __DIR__ . '/widgets/login.php';
    }

    /**
     * Register Widgets
     * Register new Elementor widgets.
     */
    public function register_widgets() {
        // Its is now safe to include Widgets files
        $this->include_widgets_files();

        // Register Widgets
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \TWM_CSSACCORDION() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \TWM_CUSTOM_LOGIN() );
    }

    /**
     *  Plugin class constructor
     * Register plugin action hooks and filters
     */
    public function __construct() {

        // Register widget style
        add_action( 'elementor/frontend/after_enqueue_styles', [$this, 'widget_styles'] );
        // Register widget scripts
        add_action( 'elementor/frontend/after_register_scripts', [$this, 'widget_scripts'] );
        // Register Widgets Category
        add_action( 'elementor/elements/categories_registered', [$this, 'widget_category'] );
        // Register widgets
        add_action( 'elementor/widgets/widgets_registered', [$this, 'register_widgets'] );
    }
}

// Instantiate Plugin Class
Plugin::instance();