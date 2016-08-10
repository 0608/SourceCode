<?php
	if(!defined('BASEPATH')) exit('No directly script access!');

	Class Pertask extends CI_Controller{

		function __construct() {
			parent::__construct();
			$this->load->model('user_model');
		}

		function index() {
			//$this->load->view('ace/won-pertask');
			$u_id = 3;//判断登陆者的u_id
			$i=0;
			$j=0;
			$k=0;
			$q=0;
			$proj = array();
			$result1 = $this->user_model->takepart_select($u_id);
			//var_dump($result1);
			if($result1){
				while($row = $result1->unbuffered_row()){

				//$data['p_id'] = $row->p_id;				//项目编号
				$data['p_name'] = $row->p_name;				//项目名称
				$data['team_name'] = $row->team_name;
				$data['fund'] = $row->fund;					//项目属性
				//$data['description']= $row->description;	//项目描述
				$data['created_by'] = $row->created_by;		//项目创建者
				$data['type'] = $row->type;
				$data['state'] = $row->state;
				//$data['email'] = $row->email;

				$take_part[$i] = array($data['p_name'],$data['team_name'],$data['fund'],$data['created_by'],$data['type'],$data['state']); 		//加载显示页面
				$i++;
				//var_dump($created);
			// //$this->load->view('lab_user',$data);					
			}
			}else{
				$take_part = array();
			}

			$result2 = $this->user_model->created_select($u_id);
			if($result2){
				while($row = $result2->unbuffered_row()){

				//$data['p_id'] = $row->p_id;				//项目编号
				$data['p_name'] = $row->p_name;				//项目名称
				//$data['team_name'] = $row->team_name;
				$data['fund'] = $row->fund;					//项目属性
				//$data['description']= $row->description;	//项目描述
				$data['created_by'] = $row->created_by;		//项目创建者
				$data['type'] = $row->type;
				$data['state'] = $row->state;
				$data['team_name'] = $row->team_name;

				$created[$j] = array($data['p_name'],$data['fund'],$data['created_by'],$data['type'],$data['state'],$data['team_name'],); 		//加载显示页面
				$j++;			
			}
				
			}else{
				$created = array();
				
			}

			$result3 = $this->user_model->quest_select($u_id);
			//var_dump($result3);
			if($result3){
				while($row = $result3->unbuffered_row()){

				//$data['p_id'] = $row->p_id;				//项目编号
				$data['p_name'] = $row->p_name;				//项目名称
				$data['team_name'] = $row->team_name;
				$data['fund'] = $row->fund;					//项目属性
				//$data['description']= $row->description;	//项目描述
				$data['created_by'] = $row->created_by;		//项目创建者
				$data['type'] = $row->type;
				$data['state'] = $row->state;
				//$data['email'] = $row->email;

				$quest[$k] = array($data['p_name'],$data['team_name'],$data['fund'],$data['created_by'],$data['type'],$data['state']); 		//加载显示页面
				$k++;
				
			}
				
			}else{
				$quest=array();
			}

			$result4 = $this->user_model->creative_select($u_id);
			if($result4){
				while($row = $result4->unbuffered_row()){

				//$data['p_id'] = $row->p_id;				//项目编号
				$data['p_name'] = $row->p_name;				//项目名称
				$data['team_name'] = $row->team_name;
				$data['fund'] = $row->fund;					//项目属性
				//$data['description']= $row->description;	//项目描述
				$data['created_by'] = $row->created_by;		//项目创建者
				$data['type'] = $row->type;
				$data['start_time'] = $row->start_time;
				//$data['email'] = $row->email;

				$creative[$q] = array($data['p_name'],$data['team_name'],$data['type'],$data['fund'],$data['start_time']); 		//加载显示页面
				$q++;			
			}
			}else{
				$creative = array();
			}	
			
			$proj = array('created'=>$created,'take_part'=>$take_part,'quest'=>$quest,'creative'=>$creative);
			//var_dump($proj);
			$this->load->view('ace/won-pertask',$proj);
		}

		}


?>