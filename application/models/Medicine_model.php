<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');

	class medicine_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();

		}
		public function get_medicine_categories(){
            $result = $this->db->select('*')->from('medicine')->order_by('sort_order')->get();
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
            $sql = "SELECT dosage.*, medicine_dosage.medicine_id as medicine_category_id 
                    FROM dosage 
                    LEFT JOIN medicine_dosage ON medicine_dosage.dosage_id = dosage.id 
                    and medicine_dosage.medicine_id = $medicine_id
                    order by dosage.id;
                    ";

            $result = $query = $this->db->query($sql);
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
                $result = $this->db->where('id',$id)->update('medicine',array('name'=>$editval));
                if ($result) {
                    return 'updated';
                }else{
                    return false;
                }
            }else{
                $result = $this->db->insert('medicine', $data);
                if ($result) {
                    return 'inserted';
                }else{
                    return false;
                }
            }

        }

        public function add_dosage_category($data){
            if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $result = $this->db->where('id',$id)->update('dosage',array('name'=>$editval));
                if ($result) {
                    return 'updated';
                }else{
                    return false;
                }
            }else{
                $result = $this->db->insert('dosage', $data);
                if ($result) {
                    return 'inserted';
                }else{
                    return false;
                }
            }

        }

        public function add_medicine_item($data){
            if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $result = $this->db->where('id',$id)->update('medicine_item',array('name'=>$editval));
                if ($result) {
                    return 'updated';
                }else{
                    return false;
                }
            }else{
                $result = $this->db->insert('medicine_item', $data);
                if ($result) {
                    return 'inserted';
                }else{
                    return false;
                }
            }

        }

        public function delete_medicine_category($id) {
            $this->db->where('medicine_id', $id)->delete('medicine_item');
            $this->db->where('id', $id)->delete('medicine');
            return $this->db->affected_rows();
        }

        public function get_medicine_items(){
            $result = $this->db->select('*')->from('medicine_item')->order_by('sort_order')->get();
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

        public function get_medicine_category_description($id){
            $result = $this->db->select('*')->from('medicine')->where('id',$id)->limit(1)->get();
            if ($result) {
                return $result->row_array();
            }else{
                return array();
            }
        }

        public function get_medicine_item_description($id){
            $result = $this->db->select('*')->from('medicine_item')->where('id',$id)->limit(1)->get();
            if ($result) {
                return $result->row_array();
            }else{
                return array();
            }
        }

        public function save_medicine_category_description($data){
            $this->db->where('id',$data['medicine_cat_id'])->update('medicine',array('description'=>$data['description']));
            return $this->db->affected_rows();
        }

        public function save_medicine_item_description($data){
            $this->db->where('id',$data['medicine_item_id'])->update('medicine_item',array('description'=>$data['description']));
            return $this->db->affected_rows();
        }

        public function get_medicine_items_by_category($cate_id){
            if($cate_id>0){
                $result = $this->db->select('*')->from('medicine_item')->where('medicine_id',$cate_id)
                ->order_by('sort_order')->get();
            }else{
                $result = $this->db->select('*')->from('medicine_item')->order_by('sort_order')->get();
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
            $this->db->delete('medicine_dosage', array('medicine_id' => $category));
            foreach ($dosages as $dosage){
                $this->db->insert('medicine_dosage', array('dosage_id'=>$dosage,'medicine_id' => $category));
            }
            return true;
        }

        public function get_medicine_dosage($id){
            $result = $this->db->select('medicine_dosage.*,dosage.name as dosage_name')->from('medicine_dosage')
                        ->join('dosage','dosage.id=medicine_dosage.dosage_id','left')
                        ->where('medicine_dosage.medicine_id',$id)->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }
	}

?>