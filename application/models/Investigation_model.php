<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Investigation_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();

		}
		public function get_investigation_categories(){
            $result = $this->db->select('*')->from('investigation')->order_by('sort_order')->get();
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
                $result = $this->db->where('id',$id)->update('investigation',array('name'=>$editval));
                if ($result) {
                    return 'updated';
                }else{
                    return false;
                }
            }else{
                $result = $this->db->insert('investigation', $data);
                if ($result) {
                    return 'inserted';
                }else{
                    return false;
                }
            }

        }

        public function add_investigation_item($data){
            if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $result = $this->db->where('id',$id)->update('investigation_item',array('name'=>$editval));
                if ($result) {
                    return 'updated';
                }else{
                    return false;
                }
            }else{
                $result = $this->db->insert('investigation_item', $data);
                if ($result) {
                    return 'inserted';
                }else{
                    return false;
                }
            }

        }

        public function delete_investigation_category($id) {
            $this->db->where('investigation_id', $id)->delete('investigation_item');
            $this->db->where('id', $id)->delete('investigation');
            return $this->db->affected_rows();
        }

        public function get_investigation_items(){
            $result = $this->db->select('*')->from('investigation_item')->order_by('sort_order')->get();
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
            $result = $this->db->select('*')->from('investigation_item')->where('id',$id)->limit(1)->get();
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
            $result = $this->db->select('*')->from('investigation_item')->where('investigation_id',$cate_id)->order_by('sort_order')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function get_investigation_description($id){
            $result = $this->db->select('*')->from('investigation')->where('id',$id)->limit(1)->get();
            if ($result) {
                return $result->row_array();
            }else{
                return array();
            }
        }

        public function save_investigation_category_description($data){
            $this->db->where('id',$data['investigation_cat_id'])->update('investigation',array('description'=>$data['description']));
            return $this->db->affected_rows();
        }
	}

?>