<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');

	class medicine_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();

		}
		public function get_medicine_categories(){
            $result = $this->db->select('*')->from('medicine')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function get_dosage_categories(){
            $result = $this->db->select('*')->from('dosage')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function get_dosage_medicine_category($medicine_id){
            $result = $this->db->select('dosage.*,medicine.id as medicine_category_id')
                        ->from('dosage')
                        ->join('medicine',"medicine.id = dosage.medicine_id and medicine.id = $medicine_id",'left')
                        ->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }

        }

        public function add_medicine_category($data){
		    if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $this->db->where('id',$id)->update('medicine',array('name'=>$editval));
                return $this->db->affected_rows();
            }else{
                $this->db->insert('medicine', $data);
                return $this->db->insert_id();
            }

        }

        public function add_dosage_category($data){
            if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $this->db->where('id',$id)->update('dosage',array('name'=>$editval));
                return $this->db->affected_rows();
            }else{
                $this->db->insert('dosage', $data);
                return $this->db->insert_id();
            }

        }

        public function add_medicine_item($data){
            if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $this->db->where('id',$id)->update('medicine_item',array('name'=>$editval));
                return $this->db->affected_rows();
            }else{
                $this->db->insert('medicine_item', $data);
                return $this->db->insert_id();
            }

        }

        public function delete_medicine_category($id) {
            $this->db->where('medicine_id', $id)->delete('medicine_item');
            $this->db->where('id', $id)->delete('medicine');
            return $this->db->affected_rows();
        }

        public function get_medicine_items(){
            $result = $this->db->select('*')->from('medicine_item')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function delete_dosage_category($id) {
            $this->db->where('id', $id)->delete('dosage');
            return $this->db->affected_rows();
        }

        public function delete_medicine_item($id) {
            $this->db->where('id', $id)->delete('medicine_item');
            return $this->db->affected_rows();
        }

        public function get_medicine_item_description($id){
            $result = $this->db->select('description')->from('medicine_item')->where('id',$id)->limit(1)->get();
            if ($result) {
                return $result->row_array();
            }else{
                return array();
            }
        }

        public function save_medicine_item_description($data){
            $this->db->where('id',$data['medicine_item_id'])->update('medicine_item',array('description'=>$data['description']));
            return $this->db->affected_rows();
        }

        public function get_medicine_items_by_category($cate_id){
            if($cate_id>0){
                $result = $this->db->select('*')->from('medicine_item')->where('medicine_id',$cate_id)->get();
            }else{
                $result = $this->db->select('*')->from('medicine_item')->get();
            }
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function update_dosage_medicine($data){
            $category = $data['medicine_category'];
            $dosages = $data['dosage'];
            foreach ($dosages as $dosage){
                $this->db->where('id',$dosage)->update('dosage',array('medicine_id'=>$category));
            }
            return true;
        }
	}

?>