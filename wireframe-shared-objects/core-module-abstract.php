<?php
/**
 * Core_Module_Abstract is a Wireframe abstract core class.
 *
 * PHP version 5.6.0
 *
 * @package   Wireframe_Theme
 * @author    MixaTheme, Tada Burke
 * @version   1.0.0 Wireframe_Theme
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
 * @since 1.0.0 Wireframe_Theme
 */
namespace MixaTheme\Wireframe\Theme;

/**
 * No direct access to this file.
 *
 * @since 1.0.0 Wireframe_Theme
 */
defined( 'ABSPATH' ) or die();

/**
 * Check if the class exists.
 *
 * @since 1.0.0 Wireframe_Theme
 */
if ( ! class_exists( 'MixaTheme\Wireframe\Theme\Core_Module_Abstract' ) ) :
	/**
	 * Core_Module_Abstract is is a core theme contract for wiring actions & hooks.
	 *
	 * @since 1.0.0 Wireframe_Theme
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	abstract class Core_Module_Abstract {
		/**
		 * Wired.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe_Theme
		 * @var    bool $wired
		 */
		protected $wired;

		/**
		 * Prefix.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe_Theme
		 * @var    string $prefix
		 */
		protected $prefix;

		/**
		 * Actions.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $_actions
		 */
		private $_actions;

		/**
		 * Filters.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $_filters
		 */
		private $_filters;

		/**
		 * Get property.
		 *
		 * @since  1.0.0 Wireframe_Theme
		 * @param  string $var Property to get.
		 */
		public function get( $var ) {
			if ( isset( $var ) ) {
				return $this->$var;
			}
		}

		/**
		 * Wire Actions.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe_Theme
		 * @param  array $actions Actions to hook.
		 */
		protected function wire_actions( $actions ) {
			if ( isset( $actions ) ) {
				foreach ( $actions as $key => $value ) {
					add_action( $value['tag'], array( $this, $value['function'] ) );
				}
			}
		}

		/**
		 * Wire Filters.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe_Theme
		 * @param  array $filters Filters to hook.
		 */
		protected function wire_filters( $filters ) {
			if ( isset( $filters ) ) {
				foreach ( $filters as $key => $value ) {
					add_filter( $value['tag'], array( $this, $value['function'] ) );
				}
			}
		}

	} // Wireframe.

endif; // Thanks for using MixaTheme products!
