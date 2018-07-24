<?php
	function logout(){
		$logoutModel = getModel("logoutModel");
		
		$logoutModel();
		header('Location: '.DEFAULT_URL);
	}
?>