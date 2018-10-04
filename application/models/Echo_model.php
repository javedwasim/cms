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

        public function add_structure_category($data){
            if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $this->db->where('id',$id)->update('structure',array('name'=>$editval));
                return $this->db->affected_rows();
            }else{
                $this->db->insert('structure', $data);
                return $this->db->insert_id();
            }

        }

        public function get_structure_categories(){
            $result = $this->db->select('*')->from('structure')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function delete_structure_category($id) {
            $this->db->where('id', $id)->delete('structure');
            return $this->db->affected_rows();
        }

        public function add_structure_finding($data){
            if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $this->db->where('id',$id)->update('structure_finding',array('name'=>$editval));
                return $this->db->affected_rows();
            }else{
                $this->db->insert('structure_finding', $data);
                return $this->db->insert_id();
            }

        }

        public function get_structure_findings(){
            $result = $this->db->select('*')->from('structure_finding')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function delete_structure_finding($id) {
            $this->db->where('id', $id)->delete('structure_finding');
            return $this->db->affected_rows();
        }

        public function delete_structure_diagnosis($id) {
            $this->db->where('id', $id)->delete('diagnosis');
            return $this->db->affected_rows();
        }

        public function get_structure_findings_by_id($id){
            $result = $this->db->select('*')
                        ->from('structure_finding')
                        ->where('structure_id',$id)->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function get_structure_id($id){
            $result = $this->db->select('*')->from('structure_finding')->where('id',$id)->limit(1)->get();
            if ($result) {
                return $result->row_array();
            }else{
                return array();
            }
        }

        public function get_diagnosis_structure_id($id){
            $result = $this->db->select('*')->from('diagnosis')->where('id',$id)->limit(1)->get();
            if ($result) {
                return $result->row_array();
            }else{
                return array();
            }
        }

        public function get_structure_diagnosis_by_id($id){
            $result = $this->db->select('*')->from('diagnosis')->where('structure_id',$id)->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }


        public function add_structure_diagnose($data){
            if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $this->db->where('id',$id)->update('diagnosis',array('name'=>$editval));
                return $this->db->affected_rows();
            }else{
                $this->db->insert('diagnosis', $data);
                return $this->db->insert_id();
            }

        }

        public function assign_finding_to_disease($data){
            $query = $this->db->select('*')->from('disease_findings')->where('disease_id',$data['disease_id'])->where('finding_id',$data['finding_id'])->limit(1)->get();
            if ($query->num_rows() == 0) {
                $this->db->insert('disease_findings',
                    array('disease_id'=>$data['disease_id'],'finding_id'=>$data['finding_id'],'structure_id'=>$data['structure_id']));
            }else{
                $this->db->where('disease_id',$data['disease_id'])->where('finding_id',$data['finding_id'])->update('disease_findings',
                    array('disease_id'=>$data['disease_id'],'finding_id'=>$data['finding_id'],'structure_id'=>$data['structure_id']));
            }

            $result = $this->db->select('structure_id')->from('structure_finding')->where('id',$data['finding_id'])->limit(1)->get();
            $row = $result->row_array();
            $structure_id = $row['structure_id'];

            $this->db->where('structure_id',$structure_id)->update('structure_finding',array('disease_id'=>0));
            $this->db->where('id',$data['finding_id'])->update('structure_finding',array('disease_id'=>$data['disease_id']));
            return $this->db->affected_rows();
        }

        public function assign_diagnose_to_disease($data){
            $query = $this->db->select('*')->from('disease_diagnosis')
                    ->where('disease_id',$data['disease_id'])
                    ->where('diagnosis_id',$data['diagnose_id'])->limit(1)->get();
            if ($query->num_rows() == 0) {
                $this->db->insert('disease_diagnosis', array('disease_id'=>$data['disease_id'],'diagnosis_id'=>$data['diagnose_id'],'structure_id'=>$data['structure_id']));
            }else{
                $this->db->where('disease_id',$data['disease_id'])->where('diagnosis_id',$data['diagnose_id'])->update('disease_diagnosis',
                    array('disease_id'=>$data['disease_id'],'diagnosis_id'=>$data['diagnose_id'],'structure_id'=>$data['structure_id']));
            }

            $result = $this->db->select('structure_id')->from('diagnosis')->where('id',$data['diagnose_id'])->limit(1)->get();
            $row = $result->row_array();
            $structure_id = $row['structure_id'];

            $this->db->where('structure_id',$structure_id)->update('diagnosis',array('disease_id'=>0));
            $this->db->where('id',$data['diagnose_id'])->update('diagnosis',array('disease_id'=>$data['disease_id']));
            return $this->db->affected_rows();
        }

        public function add_main_category_item($data){
            $query = $this->db->select('*')->from('echo_category')->where('name',$data['name'])->where('main_category',trim($data['main_category']))->limit(1)->get();
            if ($query->num_rows() >= 1) {
                return false;
            }else{
                if(isset($data['id'])){
                    $id = $data['id'];
                    $editval = trim($data['editval']);
                    $editval = preg_replace('/(<br>)+$/', '', $editval);
                    $this->db->where('id',$id)->update('echo_category',array('name'=>$editval));
                    return $this->db->affected_rows();
                }else{
                    $this->db->insert('echo_category', $data);
                    return $this->db->insert_id();
                }
            }
        }

        public function get_echo_main_categories(){
            $result = $this->db->select('*')->from('echo_category')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function delete_main_category_item($id) {
            $this->db->where('id', $id)->delete('echo_category');
            return $this->db->affected_rows();
        }

        public function get_main_category_by_filter($category) {

            if(($category=='dooplers') || ($category=='mmode')){
                $result = $this->db->select('*')->from('echo_category')->where('main_category',"$category")->get();
            }else{
                $result = $this->db->select('*')->from('echo_category')->get();
            }
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function add_category_measurement($data){
            if(isset($data['id'])){
                if($data['column'] == 'item'){
                    $id = $data['id'];
                    $editval = trim($data['editval']);
                    $editval = preg_replace('/(<br>)+$/', '', $editval);
                    $this->db->where('id',$id)->update('category_measurement',array('item'=>$editval));
                    return $this->db->affected_rows();
                }else{
                    $id = $data['id'];
                    $editval = trim($data['editval']);
                    $editval = preg_replace('/(<br>)+$/', '', $editval);
                    $this->db->where('id',$id)->update('category_measurement',array('value'=>$editval));
                    return $this->db->affected_rows();
                }

            }else{
                $this->db->insert('category_measurement', $data);
                return $this->db->insert_id();
            }

        }

        public function get_category_measurement(){
            $result = $this->db->select('*')->from('category_measurement')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function delete_category_measurement($id) {
            $this->db->where('id', $id)->delete('category_measurement');
            return $this->db->affected_rows();
        }

        public function get_measurement_by_filter($category) {
            if($category>0){
                $result = $this->db->select('*')->from('category_measurement')->where('category_id',"$category")->get();
            }else{
                $result = $this->db->select('*')->from('category_measurement')->get();
            }
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }
	}

?>