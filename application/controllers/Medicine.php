<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicine extends MY_Controller
{

    function __construct()
    {
        parent:: __construct();
        $this->load->helper('content-type');
        $this->load->model('Dashboard_model');
        $this->load->model('Medicine_model');

    }

    public function medicine()
    {
        $data['dosages'] = $this->Medicine_model->get_dosage_categories();
        $data['categories'] = $this->Medicine_model->get_medicine_categories();
        $data['items'] = $this->Medicine_model->get_medicine_items();
        $json['result_html'] = $this->load->view('medicine/medicine', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function add_medicine_category()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'medicine Name', 'required|is_unique[medicine.name]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Medicine_model->add_medicine_category($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Created successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        $data['dosages'] = $this->Medicine_model->get_dosage_categories();
        $data['categories'] = $this->Medicine_model->get_medicine_categories();
        $data['items'] = $this->Medicine_model->get_medicine_items();
        $data['active_tab'] = 'category';
        $json['result_html'] = $this->load->view('medicine/medicine', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function add_medicine_item()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'medicine Name', 'required|xss_clean');
        $this->form_validation->set_rules('medicine_id', 'medicine Category', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Medicine_model->add_medicine_item($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Created successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        $data['items'] = $this->Medicine_model->get_medicine_items();
        $data['active_tab'] = 'items';
        $json['result_html'] = $this->load->view('medicine/item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save_medicine_category()
    {
        $data = $this->input->post();
        $result = $this->Medicine_model->add_medicine_category($data);
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

    public function save_dosage_category()
    {
        $data = $this->input->post();
        $result = $this->Medicine_model->add_dosage_category($data);
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

    public function delete_medicine_category($id)
    {
        $result = $this->Medicine_model->delete_medicine_category($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Successfully deleted.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        $data['dosages'] = $this->Medicine_model->get_dosage_categories();
        $data['categories'] = $this->Medicine_model->get_medicine_categories();
        $data['items'] = $this->Medicine_model->get_medicine_items();
        $data['active_tab'] = 'category';
        $json['result_html'] = $this->load->view('medicine/medicine', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function get_medicine_item($cat_id)
    {
        $data['items'] = $this->Medicine_model->get_medicine_items_by_category($cat_id);
        $data['selected_category'] = $cat_id;
        $data['active_tab'] = 'tests';
        $json['result_html'] = $this->load->view('medicine/item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_medicine_category_description()
    {
        $data = $this->input->post();
        $id = $data['id'];
        $result = $this->Medicine_model->get_medicine_category_description($id);

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

    public function get_medicine_item_description()
    {
        $data = $this->input->post();
        $id = $data['id'];
        $result = $this->Medicine_model->get_medicine_item_description($id);

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

    public function save_medicine_category_description()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('description', 'Description', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Medicine_model->save_medicine_category_description($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Added successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error while adding description";
            }
        }

        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save_medicine_item_description()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('description', 'Description', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Medicine_model->save_medicine_item_description($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Added successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error while adding description";
            }
        }

        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save_medicine_item()
    {
        $data = $this->input->post();
        $result = $this->Medicine_model->add_medicine_item($data);
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

    public function delete_medicine_item($id)
    {
        $result = $this->Medicine_model->delete_medicine_item($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Successfully deleted.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error.";
        }
        $data['items'] = $this->Medicine_model->get_medicine_items();
        $data['active_tab'] = 'items';
        $json['result_html'] = $this->load->view('medicine/item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function delete_dosage_category($id)
    {
        $result = $this->Medicine_model->delete_dosage_category($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Successfully deleted.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error.";
        }
        $data['dosages'] = $this->Medicine_model->get_dosage_categories();
        $data['active_tab'] = 'dosage';
        $json['result_html'] = $this->load->view('medicine/dosage_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function add_dosage_category()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'Dosage Name', 'required|is_unique[dosage.name]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Medicine_model->add_dosage_category($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Created successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        $data['dosages'] = $this->Medicine_model->get_dosage_categories();
        $data['active_tab'] = 'dosage';
        $json['result_html'] = $this->load->view('medicine/dosage_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function update_dosage_medicine(){
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('medicine_category', 'Medicine Category', 'required|xss_clean');
        $this->form_validation->set_rules('dosage[]', 'Dosage', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Medicine_model->update_dosage_medicine($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Updated successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function get_dosage_medicine_category($medicine_id){
        $data['dosages'] = $this->Medicine_model->get_dosage_medicine_category($medicine_id);
        //print_r($data['dosages']); die();
        $data['active_tab'] = 'ditems';
        $json['result_html'] = $this->load->view('medicine/dosage_medicine_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

}

?>