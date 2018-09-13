<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Recommendation_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();

		}
		public function get_recommendations(){
            $result = $this->db->select('*')->from('recommendation')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function add_recommendation($data){
		    if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $this->db->where('id',$id)->update('recommendation',array('description'=>$editval));
                return $this->db->affected_rows();
            }else{
                $this->db->insert('recommendation', $data);
                return $this->db->insert_id();
            }

        }

        public function delete_recommendation($id) {
            $this->db->where('id', $id)->delete('recommendation');
            return $this->db->affected_rows();
        }

	}

?>