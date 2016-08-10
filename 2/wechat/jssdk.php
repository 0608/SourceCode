<?php
/*require('sql.class.php');
$dsql= new mysql;
$dsql->dbServer="localhost";
$dsql->dbUser="root";
$dsql->dbPwd="";
$dsql->dbDatabase="wechat";*/
 $conn = mysqli_connect ( SAE_MYSQL_HOST_M . ':' . SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS,SAE_MYSQL_DB ) or die('failed!');
mysqli_query($conn,'SET NAMES UTF-8');
class JSSDK {
  private $appId;
  private $appSecret;

  public function __construct($appId, $appSecret) {
    $this->appId = $appId;
    $this->appSecret = $appSecret;
  }

  public function getSignPackage() {
    $jsapiTicket = $this->getJsApiTicket();
      // echo $jsapiTicket;

    // 注意 URL 一定要动态获取，不能 hardcode.
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
      // echo $url;

    $timestamp = time();
      // echo $timestamp;
    $nonceStr = $this->createNonceStr();
      // echo $nonceStr;

    // 这里参数的顺序要按照 key 值 ASCII 码升序排序
      // echo '&amp;times';
      $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&amp;timestamp=$timestamp&url=$url";
      //echo $string;
    $signature = sha1($string);

    $signPackage = array(
      "appId"     => $this->appId,
      "nonceStr"  => $nonceStr,
      "timestamp" => $timestamp,
      "url"       => $url,
      "signature" => $signature,
      "rawString" => $string
    );
    return $signPackage; 
  }

  private function createNonceStr($length = 16) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $str = "";
    for ($i = 0; $i < $length; $i++) {
      $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
    }
    return $str;
  }

  private function getJsApiTicket() {
  	 	global $conn;
     //	$link=$dsql->dbconnect();
      $time=time()-7200;
      $sql="SELECT * FROM wx_jsapiticket WHERE uptime>$time and jsapiticket !=''";
      //$row=$dsql->num_rows($dsql->execute($sql));
      $query=mysqli_query($conn,$sql);
      if( $rows=mysqli_num_rows($query)){
      	
					$row=mysqli_fetch_array($query);
          $jsapiticket= $row['jsapiticket'];//从数据库取
      }else{
          //如果数据库没有保存有效的jsApiTicket，就重新生成并存入数据库
          $accessToken = $this->getAccessToken();//获取access_token
          // echo $accessToken;
          $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$accessToken";
     		  $res = json_decode($this->httpGet($url));
          //插入数据库做缓存
          $nowtime=time();
		  		$jsapiticket=$res->ticket;
          if(!empty($jsapiticket)){
             $sql="INSERT INTO wx_jsapiticket(id,jsapiticket,uptime)VALUES('','{$jsapiticket}','{$nowtime}')";
            //$dsql->execute($sql);
             $query=mysqli_query($conn,$sql);
          } 
				 
	  	}
		      
        return  $jsapiticket;//获取jsApi_ticket
  }
    // jsapi_ticket 应该全局存储与更新，以下代码以写入到文件中做示例
//  $data = json_decode(file_get_contents("jsapi_ticket.json"));
//  if ($data->expire_time < time()) {
//    $accessToken = $this->getAccessToken();
//    // 如果是企业号用以下 URL 获取 ticket
//    // $url = "https://qyapi.weixin.qq.com/cgi-bin/get_jsapi_ticket?access_token=$accessToken";
//    $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$accessToken";
//    $res = json_decode($this->httpGet($url));
//    $ticket = $res->ticket;
//    if ($ticket) {
//      $data->expire_time = time() + 7000;
//      $data->jsapi_ticket = $ticket;
//      $fp = fopen("jsapi_ticket.json", "w");
//      fwrite($fp, json_encode($data));
//      fclose($fp);
//    }
////  } else {
//    $ticket = $data->jsapi_ticket;
//    }
//
//  return $ticket;
 

  private function getAccessToken() {
  	global $conn;
   //  $link=$dsql->dbconnect();
    $time=time()-7200;
    $sql="SELECT * FROM wx_accesstoken where uptime>$time";
    $query=mysqli_query($conn,$sql);
    if($rows=mysqli_num_rows($query)){
    	
    	 $row=mysqli_fetch_array($query);
		
      	$access_token=$row['access_token'];//从数据库取
      	
    }else{
    	
      	  $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$this->appId&secret=$this->appSecret";
     		  $res = json_decode($this->httpGet($url));
          //access_token插入数据库做缓存  
          $time=time();
		  		$access_token=$res->access_token;
          $sql="INSERT INTO wx_accesstoken(id,access_token,uptime)VALUES('','{$access_token}','{$time}')";
          // $query=$dsql->execute($sql);
		      $query=mysqli_query($conn,$sql);
    }
		  
        return $access_token;//获取access_token
      
    }
    // access_token 应该全局存储与更新，以下代码以写入到文件中做示例
//  $data = json_decode(file_get_contents("access_token.json"));
//  if ($data->expire_time < time()) {
//    // 如果是企业号用以下URL获取access_token
//    // $url = "https://qyapi.weixin.qq.com/cgi-bin/gettoken?corpid=$this->appId&corpsecret=$this->appSecret";
//    $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$this->appId&secret=$this->appSecret";
//    $res = json_decode($this->httpGet($url));
//    $access_token = $res->access_token;
//    if ($access_token) {
//      $data->expire_time = time() + 7000;
//      $data->access_token = $access_token;
//      $fp = fopen("access_token.json", "w");
//      fwrite($fp, json_encode($data));
//      fclose($fp);
//    }
//  } else {
//    $access_token = $data->access_token;
//  }
//  return $access_token;
//}

  private function httpGet($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 500);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_URL, $url);

    $res = curl_exec($curl);
    curl_close($curl);

    return $res;
  }
}
