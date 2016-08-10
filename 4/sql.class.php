 <?php
 class mysql
 { 
    var  $dbServer;
    var  $dbDatabase; 
    var  $dbUser;
    var  $dbPwd;
// function __construct(){
// 	$dbServer='localhost';
// 	$dbUser='root';
// 	$dbPwd='';
// 	$dbbase='agender';
// }

function dbconnect()
{
   $this->dbLink=mysqli_connect($this->dbServer,$this->dbUser,$this->dbPwd,$this->dbDatabase);
   //$this->dbLink = mysqli_connect('localhost','root','','book');
   if(!$this->dbLink) $this->dbhalt("连接失败!");
   mysqli_query($this->dbLink,"SET NAMES 'utf-8'");
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
function fetch_row($result)
{
  return mysqli_fetch_row($result);
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

function delete($sql){
   $result=$this->execute($dblink,$sql);
   $this->affected_rows=mysqli_affected_rows($this->dbLink);
   $this->free_result($result);
   return $this->affected_rows;
}
  
function insert($sql){
$result=$this->execute($sql,$dbDatabase);
$this->insert_id=mysqli_insert_id($this->dbLink);
$this->free_result($result);
 return $this->insert_id;
}
  
function update($sql)
{
   $result=$this->execute($dbDatabase,$sql);
   $this->affected_rows=mysqli_affected_rows($this->dbLink);
   $this->free_result($result);
    return $this->affected_rows;
}

function get_num($result)
{
   $num=mysqli_num_rows($result);
   return $num;
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

  $dsql=new mysql;
   $dsql->dbServer= SAE_MYSQL_HOST_M . ':' . SAE_MYSQL_PORT;
   $dsql->dbUser=SAE_MYSQL_USER;
   $dsql->dbPwd=SAE_MYSQL_PASS;
   $dsql->dbDatabase=SAE_MYSQL_DB; 
  $conn=$dsql->dbconnect();
?>
