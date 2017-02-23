<?php
/**
 * Theme_Admin is a Wireframe theme class.
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
if ( ! class_exists( 'MixaTheme\Wireframe\Theme\Theme_Admin' ) ) :
	/**
	 * Theme_Admin is a theme class for wiring back-end menu pages.
	 *
	 * @since 1.0.0 Wireframe_Theme
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	final class Theme_Admin extends Core_Module_Abstract implements Theme_Admin_Interface {
		/**
		 * Theme Page.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $_theme_page
		 */
		private $_theme_page;

		/**
		 * Constructor runs when this class is instantiated.
		 *
		 * @since 1.0.0 Wireframe_Theme
		 * @param array $config Config data.
		 */
		public function __construct( $config ) {

			// Declare custom properties required for this class.
			$this->_theme_page = $config['theme_page'];

			// Get parent Constructor.
			parent::__construct( $config );
		}

		/**
		 * Add sub menu page to the Appearance menu.
		 *
		 * @since 1.0.0 Wireframe_Theme
		 */
		public function theme_page() {
			if ( isset( $this->_theme_page ) ) {
				foreach ( $this->_theme_page as $key => $value ) {
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
