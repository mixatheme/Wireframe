<?php
/**
 * Core_Module_Abstract is a Wireframe core abstract class.
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
 * @since 1.0.0 Wireframe Plugin
 */
defined( 'ABSPATH' ) or die();

/**
 * Check if the class exists.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe Theme
 * @since 1.0.0 Wireframe Child
 */
if ( ! class_exists( 'MixaTheme\Wireframe\Theme\Core_Module_Abstract' ) ) :
	/**
	 * Core_Module_Abstract is is a core theme contract for wiring actions & hooks.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @since 1.0.0 Wireframe Plugin
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	abstract class Core_Module_Abstract {
		/**
		 * Prefix.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
		 * @since  1.0.0 Wireframe Plugin
		 * @var    array $_prefix
		 */
		protected $_prefix = WIREFRAME_THEME_PREFIX;

		/**
		 * Wired.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
		 * @since  1.0.0 Wireframe Plugin
		 * @var    array $_wired
		 */
		protected $_wired = false;

		/**
		 * Actions.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
		 * @since  1.0.0 Wireframe Plugin
		 * @var    array $_actions
		 */
		protected $_actions = array();

		/**
		 * Filters.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
		 * @since  1.0.0 Wireframe Plugin
		 * @var    array $_filters
		 */
		protected $_filters = array();

		/**
		 * Constructor runs when this class instantiates.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 * @since 1.0.0 Wireframe Child
		 * @since 1.0.0 Wireframe Plugin
		 * @param array $config Data via config file.
		 */
		public function __construct( $config ) {

			// Declare default properties for this class and sub-classes.
			$this->_prefix  = $config['prefix'];
			$this->_wired   = $config['wired'];
			$this->_actions = $config['actions'];
			$this->_filters = $config['filters'];

			/**
			 * Most objects are not required to be wired (hooked) when instantiated.
			 * In your object config file(s), you can set the `$wired` value
			 * to true or false. If false, you can decouple any hooks and declare
			 * them elsewhere. If true, then objects fire hooks onload.
			 *
			 * Config data files are located in: `wireframe_dev/wireframe/config/`
			 */
			if ( isset( $this->_wired ) && true === $this->_wired ) {
				$this->wire_actions( $this->_actions );
				$this->wire_filters( $this->_filters );
			}
		}

		/**
		 * Get property.
		 *
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
		 * @since  1.0.0 Wireframe Plugin
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
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
		 * @since  1.0.0 Wireframe Plugin
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
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
		 * @since  1.0.0 Wireframe Plugin
		 * @param  array $filters Filters to hook.
		 */
		protected function wire_filters( $filters ) {
			if ( isset( $filters ) ) {
				foreach ( $filters as $key => $value ) {
					add_filter( $value['tag'], array( $this, $value['function'] ) );
				}
			}
		}

	} // Core_Module_Abstract.

endif; // Thanks for using MixaTheme products!
