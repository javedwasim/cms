<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Angio_recommendation extends MY_Controller
{

    function __construct()
    {
        parent:: __construct();
        $this->load->helper('content-type');
        $this->load->model('Dashboard_model');
        $this->load->model('Recommendation_model');

    }

    public function recommendation(){
        $data['rights'] = $this->session->userdata('other_rights');
        $data['recommendations'] = $this->Recommendation_model->get_recommendations();
        $json['result_html'] = $this->load->view('angio/recommendation', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save_recommendation(){
        $data = $this->input->post();
        if (empty($data['editval'])) {
            $json['error'] = true;
            $json['message'] = 'Could not update empty field.';
        }else{
            $result = $this->Recommendation_model->add_recommendation($data);
            if ($result == 'updated') {
                $json['success'] = true;
                $json['message'] = "Updated successfully!";
            }else if( $result == 'inserted'){  
                $json['success'] = true;
                $json['message'] = "Created successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function add_recommendation(){
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('description', 'Investigation Name', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Recommendation_model->add_recommendation($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Created successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        $data['rights'] = $this->session->userdata('other_rights');
        $data['recommendations'] = $this->Recommendation_model->get_recommendations();
        $json['result_html'] = $this->load->view('angio/recommendation_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function delete_recommendation($id){
        $result = $this->Recommendation_model->delete_recommendation($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Deleted successfully.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        $data['rights'] = $this->session->userdata('other_rights');
        $data['recommendations'] = $this->Recommendation_model->get_recommendations();
        $json['result_html'] = $this->load->view('angio/recommendation_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }


}

?>