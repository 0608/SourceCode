
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Conten-Type" content="text/html;charset=utf-8"/>
	<title></title>
</head>
<body>

<?php

	require_once('sql.class.php');
	$sql="SELECT * FROM time_table";
	$res=$dsql->execute($sql);
	$i=0;
	while($row=$dsql->fetch_array($res)){
		$task[$i]=json_decode($row['task_id']);
		$startime[$i]=$row['startime'];
		$i++;
	}
	
	$llen=count($task,0);
		for ($row = 0; $row <$llen; $row++) {
		   echo "<p><b>行数$row</b></p>";
		   echo "<ul>";
		   for ($col = 0; $col <  count($task[$row]); $col++) {
			$sql="select * from task_table where task_id='".$task[$row][$col]."'";
			
			$res=$dsql->execute($sql);
			if($row=$dsql->fetch_array($res)){
			$row=$dsql->fetch_array($res);
			$deg[$row][$col]=$row['degree'];
			$con[$row][$col]=$row['content'];

			}
		   }
		   
		}
		
		$llen=count($task,0);
		for ($row = 0; $row <$llen; $row++) {
		   echo "<p><b>行数$row</b></p>";
		   echo "<ul>";
		   for ($col = 0; $col <  count($task[$row]); $col++) {
			 echo "<li>".$task[$row][$col]."</li>";
			 echo "<li>".$deg[$row][$col]."</li>";
			 echo "<li>".$con[$row][$col]."</li>";
		   }
		   echo "</ul>";
		}
		
	 //$rows=array_combine($degree, $duration);
	 

?>
</body>
</html>