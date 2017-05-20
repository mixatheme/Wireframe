<?php
/**
 * Module_Settings is a Wireframe module.
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
if ( ! class_exists( 'MixaTheme\Wireframe\Plugin\Module_Settings' ) ) :
	/**
	 * Module_Settings class for building custom Settings.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe_Plugin
	 * @see   https://codex.wordpress.org/Settings_API
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	final class Module_Settings extends Core_Module_Abstract implements Module_Settings_Interface {
		/**
		 * Sections.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe_Plugin
		 * @var    array $_sections
		 */
		private $_sections;

		/**
		 * Fields.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe_Plugin
		 * @var    array $_fields
		 */
		private $_fields;

		/**
		 * Register.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe_Plugin
		 * @var    array $_register
		 */
		private $_register;

		/**
		 * Constructor runs when this class is instantiated.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe_Plugin
		 * @param array $config Required array of config variables.
		 */
		public function __construct( $config ) {

			// Declare custom properties required for this class.
			$this->_sections = $config['sections'];
			$this->_fields   = $config['fields'];
			$this->_register = $config['register'];

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
		 * Add Settings.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe_Plugin
		 * @todo  WIP.
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
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe_Plugin
		 * @todo  WIP. Needs work.
		 */
		private function _register_sections() {
			if ( isset( $this->_sections ) ) {
				foreach ( $this->_sections as $key => $value ) {
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
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe_Plugin
		 * @todo  WIP. Needs work.
		 */
		private function _register_fields() {
			if ( isset( $this->_fields ) ) {
				foreach ( $this->_fields as $key => $value ) {
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
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe_Plugin
		 * @todo  WIP. Needs work.
		 */
		private function _register_settings() {
			if ( isset( $this->_register ) ) {
				foreach ( $this->_register as $key => $value ) {
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
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe_Plugin
		 * @todo  WIP. Needs work.
		 */
		public function unregister() {
			if ( isset( $this->_unregister ) ) {
				foreach ( $this->_unregister as $key => $value ) {
					unregister_setting(
						$value['option_group'],
						$value['option_name'],
						$value['sanitize_callback']
					);
				}
			}
		}

	} // Module_Settings.

endif; // Thanks for using MixaTheme products!
