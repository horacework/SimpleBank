<?php
	ini_set("error_reporting","E_ALL & ~E_NOTICE");
	
	header("Content-type:text/html;charset=utf8");
	
	session_start();
	session_unset();
	session_destroy();
	
	echo "<script language=\"javascript\">alert(\"退出账号成功！\");</script>";
	
	echo "<script language=\"javascript\">window.location=\"index.html\";</script>";
?>