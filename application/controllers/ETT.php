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


}


?>