<?php
/**
 * Theme_Customizer is a Wireframe theme class.
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
if ( ! class_exists( 'MixaTheme\Wireframe\Theme\Theme_Customizer' ) ) :
	/**
	 * Theme_Customizer is a theme class for wiring live preview modifications.
	 *
	 * @since 1.0.0 Wireframe_Theme
	 * @see   https://codex.wordpress.org/Theme_Customization_API
	 * @see   https://github.com/mixatheme/Wireframe
	 *
	 * @internal Thanks: Weston Ruter, Otto, et al.
	 */
	final class Theme_Customizer extends Core_Module_Abstract implements Theme_Customizer_Interface {
		/**
		 * Version.
		 *
		 * @since 1.0.0 Wireframe_Theme
		 * @var   int VERS
		 */
		const VERS = WIREFRAME_THEME_VERSION;

		/**
		 * Settings.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $_settings
		 */
		private $_settings;

		/**
		 * Partials.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $_partials
		 */
		private $_partials;

		/**
		 * Controls.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $_controls
		 */
		private $_controls;

		/**
		 * Panels.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $_panels
		 */
		private $_panels;

		/**
		 * Sections.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $_sections
		 */
		private $_sections;

		/**
		 * Styles.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $_styles
		 */
		private $_styles;

		/**
		 * Scripts.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe_Theme
		 * @var    array $_scripts
		 */
		private $_scripts;

		/**
		 * Enqueue.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe_Theme
		 * @var    object Enqueue
		 */
		private $_enqueue;

		/**
		 * Constructor runs when this class is instantiated.
		 *
		 * @since 1.0.0 Wireframe_Theme
		 * @param array $config Config data.
		 */
		public function __construct( $config ) {

			// Custom properties required for this class.
			$this->_settings = $config['settings'];
			$this->_partials = $config['partials'];
			$this->_controls = $config['controls'];
			$this->_panels   = $config['panels'];
			$this->_sections = $config['sections'];

			// Enqueue properties required for this class.
			$this->_styles  = $config['styles'];
			$this->_scripts = $config['scripts'];
			$this->_enqueue = $config['enqueue'];

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
		 * Register.
		 *
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @since 3.4.0 WordPress introduced `customize_register` action.
		 * @since 1.0.0 Wireframe_Theme
		 * @param object $wp_customize WP_Customize_Manager.
		 */
		public function register( $wp_customize ) {

			// Default transports.
			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

			// Register the Customizer parts.
			$this->_add_setting( $wp_customize );
			$this->_add_partial( $wp_customize );
			$this->_add_control( $wp_customize );
			$this->_add_panel( $wp_customize );
			$this->_add_section( $wp_customize );
		}

		/**
		 * Preview scripts.
		 *
		 * A new Enqueue instances for the default `preview-scripts.js` file.
		 * This also demonstrates how Wireframe Theme implements OOP reusable code.
		 *
		 * The `preview-scripts.js` file binds JS handlers to make Customizer
		 * reload changes asynchronously. Any transport `postMessage` setting
		 * you make available to Live Preview must also be added to the
		 * `preview-scripts.js` file.
		 *
		 * @since 1.0.0 Wireframe_Theme
		 */
		public function preview_scripts() {
			if ( isset( $this->_enqueue ) ) {
				$this->_enqueue->scripts();
			}
		}

		/**
		 * Header Output.
		 *
		 * This will output the custom WordPress settings to the live theme's
		 * WP head. If you add new settings with 'postMessage' for Live Preview,
		 * you need to add a new line of dynamically generated CSS here.
		 *
		 * @since 1.0.0 Wireframe_Theme
		 * @see   _add_action('wp_head')
		 * @see   $this->css()
		 * @todo  Generated CSS should be decoupled in @version 1.0.1.
		 *
		 * @internal Thanks: WordPress Codex, Otto.
		 */
		public function header_output() {
		?><!--Customizer CSS-->
			<style type="text/css">
				<?php $this->css( '#site-title a', 'color', 'header_textcolor', '#' ); ?>
				<?php $this->css( 'body', 'background-color', 'background_color', '#' ); ?>
				<?php $this->css( 'a', 'color', 'link_color' ); ?>
				<?php $this->css( 'body', 'color', 'main_text_color' ); ?>
				<?php $this->css( '#site-logo', 'margin-top', 'logo_top', '', 'px' ); ?>
				<?php $this->css( '#site-logo', 'margin-left', 'logo_left', '', 'px' ); ?>
				<?php $this->css( '#site-logo', 'margin-right', 'logo_right', '', 'px' ); ?>
				<?php $this->css( '#site-logo', 'margin-bottom', 'logo_bottom', '', 'px' ); ?>
			</style>
			<!--/Customizer CSS-->
		<?php
		}

		/**
		 * CSS Generator.
		 *
		 * This will generate a line of CSS for use in header output. If the
		 * setting ($mod_name) has no defined value, the CSS will not be output.
		 *
		 * @since  1.0.0 Wireframe_Theme
		 * @see    get_theme_mod()
		 * @param  string $selector CSS selector.
		 * @param  string $style    The name of the CSS *property* to modify.
		 * @param  string $mod_name The name of the 'theme_mod' option to fetch.
		 * @param  string $prefix   Optional. Anything that needs to be output before the CSS property.
		 * @param  string $postfix  Optional. Anything that needs to be output after the CSS property.
		 * @param  bool   $echo     Optional. Whether to print directly to the page (default: true).
		 * @return string $output   Returns a single line of CSS with selectors and a property.
		 *
		 * @internal Thanks: WordPress Codex, Otto.
		 */
		public function css( $selector, $style, $mod_name, $prefix = '', $postfix = '', $echo = true ) {

			// Initial empty output.
			$output = '';

			// Get $mod_name (should match settings key).
			$mod = get_theme_mod( $mod_name );

			// Check if a mod is found or not.
			if ( ! empty( $mod ) ) {

				// Mod found.
				$output = sprintf( '%s { %s:%s; }', $selector, $style, $prefix . $mod . $postfix );

				// Echo the styles.
				if ( $echo ) {
					esc_html( $output );
				}
			}

			// No mod found, $output is empty.
			return $output;
		}

		/**
		 * Add a new Customizer part.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe_Theme
		 * @param  array  $cfg          Config array for assigning ids and values.
		 * @param  string $part         Customizer part to add.
		 * @param  object $wp_customize WP_Customize_Manager.
		 */
		private function _add_part( $cfg, $part, $wp_customize ) {

			// Loop config array.
			foreach ( $cfg as $key => $value ) {

				// Assign even values as keys.
				if ( 0 === $key % 2 ) {
					$id = $value;
					continue;
				}

				// Assign ID determined by a pluralized Customizer part.
				switch ( $part ) {
					case 'settings':
						$wp_customize->add_setting( $id, $value );
						break;
					case 'partials':
						if ( isset( $wp_customize->selective_refresh ) ) {
							$wp_customize->selective_refresh->add_partial( $id, $value );
						}
						break;
					case 'controls':
						if ( isset( $value['control_class'] ) && class_exists( $value['control_class'] ) ) {
							$wp_customize->add_control(
								new $value['control_class']( $wp_customize, $id, $value )
							);
						} else {
							$wp_customize->add_control( $id, $value );
						}
						break;
					case 'panels':
						$wp_customize->add_panel( $id, $value );
						break;
					case 'sections':
						$wp_customize->add_section( $id, $value );
						break;

				} // switch.

			} // foreach.

		}

		/**
		 * Add Settings.
		 *
		 * @access private
		 * @since  3.4.0 WordPress @see WP_Customize_Manager::_add_setting()
		 * @since  1.0.0 Wireframe_Theme
		 * @param  object $wp_customize WP_Customize_Manager.
		 */
		private function _add_setting( $wp_customize ) {
			if ( isset( $this->_settings ) ) {
				$this->_add_part( $this->_settings, 'settings', $wp_customize );
			}
		}

		/**
		 * Add Partials.
		 *
		 * @access private
		 * @since  4.5.0 WordPress @see WP_Customize_Selective_Refresh
		 * @since  1.0.0 Wireframe_Theme
		 * @param  object $wp_customize WP_Customize_Manager.
		 * @see    https://make.wordpress.org/core/?p=16546
		 */
		private function _add_partial( $wp_customize ) {
			if ( isset( $this->_partials ) ) {
				$this->_add_part( $this->_partials, 'partials', $wp_customize );
			}
		}

		/**
		 * Add Controls.
		 *
		 * @access private
		 * @since  3.4.0 WordPress @see WP_Customize_Manager::_add_control()
		 * @since  1.0.0 Wireframe_Theme
		 * @param  object $wp_customize WP_Customize_Manager.
		 */
		private function _add_control( $wp_customize ) {
			if ( isset( $this->_controls ) ) {
				$this->_add_part( $this->_controls, 'controls', $wp_customize );
			}
		}

		/**
		 * Add Panel.
		 *
		 * @access private
		 * @since  3.4.0 WordPress @see WP_Customize_Manager
		 * @since  1.0.0 Wireframe_Theme
		 * @param  object $wp_customize WP_Customize_Manager.
		 */
		private function _add_panel( $wp_customize ) {
			if ( isset( $this->_panels ) ) {
				$this->_add_part( $this->_panels, 'panels', $wp_customize );
			}
		}

		/**
		 * Add Section.
		 *
		 * @access private
		 * @since  3.4.0 WordPress @see WP_Customize_Manager
		 * @since  1.0.0 Wireframe_Theme
		 * @param  object $wp_customize WP_Customize_Manager.
		 */
		private function _add_section( $wp_customize ) {
			if ( isset( $this->_sections ) ) {
				$this->_add_part( $this->_sections, 'sections', $wp_customize );
			}
		}

	} // Theme_Customizer.

endif; // Thanks for using MixaTheme products!
