<?php
	$con = mysql_connect("localhost","root","");

	if (!$con){
	  die('连接数据库失败！');
	}

	mysql_select_db("banksystem", $con);

	mysql_query("set names utf8");
?>