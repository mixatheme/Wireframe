<?php
/**
 * Theme_Widgets is a Wireframe theme class packaged with WPWWireframe ThemeFT.
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
if ( ! class_exists( 'MixaTheme\Wireframe\Theme\Theme_Widgets' ) ) :
	/**
	 * Theme_Widgets is a theme class for wiring sidebars & widgets.
	 *
	 * If you create a custom widget sub-class, be advised that Wireframe Theme
	 * supports `Selective Refresh` by default. However, your custom widgets
	 * must be declared using: 'customize_selective_refresh' => true
	 *
	 * @example https://developer.wordpress.org/themes/advanced-topics/customizer-api/#widget-support
	 *
	 * @since 1.0.0 Wireframe_Theme
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	final class Theme_Widgets extends Core_Module_Abstract implements Theme_Widgets_Interface {
		/**
		 * Registered.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $_registered Regisered widgets.
		 */
		private $_registered;

		/**
		 * Unregistered.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $_unregistered Unregistered widgets.
		 */
		private $_unregistered;

		/**
		 * Constructor runs when this class is instantiated.
		 *
		 * @since 1.0.0 Wireframe_Theme
		 * @param array $config Config data.
		 */
		public function __construct( $config ) {

			// Declare custom properties required for this class.
			$this->_registered   = $config['registered'];
			$this->_unregistered = $config['unregistered'];

			// Get parent Constructor.
			parent::__construct( $config );
		}

		/**
		 * Register Widgets.
		 *
		 * @since 1.0.0 Wireframe_Theme
		 */
		public function register() {
			if ( isset( $this->_registered ) ) {
				foreach ( $this->_registered as $key => $widget ) {
					register_sidebar( $widget );
				}
			}
		}

		/**
		 * Unregister Widgets.
		 *
		 * @since 1.0.0 Wireframe_Theme
		 * @todo  Should this be baked-in or disallowed?
		 */
		public function unregister() {
			if ( isset( $this->_unregistered ) ) {
				foreach ( $this->_unregistered as $key => $widget ) {
					unregister_sidebar( $widget );
				}
			}
		}

	} // Theme_Widgets.

endif; // Thanks for using MixaTheme products!
