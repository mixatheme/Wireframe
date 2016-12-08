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
		 * @access protected
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $registered Regisered widgets.
		 */
		protected $registered;

		/**
		 * Unregistered.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $unregistered Unregistered widgets.
		 */
		protected $unregistered;

		/**
		 * Constructor runs when this class is instantiated.
		 *
		 * @since 1.0.0 Wireframe_Theme
		 * @param array $config Config data.
		 */
		public function __construct( $config ) {

			// Custom properties required for this class.
			$this->registered   = $config['registered'];
			$this->unregistered = $config['unregistered'];

			// Default properties.
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
		 * Register Widgets.
		 *
		 * @since 1.0.0 Wireframe_Theme
		 */
		public function register() {
			if ( isset( $this->registered ) ) {
				foreach ( $this->registered as $key => $widget ) {
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
			if ( isset( $this->unregistered ) ) {
				foreach ( $this->unregistered as $key => $widget ) {
					unregister_sidebar( $widget );
				}
			}
		}

	} // Theme_Widgets.

endif; // Thanks for using MixaTheme products!
