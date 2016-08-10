<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends My_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
		//var_dump($this->load);
		//$this->load->view('welcome_message');//加载view文件夹的某个文件
		//var_dump($this->uri);
		//echo $_GET['id'];
		//echo $this->uri->segment(4); //获得地址的第几个参数值
		//echo $id;
	    /*var_dump($_SERVER);
		  echo $this->input->post('username');//$_POST['username'];
		  echo $this->input->server('REMOTE_ADDR');*/
		/*GET 方法
		$res=$this->db->get('user');
		foreach($res->result() as $item){
			echo $item->username;
			echo '<br>';
		}*/
	}
	public function add(){
		$this->load->database();
		$sql="INSERT INTO user(username,pw1)VALUES('saa','123')";
		$bool = $this->db->query($sql);
		if($bool){
			echo '受影响的行数'.$this->db->affected_rows();
			echo '<br>bbbb'.$this->db->insert_id();
		}
	}
	public function update(){
		/*$data[0]='aaa';
		$data[1]='111';
		$sql="INSERT INTO user(username,pw1)VALUES(?,md5(?))";
		$bool=$this->db->query($sql,$data);
		if($bool){
			echo '受影响的行数'.$this->db->affected_rows();
			echo '<br>bbbb'.$this->db->insert_id();
		}*/
		$data=array(
				'username'=>'fanni',
				'pw1'=>md5('12345')
			);
			$bool=$this->db->update('user',$data,array('id'=>'3'));//('表名'，'关联数组','条件')
			//$this->db->insert('表名'，'关联数组');
			//$this-->db->delete('表名'，'条件');
			var_dump($bool);
	}
	public function select(){
		$res=$this->db->select('*')
		->from('user')
		//->where('id >=',6)
		//->limit(3,2)    //跳过两条取三条
		//->order_by('id desc ')
		->get();

		$result = $res->result();
		foreach ($result as $user) {
			while(($user->u_id) == 1 ){
			//$data[0][$user_-] = $user->u_id;
			$data[$user->u_id][1] = $user->u_name;
		   }
			# code...
			var_dump($data[1]);
		}
		
		//var_dump($res->result());
		// echo $this->db->last_query();
		// $res=$this->db->where('username','saa')->get('user');
		// echo $this->db->last_query();
	}
}
