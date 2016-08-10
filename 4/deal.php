<?php require_once('sql.class.php');
if($_POST['id']){
	$bookid = $_POST['id'];
	$num = $_POST['num'];
	$address = $_POST['address'];
	$sql ="INSERT INTO dingdan VALUES('','$bookid','$num','$address','0')";
	$query = $dsql->execute($sql);
	if($query){
		echo $query;
	}else{
		echo 0;
	}
}


?>