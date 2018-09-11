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


	}

?>