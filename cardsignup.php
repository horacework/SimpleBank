<?php
	ini_set("error_reporting","E_ALL & ~E_NOTICE");
	
	header("Content-type:text/html;charset=utf8");
	
	if (@$_POST[cardNum]==null ||@$_POST[password1]==null||@$_POST[password2]==null||@$_POST[startmoney]==null||@$_POST[username]==null) {
		die('哎呀！系统接受不到您的数据！');
	}
	if(mb_strlen($_POST[cardNum],'UTF8')!=8){
		header("Location: signup.html"); 
		exit;
	}
	if(mb_strlen($_POST[password1],'UTF8')!=6 || $_POST[password1]!=$_POST[password2]){
		header("Location: signup.html"); 
		exit;
	}
	if($_POST[startmoney]>100000||$_POST[startmoney]<=0){
		header("Location: signup.html"); 
		exit;
	}
	if(mb_strlen($_POST[username],'UTF8')>10){
		header("Location: signup.html"); 
		exit;
	}
	
	include("connect.php");
	
	$postTime = date('y-m-d h:i:s',time());
	
	$sql1 = "
	INSERT INTO user 
	(cardNum,password,username)
	VALUES
	('$_POST[cardNum]','$_POST[password1]','$_POST[username]')";
	
	if (!mysql_query($sql1)){
	  die('哎呀！系统出错!');
	}
	
	$sql2 = "
	INSERT INTO moneylog 
	(cardNum,changeMoney,keep,postTime)
	VALUES
	('$_POST[cardNum]','$_POST[startmoney]','$_POST[startmoney]','$postTime')";
	
	if (!mysql_query($sql2)){
	  die('哎呀！系统出错!');
	}
	
	mysql_close($con);
	
	session_start();
	
	$_SESSION['username'] = $_POST[username] ;
	
	$_SESSION['cardNum'] = $_POST[cardNum];
	
	header("Location: options.php");
	
?>