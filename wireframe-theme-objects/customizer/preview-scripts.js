/**!
 * Customizer module script for Wireframe Theme.
 *
 * Theme Customizer enhancements for a better user experience. Contains handlers
 * to make Theme Customizer preview reload changes asynchronously.
 *
 * @package   Wireframe_Theme
 * @author    MixaTheme, Tada Burke
 * @version   1.0.0 Wireframe_Theme
 * @copyright 2016 MixaTheme
 * @license   GPL-2.0+
 * @see       https://mixatheme.com
 * @see       https://github.com/mixatheme/Wireframe
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

( function( $ ) {

	var api = wp.customize;

	/**
	 * Site Logo.
	 *
	 * @since 1.0.0 Wireframe_Theme
	 * @see   object Customizer
	 */
	api( 'logo_top', function( value ) {
		value.bind( function( to ) {
			$( '#site-logo' ).css( to );
		} );
	} );
	api( 'logo_left', function( value ) {
		value.bind( function( to ) {
			$( '#site-logo' ).css( to );
		} );
	} );
	api( 'logo_right', function( value ) {
		value.bind( function( to ) {
			$( '#site-logo' ).css( to );
		} );
	} );
	api( 'logo_bottom', function( value ) {
		value.bind( function( to ) {
			$( '#site-logo' ).css( to );
		} );
	} );

	/**
	 * Site Title.
	 *
	 * @since 1.0.0 Wireframe_Theme
	 * @see   object Customizer
	 */
	api( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );

	/**
	 * Site Description.
	 *
	 * @since 1.0.0 Wireframe_Theme
	 * @see   object Customizer
	 */
	api( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	/**
	 * Link Color.
	 *
	 * @since 1.0.0 Wireframe_Theme
	 * @see   object Customizer
	 */
	api( 'link_color', function( value ) {
		value.bind( function( to ) {
			$('a').css('color', to );
		} );
	} );

	/**
	 * Main Text Color.
	 *
	 * @since 1.0.0 Wireframe_Theme
	 * @see   object Customizer
	 */
	api( 'main_text_color', function( value ) {
		value.bind( function( to ) {
			$('body').css('color', to );
		} );
	} );

	/**
	 * Navbar Title.
	 *
	 * @since 1.0.0 Wireframe_Theme
	 * @see   object Customizer
	 */
	api( 'navbar_title', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$('.navbar-brand').removeClass('hidden');
			} else {
				$('.navbar-brand').addClass('hidden');
			}
		} );
	} );

	/**
	 * Header Text Color.
	 *
	 * @since 1.0.0 Wireframe_Theme
	 * @see   object Customizer
	 *
	 * @internal Thanks: Underscores.
	 */
	api( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	/**
	 * Navbar Contrast.
	 *
	 * @since 1.0.0 Wireframe_Theme
	 * @see   object Customizer
	 */
	api( 'navbar_contrast', function ( value ) {
		value.bind( function ( to ) {
			if ( 'inverse' === to ) {
				$( '#site-navigation' ).attr( 'class', 'main-navigation navbar-inverse' );
			} else if ('default' === to ) {
				$( '#site-navigation' ).attr( 'class', 'main-navigation navbar-default' );
			} else if ('transparent' === to ) {
				$( '#site-navigation' ).attr( 'class', 'main-navigation navbar-transparent' );
			} else {
				$( '#site-navigation' ).attr( 'class', 'main-navigation navbar-inverse' );
			}
		});
	});

} )( jQuery );
