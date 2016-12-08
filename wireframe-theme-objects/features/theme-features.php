<?php
/**
 * Theme_Features is a Wireframe theme class.
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
if ( ! class_exists( 'MixaTheme\Wireframe\Theme\Theme_Features' ) ) :
	/**
	 * Theme_Features is a theme class for wiring theme features.
	 *
	 * Using add_theme_support() must be hooked via 'after_setup_theme'.
	 * The ‘init’ hook may be too late for some features.
	 *
	 * @since 1.0.0 Wireframe_Theme
	 * @see   https://developer.wordpress.org/reference/functions/add_theme_support/
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	final class Theme_Features extends Core_Module_Abstract implements Theme_Features_Interface {
		/**
		 * Custom Header.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $custom_header
		 */
		protected $custom_header;

		/**
		 * Content Width.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $content_width
		 */
		protected $content_width;

		/**
		 * Post Thumbnails.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $post_thumbnails
		 */
		protected $post_thumbnails;

		/**
		 * Post Thumbnails Size.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $post_thumbnails_size
		 */
		protected $post_thumbnails_size;

		/**
		 * Feed Links.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $feed_links
		 */
		protected $feed_links;

		/**
		 * Nav Menus.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe_Theme
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $nav_menus
		 */
		protected $nav_menus;

		/**
		 * Post Formats.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $post_formats
		 */
		protected $post_formats;

		/**
		 * Custom Background.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $custom_background
		 */
		protected $custom_background;

		/**
		 * HTML5.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $html5
		 */
		protected $html5;

		/**
		 * Title Tag.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $title_tag
		 */
		protected $title_tag;

		/**
		 * Custom Logo.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $custom_logo
		 */
		protected $custom_logo;

		/**
		 * Selective Refresh.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $selective_refresh
		 */
		protected $selective_refresh;

		/**
		 * Constructor runs when this class is instantiated.
		 *
		 * @since 1.0.0 Wireframe_Theme
		 * @param array $config Data via config file.
		 */
		public function __construct( $config ) {

			// Custom properties required for this class.
			$this->custom_header        = $config['custom_header'];
			$this->content_width        = $config['content_width'];
			$this->post_thumbnails      = $config['post_thumbnails'];
			$this->post_thumbnails_size = $config['post_thumbnails_size'];
			$this->feed_links           = $config['feed_links'];
			$this->nav_menus            = $config['nav_menus'];
			$this->post_formats         = $config['post_formats'];
			$this->custom_background    = $config['custom_background'];
			$this->html5                = $config['html5'];
			$this->title_tag            = $config['title_tag'];
			$this->custom_logo          = $config['custom_logo'];
			$this->selective_refresh    = $config['selective_refresh'];

			// Default properties.
			$this->wired    = $config['wired'];
			$this->prefix   = $config['prefix'];
			$this->_actions = $config['actions'];
			$this->_filters = $config['filters'];

			/**
			 * Most objects are not required to be wired (hooked) when instantiated.
			 * In your object config file(s), you can set the `$wired` value
			 * to true or false. If false, you can decouple any hooks and declare
			 * them elsewhere. If true, then objects fire hooks onload.
			 *
			 * Config data files are located in: `wireframe_dev/wireframe/config/`
			 */
			if ( isset( $this->wired ) && true === $this->wired ) {
				$this->wire_actions( $this->_actions );
				$this->wire_filters( $this->_filters );
			}
		}

		/**
		 * Custom Header.
		 *
		 * Custom header is an image that is chosen as the representative image
		 * in the theme top header section.
		 *
		 * @since 2.1.0 WordPress @see add_theme_support('custom-header')
		 * @since 1.0.0 Wireframe_Theme
		 */
		public function custom_header() {
			if ( isset( $this->custom_header ) && isset( $this->prefix ) ) {
				$filterable = apply_filters(
					$this->prefix . '_' . __FUNCTION__,
					$this->custom_header
				);
				add_theme_support( 'custom-header', $filterable );
			}
		}

		/**
		 * Content Width.
		 *
		 * Sets the maximum allowed width for any content in the theme, like
		 * oEmbeds and images added to posts. The hook priority is 0 to make it
		 * available to lower priority callbacks.
		 *
		 * @global $content_width
		 * @since  2.6.0 WordPress @see $GLOBALS['content_width']
		 * @since  1.0.0 Wireframe_Theme
		 * @see    https://codex.wordpress.org/Content_Width
		 * @see    https://core.trac.wordpress.org/ticket/21256
		 *
		 * @internal Unfortunately, no add_theme_support() yet, so we need a $GLOBALS key here.
		 * @internal This can live in functions.php, but we put it here for completeness.
		 * @internal Alternatively, we can store the content_width in a theme mod (recommended).
		 */
		public function content_width() {
			if ( isset( $this->content_width ) && isset( $this->prefix ) ) {
				$filterable = apply_filters(
					$this->prefix . '_' . __FUNCTION__,
					$this->content_width
				);
				$GLOBALS['content_width'] = absint( $filterable );
			}
		}

		/**
		 * Post Thumbnails.
		 *
		 * This feature enables Post Thumbnails support for a Theme. Note that
		 * you can optionally pass a second argument with an array of the
		 * Post Types for which you want to enable this feature.
		 *
		 * To show the "Featured Image" meta box in multisite installation,
		 * make sure you update the allowed upload file types, in Network Admin,
		 * Network Admin Settings SubPanel#Upload_Settings, Media upload buttons
		 * options. Default is jpg jpeg png gif mp3 mov avi wmv midi mid pdf.
		 *
		 * Note: This function will not resize your existing featured images.
		 * To regenerate existing images, use the "Regenerate Thumbnails" plugin.
		 *
		 * @since 2.9.0 WordPress @see add_theme_support('post-thumbnails')
		 * @since 1.0.0 Wireframe_Theme
		 */
		public function post_thumbnails() {
			if ( isset( $this->post_thumbnails ) ) {
				$filterable = apply_filters(
					$this->prefix . '_' . __FUNCTION__,
					$this->post_thumbnails
				);
				add_theme_support( 'post-thumbnails', $filterable );
			}
		}

		/**
		 * Post Thumbnails Size.
		 *
		 * @since 2.9.0 WordPress @see set_post_thumbnail_size()
		 * @since 1.0.0 Wireframe_Theme
		 * @see   set_post_thumbnail_size()
		 */
		public function post_thumbnails_size() {
			if ( isset( $this->post_thumbnails_size ) && isset( $this->prefix ) ) {
				$filterable = apply_filters(
					$this->prefix . '_' . __FUNCTION__,
					$this->post_thumbnails_size
				);
				set_post_thumbnail_size( $filterable['width'], $filterable['height'], $filterable['crop'] );
			}
		}

		/**
		 * Feed Links.
		 *
		 * This feature enables Automatic Feed Links for post and omment
		 * in the head. This should be used in place of the deprecated
		 * `automatic_feed_links()` function.
		 *
		 * @since 3.0.0 WordPress @see add_theme_support('automatic-feed-links')
		 * @since 1.0.0 Wireframe_Theme
		 */
		public function feed_links() {
			if ( isset( $this->feed_links ) && isset( $this->prefix ) ) {
				$filterable = apply_filters(
					$this->prefix . '_' . __FUNCTION__,
					$this->feed_links
				);
				add_theme_support( 'automatic-feed-links', $filterable );
			}
		}

		/**
		 * Nav Menus.
		 *
		 * Registers navigation menu locations for a theme.
		 *
		 * @since 3.0.0 WordPress @see register_nav_menus()
		 * @since 1.0.0 Wireframe_Theme
		 * @see   register_nav_menus()
		 */
		public function nav_menus() {
			if ( isset( $this->nav_menus ) && isset( $this->prefix ) ) {
				$filterable = apply_filters(
					$this->prefix . '_' . __FUNCTION__,
					$this->nav_menus
				);
				register_nav_menus( (array) $filterable );
			}
		}

		/**
		 * Post Formats.
		 *
		 * This feature enables Post Formats support for a Theme. When using
		 * Child Themes, be aware that add_theme_support( 'post-formats' ) will
		 * override the formats as defined by the parent theme, not add to it.
		 *
		 * @since 3.1.0 WordPress @see add_theme_support('post-formats')
		 * @since 1.0.0 Wireframe_Theme
		 * @see   http://codex.wordpress.org/Post_Formats
		 *
		 * @internal If Post Formats are enabled, "Standard" will always be a format.
		 * @internal It's not possible to create custom Post Formats.
		 */
		public function post_formats() {
			if ( isset( $this->post_formats ) && isset( $this->prefix ) ) {
				$filterable = apply_filters(
					$this->prefix . '_' . __FUNCTION__,
					$this->post_formats
				);
				add_theme_support( 'post-formats', $filterable );
			}
		}

		/**
		 * Custom Background.
		 *
		 * Custom Backgrounds is a theme feature that provides for customization
		 * of the background color and image.
		 *
		 * @since 3.4.0 WordPress @see add_theme_support('custom-background')
		 * @since 1.0.0 Wireframe_Theme
		 */
		public function custom_background() {
			if ( isset( $this->custom_background ) && isset( $this->prefix ) ) {
				$filterable = apply_filters(
					$this->prefix . '_' . __FUNCTION__,
					$this->custom_background
				);
				add_theme_support( 'custom-background', $filterable );
			}
		}

		/**
		 * HTML5.
		 *
		 * This feature allows the use of HTML5 markup for the search forms,
		 * comment forms, comment lists, gallery, and caption.
		 *
		 * @since 3.6.0 WordPress @see add_theme_support('html5')
		 * @since 1.0.0 Wireframe_Theme
		 */
		public function html5() {
			if ( isset( $this->html5 ) && isset( $this->prefix ) ) {
				$filterable = apply_filters(
					$this->prefix . '_' . __FUNCTION__,
					$this->html5
				);
				add_theme_support( 'html5', $filterable );
			}
		}

		/**
		 * Title Tag.
		 *
		 * This feature enables plugins and themes to manage the document
		 * title tag. This should be used in place of wp_title() function.
		 *
		 * @since 4.1.0 WordPress @see add_theme_support('title-tag')
		 * @since 1.0.0 Wireframe_Theme
		 * @see   https://codex.wordpress.org/Title_Tag
		 */
		public function title_tag() {
			if ( isset( $this->title_tag ) && isset( $this->prefix ) ) {
				$filterable = apply_filters(
					$this->prefix . '_' . __FUNCTION__,
					$this->title_tag
				);
				add_theme_support( 'title-tag', $filterable );
			}
		}

		/**
		 * Custom Logo.
		 *
		 * This feature allows themes to add custom logos.
		 *
		 * @since 4.5.0 WordPress @see add_theme_support('custom-logo')
		 * @since 1.0.0 Wireframe_Theme
		 */
		public function custom_logo() {
			if ( isset( $this->custom_logo ) && isset( $this->prefix ) ) {
				$filterable = apply_filters(
					$this->prefix . '_' . __FUNCTION__,
					$this->custom_logo
				);
				add_theme_support( 'custom-logo', $filterable );
			}
		}

		/**
		 * Selective Refresh.
		 *
		 * Indicate widget sidebars can use selective refresh in the Customizer.
		 *
		 * @since 4.5.0 WordPress @see add_theme_support('customize-selective-refresh-widgets')
		 * @since 1.0.0 Wireframe_Theme
		 */
		public function selective_refresh() {
			if ( isset( $this->selective_refresh ) && isset( $this->prefix ) ) {
				$filterable = apply_filters(
					$this->prefix . '_' . __FUNCTION__,
					$this->selective_refresh
				);
				add_theme_support( 'customize-selective-refresh-widgets', $filterable );
			}
		}

	} // Theme_Features.

endif; // Thanks for using MixaTheme products!
