<?php
/**
 * BuddyPress Group Home
 *
 * @author    Pea, Glocal
 * @license   GPL-2.0+
 * @link      http://glocal.coop
 * @since     1.0.3
 * @package   ANP_BuddyPress_Customization
 * @subpackage  ANP_BuddyPress_Customization\Public
 */

class ANP_Buddypress_Group_Home_Page {

    /**
	 * Option Value
	 * Value of the option field
	 *
	 * @since 1.0.3
	 * @var string $option_value
	 */
	public $option_value = '';

    /**
     * Option Name
     * Name of the option field
     *
     * @since 1.0.3
     * @var string $option_name
     */
    public $option_name = 'bp-disable-group-home';

    /**
     * Slug
     * Slug of the page
     *
     * @since 1.0.3
     * @var string $slug
     */
    public $slug = 'home';

    /**
     * Constructor
     *
     * @since 1.0.3
     */
	function __construct() {
        $this->option_value = bp_get_option( $this->option_name );

        // Only do if custom group home is enabled
        if( $this->option_value ) {
            $this->register_template_stack();
        }

        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

        add_shortcode( 'widget', array( $this, 'widget_shortcode' ) );
	}

    /**
     * Get Template Directory
     *
     * Returns the template directory.
     *
     * @uses apply_filters()
     *
     * @since 1.0.3
     *
     * @link https://codex.buddypress.org/plugindev/upgrading-older-plugins-that-bundle-custom-templates-for-bp-1-7/
     *
     * @return string
     */
    function get_template_directory() {
        return ANP_BP_CUSTOM_PLUGIN_DIR . 'public/views';
    }

    /**
     * [register_template_stack description]
     * @return [type] [description]
     */
    function register_template_stack() {
        bp_register_template_stack( array( $this, 'get_template_directory' ), 10 );
    }

    /**
     * register_template_stack
     *
     * @param  bool | string $found_template
     * @param  array $templates
     *
     * @return string $found_template
     */
    function template_filter( $found_template, $templates ) {}

    /**
     * Get Template Parts
     *
     * @uses bp_get_template_part()
     *
     * @link https://codex.buddypress.org/developer/filters-reference/bp_get_template_part/
     *
     * @since 1.0.3
     * @return string
     */
    function get_template_part( $template ) {
        return $anp_bp_customization_template_loader->get_template_part( $template );
    }

    /**
     * Enqueue Scripts
     *
     * @since 1.0.3
     */
    public function enqueue_scripts() {
        if( !is_admin() ) {
            wp_enqueue_style( 'anp-custom-home', ANP_BP_CUSTOM_PLUGIN_URL . 'dist/styles/public.min.css', false );
        }
    }

}

new ANP_Buddypress_Group_Home_Page;
