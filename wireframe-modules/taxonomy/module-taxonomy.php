<?php
/**
 * Module_Taxonomy is a Wireframe module.
 *
 * PHP version 5.6.0
 *
 * @package   Wireframe_Plugin
 * @author    MixaTheme, Tada Burke
 * @version   1.0.0 Wireframe_Plugin
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
 * @since 1.0.0 Wireframe_Plugin
 */
namespace MixaTheme\Wireframe\Plugin;

/**
 * No direct access to this file.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe_Plugin
 */
defined( 'ABSPATH' ) or die();

/**
 * Check if the class exists.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe_Plugin
 */
if ( ! class_exists( 'MixaTheme\Wireframe\Plugin\Module_Taxonomy' ) ) :
	/**
	 * Module_Taxonomy class for registering custom Taxonomy.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe_Plugin
	 * @see   https://codex.wordpress.org/Taxonomies
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	final class Module_Taxonomy extends Core_Module_Abstract implements Module_Taxonomy_Interface {
		/**
		 * Defaults.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe_Plugin
		 * @var    array $_defaults
		 */
		private $_defaults;

		/**
		 * Constructor runs when this class is instantiated.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe_Plugin
		 * @param array $config Required array of config variables.
		 */
		public function __construct( $config ) {

			// Declare custom properties required for this class.
			$this->_defaults = $config['defaults'];

			// Get parent Constructor.
			parent::__construct( $config );
		}

		/**
		 * Get Defaults.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe_Plugin
		 */
		public function get_defaults() {
			if ( isset( $this->_defaults ) ) {
				return $this->_defaults;
			}
		}

		/**
		 * Register taxonomy.
		 *
		 * @since 2.3.0 WordPress
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe_Plugin
		 * @see   https://codex.wordpress.org/Function_Reference/register_taxonomy
		 */
		public function register() {
			if ( isset( $this->_defaults ) ) {
				foreach ( $this->_defaults as $taxonomy => $args ) {
					register_taxonomy( $taxonomy, $args['object_type'], $args );
				}
			}
		}

	} // Module_Taxonomy.

endif; // Thanks for using MixaTheme products!
