<?php 
	if(!defined('BASEPATH')) exit('No directly script access!');
	// if($_SESSION['administrator']	!= 1) {
	// 	echo "非管理员！";
	// }
	class Manage_lab extends CI_Controller{

		function __construct() {
			parent::__construct();
			$this->load->model('user_model');
		}

		function student() {

			$this->load->library('pagination');
			$labid = 0;//$_SESSION['labid'];
			$student = $this->db->get_where('user',array('labid = '=> 0))->result_array();
			$config['base_url'] 	 =	base_url().'/manage_lab/student';
			$config['total_rows'] 	 = 	count($student);
			$config['per_page'] 	 = 	2;
			$config['num_links'] 	 = 	1;
			$config['full_tag_open'] = 	'<p>';
			$config['full_tag_close']=	'</p>';
			$config['first_link'] 	 =	'First';

			$this->pagination->initialize($config);
			//$this->get....byindex($id,10);

			$offset =(int)$this->uri->segment(3);
			//echo $offset;
			// 	$offset = $page =false?0:($config['per_page'] * ($page-1));//页码方式

			$this->db->limit($config['per_page'], $offset); // limit(每页显示数量，偏移量)

			$studentId['student']  = $this->db->get_where('user',array('labid = '=> $labid))->result_array();
			//var_dump($studentId['student']);
			//var_dump($this->db->get('project')->result_array());
			$studentId['page_list'] = $this->pagination->create_links();
			//var_dump($studentId['student']);
			$this->load->view('ace/won-adduser',$studentId);
			//$this->load->view('lab_user',$studentId);
		}

		function check_person() {
			$studentId = trim($_POST['id']);
			$labid=trim($_POST['labid']);
			$result = $this->user_model->u_select($studentId,'user');
			if($result) {
				$row = $result->result_array();
				$stu = $row[0];
				if($stu['labid'] == $labid) {
					echo 2;
				}else {
					$update = $this->user_model->u_update($studentId,$labid);
					if($update)
						echo 1;
					else
						echo 0;
				}
			}else {
				$res = $this->user_model->u_insert($studentId,$labid);
				if($res)
					echo 1;
				else
					echo 0;
			}
			
			//echo  $studentid;
		}
		function show_person() {
			$labid = 0;//$_SESSION['labid'];
			$result = $this->user_model->all_select($labid);
			while($row = $result->unbuffered_row()) {
				$studentId[$i] = $row->studentId;
				$i++;
			}
			$this->load->view('ace/won_adduser',array('studentId'=>$studentId));
		}

		// function add_person() {
		// 	//$this->load->view('');
		// 	//判断是否为管理员
		// 		$data['studentid'] = trim($_POST['studentid']);
		// 		$data['u_name'] = trim($_POST['u_name']);

		// 		$arr = array('studentid'=>$data['studentid'],'u_name'=>$data['u_name']);
		// 		$result = $this->user_model->all_insert($arr,'user');
		// 		if($result){
		// 			echo "success";
		// 		}
		// }	
		function delete_person() {
				
				$studentid = trim($_POST['id']);
				$result = $this->user_model->u_update($studentid,'100');
				if($result){
					echo 1;
				}
			}
	
		function add_person() {
			$studentId = $_POST['studentid'];
			$labid = 0;//$_SESSION['labid'];//管理员所在的实验室
			//$data = array('studentId'=> $studentId,'labid'=>$labid);
			$result = $this->user_model->u_update($studentId,$labid);
			if($result){
				echo 1;

			}else{
				echo 0;
			}



		}
	}	


?>