<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/reg.css" />
		<title></title>
		<script src="js/jquery-1.7.2.min.js"></script>
		<script>
		$("#sendtext").click(function(){
			$("#sendtext").val("正在发送..");
			$.post("Auth.php",{"phone":$("#text_form").val()},function(data){//三个参数('动作url',参数，返回函数)
				if(data==1){
					alert('success!');
				}else{
					if(data=0)
				}
			});

		})
		//   {
		//   	 $.get("Auth.php",function(data,status){
		//   	 	if(data=1){
		//   	 		alert('用户已存在！');
		//   	 	}
		// 			//$(".ajax.ajaxResult").html("");
		// 			// $("item",data).each(function(i, domEle){
		// 			// 	$(".ajax.ajaxResult").append("<li>"+$(domEle).children("title").text()+"</li>");
		// 			// });
		// 			//alert('用户已存在');
		// 		complete: function(XMLHttpRequest, textStatus){
		// 			//HideLoading();
		// 		},
		// 		error: function(){
		// 		//请求出错处理
		// 		alert('出错！');
		// 		}
		// 		});
		//   });
			
		//});
		</script>
		 <script type="text/javascript">
	     function Check()
	       {
		 	if(send.user.value==''){
				 window.alert('填写用户名!');
				 send.user.focus();
				 return false;
			 }
			 if(send.user.value.length<2){
				 window.alert('用户名长度小于2！');
			 	return false;
			 }
			 if(send.password.value==''){
				 alert('输入密码！');
				 send.password.focus();
				 return false;
			 }
			 if(send.password.value.length<6){
				 alert('密码长度必须大于6');
				 return false;
			 }
		 	if(send.password.value().trim() != send.password-confirm.value().trim()){
				 alert('密码不一致！');
			 	return false;
			 }
		 }
	 </script>
	</head>
	<body>
		<div class="context1">
		<form  name="send" method="post" action="reg_check.php" onsubmit="return Check();">
			<img src="img/usr.png" style="margin-left: 24px;">
			<input type="text" name="user" class="InputBox" placeholder="昵称">
			<hr style="width:270px;border:1px solid #AAAAAA;"/>
			<img src="img/phonelogo.png" style="margin-left: 24px;">	
			<input type="text" name="telephone" class="InputBox" id="text_form" placeholder="手机号">
			<hr style="width:270px;border:1px solid #AAAAAA;"/>	
			<img src="img/psd.png" style="margin-left: 24px;">	
			<input type="password" name="password" class="InputBox" placeholder="密码">
			<hr style="width:270px;border:1px solid #AAAAAA;"/>
			<input type="password" name="password-confirm" class="InputBox2" placeholder="确认密码">
			<hr style="width:270px;border:1px solid #AAAAAA;"/>	
			<input type="submit" value="注册" name="submit" class="zhuce"/>
		</form>
		</div>
		<div class="context2">
			<div class="qq"></div>
		    <div class="weixin" ></div>
		</div>
	</body>
</html>
