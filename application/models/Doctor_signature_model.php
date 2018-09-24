<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Doctor_signature_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();

		}

		public function save_doc_signature($data){
			$result = $this->db->insert('doctor_signature', $data);
			if ($result) {
				return true;
			}else{
				return false;
			}
		}

		public function get_signature_details(){
			$result = $this->db->select('*')
						->from('doctor_signature')
						->get();
			if ($result) {
				return $result->result_array();
			}else{
				return array();
			}
		}

		public function update_details($data){
			$id = $data['id'];
            $editval = trim($data['editval']);
            $editval = preg_replace('/(<br>)+$/', '', $editval);
            $column = $data['column'];
            $result = $this->db->where('id',$id)->update('doctor_signature',array($column=>$editval));
            if ($result) {
            	return true;
            }else{
            	return false;
            }
		}

		public function delete_signature($id) {
            $result = $this->db->where('id', $id)->delete('doctor_signature');
            if ($result) {
            	return true;
            }else{
            	return false;
            }
        }
	}

?>