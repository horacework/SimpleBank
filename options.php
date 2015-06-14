<?php
	ini_set("error_reporting","E_ALL & ~E_NOTICE");
	
	header("Content-type:text/html;charset=utf8");
	
	session_start();
	if($_SESSION['username']==null||$_SESSION['cardNum']==null){
		header("Location: login.html");
		exit;
	}
	// echo $_SESSION['username'];
	// echo $_SESSION['cardNum'];
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
		<div class="container optionContainer">
			<a class="optionBlock left" href="save.html">存款</a>
			<a class="optionBlock right" href="take.html">取款</a>
			<a class="optionBlock left" href="keep.php" style="margin-top:40px">查询余额</a>
			<a class="optionBlock right" href="log.php" style="margin-top:40px">查询记录</a>
		</div>
		
	</body>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</html>