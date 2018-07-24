<?php
	function home(){
		if(getSession("log")){
			getModel("homeModel");
			$data = homeModel();
			//var_dump($data);
			getView("homeView",$data);
		}
		else
			header('Location: '.DEFAULT_URL);
	}
?>