<?php
/**
 * Theme_Notices is a Wireframe theme class.
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
 * @see       https://codex.wordpress.org/Plugin_API/Action_Reference/admin_notices
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
if ( ! class_exists( 'MixaTheme\Wireframe\Theme\Theme_Notices' ) ) :
	/**
	 * Theme_Notices is a theme class for wiring notifications.
	 *
	 * @since 1.0.0 Wireframe_Theme
	 * @since 1.0.0 Wireframe_Theme
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	final class Theme_Notices extends Core_Module_Abstract implements Theme_Notices_Interface {
		/**
		 * Notices.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $_notices
		 */
		private $_notices;

		/**
		 * Constructor runs when this class instantiates.
		 *
		 * @since 1.0.0 Wireframe_Theme
		 * @param array $config Config data.
		 */
		public function __construct( $config ) {

			// Declare custom properties required for this class.
			$this->_notices = $config['notices'];

			// Get parent Constructor.
			parent::__construct( $config );
		}

		/**
		 * Parent Theme.
		 *
		 * This notice is triggered when the Wireframe_Theme parent theme is activated.
		 * You can greet customers, instruct customizers to use child themes,
		 * recommended plugins to install, etc.
		 *
		 * @since 1.0.0 Wireframe_Theme
		 */
		public function parent_theme() {

			// Default empty notice.
			$notice = '';

			// Check if not a child theme and if config has _notices.
			if ( false === is_child_theme() && isset( $this->_notices ) ) {

				// Get notice from the array of notices.
				$value = $this->_notices['parent_theme'];

				// Build notice.
				$notice .= '<div class="' . $value['selectors'] . '"><p>';
				$notice .= $value['subject'] . '&nbsp;' . $value['message'];
				$notice .= '</p></div>';

				// Output notice should use the `after_setup_theme` hook.
				echo wp_kses_post( $notice );
			}
		}

	} // Theme_Notices.

endif; // Thanks for using MixaTheme products!
