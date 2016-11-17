<?php
/**
 * Core_Language_Interface is a Wireframe core interface.
 *
 * PHP version 5.6.0
 *
 * @package   Wireframe
 * @author    MixaTheme, Tada Burke
 * @version   1.0.0 Wireframe
 * @copyright 2012-2016 MixaTheme
 * @license   GPL-2.0+
 * @see       https://mixatheme.com
 * @see       https://github.com/mixatheme/Wireframe
 *
 * Wireframe is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Wireframe. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Namespaces.
 *
 * @since 5.3.0 PHP
 * @since 1.0.0 Wireframe
 */
namespace MixaTheme\WPWFT;

/**
 * No direct access to this file.
 *
 * @since 1.0.0 Wireframe
 */
defined( 'ABSPATH' ) or die();

/**
 * Check if the class exists.
 *
 * @since 1.0.0 Wireframe
 */
if ( ! class_exists( 'MixaTheme\WPWFT\Core_Language_Interface' ) ) :
	/**
	 * Core_Language_Interface is a core theme contract for i18n & l10n translation.
	 *
	 * @since 1.0.0 Wireframe
	 * @see   https://github.com/mixatheme/Wireframe
	 * @todo  There's zero reason for this to be a class.
	 */
	interface Core_Language_Interface {
		/**
		 * Loads the theme's textdomain.
		 *
		 * @since 3.1.0 WordPress
		 * @since 1.0.0 Wireframe
		 */
		public function textdomain();

	} // Core_Language_Interface.

endif; // Thanks for using MixaTheme products!
