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
	}

?>