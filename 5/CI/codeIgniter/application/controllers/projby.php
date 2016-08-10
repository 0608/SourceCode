<?php
	class Projby extends CI_Controller{

		function __construct() {
			parent::__construct();
			$this->load->model('user_model');
			//$this->load->view('ace/head.php');		
		}
	
		function page() {

			$this->load->library('pagination');
			$j=0;
			$count = $this->user_model->distinct_count();//有项目的实验室数量
			//echo $count;
			for($i=0;$i< $count;$i++) {            //循环显示实验室id

			/*------------分页--------------*/
			$num[$i] = $this->db->get_where('project',array('labid = '=>$i))->result_array();

			$config['base_url'] 	 =	base_url().'/projby/page';	
			$config['total_rows']	 = 	count($num[$i]);
			$config['per_page'] 	 = 	3;
			$config['num_links'] 	 = 	2;
			$config['full_tag_open'] = 	'<p>';
			$config['full_tag_close']=	'</p>';
			$config['first_link'] 	 =	'First';

			$this->pagination->initialize($config);

			$offset =(int)$this->uri->segment(3);
			// 	$offset = $page =false?0:($config['per_page'] * ($page-1));//页码方式

			$this->db->limit($config['per_page'], $offset); // limit(每页显示数量，偏移量)
			
			$page[$i] = $this->pagination->create_links();

			/*--------------分页结束-----------------*/


			$result = $this->user_model->all_select($i,'project');
			
			while($row = $result->unbuffered_row()){
				$data['p_id'] = $row->p_id; //p_id
				$data['p_name'] = $row->p_name;//p_name
				$member[$j] = array('p_id'=>$data['p_id'],'p_name'=>$data['p_name']); 		//加载显示页面
				$j++;				
			}
			$j=0;					//赋零
			$lab[$i] = $member;	
			//var_dump($lab);	
			$member= array();		//清空数组		
			}
			$project['page_list']=$page;
			$project['lab'] = $lab;
			//var_dump($page);
			$this->load->view('ace/projbyradio',$project);
		}

}


?>