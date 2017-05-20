<?php
/**
 * Module_Shortcode is a Wireframe module.
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
 * No direct access to this file.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe_Plugin
 */
defined( 'ABSPATH' ) or die();

/**
 * Check if the class exists.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe_Plugin
 */
if ( ! class_exists( 'MixaTheme\Wireframe\Plugin\Module_Shortcode' ) ) :
	/**
	 * Module_Shortcode class for adding custom Shortcodes.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe_Plugin
	 * @see   https://codex.wordpress.org/Shortcode_API
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	final class Module_Shortcode extends Core_Module_Abstract implements Module_Shortcode_Interface {
		/**
		 * Defaults.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe_Plugin
		 * @var    array $_defaults
		 */
		private $_defaults;

		/**
		 * Constructor runs when this class is instantiated.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe_Plugin
		 * @param array $config Required array of config variables.
		 */
		public function __construct( $config ) {

			// Declare custom properties required for this class.
			$this->_defaults = $config['defaults'];

			// Get parent Constructor.
			parent::__construct( $config );
		}

		/**
		 * Get Defaults.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe_Plugin
		 */
		public function get_defaults() {
			if ( isset( $this->_defaults ) ) {
				return $this->_defaults;
			}
		}

		/**
		 * Register.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe_Plugin
		 * @todo  WIP. Needs work.
		 */
		public function register() {
			if ( isset( $this->_defaults ) ) {
				foreach ( $this->_defaults as $key => $value ) {
					add_shortcode( $key, array( $this, 'callback' ) );
				}
			}
		}

		/**
		 * Callback.
		 *
		 * @access protected
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe_Plugin
		 * @param array $atts Attributes.
		 * @todo  WIP. Needs work.
		 */
		public  function callback( $atts ) {
			// TODO.
		}

	} // Module_Shortcode.

endif; // Thanks for using MixaTheme products!
