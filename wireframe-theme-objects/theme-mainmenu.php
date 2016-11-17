<?php
/**
 * Theme_Mainmenu is a Wireframe theme class packaged with WP Wireframe Theme.
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
if ( ! class_exists( 'MixaTheme\WPWFT\Theme_Mainmenu' ) ) :
	/**
	 * Theme_Mainmenu is a theme class for wiring nav menus.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 WP Wireframe Theme
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	final class Theme_Mainmenu extends Core_Module_Abstract implements Theme_Mainmenu_Interface {
		/**
		 * Primary Menu.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 WP Wireframe Theme
		 * @var    array $_primary_menu
		 */
		private $_primary_menu;

		/**
		 * Constructor runs when this class is instantiated.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 WP Wireframe Theme
		 * @param  array $config Config data.
		 */
		public function __construct( $config ) {

			// Custom properties required for this class.
			$this->_primary_menu = $config['primary_menu'];

			// Default properties via Circuit abstract class.
			$this->wired    = $config['wired'];
			$this->prefix   = $config['prefix'];
			$this->_actions = $config['actions'];
			$this->_filters = $config['filters'];

			/**
			 * Most objects are not required to be hooked when instantiated.
			 * In your object config file(s), you can set the `$hooked` value
			 * to true or false. If false, you can decouple any hooks and declare
			 * them elsewhere. If true, then objects fire hooks onload.
			 *
			 * Config data files are located in: `wpwft_dev/wireframe/config/`
			 */
			if ( isset( $this->wired ) ) {
				$this->wire_actions( $this->_actions );
				$this->wire_filters( $this->_filters );
			}
		}

		/**
		 * Set Primary menu.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 WP Wireframe Theme
		 * @see   set_theme_mod()
		 */
		public function set_primary() {
			if ( isset( $this->_primary_menu ) ) {
				$filter = apply_filters(
					$this->prefix . '_primary_menu',
					$this->_primary_menu
				);
				set_theme_mod( 'primary_menu', $filter );
			}
		}

		/**
		 * Get Primary menu.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 WP Wireframe Theme
		 * @see   get_theme_mod()
		 * @see   wp_nav_menu()
		 * @todo  Do we need a fallback?
		 */
		public function get_primary() {
			$mod = get_theme_mod( 'primary_menu' );
			if ( isset( $mod ) ) {
				wp_nav_menu( $mod );
			}
		}

	} // Theme_Mainmenu.

endif; // Thanks for using MixaTheme products!
