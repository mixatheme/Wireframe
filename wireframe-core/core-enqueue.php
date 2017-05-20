<?php
/**
 * Core_Enqueue is a Wireframe core class.
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
if ( ! class_exists( 'MixaTheme\Wireframe\Theme\Core_Enqueue' ) ) :
	/**
	 * Core_Enqueue is a core theme class for wiring styles & scripts.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @since 1.0.0 Wireframe Plugin
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	final class Core_Enqueue implements Core_Enqueue_Interface {
		/**
		 * Prefix.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
		 * @since  1.0.0 Wireframe Plugin
		 * @var    string $_prefix
		 */
		private $_prefix;

		/**
		 * Styles.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
		 * @since  1.0.0 Wireframe Plugin
		 * @var    array $_styles
		 */
		private $_styles = array();

		/**
		 * Scripts.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
		 * @since  1.0.0 Wireframe Plugin
		 * @var    array $_scripts
		 */
		private $_scripts = array();

		/**
		 * Media Modal.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
		 * @since  1.0.0 Wireframe Plugin
		 * @var    bool $_mediamodal
		 */
		private $_mediamodal = false;

		/**
		 * Style CSS.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
		 * @since  1.0.0 Wireframe Plugin
		 * @var    bool $_stylecss
		 */
		private $_stylecss = false;

		/**
		 * Comment Reply.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @since  1.0.0 Wireframe Child
		 * @since  1.0.0 Wireframe Plugin
		 * @var    bool $_commentjs
		 */
		private $_commentjs = false;

		/**
		 * Constructor runs when this class is instantiated.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 * @since 1.0.0 Wireframe Child
		 * @since 1.0.0 Wireframe Plugin
		 * @param string $prefix     Prefix for handles.
		 * @param array  $styles     Styles to hook.
		 * @param array  $scripts    Scripts to hook.
		 * @param bool   $mediamodal @todo Loads the Media Modal.
		 * @param bool   $stylecss   Loads the parent stylesheet.
		 * @param bool   $commentjs  Loads the parent comment-reply script.
		 */
		public function __construct( $prefix, $styles = null, $scripts = null, $mediamodal = null, $stylecss = null, $commentjs = null ) {

			// Declare custom properties required for this class.
			$this->_prefix     = $prefix;
			$this->_styles     = $styles;
			$this->_scripts    = $scripts;
			$this->_mediamodal = $mediamodal;
			$this->_stylecss   = $stylecss;
			$this->_commentjs  = $commentjs;
		}

		/**
		 * Core_Enqueue Styles.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 * @since 1.0.0 Wireframe Child
		 * @since 1.0.0 Wireframe Plugin
		 */
		public function styles() {

			// No styles found.
			if ( ! isset( $this->_styles ) ) {
				return;
			}

			// Allow styles to be filtered by child themes.
			$filterable = apply_filters( $this->_prefix . '_' . __FUNCTION__, $this->_styles );

			// Loop CSS files.
			foreach ( $filterable as $key => $value ) {

				// Set handle.
				$handle = $this->_prefix . '_' . $key;

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
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 * @since 1.0.0 Wireframe Child
		 * @since 1.0.0 Wireframe Plugin
		 * @see   https://codex.wordpress.org/Function_Reference/wp_localize_script
		 */
		public function scripts() {

			// No scripts found.
			if ( ! isset( $this->_scripts ) ) {
				return;
			}

			// Allow scripts to be filtered by child themes.
			$filterable = apply_filters( $this->_prefix . '_' . __FUNCTION__, $this->_scripts );

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
				$handle = str_replace( '-', '_', $this->_prefix . '_' . $key );

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
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 * @since 1.0.0 Wireframe Child
		 * @since 1.0.0 Wireframe Plugin
		 * @todo  Should this be enqueued contextually somehow?
		 */
		public function mediamodal() {
			if ( isset( $this->_mediamodal ) && true === $this->_mediamodal ) {
				wp_enqueue_media();
			}
		}

		/**
		 * Core_Enqueue the main style.css stylesheet.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 * @since 1.0.0 Wireframe Child
		 * @since 1.0.0 Wireframe Plugin
		 */
		public function stylecss() {
			if ( isset( $this->_prefix ) && true === $this->_stylecss ) {
				$filterable = apply_filters(
					$this->_prefix . '_' . __FUNCTION__,
					get_stylesheet_uri()
				);
				wp_enqueue_style( $this->_prefix . '_style', $filterable );
			}
		}

		/**
		 * Core_Enqueue the main `comment-reply` script.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 * @since 1.0.0 Wireframe Child
		 * @since 1.0.0 Wireframe Plugin
		 */
		public function commentjs() {
			if ( isset( $this->_commentjs ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}

	} // Core_Enqueue.

endif; // Thanks for using MixaTheme products!
