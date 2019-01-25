<?php

if( ! function_exists('checkSession') ) {
	function checkSession(){
		$CI =& get_instance();
		if( TRUE == isset( $CI->session->userdata['logged_in']['user_id'] ) ){
			return TRUE;
		} else {
		return FALSE;
		}
	}
}

?>