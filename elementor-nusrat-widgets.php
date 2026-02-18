<?php
/**
 * Plugin Name: Elementor Nusrat Widgets
 * Description: Custom Elementor widgets collection - Hero Section, Trust Bar, Category Showcase, and more.
 * Version: 1.0.0
 * Author: Nusrat
 * Text Domain: nusrat-widgets
 * Requires Plugins: elementor
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'NUSRAT_WIDGETS_PATH', plugin_dir_path( __FILE__ ) );
define( 'NUSRAT_WIDGETS_URL', plugin_dir_url( __FILE__ ) );

final class Nusrat_Elementor_Widgets {

    private static $instance = null;

    public static function instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct() {
        add_action( 'plugins_loaded', [ $this, 'init' ] );
    }

    public function init() {
        if ( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'elementor_missing_notice' ] );
            return;
        }

        add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );
        add_action( 'elementor/elements/categories_registered', [ $this, 'add_widget_categories' ] );
        add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'enqueue_styles' ] );
        add_action( 'elementor/editor/after_enqueue_styles', [ $this, 'enqueue_styles' ] );
        add_action( 'elementor/editor/after_enqueue_styles', [ $this, 'enqueue_editor_styles' ] );
    }

    /**
     * Register custom category at the TOP of the Elementor panel
     * so it appears before Layout, Basic, General, etc.
     */
    public function add_widget_categories( $elements_manager ) {
        // Get all existing categories
        $old_categories = $elements_manager->get_categories();

        // Register our category first - this pushes it to the top
        $elements_manager->add_category(
            'nusrat-widgets',
            [
                'title' => __( 'Nusrat Widgets', 'nusrat-widgets' ),
                'icon'  => 'eicon-star',
                'active' => true,
            ]
        );

        // Re-register all existing categories after ours
        // This ensures "Nusrat Widgets" stays at position #1
        foreach ( $old_categories as $key => $category ) {
            if ( $key !== 'nusrat-widgets' ) {
                $elements_manager->add_category( $key, $category );
            }
        }
    }

    /**
     * Auto-register all widget files from /widgets/ folder
     */
    public function register_widgets( $widgets_manager ) {
        $widget_files = glob( NUSRAT_WIDGETS_PATH . 'widgets/*.php' );

        foreach ( $widget_files as $file ) {
            require_once $file;
        }

        // Register each widget
        $widgets_manager->register( new \Nusrat_Hero_Section_Widget() );
        $widgets_manager->register( new \Nusrat_Trust_Bar_Widget() );
        $widgets_manager->register( new \Nusrat_Category_Showcase_Widget() );
        $widgets_manager->register( new \Nusrat_Product_Display_Widget() );
        $widgets_manager->register( new \Nusrat_Lifestyle_Banner_Widget() );
        $widgets_manager->register( new \Nusrat_Why_Choose_Us_Widget() );
        $widgets_manager->register( new \Nusrat_Testimonials_Widget() );
        $widgets_manager->register( new \Nusrat_CTA_Banner_Widget() );
    }

    /**
     * Frontend styles (visible on the actual site)
     */
    public function enqueue_styles() {
        wp_enqueue_style(
            'nusrat-widgets-style',
            NUSRAT_WIDGETS_URL . 'assets/css/widgets.css',
            [],
            '1.0.0'
        );
    }

    /**
     * Editor-only styles - highlights the Nusrat Widgets category
     * in the Elementor panel so it's easy to spot
     */
    public function enqueue_editor_styles() {
        wp_enqueue_style(
            'nusrat-widgets-editor',
            NUSRAT_WIDGETS_URL . 'assets/css/editor.css',
            [],
            '1.0.0'
        );
    }

    public function elementor_missing_notice() {
        echo '<div class="notice notice-warning"><p><strong>Elementor Nusrat Widgets</strong> requires <strong>Elementor</strong> plugin to be installed and activated.</p></div>';
    }
}

Nusrat_Elementor_Widgets::instance();
