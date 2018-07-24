<?php
	function startSession(  ){
		session_start();
	}
	
	function setSession( $key, $value ){
		$_SESSION[$key] = $value;
	}
	
	function getSession( $key ){
		if( isset( $_SESSION[$key] ) )
			return $_SESSION[$key];
		return null;
	}
	
	function unsetSession( $key ){
		session_unset( $_SESSION[$key] );
	}
	
	function destroySession( ){
		session_unset();
		session_destroy();
	}
?>