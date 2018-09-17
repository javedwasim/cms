<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Echo_controller extends MY_Controller
{

    function __construct()
    {
        parent:: __construct();
        $this->load->helper('content-type');
        $this->load->model('Dashboard_model');
        $this->load->model('Echo_model');

    }


    public function disease()
    {
        $data['categories'] = $this->Echo_model->get_disease_categories();
        $data['structures'] = $this->Echo_model->get_Structure_categories();
        $data['findings'] = $this->Echo_model->get_structure_findings();
        $json['result_html'] = $this->load->view('echo/echo', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function add_disease_category()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'disease Name', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Echo_model->add_disease_category($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "disease created successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        $data['categories'] = $this->Echo_model->get_disease_categories();
        $data['active_tab'] = 'category';
        $json['result_html'] = $this->load->view('echo/disease_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function add_disease_item()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'disease Name', 'required|xss_clean');
        $this->form_validation->set_rules('disease_id', 'disease Category', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Echo_model->add_disease_item($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "disease Item created successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        $data['items'] = $this->Echo_model->get_disease_items();
        $data['active_tab'] = 'items';
        $json['result_html'] = $this->load->view('disease/item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save_disease_category()
    {
        $data = $this->input->post();
        $result = $this->Echo_model->add_disease_category($data);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "disease  save successfully!";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function delete_disease_category($id)
    {
        $result = $this->Echo_model->delete_disease_category($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "disease Category successfully deleted.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        $data['categories'] = $this->Echo_model->get_disease_categories();
        $data['active_tab'] = 'category';
        $json['result_html'] = $this->load->view('echo/disease_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function get_disease_item($cat_id)
    {
        $data['items'] = $this->Echo_model->get_disease_items_by_category($cat_id);
        $data['selected_category'] = $cat_id;
        $data['active_tab'] = 'tests';
        $json['result_html'] = $this->load->view('disease/item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_disease_item_description()
    {
        $data = $this->input->post();
        $id = $data['id'];
        $result = $this->Echo_model->get_disease_item_description($id);

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

    public function save_disease_item_description()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('description', 'Description', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Echo_model->save_disease_item_description($data);
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

    public function save_disease_item()
    {
        $data = $this->input->post();
        $result = $this->Echo_model->add_disease_item($data);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "disease item save successfully!";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function delete_disease_item($id)
    {
        $result = $this->Echo_model->delete_disease_item($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "disease item successfully deleted.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error.";
        }
        $data['items'] = $this->Echo_model->get_disease_items();
        $data['active_tab'] = 'items';
        $json['result_html'] = $this->load->view('disease/item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function add_structure_category()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'Structure Name', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Echo_model->add_structure_category($data);
            $message = "Structure Category successfully created.";
            $this->structure_load($result,$message);
        }

    }

    public function save_structure_category()
    {
        $data = $this->input->post();
        $result = $this->Echo_model->add_structure_category($data);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Structure  save successfully!";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function delete_structure_category($id)
    {
        $result = $this->Echo_model->delete_structure_category($id);
        $message = "Structure Category successfully deleted.";
        $this->structure_load($result,$message);
    }

    public function structure_load($result,$message){

        if ($result) {
            $json['success'] = true;
            $json['message'] = $message;
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }

        $data['structures'] = $this->Echo_model->get_Structure_categories();
        $data['active_tab'] = 'structure';
        $json['result_html'] = $this->load->view('echo/structure_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function add_structure_finding()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'Finding Name', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Echo_model->add_structure_finding($data);
            $message = "Structure finding successfully created.";
            $this->structure_finding_load($result,$message);
        }

    }

    public function save_structure_finding()
    {
        $data = $this->input->post();
        $result = $this->Echo_model->add_structure_finding($data);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Finding save successfully!";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function structure_finding_load($result,$message){

        if ($result) {
            $json['success'] = true;
            $json['message'] = $message;
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }

        $data['findings'] = $this->Echo_model->get_structure_findings();
        $data['active_tab'] = 'structure';
        $json['result_html'] = $this->load->view('echo/finding_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

}

?>