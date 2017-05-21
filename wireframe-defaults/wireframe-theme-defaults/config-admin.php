<?php
/**
 * Theme_Admin config for modules built with Wireframe Suite for WordPress.
 *
 * PHP version 5.6.0
 *
 * @package   Wireframe Theme
 * @author    MixaTheme, Tada Burke
 * @version   1.0.0 Wireframe Theme
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
 * @since 1.0.0 Wireframe Theme
 * @since 1.0.0 Wireframe Child
 */
namespace MixaTheme\Wireframe\Theme;

/**
 * No direct access to this file.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe Theme
 * @since 1.0.0 Wireframe Child
 */
defined( 'ABSPATH' ) or die();

/**
 * Stores array of default config data for passing into objects.
 *
 * Option #1: We use a function so the config data can be called and reused
 *            easily when you neeed it.
 *
 * Option #2: Put your array data inside a Service closure (see wireframe.php).
 *            Another alternative is putting all your object configs into one
 *            single config file to minimize your file count.
 *
 * @since  1.0.0 Wireframe
 * @since  1.0.0 Wireframe Theme
 * @since  1.0.0 Wireframe Child
 * @see    object Theme_Admin
 * @return array  Default configuration values.
 */
function wireframe_theme_config_admin() {
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
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   bool $wired Wire hooks via __construct(). Default: true
	 */
	$wired = true;

	/**
	 * Prefix.
	 *
	 * Many objects use a prefix for various strings, handles, scripts, etc.
	 * Generally, you should use a constant defined in wireframe.php. However,
	 * you can change it here if needed. Default: WIREFRAME_THEME_PREFIX
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   string $prefix Prefix for handles.
	 */
	$prefix = WIREFRAME_THEME_PREFIX;

	/**
	 * Actions.
	 *
	 * Most objects will usually need actions to be hooked at some point.
	 * You can set your actions in a multi-dimensional array and remember
	 * to set the property $wired = true (above).
	 *
	 * Example theme page (in Appearance menu):
	 *
	 *		'theme_page' => array(
	 *			'tag'      => 'admin_menu',
	 *			'function' => 'theme_page',
	 *			'priority' => 10,
	 *			'args'     => 0,
	 *		),
	 *
	 * Example menu pages (in Admin menu):
	 *
	 * 		'menu_pages' => array(
	 * 			'tag'      => 'admin_menu',
	 * 			'function' => 'menu_pages',
	 * 			priority' => 10,
	 * 			'args'     => 1,
	 * 		),
	 * 		'submenu_pages' => array(
	 * 			'tag'      => 'admin_menu',
	 * 			'function' => 'submenu_pages',
	 * 			'priority' => 10,
	 * 			'args'     => 1,
	 * 		),
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
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
			'args'     => null,
		),
		'submenu_pages' => array(
			'tag'      => 'admin_menu',
			'function' => 'submenu_pages',
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
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   array $filters Filters to hook.
	 * @todo  WIP.
	 */
	$filters = array();

	/**
	 * Stylesheet(s) to load.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   array $styles Array of stylesheets to enqueue.
	 */
	$styles = array(
		'admin_css' => array(
			'path'    => WIREFRAME_THEME_CSS,
			'file'    => 'wireframe-theme-admin-min',
			'deps'    => array(),
			'version' => WIREFRAME_THEME_VERSION,
			'media'   => 'screen',

		),
	);

	/**
	 * Script(s) to load.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   array $scripts Array of scripts to enqueue.
	 */
	$scripts = array(
		'admin_js' => array(
			'path'     => WIREFRAME_THEME_JS,
			'file'     => 'wireframe-theme-admin-min',
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
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   bool $media True loads wp_enqueue_media(). Default: false.
	 * @todo  WIP. Should we contextually enqueue media modal?
	 */
	$mediamodal = false;

	/**
	 * This object depends on the Core_Enqueue object, so we need to intantiate
	 * the Core_Enqueue object and pass-in parameters.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   object Core_Enqueue(
	 *        @param string     $prefix     Required prefix for handles.
	 *        @param array|null $styles     Optional styles.
	 *        @param array|null $scripts    Optional scripts.
	 *        @param bool|null  $mediamodal Optional media modal.
	 * )
	 */
	$enqueue = new Core_Enqueue( $prefix, $styles, $scripts, $mediamodal );

	/**
	 * Theme page.
	 *
	 * Example:
	 *
	 * 		$theme_page = array(
	 * 			'quickstart' => array(
	 * 			'page_title' => WIREFRAME_THEME_PRODUCT,
	 * 			'menu_title' => WIREFRAME_THEME_PRODUCT,
	 * 			'capability' => 'manage_options',
	 * 			'menu_slug'  => sanitize_title( WIREFRAME_THEME_TEXTDOMAIN ),
	 * 			'function'   => 'wireframe_theme_admin_page_callback_quickstart',
	 * 		),
	 * 	);
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   array $menu_pages
	 */
	$theme_page = array();

	/**
	 * Top-level Admin pages.
	 *
	 * Note: Dependingn on the marketplace, they might have specific requirements
	 * where you can add a theme page or upsell your products. If you're submitting
	 * your theme to WordPress.org, you should probably use $theme_page (above).
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   array $menu_pages
	 */
	$menu_pages = array(
		'menu_pages' => array(
			'page_title' => WIREFRAME_THEME_PRODUCT,
			'menu_title' => WIREFRAME_THEME_PRODUCT,
			'capability' => 'manage_options',
			'menu_slug'  => sanitize_title( WIREFRAME_THEME_TEXTDOMAIN ),
			'function'   => 'wireframe_theme_admin_page_callback_quickstart',
			'icon_url'   => esc_url( '' ),
			'position'   => 8888,
		),
	);

	/**
	 * Submenu Admin pages.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   array $submenu_pages
	 * @see   https://wordpress.stackexchange.com/questions/66498
	 */
	$submenu_pages = array(
		'quickstart' => array(
			'parent_slug' => sanitize_title( WIREFRAME_THEME_TEXTDOMAIN ),
			'page_title'  => 'Quickstart',
			'menu_title'  => 'Quickstart',
			'capability'  => 'manage_options',
			'menu_slug'   => sanitize_title( WIREFRAME_THEME_TEXTDOMAIN ),
			'function'    => 'wireframe_theme_admin_page_callback_quickstart',
		),
		'faq' => array(
			'parent_slug' => sanitize_title( WIREFRAME_THEME_TEXTDOMAIN ),
			'page_title'  => 'FAQ',
			'menu_title'  => 'FAQ',
			'capability'  => 'manage_options',
			'menu_slug'   => sanitize_title( WIREFRAME_THEME_TEXTDOMAIN . '-faq' ),
			'function'    => 'wireframe_theme_admin_page_callback_faq',
		),
		'support' => array(
			'parent_slug' => sanitize_title( WIREFRAME_THEME_TEXTDOMAIN ),
			'page_title'  => 'Support',
			'menu_title'  => 'Support',
			'capability'  => 'manage_options',
			'menu_slug'   => sanitize_title( WIREFRAME_THEME_TEXTDOMAIN . '-support' ),
			'function'    => 'wireframe_theme_admin_page_callback_support',
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
	 * @since  1.0.0 Wireframe Theme
	 * @since  1.0.0 Wireframe Child
	 * @return array|object
	 */
	return array(
		'wired'         => $wired,
		'prefix'        => $prefix,
		'actions'       => $actions,
		'filters'       => $filters,
		'enqueue'       => $enqueue,
		'theme_page'    => $theme_page,
		'menu_pages'    => $menu_pages,
		'submenu_pages' => $submenu_pages,
	);

} // Thanks for using MixaTheme products!
