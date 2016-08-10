 <?php 
 	require('sql.class.php');
	session_start();
	$username=$_SESSION['username'];
	//$task_id = htmlspecialchars($_POST['task_id']);
	$degree = htmlspecialchars($_POST['degree']); 
	$content = htmlspecialchars($_POST['content']);
	$duration = htmlspecialchars($_POST['duration']);
    $deadline = htmlspecialchars($_POST['deadline']);
	$sql="INSERT INTO task_table(task_id,degree,content,duration,deadline)VALUES('','$degree','$content','$duration','$deadline')";
	$res=$dsql->execute($sql);
	if($res){
		header('Location:main.php');
	}
	
	$sql="SELECT * FROM user";
	$res=$dsql->execute($sql);
	while($row=$dsql->fetch_array($res)){
		echo $row['username']."<br/>";
	}
	//echo $row[1];
	*/
	$res=$dsql->execute($sql);
	$row=$dsql->num_rows($res);
	$data=$dsql->result($res,$row,'username');
	//var_dump($data);
?>