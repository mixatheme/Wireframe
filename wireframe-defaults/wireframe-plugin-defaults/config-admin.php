<?php
/**
 * Module_Admin config file for Wireframe themes & plugins.
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
 * @see    object Module_Admin
 * @return array  Default configuration values.
 */
function wireframe_plugin_config_admin() {
	/**
	 * Wired.
	 *
	 * Wires the Module_Admin actions & filters at runtime. Since all plugins
	 * & themes should have an admin/about page, this should always be set to true.
	 *
	 * Enable this configuration file:
	 *
	 * 		1. In this config file, set: $wired = true.
	 * 		2. In this config file, modify any default data you need.
	 * 		3. In `config-controller.php` instantiate Module_Admin.
	 * 		4. In `config-controller.php` pass this config into Module_Admin.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe_Plugin
	 * @var   bool $wired Wire hooks via __construct(). Default: true
	 */
	$wired = true;

	/**
	 * Prefix for handles.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe_Plugin
	 * @var   string $prefix Default: WIREFRAME_PLUGIN_PREFIX
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
			'tag'      => 'admin_enqueue_scripts',
			'function' => 'styles',
			'priority' => 10,
			'args'     => null,
		),
		'scripts' => array(
			'tag'      => 'admin_enqueue_scripts',
			'function' => 'scripts',
			'priority' => 10,
			'args'     => null,
		),
		'menu_pages' => array(
			'tag'      => 'admin_menu',
			'function' => 'menu_pages',
			'priority' => 10,
			'args'     => 1,
		),
		'submenu_pages' => array(
			'tag'      => 'admin_menu',
			'function' => 'submenu_pages',
			'priority' => 10,
			'args'     => 1,
		),
	);

	/**
	 * Filters to hook.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe_Plugin
	 * @var   array $filters Requires $enabled = true.
	 * @todo  WIP.
	 */
	$filters = array();

	/**
	 * Stylesheet(s) to load.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe_Plugin
	 * @var   array $styles Array of stylesheets to enqueue.
	 */
	$styles = array(
		'admin_css' => array(
			'path'    => WIREFRAME_PLUGIN_CSS,
			'file'    => 'wireframe-plugin-admin-min',
			'deps'    => array(),
			'version' => WIREFRAME_PLUGIN_VERSION,
			'media'   => 'screen',

		),
	);

	/**
	 * Script(s) to load.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe_Plugin
	 * @var   array $scripts Array of scripts to enqueue.
	 */
	$scripts = array(
		'admin_js' => array(
			'path'     => WIREFRAME_PLUGIN_JS,
			'file'     => 'wireframe-plugin-admin-min',
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
	 * Top-level Admin pages.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe_Plugin
	 * @var   array $menu_pages
	 */
	$menu_pages = array(
		'quickstart' => array(
			'page_title' => 'Wireframe Plugin',
			'menu_title' => 'Wireframe Plugin',
			'capability' => 'manage_options',
			'menu_slug'  => sanitize_title( WIREFRAME_PLUGIN_TEXTDOMAIN ),
			'callback'   => 'wireframe_plugin_admin_page_callback_quickstart',
			'icon_url'   => esc_url( '' ),
			'position'   => 9999,
		),
	);

	/**
	 * Submenu Admin pages.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe_Plugin
	 * @var   array $submenu_pages
	 * @see   https://wordpress.stackexchange.com/questions/66498
	 */
	$submenu_pages = array(
		'quickstart' => array(
			'parent_slug' => sanitize_title( WIREFRAME_PLUGIN_TEXTDOMAIN ),
			'page_title'  => 'Quickstart',
			'menu_title'  => 'Quickstart',
			'capability'  => 'manage_options',
			'menu_slug'   => sanitize_title( WIREFRAME_PLUGIN_TEXTDOMAIN ),
			'callback'    => 'wireframe_plugin_admin_page_callback_quickstart',
		),
		'faq' => array(
			'parent_slug' => sanitize_title( WIREFRAME_PLUGIN_TEXTDOMAIN ),
			'page_title'  => 'FAQ',
			'menu_title'  => 'FAQ',
			'capability'  => 'manage_options',
			'menu_slug'   => sanitize_title( WIREFRAME_PLUGIN_TEXTDOMAIN . '-faq' ),
			'callback'    => 'wireframe_plugin_admin_page_callback_faq',
		),
		'support' => array(
			'parent_slug' => sanitize_title( WIREFRAME_PLUGIN_TEXTDOMAIN ),
			'page_title'  => 'Support',
			'menu_title'  => 'Support',
			'capability'  => 'manage_options',
			'menu_slug'   => sanitize_title( WIREFRAME_PLUGIN_TEXTDOMAIN . '-support' ),
			'callback'    => 'wireframe_plugin_admin_page_callback_support',
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
		'wired'         => $wired,
		'prefix'        => $prefix,
		'actions'       => $actions,
		'filters'       => $filters,
		'enqueue'       => $enqueue,
		'menu_pages'    => $menu_pages,
		'submenu_pages' => $submenu_pages,
	);
}
