<?php
/**
 * Core_Plugin is a Wireframe class.
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
if ( ! class_exists( 'MixaTheme\Wireframe\Plugin\Core_Plugin' ) ) :
	/**
	 * Core_Plugin core Wireframe class for DI plugin objects.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe_Plugin
	 * @see   object Theme
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	final class Core_Plugin implements Core_Plugin_Interface {
		/**
		 * Plugins must wire Core_Language.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe_Plugin
		 * @var    object $_language Required.
		 */
		private $_language;

		/**
		 * Plugins must wire Module_Admin.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe_Plugin
		 * @var    object $_admin Required.
		 */
		private $_admin;

		/**
		 * Notices object.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe_Plugin
		 * @var    object $_notices Optional.
		 */
		private $_notices;

		/**
		 * Taxonomy object.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe_Plugin
		 * @var    object $_taxonomy Optional.
		 */
		private $_taxonomy;

		/**
		 * CPT object.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe_Plugin
		 * @var    object $_cpt Optional.
		 */
		private $_cpt;

		/**
		 * Shortcode object.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe_Plugin
		 * @var    object $_shortcode Optional.
		 */
		private $_shortcode;

		/**
		 * Options object.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe_Plugin
		 * @var    object $_options Optional.
		 */
		private $_options;

		/**
		 * Settings object.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe_Plugin
		 * @var    object $_settings Optional.
		 */
		private $_settings;

		/**
		 * UI object.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe_Plugin
		 * @var    object $_ui Optional.
		 */
		private $_ui;

		/**
		 * DBTables object.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe_Plugin
		 * @var    object $_dbtables Optional.
		 */
		private $_dbtables;

		/**
		 * Constructor runs when this class is instantiated.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe_Plugin
		 * @param object $language  Core_Language_Interface.
		 * @param object $admin     Module_Admin_Interface.
		 * @param object $notices   Module_Notices_Interface.
		 * @param object $cpt       Module_CPT_Interface.
		 * @param object $taxonomy  Module_Taxonomy_Interface.
		 * @param object $shortcode Module_Shortcode_Interface.
		 * @param object $options   Module_Options_Interface.
		 * @param object $settings  Module_Settings_Interface.
		 * @param object $ui        Module_UI_Interface.
		 * @param object $dbtables  Module_DBTables_Interface.
		 *
		 * @internal WPCS may throw `Unknown type hint` for DI objects.
		 */
		public function __construct( Core_Language_Interface $language, Module_Admin_Interface $admin, Module_Notices_Interface $notices = null, Module_CPT_Interface $cpt = null, Module_Taxonomy_Interface $taxonomy = null, Module_Shortcode_Interface $shortcode = null, Module_Options_Interface $options = null, Module_Settings_Interface $settings = null, Module_UI_Interface $ui = null, Module_DBTables_Interface $dbtables = null ) {

			// Default properties required for this class.
			$this->_language  = $language;
			$this->_admin     = $admin;
			$this->_notices   = $notices;
			$this->_cpt       = $cpt;
			$this->_taxonomy  = $taxonomy;
			$this->_shortcode = $shortcode;
			$this->_options   = $options;
			$this->_settings  = $settings;
			$this->_ui        = $ui;
			$this->_dbtables  = $dbtables;
		}

		/**
		 * Activate.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe_Plugin
		 */
		public function activate() {}

		/**
		 * Deactivate.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe_Plugin
		 */
		public function deactivate() {}

		/**
		 * Uninstall.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe_Plugin
		 */
		public function uninstall() {}

		/**
		 * Get Language.
		 *
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe_Plugin
		 * @return object $_language
		 */
		public function language() {
			if ( isset( $this->_language ) ) {
				return $this->_language;
			}
		}

		/**
		 * Get Admin.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe_Plugin
		 */
		public function admin() {
			if ( isset( $this->_admin ) ) {
				return $this->_admin;
			}
		}

		/**
		 * Get Notices.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe_Plugin
		 */
		public function notices() {
			if ( isset( $this->_notices ) ) {
				return $this->_notices;
			}
		}

		/**
		 * Get CPT.
		 *
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe_Plugin
		 * @return object $_cpt
		 */
		public function cpt() {
			if ( isset( $this->_cpt ) ) {
				return $this->_cpt;
			}
		}

		/**
		 * Get Taxonomy.
		 *
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe_Plugin
		 * @return object $_taxonomy
		 */
		public function taxonomy() {
			if ( isset( $this->_taxonomy ) ) {
				return $this->_taxonomy;
			}
		}

		/**
		 * Get Shortcode.
		 *
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe_Plugin
		 * @return object $_shortcode
		 */
		public function shortcode() {
			if ( isset( $this->_shortcode ) ) {
				return $this->_shortcode;
			}
		}

		/**
		 * Get Options.
		 *
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe_Plugin
		 * @return object $_options
		 */
		public function options() {
			if ( isset( $this->_options ) ) {
				return $this->_options;
			}
		}

		/**
		 * Get Settings.
		 *
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe_Plugin
		 * @return object $_settings
		 */
		public function settings() {
			if ( isset( $this->_settings ) ) {
				return $this->_settings;
			}
		}

		/**
		 * Get UI.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe_Plugin
		 */
		public function ui() {
			if ( isset( $this->_ui ) ) {
				return $this->_ui;
			}
		}

		/**
		 * Get DBTables.
		 *
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe_Plugin
		 * @return object $_dbtables
		 */
		public function dbtables() {
			if ( isset( $this->_dbtables ) ) {
				return $this->_dbtables;
			}
		}

		/**
		 * Create DB Tables.
		 *
		 * Checks if the DBTables object is instantiated with SQl statement(s)
		 * passed-in, then creates database tables. If the DBTables object is not
		 * instantiated or missing a valid SQL statement, no tables are created.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe_Plugin
		 * @see    object DBTables
		 * @see    wireframe_plugin_config_controller()
		 * @todo   WIP. Needs work.
		 */
		private function _create_dbtables() {
			if ( isset( $this->_dbtables ) && null !== $this->_dbtables->get_defaults() ) {
				foreach ( $this->_dbtables->get_defaults() as $id => $sql ) {
					$this->_dbtables->create( $id, $sql );
				}
			}
		}

		/**
		 * Drop DB Tables.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe_Plugin
		 * @see    object DBTables
		 * @see    wireframe_plugin_config_controller()
		 * @todo   WIP. Needs work.
		 */
		private function _drop_dbtables() {
			if ( isset( $this->_dbtables ) && null !== $this->_dbtables->get_defaults() ) {
				foreach ( $this->_dbtables->get_defaults() as $id => $sql ) {
					$this->_dbtables->drop( $id, $sql );
				}
			}
		}

	} // Core_Plugin.

endif; // Thanks for using MixaTheme products!
