<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');

	class ETT_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();

		}

		public function insert_test_reason($data){
			$this->db->set('test_reason', $data);
			$this->db->insert('ett_test_reason');
            return $this->db->insert_id();
		}

		public function get_test_reasons(){
            $result = $this->db->select('*')->from('ett_test_reason')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function delete_ett_test_reason($id) {
            $this->db->where('id', $id)->delete('ett_test_reason');
            return $this->db->affected_rows();
        }


	}
?>