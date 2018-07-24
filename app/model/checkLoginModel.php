<?php
	function checkLoginModel(){
		$log = getSession("log");
		if( $log )
			return true;
		else return false;
	}
?>