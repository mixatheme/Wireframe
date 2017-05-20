<?php
/**
 * Module_Editor is a Wireframe module class.
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
if ( ! class_exists( 'MixaTheme\Wireframe\Theme\Module_Editor' ) ) :
	/**
	 * Module_Editor is a module class for wiring TinyMCE WYSIWYG text editor.
	 *
	 * @since 2.9.0 WordPress
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	final class Module_Editor extends Core_Module_Abstract implements Module_Editor_Interface {
		/**
		 * Editor Style.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @var    array $_editor_style
		 */
		private $_editor_style;

		/**
		 * Style Formats.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @var    array $_style_formats
		 */
		private $_style_formats;

		/**
		 * Constructor runs when this class is instantiated.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 * @param array $config Config data.
		 */
		public function __construct( $config ) {

			// Declare custom properties required for this class.
			$this->_editor_style  = $config['editor_style'];
			$this->_style_formats = $config['style_formats'];

			// Get parent Constructor.
			parent::__construct( $config );
		}

		/**
		 * Editor Style.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 */
		public function editor_style() {
			if ( isset( $this->_editor_style ) ) {
				$filterable = apply_filters(
					$this->_prefix . '_' . __FUNCTION__,
					$this->_editor_style
				);
				add_editor_style( $filterable );
			}
		}

		/**
		 * Buttons 2.
		 *
		 * Callback to insert 'styleselect' into the $buttons array.
		 * Puts the buttons on Row 2.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 * @param array $buttons Row 2 buttons.
		 */
		public function buttons_2( $buttons ) {
			if ( isset( $buttons ) ) {
				array_unshift( $buttons, 'styleselect' );
				return $buttons;
			}
		}

		/**
		 * Style Formats.
		 *
		 * Callback function to filter the MCE settings and returns
		 * a JSON encoded array of $style_formats. Each array child
		 * is a format with it's own settings.
		 *
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @param  array $json Args for style formats.
		 * @return array $json JSON formatted array.
		 */
		public function style_formats( $json ) {
			if ( isset( $this->_style_formats ) && isset( $json ) ) {
				$filterable = apply_filters(
					$this->_prefix . '_editor_style_formats',
					$this->_style_formats
				);
				$json['style_formats'] = wp_json_encode( $filterable );
				return $json;
			}
		}

	} // Module_Editor.

endif; // Thanks for using MixaTheme products!
