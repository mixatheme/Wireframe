<?php
/**
 * Theme_Editor_Interface is a Wireframe theme interface packaged with WP Wireframe Theme.
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
 * Namespace.
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
if ( ! class_exists( 'MixaTheme\WPWFT\Theme_Editor_Interface' ) ) :
	/**
	 * Theme_Editor_Interface contract for extending TinyMCE.
	 *
	 * @since 2.9.0 WordPress
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 WP Wireframe Theme
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	interface Theme_Editor_Interface {
		/**
		 * Editor Style.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 WP Wireframe Theme
		 */
		public function editor_style();

		/**
		 * Buttons 2.
		 *
		 * Callback to insert 'styleselect' into the $buttons array.
		 * Puts the buttons on Row 2.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 WP Wireframe Theme
		 * @param array $buttons Row 2 buttons.
		 */
		public function buttons_2( $buttons );

		/**
		 * Style Formats.
		 *
		 * Callback function to filter the MCE settings and returns
		 * a JSON encoded array of $_style_formats. Each array child
		 * is a format with it's own settings.
		 *
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 WP Wireframe Theme
		 * @param  array $json Args for style formats.
		 * @return array $json JSON formatted array.
		 */
		public function style_formats( $json );

	} // Theme_Editor_Interface.

endif; // Thanks for using MixaTheme products!
