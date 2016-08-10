<?php
	class Showproj extends CI_Controller{

		function __construct() {
			parent::__construct();
			$this->load->model('user_model');
			
		}

		function page() {

		$this->load->library('pagination');
		//$this->load->view('ace/won-showproj');
		$data['list'] = $this->db->get_where('project',array('state='=>'finish'))->result_array();
		$config['base_url'] 	 =	base_url().'/showproj/page';
		$config['total_rows'] 	 = 	count($data['list']);
		$config['per_page'] 	 = 	2;
		$config['num_links'] 	 = 	1;
		$config['full_tag_open'] = 	'<p>';
		$config['full_tag_close']=	'</p>';
		$config['first_link'] 	 =	'First';

		$this->pagination->initialize($config);
//		$this->get....byindex($id,10);

		$offset =(int)$this->uri->segment(3);
		// 	$offset = $page =false?0:($config['per_page'] * ($page-1));//页码方式

		$this->db->limit($config['per_page'], $offset); // limit(每页显示数量，偏移量)
		
		//var_dump($this->db->get('project')->result_array());
		$data['page_list'] = $this->pagination->create_links();
		//var_dump($data);
		$this->load->view('ace/won-showproj',$data);
		}
	}


?>