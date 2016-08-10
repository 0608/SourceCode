<?php  require_once('sql.class.php');
 	$sql = "SELECT * FROM time_tabel";
	$week = htmlspecialchars($_POST['week']); 
	$startime = htmlspecialchars($_POST['startime']);
	$duration = htmlspecialchars($_POST['duration']);
    $task_id = htmlspecialchars($_COOKIE['task_id']);
	$sql="INSERT INTO task_table(id,week,content,startime,duration)VALUES('$id','$week','$content','$startime','$duration',$task_id')";
	$res = $dsql->execute($sql);
	if ($res) {
		echo "1";
	} else {
		echo "0";
	}
?>