<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');

	class History_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();

		}
		public function get_profile_history(){
            $result = $this->db->select('*')->from('profile_history')->order_by('sort_order')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function get_profile_history_exist($data){
            $editval = trim($data['name']);
            $editval = preg_replace('/(<br>)+$/', '', $editval);
            $result = $this->db->select('*')->from('profile_history')->where('name',$editval)->get();
            if ($result->num_rows()>0) {
                return true;
            }else{
                return false;
            }
        }

        public function add_profile_history($data){
		    if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $result = $this->db->where('id',$id)->update('profile_history',array('name'=>$editval));
                if ($result) {
                    return 'updated';
                }else{
                    return false;
                }
            }else{
                $result = $this->db->insert('profile_history', $data);
                if ($result) {
                    return 'inserted';
                }else{
                    return false;
                }
            }

        }

        public function add_history_item($data){
            if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $result = $this->db->where('id',$id)->update('history_item',array('name'=>$editval));
                if($result){
                    return 'updated';
                }else{
                    return false;
                }
            }else{
                $result = $this->db->insert('history_item', $data);
                if ($result) {
                    return 'inserted';
                }else{
                    return false;
                }
            }
            return false;

        }

        public function delete_profile_history($id) {
            $this->db->where('profile_history_id', $id)->delete('history_item');
            $this->db->where('id', $id)->delete('profile_history');
            return $this->db->affected_rows();
        }

        public function get_history_items(){
            $result = $this->db->select('*')->from('history_item')->order_by('sort_order')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function history_item_exits($data){
            $name = trim($data['name']);
            $name = preg_replace('/(<br>)+$/', '', $name);
            $result = $this->db->select('*')->from('history_item')->where('name',$name)->get();
            if ($result->num_rows()>0) {
                return true;
            }else{
                return false;
            }
        }

        public function delete_history_item($id) {
            $this->db->where('id', $id)->delete('history_item');
            return $this->db->affected_rows();
        }

        public function get_history_item_description($id){
            $result = $this->db->select('*')->from('history_item')->where('id',$id)->limit(1)->get();
            if ($result) {
                return $result->row_array();
            }else{
                return array();
            }
        }

        public function get_profile_history_description($id){
            $result = $this->db->select('*')->from('profile_history')->where('id',$id)->limit(1)->get();
            if ($result) {
                return $result->row_array();
            }else{
                return array();
            }
        }

        public function save_history_item_description($data){
            $this->db->where('id',$data['history_item_id'])->update('history_item',array('description'=>$data['description']));
            return $this->db->affected_rows();
        }

        public function get_history_items_by_category($cate_id){
            if($cate_id>0){
                $result = $this->db->select('*')->from('history_item')->where('profile_history_id',$cate_id)
                ->order_by('sort_order')->get();
            }else{
                $result = $this->db->select('*')->from('history_item')->order_by('sort_order')->get();
            }
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function save_profile_history_description($data){
            $this->db->where('id',$data['profile_history_id'])->update('profile_history',array('description'=>$data['description']));
            return $this->db->affected_rows();
        }
	}

?>