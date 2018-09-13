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
        $data['categories'] = $this->Investigation_model->get_investigation_categories();
        $data['items'] = $this->Investigation_model->get_investigation_items();
        $json['result_html'] = $this->load->view('investigation/investigation', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function add_investigation_category()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'Investigation Name', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Investigation_model->add_investigation_category($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "investigation created successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        $data['categories'] = $this->Investigation_model->get_investigation_categories();
        $data['active_tab'] = 'category';
        $json['result_html'] = $this->load->view('investigation/category_table', $data, true);
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
            $result = $this->Investigation_model->add_investigation_item($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "investigation Item created successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        $data['items'] = $this->Investigation_model->get_investigation_items();
        $data['active_tab'] = 'items';
        $json['result_html'] = $this->load->view('investigation/item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save_investigation_category()
    {
        $data = $this->input->post();
        $result = $this->Investigation_model->add_investigation_category($data);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "investigation  save successfully!";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
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
            $json['message'] = "investigation Category successfully deleted.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        $data['categories'] = $this->Investigation_model->get_investigation_categories();
        $data['active_tab'] = 'category';
        $json['result_html'] = $this->load->view('investigation/category_table', $data, true);
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
        $result = $this->Investigation_model->add_investigation_item($data);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "investigation item save successfully!";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function delete_investigation_item($id)
    {
        $result = $this->Investigation_model->delete_investigation_item($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "investigation item successfully deleted.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error.";
        }
        $data['items'] = $this->Investigation_model->get_investigation_items();
        $data['active_tab'] = 'items';
        $json['result_html'] = $this->load->view('investigation/item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }
}

?>