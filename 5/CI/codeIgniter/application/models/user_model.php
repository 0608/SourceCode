<?php

	class User_model extends CI_Model{
		public function __construct(){
			
			parent::__construct();
			$this->load->database();
		}

		public function u_insert($studentId,$labid){
			$sql = "INSERT INTO user(studentId,labid)VALUES('$studentId','$labid')";
			$res = $this->db->query($sql);
			if($res)
				return true;
			else
				return false;
		}	
		public function p_select($p_id,$table){
			$sql="SELECT * FROM $table WHERE u_id IN (select u_id FROM takepart_project WHERE p_id = '$p_id')";
			$res=$this->db->query($sql);			
			if($res->num_rows()>0)
				return $res;
			else
				return 0;
		}
		public function u_select($pid,$table){
			$sql="SELECT * FROM $table WHERE p_id = '$pid'";
			$res=$this->db->query($sql);			
			if($res->num_rows()>0)
				return $res;
			else
				return 0;
		}
		public function distinct_count() {
			$sql = "SELECT DISTINCT labid FROM project";
			$res = $this->db->query($sql);
			$num = $res->num_rows();
			return $num;
		}

		public function all_select($labid,$table){

			$sql="SELECT * FROM $table  WHERE labid = '$labid' ORDER BY labid";

			$res=$this->db->query( $sql);			
			return $res;
		} 

		public function u_update($studentId,$labid){
	
			$sql = "UPDATE user SET labid = '$labid' WHERE studentId = '$studentId' "; 
			$query = $this->db->query($sql);
			return $query;
		}
		
		function u_del($studentid){
			$this->db->where('studentId',$studentid);
			$query = $this->db->delete('user');
			return $query;
		}
			public function takepart_select($u_id) {
			$sql ="SELECT * FROM takepart_project a,project b WHERE  a.u_id = '$u_id' AND a.p_id = b.p_id";
			$res = $this->db->query($sql);
			if($res->num_rows()>0)
				return $res;
			else
				return false;
		}

		public function created_select($u_id) {
			$sql ="SELECT * FROM created_project a,project b WHERE  a.u_id = '$u_id' AND a.p_id = b.p_id ";
			$res = $this->db->query($sql);
			if($res->num_rows()>0)
				return $res;
			else
				return false;
		}
		public function quest_select($u_id) {
			$sql ="SELECT * FROM project WHERE state = '3' AND p_id in ( SELECT p_id FROM created_project WHERE u_id = '$u_id' UNION SELECT p_id FROM takepart_project WHERE u_id = '$u_id' )";
			$res = $this->db->query($sql);
			if($res->num_rows()>0)
				return $res;
			else
				return false;
		}
		public function creative_select($u_id) {
			$sql = "SELECT * FROM project WHERE type = 'creative' AND p_id in ( SELECT p_id FROM created_project WHERE u_id = '$u_id' UNION SELECT p_id FROM takepart_project WHERE u_id = '$u_id' )";
			$res = $this->db->query($sql);
			if($res->num_rows()>0)
				return $res;
			else
				return false;
		}


	}

?>