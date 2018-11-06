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
                $result = $this->db->where('id',$id)->update('recommendation',array('description'=>$editval));
                if ($result) {
                    return 'updated';
                }else{
                    return false;
                }
            }else{
                $result = $this->db->insert('recommendation', $data);
                if ($result) {
                    return 'inserted';
                }else{
                    return false;
                }
            }
            return false;

        }

        public function delete_recommendation($id) {
            $this->db->where('id', $id)->delete('recommendation');
            return $this->db->affected_rows();
        }

	}

?>