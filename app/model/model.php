<?php
	function getService( $serviceName ){
		if( file_exists( SERVICE_PATH.$serviceName.".php" ) ){
			require_once( SERVICE_PATH.$serviceName.".php" );
			return true;
		}
		else 
			return false;
	}
	
	function getDataBase( $dataName ){
		if( file_exists( DATA_PATH.$dataName.".php" ) ){
			require_once( DATA_PATH.$dataName.".php" );
			return true;
		}
		else
			return false;
	}
	
?>