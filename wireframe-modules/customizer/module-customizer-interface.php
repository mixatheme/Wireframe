<?php
/**
 * Module_Customizer_Interface is a Wireframe module interface.
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
 * Namespace.
 *
 * @since 5.3.0 PHP
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe Theme
 */
namespace MixaTheme\Wireframe\Theme;

/**
 * No direct access to this file.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe Theme
 */
defined( 'ABSPATH' ) or die();

/**
 * Check if the class exists.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe Theme
 */
if ( ! class_exists( 'MixaTheme\Wireframe\Theme\Module_Customizer_Interface' ) ) :
	/**
	 * Module_Customizer_Interface contract for previewing front-end modifications.
	 *
	 * Security Reminder: If you are saving any data to the Database, you should
	 * validate and/or sanitize untrusted data before entering into the database.
	 * All untrusted data should be escaped before output.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @see   https://codex.wordpress.org/Theme_Customization_API
	 * @see   https://github.com/mixatheme/Wireframe
	 *
	 * @internal Thanks: Weston Ruter, Otto, et al.
	 */
	interface Module_Customizer_Interface {
		/**
		 * Register.
		 *
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @since 3.4.0 WordPress introduced `customize_register` action.
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 * @param object $wp_customize WP_Customize_Manager.
		 */
		public function register( $wp_customize );

		/**
		 * Preview scripts.
		 *
		 * Instantiates a new Enqueue object for the `preview-scripts.js` file.
		 * This also demonstrates how Wireframe Theme implements OOP reusable code.
		 *
		 * The `preview-scripts.js` file binds JS handlers to make Customizer
		 * reload changes asynchronously. Any transport `postMessage` setting
		 * you make available to Live Preview must also be added to the
		 * `preview-scripts.js` file.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 */
		public function preview_scripts();

		/**
		 * Header Output.
		 *
		 * This will output the custom WordPress settings to the live theme's
		 * WP head. If you add new settings with 'postMessage' for Live Preview,
		 * you need to add a new line of dynamically generated CSS here.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 * @see   add_action('wp_head')
		 * @see   $this->css()
		 * @todo  Generated CSS should be decoupled in @version 1.0.1.
		 *
		 * @internal Thanks: WordPress Codex, Otto.
		 */
		public function header_output();

		/**
		 * CSS Generator.
		 *
		 * This will generate a line of CSS for use in header output. If the
		 * setting ($mod_name) has no defined value, the CSS will not be output.
		 *
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @see    get_theme_mod()
		 * @param  string $selector CSS selector.
		 * @param  string $style    The name of the CSS *property* to modify.
		 * @param  string $mod_name The name of the 'theme_mod' option to fetch.
		 * @param  string $prefix   Optional. Anything that needs to be output before the CSS property.
		 * @param  string $postfix  Optional. Anything that needs to be output after the CSS property.
		 * @param  bool   $echo     Optional. Whether to print directly to the page (default: true).
		 * @return string $output   Returns a single line of CSS with selectors and a property.
		 *
		 * @internal Thanks: WordPress Codex, Otto.
		 */
		public function css( $selector, $style, $mod_name, $prefix = '', $postfix = '', $echo = true );

	} // Module_Customizer_Interface.

endif; // Thanks for using MixaTheme products!
