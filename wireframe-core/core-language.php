<?php
/**
 * Core_Language is a Wireframe core class.
 *
 * PHP version 5.6.0
 *
 * @package   Wireframe Theme
 * @author    MixaTheme, Tada Burke
 * @version   1.0.0 Wireframe
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
use WP_Error;

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
if ( ! class_exists( 'MixaTheme\Wireframe\Theme\Core_Language' ) ) :
	/**
	 * Core_Language is a Wireframe core class for wiring i18n & l10n translation.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @since 1.0.0 Wireframe Plugin
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	final class Core_Language extends Core_Module_Abstract implements Core_Language_Interface {
		/**
		 * Module.
		 *
		 * Is this module for a theme or a plugin?
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
		 * @since  1.0.0 Wireframe Plugin
		 * @var    string $_module The module type. Default: theme
		 */
		private $_module = 'theme';

		/**
		 * Path.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
		 * @since  1.0.0 Wireframe Plugin
		 * @var    array $_path Path to language file.
		 */
		private $_path;

		/**
		 * Use the $plugin_rel_path parameter instead.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
		 * @since  1.0.0 Wireframe Plugin
		 * @var    bool $_deprecated
		 */
		private $_deprecated = false;

		/**
		 * Constructor runs when this class is instantiated.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 * @since 1.0.0 Wireframe Child
		 * @since 1.0.0 Wireframe Plugin
		 * @param array $config Data via config file.
		 */
		public function __construct( $config ) {

			// Declare custom properties required for this class.
			$this->_module     = $config['module'];
			$this->_path       = $config['path'];
			$this->_deprecated = $config['deprecated'];

			// Get parent Constructor.
			parent::__construct( $config );
		}

		/**
		 * Load theme textdomain.
		 *
		 * @since 3.1.0 WordPress
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 * @since 1.0.0 Wireframe Child
		 * @since 1.0.0 Wireframe Plugin
		 */
		public function textdomain() {

			// Check for required properties.
			if ( isset( $this->_prefix ) && isset( $this->_path ) ) :

				// Allow properties to be filtered.
				$filterable = apply_filters(
					$this->_prefix . '_' . __FUNCTION__,
					$this->_path
				);

				// Switch module type.
				switch ( $this->_module ) {
					case 'theme':
						load_theme_textdomain( $this->_prefix, $filterable );
						break;
					case 'plugin':
						load_plugin_textdomain( $this->_prefix, $this->_deprecated, $filterable );
						break;
				}

			endif;
		}

	} // Core_Language.

endif; // Thanks for using MixaTheme products!
