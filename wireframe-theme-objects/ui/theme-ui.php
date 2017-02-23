<?php
/**
 * Theme_UI is a Wireframe power theme class..
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
if ( ! class_exists( 'MixaTheme\Wireframe\Theme\Theme_UI' ) ) :
	/**
	 * Theme_UI is a theme class for wiring front-end presentation methods.
	 *
	 * @since 1.0.0 Wireframe_Theme
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	final class Theme_UI extends Core_Module_Abstract implements Theme_UI_Interface {
		/**
		 * Enqueue.
		 *
		 * @since 1.0.0 Wireframe_Theme
		 * @var   object $_enqueue
		 */
		private $_enqueue;

		/**
		 * Constructor runs when this class instantiates.
		 *
		 * @since 1.0.0 Wireframe_Theme
		 * @param array $config Config data.
		 */
		public function __construct( $config ) {

			// Declare custom properties required for this class.
			$this->_enqueue = $config['enqueue'];

			// Get parent Constructor.
			parent::__construct( $config );
		}

		/**
		 * Enqueue Styles.
		 *
		 * @since 1.0.0 Wireframe_Theme
		 */
		public function styles() {
			if ( null !== $this->_enqueue->styles() ) {
				$this->_enqueue->styles();
			}
		}

		/**
		 * Enqueue Scripts.
		 *
		 * @since 1.0.0 Wireframe_Theme
		 */
		public function scripts() {
			if ( null !== $this->_enqueue->scripts() ) {
				$this->_enqueue->scripts();
			}
		}

		/**
		 * Enqueue Media Modal.
		 *
		 * @since 1.0.0 Wireframe_Theme
		 */
		public function mediamodal() {
			if ( null !== $this->_enqueue->mediamodal() ) {
				$this->_enqueue->mediamodal();
			}
		}

		/**
		 * Enqueue Style CSS.
		 *
		 * @since 1.0.0 Wireframe_Theme
		 */
		public function stylecss() {
			if ( null !== $this->_enqueue->stylecss() ) {
				$this->_enqueue->stylecss();
			}
		}

		/**
		 * Enqueue Comment-Reply JS.
		 *
		 * @since 1.0.0 Wireframe_Theme
		 */
		public function commentjs() {
			if ( null !== $this->_enqueue->commentjs() ) {
				$this->_enqueue->commentjs();
			}
		}

	} // Theme_UI.

endif; // Thanks for using MixaTheme products!
