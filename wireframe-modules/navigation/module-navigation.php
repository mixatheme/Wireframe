<?php
/**
 * Module_Navigation is a Wireframe module class.
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
 */
namespace MixaTheme\Wireframe\Theme;

/**
 * No direct access to this file.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe Theme
 */
defined( 'ABSPATH' ) or die();

/**
 * Check if the class exists.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe Theme
 */
if ( ! class_exists( 'MixaTheme\Wireframe\Theme\Module_Navigation' ) ) :
	/**
	 * Module_Navigation is a module class for wiring walker nav menus.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	class Module_Navigation extends Core_Module_Abstract implements Module_Navigation_Interface {
		/**
		 * Primary Menu.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @var    array $_primary_menu
		 */
		private $_primary_menu;

		/**
		 * Secondary Menu.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @var    array $_secondary_menu
		 */
		private $_secondary_menu;

		/**
		 * Tertiary Menu.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @var    array $_tertiary_menu
		 */
		private $_tertiary_menu;

		/**
		 * Constructor runs when this class instantiates.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @param  array $config Config data.
		 */
		public function __construct( $config ) {

			// Declare custom properties required for this class.
			$this->_primary_menu   = $config['primary_menu'];
			$this->_secondary_menu = $config['secondary_menu'];
			$this->_tertiary_menu  = $config['tertiary_menu'];

			// Get parent Constructor.
			parent::__construct( $config );
		}

		/**
		 * Set Primary menu.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 * @see   wp_nav_menu()
		 */
		public function primary_menu() {

			// Check for prefix and config args.
			if ( isset( $this->_prefix ) && isset( $this->_primary_menu ) ) {
				$filterable = apply_filters(
					$this->_prefix . '_' . __FUNCTION__,
					$this->_primary_menu
				);
				wp_nav_menu( $filterable );
			}
		}

		/**
		 * Set Secondary menu.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 * @see   wp_nav_menu()
		 */
		public function secondary_menu() {

			// Check for prefix and config args.
			if ( isset( $this->_prefix ) && isset( $this->_secondary_menu ) ) {
				$filterable = apply_filters(
					$this->_prefix . '_' . __FUNCTION__,
					$this->_secondary_menu
				);
				wp_nav_menu( $filterable );
			}
		}

		/**
		 * Set Tertiary menu.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 * @see   wp_nav_menu()
		 */
		public function tertiary_menu() {

			// Check for prefix and config args.
			if ( isset( $this->_prefix ) && isset( $this->_tertiary_menu ) ) {
				$filterable = apply_filters(
					$this->_prefix . '_' . __FUNCTION__,
					$this->_tertiary_menu
				);
				wp_nav_menu( $filterable );
			}
		}

	} // Module_Navigation.

endif; // Thanks for using MixaTheme products!
