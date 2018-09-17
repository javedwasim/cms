<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ETT extends MY_Controller
{

    function __construct()
    {
        parent:: __construct();
        $this->load->helper('content-type');
        $this->load->model('Dashboard_model');
        $this->load->model('ETT_model');

    }


    public function ett_setting(){
    	$data['test_reasons'] = $this->ETT_model->get_test_reasons();
    	$data['ending_reasons'] = $this->ETT_model->get_ending_reasons();
    	$data['descriptions'] = $this->ETT_model->get_descriptions();
    	$data['conclusions'] = $this->ETT_model->get_conclusions();
		$json['result_html'] = $this->load->view('ett/ett_setting', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
	}

	public function add_ett_testreason(){
		$this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('testreason', 'Test Reason', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $reason = $this->input->post('testreason');
            $result = $this->ETT_model->insert_test_reason($reason);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Added successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        $data['test_reasons'] = $this->ETT_model->get_test_reasons();
        $data['active_tab'] = 'category';
        $json['result_html'] = $this->load->view('ett/test_reason_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
	}

	public function delete_ett_test_reason($id){
        $result = $this->ETT_model->delete_test_reason($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Deleted Successfully.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        $data['test_reasons'] = $this->ETT_model->get_test_reasons();
        $data['active_tab'] = 'category';
        $json['result_html'] = $this->load->view('ett/test_reason_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function update_ett_test_reason()
    {
        $data = $this->input->post();
        $result = $this->ETT_model->insert_test_reason($data);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Updated successfully!";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function add_ett_endingreason(){
		$this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('endingreason', 'Ending Reason', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $reason = $this->input->post('endingreason');
            $result = $this->ETT_model->insert_ending_reason($reason);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Added successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        $data['ending_reasons'] = $this->ETT_model->get_ending_reasons();
        $data['active_tab'] = 'category';
        $json['result_html'] = $this->load->view('ett/ending_reason_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
	}

	public function delete_ett_ending_reason($id){
        $result = $this->ETT_model->delete_ending_reason($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Deleted Successfully.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        $data['ending_reasons'] = $this->ETT_model->get_ending_reasons();
        $data['active_tab'] = 'category';
        $json['result_html'] = $this->load->view('ett/ending_reason_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function update_ett_ending_reason()
    {
        $data = $this->input->post();
        $result = $this->ETT_model->insert_ending_reason($data);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Updated successfully!";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function add_ett_discription(){
		$this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('description', 'Description', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $description = $this->input->post('description');
            $result = $this->ETT_model->insert_description($description);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Added successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        $data['descriptions'] = $this->ETT_model->get_descriptions();
        $data['active_tab'] = 'category';
        $json['result_html'] = $this->load->view('ett/description_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
	}

	public function delete_ett_description($id){
        $result = $this->ETT_model->delete_description($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Deleted Successfully.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        $data['descriptions'] = $this->ETT_model->get_descriptions();
        $data['active_tab'] = 'category';
        $json['result_html'] = $this->load->view('ett/description_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function update_ett_description()
    {
        $data = $this->input->post();
        $result = $this->ETT_model->insert_description($data);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Updated successfully!";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function add_conclusion(){
		$this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('conclusion', 'Description', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $conclusion = $this->input->post('conclusion');
            $result = $this->ETT_model->insert_conclusions($conclusion);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Added successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        $data['conclusions'] = $this->ETT_model->get_conclusions();
        $data['active_tab'] = 'category';
        $json['result_html'] = $this->load->view('ett/conclusion_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
	}

	public function delete_conclusion($id){
        $result = $this->ETT_model->delete_ett_conclusion($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Deleted Successfully.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        $data['conclusions'] = $this->ETT_model->get_conclusions();
        $data['active_tab'] = 'category';
        $json['result_html'] = $this->load->view('ett/conclusion_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function update_conclusion()
    {
        $data = $this->input->post();
        $result = $this->ETT_model->insert_conclusions($data);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Updated successfully!";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }


}


?>