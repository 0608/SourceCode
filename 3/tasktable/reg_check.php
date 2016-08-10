<?php  require_once('sql.class.php');
	// $conn=mysqli_connect('localhost','root','','agender') or die('连接失败！');
	// mysqli_set_charset($conn,'utf-8');
		session_start();
	
		if(isset($_POST['submit'])){
			
			$username=htmlspecialchars($_POST['user']);
			$password=htmlspecialchars(md5($_POST['password']));
			$confirm=htmlspecialchars(md5($_POST['password-confirm']));
			$phone =htmlspecialchars($_POST['telephone']);
 			$sql0="SELECT * FROM user WHERE username = '$username'";
			//$res=$dsql->execute($sql1);
			if($dsql->num_rows($dsql->execute($sql0))){
		  		echo"<script>alert('用户名存在');location.href ='reg.php'</script>";
			}else{
				$sql="INSERT INTO user(id,username,pwd,confirm,phone)VALUES('','$username','$password','$confirm','$phone')";
				$res=$dsql->execute($sql);
				if($res){
					//echo 2;
					$_SESSION['username']=$username;
					//echo"<script>alert('注册成功');location.href='index.html'</script>";
					header('Location:main.php');
				}
 			}
 		}
 ?>