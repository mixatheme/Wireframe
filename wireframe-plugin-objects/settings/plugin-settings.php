<?php
/**
 * Plugin_Settings is a Wireframe module.
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
if ( ! class_exists( 'MixaTheme\Wireframe\Plugin\Plugin_Settings' ) ) :
	/**
	 * Plugin_Settings is a Wireframe_Plugin class.
	 *
	 * @since 1.0.0 Wireframe_Plugin
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	final class Plugin_Settings extends Core_Module_Abstract implements Plugin_Settings_Interface {
		/**
		 * Sections.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe_Plugin
		 * @var    array $sections
		 */
		protected $sections;

		/**
		 * Fields.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe_Plugin
		 * @var    array $fields
		 */
		protected $fields;

		/**
		 * Register.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe_Plugin
		 * @var    array $register
		 */
		protected $register;

		/**
		 * Constructor runs when this class is instantiated.
		 *
		 * @since 1.0.0 Wireframe_Plugin
		 * @param array $config Required array of config variables.
		 */
		public function __construct( $config ) {

			// Custom properties required for this class.
			$this->sections = $config['sections'];
			$this->fields   = $config['fields'];
			$this->register = $config['register'];

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
		 * Add Settings.
		 *
		 * @since 1.0.0 Wireframe_Plugin
		 */
		public function add_settings() {
			$this->_register_sections();
			$this->_register_fields();
			$this->_register_settings();
		}

		/**
		 * Register Sections.
		 *
		 * Add the section to reading settings so we can add our fields to it.
		 *
		 * @since 1.0.0 Wireframe_Plugin
		 */
		private function _register_sections() {
			if ( isset( $this->sections ) ) {
				foreach ( $this->sections as $key => $value ) {
					add_settings_section(
						$value['id'],
						$value['title'],
						$value['callback'],
						$value['page']
					);
				}
			}
		}

		/**
		 * Register Fields.
		 *
		 * Add the field with the names and function to use for our new
		 * settings, put it in our new section.
		 *
		 * @since 1.0.0 Wireframe_Plugin
		 */
		private function _register_fields() {
			if ( isset( $this->fields ) ) {
				foreach ( $this->fields as $key => $value ) {
					add_settings_field(
						$value['id'],
						$value['title'],
						$value['callback'],
						$value['page'],
						$value['section'],
						$value['args']
					);
				}
			}
		}

		/**
		 * Register Settings.
		 *
		 * Register our setting so that $_POST handling is done for us and
		 * our callback function just has to echo the <input>.
		 *
		 * @since 1.0.0 Wireframe_Plugin
		 */
		private function _register_settings() {
			if ( isset( $this->register ) ) {
				foreach ( $this->register as $key => $value ) {
					register_setting(
						$value['option_group'],
						$value['option_name'],
						$value['sanitize_callback']
					);
				}
			}
		}

		/**
		 * Unregister Settings.
		 *
		 * @since 1.0.0 Wireframe_Plugin
		 */
		public function unregister() {
			if ( isset( $this->unregister ) ) {
				foreach ( $this->unregister as $key => $value ) {
					unregister_setting(
						$value['option_group'],
						$value['option_name'],
						$value['sanitize_callback']
					);
				}
			}
		}

	} // Settings.

endif; // Thanks for using MixaTheme products!
