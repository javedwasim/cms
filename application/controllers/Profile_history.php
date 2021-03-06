<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_history extends MY_Controller
{

    function __construct()
    {
        parent:: __construct();
        $this->load->helper('content-type');
        $this->load->model('Dashboard_model');
        $this->load->model('History_model');

    }

    public function history()
    {
        $catid = 0;
        $data['categories'] = $this->History_model->get_profile_history();
        $data['items'] = $this->History_model->get_history_items_by_category($catid);
        $json['result_html'] = $this->load->view('history/profile_history', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function add_profile_history()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'history Name', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $nameexist = $this->History_model->get_profile_history_exist($data);
            if ($nameexist) {
                $json['error'] = true;
                $json['message'] = 'Already Exists!';
            }else{
                $result = $this->History_model->add_profile_history($data);
                if ($result) {
                    $json['success'] = true;
                    $json['message'] = "History created successfully!";
                } else {
                    $json['error'] = true;
                    $json['message'] = "Seems to an error";
                }
            }
        }
        $data['categories'] = $this->History_model->get_profile_history();
        $data['active_tab'] = 'category';
        $json['result_html'] = $this->load->view('history/history_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function add_history_item()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'history Name', 'required|xss_clean');
        $this->form_validation->set_rules('profile_history_id', 'History Category', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $pid = $data['profile_history_id'];
            $itemexits = $this->History_model->history_item_exits($data);
            if ($itemexits) {
                $json['error'] = true;
                $json['message'] = 'Already Exists!';
            }else{
                $result = $this->History_model->add_history_item($data);
                if ($result) {
                    $json['success'] = true;
                    $json['message'] = "history Item created successfully!";
                } else {
                    $json['error'] = true;
                    $json['message'] = "Seems to an error";
                }
            }
        }
        $data['items'] = $this->History_model->get_history_items_by_category($pid);
        $data['active_tab'] = 'items';
        $json['result_html'] = $this->load->view('history/item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save_profile_history()
    {
        $data = $this->input->post();
        if (empty($data['editval'])) {
            $json['error'] = true;
            $json['message'] = "Empty could not be update.";
        }else{
            $result = $this->History_model->add_profile_history($data);
            if ($result=='updated') {
                $json['success'] = true;
                $json['message'] = "Updated successfully!";
            } else if($result=='inserted'){
                $json['success'] = true;
                $json['message'] = "Saved Successfully.";
            }else{
                $json['error'] = true;
                $json['message'] = "Seems an error.";
            }
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function delete_profile_history($id)
    {
        $result = $this->History_model->delete_profile_history($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "history Category successfully deleted.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        $data['categories'] = $this->History_model->get_profile_history();
        $data['active_tab'] = 'category';
        $json['result_html'] = $this->load->view('history/history_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function get_history_item($cat_id)
    { 
        $data['items'] = $this->History_model->get_history_items_by_category($cat_id);
        $data['selected_category'] = $cat_id;
        $data['active_tab'] = 'tests';
        $json['result_html'] = $this->load->view('history/item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_history_item_description()
    {
        $data = $this->input->post();
        $id = $data['id'];
        $result = $this->History_model->get_history_item_description($id);

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

    public function get_profile_history_description()
    {
        $data = $this->input->post();
        $id = $data['id'];
        $result = $this->History_model->get_profile_history_description($id);
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

    public function save_history_item_description()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('description', 'Description', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->History_model->save_history_item_description($data);
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

    public function save_profile_history_description()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('description', 'Description', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->History_model->save_profile_history_description($data);
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

    public function save_history_item()
    {
        $data = $this->input->post();
        if (empty($data['editval'])) {
            $json['error'] = true;
            $json['message'] = "Could not update empty field.";
        }else{
            $result = $this->History_model->add_history_item($data);
            if($result == 'inserted' ){
                $json['success'] = true;
                $json['message'] = "Saved successfully!";
            }else if($result == 'updated' ){
                $json['success'] = true;
                $json['message'] = "Updated successfully!";
            }
            else{
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function delete_history_item($id,$cid)
    {
        $result = $this->History_model->delete_history_item($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Successfully deleted.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error.";
        }
        $data['items'] = $this->History_model->get_history_items_by_category($cid);
        $data['active_tab'] = 'history_items_content';
        $json['result_html'] = $this->load->view('history/item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function get_item_tab(){
        $catid = 0;
        $data['items'] = $this->History_model->get_history_items_by_category($catid);
        $data['categories'] = $this->History_model->get_profile_history();
        $data['active_tab'] = 'history_items_content';
        $json['result_html'] = $this->load->view('history/items', $data, true);
        $json['item_table'] = $this->load->view('history/item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }
}

?>