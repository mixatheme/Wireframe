<?php
/**
 * Core_Enqueue_Interface is a Wireframe core interface.
 *
 * PHP version 5.6.0
 *
 * @package   Wireframe
 * @author    MixaTheme, Tada Burke
 * @version   1.0.0 Wireframe
 * @copyright 2012-2016 MixaTheme
 * @license   GPL-2.0+
 * @see       https://mixatheme.com
 * @see       https://github.com/mixatheme/Wireframe
 *
 * Wireframe is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Wireframe. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Namespaces.
 *
 * @since 5.3.0 PHP
 * @since 1.0.0 Wireframe
 */
namespace MixaTheme\WPWFT;

/**
 * No direct access to this file.
 *
 * @since 1.0.0 Wireframe
 */
defined( 'ABSPATH' ) or die();

/**
 * Check if the class exists.
 *
 * @since 1.0.0 Wireframe
 */
if ( ! class_exists( 'MixaTheme\WPWFT\Core_Enqueue_Interface' ) ) :
	/**
	 * Core_Enqueue_Interface is a core theme contract for loading styles & scripts
	 *
	 * @since 1.0.0 Wireframe
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	interface Core_Enqueue_Interface {
		/**
		 * Enqueue the custom CSS files passed via functions.php.
		 *
		 * @since 1.0.0 Wireframe
		 * @see   wpwft_version() Optional WP_DEBUG helper.
		 */
		public function styles();

		/**
		 * Enqueue any custom JS files passed in.
		 *
		 * @since 1.0.0 Wireframe
		 * @see   wpwft_version() Optional WP_DEBUG helper.
		 * @see   https://codex.wordpress.org/Function_Reference/wp_localize_script
		 */
		public function scripts();

		/**
		 * Enqueue the Media modal script.
		 *
		 * @since 1.0.0 Wireframe
		 * @todo  Should this be enqueued contextually somehow?
		 */
		public function mediamodal();

		/**
		 * Enqueue the main style.css stylesheet.
		 *
		 * @since 1.0.0 Wireframe
		 */
		public function stylecss();

		/**
		 * Enqueue the main `comment-reply` script.
		 *
		 * @since 1.0.0 Wireframe
		 */
		public function commentjs();

	} // Core_Enqueue_Interface.

endif; // Thanks for using MixaTheme products!