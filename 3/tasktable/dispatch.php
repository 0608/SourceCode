
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Conten-Type" content="text/html;charset=utf-8"/>
	<title></title>
</head>
<body>

<?php

	/*$task传进来应该是该形式
	$task=array(
			array("2"=>"35","3"=>"37","1"=>"43"),
			array("1"=>"35","2"=>"37","3"=>"43"),
			array("2"=>"35","3"=>"37","1"=>"43"),
			
		);
		*/
	require_once('sql.class.php');
	
	function tasksort($task){	
		$rlen=count($task);
		for($row=0;$row<$rlen;$row++){
			krsort($task[$row]);
		}	
		$i=0;	
		for ($row = 0; $row <$rlen; $row++) {	 
		   foreach($task[$row] as $x=>$x_value)
			{
				$list[$i]=$x_value;
				echo $list[$i]."  ";
				$i++;
			}
		}	
		 return $list;
		}
	   //$time $task分别是一周的空闲时间和需要完成的任务需要的时间，均为一维数组
	function Dispatch($time,$task) {
		if(array_sum($time) < array_sum($task)){
			echo 'time is wrong';
			return 0;
		}
		$tlen=count($time);
		$klen=count($task);
		$it=0;
		$ik=0;
		$is=0;
		$list[$it][$is]=$ik;
		$is++;
		$short=$time[$it]-$task[$ik];
		while($it<$tlen && $ik<$klen){			
			while( $short>0){
				$ik++;
				if($it<$tlen && $ik<$klen){
					$list[$it][$is]=$ik;
					$is++;
					$short=$short-$task[$ik];
				}
				else break;				
			}
			while( $short<0){			
				$it++;
				if($it<$tlen && $ik<$klen){
					
					$is=0;
					$list[$it][$is]=$ik;
					echo '$list['.$it.']['.$is.']:'.$list[$it][$is];
					$is++;
					$short=$short+$time[$it];
				}
				else break;
			}
			while( $short==0){
				$it++;
				$is=0;
				$ik++;
				if($it<$tlen && $ik<$klen){
					$list[$it][$is]=$ik;
					$short=$time[$it]-$task[$ik];
				}
				else break;
			}
		}
		while($it<$tlen-1){
			$it++;
			$is=0;
			$list[$it][$is]=-1;
			
		}
		return $list;
		
	}
	
	
	
		//$time = array(60,30,120,90,40);
		//$task = array(30,20);
		//$list=Dispatch($time,$task); 
	$sql='select * from task_table order by deadline,degree';	
	$res=$dsql->execute($sql);
	$i=0;
	while($row=$dsql->fetch_array($res)){
		//$deadline[$i]=$row['deadline'];
		$task[$i]=$row['duration'];
		$i++;
	}
	$sql='select * from time_table order by startime';	
	$res=$dsql->execute($sql);
	$i=0;
	while($row=$dsql->fetch_array($res)){
		$startime[$i]=$row['startime'];
		$time[$i]=$row['duration'];
		$i++;
	}
	//echo "task:<br>";
	for($e=0;$e<count($task);$e++){
	//	echo $task[$e];
	//	echo '<br>';
	}
	echo "time:<br>";
	for($e=0;$e<count($time);$e++){
	//	echo $time[$e];
	//	echo '<br>';
	}
	$list=Dispatch($time,$task);
	
	for($x=0;$x<count($list);$x++){
		$c=json_encode($list[$x]);
		$sql="update time_table set task_id= '".$c."' where tid=".$x;
		$res=$dsql->execute($sql);
		if(!$res){
			echo 0;
		}
		
	//	echo $sql;
	}
	

	
	
	$tem=substr((string)$startime[0],0,10);
	$len=count($time);
	//var_dump($rows);
	$i=0;$j=0;
	$weektime[$i][$j]=$time[0];	
	for($k=1;$k<$len;$k++){
		$value=$startime[$k];
		$key=$time[$k];
		$str=(string)$value;
		$str=substr($str,0,10);
		//echo "tem:".$tem."str:".$str."+i:".$i."  +".$str.'<br>';
		if(strcmp($tem,$str)==0){
			$j++;
			$weektime[$i][$j]=$key;
		}
		else{
			$i++;
			$j=0;
			$weektime[$i][$j]=$key;
			$tem=$str;
		}
	}
	
/*	$m=count($weektime);
	$b=0;
	for($r=0;$r<$m;$r++){
		$n=count($weektime[$r]);
		for($t=0;$t<$n;$t++){
			if($b<count($list)){
				$weektime[$r][$t]=$list[$b];
				$b++;
			}
			
		}
	}
	*/
	
	//for($q=0;$q<count($weektime);$q++){
/*		$llen=count($weektime,0);
		for ($row = 0; $row <$llen; $row++) {
		   echo "<p><b>行数$row</b></p>";
		   echo "<ul>";
		   for ($col = 0; $col <  count($weektime[$row]); $col++) {
			 echo "<li>".$weektime[$row][$col]."</li>";
		   }
		   echo "</ul>";
		}
//	}
	

/*$cars = array
   (
   array("Volvo",33,20,90,89,90),
   array("BMW",17,15),
   array("Saab",5,2),
   array("Land Rover",15,11)
   );
   $r=count($cars,0);
   $r0=count($cars[0]);
   $r1=count($cars[1]);
   $r2=count($cars[2]);
   $all=count($cars,1);
   
   echo 'r:'.$r;
   echo 'r0:'.$r0;
   echo 'r1:'.$r1;
   echo 'r2:'.$r2;
   echo 'all:'.$all;
for ($row = 0; $row < $r; $row++) {
   echo "<p><b>行数 $row</b></p>";
   echo "<ul>";
   for ($col = 0; $col < count($cars[$row]); $col++) {
     echo "<li>".$cars[$row][$col]."</li>";
   }
   echo "</ul>";
}
*/
?>

</body>
</html>