<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Profile extends MY_Controller
	{
		
		function __construct()
		{
			parent:: __construct();
			$this->load->model('Setting_model');
			$this->load->helper('content-type');
		}

		public function index(){
			$data['professions'] = $this->Setting_model->get_professions();
			$data['districts'] = $this->Setting_model->get_districts();
            $json['result_html'] = $this->load->view('pages/profile', $data, true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function patient_special_instructions(){
			$json['result_html'] = $this->load->view('pages/pat_sp_instructions', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function patient_lab_test(){
			$json['result_html'] = $this->load->view('pages/pat_lab_test', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}
		
		public function patient_echo_test(){
			$json['result_html'] = $this->load->view('pages/patient_echo_test', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function patient_ett_test(){
			$json['result_html'] = $this->load->view('pages/pat_ett_test', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}
	}
?>