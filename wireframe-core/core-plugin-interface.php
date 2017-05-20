<?php
/**
 * Core_Plugin_Interface is a Wireframe interface.
 *
 * PHP version 5.6.0
 *
 * @package   Wireframe_Plugin
 * @author    MixaTheme, Tada Burke
 * @version   1.0.0 Wireframe
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
 * @since  1.0.0 Wireframe
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
 * Check if the class exists.
 *
 * @since 1.0.0 Wireframe_Plugin
 */
if ( ! class_exists( 'MixaTheme\Wireframe\Plugin\Core_Plugin_Interface' ) ) :
	/**
	 * Core_Plugin_Interface core Wireframe contract for DI plugin objects.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe_Plugin
	 * @see   object Plugin
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	interface Core_Plugin_Interface {
		/**
		 * All plugins must register an activation hook.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe_Plugin
		 * @see   https://codex.wordpress.org/Function_Reference/register_activation_hook
		 */
		public function activate();

		/**
		 * All plugins must register a deactivation hook.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe_Plugin
		 * @see   https://codex.wordpress.org/Function_Reference/register_deactivation_hook
		 */
		public function deactivate();

		/**
		 * All plugins must register an uninstall hook.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe_Plugin
		 * @see   https://developer.wordpress.org/reference/functions/register_uninstall_hook
		 */
		public function uninstall();

		/**
		 * All plugins must be translatable with a language file.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe_Plugin
		 */
		public function language();

		/**
		 * All plugins must have an Admin screen of some kind.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe_Plugin
		 */
		public function admin();

	} // Core_Plugin_Interface.

endif; // Thanks for using MixaTheme products!
