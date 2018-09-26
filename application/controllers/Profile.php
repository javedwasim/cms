<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Profile extends MY_Controller
	{
		
		function __construct()
		{
			parent:: __construct();
			$this->load->model('Setting_model');
			$this->load->model('Profile_model');
			$this->load->model('Dashboard_model');
            $this->load->model('Instruction_model');
			$this->load->helper('content-type');
			date_default_timezone_set("Asia/Karachi");
		}

		public function index(){
			$data['professions'] = $this->Setting_model->get_professions();
			$data['districts'] = $this->Setting_model->get_districts();
			$data['profiles'] = $this->Profile_model->get_profiles();
            $data['rights'] = $this->session->userdata('other_rights');
            $json['profession_table'] = $this->load->view('pages/profession_table', $data, true);
            $json['profile_table'] = $this->load->view('profile/profile_table', $data, true);
            $json['result_html'] = $this->load->view('pages/profile', $data, true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function patient_special_instructions(){
            $data['rights'] = $this->session->userdata('other_rights');
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
            $data['rights'] = $this->session->userdata('other_rights');
			$json['result_html'] = $this->load->view('pages/patient_echo_test', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function patient_ett_test(){
            $data['rights'] = $this->session->userdata('other_rights');
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
                $data['rights'] = $this->session->userdata('other_rights');
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
            $data['rights'] = $this->session->userdata('other_rights');
            $json['profile_table'] = $this->load->view('profile/profile_table', $data, true);
            if ($this->input->is_ajax_request()) {
		            set_content_type($json);
		    }
		}

		public function update_modal(){
			$id = $this->input->post('id');
			$data['professions'] = $this->Setting_model->get_professions();
			$data['districts'] = $this->Setting_model->get_districts();
			$data['profile_data'] = $this->Profile_model->get_profile_by_id($id);
            $data['rights'] = $this->session->userdata('other_rights');
			$json['edit_modal'] = $this->load->view('profile/edit_profile', $data, true);
            if ($this->input->is_ajax_request()) {
		            set_content_type($json);
		    }
		}

		public function update_profile_data(){
			$this->load->library('form_validation');
	        $this->load->helper('security');
			$id = $this->input->post('id');
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
	        	$result = $this->Profile_model->update_profile($data,$id);
	        	if ($result) {
	        		$json['success'] = true;
                	$json['message'] = "Profile Updated Successfully.";
	        	}else{
	        		$json['error'] = true;
                	$json['message'] = "Seems to an error";
	        	}
	        	$data['profiles'] = $this->Profile_model->get_profiles();
                $data['rights'] = $this->session->userdata('other_rights');
            	$json['profile_table'] = $this->load->view('profile/profile_table', $data, true);
		        if ($this->input->is_ajax_request()) {
		            set_content_type($json);
		        }
	        }
		}

		public function save_note(){
			$usename = $this->input->post('username');
			$note = $this->input->post('note');
			$date = date('Y-m-d H:i:s');
			$data_array = array(
					'username' => $usename,
					'note' => $note,
					'updated_at' => $date
				);
			$result = $this->Profile_model->insert_notes($data_array);
			if ($result) {
				$json['success'] = true;
            	$json['message'] = "Saved Successfully.";
			}else{
				$json['error'] = true;
            	$json['message'] = "Seems to an error";
			}
			$data['note_details'] = $this->Profile_model->get_notes();
			$data['users'] = $this->Dashboard_model->get_all_user();
		    $json['diary_update'] = $this->load->view('diary/diary_update', $data, true);
			if ($this->input->is_ajax_request()) {
	            set_content_type($json);
	        }
		}

		public function delete_note($id){
			$result = $this->Profile_model->delete_notes($id);
			if ($result) {
				$json['success'] = true;
            	$json['message'] = "Deleted Successfully.";
			}else{
				$json['error'] = true;
            	$json['message'] = "Seems to an error.";
			}
			if ($this->input->is_ajax_request()) {
	            set_content_type($json);
	        }
		}

		public function get_notes_record(){
			$name = $this->input->post('username');
			$data['notes_record'] = $this->Profile_model->notes_record($name);
			$json['diary_sidebar'] = $this->load->view('diary/diary_sidebar', $data, true);
			if ($this->input->is_ajax_request()) {
	            set_content_type($json);
	        }
		}

		public function get_selected_note(){
			$id = $this->input->post('id');
			$data['note'] = $this->Profile_model->selectd_note($id);
			$json['update_note'] = $this->load->view('diary/diary_update', $data, true);
			if ($this->input->is_ajax_request()) {
	            set_content_type($json);
	        }
		}

		public function update_note(){
			$id = $this->input->post('id');
			$note = $this->input->post('note');
			$result = $this->Profile_model->update_diary_note($id,$note);
			if ($result) {
				$json['success'] = true;
			}else{
				$json['error'] = true;
			}
			if ($this->input->is_ajax_request()) {
	            set_content_type($json);
	        }
		}

		public function profile_filters(){
			$filters = $this->input->post();
			$data['profiles'] = $this->Profile_model->get_profiles_by_filters($filters);
	        $data['filters'] = $filters;
	        $json['profile_table'] = $this->load->view('profile/profile_table', $data, true);
	        if ($this->input->is_ajax_request()) {
	            set_content_type($json);
	        }
		}

		public function patient_info(){
			$id = $this->input->post('patid');
			$data['patient_info'] = $this->Profile_model->patient_info_by_id($id);
			$json['patient_information']=$this->load->view('profile/patient_information',$data,true);
			if ($this->input->is_ajax_request()) {
	            set_content_type($json);
	        }

		}


	}
?>