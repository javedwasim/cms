<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Instruction_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();

		}
		public function get_instruction_categories($data){
            $result = $this->db->select('*')->from('instruction')->where('category',$data['category'])->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function add_instruction_category($data){
		    if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $this->db->where('id',$id)->update('instruction',array('name'=>$editval));
                return $this->db->affected_rows();
            }else{
                $this->db->insert('instruction', $data);
                return $this->db->insert_id();
            }

        }

        public function add_instruction_item($data){
            if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $this->db->where('id',$id)->update('instruction_item',array('name'=>$editval));
                return $this->db->affected_rows();
            }else{
                $this->db->insert('instruction_item', $data);
                return $this->db->insert_id();
            }

        }

        public function delete_instruction_category($id) {
            $this->db->where('instruction_id', $id)->delete('instruction_item');
            $this->db->where('id', $id)->delete('instruction');
            return $this->db->affected_rows();
        }

        public function get_inst_items($data){
            $result = $this->db->select('*')->from('instruction_item')->where('category',$data['category'])->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function delete_inst_item($id) {
            $this->db->where('id', $id)->delete('instruction_item');
            return $this->db->affected_rows();
        }

        public function get_inst_item_description($id){
            $result = $this->db->select('description')->from('instruction_item')->where('id',$id)->limit(1)->get();
            if ($result) {
                return $result->row_array();
            }else{
                return array();
            }
        }

        public function save_inst_item_description($data){
            $this->db->where('id',$data['inst_item_id'])->update('instruction_item',array('description'=>$data['description']));
            return $this->db->affected_rows();
        }

        public function get_inst_items_by_category($data){
            $cate_id = $data['inst_id'];
            $category = $data['category'];
            if($cate_id>0){
                $result = $this->db->select('*')->from('instruction_item')
                            ->where('instruction_id',$cate_id)
                            ->where('category',$category)->get();
            }else{
                $result = $this->db->select('*')->from('instruction_item')->where('category',$category)->get();
            }
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }
	}

?>