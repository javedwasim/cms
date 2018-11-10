<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Instruction_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();

		}
		public function get_instruction_categories($data){
            $result = $this->db->select('*')->from('instruction')->where('category',$data['category'])
            ->order_by('sort_order')->get();
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
                $result = $this->db->where('id',$id)->update('instruction',array('name'=>$editval));
                if ($result) {
                    return 'updated';
                }else{
                    return false;
                }
            }else{
                $result = $this->db->insert('instruction', $data);
                if ($result) {
                    return 'inserted';
                }else{
                    return false;
                }
            }

        }

        public function add_instruction_item($data){
            if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $result = $this->db->where('id',$id)->update('instruction_item',array('name'=>$editval));
                if ($result) {
                    return 'updated';
                }else{
                    return false;
                }
            }else{
                $result = $this->db->insert('instruction_item', $data);
                if ($result) {
                    return 'inserted';
                }else{
                    return false;
                }
            }

        }

        public function delete_instruction_category($id) {
            $this->db->where('instruction_id', $id)->delete('instruction_item');
            $this->db->where('id', $id)->delete('instruction');
            return $this->db->affected_rows();
        }

        public function get_inst_items($data){
            $result = $this->db->select('*')->from('instruction_item')->where('category',$data['category'])
            ->order_by('sort_order')->get();
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
            $result = $this->db->select('*')->from('instruction_item')->where('id',$id)->limit(1)->get();
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
            $cate_id = $data['instruction_id'];
            $category = $data['category'];

            $result = $this->db->select('*')->from('instruction_item')
                            ->where('instruction_id',$cate_id)
                            ->where('category',$category)->order_by('sort_order')->get();

            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function get_inst_description($id){
            $result = $this->db->select('*')->from('instruction')->where('id',$id)->limit(1)->get();
            if ($result) {
                return $result->row_array();
            }else{
                return array();
            }
        }

        public function save_inst_description($data){
            $this->db->where('id',$data['inst_id'])->update('instruction',array('description'=>$data['description']));
            return $this->db->affected_rows();
        }
	}

?>