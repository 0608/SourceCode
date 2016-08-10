<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="js/jquery-1.7.2.min.js"></script>
	<script>
			function getFileSize(fileName) {
                var byteSize = 0;
                //console.log($("#" + fileName).val());
                if($("#" + fileName)[0].files) {
                    var byteSize  = $("#" + fileName)[0].files[0].size;
                }else {
    //此处由于有浏览器兼容问题 还没完成大小判断的逻辑
                }
                //alert(byteSize);
                byteSize = Math.ceil(byteSize / 1024) //KB
                return byteSize;//KB
            }
            $("#btnUpload").click(function () {
                var allowImgageType = ['jpg', 'jpeg', 'png', 'gif'];
                var file = $("#file1").val();
                //获取大小
                var byteSize = getFileSize('file1');
                //获取后缀
                if (file.length > 0) {
                    if(byteSize > 2048) {
                        alert("上传的附件文件不能超过2M");
                        return;
                    }
                    var pos = file.lastIndexOf(".");
                    //截取点之后的字符串
                    var ext = file.substring(pos + 1).toLowerCase();
                    //console.log(ext);
                    if($.inArray(ext, allowImgageType) != -1) {
                        ajaxFileUpload();
                    }else {
                        alert("请选择jpg,jpeg,png,gif类型的图片");
                    }
                }
                else {
                    alert("请选择jpg,jpeg,png,gif类型的图片");
                }
            });

			function ajaxFileUpload() {
                $.ajaxFileUpload({
                    url: 'action.php', //用于文件上传的服务器端请求地址
                    secureuri: false, //一般设置为false
                    fileElementId: 'file1', //文件上传空间的id属性  <input type="file" id="file" name="file" />
                    dataType: 'json', //返回值类型 一般设置为json
                    success: function (data, status)  //服务器成功响应处理函数
                    {
                        //var json = eval('(' + data + ')');
                        //alert(data);
                        $("#picture_original>img").attr({src: data.src, width: data.width, height: data.height});
                        $('#imgsrc').val(data.path);
                        //alert(data.msg);
                        //同时启动裁剪操作，触发裁剪框显示，让用户选择图片区域
                        var cutter = new jQuery.UtrialAvatarCutter({
                                //主图片所在容器ID
                                content : "picture_original",
                                //缩略图配置,ID:所在容器ID;width,height:缩略图大小
                                purviews : [{id:"picture_200",width:200,height:200},{id:"picture_50",width:50,height:50},{id:"picture_30",width:30,height:30}],
                                //选择器默认大小
                                selector : {width:200,height:200},
                                showCoords : function(c) { //当裁剪框变动时，将左上角相对图片的X坐标与Y坐标 宽度以及高度
                                    $("#x1").val(c.x);
                                    $("#y1").val(c.y);
                                    $("#cw").val(c.w);
                                    $("#ch").val(c.h);
                                },
                                cropattrs : {boxWidth: 500, boxHeight: 500}
                            }
                        );
                        cutter.reload(data.src);
                        $('#div_avatar').show();
                    },
                    error: function (data, status, e)//服务器响应失败处理函数
                    {
                        alert(e);
                    }
                })
                return false;
            }

            $('#btnCrop').click(function() {
                $.getJSON('action2.php', {x: $('#x1').val(), y: $('#y1').val(), w: $('#cw').val(), h: $('#ch').val(), src: $('#imgsrc').val()}, function(data) {
                    alert(data.msg);
                });
                return false;
            });
	// <!--$(document).ready(function(){
	//   $("button").click(function(){
	//   	 $.get("dataDeal.php",function(data,status){
	//   	 	if(data=1){
	//   	 		alert('用户已存在！');
	//   	 	}
	// 			switch (data){
	// 				case 1:
	// 				alert('用户已存在！');
	// 				break;
	// 				case 2:
	// 				alert('注册成功！');
	// 				break;
	// 				case 3:
	// 				alert('用户不存在！');
	// 				break;
	// 				case 4:
	// 				alert('密码错误！')；
	// 				break;
	// 				default:
	// 				alert('登陆成功！')
	// 			}
				//$(".ajax.ajaxResult").html("");
				// $("item",data).each(function(i, domEle){
				// 	$(".ajax.ajaxResult").append("<li>"+$(domEle).children("title").text()+"</li>");
				// });
				//alert('用户已存在');
	// 		complete: function(XMLHttpRequest, textStatus){
	// 			//HideLoading();
	// 		},
	// 		error: function(){
	// 		//请求出错处理
	// 		alert('出错！');
	// 		}
	// 		});
	//   });
		
	// });-->
	</script>
<!DOCTYPE html>
<html>
<head>
<script src="js/jquery-1.7.2.min.js"></script>
<script>
$(document).ready(function(){
  $("button").click(function(){
    $.get("dataDeal.php",function(data,status){
      //alert("数据：" + data + "\n状态：" + status);
     
      //var data1 = data;
       //alert(data1);
      //  if(data==1){
	  	 	// 	alert('用户已存在！');
	  	 	// }
       switch(Number(data))
       {
					case 1:
						alert('用户已存在！');
						break;
					case 2:
						alert('注册成功！');
						break;
					case 3:
						alert('用户不存在！');
						break;
					case 4:
						alert('密码错误！');
						break;
					default:
					    alert(data);
						alert('登陆成功！');
		}
    });
  });
});
</script>

</head>
<body>
	<!--<form action="config.php" method="post">
		用户名:<input type="text" name="username"/>
		密码:<input type="password" name="password"/>
		<input type="submit" name="submit" value="提交"/>
	</form>
	-->
	<button>点击</button>
</body>
</html>