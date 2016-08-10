<?php  require_once('sql.class.php');
	session_start();
	function getWeek($unixTime=''){
	$unixTime=is_numeric($unixTime)?$unixTime:time();
	$weekarray=array('日','一','二','三','四','五','六');
	return '星期'.$weekarray[date('w',$unixTime)];
   }

 	$sql = "SELECT * FROM time_tabel";
	$week = getWeek(strtotime('+1 days'));
	$list= $_POST['list'];
	$startime = htmlspecialchars($_POST['startime']);
	$duration = htmlspecialchars($_POST['duration']);
	$id = $_SESSION['id'];
	$sql="INSERT INTO time_table(id,week,startime,duration,task_id)VALUES('$id','$week','$startime','$duration','$task_id')";
	$res = $dsql->execute($sql);
	if ($res) {
		echo "1";
	} else {
		echo "0";
	}
?>