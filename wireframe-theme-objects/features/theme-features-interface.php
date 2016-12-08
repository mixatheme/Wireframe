<?php
/**
 * Theme_Features_Interface is a Wireframe theme interface.
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
if ( ! class_exists( 'MixaTheme\Wireframe\Theme\Theme_Features_Interface' ) ) :
	/**
	 * Theme_Features_Interface contract for theme supports.
	 *
	 * Security Reminder: If you are saving any data to the Database, you should
	 * validate and/or sanitize untrusted data before entering into the database.
	 * All untrusted data should be escaped before output.
	 *
	 * @since 1.0.0 Wireframe_Theme
	 * @see   https://developer.wordpress.org/reference/functions/add_theme_support/
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	interface Theme_Features_Interface {
		/**
		 * Custom Header.
		 *
		 * Custom header is an image that is chosen as the representative image
		 * in the theme top header section.
		 *
		 * @since 2.1.0 WordPress @see add_theme_support('custom-header')
		 * @since 1.0.0 Wireframe_Theme
		 */
		public function custom_header();
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
		public function content_width();

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
		public function post_thumbnails();

		/**
		 * Post Thumbnails Size.
		 *
		 * @since 2.9.0 WordPress @see set_post_thumbnail_size()
		 * @since 1.0.0 Wireframe_Theme
		 * @see   set_post_thumbnail_size()
		 */
		public function post_thumbnails_size();

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
		public function feed_links();

		/**
		 * Nav Menus.
		 *
		 * Registers navigation menu locations for a theme.
		 *
		 * @since 3.0.0 WordPress @see register_nav_menus()
		 * @since 1.0.0 Wireframe_Theme
		 * @see   register_nav_menus()
		 */
		public function nav_menus();

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
		public function post_formats();

		/**
		 * Custom Background.
		 *
		 * Custom Backgrounds is a theme feature that provides for customization
		 * of the background color and image.
		 *
		 * @since 3.4.0 WordPress @see add_theme_support('custom-background')
		 * @since 1.0.0 Wireframe_Theme
		 */
		public function custom_background();

		/**
		 * HTML5.
		 *
		 * This feature allows the use of HTML5 markup for the search forms,
		 * comment forms, comment lists, gallery, and caption.
		 *
		 * @since 3.6.0 WordPress @see add_theme_support('html5')
		 * @since 1.0.0 Wireframe_Theme
		 */
		public function html5();

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
		public function title_tag();

		/**
		 * Custom Logo.
		 *
		 * This feature allows themes to add custom logos.
		 *
		 * @since 4.5.0 WordPress @see add_theme_support('custom-logo')
		 * @since 1.0.0 Wireframe_Theme
		 */
		public function custom_logo();

		/**
		 * Selective Refresh.
		 *
		 * Indicate widget sidebars can use selective refresh in the Customizer.
		 *
		 * @since 4.5.0 WordPress @see add_theme_support('customize-selective-refresh-widgets')
		 * @since 1.0.0 Wireframe_Theme
		 */
		public function selective_refresh();

	} // Theme_Features_Interface.

endif; // Thanks for using MixaTheme products!
