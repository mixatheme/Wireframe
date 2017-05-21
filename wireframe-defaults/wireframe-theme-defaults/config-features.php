<?php
/**
 * Theme_Features config for modules built with Wireframe Suite for WordPress.
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
 */
defined( 'ABSPATH' ) or die();

/**
 * Stores array of default config data for passing into objects.
 *
 * Option #1: We use a function so the config data can be called and reused
 *            easily when you neeed it.
 *
 * Option #2: Put your array data inside a Service closure (see wireframe.php).
 *            Another alternative is putting all your object configs into one
 *            single config file to minimize your file count.
 *
 * @since  1.0.0 Wireframe
 * @since  1.0.0 Wireframe Theme
 * @since  1.0.0 Wireframe Child
 * @see    object Theme_Features
 * @return array  Default configuration values.
 */
function wireframe_theme_config_features() {
	/**
	 * Wired.
	 *
	 * Wires the Theme_Features actions & filters at runtime. Since all themes
	 * should have an theme features, this should always be set to true.
	 *
	 * Note: Most objects can be wired to hook actions & filters when an object
	 * is instantiated. This is optional, because some objects do not need any
	 * actions or filters.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   bool $wired Wire hooks via __construct(). Default: true
	 */
	$wired = true;

	/**
	 * Prefix.
	 *
	 * Many objects use a prefix for various strings, handles, scripts, etc.
	 * Generally, you should use a constant defined in wireframe.php. However,
	 * you can change it here if needed. Default: WIREFRAME_THEME_PREFIX
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   string $prefix Prefix for handles.
	 */
	$prefix = WIREFRAME_THEME_PREFIX;

	/**
	 * Actions.
	 *
	 * Most objects will usually need actions to be hooked at some point.
	 * You can set your actions in a multi-dimensional array and remember
	 * to set the property $wired = true (above).
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   array $actions Actions to hook.
	 */
	$actions = array(
		'post_formats' => array(
			'tag'      => 'after_setup_theme',
			'function' => 'post_formats',
			'priority' => 10,
			'args'     => null,
		),
		'post_thumbnails' => array(
			'tag'      => 'after_setup_theme',
			'function' => 'post_thumbnails',
			'priority' => 10,
			'args'     => null,
		),
		'post_thumbnails_size' => array(
			'tag'      => 'after_setup_theme',
			'function' => 'post_thumbnails_size',
			'priority' => 10,
			'args'     => null,
		),
		'custom_header' => array(
			'tag'      => 'after_setup_theme',
			'function' => 'custom_header',
			'priority' => 10,
			'args'     => null,
		),
		'custom_background' => array(
			'tag'      => 'after_setup_theme',
			'function' => 'custom_background',
			'priority' => 10,
			'args'     => null,
		),
		'custom_logo' => array(
			'tag'      => 'after_setup_theme',
			'function' => 'custom_logo',
			'priority' => 10,
			'args'     => null,
		),
		'feed_links' => array(
			'tag'      => 'after_setup_theme',
			'function' => 'feed_links',
			'priority' => 10,
			'args'     => null,
		),
		'html5' => array(
			'tag'      => 'after_setup_theme',
			'function' => 'html5',
			'priority' => 10,
			'args'     => null,
		),
		'title_tag' => array(
			'tag'      => 'after_setup_theme',
			'function' => 'title_tag',
			'priority' => 10,
			'args'     => null,
		),
		'nav_menus' => array(
			'tag'      => 'after_setup_theme',
			'function' => 'nav_menus',
			'priority' => 10,
			'args'     => null,
		),
		'content_width' => array(
			'tag'      => 'after_setup_theme',
			'function' => 'content_width',
			'priority' => 0, // Zero!
			'args'     => null,
		),
		'selective_refresh' => array(
			'tag'      => 'after_setup_theme',
			'function' => 'selective_refresh',
			'priority' => 10,
			'args'     => null,
		),
		'starter_content' => array(
			'tag'      => 'after_setup_theme',
			'function' => 'starter_content',
			'priority' => 10,
			'args'     => null,
		),
	);

	/**
	 * Filters.
	 *
	 * Objects don't generally need filters here, but you have the option.
	 * You can set your filters in a multi-dimensional array and remember
	 * to set the property $wired = true (above).
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   array $filters Filters to hook.
	 * @todo  WIP.
	 */
	$filters = array();

	/**
	 * Features: Custom Header.
	 *
	 * Custom header is an image that is chosen as the representative image
	 * in the theme top header section.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   array $custom_header Default args for custom headers.
	 * @see   wireframe_theme_custom_header_css() @see helpers-custom-header.php
	 * @see   https://codex.wordpress.org/Custom_Headers
	 */
	$custom_header = array(
		'default-image'          => '',
		'random-default'         => true,
		'width'                  => 2000,
		'height'                 => 400,
		'flex-height'            => true,
		'flex-width'             => true,
		'default-text-color'     => '000000',
		'header-text'            => true,
		'uploads'                => true,
		'wp-head-callback'       => 'wireframe_theme_custom_header_css',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);

	/**
	 * Features: Content Width.
	 *
	 * Sets the maximum allowed width for any content in the theme,
	 * like oEmbeds and images added to posts. The hook priority is 0
	 * to make it available to lower priority callbacks.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   int $content_width Pixel size for width. Default: 820
	 * @see   https://codex.wordpress.org/Content_Width
	 */
	$content_width = 820;

	/**
	 * Features: Post Thumbnails.
	 *
	 * This feature enables `Post Thumbnails` support for a theme. Note that
	 * you can optionally pass a second argument with an array of the
	 * `Post Types` for which you want to enable this feature.
	 *
	 * To show the `Featured Image` meta box in multisite installation,
	 * make sure you update the allowed upload file types, in Network Admin,
	 * Network Admin Settings SubPanel#Upload_Settings, Media upload buttons
	 * options. Default is jpg jpeg png gif mp3 mov avi wmv midi mid pdf.
	 *
	 * Note: This function will not resize your existing featured images.
	 * To regenerate existing images, use the `Regenerate Thumbnails` plugin.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   array $post_thumbnails Allowed post types. Default: post
	 * @see   https://developer.wordpress.org/themes/functionality/?p=11362
	 */
	$post_thumbnails = array(
		'post'
	);

	/**
	 * Features: Post Thumbnails Size.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   int $post_thumbnails_size Default args for Post Thumb Sizes.
	 * @see   https://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
	 */
	$post_thumbnails_size = array(
		'width'  => 1600,
		'height' => 1600,
		'crop'   => true,
	);

	/**
	 * Features: Feed Links.
	 *
	 * This feature enables Automatic Feed Links for post and comment in the
	 * head. This should replace the deprecated `automatic_feed_links()` function.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   array $feed_links Enable feed links. Default: true
	 * @see   https://codex.wordpress.org/Automatic_Feed_Links
	 */
	$feed_links = true;

	/**
	 * Features: Nav Menus.
	 *
	 * Registers navigation menu locations for your theme.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   array $nav_menus Menu locations for our theme.
	 * @see   https://developer.wordpress.org/reference/functions/register_nav_menus/
	 */
	$nav_menus = array(
		'primary'   => __( 'Primary Menu', 'wireframe-theme' ),
		'secondary' => __( 'Secondary Menu', 'wireframe-theme' ),
		'social'    => __( 'Social Links Menu', 'wireframe-theme' ),
	);

	/**
	 * Features: Post Formats.
	 *
	 * This feature enables Post Formats support for a Theme. When using
	 * Child Themes, be aware that add_theme_support( 'post-formats' ) will
	 * override the formats as defined by the parent theme, not add to it.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   array $post_formats The supported Post Formats.
	 * @see   https://codex.wordpress.org/Post_Formats
	 */
	$post_formats = array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	);

	/**
	 * Features: Custom Background.
	 *
	 * Custom Backgrounds is a theme feature that provides for customization
	 * of the background color and image.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @see   callable _custom_background_cb() @since WordPress 3.0.0
	 * @var   array $custom_background Default args for Custom Backgrounds.
	 * @see   https://codex.wordpress.org/Custom_Backgrounds
	 * @see   https://developer.wordpress.org/reference/functions/_custom_background_cb/
	 */
	$custom_background = array(
		'default-color'          => 'ffffff',
		'default-image'          => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);

	/**
	 * Features: HTML5.
	 *
	 * This feature allows the use of HTML5 markup for the search forms,
	 * comment forms, comment lists, gallery, and caption.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   array $html5 Support for HTML5 with various components.
	 * @see   https://codex.wordpress.org/Theme_Markup
	 */
	$html5 = array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	);

	/**
	 * Features: Title Tag.
	 *
	 * This feature enables plugins and themes to manage the document
	 * title tag. This should be used in place of wp_title() function.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   bool $title_tag Enable title tag. Default: true
	 * @see   https://codex.wordpress.org/Title_Tag
	 */
	$title_tag = true;

	/**
	 * Features: Custom Logo.
	 *
	 * This feature allows themes to add custom logos.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   array $custom_logo Default args for the custom logo.
	 * @see   https://codex.wordpress.org/Theme_Logo
	 */
	$custom_logo = array(
		'height'      => 100,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array(
			'site-title',
			'site-description',
		),
	);

	/**
	 * Features: Selective Refresh.
	 *
	 * Indicate widget sidebars can use selective refresh in the Customizer.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   bool $selective_refresh Enable Selective Refresh. Default: true
	 * @see   https://make.wordpress.org/core/?p=17066
	 */
	$selective_refresh = true;

	/**
	 * Features: Starter Content.
	 *
	 * Note: We do not intend to add Starter Content to boilerplate themes.
	 * However, we add this feature to make your development time faster.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   array $starter_content Enable Starter Content.
	 * @see   https://make.wordpress.org/core/?p=20650
	 */
	$starter_content = array();

	/**
	 * Option #1: Return (array) of config data for passing into objects.
	 *
	 * Option #2: Cast array as an (object) and use object/property sytnax
	 *            vs array syntax. If you choose to cast this array as an (object),
	 *            then you will need to modify the syntax in your class files.
	 *
	 * PRO-TIP: Most of Wireframe's object properties are protected or private
	 * and should not be set outside of this config file. However, you may wish
	 * to use `apply_filters` or `wp_json_encode` or `add_setting` or `add_option`
	 * whenever appropriate. Consider Admin pages for modifying settings & options.
	 *
	 * @since  1.0.0 Wireframe
	 * @since  1.0.0 Wireframe Theme
	 * @since  1.0.0 Wireframe Child
	 * @return array|object
	 */
	return array(
		'wired'                => $wired,
		'prefix'               => $prefix,
		'actions'              => $actions,
		'filters'              => $filters,
		'custom_header'        => $custom_header,
		'content_width'        => $content_width,
		'post_thumbnails'      => $post_thumbnails,
		'post_thumbnails_size' => $post_thumbnails_size,
		'feed_links'           => $feed_links,
		'nav_menus'            => $nav_menus,
		'post_formats'         => $post_formats,
		'custom_background'    => $custom_background,
		'html5'                => $html5,
		'title_tag'            => $title_tag,
		'custom_logo'          => $custom_logo,
		'selective_refresh'    => $selective_refresh,
		'starter_content'      => $starter_content,
	);

} // Thanks for using MixaTheme products!
