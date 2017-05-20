<?php
/**
 * Core_Container_Interface is a Wireframe core interface.
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
 * @since 1.0.0 Wireframe Plugin
 */
defined( 'ABSPATH' ) or die();

/**
 * Check if the class exists.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe Theme
 * @since 1.0.0 Wireframe Child
 */
if ( ! class_exists( 'MixaTheme\Wireframe\Theme\Core_Container_Interface' ) ) :
	/**
	 * Core_Container_Interface is a core theme contract for storing objects.
	 *
	 * Instantiates a new service closure. A getter or setter will run
	 * determined by the requested service key.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @since 1.0.0 Wireframe Plugin
	 * @see   https://github.com/mixatheme/Wireframe
	 * @see   http://fabien.potencier.org/do-you-need-a-dependency-injection-container.html
	 *
	 * @internal Thanks: Fabien Potencier
	 */
	interface Core_Container_Interface {
		/**
		 * Register service with the Storage array.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 * @since 1.0.0 Wireframe Child
		 * @since 1.0.0 Wireframe Plugin
		 * @param string   $service  Service key.
		 * @param callable $resolver Service instance value.
		 */
		public function __set( $service, $resolver );

		/**
		 * Get service from the Storage array.
		 *
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
		 * @since  1.0.0 Wireframe Plugin
		 * @param  string $service Service key.
		 * @return callable Closure as an object instance.
		 */
		public function __get( $service );

	} // Core_Container_Interface.

endif; // Thanks for using MixaTheme products!
