<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Investigation extends MY_Controller
{

    function __construct()
    {
        parent:: __construct();
        $this->load->helper('content-type');
        $this->load->model('Dashboard_model');
        $this->load->model('Investigation_model');

    }

    public function investigation()
    {
        $cat_id = 0;
        $data['categories'] = $this->Investigation_model->get_investigation_categories();
        $data['items'] = $this->Investigation_model->get_investigation_items_by_category($cat_id);
        // $data['items'] = $this->Investigation_model->get_investigation_items();
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('investigation/investigation', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function add_investigation_category()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'Investigation Name', 'required|is_unique[investigation.name]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Investigation_model->add_investigation_category($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Created successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        $data['rights'] = $this->session->userdata('other_rights');
        $data['categories'] = $this->Investigation_model->get_investigation_categories();
        $data['items'] = $this->Investigation_model->get_investigation_items();
        $data['active_tab'] = 'category';
        $json['result_html'] = $this->load->view('investigation/investigation', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function add_investigation_item()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'investigation Name', 'required|xss_clean');
        $this->form_validation->set_rules('investigation_id', 'investigation Category', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $cat_id = $data['investigation_id'];
            $result = $this->Investigation_model->add_investigation_item($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Created successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        $data['rights'] = $this->session->userdata('other_rights');
        $data['items'] = $this->Investigation_model->get_investigation_items_by_category($cat_id);
        $data['active_tab'] = 'items';
        $json['result_html'] = $this->load->view('investigation/item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save_investigation_category()
    {
        $data = $this->input->post();
        if (empty($data['editval'])) {
            $json['error'] = true;
            $json['message'] = 'Could not update empty field.';
        }else{
            $result = $this->Investigation_model->add_investigation_category($data);
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

    public function delete_investigation_category($id)
    {
        $result = $this->Investigation_model->delete_investigation_category($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Successfully deleted.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        $data['rights'] = $this->session->userdata('other_rights');
        $data['categories'] = $this->Investigation_model->get_investigation_categories();
        $data['items'] = $this->Investigation_model->get_investigation_items();
        $data['active_tab'] = 'category';
        $json['result_html'] = $this->load->view('investigation/investigation', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function get_investigation_item($cat_id)
    {
        $data['items'] = $this->Investigation_model->get_investigation_items_by_category($cat_id);
        $data['selected_category'] = $cat_id;
        $data['active_tab'] = 'tests';
        $json['result_html'] = $this->load->view('investigation/item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_investigation_item_description()
    {
        $data = $this->input->post();
        $id = $data['id'];
        $result = $this->Investigation_model->get_investigation_item_description($id);

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

    public function save_investigation_item_description()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('description', 'Description', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Investigation_model->save_investigation_item_description($data);
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

    public function save_investigation_item()
    {
        $data = $this->input->post();
        if (empty($data['editval'])) {
            $json['error'] = true;
            $json['message'] = 'Could not update empty field.';
        }else{
            $result = $this->Investigation_model->add_investigation_item($data);
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

    public function delete_investigation_item($id,$cat_id)
    {
        $result = $this->Investigation_model->delete_investigation_item($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Successfully deleted.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error.";
        }
        $data['items'] = $this->Investigation_model->get_investigation_items_by_category($cat_id);
        $data['active_tab'] = 'items';
        $json['result_html'] = $this->load->view('investigation/item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function get_investigation_cat_description()
    {
        $data = $this->input->post();
        $id = $data['id'];
        $result = $this->Investigation_model->get_investigation_description($id);

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

    public function save_investigation_category_description()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('description', 'Description', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Investigation_model->save_investigation_category_description($data);
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