<?php
/**
 * Module_Walker_BS3_Interface is a Wireframe module interface.
 *
 * PHP version 5.6.0
 *
 * @package   Wireframe Child
 * @author    MixaTheme, Tada Burke
 * @version   1.0.0 Wireframe Child
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
 * @since 1.0.0 Wireframe Child
 */
namespace MixaTheme\Wireframe\Theme;

/**
 * No direct access to this file.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe Child
 */
defined( 'ABSPATH' ) or die();

/**
 * Check if the class exists.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe Child
 */
if ( ! class_exists( 'MixaTheme\Wireframe\Theme\Module_Walker_BS3_Interface' ) ) :
	/**
	 * Module_Walker_BS3_Interface contract for nav menus.
	 *
	 * @since 2.9.0 WordPress
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Child
	 * @see   https://github.com/mixatheme/Wireframe
	 * @see   http://wordpress.stackexchange.com/questions/197060
	 */
	interface Module_Walker_BS3_Interface {
		/**
		 * Starts the UL before the elements are added.
		 *
		 * @since 3.0.0 WordPress
		 * @since 1.0.0 Wireframe Child
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param int    $depth  Depth of menu item. Used for padding.
		 * @param array  $args   An array of arguments. @see wp_nav_menu().
		 */
		public function start_lvl( &$output, $depth = 0, $args = array() );

		/**
		 * Set Primary menu.
		 *
		 * @since 3.0.0 WordPress
		 * @since 4.4.0 WordPress 'nav_menu_item_args' filter was added.
		 * @since 1.0.0 Wireframe Child
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param object $item    Menu item data object.
		 * @param int    $depth   Depth of menu item. Used for padding.
		 * @param array  $args    An array of arguments. @see wp_nav_menu().
		 * @param int    $id      Current item ID.
		 */
		public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 );

	} // Module_Walker_BS3_Interface.

endif; // Thanks for using MixaTheme products!
