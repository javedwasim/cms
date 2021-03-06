<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Examination extends MY_Controller
{

    function __construct()
    {
        parent:: __construct();
        $this->load->helper('content-type');
        $this->load->model('Dashboard_model');
        $this->load->model('Examination_model');

    }

    public function examination()
    {
        $cat_id = 0;
        $data['categories'] = $this->Examination_model->get_examination_categories();
        $data['items'] = $this->Examination_model->get_examination_items_by_category($cat_id);
        // $data['items'] = $this->Examination_model->get_examination_items();
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('examination/examination', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function add_examination_category()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'Examination Name', 'required|is_unique[examination.name]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Examination_model->add_examination_category($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Created successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        $data['categories'] = $this->Examination_model->get_examination_categories();
        $data['items'] = $this->Examination_model->get_examination_items();
        $data['active_tab'] = 'category';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('examination/examination', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function add_examination_item()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'Examination Name', 'required|xss_clean');
        $this->form_validation->set_rules('examination_id', 'examination Category', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $eid = $data['examination_id'];
            $result = $this->Examination_model->add_examination_item($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Created successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        $data['items'] = $this->Examination_model->get_examination_items_by_category($eid);
        $data['active_tab'] = 'items';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('examination/item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save_examination_category()
    {
        $data = $this->input->post();
        if (empty($data['editval'])) {
            $json['error'] = true;
            $json['message'] = 'Could not update empty field.';
        }else{
            $result = $this->Examination_model->add_examination_category($data);
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

    public function delete_examination_category($id)
    {
        $result = $this->Examination_model->delete_examination_category($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Successfully deleted.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        $data['categories'] = $this->Examination_model->get_examination_categories();
        $data['items'] = $this->Examination_model->get_examination_items();
        $data['active_tab'] = 'category';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('examination/examination', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function get_examination_item($cat_id)
    {
        $data['items'] = $this->Examination_model->get_examination_items_by_category($cat_id);
        $data['selected_category'] = $cat_id;
        $data['active_tab'] = 'tests';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('examination/item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_examination_item_description()
    {
        $data = $this->input->post();
        $id = $data['id'];
        $result = $this->Examination_model->get_examination_item_description($id);

        if ($result) {
            $json['success'] = true;
            $json['description'] = $result['description'];
            $json['category'] = $result['name'];
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save_examination_item_description()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('description', 'Description', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Examination_model->save_examination_item_description($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Description added successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error while adding description";
            }
        }

        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save_examination_item()
    {
        $data = $this->input->post();
        if (empty($data['editval'])) {
            $json['error'] = true;
            $json['message'] = 'Could not update empty field.';
        }else{
            $result = $this->Examination_model->add_examination_item($data);
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

    public function delete_examination_item($id,$eid)
    {
        $result = $this->Examination_model->delete_examination_item($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Successfully deleted.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error.";
        }
        $data['items'] = $this->Examination_model->get_examination_items_by_category($eid);
        $data['active_tab'] = 'items';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('examination/item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function get_examination_cat_description()
    {
        $data = $this->input->post();
        $id = $data['id'];
        $result = $this->Examination_model->get_examication_description($id);

        if ($result) {
            $json['success'] = true;
            $json['description'] = $result['description'];
            $json['category'] = $result['name'];
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save_examination_category_description()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('description', 'Description', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Examination_model->save_examination_category_description($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Description added successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error while adding description";
            }
        }

        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }
}

?>