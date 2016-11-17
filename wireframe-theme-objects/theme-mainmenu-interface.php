<?php
/**
 * Theme_Mainmenu_Interface is a Wireframe theme interface packaged with WP Wireframe Theme.
 *
 * PHP version 5.6.0
 *
 * @package   WP Wireframe Theme
 * @author    MixaTheme, Tada Burke
 * @version   1.0.0 WP Wireframe Theme
 * @copyright 2012-2016 MixaTheme
 * @license   GPL-2.0+
 * @see       https://mixatheme.com
 * @see       https://github.com/mixatheme/Wireframe
 *
 * WP Wireframe Theme is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with WP Wireframe Theme. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Namespace.
 *
 * @since 5.3.0 PHP
 * @since 1.0.0 WP Wireframe Theme
 */
namespace MixaTheme\WPWFT;

/**
 * No direct access to this file.
 *
 * @since 1.0.0 WP Wireframe Theme
 */
defined( 'ABSPATH' ) or die();

/**
 * Check if the class exists.
 *
 * @since 1.0.0 WP Wireframe Theme
 */
if ( ! class_exists( 'MixaTheme\WPWFT\Theme_Mainmenu_Interface' ) ) :
	/**
	 * Theme_Mainmenu_Interface contract for the primary nav menu.
	 *
	 * @since 2.9.0 WordPress
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 WP Wireframe Theme
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	interface Theme_Mainmenu_Interface {
		/**
		 * Set Primary menu.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 WP Wireframe Theme
		 * @see   set_theme_mod()
		 */
		public function set_primary();

		/**
		 * Get Primary menu.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 WP Wireframe Theme
		 * @see   get_theme_mod()
		 * @see   wp_nav_menu()
		 * @todo  Do we need a fallback?
		 */
		public function get_primary();

	} // Theme_Mainmenu_Interface.

endif; // Thanks for using MixaTheme products!
