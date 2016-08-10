
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="css/freetime.css" rel="stylesheet"> 
		<script src="js/jquery-1.7.2.min.js"></script>
		<title></title>
	</head>
	<body>
		<div class="title">
			<a href="menu.php"><img src="img/back.png" style="margin-left: 7px;display: inline-block;"></a>
			<div class="myfont">FreeTime</div>		
		</div>
		<hr style="width:100%;height:1px;border:none;border-top:1px solid #AAAAAA;"/>
		<table>
			<?php 
				$i=0;
				for($i=0;$i<48;$i++) {
					if($i % 8 == 0) {
						echo '<tr bgcolor="#aaaaaa">';
					}
					echo "<td id=".$i."></td>";
					if($i % 8== 7){
						echo "</tr>";
					}
				}
			?>
		</table>
		
		<script>
			$(function(){
				arr = new Array();
				for(var i = 0; i < 48; i ++) {
					arr[i] = 0;
				}
				$("table td").on("click", function() {
					if (arr[parseInt($(this).attr('id'))] == 1) {
						arr[parseInt($(this).attr('id'))] = 0;
						$(this).css("background-color","#AAAAAA");
					}else if (arr[parseInt($(this).attr('id'))] == 0) {
						arr[parseInt($(this).attr('id'))] = 1;
						$(this).css("background-color","lightblue");
					}
					var start = 0; 
					console.log(arr);
				});
				$(".succeed").click(function(){
					for (var i = 0; i < 48; i ++) {
						list1=new Array();
						list2 = new Array();
						if (arr[i] == 1) {
							var date = new Date();
							minute =  date.getMinutes();
							start = arr[i] * 30;
							console.log(date.toLocaleString());
							date.setMinutes(date.getMinutes()+start);
							date = date.toLocaleString();
							date = date.substring(0,10)+" "+date.substring(13,21);
							//console.log(date);
							duration = 30;
							list1=array(date);
							list2=array(duration);

						}
							if(date!=""||duration!=""){
								list1.concat(list1);
								list2.concat(list2);
							}
					}
					console.log(list1);
					$.post("addfreetime.php", {date:list1,duration:list2}, function(data) {
						if(data==1){
							alert('success!');
						}
					});
				});
			});
		</script>
		<button class="succeed">OK</button>
		
		<img src="img/1.png" style="left:0px;top:50px">
		<img src="img/2.png" style="left:68px;bottom:0px">
		<img src="img/3.png" style="left:38%;top:18px">
		<img src="img/4.png" style="right:0px;top:45px">
		<img src="img/5.png" style="left:0px;bottom:32px">
		<img src="img/6.png" style="right:0px;bottom:70px">
		<img src="img/7.png" style="right:0px;bottom:0px">
	</body>
</html>
