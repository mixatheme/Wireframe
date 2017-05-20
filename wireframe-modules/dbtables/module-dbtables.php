<?php
/**
 * Module_DBTables is a Wireframe module.
 *
 * PHP version 5.6.0
 *
 * @package   Wireframe_Plugin
 * @author    MixaTheme, Tada Burke
 * @version   1.0.0 Wireframe_Plugin
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
 * @since 1.0.0 Wireframe_Plugin
 */
namespace MixaTheme\Wireframe\Plugin;

/**
 * No direct access to this file.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe_Plugin
 */
defined( 'ABSPATH' ) or die();

/**
 * Check if the class exists.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe_Plugin
 */
if ( ! class_exists( 'MixaTheme\Wireframe\Plugin\Module_DBTables' ) ) :
	/**
	 * Module_DBTables class for building custom Database tables.
	 *
	 * This should usually only be called when your plugin is activated or when
	 * your plugin is uninstalled. Due to the delicate nature of altering the
	 * database, careful consideration and security should be prioritized.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 Wireframe_Plugin
	 * @see   https://codex.wordpress.org/Creating_Tables_with_Plugins
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	final class Module_DBTables extends Core_Module_Abstract implements Module_DBTables_Interface {
		/**
		 * Defaults.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe_Plugin
		 * @var    array $_defaults
		 */
		private $_defaults;

		/**
		 * Constructor runs when this class is instantiated.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe_Plugin
		 * @param array $config Required SQL statement.
		 */
		public function __construct( $config ) {

			// Declare custom properties required for this class.
			$this->_defaults = $config['defaults'];

			// Get parent Constructor.
			parent::__construct( $config );
		}

		/**
		 * Get Defaults.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe_Plugin
		 */
		public function get_defaults() {
			if ( isset( $this->_defaults ) ) {
				return $this->_defaults;
			}
		}

		/**
		 * Add.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe_Plugin
		 */
		public function add() {
			if ( $this->get_defaults() ) {
				foreach ( $this->get_defaults() as $id => $sql ) {
					$this->_add_dbtable( $id, $sql );
				}
			}
		}

		/**
		 * Remove.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 Wireframe_Plugin
		 */
		public function remove() {
			if ( $this->get_defaults() ) {
				foreach ( $this->get_defaults() as $id => $sql ) {
					$this->_drop( $id );
				}
			}
		}

		/**
		 * Drop.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe_Plugin
		 * @param  string $id The key defined via your object config.
		 */
		private function _drop( $id ) {
			if ( null !== $this->get_defaults() ) {
				$this->_remove_dbtable( $id );
			}
		}

		/**
		 * Get database prefix.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe_Plugin
		 * @global object $wpdb
		 * @todo   WIP. Pass $wpdb through constructor.
		 */
		private function _dbprefix() {

			global $wpdb;

			// Return a multisite or singlesite prefix.
			if ( is_multisite() ) {
				return $wpdb->base_prefix;
			} else {
				return $wpdb->prefix;
			}
		}

		/**
		 * Add database table.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe_Plugin
		 * @global object $wpdb
		 * @param  string $id  The key defined via your object config.
		 * @param  string $sql The query for new table creation.
		 * @see    _dbprefix() Determines single site or multisite table prefix.
		 * @see    https://codex.wordpress.org/Creating_Tables_with_Plugins
		 * @see    https://codex.wordpress.org/Class_Reference/wpdb
		 */
		private function _add_dbtable( $id, $sql ) {

			global $wpdb;

			// Concat your table $id with a prefix and object config key.
			$table_name = $this->_dbprefix() . $id;

			 // Get the character set and collation @since 3.5.0 WordPress.
			$charset_collate = $wpdb->get_charset_collate();

			// Loop your object config and build your SQL statements.
			foreach ( $this->get_defaults() as $sql_key => $sql_statement ) {

				// Create DB table.
				$sql = 'CREATE TABLE ' . $table_name;

				// Build SQL statements.
				$sql .= ' ( ' . implode( ', ', $sql_statement ) . ' ) ' . $charset_collate . ';';
			}

			// You need dbDelta() from upgrade.php.
			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

			// Execute query, create tables.
			dbDelta( $sql );
		}

		/**
		 * Remove database table.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 Wireframe_Plugin
		 * @global object $wpdb
		 * @param  string $id The key defined via your object config.
		 * @see    _dbprefix() Determines single site or multisite table prefix.
		 * @see    https://codex.wordpress.org/Creating_Tables_with_Plugins
		 * @see    https://codex.wordpress.org/Class_Reference/wpdb
		 * @todo   WIP. Needs work.
		 */
		private function _remove_dbtable( $id ) {

			global $wpdb;

			// Concat table $id with a prefix and object config key.
			$table_name = $this->_dbprefix() . $id;

			// Loop object config and build SQL statements.
			foreach ( $this->get_defaults() as $sql_key => $sql_statement ) {

				// CAUTION: Dropping tables like it's hot!
				$sql = 'DROP TABLE IF EXISTS ' . $table_name;
			}

			// Execute query, delete tables.
			$wpdb->query( $sql );
		}

	} // Module_DBTables.

endif; // Thanks for using MixaTheme products!
