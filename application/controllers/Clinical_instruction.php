<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clinical_instruction extends MY_Controller
{

    function __construct()
    {
        parent:: __construct();
        $this->load->helper('content-type');
        $this->load->model('Dashboard_model');
        $this->load->model('Clinical_instruction_model');

    }

    public function instruction()
    {
        $data['categories'] = $this->Clinical_instruction_model->get_instruction_categories();
        $data['items'] = $this->Clinical_instruction_model->get_instruction_items();
        $json['result_html'] = $this->load->view('instruction/instruction', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function add_instruction_category()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'Instruction Name', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Clinical_instruction_model->add_instruction_category($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "instruction created successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        $data['categories'] = $this->Clinical_instruction_model->get_instruction_categories();
        $data['active_tab'] = 'category';
        $json['result_html'] = $this->load->view('instruction/category_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function add_instruction_item()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'instruction Name', 'required|xss_clean');
        $this->form_validation->set_rules('instruction_id', 'instruction Category', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Clinical_instruction_model->add_instruction_item($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "instruction Item created successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        $data['items'] = $this->Clinical_instruction_model->get_instruction_items();
        $data['active_tab'] = 'items';
        $json['result_html'] = $this->load->view('instruction/item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save_instruction_category()
    {
        $data = $this->input->post();
        $result = $this->Clinical_instruction_model->add_instruction_category($data);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "instruction  save successfully!";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function delete_instruction_category($id)
    {
        $result = $this->Clinical_instruction_model->delete_instruction_category($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "instruction Category successfully deleted.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        $data['categories'] = $this->Clinical_instruction_model->get_instruction_categories();
        $data['active_tab'] = 'category';
        $json['result_html'] = $this->load->view('instruction/category_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function get_instruction_item($cat_id)
    {
        $data['items'] = $this->Clinical_instruction_model->get_instruction_items_by_category($cat_id);
        $data['selected_category'] = $cat_id;
        $data['active_tab'] = 'tests';
        $json['result_html'] = $this->load->view('instruction/item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_instruction_item_description()
    {
        $data = $this->input->post();
        $id = $data['id'];
        $result = $this->Clinical_instruction_model->get_instruction_item_description($id);

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

    public function save_instruction_item_description()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('description', 'Description', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Clinical_instruction_model->save_instruction_item_description($data);
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

    public function save_instruction_item()
    {
        $data = $this->input->post();
        $result = $this->Clinical_instruction_model->add_instruction_item($data);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "instruction item save successfully!";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function delete_instruction_item($id)
    {
        $result = $this->Clinical_instruction_model->delete_instruction_item($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "instruction item successfully deleted.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error.";
        }
        $data['items'] = $this->Clinical_instruction_model->get_instruction_items();
        $data['active_tab'] = 'items';
        $json['result_html'] = $this->load->view('instruction/item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }
}

?>