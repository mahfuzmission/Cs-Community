<?php	
	function getModel( $modelName ){
		if( file_exists( MODEL_PATH.$modelName.".php" ) ){
			require_once( MODEL_PATH.$modelName.".php" );
			return $modelName;
		}
		else 
			return false;
	}
		
	function getView( $viewName,$data=false ){
		if( file_exists( VIEW_PATH.$viewName.".php" ) ){
			require_once( VIEW_PATH.$viewName.".php" );
			return $viewName;
		}
		else return false;
	}

?>