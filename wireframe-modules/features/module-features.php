<?php
/**
 * Module_Features is a Wireframe module class.
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
if ( ! class_exists( 'MixaTheme\Wireframe\Theme\Module_Features' ) ) :
	/**
	 * Module_Features is a module class for wiring theme features.
	 *
	 * Using add_theme_support() must be hooked via 'after_setup_theme'.
	 * The ‘init’ hook may be too late for some features.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @see   https://developer.wordpress.org/reference/functions/add_theme_support/
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	class Module_Features extends Core_Module_Abstract implements Module_Features_Interface {
		/**
		 * Custom Header.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @var    array $_custom_header
		 */
		private $_custom_header;

		/**
		 * Content Width.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @var    array $_content_width
		 */
		private $_content_width;

		/**
		 * Post Thumbnails.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @var    array $_post_thumbnails
		 */
		private $_post_thumbnails;

		/**
		 * Post Thumbnails Size.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @var    array $_post_thumbnails_size
		 */
		private $_post_thumbnails_size;

		/**
		 * Feed Links.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe Theme
		 * @var    array $_feed_links
		 */
		private $_feed_links;

		/**
		 * Nav Menus.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe Theme
		 * @var    array $_nav_menus
		 */
		private $_nav_menus;

		/**
		 * Post Formats.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @var    array $_post_formats
		 */
		private $_post_formats;

		/**
		 * Custom Background.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @var    array $_custom_background
		 */
		private $_custom_background;

		/**
		 * HTML5.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @var    array $_html5
		 */
		private $_html5;

		/**
		 * Title Tag.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @var    array $_title_tag
		 */
		private $_title_tag;

		/**
		 * Custom Logo.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @var    array $_custom_logo
		 */
		private $_custom_logo;

		/**
		 * Selective Refresh.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @var    array $_selective_refresh
		 */
		private $_selective_refresh;

		/**
		 * Starter Content.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @var    array $_starter_content
		 */
		private $_starter_content;

		/**
		 * Constructor runs when this class instantiates.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 * @param array $config Data via config file.
		 */
		public function __construct( $config ) {

			// Declare custom properties required for this class.
			$this->_custom_header        = $config['custom_header'];
			$this->_content_width        = $config['content_width'];
			$this->_post_thumbnails      = $config['post_thumbnails'];
			$this->_post_thumbnails_size = $config['post_thumbnails_size'];
			$this->_feed_links           = $config['feed_links'];
			$this->_nav_menus            = $config['nav_menus'];
			$this->_post_formats         = $config['post_formats'];
			$this->_custom_background    = $config['custom_background'];
			$this->_html5                = $config['html5'];
			$this->_title_tag            = $config['title_tag'];
			$this->_custom_logo          = $config['custom_logo'];
			$this->_selective_refresh    = $config['selective_refresh'];
			$this->_starter_content      = $config['starter_content'];

			// Get parent Constructor.
			parent::__construct( $config );
		}

		/**
		 * Custom Header.
		 *
		 * Custom header is an image that is chosen as the representative image
		 * in the theme top header section.
		 *
		 * @since 2.1.0 WordPress @see add_theme_support('custom-header')
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 */
		public function custom_header() {
			if ( isset( $this->_custom_header ) && isset( $this->_prefix ) ) {
				$filterable = apply_filters(
					$this->_prefix . '_' . __FUNCTION__,
					$this->_custom_header
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
		 * @global $_content_width
		 * @since  2.6.0 WordPress @see $GLOBALS['content_width']
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe Theme
		 * @see    https://codex.wordpress.org/Content_Width
		 * @see    https://core.trac.wordpress.org/ticket/21256
		 *
		 * @internal Unfortunately, no add_theme_support() yet, so we need a $GLOBALS key here.
		 * @internal This can live in functions.php, but we put it here for completeness.
		 * @internal Alternatively, we can store the content_width in a theme mod (recommended).
		 */
		public function content_width() {
			if ( isset( $this->_content_width ) && isset( $this->_prefix ) ) {
				$filterable = apply_filters(
					$this->_prefix . '_' . __FUNCTION__,
					$this->_content_width
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
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 */
		public function post_thumbnails() {
			if ( isset( $this->_post_thumbnails ) ) {
				$filterable = apply_filters(
					$this->_prefix . '_' . __FUNCTION__,
					$this->_post_thumbnails
				);
				add_theme_support( 'post-thumbnails', $filterable );
			}
		}

		/**
		 * Post Thumbnails Size.
		 *
		 * @since 2.9.0 WordPress @see set_post_thumbnail_size()
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 * @see   set_post_thumbnail_size()
		 */
		public function post_thumbnails_size() {
			if ( isset( $this->_post_thumbnails_size ) && isset( $this->_prefix ) ) {
				$filterable = apply_filters(
					$this->_prefix . '_' . __FUNCTION__,
					$this->_post_thumbnails_size
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
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 */
		public function feed_links() {
			if ( isset( $this->_feed_links ) && isset( $this->_prefix ) ) {
				$filterable = apply_filters(
					$this->_prefix . '_' . __FUNCTION__,
					$this->_feed_links
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
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 * @see   register_nav_menus()
		 */
		public function nav_menus() {
			if ( isset( $this->_nav_menus ) && isset( $this->_prefix ) ) {
				$filterable = apply_filters(
					$this->_prefix . '_' . __FUNCTION__,
					$this->_nav_menus
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
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 * @see   http://codex.wordpress.org/Post_Formats
		 *
		 * @internal If Post Formats are enabled, "Standard" will always be a format.
		 * @internal It's not possible to create custom Post Formats.
		 */
		public function post_formats() {
			if ( isset( $this->_post_formats ) && isset( $this->_prefix ) ) {
				$filterable = apply_filters(
					$this->_prefix . '_' . __FUNCTION__,
					$this->_post_formats
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
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 */
		public function custom_background() {
			if ( isset( $this->_custom_background ) && isset( $this->_prefix ) ) {
				$filterable = apply_filters(
					$this->_prefix . '_' . __FUNCTION__,
					$this->_custom_background
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
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 */
		public function html5() {
			if ( isset( $this->_html5 ) && isset( $this->_prefix ) ) {
				$filterable = apply_filters(
					$this->_prefix . '_' . __FUNCTION__,
					$this->_html5
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
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 * @see   https://codex.wordpress.org/Title_Tag
		 */
		public function title_tag() {
			if ( isset( $this->_title_tag ) && isset( $this->_prefix ) ) {
				$filterable = apply_filters(
					$this->_prefix . '_' . __FUNCTION__,
					$this->_title_tag
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
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 */
		public function custom_logo() {
			if ( isset( $this->_custom_logo ) && isset( $this->_prefix ) ) {
				$filterable = apply_filters(
					$this->_prefix . '_' . __FUNCTION__,
					$this->_custom_logo
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
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 */
		public function selective_refresh() {
			if ( isset( $this->_selective_refresh ) && isset( $this->_prefix ) ) {
				$filterable = apply_filters(
					$this->_prefix . '_' . __FUNCTION__,
					$this->_selective_refresh
				);
				add_theme_support( 'customize-selective-refresh-widgets', $filterable );
			}
		}

		/**
		 * Starter Content.
		 *
		 * Ability to add starter content to a fresh WordPress install.
		 *
		 * @since 4.7.0 WordPress @see add_theme_support('starter-content')
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe Theme
		 */
		public function starter_content() {
			if ( isset( $this->_starter_content ) && isset( $this->_prefix ) ) {
				$filterable = apply_filters(
					$this->_prefix . '_' . __FUNCTION__,
					$this->_starter_content
				);
				add_theme_support( 'starter-content', $filterable );
			}
		}

	} // Module_Features.

endif; // Thanks for using MixaTheme products!
