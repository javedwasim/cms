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
	}
?>