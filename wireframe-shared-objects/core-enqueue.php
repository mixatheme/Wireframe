<?php
/**
 * Core_Enqueue is a Wireframe core class.
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
if ( ! class_exists( 'MixaTheme\Wireframe\Theme\Core_Enqueue' ) ) :
	/**
	 * Core_Enqueue is a core theme class for wiring styles & scripts.
	 *
	 * @since 1.0.0 Wireframe_Theme
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	final class Core_Enqueue implements Core_Enqueue_Interface {
		/**
		 * Prefix.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe_Theme
		 * @var    string $prefix
		 */
		protected $prefix;

		/**
		 * Styles.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $styles
		 */
		protected $styles = array();

		/**
		 * Scripts.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $scripts
		 */
		protected $scripts = array();

		/**
		 * Media Modal.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe_Theme
		 * @var    bool $mediamodal
		 */
		protected $mediamodal = false;

		/**
		 * Style CSS.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe_Theme
		 * @var    bool $stylecss
		 */
		protected $stylecss = false;

		/**
		 * Comment Reply.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe_Theme
		 * @var    bool $commentjs
		 */
		protected $commentjs = false;

		/**
		 * Constructor runs when this class is instantiated.
		 *
		 * @since 1.0.0 Wireframe_Theme
		 * @param string $prefix     Prefix for handles.
		 * @param array  $styles     Styles to hook.
		 * @param array  $scripts    Scripts to hook.
		 * @param bool   $mediamodal @todo Loads the Media Modal.
		 * @param bool   $stylecss   Loads the parent stylesheet.
		 * @param bool   $commentjs  Loads the parent comment-reply script.
		 */
		public function __construct( $prefix, $styles = null, $scripts = null, $mediamodal = null, $stylecss = null, $commentjs = null ) {

			// Custom properties required for this class.
			$this->prefix     = $prefix;
			$this->styles     = $styles;
			$this->scripts    = $scripts;
			$this->mediamodal = $mediamodal;
			$this->stylecss   = $stylecss;
			$this->commentjs  = $commentjs;
		}

		/**
		 * Core_Enqueue Styles.
		 *
		 * @since 1.0.0 Wireframe_Theme
		 */
		public function styles() {

			// No styles found.
			if ( ! isset( $this->styles ) ) {
				return;
			}

			// Allow styles to be filtered by child themes.
			$filterable = apply_filters( $this->prefix . '_' . __FUNCTION__, $this->styles );

			// Loop CSS files.
			foreach ( $filterable as $key => $value ) {

				// Set handle.
				$handle = $this->prefix . '_' . $key;

				// Set SRC.
				$src = trailingslashit( $value['path'] ) . $value['file'] . '.css';

				// Set dependencies.
				if ( isset( $value['deps'] ) ) {
					$deps = $value['deps'];
				} else {
					$deps = array();
				}

				// Set version.
				if ( isset( $value['version'] ) ) {
					$version = $value['version'];
				} else {
					$version = WIREFRAME_THEME_VERSION;
				}

				// Set media.
				if ( isset( $value['media'] ) ) {
					$media = $value['media'];
				} else {
					$media = 'screen';
				}

				// Register.
				wp_register_style( $handle, $src, $deps, $version, $media );

				// Core_Enqueue.
				wp_enqueue_style( $handle );
			}
		}

		/**
		 * Core_Enqueue Scripts.
		 *
		 * @since 1.0.0 Wireframe_Theme
		 * @see   https://codex.wordpress.org/Function_Reference/wp_localize_script
		 */
		public function scripts() {

			// No scripts found.
			if ( ! isset( $this->scripts ) ) {
				return;
			}

			// Allow scripts to be filtered by child themes.
			$filterable = apply_filters( $this->prefix . '_' . __FUNCTION__, $this->scripts );

			// Loop JS files.
			foreach ( $filterable as $key => $value ) {
				/**
				 * Set script handle and convert dashes to underscores.
				 *
				 * You must verify all references to this handle in your scripts
				 * use underscores/underlines. Dashes/hyphens are not allowed
				 * because JavaScript objects cannot contain dashes/hyphens.
				 *
				 * @see theme.js
				 */
				$handle = str_replace( '-', '_', $this->prefix . '_' . $key );

				// Set src.
				$src = trailingslashit( $value['path'] ) . $value['file'] . '.js';

				// Set dependencies.
				if ( isset( $value['deps'] ) ) {
					$deps = $value['deps'];
				} else {
					$deps = array();
				}

				// Set version.
				if ( isset( $value['version'] ) ) {
					$version = $value['version'];
				} else {
					$version = WIREFRAME_THEME_VERSION;
				}

				// Set footer.
				if ( isset( $value['footer'] ) ) {
					$footer = $value['footer'];
				} else {
					$footer = true;
				}

				// Register.
				wp_register_script( $handle, $src, $deps, $version, $footer );

				// Core_Enqueue.
				wp_enqueue_script( $handle );

				// Localize only if set.
				if ( isset( $value['localize'] ) ) {
					$data = $value['localize'];
					wp_localize_script( $handle, $handle, $data );
				}
			}
		}

		/**
		 * Core_Enqueue the Media modal script.
		 *
		 * @since 1.0.0 Wireframe_Theme
		 * @todo  Should this be enqueued contextually somehow?
		 */
		public function mediamodal() {
			if ( isset( $this->mediamodal ) && true === $this->mediamodal ) {
				wp_enqueue_media();
			}
		}

		/**
		 * Core_Enqueue the main style.css stylesheet.
		 *
		 * @since 1.0.0 Wireframe_Theme
		 */
		public function stylecss() {
			if ( isset( $this->prefix ) && true === $this->stylecss ) {
				$filterable = apply_filters(
					$this->prefix . '_' . __FUNCTION__,
					get_stylesheet_uri()
				);
				wp_enqueue_style( $this->prefix . '_style', $filterable );
			}
		}

		/**
		 * Core_Enqueue the main `comment-reply` script.
		 *
		 * @since 1.0.0 Wireframe_Theme
		 */
		public function commentjs() {
			if ( isset( $this->commentjs ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}

	} // Core_Enqueue.

endif; // Thanks for using MixaTheme products!
