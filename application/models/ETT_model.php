<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');

	class ETT_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();

		}

		public function insert_test_reason($data){
			if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $this->db->where('id',$id)->update('ett_test_reason',array('test_reason'=>$editval));
                return $this->db->affected_rows();
            }else{
				$this->db->set('test_reason', $data);
				$this->db->insert('ett_test_reason');
	            return $this->db->insert_id();
        	}
		}

		public function get_test_reasons(){
            $result = $this->db->select('*')->from('ett_test_reason')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function delete_test_reason($id) {
            $this->db->where('id', $id)->delete('ett_test_reason');
            return $this->db->affected_rows();
        }

        public function insert_ending_reason($data){
			if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $this->db->where('id',$id)->update('ett_ending_reason',array('ending_reason'=>$editval));
                return $this->db->affected_rows();
            }else{
				$this->db->set('ending_reason', $data);
				$this->db->insert('ett_ending_reason');
	            return $this->db->insert_id();
        	}
		}

		public function get_ending_reasons(){
        	$result = $this->db->select('*')->from('ett_ending_reason')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }
        
        public function delete_ending_reason($id) {
            $this->db->where('id', $id)->delete('ett_ending_reason');
            return $this->db->affected_rows();
        }

        public function insert_description($data){
			if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $this->db->where('id',$id)->update('ett_description',array('description'=>$editval));
                return $this->db->affected_rows();
            }else{
				$this->db->set('description', $data);
				$this->db->insert('ett_description');
	            return $this->db->insert_id();
        	}
		}

        public function get_descriptions(){
        	$result = $this->db->select('*')->from('ett_description')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function delete_description($id) {
            $this->db->where('id', $id)->delete('ett_description');
            return $this->db->affected_rows();
        }

        public function insert_conclusions($data){
			if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $this->db->where('id',$id)->update('ett_conclusion',array('conclusion'=>$editval));
                return $this->db->affected_rows();
            }else{
				$this->db->set('conclusion', $data);
				$this->db->insert('ett_conclusion');
	            return $this->db->insert_id();
        	}
		}
		public function get_conclusions(){
        	$result = $this->db->select('*')->from('ett_conclusion')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function delete_ett_conclusion($id){
        	$this->db->where('id', $id)->delete('ett_conclusion');
            return $this->db->affected_rows();
        }

	}
?>