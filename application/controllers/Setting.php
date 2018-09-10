<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Setting extends MY_Controller
	{
		
		function __construct()
		{
			parent:: __construct();
			$this->load->helper('content-type');
			$this->load->model('Dashboard_model');
			$this->load->model('Setting_model');

		}

		public function pat_profession(){
			$data['professions'] = $this->Setting_model->get_professions();
			$json['result_html'] = $this->load->view('pages/profession', $data, true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function pat_district(){
			$data['districts'] = $this->Setting_model->get_districts();
			$json['result_html'] = $this->load->view('pages/district', $data, true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function history(){
			$json['result_html'] = $this->load->view('pages/patient_history', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function examination(){
			$json['result_html'] = $this->load->view('pages/examination', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}
		public function investigation(){
			$json['result_html'] = $this->load->view('pages/investigation', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}
		public function angio_recommendation(){
			$json['result_html'] = $this->load->view('pages/angio-recommendation', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function instruction(){
			$json['result_html'] = $this->load->view('pages/instruction', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function medicine(){
			$json['result_html'] = $this->load->view('pages/medicine', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

        public function advice(){
            $data['advices'] = $this->Setting_model->get_advices();
            $json['result_html'] = $this->load->view('pages/advice',$data, true);
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

		public function research(){
			$json['result_html'] = $this->load->view('pages/add_research', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function manage_research(){
			$json['result_html'] = $this->load->view('pages/manage_research', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function register_user(){
			$json['result_html'] = $this->load->view('pages/register-user', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function special_instruction(){
			$json['result_html'] = $this->load->view('pages/special-instruction', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function pat_delete(){
			$json['result_html'] = $this->load->view('pages/delete-patient', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function booking_limiter(){
			$data['limiter_details'] = $this->Dashboard_model->get_limiter_details();
			$json['result_html'] = $this->load->view('pages/limiter', $data, true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function laboratory_test(){
			$json['result_html'] = $this->load->view('pages/laboratory_test', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function dr_signature(){
			$json['result_html'] = $this->load->view('pages/doctor_signature', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function change_permissions(){
			$json['result_html'] = $this->load->view('pages/change_permissions', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function echo_setting(){
			$json['result_html'] = $this->load->view('pages/echo_setting', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function ett_setting(){
			$json['result_html'] = $this->load->view('pages/ett_setting', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function patient_exemination(){
			$json['result_html'] = $this->load->view('pages/pat_examination', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

        public function add_advice(){
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->form_validation->set_rules('name', 'Advice Name', 'required|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $json['error'] = true;
                $json['message'] = validation_errors();
            } else {
                $data = $this->input->post();
                $result = $this->Setting_model->add_advice($data);
                if ($result) {
                    $json['success'] = true;
                    $json['message'] = "Advice created successfully!";
                } else {
                    $json['error'] = true;
                    $json['message'] = "Seems to an error while creating advice";
                }
            }
            $data['advices'] = $this->Setting_model->get_advices();
            $json['result_html'] = $this->load->view('pages/advice',$data, true);
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

        public function save_advice(){
            $data = $this->input->post();
            $result = $this->Setting_model->add_advice($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Advice save successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error while saving advice";
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

        public function delete_advice($id){
            $result = $this->Setting_model->delete_advice($id);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Advice successfully deleted.";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error in deleting advice record.";
            }
            $data['advices'] = $this->Setting_model->get_advices();
            $json['result_html'] = $this->load->view('pages/advice',$data, true);
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }
	}
?>