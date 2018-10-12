<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Print_model extends CI_Model
	{

	    function __construct()
	    {
	        parent::__construct();
	        date_default_timezone_set("Asia/Karachi");
	    }

	    public function get_protocol_name_by_id($id){
	    	$result = $this->db->select('*')
	    			->where('id',$id)
	    			->get('ett_protocols');
	    	if ($result) {
	    		return $result->row()->protocol;
	    	}else{
	    		return false;
	    	}
	    }
	    public function get_testreason_name_by_id($id){
	    	$result = $this->db->select('*')
	    			->where('id',$id)
	    			->get('ett_test_reason');
	    	if ($result) {
	    		return $result->row()->test_reason;
	    	}else{
	    		return false;
	    	}
	    }
	    public function get_endingtestreason_name_by_id($id){
	    	$result = $this->db->select('*')
	    			->where('id',$id)
	    			->get('ett_ending_reason');
	    	if ($result) {
	    		return $result->row()->ending_reason;
	    	}else{
	    		return false;
	    	}
	    }

	    public function get_sp_inst_detail_by_ids($patid,$testid){
	    	$result = $this->db->select('*')
            ->from('patient_special_instruction')
            ->where('id', $testid)
            ->where('patient_id', $patid)
            ->get();
	        if ($result) {
	            return $result->row();
	        } else {
	            return array();
	        }
	    }

	    public function delete_test_ett($testid,$patid){
	    	$result = $this->db->delete('patient_ett_test', array('id' => $testid,'patient_id'=>$patid));
	    	if ($result) {
	    		$result = $this->db->delete('patient_ett_test_protocol', array('patient_ett_test_id' => $testid,'patient_id'=>$patid));
	    		if ($result) {
	    			return true;
	    		}else{
	    			return false;
	    		}
	    	}else{
	    		return false;
	    	}
	    }
	}
?>