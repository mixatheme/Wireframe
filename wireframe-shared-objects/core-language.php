<?php
/**
 * Core_Language is a Wireframe core class.
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
use WP_Error;

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
if ( ! class_exists( 'MixaTheme\Wireframe\Theme\Core_Language' ) ) :
	/**
	 * Core_Language is a core theme class for wiring i18n & l10n translation.
	 *
	 * @since 1.0.0 Wireframe_Theme
	 * @see   https://github.com/mixatheme/Wireframe
	 * @todo  There's zero reason for this to be a class.
	 */
	final class Core_Language extends Core_Module_Abstract implements Core_Language_Interface {
		/**
		 * Path.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $_path
		 */
		private $_path;

		/**
		 * Constructor runs when this class is instantiated.
		 *
		 * @since 1.0.0 Wireframe_Theme
		 * @param array $config Data via config file.
		 */
		public function __construct( $config ) {

			// Declare custom properties required for this class.
			$this->_path = $config['path'];

			// Get parent Constructor.
			parent::__construct( $config );
		}

		/**
		 * Load theme textdomain.
		 *
		 * @since 3.1.0 WordPress
		 * @since 1.0.0 Wireframe_Theme
		 */
		public function textdomain() {
			if ( isset( $this->_prefix ) && isset( $this->_path ) ) {
				$filterable = apply_filters(
					$this->_prefix . '_' . __FUNCTION__,
					$this->_path
				);
				load_theme_textdomain( $this->_prefix, $filterable );
			}
		}

	} // Core_Language.

endif; // Thanks for using MixaTheme products!
