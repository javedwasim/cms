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
			$data['professions'] = $this->Setting_model->get_professions();
			$data['districts'] = $this->Setting_model->get_districts();
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

		public function assign_research(){
			$researchid = $this->input->post('rid');
			$profileid = $this->input->post('pid');
			$result = $this->Profile_model->research_assign($researchid,$profileid);
			if ($result) {
				$json['success'] = true;
			}else{
				$json['error'] = true;
			}
			if ($this->input->is_ajax_request()) {
		            set_content_type($json);
		    }
		}

		public function research_filters(){
			$filters = $this->input->post();
			$data['profiles'] = $this->Profile_model->get_profiles_by_filters($filters);
	        $data['filters'] = $filters;
	        // print_r($data['batches']);
	        $json['profile_table'] = $this->load->view('manage_research/manage_research_table', $data, true);
	        if ($this->input->is_ajax_request()) {
	            set_content_type($json);
	        }
		}

		public function reset_research_table(){
			$data['profiles'] = $this->Profile_model->get_profiles();
			$json['profile_table'] = $this->load->view('manage_research/manage_research_table', $data, true);
	        if ($this->input->is_ajax_request()) {
	            set_content_type($json);
	        }
		}

		public function research_description(){
			$researchid = $this->input->post('id');
			$data['description'] = $this->Profile_model->get_research_description($researchid);
			$json['description_html'] = $this->load->view('manage_research/research_modal',$data,true);
			if ($this->input->is_ajax_request()) {
	            set_content_type($json);
	        }
		}

		public function history_filter(){
			$filter = $this->input->post('filter');
			$data['profiles'] = $this->Profile_model->get_patient_in_history($filter);
	        $json['profile_table'] = $this->load->view('manage_research/manage_research_table', $data, true);
	        if ($this->input->is_ajax_request()) {
	            set_content_type($json);
	        }
		}

		public function examination_filter(){
			$filter = $this->input->post('filter');
			$data['profiles'] = $this->Profile_model->get_patient_in_examination($filter);
	        $json['profile_table'] = $this->load->view('manage_research/manage_research_table', $data, true);
	        if ($this->input->is_ajax_request()) {
	            set_content_type($json);
	        }
		}

		public function investigation_filter(){
			$filter = $this->input->post('filter');
			$data['profiles'] = $this->Profile_model->get_patient_in_investigation($filter);
	        $json['profile_table'] = $this->load->view('manage_research/manage_research_table', $data, true);
	        if ($this->input->is_ajax_request()) {
	            set_content_type($json);
	        }
		}

		public function advice_filter(){
			$filter = $this->input->post('filter');
			$data['profiles'] = $this->Profile_model->get_patient_in_advice($filter);
	        $json['profile_table'] = $this->load->view('manage_research/manage_research_table', $data, true);
	        if ($this->input->is_ajax_request()) {
	            set_content_type($json);
	        }
		}

		public function medicine_filter(){
			$filter = $this->input->post('filter');
			$data['profiles'] = $this->Profile_model->get_patient_in_medicine($filter);
	        $json['profile_table'] = $this->load->view('manage_research/manage_research_table', $data, true);
	        if ($this->input->is_ajax_request()) {
	            set_content_type($json);
	        }
		}



	}

?>