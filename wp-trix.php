<?php
/**
 * Plugin Name: WP Trix
 * Description: Trix Editor for WP Admin panel
 * Plugin URI: https://github.com/ediamin/wp-trix.git
 * Author: Edi Amin
 * Author URI: https://github.com/ediamin
 * Version: 1.0
 * License: GPL2
 * Text Domain: wp-trix
 * Domain Path: languages
 */

// don't call the file directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Email Campaign plugin main class
 */
class WP_Trix_Editor {

    /**
     * Add-on Version
     *
     * @var  string
     */
    public $version = '1.0';

    /**
     * Add-on text-domain
     *
     * @var string
     */
    protected $text_domain = 'wp-trix';

    /**
     * Initializes the class
     *
     * Checks for an existing instance
     * and if it doesn't find one, creates it.
     */
    public static function init() {
        static $instance = false;

        if ( ! $instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Constructor for the class
     *
     * Sets up all the appropriate hooks and actions
     */
    public function __construct() {
        $this->define_constants();

        // Localize our plugin
        add_action( 'init', [ $this, 'localization_setup' ] );

        // css and js
        add_action( 'admin_enqueue_scripts', [ $this, 'admin_scripts' ] );

        // menu
        add_action( 'admin_menu', [ $this, 'admin_menu' ] );
    }

    /**
     * Initialize plugin for localization
     *
     * @uses load_plugin_textdomain()
     */
    public function localization_setup() {
        load_plugin_textdomain( $this->text_domain, false, dirname( plugin_basename( __FILE__ ) ) . '/i18n/languages/' );
    }

    /**
     * Define Add-on constants
     *
     * @return void
     */
    private function define_constants() {
        define( 'WP_TRIX_VERSION', $this->version );
        define( 'WP_TRIX_FILE', __FILE__ );
        define( 'WP_TRIX_PATH', dirname( WP_TRIX_FILE ) );
        define( 'WP_TRIX_INCLUDES', WP_TRIX_PATH . '/includes' );
        define( 'WP_TRIX_URL', plugins_url( '', WP_TRIX_FILE ) );
        define( 'WP_TRIX_ASSETS', WP_TRIX_URL . '/assets' );
        define( 'WP_TRIX_VIEWS', WP_TRIX_PATH . '/views' );
    }

    /**
     * Enqueue styles and scripts
     *
     * @return void
     */
    public function admin_scripts() {
        wp_enqueue_media();

        wp_enqueue_style( 'wp-trix', WP_TRIX_ASSETS . '/css/wp-trix.css', [], $this->version );

        wp_enqueue_script( 'trix-editor', WP_TRIX_ASSETS . '/js/trix.js', [], '0.9.5', true );
        wp_enqueue_script( 'wp-trix', WP_TRIX_ASSETS . '/js/wp-trix.js', [ 'jquery', 'trix-editor' ], $this->version, true );
    }

    /**
     * Admin menu hook
     *
     * @return void
     */
    public function admin_menu() {
        add_menu_page( __( 'WP Trix', 'wp-trix' ), __( 'WP Trix', 'wp-trix' ), 'manage_options', 'wp-trix', [ $this, 'menu_page' ] );
    }

    public function menu_page() {
        include_once WP_TRIX_VIEWS . '/admin.php';
    }

}

WP_Trix_Editor::init();
