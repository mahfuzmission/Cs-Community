<?php
	function logoutModel(){
		$cond = "user_id = '". (getSession("id") + 100000)."'";
		$table["online_status"] = 0;
		updateTable( "users", $table, $cond );
		setSession("log", false);
		destroySession();
	}
?>