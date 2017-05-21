<?php
/**
 * Module_Settings config file for Wireframe themes & plugins.
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
 * @see    object Module_Settings
 * @return array  Default configuration values.
 */
function wireframe_plugin_config_settings() {
	/**
	 * Wired.
	 *
	 * Wires the Module_Settings actions & filters at runtime.
	 *
	 * Enable this configuration file:
	 *
	 * 		1. In this config file, set: $wired = true.
	 * 		2. In this config file, modify any default data you need.
	 * 		3. In `config-controller.php` instantiate Module_Settings.
	 * 		4. In `config-controller.php` pass this config into Module_Settings.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe_Plugin
	 * @var   bool $wired Wire hooks via __construct(). Default: false
	 */
	$wired = false;

	/**
	 * Prefix for handles.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe_Plugin
	 * @var   string $prefix Default: WIREFRAME_PLUGIN_PREFIX
	 */
	$prefix = WIREFRAME_PLUGIN_PREFIX;

	/**
	 * Actions to hook.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe_Plugin
	 * @var   array $actions Requires $enabled = true.
	 */
	$actions = array(
		'example_setting' => array(
			'tag'      => 'admin_init',
			'function' => 'add_settings',
			'priority' => 10,
			'args'     => null,
		),
	);

	/**
	 * Filters to hook.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe_Plugin
	 * @var   array $filters Requires $enabled = true. Default: array()
	 * @todo  WIP.
	 */
	$filters = array();

	/**
	 * Sections.
	 *
	 * Add the section to reading settings so we can add our fields to it.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe_Plugin
	 * @var   array
	 */
	$sections = array(
		'example_setting' => array(
			'id'       => 'eg_setting_section',
			'title'    => 'Example settings section in reading',
			'callback' => 'eg_setting_section_callback_function',
			'page'     => 'reading',
		),
	);

	/**
	 * Fields.
	 *
	 * Add the field with the names and function to use for our new
	 * settings, put it in our new section.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe_Plugin
	 * @var   array
	 */
	$fields = array(
		'example_setting' => array(
			'id'       => 'eg_setting_name',
			'title'    => 'Example setting Name',
			'callback' => 'eg_setting_callback_function',
			'page'     => 'eg_setting_section',
			'section'  => 'default',
			'args'     => array(),
		),
	);

	/**
	 * Register.
	 *
	 * Register our setting so that $_POST handling is done for us and
	 * our callback function just has to echo the <input>
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe_Plugin
	 * @var   array
	 */
	$register = array(
		'example_setting' => array(
			'option_group'      => 'reading',
			'option_name'       => 'eg_setting_name',
			'sanitize_callback' => '',
		),
	);

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
		'wired'    => $wired,
		'prefix'   => $prefix,
		'actions'  => $actions,
		'filters'  => $filters,
		'sections' => $sections,
		'fields'   => $fields,
		'register' => $register,
	);
}
