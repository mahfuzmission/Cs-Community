<?php
	function checklogin(){
		$log = getSession("log");
		
		if( $log )
			header('Location: '.DEFAULT_URL.'profile');
		else
			header('Location: '.DEFAULT_URL);
	}
?>