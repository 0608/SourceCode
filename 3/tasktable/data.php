<?php
// $list1 = array('1' => '111','2' => '222');
// $list2 = array('3' => '333','4' => '444');
// $list = array($list1,$list2);
// $lista = json_encode($list);
// echo $lista;
//print_r($lista);
require_once('sql.class.php');
$sql="SELECT * FROM task_table";
$res=$dsql->execute($sql);
$i=0;
while($row=$dsql->fetch_array($res)){
	$degree[$i]=$row['degree'];
	$duration[$i]=$row['duration'];
	$i++;
}
 $rows=array_combine($degree, $duration);

?>