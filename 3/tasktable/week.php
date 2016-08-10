<?php
//php判断某一天是星期几的方法
function getWeek($unixTime=''){
	$unixTime=is_numeric($unixTime)?$unixTime:time();
	$weekarray=array('日','一','二','三','四','五','六');
	return '星期'.$weekarray[date('w',$unixTime)];
}
//php输出昨天是星期几
echo getWeek(strtotime('-1 days'));
//php输出今天天是星期几
echo getWeek();
//php输出明天是星期几
echo getWeek(strtotime('+1 days'));
?>