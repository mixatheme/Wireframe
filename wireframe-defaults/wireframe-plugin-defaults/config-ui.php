<?php
/**
 * Module_UI config data file for Wireframe themes & plugins.
 *
 * PHP version 5.6.0
 *
 * @package   Wireframe_Plugin
 * @author    MixaTheme, Tada Burke
 * @version   1.0.0 Wireframe_Plugin
 * @copyright 2016 MixaTheme
 * @license   GPL-2.0+
 * @see       https://mixatheme.com
 * @see       https://github.com/mixatheme/Wireframe
 *
 * This software is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this software. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Namespaces.
 *
 * @since 5.3.0 PHP
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe_Plugin
 */
namespace MixaTheme\Wireframe\Plugin;

/**
 * No direct access to this file.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe_Plugin
 */
defined( 'ABSPATH' ) or die();

/**
 * Stores array of default config data for passing into objects.
 *
 * Option #1: We use a function so the config data can be called and reused
 *            easily when you need it.
 *
 * Option #2: Put your array data inside a Service closure (see wireframe.php).
 *            Another alternative is putting all your object configs into one
 *            single config file to minimize your file count.
 *
 * @since  1.0.0 Wireframe
 * @since  1.0.0 Wireframe_Plugin
 * @see    object Module_UI
 * @return array  Default configuration values.
 */
function wireframe_plugin_config_ui() {
	/**
	 * Wired.
	 *
	 * Wires the Module_UI actions & filters at runtime. Since most plugins
	 * will need UI styles & scripts, this should usually be set to true.
	 *
	 * Enable this configuration file:
	 *
	 * 		1. In this config file, set: $wired = true.
	 * 		2. In this config file, modify any default data you need.
	 * 		3. In `config-controller.php` instantiate Module_UI.
	 * 		4. In `config-controller.php` pass this config into Module_UI.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe_Plugin
	 * @var   bool $wired Wire hooks via __construct(). Default: true
	 */
	$wired = true;

	/**
	 * Prefix.
	 *
	 * Many objects use a prefix for various strings, handles, scripts, etc.
	 * Generally, you should use a constant defined in wireframe.php. However,
	 * you can change it here if needed. Default: WIREFRAME_PLUGIN_PREFIX
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe_Plugin
	 * @var   string $prefix Prefix for handles.
	 */
	$prefix = WIREFRAME_PLUGIN_PREFIX;

	/**
	 * Actions.
	 *
	 * Most objects will usually need actions to be hooked at some point.
	 * You can set your actions in a multi-dimensional array and remember
	 * to set the property $wired = true (above).
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe_Plugin
	 * @var   array $actions Actions to hook.
	 */
	$actions = array(
		'styles' => array(
			'tag'      => 'wp_enqueue_scripts',
			'function' => 'styles',
			'priority' => 10,
			'args'     => null,
		),
		'scripts' => array(
			'tag'      => 'wp_enqueue_scripts',
			'function' => 'scripts',
			'priority' => 10,
			'args'     => null,
		),
	);

	/**
	 * Filters.
	 *
	 * Objects don't generally need filters here, but you have the option.
	 * You can set your filters in a multi-dimensional array and remember
	 * to set the property $wired = true (above).
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe_Plugin
	 * @var   array $filters Filters to hook. Default: array()
	 * @todo  WIP.
	 */
	$filters = array();

	/**
	 * Stylesheet(s) to load.
	 *
	 *		1. Set a multi-dimensional array holding 2 default arrays (optional).
	 *		2. The `ui` array will load any styles for your plugin UI.
	 *		3. The `print` array will load styles for plugin printing.
	 *		4. Remember to set array key values to `media' => 'all' or 'print' etc.
	 *		5. If your plugin does not require styles, you can declare an empty array().
	 *
	 * Example:
	 *
	 * 		'lowercase_underscored_stylesheet_handle' => array(
	 * 			'path'    => 'plugin_path/to/stylesheet',
	 * 			'file'    => 'stylesheet-filename-without-extension',
	 * 			'deps'    => array(),
	 * 			'version' => '1.0.0',
	 * 			'media'   => 'all',
	 * 		),
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe_Plugin
	 * @var   array $styles Array of stylesheets to enqueue.
	 */
	$styles = array(
		'ui' => array(
			'path'    => WIREFRAME_PLUGIN_CSS,
			'file'    => 'wireframe-plugin-ui-min',
			'deps'    => array(),
			'version' => '1.0.0',
			'media'   => 'all',

		),
		'print' => array(
			'path'    => WIREFRAME_PLUGIN_CSS,
			'file'    => 'wireframe-plugin-print-min',
			'deps'    => array(),
			'version' => '1.0.0',
			'media'   => 'print',

		),
	);

	/**
	 * Script(s) to load.
	 *
	 * 		1. Set a multi-dimensional array holding 2 default arrays (optional).
	 *		2. The default `wphead` array will load early scripts to `wp_head()` in a theme.
	 *		3. The default `wpfooter` array will load late scripts to `wp_footer()` in a theme.
	 *		4. Set array key values to `footer' => true or false, respectively.
	 *		5. If your plugin does not require scripts, you can declare an empty array().
	 *
	 * Example:
	 *
	 * 		'lowercase_underscored_script_handle' => array(
	 * 			'path'     => 'plugin_path/to/script',
	 * 			'file'     => 'script-filename-without-extension',
	 * 			'deps'     => array( 'jquery' ),
	 * 			'footer'   => true,
	 * 			'localize' => array(),
	 * 		),
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe_Plugin
	 * @var   array $scripts Array of scripts to enqueue.
	 */
	$scripts = array(
		'wphead' => array(
			'path'     => WIREFRAME_PLUGIN_JS,
			'file'     => 'wireframe-plugin-wphead-min',
			'deps'     => array( 'jquery' ),
			'footer'   => false,
			'localize' => array(),
		),
		'wpfooter' => array(
			'path'     => WIREFRAME_PLUGIN_JS,
			'file'     => 'wireframe-plugin-wpfooter-min',
			'deps'     => array( 'jquery' ),
			'footer'   => true,
			'localize' => array(),
		),
	);

	/**
	 * Load media modal.
	 *
	 * Some plugins may need to tap into the Media Modal.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe_Plugin
	 * @var   bool $media True loads wp_enqueue_media(). Default: false.
	 * @todo  WIP. Should we contextually enqueue media modal?
	 */
	$mediamodal = false;

	/**
	 * This object depends on the Core_Enqueue object, so we need to intantiate
	 * the Core_Enqueue object and pass-in parameters.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe_Plugin
	 * @var   object Core_Enqueue(
	 *        @param string     $prefix     Required prefix for handles.
	 *        @param array|null $styles     Optional styles.
	 *        @param array|null $scripts    Optional scripts.
	 *        @param bool|null  $mediamodal Optional media modal.
	 * )
	 */
	$enqueue = new Core_Enqueue( $prefix, $styles, $scripts, $mediamodal );

	/**
	 * Option #1: Return (array) of config data for passing into objects.
	 *
	 * Option #2: Cast array as an (object) and use object/property sytnax
	 *            vs array syntax. If you choose to cast this array as an (object),
	 *            then you will need to modify the syntax in your class files.
	 *
	 * PRO-TIP: Most of Wireframe's object properties are protected or private
	 * and should not be set outside of this config file. However, you may wish
	 * to use `apply_filters` or `wp_json_encode` or `add_setting` or `add_option`
	 * whenever appropriate. Consider Admin pages for modifying settings & options.
	 *
	 * @since  1.0.0 Wireframe
	 * @since  1.0.0 Wireframe_Plugin
	 * @return array|object
	 */
	return array(
		'wired'   => $wired,
		'prefix'  => $prefix,
		'actions' => $actions,
		'filters' => $filters,
		'enqueue' => $enqueue,
	);

} // Thanks for using MixaTheme products!
