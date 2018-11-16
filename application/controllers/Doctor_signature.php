<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Doctor_signature extends MY_Controller
	{
		
		function __construct()
		{
			parent:: __construct();
			$this->load->helper('content-type');
			$this->load->model('Doctor_signature_model');
			$this->load->library('form_validation');
        	$this->load->helper('security');

		}

		public function signature(){
			$data['rights'] = $this->session->userdata('other_rights');
			$data['sig_details'] = $this->Doctor_signature_model->get_signature_details();
            $json['signature_table'] = $this->load->view('doctor_signature/signature_table', $data, true);
			$json['result_html'] = $this->load->view('doctor_signature/doctor_signature', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function save_doc_signature(){
			$name = $this->input->post('docName');
			$qualifications = $this->input->post('docQuali');
			$designation = $this->input->post('docDesi');
			$institute = $this->input->post('docInst');
        	$this->form_validation->set_rules('docName', 'Test Reason', 'required|xss_clean');
        	$this->form_validation->set_rules('docQuali', 'Test Reason', 'required|xss_clean');
        	$this->form_validation->set_rules('docDesi', 'Test Reason', 'required|xss_clean');
        	$this->form_validation->set_rules('docInst', 'Test Reason', 'required|xss_clean');
        	if($this->form_validation->run() == FALSE){
        		$json['error'] = true;
            	$json['validation_error'] = validation_errors();
        	}else{
        		$data_array = array(
					'name' => $name, 
					'qualifications' => $qualifications,
					'institute' => $designation,
					'designation' => $institute
				);
				$result = $this->Doctor_signature_model->save_doc_signature($data_array);
				if($result){
					$data['rights'] = $this->session->userdata('other_rights');
					$data['sig_details'] = $this->Doctor_signature_model->get_signature_details();
					$json['signature_table'] = $this->load->view('doctor_signature/signature_table', $data, true);
					$json['message'] = 'Successfully Added.';
				}else{
					$data['rights'] = $this->session->userdata('other_rights');
					$data['sig_details'] = $this->Doctor_signature_model->get_signature_details();
					$json['signature_table'] = $this->load->view('doctor_signature/signature_table', $data, true);
					$json['error'] = 'There is an issue while adding.';
				}
        	}
			
			if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function update_signature_details(){
			$data = $this->input->post();
	        if (empty($data['editval'])) {
	            $json['error'] = true;
	            $json['message'] = 'Could not update empty field.';
	        }else{
	            $result = $this->Doctor_signature_model->update_details($data);
	            if ($result) {
	                $json['success'] = true;
	                $json['message'] = "Updated successfully!";
	            }else {
	                $json['error'] = true;
	                $json['message'] = "Seems to an error";
	            }
	        }
	        if ($this->input->is_ajax_request()) {
	            set_content_type($json);
	        }
		}

		public function delete_signature($id){
	        $result = $this->Doctor_signature_model->delete_signature($id);
	        if ($result) {
	            $json['success'] = true;
	            $json['message'] = "Deleted Successfully.";
	        } else {
	            $json['error'] = true;
	            $json['message'] = "Seems to an error";
	        }
	        $data['rights'] = $this->session->userdata('other_rights');
	        $data['sig_details'] = $this->Doctor_signature_model->get_signature_details();
	        $json['signature_table'] = $this->load->view('doctor_signature/signature_table', $data, true);
	        if ($this->input->is_ajax_request()) {
	            set_content_type($json);
	        }

    	}


	}
?>