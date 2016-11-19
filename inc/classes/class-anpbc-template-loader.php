<?php

/**
 *  ANP BuddyPress Customization Template Loader
 *
 * @author      Pea, Glocal
 * @license     GPL-2.0+
 * @link        http://glocal.coop
 * @since       1.0.3
 * @package     ANP_BuddyPress_Customization
 */

class ANP_BuddyPress_Customization_Template_Loader extends Gamajo_Template_Loader {
    /**
     * Prefix for filter names.
     *
     * @since 0.1.0
     *
     * @var string
     */
    protected $filter_prefix = 'anp_buddypress_group_home';

    /**
     * Directory name where custom templates for this plugin should be found in the theme.
     *
     * @since 0.1.0
     *
     * @var string
     */
    protected $theme_template_directory = 'buddypress';

    /**
     * Reference to the root directory path of this plugin.
     *
     * @since 0.1.0
     *
     * @var string
     */
    protected $plugin_directory = ANP_BP_CUSTOM_PLUGIN_DIR;

    /**
     * Directory name where templates are found in this plugin.
     *
     * @since 0.1.0
     *
     * @var strings
     */
    protected $plugin_template_directory = 'public/views';
}

/**
 * Instantiate Template Loader
 * Use it to call the `get_template_part()` method
 * @usage `$anp_bp_customization_template_loader->get_template_part( 'home' )`
 * @var ANP_BuddyPress_Customization_Template_Loader
 */
$anp_bp_customization_template_loader = new ANP_BuddyPress_Customization_Template_Loader();
