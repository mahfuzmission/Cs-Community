<?php
	define('ROOT',dirname(__FILE__));

	require_once(ROOT."/services/config.php");
	require_once(ROOT."/app/controller/controller.php");
	require_once(ROOT."/app/model/model.php");
	require_once(ROOT."/services/router.php");
	require_once(ROOT."/services/sessionHandler.php");
	require_once(ROOT."/services/encryption.php");
	require_once(ROOT."/services/form.php");
	require_once(ROOT."/data/DBconnect.php");
	
	
	startSession();
	router();
?>