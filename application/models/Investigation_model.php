<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Investigation_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();

		}
		public function get_investigation_categories(){
            $result = $this->db->select('*')->from('investigation')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function add_investigation_category($data){
		    if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $this->db->where('id',$id)->update('investigation',array('name'=>$editval));
                return $this->db->affected_rows();
            }else{
                $this->db->insert('investigation', $data);
                return $this->db->insert_id();
            }

        }

        public function add_investigation_item($data){
            if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $this->db->where('id',$id)->update('investigation_item',array('name'=>$editval));
                return $this->db->affected_rows();
            }else{
                $this->db->insert('investigation_item', $data);
                return $this->db->insert_id();
            }

        }

        public function delete_investigation_category($id) {
            $this->db->where('investigation_id', $id)->delete('investigation_item');
            $this->db->where('id', $id)->delete('investigation');
            return $this->db->affected_rows();
        }

        public function get_investigation_items(){
            $result = $this->db->select('*')->from('investigation_item')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function delete_investigation_item($id) {
            $this->db->where('id', $id)->delete('investigation_item');
            return $this->db->affected_rows();
        }

        public function get_investigation_item_description($id){
            $result = $this->db->select('description')->from('investigation_item')->where('id',$id)->limit(1)->get();
            if ($result) {
                return $result->row_array();
            }else{
                return array();
            }
        }

        public function save_investigation_item_description($data){
            $this->db->where('id',$data['investigation_item_id'])->update('investigation_item',array('description'=>$data['description']));
            return $this->db->affected_rows();
        }

        public function get_investigation_items_by_category($cate_id){
            if($cate_id>0){
                $result = $this->db->select('*')->from('investigation_item')->where('investigation_id',$cate_id)->get();
            }else{
                $result = $this->db->select('*')->from('investigation_item')->get();
            }
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }
	}

?>