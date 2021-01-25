<?php
/**
 * CoCart Carts in Session helpers.
 *
 * Provides functions that provide helpful data for the plugin.
 *
 * @author   Sébastien Dumont
 * @category Carts in Session
 * @package  CoCart Carts in Session\Helpers
 * @license  GPL-2.0+
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * CoCart Carts in Session helper class.
 *
 * @package CoCart Carts in Session/Helpers
 */
class CoCart_Carts_in_Session_Helpers {

	/**
	 * Cache 'gte' comparison results for WooCommerce version.
	 *
	 * @var array
	 */
	private static $is_wc_version_gte = array();

	/**
	 * Cache 'gt' comparison results for WooCommerce version.
	 *
	 * @var array
	 */
	private static $is_wc_version_gt = array();

	/**
	 * Cache 'lte' comparison results for WooCommerce version.
	 *
	 * @var array
	 */
	private static $is_wc_version_lte = array();

	/**
	 * Cache 'lt' comparison results for WooCommerce version.
	 *
	 * @var array
	 */
	private static $is_wc_version_lt = array();

	/**
	 * Cache 'gt' comparison results for WP version.
	 *
	 * @var array
	 */
	private static $is_wp_version_gt = array();

	/**
	 * Cache 'gte' comparison results for WP version.
	 *
	 * @var array
	 */
	private static $is_wp_version_gte = array();

	/**
	 * Cache 'lt' comparison results for WP version.
	 *
	 * @var array
	 */
	private static $is_wp_version_lt = array();

	/**
	 * Helper method to get the version of the currently installed WooCommerce.
	 *
	 * @access private
	 * @return string
	 */
	private static function get_wc_version() {
		return defined( 'WC_VERSION' ) && WC_VERSION ? WC_VERSION : null;
	} // END get_wc_version()

	/**
	 * Returns true if the installed version of WooCommerce is 4.5 or greater.
	 *
	 * @access public
	 * @return boolean
	 */
	public static function is_wc_version_gte_4_5() {
		return self::is_wc_version_gte( '4.5' );
	} // END is_wc_version_gte_4_5()

	/**
	 * Returns true if the installed version of WooCommerce is lower than 4.5.
	 *
	 * @access public
	 * @return boolean
	 */
	public static function is_wc_version_lt_4_5() {
		return self::is_wc_version_lt( '4.5' );
	} // END is_wc_version_lt_4_5()

	/**
	 * Returns true if the installed version of WooCommerce is 4.8 or greater.
	 *
	 * @access public
	 * @return boolean
	 */
	public static function is_wc_version_gte_4_8() {
		return self::is_wc_version_gte( '4.8' );
	} // END is_wc_version_gte_4_5()

	/**
	 * Returns true if the installed version of WooCommerce is greater than or equal to $version.
	 *
	 * @access public
	 * @param  string $version the version to compare
	 * @return boolean true if the installed version of WooCommerce is >= $version
	 */
	public static function is_wc_version_gte( $version ) {
		if ( ! isset( self::$is_wc_version_gte[ $version ] ) ) {
			self::$is_wc_version_gte[ $version ] = self::get_wc_version() && version_compare( self::get_wc_version(), $version, '>=' );
		}
		return self::$is_wc_version_gte[ $version ];
	} // END is_wc_version_gte()

	/**
	 * Returns true if the installed version of WooCommerce is greater than $version.
	 *
	 * @access public
	 * @param  string $version the version to compare
	 * @return boolean true if the installed version of WooCommerce is > $version
	 */
	public static function is_wc_version_gt( $version ) {
		if ( ! isset( self::$is_wc_version_gt[ $version ] ) ) {
			self::$is_wc_version_gt[ $version ] = self::get_wc_version() && version_compare( self::get_wc_version(), $version, '>' );
		}

		return self::$is_wc_version_gt[ $version ];
	} // END is_wc_version_gt()

	/**
	 * Returns true if the installed version of WooCommerce is lower than or equal to $version.
	 *
	 * @access public
	 * @param  string $version the version to compare
	 * @return boolean true if the installed version of WooCommerce is <= $version
	 */
	public static function is_wc_version_lte( $version ) {
		if ( ! isset( self::$is_wc_version_lte[ $version ] ) ) {
			self::$is_wc_version_lte[ $version ] = self::get_wc_version() && version_compare( self::get_wc_version(), $version, '<=' );
		}
		return self::$is_wc_version_lte[ $version ];
	} // END is_wc_version_lte()

	/**
	 * Returns true if the installed version of WooCommerce is less than $version.
	 *
	 * @access public
	 * @param  string $version the version to compare
	 * @return boolean true if the installed version of WooCommerce is < $version
	 */
	public static function is_wc_version_lt( $version ) {
		if ( ! isset( self::$is_wc_version_lt[ $version ] ) ) {
			self::$is_wc_version_lt[ $version ] = self::get_wc_version() && version_compare( self::get_wc_version(), $version, '<' );
		}

		return self::$is_wc_version_lt[ $version ];
	} // END is_wc_version_lt()

	/**
	 * Returns true if the WooCommerce version does not meet CoCart Carts in Session requirements.
	 *
	 * @access public
	 * @static
	 * @return boolean
	 */
	public static function is_not_wc_version_required() {
		if ( version_compare( self::get_wc_version(), CoCart_Carts_in_Session::$required_woo, '<' ) ) {
			return true;
		}

		return false;
	} // END is_note_wc_version_required()

	/**
	 * Returns true if the installed version of WordPress is greater than $version.
	 *
	 * @access public
	 * @param  string $version
	 * @return boolean
	 */
	public static function is_wp_version_gt( $version ) {
		if ( ! isset( self::$is_wp_version_gt[ $version ] ) ) {
			global $wp_version;

			self::$is_wp_version_gt[ $version ] = $wp_version && version_compare( $wp_version, $version, '>' );
		}

		return self::$is_wp_version_gt[ $version ];
	} // END is_wp_version_gt()

	/**
	 * Returns true if the installed version of WordPress is greater than or equal to $version.
	 *
	 * @access public
	 * @param  string $version
	 * @return boolean
	 */
	public static function is_wp_version_gte( $version ) {
		if ( ! isset( self::$is_wp_version_gte[ $version ] ) ) {
			global $wp_version;

			self::$is_wp_version_gte[ $version ] = $wp_version && version_compare( $wp_version, $version, '>=' );
		}

		return self::$is_wp_version_gte[ $version ];
	} // END is_wp_version_gte()

	/**
	 * Returns true if the installed version of WordPress is less than $version.
	 *
	 * @access public
	 * @param  string $version
	 * @return boolean
	 */
	public static function is_wp_version_lt( $version ) {
		if ( ! isset( self::$is_wp_version_lt[ $version ] ) ) {
			global $wp_version;

			self::$is_wp_version_lt[ $version ] = $wp_version && version_compare( $wp_version, $version, '<' );
		}

		return self::$is_wp_version_lt[ $version ];
	} // END is_wp_version_lt()

	/**
	 * Helper method to get the version of the currently installed CoCart Carts in Session.
	 *
	 * @access private
	 * @static
	 * @return string
	 */
	public static function get_cocart_carts_in_session_version() {
		return defined( 'COCART_CARTS_IN_SESSION_VERSION' ) && COCART_CARTS_IN_SESSION_VERSION ? COCART_CARTS_IN_SESSION_VERSION : null;
	} // END get_cocart_carts_in_session_version()

	/**
	 * Returns true if CoCart Carts in Session is a pre-release.
	 *
	 * @access public
	 * @static
	 * @return boolean
	 */
	public static function is_cocart_carts_in_session_pre_release() {
		$version = self::get_cocart_carts_in_session_version();

		if ( strpos( $version, 'beta' ) ||
			strpos( $version, 'rc' )
		) {
			return true;
		}

		return false;
	} // END is_cocart_carts_in_session_pre_release()

	/**
	 * Returns true if CoCart Carts in Session is a Beta release.
	 *
	 * @access public
	 * @static
	 * @return boolean
	 */
	public static function is_cocart_carts_in_session_beta() {
		$version = self::get_cocart_carts_in_session_version();

		if ( strpos( $version, 'beta' ) ) {
			return true;
		}

		return false;
	} // END is_cocart_carts_in_session_beta()

	/**
	 * Returns true if CoCart Carts in Session is a Release Candidate.
	 *
	 * @access public
	 * @static
	 * @return boolean
	 */
	public static function is_cocart_carts_in_session_rc() {
		$version = self::get_cocart_carts_in_session_version();

		if ( strpos( $version, 'rc' ) ) {
			return true;
		}

		return false;
	} // END is_cocart_carts_in_session_rc()

	/**
	 * Checks if CoCart Pro is installed.
	 *
	 * @access public
	 * @static
	 * @return array
	 */
	public static function is_cocart_pro_installed() {
		$active_plugins = (array) get_option( 'active_plugins', array() );

		if ( is_multisite() ) {
			$active_plugins = array_merge( $active_plugins, get_site_option( 'active_sitewide_plugins', array() ) );
		}

		return in_array( 'cocart-pro/cocart-pro.php', $active_plugins ) || array_key_exists( 'cocart-pro/cocart-pro.php', $active_plugins );
	} // END is_cocart_pro_installed()

	/**
	 * These are the only screens CoCart will focus
	 * on displaying notices or enqueue scripts/styles.
	 *
	 * @access public
	 * @static
	 * @return array
	 */
	public static function cocart_get_admin_screens() {
		return array(
			'dashboard',
			'dashboard-network',
			'plugins',
			'plugins-network',
			'toplevel_page_cocart',
			'toplevel_page_cocart-network',
		);
	} // END cocart_get_admin_screens()

	/**
	 * Returns true|false if the user is on a CoCart page.
	 *
	 * @access public
	 * @static
	 * @return bool
	 */
	public static function is_cocart_admin_page() {
		$screen    = get_current_screen();
		$screen_id = $screen ? $screen->id : '';

		if ( ! in_array( $screen_id, self::cocart_get_admin_screens() ) ) {
			return false;
		}

		return true;
	} // END is_cocart_admin_page()

	/**
	 * Checks if the current user has the capabilities to install a plugin.
	 *
	 * @access public
	 * @static
	 * @return bool
	 */
	public static function user_has_capabilities() {
		if ( current_user_can( apply_filters( 'cocart_install_capability', 'install_plugins' ) ) ) {
			return true;
		}

		// If the current user can not install plugins then return nothing!
		return false;
	} // END user_has_capabilities()

	/**
	 * Seconds to words.
	 *
	 * Forked from: https://github.com/thatplugincompany/login-designer/blob/master/includes/admin/class-login-designer-feedback.php
	 *
	 * @access public
	 * @static
	 * @param  string $seconds Seconds in time.
	 * @return string
	 */
	public static function cocart_seconds_to_words( $seconds ) {
		// Get the years.
		$years = ( intval( $seconds ) / YEAR_IN_SECONDS ) % 100;
		if ( $years > 1 ) {
			/* translators: Number of years */
			return sprintf( __( '%s years', 'cocart-carts-in-session' ), $years );
		} elseif ( $years > 0 ) {
			return __( 'a year', 'cocart-carts-in-session' );
		}

		// Get the months.
		$months = ( intval( $seconds ) / MONTH_IN_SECONDS ) % 52;
		if ( $months > 1 ) {
			return sprintf( __( '%s months', 'cocart-carts-in-session' ), $months );
		} elseif ( $months > 0 ) {
			return __( '1 month', 'cocart-carts-in-session' );
		}

		// Get the weeks.
		$weeks = ( intval( $seconds ) / WEEK_IN_SECONDS ) % 52;
		if ( $weeks > 1 ) {
			/* translators: Number of weeks */
			return sprintf( __( '%s weeks', 'cocart-carts-in-session' ), $weeks );
		} elseif ( $weeks > 0 ) {
			return __( 'a week', 'cocart-carts-in-session' );
		}

		// Get the days.
		$days = ( intval( $seconds ) / DAY_IN_SECONDS ) % 7;
		if ( $days > 1 ) {
			/* translators: Number of days */
			return sprintf( __( '%s days', 'cocart-carts-in-session' ), $days );
		} elseif ( $days > 0 ) {
			return __( 'a day', 'cocart-carts-in-session' );
		}

		// Get the hours.
		$hours = ( intval( $seconds ) / HOUR_IN_SECONDS ) % 24;
		if ( $hours > 1 ) {
			/* translators: Number of hours */
			return sprintf( __( '%s hours', 'cocart-carts-in-session' ), $hours );
		} elseif ( $hours > 0 ) {
			return __( 'an hour', 'cocart-carts-in-session' );
		}

		// Get the minutes.
		$minutes = ( intval( $seconds ) / MINUTE_IN_SECONDS ) % 60;
		if ( $minutes > 1 ) {
			/* translators: Number of minutes */
			return sprintf( __( '%s minutes', 'cocart-carts-in-session' ), $minutes );
		} elseif ( $minutes > 0 ) {
			return __( 'a minute', 'cocart-carts-in-session' );
		}

		// Get the seconds.
		$seconds = intval( $seconds ) % 60;
		if ( $seconds > 1 ) {
			/* translators: Number of seconds */
			return sprintf( __( '%s seconds', 'cocart-carts-in-session' ), $seconds );
		} elseif ( $seconds > 0 ) {
			return __( 'a second', 'cocart-carts-in-session' );
		}
	} // END cocart_seconds_to_words()

	/**
	 * Check how long CoCart Carts in Session has been active for.
	 *
	 * @access  public
	 * @static
	 * @param   int  $seconds - Time in seconds to check.
	 * @return  bool Whether or not WooCommerce admin has been active for $seconds.
	 */
	public static function cocart_carts_in_session_active_for( $seconds = '' ) {
		if ( empty( $seconds ) ) {
			return true;
		}

		// Getting install timestamp.
		$cocart_installed = get_site_option( 'cocart_carts_in_session_install_date', false );

		if ( false === $cocart_installed ) {
			return false;
		}

		return ( ( time() - $cocart_installed ) >= $seconds );
	} // END cocart_carts_in_session_active_for()

	/**
	 * Get current admin page URL.
	 *
	 * Returns an empty string if it cannot generate a URL.
	 *
	 * @access public
	 * @static
	 * @return string
	 */
	public static function cocart_get_current_admin_url() {
		$uri = isset( $_SERVER['REQUEST_URI'] ) ? esc_url_raw( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '';
		$uri = preg_replace( '|^.*/wp-admin/|i', '', $uri );

		if ( ! $uri ) {
			return '';
		}

		return remove_query_arg( array( 'hide_cocart_carts_in_session_review_notice', 'hide_cocart_carts_in_session_beta_notice', 'hide_forever_cocart_carts_in_session_beta_notice', 'hide_cocart_carts_in_session_upgrade_notice', 'hide_forever_cocart_carts_in_session_upgrade_notice' ), admin_url( $uri ) );
	} // END cocart_get_current_admin_url()

	/**
	 * Determines if the server environment is compatible with this plugin.
	 *
	 * @access public
	 * @static
	 * @return bool
	 */
	public static function is_environment_compatible() {
		return version_compare( PHP_VERSION, CoCart_Carts_in_Session::$required_php, '>=' );
	} // END is_environment_compatible()

	/**
	 * Gets the message for display when the environment is incompatible with this plugin.
	 *
	 * @access public
	 * @static
	 * @return  string
	 */
	public static function get_environment_message() {
		return sprintf( __( 'The minimum PHP version required for this plugin is %1$s. You are running %2$s.', 'cocart-carts-in-session' ), CoCart_Carts_in_Session::$required_php, self::get_php_version() );
	} // END get_environment_message()

	/**
	 * Collects the additional data necessary for the shortlink.
	 *
	 * @access protected
	 * @static
	 * @return array The shortlink data.
	 */
	protected static function collect_additional_shortlink_data() {
		$memory = WP_MEMORY_LIMIT;

		if ( function_exists( 'wc_let_to_num' ) ) {
			$memory = wc_let_to_num( $memory );
		}

		if ( function_exists( 'memory_get_usage' ) ) {
			$system_memory = @ini_get( 'memory_limit' );

			if ( function_exists( 'wc_let_to_num' ) ) {
				$system_memory = wc_let_to_num( $system_memory );
			}

			$memory = max( $memory, $system_memory );
		}

		// WordPress 5.5+ environment type specification.
		// 'production' is the default in WP, thus using it as a default here, too.
		$environment_type = 'production';
		if ( function_exists( 'wp_get_environment_type' ) ) {
			$environment_type = wp_get_environment_type();
		}

		return array(
			'php_version'      => self::get_php_version(),
			'wp_version'       => self::get_wordpress_version(),
			'wc_version'       => self::get_wc_version(),
			'cocart_version'   => self::get_cocart_carts_in_session_version(),
			'days_active'      => self::get_days_active(),
			'debug_mode'       => ( defined( 'WP_DEBUG' ) && WP_DEBUG ) ? 'Yes' : 'No',
			'memory_limit'     => size_format( $memory ),
			'user_language'    => self::get_user_language(),
			'multisite'        => is_multisite() ? 'Yes' : 'No',
			'environment_type' => $environment_type,
		);
	} // END collect_additional_shortlink_data()

	/**
	 * Builds a URL to use in the plugin as shortlink.
	 *
	 * @access public
	 * @static
	 * @param  string $url The URL to build upon.
	 * @return string The final URL.
	 */
	public static function build_shortlink( $url ) {
		return add_query_arg( self::collect_additional_shortlink_data(), $url );
	} // END build_shortlink()

	/**
	 * Gets the current site's PHP version, without the extra info.
	 *
	 * @access private
	 * @static
	 * @return string The PHP version.
	 */
	private static function get_php_version() {
		$version = explode( '.', PHP_VERSION );

		return (int) $version[0] . '.' . (int) $version[1];
	} // END get_php_version()

	/**
	 * Gets the current site's WordPress version.
	 *
	 * @access protected
	 * @static
	 * @return string The wp_version.
	 */
	protected static function get_wordpress_version() {
		return $GLOBALS['wp_version'];
	} // END get_wordpress_version()

	/**
	 * Gets the number of days the plugin has been active.
	 *
	 * @access private
	 * @static
	 * @return int The number of days the plugin is active.
	 */
	private static function get_days_active() {
		$date_activated = get_site_option( 'cocart_carts_in_session_install_date', time() );
		$datediff       = ( time() - $date_activated );
		$days           = (int) round( $datediff / DAY_IN_SECONDS );

		return $days;
	} // END get_days_active()

	/**
	 * Gets the user's language.
	 *
	 * @access private
	 * @static
	 * @return string The user's language.
	 */
	private static function get_user_language() {
		if ( function_exists( 'get_user_locale' ) ) {
			return get_user_locale();
		}

		return false;
	} // END get_user_language()

} // END class

return new CoCart_Helpers();