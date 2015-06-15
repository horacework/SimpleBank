<?php
	ini_set("error_reporting","E_ALL & ~E_NOTICE");
	
	header("Content-type:text/html;charset=utf8");
	
	session_start();
	
	if($_SESSION['username']==null||$_SESSION['cardNum']==null){
		header("Location: login.html");
		exit;
	}
	
	include("connect.php");
	
	$sql1 = "SELECT * from moneylog where cardNum = '$_SESSION[cardNum]'  order by postTime desc";
	$result = mysql_query($sql1);
	
	if (!mysql_query($sql1)){
	  die('哎呀！系统出错!');
	}
	
	$userInfo = mysql_fetch_array($result);
	$userKeepBefore = $userInfo['keep'];
	
	mysql_close($con);
?>

<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<title>银行储蓄卡管理系统</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
			<link rel="stylesheet" href="css/common.css">
	</head>
	<body>
		<nav class="navbar navbar-default">
		  <div class="container">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="#">X X 银行储蓄卡管理系统</a>
		    </div>
			<div class="navbar-header navbar-right">
		      <a class="navbar-brand" href="#">您好，<?php echo $_SESSION['username']; ?></a>
		    </div>
		  </div>
		</nav>
		<div class="container moneykeep">
			<div class="panel panel-default">
				<div class="panel-heading">
    				<h2 class="panel-title">账户余额</h2>
  				</div>
		  		<div class="panel-body">
		    		<?php echo $userKeepBefore; ?>元
		  		</div>
			  	<a class="btn btn-primary right" href="options.php" role="button" style="margin-top:15px">返回</a>
			</div>
		</div>
	</body>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</html>