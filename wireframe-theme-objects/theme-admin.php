<?php
/**
 * Theme_Admin is a Wireframe theme class packaged with WP Wireframe Theme.
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
if ( ! class_exists( 'MixaTheme\WPWFT\Theme_Admin' ) ) :
	/**
	 * Theme_Admin is a theme class for wiring back-end menu pages.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 WP Wireframe Theme
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	final class Theme_Admin extends Core_Module_Abstract implements Theme_Admin_Interface {
		/**
		 * Theme Page.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 WP Wireframe Theme
		 * @var    array $theme_page
		 */
		protected $theme_page;

		/**
		 * Constructor runs when this class is instantiated.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 WP Wireframe Theme
		 * @param array $config Config data.
		 */
		public function __construct( $config ) {

			// Custom properties required for this class.
			$this->theme_page = $config['theme_page'];

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
		 * Add sub menu page to the Appearance menu.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 WP Wireframe Theme
		 */
		public function theme_page() {
			if ( isset( $this->theme_page ) ) {
				foreach ( $this->theme_page as $key => $value ) {
					add_theme_page(
						$value['page_title'],
						$value['menu_title'],
						$value['capability'],
						$value['menu_slug'],
						$value['callback']
					);
				}
			}
		}

	} // Theme_Admin.

endif; // Thanks for using MixaTheme products!
