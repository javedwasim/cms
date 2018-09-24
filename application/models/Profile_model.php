<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Profile_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();

		}

		public function insert_profile($data){
			$this->db->insert('patient_profile', $data);
            return $this->db->insert_id();
		}

		public function get_profiles(){
			$result = $this->db->get('patient_profile');
			if ($result) {
				return $result->result_array();
			}else{
				return false;
			}
		}

		public function delete_pat_profile($id){
			$result = $this->db->delete('patient_profile', array('id' => $id));
			if ($result) {
				return true;
			}else{
				return false;
			}

		}
		public function get_profile_by_id($id){
			$result = $this->db
						->where('id',$id)
						->limit(1)
						->get('patient_profile');
			if($result){
				return $result->row();
			}else{
				return false;
			}
		}

		public function update_profile($data,$id){
			$result = $this->db->where('id', $id)
						->update('patient_profile', $data);
			if ($result) {
				return true;
			}else{
				return false;
			}
		}

		public function get_notes(){
			$result = $this->db->select('*')
						->from('diary')
						->get();
			if ($result){
				return $result->result_array();
			}else{
				return array();
			}
		}

		public function insert_notes($data){
			$result = $this->db->insert('diary', $data);
            if ($result) {
            	return true;
            }else{
            	return false;
            }
		}

		public function delete_notes($id){
			$result = $this->db->delete('diary', array('id' => $id));
			if ($result) {
				return true;
			}else{
				return false;
			}
		}


	}

?>