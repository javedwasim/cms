<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Echo_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();

		}
		public function get_disease_categories(){
            $result = $this->db->select('*')->from('disease')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function add_disease_category($data){
		    if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $this->db->where('id',$id)->update('disease',array('name'=>$editval));
                return $this->db->affected_rows();
            }else{
                $this->db->insert('disease', $data);
                return $this->db->insert_id();
            }

        }

        public function add_disease_item($data){
            if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $this->db->where('id',$id)->update('disease_item',array('name'=>$editval));
                return $this->db->affected_rows();
            }else{
                $this->db->insert('disease_item', $data);
                return $this->db->insert_id();
            }

        }

        public function delete_disease_category($id) {
            $this->db->where('id', $id)->delete('disease');
            return $this->db->affected_rows();
        }

        public function get_disease_items(){
            $result = $this->db->select('*')->from('disease_item')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function delete_disease_item($id) {
            $this->db->where('id', $id)->delete('disease_item');
            return $this->db->affected_rows();
        }

        public function get_disease_item_description($id){
            $result = $this->db->select('description')->from('disease_item')->where('id',$id)->limit(1)->get();
            if ($result) {
                return $result->row_array();
            }else{
                return array();
            }
        }

        public function save_disease_item_description($data){
            $this->db->where('id',$data['disease_item_id'])->update('disease_item',array('description'=>$data['description']));
            return $this->db->affected_rows();
        }

        public function get_disease_items_by_category($cate_id){
            if($cate_id>0){
                $result = $this->db->select('*')->from('disease_item')->where('disease_id',$cate_id)->get();
            }else{
                $result = $this->db->select('*')->from('disease_item')->get();
            }
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }
	}

?>