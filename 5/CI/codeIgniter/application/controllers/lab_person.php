<?php 
	if(!defined('BASEPATH')) exit('No directly script access!');

	class Lab_person extends CI_Controller{

		function __construct() {
			parent::__construct();
			$this->load->model('user_model');
		}

		function index() {

			//$this->load->view('ace/won-users',$data);
			//$mylab = $this->load->u_select($_SESSION['u_id'],'lab','user');

			//实验室名+显示的表名
			$j=0;
			for($i=0;$i<10;$i++){            //循环显示实验室id
				$result = $this->user_model->all_select($i,'user');
				//var_dump($result);
				$shuxing = array('u_id','u_name','student_id','lab_id','grade','major','email');
				while($row = $result->unbuffered_row()){
					$data['u_id'] = $row->u_id; //u__id
					//echo $data['u_id']."<br>";
					$data['u_name'] = $row->u_name;				//u_name
					$data['student_id'] = $row->studentId; 		//学号
					$data['lab_id'] = $row->labid;				//实验室编号
					$data['major'] = $row->major;
					$data['grade'] = $row->grade;
					$data['email'] = $row->email;

					$member[$j] =array_combine($shuxing, array($data['u_id'],$data['u_name'],$data['student_id'],$data['lab_id'],
					$data['grade'],$data['major'],$data['email'])); 		//加载显示页面
					$j++;
					//$this->load->view('lab_user',$data);					
				}
				$j=0;					//赋零
				$lab[$i] = $member;		
				$member= array();		//清空数组		
			}
			//var_dump($lab);
			
			$this->load->view('ace/usersbyradio',array('lab'=>$lab));
			//$this->load->view('ace/projbyradio',array('lab'=>$lab));
			//$this->load->view('ace/won-adduser',array('lab'=>$lab));

		}
			
	}



?>