<?php
/**
 * Plugin_Shortcode is a Wireframe module.
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
 * @since 1.0.0 Wireframe_Plugin
 */
namespace MixaTheme\Wireframe\Plugin;

/**
 * No direct access to this file.
 *
 * @since 1.0.0 Wireframe_Plugin
 */
defined( 'ABSPATH' ) or die();

/**
 * Check if the class exists.
 *
 * @since 1.0.0 Wireframe_Plugin
 */
if ( ! class_exists( 'MixaTheme\Wireframe\Plugin\Plugin_Shortcode' ) ) :
	/**
	 * Plugin_Shortcode is a Wireframe_Plugin class.
	 *
	 * @since 1.0.0 Wireframe_Plugin
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	final class Plugin_Shortcode extends Core_Module_Abstract implements Plugin_Shortcode_Interface {
		/**
		 * Config.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe_Plugin
		 * @var    array $_config
		 */
		private $_config;

		/**
		 * Constructor runs when this class is instantiated.
		 *
		 * @since 1.0.0 Wireframe_Plugin
		 * @param array $config Required array of config variables.
		 */
		public function __construct( $config ) {

			// Custom properties required for this class.
			$this->defaults = $config['defaults'];

			// Default properties via Wireframe abstract class.
			$this->wired    = $config['wired'];
			$this->prefix   = $config['prefix'];
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
			if ( isset( $this->wired ) && true === $this->wired ) {
				$this->wire_actions( $this->_actions );
				$this->wire_filters( $this->_filters );
			}
		}

		/**
		 * Get Defaults.
		 *
		 * @since 1.0.0 Wireframe_Plugin
		 */
		public function get_defaults() {
			if ( isset( $this->defaults ) ) {
				return $this->defaults;
			}
		}

		/**
		 * Register.
		 *
		 * @since 1.0.0 Wireframe_Plugin
		 */
		public function register() {}

	} // Shortcode.

endif; // Thanks for using MixaTheme products!
