<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
			<link rel="stylesheet" href="css/login.css" />
		<title></title>
		 <script type="text/javascript">
	     function Check()
	       {
		 	if(send.user.value==''){
				 window.alert('填写用户名!');
				 send.user.focus();
				 return false;
			 }
			
			 if(send.password.value==''){
				 alert('输入密码！');
				 send.password.focus();
				 return false;
			 }
			 
		 }
	 </script>
	<body>
		<div class="context1">
		<form   method="post" action="log_check.php" name="send" onsubmit="return Check();">
			<img src="img/usr.png" style="margin-left: 24px;">
			<input type="text" name="user" class="InputBox1" placeholder="昵称">
			<hr style="width:270px;border:1px solid #AAAAAA;"/>
			<img src="img/psd.png" style="margin-left: 24px;">	
			<input type="password" name="password" class="InputBox2" placeholder="密码">
				
			<hr style="width:270px;border:1px solid #AAAAAA;"/>
		<input type="submit" name="submit" value="登录" class="denglu"/>
		</form>
		<button class="zhuce" onclick="javascrtpt:window.location.href='reg.php'">注册</button>
		</div>
		<div class="context2">
		<div class="qq"></div>
		<div class="weixin"></div>
		</div>
	</body>
</html>
