<?php

class Upload extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('user_model');
    }

    public function index()
    {
       
        //$p_id = $_get['pid'];
        $i = 0;
        $res = $this->user_model->p_select(2,'user');//暂且赋值$p_id
        if($res) {

            while($row = $res->unbuffered_row()) {
                $u_name[$i]=$row->u_name;
                $u_id[$i] = $row->u_id;
                 $i++;
            }
            $data['u_name'] = $u_name;
            $data['u_id'] = $u_id;
            $data['error'] = '';
        }

        $this->load->view('ace/perfectproj', $data);//ace/perfectproj
        $i = 0;
        $data[$i] = array();        
    }
    public function do_upload()
    {
        $teamname   = $_REQUEST['teamName'];          //队名
        $urladdress = $_REQUEST['urladdress'];      //源码地址
        $config['upload_path']      = './assets/images/gallery';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']         = 800;
        $config['max_width']        = 1366;
        $config['max_height']       = 768;
        $config['file_name']        = 2;        //以$p_id命名

        $this->load->library('upload', $config);
        if ( !$this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('upload_form', $error);
            //echo 0;
        }
        else
        {
            // $data = array('upload_data' => $this->upload->data());

            //$this->load->view('ace/pertask', $data);
            //echo $_REQUEST['name'];
            echo 1;
        }
    }
}