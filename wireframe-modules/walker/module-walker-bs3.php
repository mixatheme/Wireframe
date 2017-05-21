<?php
/**
 * Module_Walker_BS3 is a Wireframe module interface.
 *
 * PHP version 5.6.0
 *
 * @package   Wireframe Child
 * @author    MixaTheme, Tada Burke
 * @version   1.0.0 Wireframe Child
 * @copyright 2016 MixaTheme
 * @license   GPL-3.0+
 * @see       https://mixatheme.com
 * @see       https://github.com/mixatheme/wireframe-child
 * @see       https://github.com/mixatheme/wireframe_theme
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
 * @since 1.0.0 Wireframe Child
 */
namespace MixaTheme\Wireframe\Theme;
use Walker_Nav_Menu;

/**
 * No direct access to this file.
 *
 * @since 1.0.0 Wireframe Child
 */
defined( 'ABSPATH' ) or die();

/**
 * Check if the class exists.
 *
 * @since 1.0.0 Wireframe Child
 */
if ( ! class_exists( 'Module_Walker_BS3' ) ) :
	/**
	 * Module_Walker_BS3 is a theme class for extending Walker_Nav_Menu.
	 *
	 * {@inheritDoc}
	 *
	 * @since 1.0.0 Wireframe Child
	 * @see   https://github.com/mixatheme/wireframe-child
	 * @see   http://wordpress.stackexchange.com/questions/197060
	 *
	 * @internal WIP: We used the cool twittem walker forever, @todo roll our own.
	 */
	final class Module_Walker_BS3 extends Walker_Nav_Menu implements Module_Walker_BS3_Interface {
		/**
		 * Starts the UL before the elements are added.
		 *
		 * @since 3.0.0 WordPress
		 * @since 1.0.0 Wireframe Child
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param int    $depth  Depth of menu item. Used for padding.
		 * @param array  $args   An array of arguments. @see wp_nav_menu().
		 */
		public function start_lvl( &$output, $depth = 0, $args = array() ) {

			// Tab indentation per $depth.
			$indent = str_repeat( "\t", $depth );

			// Adds $indend, "role" and "class" attributes to the UL dropdown.
			$output .= "\n$indent<ul role=\"menu\" class=\"dropdown-menu\">\n";
		}

		/**
		 * Start the element output.
		 *
		 * @since 3.0.0 WordPress
		 * @since 4.4.0 WordPress 'nav_menu_item_args' filter was added.
		 * @since 1.0.0 Wireframe Child
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param object $item    Menu item data object.
		 * @param int    $depth   Depth of menu item. Used for padding.
		 * @param array  $args    An array of arguments. @see wp_nav_menu().
		 * @param int    $id      Current item ID.
		 */
		public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

			// If children exist, this is apparent. Get it? A parent?
			$apparent = $args->walker->has_children && 0 === $depth;

			// Tab indentation per $depth.
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;

			/**
			 * Filter the arguments for a single nav menu item.
			 *
			 * @since 4.4.0 WordPress
			 * @since 1.0.0 Wireframe Child
			 * @param array  $args   An array of arguments.
			 * @param object $item   Menu item data object.
			 * @param int    $depth  Depth of menu item. Used for padding.
			 */
			$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

			/**
			 * Filter the CSS class(es) applied to a menu item's list item element.
			 *
			 * @since 3.0.0 WordPress
			 * @since 4.1.0 WordPress The `$depth` parameter was added.
			 * @since 1.0.0 Wireframe Child
			 * @param array  $Classes The CSS classes that are applied to the menu item's `<li>` element.
			 * @param object $item    The current menu item.
			 * @param array  $args    An array of {@see wp_nav_menu()} arguments.
			 * @param int    $depth   Depth of menu item. Used for padding.
			 */
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );

			// foundation5 "has-dropdown".
			$class_names = ( $apparent ) ? ' class="' . esc_attr( $class_names ) . ' has-dropdown"' : ' class="' . esc_attr( $class_names ) . '"';

			/**
			 * Filter the ID applied to a menu item's list item element.
			 *
			 * @since 3.0.1 WordPress
			 * @since 4.1.0 WordPress The `$depth` parameter was added.
			 * @since 1.0.0 Wireframe Child
			 * @param string $menu_id The ID that is applied to the menu item's `<li>` element.
			 * @param object $item    The current menu item.
			 * @param array  $args    An array of {@see wp_nav_menu()} arguments.
			 * @param int    $depth   Depth of menu item. Used for padding.
			 */
			$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= ( $apparent ) ? $indent . '<li' . $id . $class_names . ' aria-haspopup="true">' : $indent . '<li' . $id . $class_names . '>';

			$atts = array();
			$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
			$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
			$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
			$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

			/**
			 * Filter the HTML attributes applied to a menu item's anchor element.
			 *
			 * @since 3.6.0 WordPress
			 * @since 4.1.0 WordPress The `$depth` parameter was added.
			 * @since 1.0.0 Wireframe Child
			 * @param array $atts {
			 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
			 *
			 *     @type string $title  Title attribute.
			 *     @type string $target Target attribute.
			 *     @type string $rel    The rel attribute.
			 *     @type string $href   The href attribute.
			 * }
			 * @param object $item   The current menu item.
			 * @param array  $args   An array of {@see wp_nav_menu()} arguments.
			 * @param int    $depth  Depth of menu item. Used for padding.
			 */

			// If item has_children add atts to anchor.
			if ( $apparent ) {
				$atts['href']           = '#';
				$atts['data-toggle']    = 'dropdown';
				$atts['class']          = 'dropdown-toggle';
				$atts['aria-haspopup']  = 'true';
			} else {
				$atts['href'] = ! empty( $item->url ) ? $item->url : '';
			}

			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

			$attributes = '';

			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			/** This filter is documented in wp-includes/post-template.php */
			$title = apply_filters( 'the_title', $item->title, $item->ID );

			/**
			 * Filter a menu item's title.
			 *
			 * @since 4.4.0 WordPress
			 * @since 1.0.0 Wireframe Child
			 * @param string $title The menu item's title.
			 * @param object $item  The current menu item.
			 * @param array  $args  An array of {@see wp_nav_menu()} arguments.
			 * @param int    $depth Depth of menu item. Used for padding.
			 * @todo  We need a conditional "active" class.
			 * @todo  We need a better conditional for handline $apparent "caret" class.
			 */
			$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

			$item_output  = $args->before;
			$item_output .= '<a' . $attributes . '>';
			$item_output .= $args->link_before . $title . $args->link_after;

			// Bootstrap caret.
			$item_output .= ( $apparent ) ? ' <span class="caret"></span></a>' : '</a>';

			$item_output .= $args->after;

			/**
			 * Filter a menu item's starting output.
			 *
			 * The menu item's starting output only includes `$args->before`, the opening `<a>`,
			 * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
			 * no filter for modifying the opening and closing `<li>` for a menu item.
			 *
			 * @since 3.0.0 WordPress
			 * @since 1.0.0 Wireframe Child
			 * @param string  $item_output The menu item's starting HTML output.
			 * @param object  $item        Menu item data object.
			 * @param int     $depth       Depth of menu item. Used for padding.
			 * @param array   $args        An array of {@see wp_nav_menu()} arguments.
			 */
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}

	} // Module_Walker_BS3.

endif; // Thanks for using MixaTheme products!
