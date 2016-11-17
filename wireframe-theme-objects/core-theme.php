<?php
/**
 * Core_Theme is a Wireframe core class packaged with WP Wireframe Theme.
 *
 * PHP version 5.6.0
 *
 * @package   WP Wireframe Theme
 * @author    MixaTheme, Tada Burke
 * @version   1.0.0 WP Wireframe Theme
 * @copyright 2012-2016 MixaTheme
 * @license   GPL-2.0+
 * @see       https://mixatheme.com
 * @see       https://github.com/mixatheme/Wireframe
 *
 * WP Wireframe Theme is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with WP Wireframe Theme. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Namespaces.
 *
 * @since 5.3.0 PHP
 * @since 1.0.0 WP Wireframe Theme
 */
namespace MixaTheme\WPWFT;

/**
 * No direct access to this file.
 *
 * @since 1.0.0 WP Wireframe Theme
 */
defined( 'ABSPATH' ) or die();

/**
 * Check if the class exists.
 *
 * @since 1.0.0 WP Wireframe Theme
 */
if ( ! class_exists( 'MixaTheme\WPWFT\Core_Theme' ) ) :
	/**
	 * Core_Theme is a core theme class for wiring theme circuits.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 WP Wireframe Theme
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	final class Core_Theme implements Core_Theme_Interface {
		/**
		 * Themes must wire a Language circuit.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 WP Wireframe Theme
		 * @var    object $_language
		 */
		private $_language;

		/**
		 * Themes must wire a Notices circuit.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 WP Wireframe Theme
		 * @var    object $_notices
		 */
		private $_notices;

		/**
		 * Themes must wire a UI circuit
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 WP Wireframe Theme
		 * @var    object $_ui
		 */
		private $_ui;

		/**
		 * Themes must wire a Mainmenu circuit.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 WP Wireframe Theme
		 * @var    object $_mainmenu
		 */
		private $_mainmenu;

		/**
		 * Themes must wire a Widgets circuit.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 WP Wireframe Theme
		 * @var    object $_widgets
		 */
		private $_widgets;

		/**
		 * Themes must wire a Features circuit.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 WP Wireframe Theme
		 * @var    object $_features
		 */
		private $_features;

		/**
		 * Themes can optionally wire a Customizer circuit.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 WP Wireframe Theme
		 * @var    object $_customizer
		 */
		private $_customizer;

		/**
		 * Themes can optionally wire an Editor circuit.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 WP Wireframe Theme
		 * @var    object $_editor
		 */
		private $_editor;

		/**
		 * Themes can optionally wire an Admin circuit.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 WP Wireframe Theme
		 * @var    object $_admin
		 */
		private $_admin;

		/**
		 * Constructor runs when this class is instantiated.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 WP Wireframe Theme
		 * @param object $language   Core_Language_Interface.
		 * @param object $notices    Theme_Notices_Interface.
		 * @param object $ui         Theme_UI_Interface.
		 * @param object $mainmenu   Theme_Mainmenu_Interface.
		 * @param object $widgets    Theme_Widgets_Interface.
		 * @param object $features   Theme_Features_Interface.
		 * @param object $customizer Theme_Customizer_Interface.
		 * @param object $editor     Theme_Editor_Interface.
		 * @param object $admin      Theme_Admin_Interface.
		 *
		 * @internal WPCS may throw `Unknown type hint` for DI objects.
		 */
		public function __construct( Core_Language_Interface $language, Theme_Notices_Interface $notices, Theme_UI_Interface $ui, Theme_Mainmenu_Interface $mainmenu, Theme_Widgets_Interface $widgets, Theme_Features_Interface $features, Theme_Customizer_Interface $customizer = null, Theme_Editor_Interface $editor = null, Theme_Admin_Interface $admin = null ) {

			// Default properties required for this class.
			$this->_language   = $language;
			$this->_notices    = $notices;
			$this->_ui         = $ui;
			$this->_mainmenu   = $mainmenu;
			$this->_widgets    = $widgets;
			$this->_features   = $features;
			$this->_customizer = $customizer;
			$this->_editor     = $editor;
			$this->_admin      = $admin;
		}

		/**
		 * Get Language.
		 *
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 WP Wireframe Theme
		 * @return object $_language
		 */
		public function language() {
			if ( isset( $this->_language ) ) {
				return $this->_language;
			}
		}

		/**
		 * Get Notices.
		 *
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 WP Wireframe Theme
		 * @return object $_notices
		 */
		public function notices() {
			if ( isset( $this->_notices ) ) {
				return $this->_notices;
			}
		}

		/**
		 * Get UI.
		 *
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 WP Wireframe Theme
		 * @return object $_ui
		 */
		public function ui() {
			if ( isset( $this->_ui ) ) {
				return $this->_ui;
			}
		}

		/**
		 * Get Mainmenu.
		 *
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 WP Wireframe Theme
		 * @return object $_mainmenu
		 */
		public function mainmenu() {
			if ( isset( $this->_mainmenu ) ) {
				return $this->_mainmenu;
			}
		}

		/**
		 * Get Widgets.
		 *
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 WP Wireframe Theme
		 * @return object $_widgets
		 */
		public function widgets() {
			if ( isset( $this->_widgets ) ) {
				return $this->_widgets;
			}
		}

		/**
		 * Get Features.
		 *
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 WP Wireframe Theme
		 * @return object $_features
		 */
		public function features() {
			if ( isset( $this->_features ) ) {
				return $this->_features;
			}
		}

		/**
		 * Get Customizer.
		 *
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 WP Wireframe Theme
		 * @return object $_customizer
		 */
		public function customizer() {
			if ( isset( $this->_customizer ) ) {
				return $this->_customizer;
			}
		}

		/**
		 * Get Editor.
		 *
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 WP Wireframe Theme
		 * @return object $_editor
		 */
		public function editor() {
			if ( isset( $this->_editor ) ) {
				return $this->_editor;
			}
		}

		/**
		 * Get Admin.
		 *
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 WP Wireframe Theme
		 * @return object $_admin
		 */
		public function admin() {
			if ( isset( $this->_admin ) ) {
				return $this->_admin;
			}
		}

	} // Core_Theme.

endif; // Thanks for using MixaTheme products!
