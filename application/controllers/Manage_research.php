<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Manage_research extends MY_Controller
	{
		
		function __construct()
		{
			parent:: __construct();
			$this->load->helper('content-type');
			$this->load->model('Profile_model');
			$this->load->model('Setting_model');
		}

		public function manage_research(){
			$data['profiles'] = $this->Profile_model->get_profiles();
			$data['researches'] = $this->Setting_model->get_researches();
			$json['profile_table'] = $this->load->view('manage_research/manage_research_table', $data, true);
			$json['result_html'] = $this->load->view('manage_research/manage_research', $data, true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function delete_research_profile($id){
			$result = $this->Profile_model->delete_pat_profile($id);
			if ($result) {
				$json['success'] = true;
                $json['message'] = "Deleted successfully.";
			}else{
				$json['error'] = true;
                $json['message'] = "Seems to an error";
			}
			$data['profiles'] = $this->Profile_model->get_profiles();
            $json['profile_table'] = $this->load->view('manage_research/manage_research_table', $data, true);
            if ($this->input->is_ajax_request()) {
		            set_content_type($json);
		    }

		}
	}

?>