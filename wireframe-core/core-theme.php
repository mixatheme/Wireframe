<?php
/**
 * Core_Theme is a Wireframe core class.
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
 */
defined( 'ABSPATH' ) or die();

/**
 * Check if the class exists.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe Theme
 * @since 1.0.0 Wireframe Child
 */
if ( ! class_exists( 'MixaTheme\Wireframe\Theme\Core_Theme' ) ) :
	/**
	 * Core_Theme is a core theme class for wiring theme objects.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	final class Core_Theme implements Core_Theme_Interface {
		/**
		 * Themes must wire Core_Language.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
		 * @var    object $_language
		 */
		private $_language;

		/**
		 * Themes must wire Theme_Notices.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
		 * @var    object $_notices
		 */
		private $_notices;

		/**
		 * Themes must wire Theme_UI.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
		 * @var    object $_ui
		 */
		private $_ui;

		/**
		 * Themes must wire Theme_Navigation.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
		 * @var    object $_navigation
		 */
		private $_navigation;

		/**
		 * Themes must wire Theme_Widgets.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
		 * @var    object $_widgets
		 */
		private $_widgets;

		/**
		 * Themes must wire Theme_Features.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
		 * @var    object $_features
		 */
		private $_features;

		/**
		 * Themes can optionally wire Theme_Customizer.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
		 * @var    object $_customizer
		 */
		private $_customizer;

		/**
		 * Themes can optionally wire Theme_Editor.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
		 * @var    object $_editor
		 */
		private $_editor;

		/**
		 * Themes can optionally wire Theme_Admin.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
		 * @var    object $_admin
		 */
		private $_admin;

		/**
		 * Constructor runs when this class is instantiated.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 * @since 1.0.0 Wireframe Child
		 * @param object $language   Core_Language_Interface.
		 * @param object $notices    Module_Notices_Interface.
		 * @param object $ui         Module_UI_Interface.
		 * @param object $navigation Module_Navigation_Interface.
		 * @param object $widgets    Module_Widgets_Interface.
		 * @param object $features   Module_Features_Interface.
		 * @param object $customizer Module_Customizer_Interface.
		 * @param object $editor     Module_Editor_Interface.
		 * @param object $admin      Module_Admin_Interface.
		 *
		 * @internal WPCS may throw `Unknown type hint` for DI objects.
		 */
		public function __construct( Core_Language_Interface $language, Module_Notices_Interface $notices, Module_UI_Interface $ui, Module_Navigation_Interface $navigation, Module_Widgets_Interface $widgets, Module_Features_Interface $features, Module_Customizer_Interface $customizer = null, Module_Editor_Interface $editor = null, Module_Admin_Interface $admin = null ) {

			// Default properties required for this class.
			$this->_language   = $language;
			$this->_notices    = $notices;
			$this->_ui         = $ui;
			$this->_navigation = $navigation;
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
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
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
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
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
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
		 * @return object $_ui
		 */
		public function ui() {
			if ( isset( $this->_ui ) ) {
				return $this->_ui;
			}
		}

		/**
		 * Get Navigation.
		 *
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
		 * @return object $_navigation
		 */
		public function navigation() {
			if ( isset( $this->_navigation ) ) {
				return $this->_navigation;
			}
		}

		/**
		 * Get Widgets.
		 *
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
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
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
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
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
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
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
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
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
		 * @return object $_admin
		 */
		public function admin() {
			if ( isset( $this->_admin ) ) {
				return $this->_admin;
			}
		}

	} // Core_Theme.

endif; // Thanks for using MixaTheme products!
