<?php
class HttpSend  {

	function getSend($url,$param)
	{
		$ch = curl_init($url."?".$param);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ;
		
		$output = curl_exec($ch);
		
		return $output;	
	}

	function postSend($url,$param){

		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$param);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
}	
	$httpSender=new HttpSend();
	$url = "http://open.bizapp.com/api/sms/templateSend";
	$param="appId=F0000036&tpId=2079723&customerId=C1012422&userId=U1013951&password=CQCcqc123&phones=".$_POST['phone']."&fields="$_SESSION['username']."||健美操||晚上七点||健身房||呵呵哒||崔庆才";
	$gbkparam = iconv("UTF-8","GBK//TRANSLIT",$param);
	$resultXml = $httpSender->postSend($url,$gbkparam);
	$pattern="/\<resultcode\>(.*)\<\/resultcode\>/i";
	if(preg_match($pattern, $resultXml, $arr)){
		//如果状态码为1，发送成功
		if ($arr[1] = "100") {
			echo "1"; 
		} else {
			echo "0";
		}
	} else {
		echo "0";
	}
?>