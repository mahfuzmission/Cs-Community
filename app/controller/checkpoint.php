<?php
	function checkpoint(){
		$loginModel = getModel( "checkLoginModel" );
		$log = $loginModel();
	}
?>