<?php

/**
 * BuddyPress Group Home Admin Settings
 *
 * @author      Pea, Glocal
 * @license     GPL-2.0+
 * @link        http://glocal.coop
 * @since       1.0.3
 * @package     ANP_BuddyPress_Customization
 */

class ANP_Buddypress_Group_Home_Options_Page {

    /**
	 * Option Value
	 * Value of the enable custom group home option field
	 *
	 * @since       1.0.3
	 * @var string $option_value
	 */
	public $option_value = '';

    /**
     * Plugin Name
     * Name of plugin
     *
     * @since       1.0.3
     * @var string $plugin_name
     */
    public $plugin_name = 'anp-buddypress-customization';

    /**
     * Option Name
     * Name of the enable custom group home option field
     *
     * @since       1.0.3
     * @var string $option_name
     */
    public $option_name = 'bp-disable-group-home';

    /**
     * Settings Page
     * The page settings will appear
     *
     * @since       1.0.3
     * @var string $settings_page
     */
    public $settings_page = '';

    /**
     * Capabilities
     * The capabilities required to access
     *
     * @since       1.0.3
     * @var string $capability
     */
    public $capability = '';

    /**
     * Constructor
     *
     * @since       1.0.3
     */
	function __construct() {
        $this->set_up();

        $this->option_value = bp_get_option( $this->option_name );
        add_action( 'bp_register_admin_settings', array( $this, 'add_group_setting' ) );

        if( $this->option_value ) {
            add_action( 'widgets_init', array( $this, 'register_sidebar' ) );
            add_filter( 'bp_core_get_admin_tabs', array( $this, 'add_settings_tab' ) );
            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        }

	}

    /**
     * Set up
     *
     * @since       1.0.3
     *
     * @return void
     */
    private function set_up() {
        // Main settings page.
		$this->settings_page = bp_core_do_network_admin() ? 'settings.php' : 'options-general.php';

		// Main capability.
		$this->capability = bp_core_do_network_admin() ? 'manage_network_options' : 'manage_options';
    }

    /**
     * Register Sidebar
     * If custom group home page is enabled, register a custom groups home sidebar
     *
     * @uses register_sidebar()
     *
     * @since       1.0.3
     *
     * @return void
     */
    public function register_sidebar() {
        register_sidebar( array(
            'name' => __( 'BuddyPress Group Home Widgets', 'buddypress-custom-group-home' ),
            'id' => 'anp-buddypress-home',
            'description' => __( 'Widgets in this area will be shown on group home pages.', 'buddypress-custom-group-home' ),
            'before_widget' => '<li id="%1$s" class="widget %2$s">',
            'after_widget'  => '</li>',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>',
        ) );
    }

    /**
     * Add Settings Field
     * Adds field to enable/disable custom group home package
     *
     * @since       1.0.3
     * @return void
     */
    public function add_group_setting() {
        add_settings_field(
            'bp-disable-group-home',
            __( 'Group Home', 'buddypress-custom-group-home' ),
            array( $this, 'settings_field_callback' ),
            'buddypress',
            'bp_groups'
        );

        register_setting(
            'buddypress',
            'bp-disable-group-home',
            'intval'
        );
    }

    /**
     * Render Settings Field
     *
     * @since       1.0.3
     * @return void
     */
    public function settings_field_callback() {
        ?>
        <input id="bp-disable-group-home" name="bp-disable-group-home" type="checkbox" value="1" <?php checked( $this->option_value ); ?> />
        <label for="bp-disable-group-types"><?php _e( 'Enable custom group home', 'buddypress-custom-group-home' ); ?></label>
        <?php
    }

    /**
     * Enqueue Scripts
     *
     * @uses is_admin()
     * @uses  wp_enqueue_script()
     */
    public function enqueue_scripts( $hook ) {

        wp_enqueue_script( $this->plugin_name . '-script', ANP_BP_CUSTOM_PLUGIN_URL . 'admin/js/admin.js' );
        wp_enqueue_style( $this->plugin_name . '-style', ANP_BP_CUSTOM_PLUGIN_URL . 'admin/css/admin.min.css' );

    }

}

new ANP_Buddypress_Group_Home_Options_Page;
