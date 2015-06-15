<?php
	ini_set("error_reporting","E_ALL & ~E_NOTICE");
	
	header("Content-type:text/html;charset=utf8");
	
	session_start();
	
	if($_SESSION['username']==null||$_SESSION['cardNum']==null){
		header("Location: login.html");
		exit;
	}
	
	if (!$_GET['page']) {
		$_GET['page']=1;//当前页默认为 1
	}
	$page_count = 10;
	$start_page = ($_GET['page']-1)*$page_count;
	
	include("connect.php");
	
	$result_count = mysql_query("SELECT COUNT(*) FROM moneylog where cardNum = '$_SESSION[cardNum]'");
	if (!$result_count){
	  die('哎呀！系统出错!');
	}
	$temp = mysql_fetch_array($result_count);
	$row_count = $temp['COUNT(*)'];
	
	$page_total = $row_count/$page_count;
	if ($page_total>(int)$page_total) {
		$page_total = (int)$page_total+1;
	}
	
	$sql = "SELECT * from moneylog where cardNum = '$_SESSION[cardNum]'  order by postTime desc LIMIT $start_page , $page_count";
	$result = mysql_query($sql);
	
	if (!mysql_query($sql)){
	  die('哎呀！系统出错!');
	}
	
	
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
			<div class="panel panel-primary">
				<div class="panel-heading">
    				<h2 class="panel-title">账户存储记录</h2>
  				</div>
			  	<div class="table-responsive">
					  <table class="table table-striped table-bordered table-hover">
					  	<thead>
				    		<tr class="info">
								<th>#</th>
				    			<th>交易时间</th>
				    			<th>卡号</th>
				    			<th>收支金额</th>
				    			<th>剩余金额</th>
				    		</tr>
			    		</thead>
						<tbody>
							<?php
				    			$count = $start_page;
				    			while($row = mysql_fetch_array($result)){
				    				++$count;
				    				echo "<tr>";
				    				echo "<th>".$count."</th>";
				    				echo "<td>".$row['postTime']."</td>";
				    				echo "<td>".$row['cardNum']."</td>";
				    				echo "<td>".$row['changeMoney']."</td>";
				    				echo "<td>".$row['keep']."</td>";
				    				echo "</tr>";
				    			}
				    		?>
						</tbody>
					  </table>
			  	</div>
			 	<div class="table-page">
				  		<nav>
						  	<ul class="pagination">
						    	<li>
							      	<a href="log.php?page=1" aria-label="Previous">
							        	<span aria-hidden="true">&laquo;</span>
							      	</a>
						    	</li>
							    <?php
							    	if ($page_total<=5) {
							    		for ($i=1; $i <= $page_total; $i++) { 
							    			echo "<li class='";
							    			if ($i==$_GET['page']) {
							    				echo "active";
							    			}
							    			echo "'><a href='log.php?page=".$i."'>".$i."</a></li>";
							    		}
							    	}else{
							    		if ($_GET['page']<3) {
							    			for ($i=1; $i <= 5; $i++) { 
								    			echo "<li class='";
								    			if ($i==$_GET['page']) {
								    				echo "active";
								    			}
								    			echo "'><a href='log.php?page=".$i."'>".$i."</a></li>";
								    		}
							    		}else{
							    			for ($i=-2; $i <=2; $i++) { 
							    				$j = $_GET['page']+$i;
							    				echo "<li class='";
								    			if ($i==0) {
								    				echo "active";
								    			}
								    			echo "'><a href='log.php?page=".$j."'>".$j."</a></li>";
							    			}
							    		}
							    	}
							    	
							    ?>
							    <li>
								    <a href="log.php?page=<?php echo $page_total; ?>" aria-label="Next">
								       	<span aria-hidden="true">&raquo;</span>
								    </a>
							    </li>
						  </ul>
						</nav>
				  	</div>
				  	<a class="btn btn-primary right" href="options.php" role="button" style="margin-top:15px">返回</a>
			</div>
		</div>
	</body>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</html>