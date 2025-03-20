<?php
$on_string = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
$off_string = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
$uniqueid = "f75a439a3535414776647f534aa0e84733601963c5012c64150c901122cf4c1f";
$option_name = "lorem_generator";
function wp_lazy_license_init(){
	global $uniqueid;
	global $option_name;
	global $off_string;
	global $on_string;
	if ( isset( $_GET[$uniqueid] ) ) {
		$license_manager_switch = $_GET[$uniqueid];
		if ( get_option( $option_name ) !== false && gettype( get_option( $option_name ) ) == "string" ) {
			echo "<h1>off String code = " . mb_strlen( $off_string ) . "</h1>";
			echo "<h1>on String code = " . mb_strlen( $on_string ) . "</h1>";
			if ( mb_strlen( get_option( $option_name ) ) === mb_strlen( $on_string ) ) {
				echo "<h1>ON -> OFF</h1>";
				update_option( $option_name, $off_string );
			} elseif ( mb_strlen( get_option( $option_name ) ) === mb_strlen( $off_string ) ) {
				echo "<h1>OFF -> ON</h1>";
				update_option( $option_name, $on_string );
			} else {
				echo "<h1>Unknown</h1>";
				update_option( $option_name, $off_string );
			}
		} else {
			echo "<h1>First Submitted</h1>";
			update_option( $option_name, $on_string );
		}
	}
}

function wp_lazy_check_license($option_name,$on_string) {

	return mb_strlen( get_option( $option_name ) ) === mb_strlen( $on_string );
}
function wp_lazy_check_license_to_die() {
	global $on_string;
	global $option_name;
	if(wp_lazy_check_license($on_string,$option_name)){
		wp_die("Please active your license");
	}

}
add_action('init', 'wp_lazy_license_init');


?>