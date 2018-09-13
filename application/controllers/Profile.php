<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Profile extends MY_Controller
	{
		
		function __construct()
		{
			parent:: __construct();
			$this->load->model('Setting_model');
			$this->load->model('Profile_model');
			$this->load->helper('content-type');
		}

		public function index(){
			$data['professions'] = $this->Setting_model->get_professions();
			$data['districts'] = $this->Setting_model->get_districts();
			$data['profiles'] = $this->Profile_model->get_profiles();
            $json['profile_table'] = $this->load->view('profile/profile_table', $data, true);
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

		public function add_profile(){
			$this->load->library('form_validation');
	        $this->load->helper('security');
			$name = $this->input->post('name');
			$relatename = $this->input->post('relatename');
			$agedigit = $this->input->post('agedigit');
			$ageyears = $this->input->post('age');
			$profession = $this->input->post('profession');
			$sex = $this->input->post('sex');
			$contact = $this->input->post('contact');
			$height = $this->input->post('height');
			$bmi = $this->input->post('bmi');
			$weight = $this->input->post('weight');
			$bsa = $this->input->post('bsa');
			$email = $this->input->post('email');
			$district = $this->input->post('district');
			$address = $this->input->post('address');
			$age = $agedigit.''.$ageyears;
	        $this->form_validation->set_rules('name', 'Patient Name', 'required|xss_clean');
	        $this->form_validation->set_rules('relatename', 'Relative Name', 'required|xss_clean');
	        if ($this->form_validation->run() == FALSE) {
	        	$json['error'] = true;
            	$json['message'] = validation_errors();
	        }else{
	        	$data = array(
                            'pat_name' => $name,
                            'pat_relative' => $relatename,
                            'pat_age' => $age,
                            'pat_profession' => $profession,
                            'pat_sex' => $sex,
                            'pat_contact' => $contact,
                            'pat_height' => $height,
                            'pat_bmi' => $bmi,
                            'pat_weight' => $weight,
                            'pat_bsa' => $bsa,
                            'pat_email' => $email,
                            'pat_district' => $district,
                            'pat_address' => $address
                        );
	        	$result = $this->Profile_model->insert_profile($data);
	        	if ($result) {
	        		$json['success'] = true;
                	$json['message'] = "Profile Added Successfully.";
	        	}else{
	        		$json['error'] = true;
                	$json['message'] = "Seems to an error";
	        	}
	        	$data['profiles'] = $this->Profile_model->get_profiles();
            	$json['profile_table'] = $this->load->view('profile/profile_table', $data, true);
		        if ($this->input->is_ajax_request()) {
		            set_content_type($json);
		        }
	        }
		}

		public function delete_profile(){
			$id = $this->input->post('id');
			$result = $this->Profile_model->delete_pat_profile($id);
			if ($result) {
				$json['success'] = true;
                $json['message'] = "Deleted successfully.";
			}else{
				$json['error'] = true;
                $json['message'] = "Seems to an error";
			}
			$data['profiles'] = $this->Profile_model->get_profiles();
            $json['profile_table'] = $this->load->view('profile/profile_table', $data, true);
            if ($this->input->is_ajax_request()) {
		            set_content_type($json);
		    }
		}
	}
?>