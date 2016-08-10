<?php require_once('sql.class.php');
session_start();
if(!isset($_SESSION['username'])) exit();
else{
	 $username=$_SESSION['username'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/my.css" />
		<title></title>
	</head>
	<body>
	<?php 
  
	//$username="qwe";
	$sql="SELECT * FROM user a,time_table b WHERE a.id=b.id AND a.username='$username'";
	$res=$dsql->execute($sql);
	//var_dump($res);
	$row=$dsql->fetch_array($res);
?>
		<div class="title">
			<a href="menu.html"><img src="img/back.png" style="margin-left: 20px;display: inline-block;"></a>
			<div class="myfont">个人中心</div>		
		</div>
		<hr style="width:100%;height:1px;border:none;border-top:1px solid #AAAAAA;"/>
		<div class="person">
			<div class="pic" id="upload">
				<img src="img/pic.png" >
			</div>
			
			<div class="nametitle">昵称</div>
			<div class="name"><?php echo $row['username'];?></div>
			

		</div>
		<div class="phone">手机号</div>
		<div class="number"><?php echo $row['phone'];?></div>
		<hr style="width:100%;height:1px;border:none;border-top:1px solid #AAAAAA;margin-top: 0px;margin-bottom: 0px;"/>
		<div class="sub">
		
		</div>
		<div class="mytask">
		<?php 
			$task = json_decode($row['task']);
			var_dump($task);
			// foreach ($task as $key => $value) {
			// 	echo "<p>".$key."</p>";
			// 	echo "<p>".$value."</p>";
			//}
		?>
			<!--<p>周日上午11：00</p>
			<p>练习英语口语四十分钟</p>-->
		</div>
		<hr style="width:100%;height:1px;border:none;border-top:1px solid #AAAAAA;margin-top: 50px;"/>
	</body>
</html>
<?php }  ?>