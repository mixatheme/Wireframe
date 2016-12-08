<?php
/**
 * Plugin_DBTables is a Wireframe class.
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
 * @since 1.0.0 Wireframe_Plugin
 */
namespace MixaTheme\Wireframe\Plugin;

/**
 * No direct access to this file.
 *
 * @since 1.0.0 Wireframe_Plugin
 */
defined( 'ABSPATH' ) or die();

/**
 * Check if the class exists.
 *
 * @since 1.0.0 Wireframe_Plugin
 */
if ( ! class_exists( 'MixaTheme\Wireframe\Plugin\Plugin_DBTables' ) ) :
	/**
	 * Plugin_DBTables class for plugin database tables.
	 *
	 * This should usually only be called when your plugin is activated or when
	 * your plugin is uninstalled. Due to the delicate nature of altering the
	 * database, careful consideration and security should be prioritized.
	 *
	 * @since 1.0.0 Wireframe_Plugin
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	final class Plugin_DBTables implements Plugin_DBTables_Interface {
		/**
		 * Defaults.
		 *
		 * @access private
		 * @since 1.0.0 Wireframe_Plugin
		 * @var   array $defaults
		 */
		private $defaults;

		/**
		 * Constructor runs when this class is instantiated.
		 *
		 * @since 1.0.0 Wireframe_Plugin
		 * @param array $config Required SQL statement.
		 */
		public function __construct( $config ) {
			$this->defaults = $config['defaults'];
		}

		/**
		 * Get Defaults.
		 *
		 * @since  1.0.0 Wireframe_Plugin
		 */
		public function get_defaults() {
			if ( isset( $this->defaults ) ) {
				return $this->defaults;
			} else {
				wp_die( 'Error getting defaults.' );
			}
		}

		/**
		 * Create.
		 *
		 * @since  1.0.0 Wireframe_Plugin
		 * @param  string $id  The key defined via your object config.
		 * @param  string $sql The query for new table creation.
		 */
		public function create( $id, $sql ) {
			if ( null !== $this->get_defaults() ) {
				$this->_add_dbtable( $id, $sql );
			} else {
				wp_die( 'Error creating DB table.' );
			}
		}

		/**
		 * Drop.
		 *
		 * @since  1.0.0 Wireframe_Plugin
		 * @param  string $id  The key defined via your object config.
		 */
		public function drop( $id ) {
			if ( null !== $this->get_defaults() ) {
				$this->_remove_dbtable( $id );
			}
		}

		/**
		 * Get database prefix.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe_Plugin
		 * @global object $wpdb
		 */
		private function _dbprefix() {

			// Grab the DB object.
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
		 * @since  1.0.0 Wireframe_Plugin
		 * @global object $wpdb
		 * @param  string $id  The key defined via your object config.
		 * @param  string $sql The query for new table creation.
		 * @see    _dbprefix() Determines single site or multisite table prefix.
		 * @see    https://codex.wordpress.org/Creating_Tables_with_Plugins
		 * @see    https://codex.wordpress.org/Class_Reference/wpdb
		 */
		private function _add_dbtable( $id, $sql ) {

			// Grab the DB object.
			global $wpdb;

			// Concat your table $id with a prefix and object config key.
			$table_name = $this->_dbprefix() . $id;

			 // Get the character set and collation @since 3.5.0 WordPress.
			$charset_collate = $wpdb->get_charset_collate();

			// Check if we have a SQL statement.
			if ( isset( $this->defaults ) ) {

				// Loop your object config and build your SQL statements.
				foreach ( $this->defaults as $sql_key => $sql_statement ) {

					// Create DB table.
					$sql = 'CREATE TABLE ' . $table_name;

					// Build SQL statements.
					$sql .= ' ( ' . implode( ', ', $sql_statement ) . ' ) ' . $charset_collate . ';';
				}

				// You need dbDelta() from upgrade.php.
				require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

				// Execute query, create tables.
				dbDelta( $sql );
			} else {
				wp_die( 'Error adding dbtable.' );
			}
		}

		/**
		 * Remove database table.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe_Plugin
		 * @global object $wpdb
		 * @param  string $id The key defined via your object config.
		 * @see    _dbprefix() Determines single site or multisite table prefix.
		 * @see    https://codex.wordpress.org/Creating_Tables_with_Plugins
		 * @see    https://codex.wordpress.org/Class_Reference/wpdb
		 */
		private function _remove_dbtable( $id ) {

			// Grab the DB object.
			global $wpdb;

			// Concat table $id with a prefix and object config key.
			$table_name = $this->_dbprefix() . $id;

			// Loop object config and build SQL statements.
			foreach ( $this->defaults as $sql_key => $sql_statement ) {

				// CAUTION: Dropping tables like it's hot!
				$sql = 'DROP TABLE IF EXISTS ' . $table_name;
			}

			// Execute query, delete tables.
			$wpdb->query( $sql );
		}

	} // DBTables.

endif; // Thanks for using MixaTheme products!
