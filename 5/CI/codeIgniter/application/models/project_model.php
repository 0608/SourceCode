<?php
	class Project_model extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function takepart_select($studentId) {
			$sql ="SELECT * FROM takepart_project a,project b WHERE  a.studentId = '$studentId' AND a.p_id = b.p_id";
			$res = $this->db->query($sql);
			return $res ;
		}

		public function created_select($studentId) {
			$sql ="SELECT * FROM created_project a,project b WHERE  a.studentId = '$studentId' AND a.p_id = b.p_id ";
			$res = $this->db->query($sql);
			return $res;
		}
		public function quest_select($studentId) {
			$sql ="SELECT * FROM project WHERE state = '3' AND p_id in ( SELECT p_id FROM created_project WHERE studentId = '$studentId' UNION SELECT p_id FROM takepart_project WHERE studentId = '$studentId' )";
			$res = $this->db->query($sql);
			return $res;
		}
		public function creative_select($studentId) {
			$sql = "SELECT * FROM project WHERE type = 'creative' AND p_id in ( SELECT p_id FROM created_project WHERE studentId = '$studentId' UNION SELECT p_id FROM takepart_project WHERE studentId = '$studentId' )";
			$res = $this->db->query($sql);
			return $res;
		}

	}
?>