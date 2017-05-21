<?php
/**
 * Theme_Customizer config for modules built with Wireframe Suite for WordPress.
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
 * @see    object Theme_Customizer
 * @return array  Default configuration values.
 */
function wireframe_theme_config_customizer() {
	/**
	 * Wired.
	 *
	 * Wires the Theme_Customizer actions & filters at runtime. Since all themes
	 * should use the Customizer, this should always be set to true.
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
		'register' => array(
			'tag'      => 'customize_register',
			'function' => 'register',
			'priority' => 10,
			'args'     => 1,
		),
		'preview_scripts' => array(
			'tag'      => 'customize_preview_init',
			'function' => 'preview_scripts',
			'priority' => 10,
			'args'     => 1,
		),
		'header_output' => array(
			'tag'      => 'wp_head',
			'function' => 'header_output',
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
	 * Stylesheets to load.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   array $styles Array of stylesheets to enqueue.
	 */
	$styles = array();

	/**
	 * Scripts to load.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   array $scripts Array of scripts to enqueue.
	 *
	 * @internal Required Customizer deps: `jquery` + `customize-preview`.
	 */
	$scripts = array(
		'live_preview' => array(
			'path'     => WIREFRAME_THEME_JS,
			'file'     => 'preview-scripts-min',
			'deps'     => array( 'jquery', 'customize-preview' ),
			'footer'   => false,
			'localize' => array(
				'nonce' => wp_create_nonce( '_' . $prefix . '_customizer_preview_nonce' ),
			),
		),
	);

	/**
	 * Settings.
	 *
	 * Define arrays of new `Customizer` settings. Each setting must partner
	 * with a control and must use `sanitize_callback` for security.
	 *
	 * If your setting uses transport `postMessage` then you must add the
	 * appropriate script to your `customizer.js` file. Also, for your style
	 * settings to be visibile after Save, you might need to add the styles
	 * to generate via the Customizer's `header_output()` method.
	 *
	 * @todo TRT: False positive for `sanitize_callback` in `Theme Check`
	 * probably because we use an array for add_setting(). As you can see
	 * below, our settings assign a callback to arrays. @see Customizer
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   array $settings Store an array of settings.
	 * @see   https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_setting
	 */
	$settings = array(
		'example_setting',
		array(
			'default'           => '#2ba6cb',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		),
		'link_color',
		array(
			'default'           => '#2ba6cb',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		),
		'main_text_color',
		array(
			'default'           => '#000000',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		),
	);

	/**
	 * Partials.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   array $partials Array of partials for use with settings.
	 * @see   https://make.wordpress.org/core/?p=16546
	 */
	$partials = array(
		'blogname',
		array(
			'selector'        => '.site-title a',
			'render_callback' => function() {
				bloginfo( 'name' );
			},
			'container_inclusive' => false,
		),
		'blogdescription',
		array(
			'selector'        => '.site-description',
			'render_callback' => function() {
				bloginfo( 'description' );
			},
			'container_inclusive' => false,
		),
	);

	/**
	 * Controls.
	 *
	 * Defines arrays of new Customizer controls. If your control depends
	 * on a `control_class` you MUST use the exact `control_class` name.
	 * TIP: All controls require a setting before it appears.
	 *
	 * Example `control_class` names:
	 *
	 *    1. WP_Customize_Control                  Enter plain text.
	 *    2. WP_Customize_Color_Control            Select a color from a color wheel.
	 *    3. WP_Customize_Upload_Control           Upload media.
	 *    4. WP_Customize_Image_Control            Select or upload an image.
	 *    5. WP_Customize_Background_Image_Control Select a new background image.
	 *    6. WP_Customize_Header_Image_Control     Select a new header image.
	 *
	 * Example active callbacks:
	 *
	 *    1. wireframe_theme_is_home
	 *    2. wireframe_theme_is_single
	 *    3. wireframe_theme_is_page
	 *    4. Or use a closure after PHP 5.2: function() { return is_page(); }
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   array $controls Store an array of controls.
	 * @see   helpers-extras.php For active callbacks.
	 * @see   https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_control
	 * @see   https://developer.wordpress.org/themes/advanced-topics/customizer-api/
	 */
	$controls = array(
		'example_control',
		array(
			'section'  => 'example_section',
			'settings' => 'example_setting',
			'priority' => 1,
			'type'     => 'radio',
			'choices'  => array(
				'eenie'  => __( 'Eenie', 'wireframe-theme' ),
				'meenie' => __( 'Meenie', 'wireframe-theme' ),
				'mynee'  => __( 'Mynee', 'wireframe-theme' ),
				'mo'     => __( 'Mo', 'wireframe-theme' ),
			),
			'label'       => __( 'Example Control', 'wireframe-theme' ),
			'description' => __( 'Just an example custom control. To modify $controls, see the Customizer section in your functions.php file.', 'wireframe-theme' ),
			'active_callback' => '',
			'control_class'   => null,
		),
		'link_color',
		array(
			'section'         => 'colors',
			'settings'        => 'link_color',
			'priority'        => 10,
			'label'           => __( 'Link Color', 'wireframe-theme' ),
			'description'     => __( 'Descriptions goes here...', 'wireframe-theme' ),
			'active_callback' => '',
			'control_class'   => 'WP_Customize_Color_Control',
		),
		'main_text_color',
		array(
			'section'         => 'colors',
			'settings'        => 'main_text_color',
			'priority'        => 10,
			'label'           => __( 'Main Text Color', 'wireframe-theme' ),
			'description'     => __( 'Descriptions goes here...', 'wireframe-theme' ),
			'active_callback' => '',
			'control_class'   => 'WP_Customize_Color_Control',
		),
	);

	/**
	 * Callbacks.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   array $callbacks Store an array of active callbacks.
	 * @todo  Should we bake active callbacks here?
	 */
	$callbacks = array();

	/**
	 * Panels.
	 *
	 * TIP: All sections require a panel before it appears.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   array $panels Store an array of panels.
	 * @see   $sections(array('example_section'))
	 */
	$panels = array(
		'example_panel',
		array(
			'priority'       => 1,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __( 'Example Panel', 'wireframe-theme' ),
			'description'    => __( 'Just an example of a custom panel. To modify $panels, see the Customizer section in your functions.php file.', 'wireframe-theme' ),
		),
	);

	/**
	 * Sections.
	 *
	 * TIP: All sections require a panel before it appears.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   array $sections Store an array of sections.
	 * @see   $panels(array('example_panel'))
	 */
	$sections = array(
		'example_section',
		array(
			'priority'       => 1,
			'panel'          => 'example_panel',
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __( 'Example Section', 'wireframe-theme' ),
			'description'    => __( 'Just an example of a custom section. To modify $sections, see the Customizer section in your functions.php file.', 'wireframe-theme' ),
		),
	);

	/**
	 * This object depends on the Core_Enqueue object, so we need to intantiate the
	 * Core_Enqueue object and pass-in parameters.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   object Core_Enqueue(
	 *        @param string     $prefix     Required prefix for handles.
	 *        @param array|null $styles     Optional styles.
	 *        @param array|null $scripts    Optional scripts.
	 *        @param bool|null  $mediamodal Optional media modal.
	 *        @param bool|null  $stylecss   Optional main stylesheet.
	 *        @param bool|null  $commentjs  Optional main comment-reply script.
	 * )
	 */
	$enqueue = new Core_Enqueue( $prefix, $styles, $scripts );

	/**
	 * Inline styles to <head>.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe Theme
	 * @since 1.0.0 Wireframe Child
	 * @var   array $inline Inline CSS.
	 * @see   Theme_Customizer::css()
	 */
	$inline = array(
		'body',
		array(
			'style'    => 'background-color',
			'mod_name' => 'background_color',
			'prefix'   => '#',
			'postfix'  => '',
			'echo'     => true,
		),
		'#site-title a',
		array(
			'style'    => 'color',
			'mod_name' => 'header_textcolor',
			'prefix'   => '#',
			'postfix'  => '',
			'echo'     => true,
		),
		'body',
		array(
			'style'    => 'background-color',
			'mod_name' => 'background_color',
			'prefix'   => '#',
			'postfix'  => '',
			'echo'     => true,
		),
		'a',
		array(
			'style'    => 'color',
			'mod_name' => 'link_color',
			'prefix'   => '',
			'postfix'  => '',
			'echo'     => true,
		),
		'body',
		array(
			'style'    => 'color',
			'mod_name' => 'main_text_color',
			'prefix'   => '',
			'postfix'  => '',
			'echo'     => true,
		),
		'#site-logo',
		array(
			'style'    => 'margin-top',
			'mod_name' => 'margin_top',
			'prefix'   => '',
			'postfix'  => 'px',
			'echo'     => true,
		),
		'#site-logo',
		array(
			'style'    => 'margin-right',
			'mod_name' => 'margin_right',
			'prefix'   => '',
			'postfix'  => 'px',
			'echo'     => true,
		),
		'#site-logo',
		array(
			'style'    => 'margin-bottom',
			'mod_name' => 'margin_bottom',
			'prefix'   => '',
			'postfix'  => 'px',
			'echo'     => true,
		),
		'#site-logo',
		array(
			'style'    => 'margin-left',
			'mod_name' => 'margin_left',
			'prefix'   => '',
			'postfix'  => 'px',
			'echo'     => true,
		),
	);

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
		'wired'    => $wired,
		'prefix'   => $prefix,
		'actions'  => $actions,
		'filters'  => $filters,
		'styles'   => $styles,
		'scripts'  => $scripts,
		'settings' => $settings,
		'partials' => $partials,
		'controls' => $controls,
		'panels'   => $panels,
		'sections' => $sections,
		'enqueue'  => $enqueue,
		'inline'   => $inline,
	);

} // Thanks for using MixaTheme products!
