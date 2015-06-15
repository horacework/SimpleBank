<?php
	ini_set("error_reporting","E_ALL & ~E_NOTICE");
	
	header("Content-type:text/html;charset=utf8");
	
	session_start();
	
	if($_SESSION['username']==null||$_SESSION['cardNum']==null){
		header("Location: login.html");
		exit;
	}
	include("connect.php");
	
	$postTime = date('y-m-d h:i:s',time());
	
	$sql1 = "SELECT * from moneylog where cardNum = '$_SESSION[cardNum]'  order by postTime desc";
	$result = mysql_query($sql1);
	if (!$result){
	  die('哎呀！系统出错!');
	}
	$userInfo = mysql_fetch_array($result);
	$userKeepBefore = $userInfo['keep'];
	
	$sql2 = "
	INSERT INTO moneylog 
	(cardNum,changeMoney,keep,postTime)
	VALUES
	('$_SESSION[cardNum]','-$userKeepBefore','0','$postTime')";
	if (!mysql_query($sql2)){
	  die('哎呀！系统出错!');
	}
	
	$sql3 = "UPDATE user SET isDel = 1 WHERE cardNum = $_SESSION[cardNum]";
	if (!mysql_query($sql3)){
	  die('哎呀！系统出错!');
	}
	
	mysql_close($con);
	
	session_unset();
	
	session_destroy();
	
	echo "<script language=\"javascript\">alert(\"成功取出账户所有余额：".$userKeepBefore."元\");</script>";
	
	echo "<script language=\"javascript\">alert(\"成功注销账户，感谢使用！\");</script>";
	
	echo "<script language=\"javascript\">window.location=\"index.html\";</script>";
?>