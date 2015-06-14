<?php
	ini_set("error_reporting","E_ALL & ~E_NOTICE");
	
	header("Content-type:text/html;charset=utf8");
	
	if (@$_POST[cardNum]==null ||@$_POST[password]==null) {
		die('哎呀！系统接受不到您的数据！');
	}
	if(mb_strlen($_POST[cardNum],'UTF8')!=8){
		header("Location: signup.html"); 
		exit;
	}
	if(mb_strlen($_POST[password],'UTF8')!=6){
		header("Location: signup.html"); 
		exit;
	}
	
	include("checkpost.php");
	
	include("connect.php");
	
	$sql = "SELECT * from user where cardNum=".$_POST[cardNum];
	
	$result = mysql_query($sql);
	$userInfo = mysql_fetch_array($result);
	if($userInfo == null){
		echo "<script language=\"javascript\">alert(\"卡号不存在\");</script>";   
    	echo "<script language=\"javascript\">history.go(-1);</script>";
		exit;
	}
	if($userInfo['password'] != $_POST[password]){
		echo "<script language=\"javascript\">alert(\"卡号或密码错误\");</script>";   
    	echo "<script language=\"javascript\">history.go(-1);</script>";
		exit;
	}
	mysql_close($con);
	
	session_start();	
	$_SESSION['username'] = $userInfo['username'] ;
	$_SESSION['cardNum'] = $userInfo['cardNum'];
	
	header("Location: options.php");
	
?>