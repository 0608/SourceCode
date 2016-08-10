 <?php
 class mysql
 { 
  var $dbServer;
  var $dbDatabase; 
  var $dbUser;
  var $dbPwd;
  var $dbLink;
   function __construct($dbServer,$dbUser,$dbPwd,$dbDatabase){
  	$this->dbServer=$dbServer;
  	$this->dbUser=$dbUser;
  	$this->dbPwd=$dbPwd;
  	$this->dbbase=$dbDatabase;
  }

function dbconnect()
{
   $dbLink=mysqli_connect($this->dbServer,$this->dbUser,$this->dbPwd,$this->dbDatabase);
   if(!$dbLink) $this->dbhalt("连接失败!");
   mysqli_query($dbLink,"SET NAMES 'utf-8'");
} 

function execute($sql)
{
   $this->result=mysqli_query($this->dbLink,$sql);
   return $this->result;
}

function fetch_array($result)
{
	return mysqli_fetch_array($result);
}

function num_rows($result)
{
	return mysqli_num_rows($result);
}

function data_seek($result,$rowNumber)
{
	return mysqli_data_seek($result,$rowNumber);
}
	
function dbhalt($errmsg)
{
   $msg="database is wrong!";
   $msg=$errmsg;
   echo"$msg";
   die();
}

function free_result($result)
{
   mysqli_free_result($result);
}

function dbclose()
{
   mysqli_close($this->dbLink);
}

}// end class
$dsql= new mysql;
$dsql->dbServer=SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT;
$dsql->dbUser=SAE_MYSQL_USER;
$dsql->dbPwd=SAE_MYSQL_PASS;
$dsql->dbDatabase=SAE_MYSQL_DB;
$dsql->dbLink=$dsql->dbconnect();
if($dsql->dbconnect())
{
    echo "success!";
}
else{
    echo "failed";
}
?>

