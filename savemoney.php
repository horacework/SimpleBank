<?php
	ini_set("error_reporting","E_ALL & ~E_NOTICE");
	
	header("Content-type:text/html;charset=utf8");
	
	session_start();
	
	if($_SESSION['username']==null||$_SESSION['cardNum']==null){
		header("Location: login.html");
		exit;
	}
	if ($_POST[startmoney]==null) {
		die('哎呀！系统接受不到您的数据！');
	}
	if($_POST[startmoney]<=0){
		echo "<script language=\"javascript\">alert(\"存入金额非法\");</script>";
		echo "<script language=\"javascript\">history.go(-1);</script>"; 
		exit;
	}
	
	include("checkpost.php");
	include("connect.php");
	
	$postTime = date('y-m-d h:i:s',time());
	
	$sql1 = "SELECT * from moneylog where cardNum = '$_SESSION[cardNum]'  order by postTime desc";
	$result = mysql_query($sql1);
	$userInfo = mysql_fetch_array($result);
	$userKeepBefore = $userInfo['keep'];
	$userKeepAfter = $userKeepBefore + $_POST[startmoney];
	if($userKeepAfter>1000000000){
		echo "<script language=\"javascript\">alert(\"存入金额过大\");</script>";
		echo "<script language=\"javascript\">history.go(-1);</script>"; 
		exit;
	}
	
	$sql2 = "
	INSERT INTO moneylog 
	(cardNum,changeMoney,keep,postTime)
	VALUES
	('$_SESSION[cardNum]','$_POST[startmoney]','$userKeepAfter','$postTime')";
	
	if (!mysql_query($sql2)){
	  die('哎呀！系统出错!');
	}
	
	mysql_close($con);
	
	echo "<script language=\"javascript\">alert(\"成功存入".$_POST[startmoney]."元\");</script>";
	
	echo "<script language=\"javascript\">window.location=\"options.php\";</script>";
	
?>