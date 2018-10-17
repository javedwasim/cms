<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instruction extends MY_Controller
{

    function __construct()
    {
        parent:: __construct();
        $this->load->helper('content-type');
        $this->load->model('Dashboard_model');
        $this->load->model('Instruction_model');

    }

    public function instruction()
    {
        $data['category'] = 'clinical';
        $data['categories'] = $this->Instruction_model->get_instruction_categories($data);
        $data['items'] = $this->Instruction_model->get_inst_items($data);
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('instruction/instruction', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function special_instructions()
    {
        $data['category'] = 'special';
        $data['categories'] = $this->Instruction_model->get_instruction_categories($data);
        $data['items'] = $this->Instruction_model->get_inst_items($data);
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('instruction/instruction', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function add_instruction_category()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'Instruction Name', 'required|is_unique[instruction.name]|xss_clean');
        $data = $this->input->post();

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $result = $this->Instruction_model->add_instruction_category($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Created successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        $data['categories'] = $this->Instruction_model->get_instruction_categories($data);
        $data['items'] = $this->Instruction_model->get_inst_items($data);
        $data['active_tab'] = 'category';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('instruction/instruction', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function delete_instruction_category()
    {
        $data = $this->input->post();
        $id = $data['id'];
        $category['category'] = $data['category'];
        $result = $this->Instruction_model->delete_instruction_category($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Successfully deleted.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        $data['categories'] = $this->Instruction_model->get_instruction_categories($category);
        $data['items'] = $this->Instruction_model->get_inst_items($data);
        $data['active_tab'] = 'category';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('instruction/instruction', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function save_inst_category()
    {
        $data = $this->input->post();
        $result = $this->Instruction_model->add_instruction_category($data);
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

    public function add_instruction_item()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'Laboratory Name', 'required|xss_clean');
        $this->form_validation->set_rules('instruction_id', 'Instruction Category', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Instruction_model->add_instruction_item($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Created successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        $data['items'] = $this->Instruction_model->get_inst_items($data);
        $data['active_tab'] = 'items';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('instruction/item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_inst_item()
    {
        $filters = $this->input->post();
        $cat_id = $filters['inst_id'];
        $data['items'] = $this->Instruction_model->get_inst_items_by_category($filters);
        $data['selected_category'] = $cat_id;
        $data['active_tab'] = 'tests';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('instruction/item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_inst_item_description()
    {
        $data = $this->input->post();
        $id = $data['id'];
        $result = $this->Instruction_model->get_inst_item_description($id);

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

    public function save_inst_item_description()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('description', 'Description', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Instruction_model->save_inst_item_description($data);
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

    public function save_inst_item()
    {
        $data = $this->input->post();
        $result = $this->Instruction_model->add_instruction_item($data);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "updated successfully!";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function delete_inst_item()
    {
        $data = $this->input->post();
        $id = $data['id'];
        $category['category'] = $data['category'];

        $result = $this->Instruction_model->delete_inst_item($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Successfully deleted.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error.";
        }
        $data['items'] = $this->Instruction_model->get_inst_items($category);
        $data['active_tab'] = 'items';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('instruction/item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function get_inst_description()
    {
        $data = $this->input->post();
        $id = $data['id'];
        $result = $this->Instruction_model->get_inst_description($id);

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

    public function save_inst_description()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('description', 'Description', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Instruction_model->save_inst_description($data);
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