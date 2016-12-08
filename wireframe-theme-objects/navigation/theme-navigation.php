<?php
/**
 * Theme_Navigation is a Wireframe theme class.
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
if ( ! class_exists( 'MixaTheme\Wireframe\Theme\Theme_Navigation' ) ) :
	/**
	 * Theme_Navigation is a theme class for wiring nav menus.
	 *
	 * @since 1.0.0 Wireframe_Theme
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	final class Theme_Navigation extends Core_Module_Abstract implements Theme_Navigation_Interface {
		/**
		 * Primary Menu.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $_primary_menu
		 */
		private $_primary_menu;

		/**
		 * Secondary Menu.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $_secondary_menu
		 */
		private $_secondary_menu;

		/**
		 * Tertiary Menu.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $_tertiary_menu
		 */
		private $_tertiary_menu;

		/**
		 * Constructor runs when this class is instantiated.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe_Theme
		 * @param  array $config Config data.
		 */
		public function __construct( $config ) {

			// Custom properties required for this class.
			$this->_primary_menu   = $config['primary_menu'];
			$this->_secondary_menu = $config['secondary_menu'];
			$this->_tertiary_menu  = $config['tertiary_menu'];

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
		 * Set Primary menu.
		 *
		 * @since 1.0.0 Wireframe_Theme
		 * @see   wp_nav_menu()
		 */
		public function primary_menu() {

			// Check for prefix and config args.
			if ( isset( $this->prefix ) && isset( $this->_primary_menu ) ) {

				// Wireframe API: add_filter( 'wireframe_theme_primary_menu' ).
				$filterable = apply_filters(
					$this->prefix . '_' . __FUNCTION__,
					$this->_primary_menu
				);

				// Build menu with config args.
				wp_nav_menu( $filterable );
			}
		}

		/**
		 * Set Secondary menu.
		 *
		 * @since 1.0.0 Wireframe_Theme
		 * @see   wp_nav_menu()
		 */
		public function secondary_menu() {

			// Check for prefix and config args.
			if ( isset( $this->prefix ) && isset( $this->_secondary_menu ) ) {

				// Wireframe API: add_filter( 'wireframe_theme_secondary_menu' ).
				$filterable = apply_filters(
					$this->prefix . '_' . __FUNCTION__,
					$this->_secondary_menu
				);

				// Build menu with config args.
				wp_nav_menu( $filterable );
			}
		}

		/**
		 * Set Tertiary menu.
		 *
		 * @since 1.0.0 Wireframe_Theme
		 * @see   wp_nav_menu()
		 */
		public function tertiary_menu() {

			// Check for prefix and config args.
			if ( isset( $this->prefix ) && isset( $this->_tertiary_menu ) ) {

				// Wireframe API: add_filter( 'wireframe_theme_tertiary_menu' ).
				$filterable = apply_filters(
					$this->prefix . '_' . __FUNCTION__,
					$this->_tertiary_menu
				);

				// Build menu with config args.
				wp_nav_menu( $filterable );
			}
		}

	} // Theme_Navigation.

endif; // Thanks for using MixaTheme products!
