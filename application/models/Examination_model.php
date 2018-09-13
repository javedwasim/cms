<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Examination_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();

		}
		public function get_examination_categories(){
            $result = $this->db->select('*')->from('examination')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function add_examination_category($data){
		    if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $this->db->where('id',$id)->update('examination',array('name'=>$editval));
                return $this->db->affected_rows();
            }else{
                $this->db->insert('examination', $data);
                return $this->db->insert_id();
            }

        }

        public function add_examination_item($data){
            if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $this->db->where('id',$id)->update('examination_item',array('name'=>$editval));
                return $this->db->affected_rows();
            }else{
                $this->db->insert('examination_item', $data);
                return $this->db->insert_id();
            }

        }

        public function delete_examination_category($id) {
            $this->db->where('examination_id', $id)->delete('examination_item');
            $this->db->where('id', $id)->delete('examination');
            return $this->db->affected_rows();
        }

        public function get_examination_items(){
            $result = $this->db->select('*')->from('examination_item')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function delete_examination_item($id) {
            $this->db->where('id', $id)->delete('examination_item');
            return $this->db->affected_rows();
        }

        public function get_examination_item_description($id){
            $result = $this->db->select('description')->from('examination_item')->where('id',$id)->limit(1)->get();
            if ($result) {
                return $result->row_array();
            }else{
                return array();
            }
        }

        public function save_examination_item_description($data){
            $this->db->where('id',$data['examination_item_id'])->update('examination_item',array('description'=>$data['description']));
            return $this->db->affected_rows();
        }

        public function get_examination_items_by_category($cate_id){
            if($cate_id>0){
                $result = $this->db->select('*')->from('examination_item')->where('examination_id',$cate_id)->get();
            }else{
                $result = $this->db->select('*')->from('examination_item')->get();
            }
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }
	}

?>