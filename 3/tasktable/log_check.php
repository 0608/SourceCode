<?php  
require_once('sql.class.php');
	// $conn=mysqli_connect('localhost','root','','agender') or die('连接失败！');
	// mysqli_set_charset($conn,'utf-8');
    //session_start();
		if(isset($_POST['submit'])){
			
			$username=trim($_POST['user']);
			$password=$_POST['password'];
			$sql="SELECT * FROM user WHERE username='$username'";
			$res=$dsql->execute($sql);
			if($dsql->num_rows($res)<0){
				//echo 3;
				echo'<script>alert("用户不存在");location.href="login.php";</script>';
			}else{
				$row=$dsql->fetch_array($res);
				if(strcmp($row['pwd'],md5($password))!=0){
					//echo 4;
					echo'<script>alert("密码错误");location.href="login.php";</script>';
				}else{
                    echo'<script>alert("登陆成功！");location.href="main.php";</script>';
                    //$_SESSION['username']=$username;
                    //$_SESSION['id']=$row['id'];
                    //header("Location:main.php");
				}
			}
       }
?>