<?php
/**
 * Module_Editor_Interface is a Wireframe module interface.
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
 * Namespace.
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
if ( ! class_exists( 'MixaTheme\Wireframe\Theme\Module_Editor_Interface' ) ) :
	/**
	 * Module_Editor_Interface contract for extending TinyMCE.
	 *
	 * Security Reminder: If you are saving any data to the Database, you should
	 * validate and/or sanitize untrusted data before entering into the database.
	 * All untrusted data should be escaped before output.
	 *
	 * @since 2.9.0 WordPress
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	interface Module_Editor_Interface {
		/**
		 * Editor Style.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 */
		public function editor_style();

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
		public function buttons_2( $buttons );

		/**
		 * Style Formats.
		 *
		 * Callback function to filter the MCE settings and returns
		 * a JSON encoded array of $_style_formats. Each array child
		 * is a format with it's own settings.
		 *
		 * @since 1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @param  array $json Args for style formats.
		 * @return array $json JSON formatted array.
		 */
		public function style_formats( $json );

	} // Module_Editor_Interface.

endif; // Thanks for using MixaTheme products!
