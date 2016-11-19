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
	 * @since 0.1.0
	 * @var string $option_value
	 */
	public $option_value = '';

    /**
     * Option Name
     * Name of the option field
     *
     * @since 0.1.0
     * @var string $option_name
     */
    public $option_name = 'bp-disable-group-home';

    /**
     * Slug
     * Slug of the page
     *
     * @since 0.1.0
     * @var string $slug
     */
    public $slug = 'home';

    /**
     * Constructor
     *
     * @since 0.1.0
     */
	function __construct() {
        $this->option_value = bp_get_option( $this->option_name );

        // Only do if custom group home is enabled
        if( $this->option_value ) {
            $this->register_template_stack();
        }

        add_shortcode( 'widget', array( $this, 'widget_shortcode' ) );
	}

    /**
     * Get Template Directory
     *
     * Returns the template directory.
     *
     * @uses apply_filters()
     *
     * @since 0.1.0
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
     * @since 0.1.0
     * @return string
     */
    function get_template_part( $template ) {
        return $anp_bp_customization_template_loader->get_template_part( $template );
    }

    public function widget_shortcode( $type, $atts = null ) {

        global $bp;
        $group_id = $bp->groups->current_group->id;

        // Configure defaults and extract the attributes into variables
        extract( shortcode_atts(
        	array(
        		'title'       => '',
                'group_id'    => $group_id,
                'type'        => $type
        	),
        	$atts
        ));

        $args = array(
        	'before_widget' => '<div class="group-' . $group_id . ' ">TEST',
        	'after_widget'  => '</div>',
        	'before_title'  => '<div class="widget-title">',
        	'after_title'   => '</div>',
        );

        ob_start();
        the_widget( $type, $atts, $args );
        $output = ob_get_clean();

        return $output;
    }

}

new ANP_Buddypress_Group_Home_Page;
