<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Setting_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();

		}


		public function get_districts(){
			$result = $this->db->select('*')
						->get('districts_tbl');
			if ($result) {
				return $result->result_array();
			}else{
				return false;
			}
		}

		public function get_professions(){
			$result = $this->db->select('*')
						->get('profession_tbl');
			if ($result) {
				return $result->result_array();
			}else{
				return false;
			}
		}

        public function add_advice($data){
		    if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $this->db->where('id',$id)->update('advice',array('name'=>$editval));
                //echo $this->db->last_query(); die();
                return $this->db->affected_rows();
            }else{
                $this->db->insert('advice', $data);
                return $this->db->insert_id();
            }

        }

        public function get_advices(){
            $result = $this->db->select('*')->from('advice')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function delete_advice($id) {
            $this->db->where('advice_id', $id)->delete('advice_item');
            $this->db->where('id', $id)->delete('advice');
            return $this->db->affected_rows();
        }

        public function add_advice_item($data){
            if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $this->db->where('id',$id)->update('advice_item',array('name'=>$editval));
                //echo $this->db->last_query(); die();
                return $this->db->affected_rows();
            }else{
                $this->db->insert('advice_item', $data);
                return $this->db->insert_id();
            }

        }

        public function get_advice_items(){
            $result = $this->db->select('*')->from('advice_item')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function delete_advice_item($id) {
            $this->db->where('id', $id)->delete('advice_item');
            return $this->db->affected_rows();
        }

        public function add_research($data){
            if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $this->db->where('id',$id)->update('research',array('name'=>$editval));
                return $this->db->affected_rows();
            }else{
                $this->db->insert('research', $data);
                return $this->db->insert_id();
            }

        }

        public function get_researches(){
            $result = $this->db->select('*')->from('research')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function save_research_description($data){
            $this->db->where('id',$data['research_id'])->update('research',array('description'=>$data['description']));
            return $this->db->affected_rows();
        }

        public function get_research_description($id){
            $result = $this->db->select('description')->from('research')->where('id',$id)->limit(1)->get();
            if ($result) {
                return $result->row_array();
            }else{
                return array();
            }
        }

        public function delete_research($id) {
            $this->db->where('id', $id)->delete('research');
            return $this->db->affected_rows();
        }

        public function add_lab_category($data){
            if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $this->db->where('id',$id)->update('lab_category',array('name'=>$editval));
                //echo $this->db->last_query(); die();
                return $this->db->affected_rows();
            }else{
                $this->db->insert('lab_category', $data);
                return $this->db->insert_id();
            }

        }

        public function get_lab_categories(){
            $result = $this->db->select('*')->from('lab_category')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function get_lab_category_description($id){
            $result = $this->db->select('description')->from('lab_category')->where('id',$id)->limit(1)->get();
            if ($result) {
                return $result->row_array();
            }else{
                return array();
            }
        }

        public function save_lab_category_description($data){
            $this->db->where('id',$data['lab_category_id'])->update('lab_category',array('description'=>$data['description']));
            return $this->db->affected_rows();
        }

        public function delete_lab_category($id) {
            $this->db->where('id', $id)->delete('lab_category');
            return $this->db->affected_rows();
        }

        public function add_lab_test($data){
            if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $this->db->where('id',$id)->update('lab_test',array('name'=>$editval));
                return $this->db->affected_rows();
            }else{
                $this->db->insert('lab_test', $data);
                return $this->db->insert_id();
            }

        }

        public function get_lab_tests(){
            $result = $this->db->select('*')->from('lab_test')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function delete_lab_test($id) {
            $this->db->where('id', $id)->delete('lab_test');
            return $this->db->affected_rows();
        }

        public function get_lab_test_description($id){
            $result = $this->db->select('description')->from('lab_test')->where('id',$id)->limit(1)->get();
            if ($result) {
                return $result->row_array();
            }else{
                return array();
            }
        }

        public function save_lab_test_description($data){
            $this->db->where('id',$data['lab_test_id'])->update('lab_test',array('description'=>$data['description']));
            return $this->db->affected_rows();
        }

        public function get_lab_tests_by_category($cate_id){
            $result = $this->db->select('*')->from('lab_test')->where('lab_category_id',$cate_id)->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

	}

?>